<?php
require_once "../config/connect.php";
session_start();

if (isset($_GET["food_id"])) {
    $guest_id = $_SESSION["guest_id"];
    $food_id = $_GET['food_id'];

    $sql = "DELETE FROM `orderfood` WHERE guest_id = $guest_id AND food_id = $food_id";
    $conn->query($sql);
}

$conn->close();
header('location: cart.php');