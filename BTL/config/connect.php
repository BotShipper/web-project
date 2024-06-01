<?php
$servername = "localhost";
$username = "root";
$password = "12345678";

// Điền CSDL vào đây
$db = "restaurant";
//------------------

$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Kết nối thất bại" . $conn->connect_error);
} else {
    // echo "Kết nối thành công";
}
