<?php
require_once "../config/connect.php";

// Lấy ra 3 món sáng tiêu biểu
$sql_breakfast = "SELECT * FROM `food` WHERE food_id IN (29, 5, 6)";
$result_breakfast = $conn->query($sql_breakfast);

// Lấy ra 3 món trưa tiêu biểu
$sql_lunch = "SELECT * FROM `food` WHERE food_id IN (7, 8, 9)";
$result_lunch = $conn->query($sql_lunch);

// Lấy ra 3 món tối tiêu biểu
$sql_dinner = "SELECT * FROM `food` WHERE food_id IN (10, 11, 12)";
$result_dinner = $conn->query($sql_dinner);

// Lấy ra 3 món khai vị tiêu biểu
$sql_starters = "SELECT * FROM `food` WHERE food_id IN (13, 14, 15)";
$result_starters = $conn->query($sql_starters);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/menu.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="shortcut icon" type="x-icon" href="../assets/imgs/vector.svg">
    <title>WowWraps Restaurant</title>
</head>

<body>
    <!------------------- header -------------------->
    <?php require_once "header.php" ?>

    <main>
        <!------------------- breakfast -------------------->
        <section class="listFood listFood__first container-fluid">
            <div class="listFood__title">
                <h1>Breakfast</h1>
                <img src="../assets/imgs/vector3.svg" alt="">
            </div>
            <div class="listFood__menu">
                <div class="listFood__menu--row row">
                    <?php
                    while ($row = $result_breakfast->fetch_assoc()) { ?>
                        <div class="listFood__menu--col col-md-4">
                            <img src="../assets/imgs/<?php echo $row['food_img']; ?>">
                            <h2><?php echo $row['food_name']; ?></h2>
                            <p><?php echo $row['food_description']; ?></p>
                            <hr>
                            <div class="listFood__order">
                                <a href="order.php?food_id=<?php echo $row['food_id']; ?>">Order Now</a>
                                <span>$<?php echo $row['food_price']; ?></span>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </section>
    </main>

    <!------------------- menuSlogan -------------------->
    <section class="menuSlogan  container-fluid">
        <div class="menuSlogan__container">
            <div class="menuSlogan__title">
                <h1>Food is not just eating energy</h1>
                <p>It’s an experience.</p>
            </div>
            <a href="../admin/index.php">Order Now</a>
        </div>
    </section>

    <main>
        <!------------------- lunch -------------------->
        <section class="listFood container-fluid">
            <div class="listFood__title">
                <h1>Lunch</h1>
                <img src="../assets/imgs/vector3.svg" alt="">
            </div>
            <div class="listFood__menu">
                <div class="listFood__menu--row row">
                    <?php
                    while ($row = $result_lunch->fetch_assoc()) { ?>
                        <div class="listFood__menu--col col-md-4">
                            <img src="../assets/imgs/<?php echo $row['food_img']; ?>">
                            <h2><?php echo $row['food_name']; ?></h2>
                            <p><?php echo $row['food_description']; ?></p>
                            <hr>
                            <div class="listFood__order">
                                <a href="order.php?food_id=<?php echo $row['food_id']; ?>">Order Now</a>
                                <span>$<?php echo $row['food_price']; ?></span>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </section>

        <!------------------- dinner -------------------->
        <section class="listFood container-fluid">
            <div class="listFood__title">
                <h1>Dinner</h1>
                <img src="../assets/imgs/vector3.svg" alt="">
            </div>
            <div class="listFood__menu">
                <div class="listFood__menu--row row">
                    <?php
                    while ($row = $result_dinner->fetch_assoc()) { ?>
                        <div class="listFood__menu--col col-md-4">
                            <img src="../assets/imgs/<?php echo $row['food_img']; ?>">
                            <h2><?php echo $row['food_name']; ?></h2>
                            <p><?php echo $row['food_description']; ?></p>
                            <hr>
                            <div class="listFood__order">
                                <a href="order.php?food_id=<?php echo $row['food_id']; ?>">Order Now</a>
                                <span>$<?php echo $row['food_price']; ?></span>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </section>

        <!------------------- starters -------------------->
        <section class="listFood container-fluid">
            <div class="listFood__title">
                <h1>Starters</h1>
                <img src="../assets/imgs/vector3.svg" alt="">
            </div>
            <div class="listFood__menu">
                <div class="listFood__menu--row row">
                    <?php
                    while ($row = $result_starters->fetch_assoc()) { ?>
                        <div class="listFood__menu--col col-md-4">
                            <img src="../assets/imgs/<?php echo $row['food_img']; ?>">
                            <h2><?php echo $row['food_name']; ?></h2>
                            <p><?php echo $row['food_description']; ?></p>
                            <hr>
                            <div class="listFood__order">
                                <a href="order.php?food_id=<?php echo $row['food_id']; ?>">Order Now</a>
                                <span>$<?php echo $row['food_price']; ?></span>
                            </div>
                        </div>
                    <?php }
                    $conn->close();
                    ?>
                </div>
            </div>
        </section>
    </main>

    <!------------------- footer -------------------->
    <?php require_once "footer.php"; ?>
</body>

</html>