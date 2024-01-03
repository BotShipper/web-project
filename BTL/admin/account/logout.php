<?php
session_start();
if (isset($_SESSION["account"])) {
    // Hủy tất cả session
    session_destroy();
    header("location: ../index.php");
}
