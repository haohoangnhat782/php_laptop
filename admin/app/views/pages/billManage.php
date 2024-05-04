<?php require_once 'app/views/pages/includes/header.php' ?>
<?php $checkdetail = 0; $checkedit_trangthai = 0;
    if(isset($_SESSION['user_privilege'])){
        foreach ($_SESSION['user_privilege'] as $user_privilege) {
            if($user_privilege['privilege_id'] == 7)
            {
                $checkdetail = 1;
            }
            if($user_privilege['privilege_id'] == 6)
            {
                $checkedit_trangthai = 1;
            }
        }
    }
?>
<link rel="stylesheet" href="assets/css/button.css">
<!-- DataTales Example -->
<div id="billManage">
    <div class="card shadow mb-4">
        <div class="d-flex justify-content-between card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng</h6>
            <!-- <button type="button" class="btn btn-success" id="btnadd" >Thêm sản phẩm</button> -->
            <div class="fill-chart" style="display: flex;">
                <div class="form-group" style="padding: 0px 20px;">
                    <label for="criteria">Chọn tiêu chí:</label>
                    <select class="form-control" id="criteria">
                        <option value="">--Chọn tiêu chí--</option>
                        <option value="day">Ngày</option>
                        <option value="month">Tháng</option>
                        <option value="year">Năm</option>
                    </select>
                </div>
                <div class="form-group criteria-input" id="day-input" style="display: none;">
                    <label for="chose-day-hot">Chọn ngày:</label>
                    <input type="date" class="form-control chose-day-hot" id="chose-day-hot">
                </div>
                <div class="form-group criteria-input" id="month-input" style="display: none;">
                    <label for="chose-month-hot">Chọn tháng:</label>
                    <input type="month" class="form-control chose-month-hot" id="chose-month-hot">
                </div>
                <div class="form-group criteria-input" id="year-input" style="display: none;">
                    <label for="chose-year-hot">Chọn năm:</label>
                    <input type="number" class="form-control chose-year-hot" id="chose-year-hot">
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ tên Khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Ngày đặt hàng</th>
                            <th>Trạng thái đơn hàng</th>
                            <th>Mã Khách hàng</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Họ tên Khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Ngày đặt hàng</th>
                            <th>Trạng thái đơn hàng</th>
                            <th>Mã Khách hàng</th>
                            <th>Chức năng</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($data['donhang'] as $donhang):  extract($donhang)?>
                        <tr>
                            <td><?php echo $id_don_hang; ?></td>
                            <td><?php echo $ho_ten_nguoi_nhan; ?></td>
                            <td><?php echo $dia_chi_nhan; ?></td>
                            <td><?php echo $sdt_nhan_hang; ?></td>
                            <td><?php echo $ngay_dat_hang; ?></td>
                            <td>
                                <?php if($checkedit_trangthai == 1){ ?>
                                <select class="trang_thai_don_hang">
                                    <option value="0" <?php echo $trang_thai_don_hang == 0 ? 'selected' : ''; ?>>Chưa xử
                                        lý</option>
                                    <option value="1" <?php echo $trang_thai_don_hang == 1 ? 'selected' : ''; ?>>Đã xử
                                        lý</option>
                                </select>
                                <?php } else { ?>
                                <select class="trang_thai_don_hang" disabled>
                                    <option value="0" <?php echo $trang_thai_don_hang == 0 ? 'selected' : ''; ?>>Chưa xử
                                        lý</option>
                                    <option value="1" <?php echo $trang_thai_don_hang == 1 ? 'selected' : ''; ?>>Đã xử
                                        lý</option>
                                </select>
                                <?php }?>
                            </td>
                            <td><?php echo $ma_nguoi_dat; ?></td>
                            <td>
                                <?php
                                    if($checkdetail == 1){
                                        echo '<button type="button" class="detailButton" data-id="'.$id_don_hang.'">Chi tiết</button>';
                                    }
                                ?>
                                <!-- <button type="button" class="detailButton" data-id="<?php echo $id_don_hang; ?>"
                                    id="btndetail">Chi tiết</button> -->
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $(".detailButton").click(function() {
        var data = $('#billManage');
        data.empty();
        var id_don_hang = $(this).data('id');
        console.log(id_don_hang);
        <?php foreach ($data['donhang'] as $donhang):  extract($donhang)?>
        if (id_don_hang == <?php echo $id_don_hang; ?>) {
            donhang = <?php echo json_encode($donhang); ?>;
        }
        <?php endforeach;?>
        let chitietdonhang = [];
        let laptop = [];
        <?php foreach ($data['chitietdonhang'] as $chitietdonhang):  extract($chitietdonhang)?>
        if (id_don_hang == <?php echo $ma_don_hang; ?>) {
            chitietdonhang.push(<?php echo json_encode($chitietdonhang);?>);
            <?php foreach ($data['laptop'] as $laptop):  extract($laptop)?>
            if (<?php echo $id_san_pham; ?> == <?php echo $ma_san_pham; ?>) {
                laptop.push(<?php echo json_encode($laptop); ?>);
            }
            <?php endforeach;?>
        }
        <?php endforeach;?>
        console.log(donhang);
        console.log(chitietdonhang);
        console.log(laptop);
        $.ajax({
            url: 'app/views/pages/billManage/detailBill.php',
            type: 'GET',
            data: {
                donhang: JSON.stringify(donhang),
                chitietdonhang: JSON.stringify(chitietdonhang),
                laptop: JSON.stringify(laptop)
            },
            success: function(response) {
                data.append(response);
            }
        });
    });
});
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).ready(function() {
    $('.trang_thai_don_hang').change(function() {
        var selectedValue = $(this).val();
        var id_don_hang = $(this).closest('tr').find('.detailButton').data('id');
        console.log(selectedValue);
        console.log(id_don_hang);
        $.ajax({
            url: 'http://localhost/Project_Laptop/admin/billManage/update_trangthaidonhang', // Replace with your Controller method path
            type: 'POST',
            data: {
                trang_thai_don_hang: selectedValue,
                id_don_hang: id_don_hang
            },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status == 'success') {
                    swal("Success", "Cập nhật trạng thái đơn hàng thành công", "success")
                }
            }
        });
    });
});
</script>
<script>
    document.getElementById('chose-year-hot').value = new Date().getFullYear();
    let date;
    $(document).ready(function() {
        $('#criteria').on('change', function() {
            // Ẩn tất cả các input
            $('.criteria-input').hide();
            // Hiển thị input tương ứng với tiêu chí được chọn
            var selectedCriteria = $(this).val();
            if (selectedCriteria) {
                date = '#chose-' + selectedCriteria + '-hot';
                $('#' + selectedCriteria + '-input').show();
                console.log(date);
                $(date).on('change', function() {
                    if (selectedCriteria == 'year') {
                        var selectedDateYear = $(this).val();
                        var selectedDateMonth = null;
                        var selectedDateDay = null;
                    }
                    if (selectedCriteria == 'month') {
                        var selectedDateMonth = $(this).val();
                        var selectedDateYear = null;
                        var selectedDateDay = null;
                    }
                    if (selectedCriteria == 'day') {
                        var selectedDateDay = $(this).val();
                        var selectedDateMonth = null;
                        var selectedDateYear = null;
                    }
                    $.ajax({
                        url: 'http://localhost/Project_Laptop/admin/billManage/fill',
                        type: 'GET',
                        data: {
                            day: selectedDateDay,
                            month: selectedDateMonth,
                            year: selectedDateYear
                        },
                        success: function(response) {
                            console.log(response);
                            var result = JSON.parse(response);
                            var data = Object.values(result.combined_chitietdonhang);
                            console.log(data);
                            var table = $('#dataTable tbody');
                            table.empty();
                            data.forEach(function(item) {
                                var hmtl = `
                                <tr>
                                    <td><?php echo $id_don_hang; ?></td>
                                    <td><?php echo $ho_ten_nguoi_nhan; ?></td>
                                    <td><?php echo $dia_chi_nhan; ?></td>
                                    <td><?php echo $sdt_nhan_hang; ?></td>
                                    <td><?php echo $ngay_dat_hang; ?></td>
                                    <td>
                                        <?php if($checkedit_trangthai == 1){ ?>
                                        <select class="trang_thai_don_hang">
                                            <option value="0" <?php echo $trang_thai_don_hang == 0 ? 'selected' : ''; ?>>Chưa xử
                                                lý</option>
                                            <option value="1" <?php echo $trang_thai_don_hang == 1 ? 'selected' : ''; ?>>Đã xử
                                                lý</option>
                                        </select>
                                        <?php } else { ?>
                                        <select class="trang_thai_don_hang" disabled>
                                            <option value="0" <?php echo $trang_thai_don_hang == 0 ? 'selected' : ''; ?>>Chưa xử
                                                lý</option>
                                            <option value="1" <?php echo $trang_thai_don_hang == 1 ? 'selected' : ''; ?>>Đã xử
                                                lý</option>
                                        </select>
                                        <?php }?>
                                    </td>
                                    <td><?php echo $ma_nguoi_dat; ?></td>
                                    <td>
                                        <?php
                                            if($checkdetail == 1){
                                                echo '<button type="button" class="detailButton" data-id="'.$id_don_hang.'">Chi tiết</button>';
                                            }
                                        ?>
                                        <!-- <button type="button" class="detailButton" data-id="<?php echo $id_don_hang; ?>"
                                            id="btndetail">Chi tiết</button> -->
                                    </td>
                                </tr>
                                `;
                                table.append(hmtl);
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {

                            console.error(textStatus, errorThrown);
                        }
                    });
                });
            }
        });
    });
</script>
<?php require_once 'app/views/pages/includes/footer.php' ?>