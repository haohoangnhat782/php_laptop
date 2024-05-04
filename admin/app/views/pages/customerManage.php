<?php require_once 'app/views/pages/includes/header.php'; ?>

<?php $checkadd = 0; $checkedit = 0; $checkdelete = 0;
    if(isset($_SESSION['user_privilege'])){
        foreach ($_SESSION['user_privilege'] as $user_privilege) {
            if($user_privilege['privilege_id'] == 20)
            {
                $checkadd = 1;
            }
            if($user_privilege['privilege_id'] == 21)
            {
                $checkedit = 1;
            }
            if($user_privilege['privilege_id'] == 22)
            {
                $checkdelete = 1;
            }
        }
    }
?>
<link rel="stylesheet" href="assets/css/button.css">
<div class="card shadow mb-4" id="customerManage">
    <div class="d-flex justify-content-between card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách khách hàng</h6>
        <?php if($checkadd == 1){?>
            <button type="button" class="btn btn-success" id="btnadd" >Thêm khách hàng</button>
        <?php }?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Chức năng</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data['nguoidung'] as $user):  extract($user)?>
                    <tr>
                        <td><?php echo $id_nguoi_dung; ?></td>
                        <td><?php echo $ho_ten; ?></td>
                        <td><?php echo $dia_chi; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $so_dien_thoai; ?></td>
                        <td>
                            <?php if($checkedit == 1){?>
                            <button type="button" class="editButton" data-id="<?php echo $id_nguoi_dung; ?>" >Sửa</button>
                            <?php }?>
                            <?php if($checkdelete == 1){?>
                            <button type="button" class="delButton" data-id="<?php echo $id_nguoi_dung; ?>">Xóa</button>
                            <?php }?>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#btnadd").click(function(){
            var data = $('#customerManage');
            data.empty();
            $.ajax({
                url: 'app/views/pages/customerManage/addCustomer.php',
                type: 'POST',
                data: {},
                success: function(response) {
                    data.append(response);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function(){
        $(".editButton").click(function(){
            var data = $('#customerManage');
            data.empty();
            var id = $(this).data('id');
            console.log(id);
           
            <?php foreach ($data['nguoidung'] as $nguoidung):  extract($nguoidung)?>
            if (id == '<?php echo $id_nguoi_dung; ?>') {
                nguoidung = <?php echo json_encode($nguoidung); ?>;
            }
            <?php endforeach;?>
            
            <?php foreach ($data['tbl_taikhoan'] as $tbl_taikhoan):  extract($tbl_taikhoan)?>
            if (id == '<?php echo $MaTK; ?>') {
                tbl_taikhoan = <?php echo json_encode($tbl_taikhoan); ?>;
            }
            <?php endforeach;?>
            $.ajax({
                url: 'app/views/pages/customerManage/editCustomer.php',
                type: 'POST',
                data: {
                    nguoidung: JSON.stringify(nguoidung),
                    tbl_taikhoan: JSON.stringify(tbl_taikhoan)
                },
                success: function(response) {
                    data.append(response);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function(){
        $(".delButton").click(function(){
            var id = $(this).data('id');
            swal({
                title: "Xác nhận",
                text: "Bạn có chắc chắn muốn xóa?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: 'http://localhost/Project_Laptop/admin/customerManage/delete_customer',
                        type: 'POST',
                        data: {
                            id_nguoi_dung: id
                        },
                        success: function(response) {
                            var data = JSON.parse(response);
                            if(data.status == 'success'){
                                swal("Success", "Xóa thành công", "success")
                                .then((value) => {
                                    location.reload();
                                });
                            } else {
                                swal("Error", "Xóa thất bại", "error");
                            }
                        }
                    });
                }
            });
        });
    });
</script>

<?php require_once 'app/views/pages/includes/footer.php'; ?>