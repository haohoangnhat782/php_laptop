<?php 
$donhang = json_decode($_GET['donhang'], true);
$chitietdonhang = json_decode($_GET['chitietdonhang'], true);
$laptop = json_decode($_GET['laptop'], true);
$totalDonGia = 0;
foreach ($chitietdonhang as $item) {
    $totalDonGia += $item['don_gia'];
}
?>
<div class="card shadow mb-4">
        <div class="d-flex justify-content-between card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Chi tiết đơn hàng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền đơn hàng: <?php echo $totalDonGia .' VND' ?></th>
                            
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Image</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền đơn hàng: <?php echo $totalDonGia .' VND' ?></th>
                           
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($chitietdonhang as $item) {
                        ?>
                        <tr>
                            <?php foreach ($laptop as $item2){ ?>
                                <?php if($item2['id_san_pham'] == $item['ma_san_pham']){ ?>
                                    <td><img src="images/<?php echo $item2['hinh_anh'] ?>" alt="" style="width: 200px;">
                                    </td>
                                    <td><?php echo $item2['ten_san_pham'] ?></td>
                                <?php } ?>
                            <?php } ?>
                            <td><?php echo $item['so_luong'] ?></td>
                            <td><?php echo $item['don_gia'] ?> VND</td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>