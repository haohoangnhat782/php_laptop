
<?php $phieunhap = json_decode($_GET['phieunhap'], true);

?>
<div class="d-flex justify-content-between card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Chi tiết nhập hàng</h6>
    <!-- <button type="button" class="btn btn-primary" id="edit-NCC">Sửa nhà cung cấp</button> -->
</div>
<div class="container p-3">
    <div class="row d-flex justify-content-center">
    
        <div class="col-md-5">
            <div class="form-group">
                <label for="ten_ncc" class="form-label" style="font-weight: bold;"> Mã phiếu nhập:</label>
                <input readonly  type="text" id="ten_ncc" name="ten_ncc" class="form-control"
                    placeholder="Nhập tên NCC" value="<?php echo $phieunhap['ma_pn'] ?>">
            </div>
            <div class="form-group">
                <label for="ma_danh_muc" class="form-label" style="font-weight: bold;">Mã nhà cung cấp</label>
                <select readonly class="form-control" id="ma_danh_muc">
                    <?php $NCC = json_decode($_GET['NCC'], true);
                     foreach ($NCC as $item): 
                        if ($item['ma_ncc'] == $phieunhap['ma_ncc']) {?>
                    <option selected><?php
               
                     echo $item['ma_ncc'].'-'.$item['ten_ncc']; ?></option>

                    <?php } endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="ma_danh_muc" class="form-label" style="font-weight: bold;">Mã nhân viên</label>
                <select readonly class="form-control" id="ma_danh_muc">
                    <?php $user = json_decode($_GET['user'], true);
                     foreach ($user as $item): 
                        if ($item['id'] == $phieunhap['ma_NV']) {?>
                    <option selected><?php
               
                     echo $item['id'].'-'.$item['fullname']; ?></option>

                    <?php } endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="ten_ncc" class="form-label" style="font-weight: bold;">Tổng tiền:</label>
                <input readonly type="text" id="ten_ncc" name="ten_ncc" class="form-control"
                    placeholder="Nhập tên NCC" value="<?php echo number_format($phieunhap['tong_tien'], 0, ',', '.');   ?> đ">
            </div>
         
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã PN</th>
                        <th>Mã SP</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                     
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>ID</th>
                        <th>Mã PN</th>
                        <th>Mã SP</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                
                    </tr>
                </tfoot>
                <tbody>
    <?php 
    $chitiet = json_decode($_GET['chitiet'], true);
    $laptop = json_decode($_GET['laptop'], true);

    foreach ($chitiet as $chitiet_item):
    ?>
        <tr>
            <td><?php echo $chitiet_item['id']; ?></td>
            <td><?php echo $chitiet_item['ma_phieu_nhap']; ?></td>
            <td>
                <?php 
                foreach ($laptop as $laptop_item):
                    if ($chitiet_item['ma_san_pham'] == $laptop_item['id_san_pham']) {
                        echo $chitiet_item['ma_san_pham'] . ' - ' . $laptop_item['ten_san_pham'];
                        break; 
                    }
                endforeach;
                ?>
            </td>
            <td><?php echo number_format($chitiet_item['don_gia'],0,',','.'); ?></td>
            <td><?php echo $chitiet_item['so_luong']; ?></td>
            <td><?php echo number_format($chitiet_item['so_luong'] * $chitiet_item['don_gia'], 0, ',', '.'); ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>

            </table>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
$(document).ready(function() {
    $("input").on('input', function() {
        $(this).css('border', '1px solid #ced4da');
    });
   
});
</script>