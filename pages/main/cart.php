<?php

if (!isset($_SESSION["user"]) || empty($_SESSION["user"])) {
	echo "<script type='text/javascript'>window.top.location='index.php?quanly=authenticate';</script>"; exit;
exit();
}
?>
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
			<div class="txt-heading">Shopping Cart</div>

			<a id="btnEmpty" href="pages/main/themgiohang.php?xoatatca=1">Empty Cart</a>
			<table class="tbl-cart" cellpadding="10" cellspacing="1">
				<tbody>
					<tr>
						<th style="text-align:left;">Name</th>
						<th style="text-align:left;">Code</th>
						<th style="text-align:right;" width="5%">Quantity</th>
						<th style="text-align:right;" width="10%">Unit Price</th>
						<th style="text-align:right;" width="10%">Price</th>
						<th style="text-align:center;" width="5%">Remove</th>
					</tr>
					<?php
					$total_quantity = 0;
					$total_price = 0;
					if (isset($_SESSION["cart"])) {
						foreach ($_SESSION["cart"] as $item) {
							$item_price = $item["soluong"] * $item["giasp"];
					?>
							<tr>
								<td><img src="images/<?php echo $item["hinhanh"]; ?>" class="cart-item-image" /><?php echo $item["tensanpham"]; ?></td>
								<td><?php echo $item["masp"]; ?></td>
								<td style="text-align:right;"><?php echo $item["soluong"]; ?></td>
								<td style="text-align:right;"><?php echo "$ " . $item["giasp"]; ?></td>
								<td style="text-align:right;"><?php echo "$ " . number_format($item_price, 2); ?></td>
								<td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["masp"]; ?>" class="btnRemoveAction"><img height="30px" width="30px" src="images/icons8-delete-48.png" alt="Remove Item" /></a></td>
							</tr>
						<?php

							$total_quantity += $item["soluong"];
							$total_price += ($item["giasp"] * $item["soluong"]);
						}
						?>

						<tr>
							<td colspan="2" align="right">Total:</td>
							<td align="right"><?php echo $total_quantity; ?></td>
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