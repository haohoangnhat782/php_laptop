<?php 
include('../../config/connect_db.php');

session_start();

$tensanpham=$_POST['tensp'];

$giasp=$_POST['giasp'];
$soluong=$_POST['soluong'];
$tinhtrang=$_POST['trangthai'];
$danhmuc=$_POST['danhmuc'];
$dungluongpin=$_POST['dungluongpin'];
$manhinh=$_POST['manhinh'];
$cpu=$_POST['cpu'];
$ram=$_POST['ram'];
$thongtinchung=$_POST['thongtinchung'];
$baohanh=$_POST['baohanh'];

$hinhanh =$_FILES['hinhanh']['name'];
$hinhanh_tmp =$_FILES['hinhanh']['tmp_name'];
$hinhanh=time().'_'.$hinhanh;

if(isset($_POST['themsanpham'])){
	$sql_them="INSERT INTO san_pham(don_gia,so_luong,ten_san_pham,ma_danh_muc,dung_luong_pin,man_hinh,cpu,ram,thong_tin_chung,hinh_anh,bao_hanh,trang_thai) VALUES('".$giasp."','".$soluong."','".$tensanpham."','".$danhmuc."','".$dungluongpin."','".$manhinh."','".$cpu."','".$ram."','".$thongtinchung."','".$hinhanh."','".$baohanh."','".$tinhtrang."')";
		mysqli_query($con,$sql_them);

move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);
$_SESSION['success_message_them'] = 1;

		header('Location:../../index.php?action=quanlysanpham&query=them');
}
elseif (isset($_POST['suasanpham'])) {
	if($hinhanh !=''){

		move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
	$sql = "SELECT * FROM san_pham WHERE id_san_pham= '$_GET[idsanpham]' LIMIT 1";
    $query = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/' . $row['hinh_anh']);
    }
	$sql_sua="UPDATE san_pham SET don_gia = '".$giasp."',so_luong= '".$soluong."',ten_san_pham= '".$tensanpham."',ma_danh_muc= '".$danhmuc."',dung_luong_pin= '".$dungluongpin."',man_hinh= '".$manhinh."',cpu = '".$cpu."',ram = '".$ram."',thong_tin_chung= '".$thongtinchung."',hinh_anh = '".$hinhanh."',bao_hanh= '".$baohanh."',trang_thai = '".$tinhtrang."'WHERE id_san_pham='$_GET[idsanpham]'";}
	else {$sql_sua="UPDATE san_pham SET don_gia = '".$giasp."',so_luong= '".$soluong."',ten_san_pham= '".$tensanpham."',ma_danh_muc= '".$danhmuc."',dung_luong_pin= '".$dungluongpin."',man_hinh= '".$manhinh."',cpu = '".$cpu."',ram = '".$ram."',thong_tin_chung= '".$thongtinchung."',bao_hanh= '".$baohanh."',trang_thai = '".$tinhtrang."'WHERE id_san_pham='$_GET[idsanpham]'";
	}
	// var_dump($sql_sua);exit;
		 mysqli_query($con,$sql_sua);
		

			
			header('Location:../../index.php?action=quanlysanpham&query=hienthi');
	}
else{


	$id=$_GET['id'];

   $sql="SELECT * FROM san_pham WHERE id_san_pham= '$id' LIMIT 1";
   $query= mysqli_query($con,$sql);
   while ($row= mysqli_fetch_array($query)) {
   	 unlink('uploads/'.$row['hinh_anh']);
   }

	$sql_xoa="DELETE FROM san_pham WHERE id_san_pham='".$id."'";
		mysqli_query($con,$sql_xoa);
			header('Location:../../index.php?action=quanlysanpham&query=hienthi');
}