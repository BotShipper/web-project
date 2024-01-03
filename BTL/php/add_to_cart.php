<?php 
require_once "../config/connect.php";
session_start();

if(isset($_GET['count'])) {
    $count = $_GET['count'];
    $guest_id = $_SESSION["guest_id"];
    $food_id = $_SESSION["food_id"];

    $sql_select = "SELECT * FROM `orderfood` WHERE food_id = $food_id AND guest_id = $guest_id";
    $result_select = $conn->query($sql_select);
    
    if ($result_select->num_rows > 0) {
        // Nếu món ăn đã đặt rồi thì update số lượng
        $sql_update = "UPDATE `orderfood` SET `orderFood_quantity`=$count WHERE food_id = $food_id AND guest_id = $guest_id";
        $conn->query($sql_update);
    } else {
        // Nếu món ăn chưa đặt thì tạo một đơn hàng mới
        $sql_insert = "INSERT INTO `orderfood`(`orderFood_quantity`, `food_id`, `guest_id`) VALUES ($count,$food_id,$guest_id)";
        $conn->query($sql_insert);
    }

    $conn->close();
}

?>