
<div class="d-flex justify-content-between card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Thêm thành viên</h6>
    <button type="button" class="btn btn-success" id="add-user">Thêm thành viên</button>
</div>
<div class="container p-3">
    <div class="row d-flex justify-content-center">
    <div class="col-md-5">
            <div class="form-group">
                <label for="username" class="form-label" style="font-weight: bold;">User name</label>
                <input type="text" id="username" name="username" class="form-control"
                    placeholder="Nhập tên user">
            </div>
            <div class="form-group">
                <label for="password" class="form-label" style="font-weight: bold;">Password</label>
                <input type="text" id="password" name="password" class="form-control" placeholder="Nhập Password">
            </div>
            <div class="form-group">
                <label for="fullname" class="form-label" style="font-weight: bold;">Full name</label>
                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Nhập Full name">
            </div>
            <div class="form-group">
                <label for="Ngay_tao" class="form-label" style="font-weight: bold;">Ngày tạo</label>
                <input type="text" id="Ngay_tao" name="Ngay_tao" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="TTTK" class="form-label" style="font-weight: bold;">Tình trạng tài khoản</label>
                <select class="form-control" id="TTTK">
                    <option value="1">Tài khoản đang mở</option>
                    <option value="0">Tài khoản đang khóa</option>
                </select>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).ready(function() {
    $("#add-user").click(function(e) {
        username = $("#username");
        password = $("#password");
        fullname = $("#fullname");
        
        if(checkEmptyAndHighlight(username) || checkEmptyAndHighlight(password) || checkEmptyAndHighlight(fullname)){
            swal("Error", "Vui lòng nhập đầy đủ thông tin", "error");
        }else{
            $.ajax({
                url: "http://localhost/Project_Laptop/admin/userManage/add_user",
                type: "POST",
                data: {
                    username: username.val(),
                    password: password.val(),
                    fullname: fullname.val(),
                    Ngay_tao: $("#Ngay_tao").val(),
                    TTTK: $("#TTTK").val()
                },
                success: function(response) {
                    var result = JSON.parse(response);
                    if (result.status == 'success') {
                        swal("Success", "Thêm thành công", "success")
                        $("#username").val("");
                        $("#password").val("");
                        $("#fullname").val("");
                    }
                    if (result.status == 'failusername') {
                        swal("Fail", "Username đã tồn tại", "error")
                    }
                    if (result.status == 'fail') {
                        swal("Fail", "Thêm thất bại", "error")
                    }
                }
            });
        }
        
    });
});
</script>
<script>
    document.getElementById('Ngay_tao').value = new Date().toISOString().slice(0, 10);
    $(document).ready(function() {
        $("input").on('input', function() {
            $(this).css('border', '1px solid #ced4da');
        });
    });
</script>
