<?php
require_once "../config/connect.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/cart.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <script src="../assets/js/confirm.js"></script>
    <link rel="shortcut icon" type="x-icon" href="../assets/imgs/vector.svg">
    <title>WowWraps Restaurant</title>
</head>

<body>
    <!------------------- header -------------------->
    <?php require_once "header.php" ?>

    <!-------------------- cart --------------------->
    <main>
        <section class="list-cart container-fluid">
            <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Food</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION["guest_id"])) {
                        $guest_id = $_SESSION["guest_id"];

                        $sql_orderfood = "SELECT *, ROUND(food_price*orderFood_quantity, 1)  as subtotal  FROM orderfood 
                        INNER JOIN food ON food.food_id = orderfood.food_id
                        WHERE guest_id = $guest_id
                        ORDER BY orderfood.food_id";
                        $result_orderfood = $conn->query($sql_orderfood);
                        if ($result_orderfood->num_rows > 0) {
                            while ($row = $result_orderfood->fetch_assoc()) { ?>
                                <tr>
                                    <td class="align-middle col-1">
                                        <a onclick="return Del('<?php echo $row['food_name']; ?>')" href="delete_food.php?food_id=<?php echo $row["food_id"]; ?>"><img src="../assets/imgs/Delete.svg" alt=""></a>
                                    </td>
                                    <td class="align-middle col-1">
                                        <img style="width: 100px;" src="../assets/imgs/<?php echo $row['food_img']; ?>">
                                    </td>
                                    <td class="align-middle"><?php echo $row['food_name']; ?></td>
                                    <td class="align-middle col-2">$ <?php echo $row['food_price']; ?></td>
                                    <td class="align-middle col-2"><?php echo $row['orderFood_quantity']; ?></td>
                                    <td class="align-middle col-2">$ <?php echo $row['subtotal']; ?></td>
                                </tr>
                            <?php }
                            ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a class="btn btn-primary" href="checkout.php">Pay</a></td>
                            </tr>
                    <?php
                        }
                    }
                    $conn->close(); ?>
                </tbody>
            </table>
        </section>
    </main>

    <!------------------- footer -------------------->
    <?php require_once "footer.php"; ?>
</body>

</html>