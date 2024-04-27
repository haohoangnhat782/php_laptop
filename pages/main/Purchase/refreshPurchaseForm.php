<?php
session_start();
include "../../../config/config.php";
$masp = $_POST['masp'];
$quantity = $_POST['quantity'];
$shoppingCart = $_SESSION["cart"];

foreach ($shoppingCart as &$item) {
    if ($item['masp'] == $masp) {
        $item['soluong'] = $quantity;
    }
}
unset($item); // Unset the reference to avoid potential issues

$_SESSION["cart"] = $shoppingCart;

include __DIR__ . "/purchaseForm.php";
