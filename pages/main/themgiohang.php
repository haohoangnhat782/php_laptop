<?php
session_start();
include("../../config/config.php");



//Xoa tat ca 
if (isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1) {
	foreach ($_SESSION['cart'] as $cart_item) {
        $id = $cart_item['id'];
        $deleted_quantity = $cart_item['soluong'];
        $update_sql = "UPDATE san_pham SET so_luong = so_luong + $deleted_quantity WHERE id_san_pham = $id";
        mysqli_query($mysqli, $update_sql);
    }
	unset($_SESSION['cart']);
	header('Location:../../index.php?quanly=giohang');
}
//them san pham vao gio hang

if (isset($_POST['themgiohang'])) {

	$id = $_GET['idsanpham'];
	$soluong = 1;
	$sql = "SELECT * FROM san_pham WHERE  id_san_pham='" . $id . "' LIMIT 1";
	$query_sp = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_array($query_sp);
	if ($row) {
		// session_destroy();
		$new_product = array(array('tensanpham' => $row['ten_san_pham'], 'id' => $id, 'soluong' => $soluong, 'giasp' => $row['don_gia'], 'hinhanh' => $row['hinh_anh'], 'masp' => $row['id_san_pham']));
		if (isset($_SESSION['cart'])) {
			$found = false;
			foreach ($_SESSION['cart'] as $cart_item) {
				if ($cart_item['id'] == $id) {
					$product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'] + 1, 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
					$found = true;
				
				} else {
					$product[] = array('tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'], 'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']);
				}
			}
			if ($found == false) {
				$_SESSION['cart'] = array_merge($product, $new_product);
	
		
			} else {
				$_SESSION['cart'] = $product;
			}
		} else {
			$_SESSION['cart'] = $new_product;
		}
	}

	header('Location:../../index.php?quanly=giohang');
}
//COng sp
if( isset($_GET['cong'])){
	$id=$_GET['cong'];
	$sql_soluong = "SELECT * from san_pham WHERE id_san_pham = $id";
	$query_sl=mysqli_query($mysqli, $sql_soluong);
	$row=mysqli_fetch_array($query_sl);
	if ($row['so_luong'] <= 0) {
		$_SESSION['insufficient_stock'] = true; 
		header('Location:../../index.php?quanly=giohang');
	} else{


	foreach($_SESSION['cart'] as $cart_item){

		if ($cart_item['id']!=$id) {
			$product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=> $cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				$_SESSION['cart']=$product;
		}else{
          $tangsoluong=$cart_item['soluong']+1;
		
             if( $row['so_luong']>=$tangsoluong){
             
             	$product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=> $tangsoluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
			
			 
             }else{
				$_SESSION['insufficient_stock'] = true; 
             	$product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=> $cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
             }	$_SESSION['cart']=$product;

		
	}}
		
	header('Location:../../index.php?quanly=giohang');
	
}


}


//tru sp
if( isset($_GET['tru'])){
	$id=$_GET['tru'];
	foreach($_SESSION['cart'] as $cart_item){

		if ($cart_item['id']!=$id) {
			$product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=> $cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				$_SESSION['cart']=$product;
		}else{
          $giamsoluong=$cart_item['soluong']-1;
             if($cart_item['soluong']>1){
             	   
             	$product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=> $giamsoluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
				 $update_quantity_sql = "UPDATE san_pham SET so_luong = so_luong + 1 WHERE id_san_pham = $id";
				 mysqli_query($mysqli, $update_quantity_sql);
             }else{
             	$product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=> $cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
             }	$_SESSION['cart']=$product;

		}
		header('Location:../../index.php?quanly=giohang');
}
	}


//Xoa sp
if(isset($_SESSION['cart'])&& isset($_GET['xoa'])){
	$id=$_GET['xoa'];
	foreach($_SESSION['cart'] as $cart_item){
         
		if ($cart_item['id']!=$id) {
			$product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=> $cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
		}
		else{

				$deleted_quantity = $cart_item['soluong'];
				$update_sql = "UPDATE san_pham SET so_luong = so_luong + $deleted_quantity WHERE id_san_pham = $id";
				mysqli_query($mysqli, $update_sql);
			
		}
	}
	$_SESSION['cart']=$product;
	header('Location:../../index.php?quanly=giohang');
}

// Xóa sản phẩm khỏi giỏ hàng
// if(isset($_SESSION['cart']) && isset($_GET['xoa'])){
// 	$id = $_GET['xoa'];
// 	foreach($_SESSION['cart'] as $key => $cart_item){
// 		if ($cart_item['id'] == $id) {
// 			// Lấy số lượng sản phẩm trước khi xóa
// 			$deleted_quantity = $cart_item['soluong'];
// 			// Cập nhật lại số lượng sản phẩm trong cơ sở dữ liệu
// 			$update_sql = "UPDATE san_pham SET so_luong = so_luong + $deleted_quantity WHERE id_san_pham = $id";
// 			mysqli_query($mysqli, $update_sql);
// 			// Xóa sản phẩm khỏi giỏ hàng
// 			unset($_SESSION['cart'][$key]);
// 			break; // Kết thúc vòng lặp sau khi xóa sản phẩm
// 		}
// 	}
// 	// Cập nhật lại giỏ hàng sau khi xóa sản phẩm
// 	$_SESSION['cart'] = array_values($_SESSION['cart']);
// 	header('Location:../../index.php?quanly=giohang');
// }
