<?php 
include('../../config/connect_db.php');
$tendanhmuc=$_POST['tendanhmuc'];

if(isset($_POST['themdanhmuc'])){
	$sql_them="INSERT INTO danh_muc(ten_danh_muc) VALUES('".$tendanhmuc."')";
		mysqli_query($con,$sql_them);
		header('Location:../../index.php?action=quanlydanhmuc&query=hienthi');
}
elseif (isset($_POST['suadanhmuc'])) {
$sql_sua="UPDATE danh_muc SET ten_danh_muc='".$tendanhmuc."' WHERE id_danh_muc='$_GET[id]'";
		mysqli_query($con,$sql_sua);
		header('Location:../../index.php?action=quanlydanhmuc&query=hienthi');
}else{
	
	$sql_xoa="DELETE FROM danh_muc WHERE id_danh_muc='$_GET[id]'";
		mysqli_query($con,$sql_xoa);
        header('Location:../../index.php?action=quanlydanhmuc&query=hienthi');
}

 ?>