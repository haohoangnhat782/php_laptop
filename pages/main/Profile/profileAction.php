<?php
include "../../../config/config.php";

session_start();

if (isset($_POST['action'])) {
    global $mysqli;
    if ($_POST['action'] == 'passwordManagement') {
        handleSubmitUpdatePassword($mysqli);
    } else if ($_POST['action'] == 'userInfo') {
        handleSubmitUpdateProfile($mysqli);
    }
}

function handleSubmitUpdateProfile($mysqli)
{
    $fullname = $_POST['firstInputValue'];
    $email = $_POST['secondInputValue'];
    $phoneNumber = $_POST['thirdInputValue'];

    $query = "UPDATE nguoi_dung SET ho_ten = '$fullname', email = '$email', so_dien_thoai = '$phoneNumber' WHERE id_nguoi_dung = '{$_SESSION['userId']}'";
    $user = $mysqli->query($query);

    if ($user) {
        echo "Cập nhật thành công";
    } else {
        echo "Cập nhật thất bại";
    }
    exit;
}

function handleSubmitUpdatePassword($mysqli)
{
    $newPassword = $_POST['secondInputValue'];

    $query = "UPDATE tbl_taikhoan SET Mat_khau = '$newPassword' WHERE MaTK = '{$_SESSION['userId']}'";
    $user = $mysqli->query($query);

    if ($user) {
        echo "Cập nhật thành công";
    } else {
        echo "Cập nhật thất bại";
    }
    exit;
}
