<head>
    <meta http-equiv="Cache-control" content="public">
    <link rel='stylesheet' type='text/css' href='css/cart.css' />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://panpic.vn/fontawesome/css/all.css" rel="stylesheet">
</head>


<body>
<div class="container">
	<div id="shopping-cart">
		<div class="txt-heading">Shopping Cart </br></div>
		<!-- <a id="btnEmpty">Empty Cart</a> -->
		<table style="width: 100%; text-align: center; border-collapse: collapse;" border="1"; >
			<!-- <table style="width: 100%; text-align: center; border-collapse: collapse;" class="tbl-cart" cellpadding="10" cellspacing="1"  border="1" ;> -->
			
					<tr>
					<th  >Id</th>
						<th  >Mã SP</th>
						<th >Tên sản phẩm</th>
						<th >Hình ảnh</th>
						<th >Số lượng</th>
						<th >Giá</th>
						<th >Thành tiền</th>
						<th >Remove</th>
					</tr>
					<?php 
if (isset($_SESSION['cart'])) {
    $i=0;
    $tongtien=0;
   foreach($_SESSION['cart'] as $cart_item){
      $thanhtien=$cart_item['soluong']*$cart_item['giasp'];
      $tongtien+=$thanhtien;
$i++;
   ?>
						<tr  >
						   <td style="text-align:center;"><?php echo $i ?></td>
						   <td style="text-align:center;"><?php echo $cart_item['masp'] ?></td>
						   <td style="text-align:center;"><?php echo $cart_item['tensanpham'] ?></td>

							<td style="text-align:center;"> <img height="150px" width="150px" src="images/<?php echo $cart_item['hinhanh'] ?>"> </td>
							<td style="text-align:center;">  <a style="text-decoration: none;" href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id']?>">+</a>
        <?php echo $cart_item['soluong'] ?>
<a style="text-decoration: none;" href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id']?>" >-</a></td>
							<td style="text-align:center;"> <?php echo $cart_item['giasp'] ?> </td>
							<td style="text-align:center;"> <?php echo $thanhtien ?> </td>
				
							<td style="text-align:center;"><a href="" class="btnRemoveAction"><img  height="30px" width="30px" src="images/icons8-delete-48.png" alt="Remove Item" /></a></td>
						</tr>
					<?php
					 }
					?>

<tr><td colspan="8" > <p style="float: left;">Tổng tiền: <?php echo $tongtien ?></p>
    
   <p style="float: right;"><a href="pages/main/themgiohang.php?xoatatca=1">Xóa tất cả</a></p>

</div>

					
  <?php 
}else{
   ?>
<tr>
    <td colspan="8" style="text-align:center;"> <p >Hiện tại giỏ hàng trống</p> </td>
</tr>
   <?php 
}
    ?>
	
			</table>
	</div>
</body>
</div>
