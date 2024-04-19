<?php
$mysqli = new mysqli("localhost","root","08102003","laptopdb");

if ($mysqli-> connect_error) {
  echo "Kết nối lỗi " . $mysqli -> connect_error;
  exit();
}
?>