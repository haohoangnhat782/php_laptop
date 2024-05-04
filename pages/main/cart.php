<head>
	<meta http-equiv="Cache-control" content="public">
	<link rel='stylesheet' type='text/css' href='css/cart.css' />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link href="https://panpic.vn/fontawesome/css/all.css" rel="stylesheet">
</head>

<body>
<?php


if (isset($_SESSION['insufficient_stock']) && $_SESSION['insufficient_stock'] === true) {
    echo "<script>alert('Xin lỗi, số lượng sản phẩm trong kho không đủ để thêm vào giỏ hàng.');</script>";
    unset($_SESSION['insufficient_stock']); 
}
?>
	<div class="container">
		<div id="shopping-cart">
			<div class="txt-heading">Shopping Cart</div>
			<?php
				// unset($_SESSION['cart']);
			if (isset($_SESSION["cart"]) && $_SESSION["cart"] != null) {
				if(isset($_SESSION['userId'])) {
				echo '<a role="button" id="btnPurchase" class="btn btn-outline-success" href="index.php?quanly=purchase">Thanh Toán</a>';}
				else{
					echo '<a role="button" id="btnPurchase" class="btn btn-outline-success" href="index.php?quanly=authenticate">Đăng nhập để thanh toán</a>';}
				
				echo '<a role="button" id="btnEmpty" class="btn btn-outline-danger" href="pages/main/themgiohang.php?xoatatca=1">Empty Cart</a>';
			}
			?>

			<table class="tbl-cart" cellpadding="10" cellspacing="1">
				<tbody>
					<tr>
						<th style="text-align:left;">STT</th>
						<th style="text-align:left;">Mã SP</th>
						<th style="text-align:left;">Name</th>

						<th style="text-align:right;" width="5%">Quantity</th>
						<th style="text-align:right;" width="10%">Unit Price</th>
						<th style="text-align:right;" width="10%">Price</th>
						<th style="text-align:center;" width="5%">Remove</th>
					</tr>
					<?php
					$total_quantity = 0;
					$total_price = 0;


					if (isset($_SESSION["cart"])) {
						$stt = 0;
						foreach ($_SESSION["cart"] as $item) {
							$item_price = $item["soluong"] * $item["giasp"];
					?>
							<tr>
								<td><?php echo $stt += 1 ?></td>
								<td><?php echo $item["masp"]; ?></td>
								<td><img src="admin/images/<?php echo $item["hinhanh"]; ?>" class="cart-item-image" /><?php echo $item["tensanpham"]; ?></td>

								<td style="text-align:right;"> 
								<a style="text-decoration: none;" href="pages/main/themgiohang.php?cong=<?php echo $item['id']?>">+</a>
        <?php echo $item['soluong'] ?>
<a style="text-decoration: none;" href="pages/main/themgiohang.php?tru=<?php echo $item['id']?>" >-</a></td>
								<td style="text-align:right;"><?php echo "" . number_format($item["giasp"], 0,'.',',');?></td>
								<td style="text-align:right;"><?php echo "" . number_format($item_price, 0,'.',','); ?></td>
								<td style="text-align:center;"><a href="pages/main/themgiohang.php?xoa=<?php echo $item['id']?>" class="btnRemoveAction"><img height="30px" width="30px" src="images/icons8-delete-48.png" alt="Remove Item" /></a></td>
							</tr>
						<?php

							$total_quantity += $item["soluong"];
							$total_price += ($item["giasp"] * $item["soluong"]);
						}
						?>

						<tr>
							<td colspan="4" align="right">Total:</td>
							<!-- <td align="right"><?php echo $total_quantity; ?></td> -->
							<td align="right" colspan="2"><strong><?php echo "$ " . number_format($total_price, 2); ?></strong></td>
							<td></td>
						</tr>

					<?php


					} else {
					?>
						<tr>
							<td colspan="8" style="text-align:center;">
								<p>Hiện tại giỏ hàng trống</p>
							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>