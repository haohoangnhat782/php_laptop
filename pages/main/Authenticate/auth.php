<?php 
include("../../../config/config.php"); ?>
<?php

    $makh = $_POST["maKH"];
    $name = $_POST["reg_name"];
    $tel = $_POST["reg_tel"];
    $email = $_POST["reg_email"];
    $password = $_POST["reg_pass"];
    $diachi = $_POST["dia_chi"];
    $time_tk=date("Y-m-d");
    $Trang_thai=1;
$check_makh_sql = "SELECT * FROM nguoi_dung WHERE id_nguoi_dung = ?";
$check_makh_stmt = $mysqli->prepare($check_makh_sql);
$check_makh_stmt->bind_param("s", $makh);
$check_makh_stmt->execute();
$result_makh = $check_makh_stmt->get_result();

if ($result_makh->num_rows > 0) {
    // echo json_encode(array(
    //     'status' => 500,
    //     'message' => "Mã KH đã tồn tại!"
    // ));
    header("Location:../../../index.php?quanly=authenticate&stt=409"); 
    exit();
}
    $sql = "INSERT INTO nguoi_dung (id_nguoi_dung,ho_ten,dia_chi,so_dien_thoai, email) VALUES (?, ?,?, ?, ?)";

    $stmt = $mysqli->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sssss",$makh, $name, $diachi,$tel, $email);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $stmt->close();
            // echo json_encode(array(
            //     'status' => 200,
            //     'message' => "Register successful"
            // ));
            header("Location:../../../index.php?quanly=authenticate&stt=202"); 
            exit();
        } else {
            $stmt->close();
            // echo json_encode(array(
            //     'status' => 500,
            //     'message' => "Register failed, check internet and try again!"
            // ));
            header("Location:../../../index.php?quanly=authenticate&stt=404"); 
            exit();
        }
    } else {
        
        echo "Lỗi khi chuẩn bị câu lệnh SQL.";
        exit;
    }

    
$sql_taikhoan="INSERT INTO tbl_taikhoan(MaTK,TenDN,Mat_khau,Ngay_tao,TTTK) Values('".$makh."','".$email."','".$password."','".$time_tk."','".$Trang_thai."') ";
$query_taikhoan=mysqli_query($mysqli,$sql_taikhoan);
$vaitro=4;
$sql_vaitroTK="INSERT INTO nguoidung_vaitro(ma_nguoi_dung,ma_vai_tro) Values('".$makh."','".$vaitro."') ";
$query_taikhoan=mysqli_query($mysqli,$sql_vaitroTK);


?>
