<?php
session_start();
$userId = $_SESSION["userId"];
include "../../../config/config.php";

global $mysqli;

$name = $_POST["name"];
$phoneNumber = $_POST["phoneNumber"];
$address = $_POST["address"];
$datePurchase = $_POST["datePurchase"];
$dateReceive = $_POST["dateReceive"];
$totalPrice = $_POST["totalPrice"];

$shoppingCart;
if (isset($_SESSION["login"]) && isset($_SESSION["userId"])) {
    if ($_SESSION["login"] == true) {
        if (isset($_SESSION["cart"])) {
            if ($_SESSION["cart"] != null) {
                $shoppingCart = $_SESSION["cart"];
            }
        }
    }
}

  
   

$query1 = "SELECT * FROM don_hang ORDER BY id_don_hang DESC LIMIT 1";
$result = $mysqli->query($query1);
$row = $result->fetch_assoc();
$id_don_hang = $row["id_don_hang"] + 1;

$query2 = "INSERT INTO don_hang (id_don_hang, dia_chi_nhan, ho_ten_nguoi_nhan, ngay_dat_hang, ngay_giao_hang, sdt_nhan_hang, trang_thai_don_hang, ma_nguoi_dat) VALUES ($id_don_hang, '$address', '$name', '$datePurchase', '$dateReceive', '$phoneNumber',0, '$userId')";
$order = $mysqli->query($query2);

foreach ($shoppingCart as $item) {
    $id_san_pham = $item["masp"];
    $so_luong = $item["soluong"];
    $don_gia = $item["giasp"] * $item["soluong"];
    $query3 = "INSERT INTO chi_tiet_don_hang (ma_don_hang, ma_san_pham, so_luong, don_gia) VALUES ('$id_don_hang', '$id_san_pham', '$so_luong', '$don_gia')";
    $orderDetail = $mysqli->query($query3);

    $query4 =  "DELETE FROM chi_tiet_san_pham WHERE ma_sp = '$id_san_pham' ORDER BY masp_chi_tiet ASC LIMIT $so_luong";
    $deleteProduct = $mysqli->query($query4);

    $query5 = "SELECT so_luong FROM san_pham WHERE id_san_pham = '$id_san_pham'";
    $product = $mysqli->query($query5);
    $row = $product->fetch_assoc();

    $quantityLeft = $row["so_luong"] - $so_luong;
    $query5 = "UPDATE san_pham SET so_luong = '$quantityLeft' WHERE id_san_pham = '$id_san_pham'";
    $updateProductQuantity = $mysqli->query($query5);
}

unset($_SESSION["cart"]);
echo  "Đặt hàng thành công";
exit;
