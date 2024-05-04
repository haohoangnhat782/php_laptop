<?php
    require_once 'app/views/pages/includes/header.php';
?>
<link rel="stylesheet" href="assets/css/button.css">
<!-- DataTales Example -->
<div class="card shadow mb-4" id="NCCManage">
    <div class="d-flex justify-content-between card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách nhà cung cấp</h6>
<?php $checkedit = 0; $checkdelete = 0;
            if(isset($_SESSION['user_privilege'])){
                foreach ($_SESSION['user_privilege'] as $user_privilege) {
                    if($user_privilege['privilege_id'] == 26)
                    {
                        echo ' <button type="button" class="btn btn-success" id="btnadd" >Thêm nhà cung cấp</button>';
                    }
                    if($user_privilege['privilege_id'] == 27)
                    {
                        $checkedit = 1;
                    }
                    if($user_privilege['privilege_id'] == 35)
                    {
                        $checkdelete = 1;
                    }
            }
        }
        ?> 
       
        <!-- <button type="button" class="btn btn-success" id="btnadd" >Thêm sản phẩm</button> -->
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>ID</th>
                        <th>Tên</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Chức năng</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data['NCC'] as $NCC):  extract($NCC)?>
                    <tr>
                        <td><?php echo $ma_ncc; ?></td>
                   
                        <td><?php echo $ten_ncc; ?></td>
                        <td><?php echo $dia_chi; ?></td>
                        <td><?php echo $sdt; ?></td>
                 
                        <td>
                            <!-- <input type="hidden" name="ma_ncc" value="<?php echo $ma_ncc; ?>"> -->
                            <?php
    if ($checkedit == 1) {
        echo '<button type="button" class="editButton" data-id="' . $ma_ncc . '" id="btnedit">Sửa</button>';
    }
    if ($checkdelete == 1) {
        echo '<button type="button" class="delButton" id="btndelete" data-id="' . $ma_ncc . '">Xóa</button>';
    }
?>
                             <!-- <button type="button" class="detailButton">Chi tiết</button> -->
                          
                             
                            <!-- <button type="button" class='detailButton'>Chi tiết</button>
                            <button type="button" class="editButton" data-toggle="modal" data-target="#exampleModal"
                                data-id="<?php echo $id_don_hang; ?>" id="btnedit">Sửa</button> -->
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).ready(function() {
    $("#btnadd").click(function() {
        var data = $('#NCCManage');
        data.empty();
        $.ajax({
            url: 'app/views/pages/NCCManage/addNCC.php',
            type: 'GET',
            data: {
                NCC: JSON.stringify(<?php echo json_encode($data['NCC']) ?>)
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
        $(".editButton").click(function(){
            var data = $('#NCCManage');
            data.empty();
            var id = $(this).data('id');
            <?php foreach ($data['NCC'] as $NCC):  extract($NCC)?>
            if (id == <?php echo $ma_ncc; ?>) {
                NCC = <?php echo json_encode($NCC); ?>;
            }
            <?php endforeach;?>
            $.ajax({
                url: 'app/views/pages/NCCManage/editNCC.php',
                type: 'GET',
                data: {
                    NCC: JSON.stringify(NCC)
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
                        url: 'http://localhost/Project_Laptop/admin/NCCManage/delete_NCC',
                        type: 'POST',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            var data = JSON.parse(response);
                            if (data.status == 'success') {
                                swal("Success", "Xóa thành công", "success")
                                .then((value) => {
                                    location.reload();
                                });
                            }
                        }
                    });
                }
            });
        });
    });
</script>
<?php
    require_once 'app/views/pages/includes/footer.php';
?>