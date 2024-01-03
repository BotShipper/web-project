<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../assets/js/search.js"></script>
    <script src="../assets/js/confirm.js"></script>
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <title>Admin</title>
</head>

<body>
    <!------------------- header -------------------->
    <?php require_once "../php/header.php" ?>

    <main>
        <section class="list-food container-fluid">
            <div class="card">
                <div class="list-food__header card-header">
                    <div class="row">
                        <div class="col-8">
                            <h2>Danh sách món ăn</h2>
                            <form>
                                <input type="text" id="search_food" name="search_food" placeholder="Search id or name">
                            </form>
                        </div>
                        <div class="col-4 d-flex align-items-center justify-content-end">
                            <?php if (isset($_SESSION["account"])) {
                                if ($_SESSION["account"] == "qtv") { ?>
                                    <a class="btn btn-success mr-3" href="account/register.php">Thêm tài khoản</a>
                                <?php } ?>
                                <a class="btn btn-success" href="account/logout.php">Đăng xuất</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="list-food__body card-body" id="search_results">

                    <!-- Bảng món ăn sau khi xử lý sẽ hiện ở đây -->

                </div>
            </div>
        </section>
    </main>

    <!------------------- footer -------------------->
    <?php require_once "../php/footer.php"; ?>
</body>

</html>