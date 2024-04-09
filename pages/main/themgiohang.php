<?php 
session_start();
include("../../config/config.php");



//Xoa tat ca 
if(isset($_GET['xoatatca'])&&$_GET['xoatatca']==1){
	unset($_SESSION['cart']);
	header('Location:../../index.php?quanly=giohang');
}
//them san pham vao gio hang

if(isset($_POST['themgiohang'])){

	$id=$_GET['idsanpham'];
	$soluong=1;
	$sql="SELECT * FROM san_pham WHERE  id_san_pham='".$id."' LIMIT 1";
	$query_sp=mysqli_query($mysqli,$sql);
	$row=mysqli_fetch_array($query_sp);
	if ($row) {
		 // session_destroy();
		$new_product=array(array('tensanpham'=>$row['ten_san_pham'],'id'=>$id,'soluong'=>$soluong,'giasp'=>$row['don_gia'],'hinhanh'=>$row['hinh_anh'],'masp'=>$row['id_san_pham']));
		if(isset($_SESSION['cart'])){
			$found=false;
			foreach ($_SESSION['cart'] as $cart_item) {
				if ($cart_item['id']==$id) {
					$product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=> $cart_item['soluong']+1,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
					$found=true;

				}else{
					$product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=> $cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				}
			}
				if($found==false){
					$_SESSION['cart']=array_merge($product,$new_product);
				}else{
					$_SESSION['cart']=$product;
				}
			}else{
				$_SESSION['cart']=$new_product;
			}
		}
 header('Location:../../index.php?quanly=giohang');
	}


?>