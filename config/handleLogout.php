<?php
session_start();
unset($_SESSION['user']);
session_destroy();
echo json_encode(["status" => "success"]);
?>
