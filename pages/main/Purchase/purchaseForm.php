<?php

$fullname = "";
$phoneNumber = "";
$address = "";
$shoppingCart;

if (isset($_SESSION["login"]) && isset($_SESSION["userId"])) {
    if ($_SESSION["login"] == true) {
        $userId = $_SESSION["userId"];
        $query = "SELECT ho_ten, so_dien_thoai, dia_chi FROM nguoi_dung WHERE id_nguoi_dung = '$userId'";
        $user = $mysqli->query($query);
        $row = $user->fetch_assoc();
        $fullname = $row["ho_ten"];
        $phoneNumber = $row["so_dien_thoai"];
        $address = $row["dia_chi"];

        if (isset($_SESSION["cart"])) {
            if ($_SESSION["cart"] != null) {
                $shoppingCart = $_SESSION["cart"];
            } else {
                $shoppingCart = array();
            }
        }
    }
}
?>

<div class="list-products">
    <div class="product-cart1">
        <?php
        $total_price = 0;
        $total_item = 0;
        foreach ($shoppingCart as $item) {
            $item_price = $item["soluong"] * $item["giasp"];
            $total_price += $item["soluong"] * $item["giasp"];
            $total_item += $item["soluong"];
        ?>
            <div class="product-cart">
                <div class="product-image text-center">
                    <a href="" title="<?php echo $item["tensanpham"]; ?>">
                        <img src="admincp/modules/qlsanpham/uploads/<?php echo $item["hinhanh"]; ?>" alt="hình ảnh sản phẩm" class="img-responsive">
                    </a>
                </div>
                <div class="product-detail">
                    <div class="top_detail">
                        <a class="product-name" href="" title="<?php echo $item["tensanpham"]; ?>">
                            <?php echo $item["tensanpham"]; ?>
                        </a>
                    </div>
                </div>
                <div class="product-price hidden-xs">
                    <div class="fee">
                        <p class="price-item">
                            <?php echo "$ " . number_format($item_price, 2); ?>
                        </p>
                    </div>
                    <div class="quan">
                        <span class="number-input">
                            <button type="button" onclick="down_quantity(<?php echo $item['masp'] ?>)" class="down"></button>
                            <input type="text" readonly name="quantity_<?php echo $item['masp'] ?>" maxlength="5" value="<?php echo $item["soluong"]; ?>" onchange="change_quantity(<?php echo $item['masp'] ?>)">
                            <button type="button" onclick="up_quantity(<?php echo $item['masp'] ?>)" class="plus"></button>
                        </span>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<div class="total-price-products">
    <p class="total_end">Tổng tiền (<?php echo $total_item ?>) sản phẩm:
        <span id="total_money"><?php echo "$ " . number_format($total_price, 2); ?></span>
    </p>
</div>