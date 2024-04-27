<?php
include "../../../config/config.php";

session_start();

if (isset($_POST['action'])) {
    global $mysqli;
    if ($_POST['action'] == 'register') {
        handleSubmitRegister($mysqli);
    } else if ($_POST['action'] == 'login') {
        handleSubmitLogin($mysqli);
    }
}

function handleSubmitLogin($mysqli)
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM  tbl_taikhoan,nguoi_dung WHERE TenDN = '$email' AND Mat_khau = '$password' AND TTTK=1 ";
   //$query = "SELECT * FROM nguoi_dung,tbl_taikhoan,nguoidung_vaitro WHERE tbl_taikhoan.TenDN = '$email' and   AND tbl_taikhoan.Mat_khau = '$password' and nguoi_dung.id_nguoi_dung=tbl_taikhoan.MaTK and nguoi_dung.id_nguoi_dung=nguoidung_vaitro.ma_nguoi_dung and nguoidung_vaitro.ma_vai_tro=4 and tbl_taikhoan.TTTK=1";
    $user = $mysqli->query($query);

    if ($user->num_rows > 0) {
        $_SESSION['login'] = true;
        $row = $user->fetch_assoc();
         $_SESSION['userId']= $row["id_nguoi_dung"];

        echo "Đăng nhập thành công";
    } else {
        echo "Đăng nhập thất bại";
    }
    exit;
}

function handleSubmitRegister($mysqli)
{
    $makh = $_POST["maKH"];
    $name = $_POST["reg_name"];
    $tel = $_POST["reg_tel"];
    $email = $_POST["reg_email"];
    $password = $_POST["reg_pass"];
    $diachi = $_POST["dia_chi"];
    $time_tk=date("Y-m-d");
    $Trang_thai=1;
   
$check_makh_sql = "SELECT * FROM nguoi_dung WHERE id_nguoi_dung = '$makh'";
$query_checkMaKH=mysqli_query($mysqli,$check_makh_sql);

$check_email_sql = "SELECT * FROM nguoi_dung WHERE email = '$email'";
$query_checkemail=mysqli_query($mysqli,$check_email_sql);
$count=mysqli_fetch_array($query_checkMaKH);
$count1=mysqli_fetch_array($query_checkemail);
if ($count > 0) {
    echo "Mã Khách hàng đã tồn tại";
} else if ($count1 > 0) {
    echo "Email đã tồn tại";
} else {
    $sql = "INSERT INTO nguoi_dung (id_nguoi_dung,ho_ten,dia_chi,so_dien_thoai, email) VALUES ('".$makh."','".$name."','".$diachi."','".$tel."','".$email."')";
    $query_dangky=mysqli_query($mysqli,$sql);
    if($query_dangky){
        $sql_taikhoan="INSERT INTO tbl_taikhoan(MaTK,TenDN,Mat_khau,Ngay_tao,TTTK) Values('".$makh."','".$email."','".$password."','".$time_tk."','".$Trang_thai."') ";
        $query_taikhoan=mysqli_query($mysqli,$sql_taikhoan);
        $vaitro=4;
            echo "Đăng ký thành công";
            
        } else {   
            echo "Đăng ký thất bại";           

        }
    }
        exit;
    }
    


 



