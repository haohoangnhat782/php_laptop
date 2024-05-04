<?php require_once 'app/views/pages/includes/header.php' ?>

<?php $checkadd = 0; $checkedit = 0; $checkdelete = 0;
    if(isset($_SESSION['user_privilege'])){
        foreach ($_SESSION['user_privilege'] as $user_privilege) {
            if($user_privilege['privilege_id'] == 8)
            {
                $checkadd = 1;
            }
            if($user_privilege['privilege_id'] == 9)
            {
                $checkedit = 1;
            }
            if($user_privilege['privilege_id'] == 10)
            {
                $checkdelete = 1;
            }
        }
    }
?>
<link rel="stylesheet" href="assets/css/button.css">
<div class="card shadow mb-4" id="categoryManage">
    <div class="d-flex justify-content-between card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách danh mục</h6>
        <?php if($checkadd == 1 || $checkedit == 1){?>
            <div class="form-group">
                <label for="ten_danh_muc" class="form-label" style="font-weight: bold;">Tên danh mục</label>
                <input type="text" id="ten_danh_muc" name="ten_danh_muc" class="form-control"
                    placeholder="Nhập tên danh mục">
            </div>
        <?php }?>
        <?php if($checkadd == 1){?>
            <button type="button" class="btn btn-success" id="btnadd" style="height: 38px;" >Thêm danh mục</button>
        <?php }?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Chức năng</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data['danhmuc'] as $category):  extract($category)?>
                    <tr>
                        <td><?php echo $id_danh_muc; ?></td>
                        <td><?php echo $ten_danh_muc; ?></td>
                        <td>
                            <?php if($checkedit == 1){?>
                            <button type="button" class="editButton" data-id="<?php echo $id_danh_muc; ?>">Sửa</button>
                            <?php }?>
                            <?php if($checkdelete == 1){?>
                            <button type="button" class="delButton" data-id="<?php echo $id_danh_muc; ?>">Xóa</button>
                            <?php }?>
                        </td>
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
    $(document).ready(function(){
        $("#btnadd").click(function(){
            ten_danh_muc = $("#ten_danh_muc");
            if(checkEmptyAndHighlight(ten_danh_muc)){
                swal("Error", "Vui lòng nhập đầy đủ thông tin", "error");
            } else {
                $.ajax({
                    url: "http://localhost/Project_Laptop/admin/categoryManage/add_category",
                    type: "POST",
                    data: {
                        ten_danh_muc: ten_danh_muc.val()
                    },
                    success: function(response) {
                        var data = JSON.parse(response);
                        if(data.status == 'success'){
                            swal("Success", "Thêm thành công", "success")
                            .then((value) => {
                                location.reload();
                            });
                        } else {
                            swal("Error", "Thêm thất bại", "error");
                        }
                        
                    }
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $(".editButton").click(function(){
            var id = $(this).data('id');
            ten_danh_muc = $("#ten_danh_muc");
            if(checkEmptyAndHighlight(ten_danh_muc)){
                swal("Error", "Vui lòng nhập đầy đủ thông tin", "error");
            } else {
                $.ajax({
                    url: "http://localhost/Project_Laptop/admin/categoryManage/edit_category",
                    type: "POST",
                    data: {
                        id: id,
                        ten_danh_muc: ten_danh_muc.val()
                    },
                    success: function(response) {
                        var data = JSON.parse(response);
                        if(data.status == 'success'){
                            swal("Success", "Sửa thành công", "success")
                            .then((value) => {
                                location.reload();
                            });
                        } else {
                            swal("Error", "Sửa thất bại", "error");
                        }
                        
                    }
                });
            }
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
                        url: 'http://localhost/Project_Laptop/admin/categoryManage/delete_category',
                        type: 'GET',
                        data: {
                            id: id
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

<?php require_once 'app/views/pages/includes/footer.php' ?>