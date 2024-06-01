<?php
require_once "../config/connect.php";
session_start();

if (isset($_GET["food_id"])) {
    $food_id = $_GET["food_id"];

    $sql_food = "SELECT * FROM food 
    INNER JOIN category ON food.category_id = category.category_id WHERE food_id = $food_id";
    $result_food = $conn->query($sql_food);

    if ($result_food->num_rows > 0) {
        $row_food = $result_food->fetch_assoc();
        $_SESSION["food_id"] = $row_food["food_id"];
    }
}

if (!isset($_SESSION["guest_id"])) {
    $sql_guest = "INSERT INTO `guest`(`guest_name`, `guest_phone`, `guest_address`) 
    VALUES ('','','')";
    $conn->query($sql_guest);

    $sql_guest = "SELECT * FROM `guest` ORDER BY guest_id DESC LIMIT 1";
    $result_guest = $conn->query($sql_guest);

    if ($result_guest->num_rows > 0) {
        $row_guest = $result_guest->fetch_assoc();
        $_SESSION["guest_id"] = $row_guest["guest_id"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/order.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <script src="../assets/js/counter.js"></script>
    <script src="../assets/js/get_count.js"></script>
    <link rel="shortcut icon" type="x-icon" href="../assets/imgs/vector.svg">
    <title>WowWraps Restaurant</title>
</head>

<body>
    <!------------------- header -------------------->
    <?php require_once "header.php" ?>

    <!----------------------------------------------->
    <main>
        <section class="order container-fluid">
            <div class="row">
                <?php if (isset($_GET["food_id"])) { ?>
                    <div class="order--col-1 col-md-6">
                        <img src="../assets/imgs/<?php echo $row_food['food_img']; ?>">
                    </div>
                    <div class="order--col-2 col-md-6">
                        <h2><?php echo $row_food["food_name"]; ?></h2>
                        <h3>$ <?php echo $row_food["food_price"]; ?></h3>
                        <p><?php echo $row_food["food_description"]; ?></p>
                        <div class="order__quantity">
                            <table>
                                <tr>
                                    <td><button id="decrease">-</button></td>
                                    <td><span id="count">1</span></td>
                                    <td><button id="increase">+</button></td>
                                </tr>
                            </table>
                            <form action="../admin/index.php">
                                <button id="add">ADD TO CARD</button>
                            </form>
                        </div>
                        <div><span>CATEGO: </span><?php echo $row_food["category_name"]; ?></div>
                        <a class="back" href="../admin/index.php">List Food</a>
                    </div>
                <?php } ?>
            </div>
        </section>
    </main>

    <!------------------- footer -------------------->
    <?php require_once "footer.php"; ?>
</body>

</html>