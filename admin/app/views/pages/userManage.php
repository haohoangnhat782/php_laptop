<?php require_once 'app/views/pages/includes/header.php' ?>
<?php $checkadd = 0; $checkedit = 0; $checkdelete = 0; $checkdecen = 0;
    if(isset($_SESSION['user_privilege'])){
        foreach ($_SESSION['user_privilege'] as $user_privilege) {
            if($user_privilege['privilege_id'] == 11)
            {
                $checkadd = 1;
            }
            if($user_privilege['privilege_id'] == 12)
            {
                $checkdecen = 1;
            }
            if($user_privilege['privilege_id'] == 13)
            {
                $checkedit = 1;
            }
            if($user_privilege['privilege_id'] == 14)
            {
                $checkdelete = 1;
            }
        }
    }
?>
<link rel="stylesheet" href="assets/css/button.css">
<div class="card shadow mb-4" id="userManage">
    <div class="d-flex justify-content-between card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách thành viên</h6>
        <?php if($checkadd == 1){?>
        <button type="button" class="btn btn-success" id="btnadd" >Thêm thành viên</button>
        <?php }?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User name</th>
                        <th>Password</th>
                        <th>Full name</th>
                        <th>Tình trạng tài khoản</th>
                        <th>Ngày tạo tài khoản</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>User name</th>
                        <th>Password</th>
                        <th>Full name</th>
                        <th>Tình trạng tài khoản</th>
                        <th>Ngày tạo tài khoản</th>
                        <th>Chức năng</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data['user'] as $user):  extract($user)?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $password; ?></td>
                        <td><?php echo $fullname; ?></td>
                        <td>
                            <?php if ($TTTK == 1) {
                                echo 'Tài khoản đang mở';
                            } else {
                                echo 'Tài khoản đang khóa';
                            }?>
                        </td>
                        <td><?php echo $Ngay_tao; ?></td>
                        <td>
                            <?php if($checkedit == 1){?>
                            <button type="button" class="editButton" id="btnedit" data-id="<?php echo $id; ?>" >Sửa</button>
                            <?php }?>
                            <?php if($checkdelete == 1){?>
                            <button type="button" class="delButton" id="btndelete" data-id="<?php echo $id; ?>">Xóa</button>
                            <?php }?>
                            <?php if($checkdecen == 1){?>
                            <button type="button" class="manageButton" id="btnmanage" data-id="<?php echo $id; ?>">Phân quyền</button>
                            <?php }?>
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
    $(document).ready(function(){
        $("#btnadd").click(function(){
            var data = $('#userManage');
            data.empty();
            $.ajax({
                url: 'app/views/pages/userManage/addUser.php',
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
            var data = $('#userManage');
            data.empty();
            var id = $(this).data('id');
            <?php foreach ($data['user'] as $user):  extract($user)?>
            if (id == <?php echo $id; ?>) {
                user = <?php echo json_encode($user); ?>;
            }
            <?php endforeach;?>
            $.ajax({
                url: 'app/views/pages/userManage/editUser.php',
                type: 'POST',
                data: {
                    user: JSON.stringify(user)
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
        $(".manageButton").click(function(){
            var data = $('#userManage');
            data.empty();
            var id = $(this).data('id');
            <?php foreach ($data['user'] as $user):  extract($user)?>
            if (id == <?php echo $id; ?>) {
                user = <?php echo json_encode($user); ?>;
            }
            <?php endforeach;?>
            let user_privilege = [];
            <?php foreach ($data['user_privilege'] as $user_privilege): extract($user_privilege) ?>
            if (<?php echo $user_id ?> == id) {
                user_privilege.push(<?php echo json_encode($user_privilege); ?>);
            }
            <?php endforeach;?>
            $.ajax({
                url: 'app/views/pages/userManage/decenUser.php',
                type: 'POST',
                data: {
                    user: JSON.stringify(user),
                    privilege: JSON.stringify(<?php echo json_encode($data['privilege']); ?>),
                    privilege_group: JSON.stringify(<?php echo json_encode($data['privilege_group']); ?>),
                    user_privilege: JSON.stringify(user_privilege)
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
                        url: 'http://localhost/Project_Laptop/admin/userManage/delete_user',
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