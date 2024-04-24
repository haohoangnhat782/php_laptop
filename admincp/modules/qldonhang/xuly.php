<?php 
include('../../../connect_db.php');


if(isset($_GET['set_trang_thai'])&&isset($_GET['id_don_hang'])){
    $id=$_GET['id_don_hang'];
	$sql_update="UPDATE don_hang set trang_thai_don_hang =0 where id_don_hang='".$id."'";
		mysqli_query($con,$sql_update);
		header('Location:../../index.php?action=quanlydonhang&query=hienthi');
}

 ?>