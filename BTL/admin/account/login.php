<?php
require_once '../../config/connect.php';
session_start();

if (isset($_POST["submit"])) {
    $account = $_POST["account"];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `admin` WHERE account = '$account'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    // Kiểm tra mật khẩu
    if ($result->num_rows > 0) {
        // Lấy mật khẩu đã mã hóa từ cơ sở dữ liệu
        $password_hashed = $row['password'];

        if (password_verify($password, $password_hashed)) {
            // Mật khẩu đúng
            // Gán giá trị cho session để phân quyền
            $_SESSION["account"] = $row["account"];
            header("location: ../index.php");
        } else {
            // Mật khẩu sai
            $error = "Mật khẩu chưa đúng";
        }
    } else {
        // Tài khoản không tồn tại
        $error = "Tài khoản không tồn tại";
    }

    $conn->close();
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Đăng nhập</title>
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
        <h1>Đăng nhập</h1>
        <form method="POST">
            <div class="form-group">
                <label>Tài khoản</label>
                <!-- Nếu nhập sai sau khi reset trang vẫn giữ nguyên dữ liệu -->
                <input type="text" class="form-control" name="account" value="<?php if (isset($_POST["account"])) {
                                                                                    echo $_POST["account"];
                                                                                } ?>" required>
            </div>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <!-- <h6><a href="register.php">Đăng ký</a> nếu bạn chưa có tài khoản</h6> -->

            <input class="btn btn-success" type="submit" name="submit" value="Đăng nhập">
        </form>
        <?php
        if (isset($error)) { ?>
            <h5><?php echo $error; ?></h5>
        <?php } ?>
    </div>
</body>

</html>