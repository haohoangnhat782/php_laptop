<?php
include "../../../../config/config.php";
session_start();

$ma_nguoi_dat = $_SESSION['userId']; 
$sql = "SELECT * FROM don_hang WHERE ma_nguoi_dat = '" . $ma_nguoi_dat. "'";



$result = mysqli_query($mysqli, $sql);

if ($result->num_rows > 0) {

    $don_hang_array = array();


    while ($row = $result->fetch_assoc()) {
        $don_hang = array(
            "ma_don_hang" => $row["id_don_hang"],
            "dia_chi_nhan" => $row["dia_chi_nhan"],
            "ghi_chu" => $row["ghi_chu"],
            "ho_ten_nguoi_nhan" => $row["ho_ten_nguoi_nhan"],
            "ngay_dat_hang" => $row["ngay_dat_hang"],
            "ngay_giao_hang" => $row["ngay_giao_hang"],
            "ngay_nhan_hang" => $row["ngay_nhan_hang"],
            "sdt_nhan_hang" => $row["sdt_nhan_hang"],
            "trang_thai_don_hang" => $row["trang_thai_don_hang"],
            "ma_nguoi_dat" => $row["ma_nguoi_dat"],
            "ma_NV" => $row["ma_NV"]
        );
        $don_hang_array[] = $don_hang;
    }
}


?>


<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }
    .profile-content {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }
    .profile-content-title {
        text-align: center;
        color: #333;
    }
    .list-order-member {
        margin-top: 20px;
    }
    .order-item {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
        transition: all .2s;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .order-item:hover{
        transform: scale(1.002) translateY(2px);
        background-color: rgb(249, 146, 15);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    .order-item p {
        margin: 5px 0;
    }
    .order-item p:first-child {
        font-weight: bold;
        color: #333;
    }
    .no-order-message {
        text-align: center;
        color: #888;
    }
</style>
<body>
    <div class="profile-content">
        <h2 class="profile-content-title">Quản lý đơn hàng</h2>
        <div class="list-order-member">
            <?php
            if (!empty($don_hang_array)) {
                foreach ($don_hang_array as $don_hang) {
                    $sql_chitet="SELECT * FROM chi_tiet_don_hang where ma_don_hang='".$don_hang["ma_don_hang"]."' ";
                    $result_chitet = mysqli_query($mysqli, $sql_chitet);
                    $total_amount = 0; 
                    while ($chitiet_row= mysqli_fetch_array($result_chitet)) {
                        $total_amount += $chitiet_row['so_luong'] * $chitiet_row['don_gia'];
                    }
                    $total_amount = number_format($total_amount, 0, ',', '.');
                    echo "<div class='order-item'>";
                    echo "<p>Mã đơn hàng: " . $don_hang["ma_don_hang"] . "</p>";
                    echo "<p>Ngày đặt hàng: " . $don_hang["ngay_dat_hang"] . "</p>";
                    echo "<p>Tổng tiền: " . $total_amount . " VNĐ</p>"; 
                    echo "<p>Trạng thái đơn hàng: " . ($don_hang["trang_thai_don_hang"] == 0 ? "Đang xử lí" : ($don_hang["trang_thai_don_hang"] == 1 ? "Đã xử lý" : "Đã giao thành công")) . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p class='no-order-message'>Bạn chưa thực hiện bất kỳ đơn đặt hàng nào trước đó!</p>";
            }
            ?>
        </div>
    </div>
</body>