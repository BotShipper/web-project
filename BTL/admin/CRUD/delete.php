<?php
require "../../config/connect.php";

if (isset($_GET['food_id'])) {
    $food_id = $_GET['food_id'];
    $sql_delete = "DELETE FROM food WHERE food_id=$food_id";
    $result_delete = $conn->query($sql_delete);

    header('location: ../index.php');
    $conn->close();
}
