<?php
require_once "../config/connect.php";
session_start();

if (isset($_SESSION["guest_id"])) {
    $guest_id = $_SESSION["guest_id"];

    $sql_select = "SELECT *, ROUND(food_price*orderFood_quantity, 1) as subtotal FROM orderfood 
    INNER JOIN food ON food.food_id = orderfood.food_id
    WHERE orderfood.guest_id = $guest_id
    ORDER BY orderfood.food_id";
    $result_select = $conn->query($sql_select);

    $sql_date = "SELECT DATE_FORMAT(guest_date, '%d/%m/%Y') AS currentDate  FROM orderfood 
    INNER JOIN guest ON guest.guest_id = orderfood.guest_id
    WHERE orderfood.guest_id = $guest_id
    ORDER BY orderfood.food_id";
    $result_date = $conn->query($sql_date);
    if ($result_date->num_rows > 0) {
        $row_date = $result_date->fetch_assoc();
    }
    

    $sql_total = "SELECT ROUND(SUM(food_price*orderFood_quantity), 1) as total  FROM orderfood 
        INNER JOIN food ON food.food_id = orderfood.food_id
        WHERE guest_id = $guest_id";
    $result_total = $conn->query($sql_total);
    if ($result_total->num_rows > 0) {
        $row_total = $result_total->fetch_assoc();
    }
}

if (isset($_POST['sbm'])) {
    $guest_name = $_POST['guest_name'];
    $guest_phone = $_POST['guest_phone'];
    $guest_email = $_POST['guest_email'];
    $guest_address = $_POST['guest_address'];
    $guest_pay = $_POST['guest_pay'];
    $guest_total = $_POST['guest_total'];

    $sql_update = "UPDATE `guest` SET `guest_name`='$guest_name',`guest_phone`='$guest_phone',`guest_email`='$guest_email',`guest_address`='$guest_address',`guest_pay`='$guest_pay',`guest_total`=$guest_total WHERE guest_id=$guest_id";
    $result_update = $conn->query($sql_update);

    $sql_delete = "DELETE FROM `orderfood` WHERE guest_id=$guest_id";
    $conn->query($sql_delete);

    session_destroy();
    header('location: menu.php');
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/checkout.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <script src="../assets/js/confirm.js"></script>
    <script src="../assets/js/check.js"></script>
    <link rel="shortcut icon" type="x-icon" href="../assets/imgs/vector.svg">
    <title>WowWraps Restaurant</title>
</head>

<body>
    <!------------------- header -------------------->
    <?php require_once "header.php" ?>

    <!------------------------------------------------------------>
    <main>
        <section class="checkout container-fluid">
            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-header">
                            <h2>Billing details</h2>
                        </div>
                        <div class="card-body">
                            <form id="form" method="POST">
                                <div class="form-group">
                                    <label for="">Full name</label>
                                    <input type="text" name="guest_name" class="form-control" id="fullName">
                                </div>

                                <div class="form-group">
                                    <label for="">Phone number</label>
                                    <input type="number" name="guest_phone" class="form-control" id="phoneNumber">
                                </div>

                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="guest_email" class="form-control" id="email">
                                </div>

                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" name="guest_address" class="form-control" id="address">
                                </div>


                                <div class="form-group">
                                    <div class="mb-1">Choose an option:</div>
                                    <div class="form-inline">
                                        <div class="form-check mr-3">
                                            <input class="form-check-input" type="radio" name="guest_pay" id="option1" value="Thanh toán khi nhận hàng" checked>
                                            <label class="form-check-label" for="option1">Payment on delivery</label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="guest_pay" id="option2" value="Chuyển khoản">
                                            <label class="form-check-label" for="option2">Transfer</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="guest_total" class="form-control" value="<?php echo $row_total["total"] + 6; ?>" hidden>
                                </div>
                                <?php if ($result_total->num_rows > 0 AND $result_date->num_rows > 0) { ?>
                                    <button name="sbm" class="btn btn-success" type="submit">Pay</button>
                                <?php } ?>
                                <span id="error"></span>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <?php if ($result_total->num_rows > 0 AND $result_date->num_rows > 0) { ?>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th colspan="2">
                                        <h2 class="yourOrder">Your order</h2>
                                        <?php echo $row_date["currentDate"]; ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Food</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result_select->num_rows > 0) {
                                    while ($row = $result_select->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $row['food_name']; ?> x <?php echo $row['orderFood_quantity']; ?></td>
                                            <td>$ <?php echo $row['subtotal']; ?></td>
                                        </tr>
                                <?php }
                                }
                                ?>
                                <tr>
                                    <td>Total</td>
                                    <td>$ <?php echo $row_total["total"]; ?></td>
                                </tr>
                                <tr>
                                    <td>Ship</td>
                                    <td>Flat rate: $ 6.00</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>$ <?php echo $row_total["total"] + 6; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>

    <!------------------- footer -------------------->
    <?php require_once "footer.php" ?>
</body>

</html>