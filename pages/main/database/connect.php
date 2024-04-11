<?php
$servername = "localhost"; 
$username = "root"; 
$password = "08102003"; 
$database = "laptopdb"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
} else {
    echo "Kết nối thành công!";
}

?>
