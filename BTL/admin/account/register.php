<?php
require_once '../../config/connect.php';
session_start();

if (isset($_POST['submit'])) {
    $account = $_POST['account'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Tạo một bản mã của mật khẩu
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM `admin` WHERE account = '$account'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $error = "Tài khoản đã tồn tại";
    } else {
        // So sánh mật khẩu nhập lại
        if ($password != $confirm_password) {
            $error = "Mật khẩu không trùng khớp";
        } else {
            $sql_insert = "INSERT INTO `admin`(`account`, `password`) 
                    VALUES ('$account','$password_hashed')";
            $result_insert = $conn->query($sql_insert);
            // Gán giá trị cho session để phân quyền
            $_SESSION["account"] = $row["account"];
            header('location: ../index.php');
        }
    }

    $conn->close();
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Đăng ký</title>
    <style>
        form {
            margin: 10px;
            width: 500px;
        }

        h5 {
            color: red;
            margin-top: 10px;
        }

        .a {
            margin: 10px;
        }
    </style>
</head>

<body>
    <a class="btn btn-primary a" href="../../home.html">Trang chủ</a>
    <div class="container-fluid">
        <h1>Đăng ký</h1>
        <form method="POST">
            <div class="form-group">
                <label>Tài khoản</label>
                <input type="text" class="form-control" name="account" value="<?php if (isset($_POST["account"])) {
                                                                                    echo $_POST["account"];
                                                                                } ?>" required>
            </div>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <label>Nhập lại Mật khẩu</label>
                <input type="password" class="form-control" name="confirm_password" required>
            </div>
            <!-- Chuyển sang trang Đăng nhập -->
            <h6><a href="login.php">Đăng nhập</a> nếu bạn đã có tài khoản</h6>
            <input class="btn btn-success" type="submit" name="submit" value="Đăng ký">
        </form>
        <?php
        if (isset($error)) {
            echo '<h5>' . $error . '</h5>';
        }
        ?>
    </div>
</body>

</html>