<?php
$user = json_decode($_POST['user'], true);
$privilege = json_decode($_POST['privilege'], true);
$privilege_group = json_decode($_POST['privilege_group'], true);
$user_privilege = json_decode($_POST['user_privilege'], true);
?>

<div class="d-flex justify-content-between card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Phân quyền thành viên</h6>
    <!-- <button type="button" class="btn btn-success" id="decen-user">Phân quyền thành viên</button> -->
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Quản lý</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Quản lý</th>
                    <th>Chức năng</th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($privilege_group as $single_privilege_group){?>
                    <tr>
                        <td><?php echo $single_privilege_group['name']; ?></td>
                        <td>
                            <?php foreach ($privilege as $single_privilege){?>
                                <?php $check = 0; if ($single_privilege['group_id'] == $single_privilege_group['id']){?>
                                    <div class="d-flex" >
                                        <?php foreach ($user_privilege as $single_user_privilege){?>
                                            <?php if ($single_user_privilege['privilege_id'] == $single_privilege['id']){ $check = 1?>
                                                <input type="checkbox" class="privilege" name="privilege"  data-userid="<?php echo $single_user_privilege['user_id']; ?>" data-privilegeid="<?php echo $single_privilege['id']; ?>" checked style="margin-right: 10px;" >
                                            <?php }?>
                                        <?php }?>
                                        <?php if($check == 0){?>
                                                <input type="checkbox" class="privilege" name="privilege"  data-userid="<?php echo $user['id']; ?>" data-privilegeid="<?php echo $single_privilege['id']; ?>" style="margin-right: 10px;" >
                                        <?php }?>
                                        <?php echo $single_privilege['name']; ?>
                                    </div> 
                                <?php }?>
                            <?php }?>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.privilege').on('change', function() {
            var userId = $(this).data('userid');
            var privilegeId = $(this).data('privilegeid');
            console.log(userId);
            console.log(privilegeId);
            
            $.ajax({
                url: 'http://localhost/Project_Laptop/admin/userManage/edit_user_privilege',
                method: 'POST',
                data: {
                    user_id: userId,
                    privilege_id: privilegeId,
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.status == 'success') {
                        console.log('Phân quyền thành công');
                    } else {
                        console.log('Phân quyền thất bại');
                    }
                },
            });
        });
    });
</script>