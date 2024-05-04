<?php $user = json_decode($_POST['user'], true); ?>

<div class="d-flex justify-content-between card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Sửa thành viên</h6>
    <button type="button" class="btn btn-primary" id="edit-user">Sửa thành viên</button>
</div>
<div class="container p-3">
    <div class="row d-flex justify-content-center">
    <div class="col-md-5">
            <div class="form-group">
                <label for="username" class="form-label" style="font-weight: bold;">User name</label>
                <input type="text" id="username" name="username" class="form-control"
                    placeholder="Nhập tên user" value="<?php echo $user['username'] ?>">
            </div>
            <div class="form-group">
                <label for="password" class="form-label" style="font-weight: bold;">Password</label>
                <input type="text" id="password" name="password" class="form-control" placeholder="Nhập Password"
                    value="<?php echo $user['password'] ?>">
            </div>
            <div class="form-group">
                <label for="fullname" class="form-label" style="font-weight: bold;">Full name</label>
                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Nhập Full name"
                    value="<?php echo $user['fullname'] ?>">
            </div>
            <div class="form-group">
                <label for="Ngay_tao" class="form-label" style="font-weight: bold;">Ngày tạo</label>
                <input type="text" id="Ngay_tao" name="Ngay_tao" class="form-control"
                value="<?php echo $user['Ngay_tao'] ?>" disabled>
            </div>
            <div class="form-group">
                <label for="TTTK" class="form-label" style="font-weight: bold;">Tình trạng tài khoản</label>
                <select class="form-control"  id="TTTK">
                        <option value="0" <?php echo $user['TTTK'] == 0 ? 'selected' : ''; ?>>Tài khoản đang khóa</option>
                        <option value="1" <?php echo $user['TTTK'] == 1 ? 'selected' : ''; ?>>Tài khoản đang mở</option>
                </select>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).ready(function() {
    $("#edit-user").click(function(e) {
        username = $("#username");
        password = $("#password");
        fullname = $("#fullname");
        if (checkEmptyAndHighlight(username) || checkEmptyAndHighlight(password) || checkEmptyAndHighlight(fullname)) {
            swal("Error", "Vui lòng nhập đầy đủ thông tin", "error");
        } else {
            $.ajax({
                url: "http://localhost/Project_Laptop/admin/userManage/edit_user",
                type: "POST",
                data: {
                    id: <?php echo $user['id'] ?>,
                    username: username.val(),
                    password: password.val(),
                    fullname: fullname.val(),
                    Ngay_tao: $("#Ngay_tao").val(),
                    TTTK: $("#TTTK").val()
                },
                success: function(response) {                 
                    var result2 = JSON.parse(response);
                    if (result2.status == 'success') {
                        swal("Success", "Sửa thành công", "success")
                    }
                    if (result2.status == 'fail') {
                        swal("Fail", "Sửa thất bại", "error")
                    }                  
                }
            });
        }

    });
});
</script>
<script>
$(document).ready(function() {
    $("input").on('input', function() {
        $(this).css('border', '1px solid #ced4da');
    });
});
</script>