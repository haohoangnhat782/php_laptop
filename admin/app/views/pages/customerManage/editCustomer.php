<?php $nguoidung = json_decode($_POST['nguoidung'], true);
    $tbl_taikhoan = json_decode($_POST['tbl_taikhoan'], true);
?>
<div class="d-flex justify-content-between card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Sửa người dùng</h6>
    <button type="button" class="btn btn-success" id="edit-customer">Sửa người dùng</button>
</div>
<div class="container p-3">
    <div class="row d-flex justify-content-center">
    <div class="col-md-5">
            <div class="form-group">
                <label for="ho_ten" class="form-label" style="font-weight: bold;">Họ Tên</label>
                <input type="text" id="ho_ten" name="ho_ten" class="form-control"
                    placeholder="Nhập họ tên" value="<?php echo $nguoidung['ho_ten'] ?>">
            </div>
            <div class="form-group">
                <label for="dia_chi" class="form-label" style="font-weight: bold;">Địa chỉ</label>
                <input type="text" id="dia_chi" name="dia_chi" class="form-control"
                    placeholder="Nhập địa chỉ" value="<?php echo $nguoidung['dia_chi'] ?>">
            </div>
            <div class="form-group">
                <label for="email" class="form-label" style="font-weight: bold;">Email</label>
                <input type="email" id="email" name="email" class="form-control"
                    placeholder="Nhập email" value="<?php echo $nguoidung['email'] ?>">
            </div>
            <div class="form-group">
                <label for="so_dien_thoai" class="form-label" style="font-weight: bold;">Số điện thoại</label>
                <input type="tel" id="so_dien_thoai" name="so_dien_thoai" class="form-control"
                    placeholder="Nhập số điện thoại" value="<?php echo trim($nguoidung['so_dien_thoai']) ?>">
            </div>
            <div class="form-group">
                <label for="password" class="form-label" style="font-weight: bold;">Password</label>
                <input type="text" id="password" name="password" class="form-control" placeholder="Nhập Password" value="<?php echo $tbl_taikhoan['Mat_khau'] ?>">
            </div>
            <div class="form-group">
                <label for="Ngay_tao" class="form-label" style="font-weight: bold;">Ngày tạo</label>
                <input type="text" id="Ngay_tao" name="Ngay_tao" class="form-control" value="<?php echo $tbl_taikhoan['Ngay_tao'] ?>"  disabled>
            </div>
            <div class="form-group">
                <label for="TTTK" class="form-label" style="font-weight: bold;">Tình trạng tài khoản</label>
                <select class="form-control"  id="TTTK">
                        <option value="0" <?php echo $tbl_taikhoan['TTTK'] == 0 ? 'selected' : ''; ?>>Tài khoản đang khóa</option>
                        <option value="1" <?php echo $tbl_taikhoan['TTTK'] == 1 ? 'selected' : ''; ?>>Tài khoản đang mở</option>
                </select>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="assets/js/check.js"></script>
<script>
$(document).ready(function() {
    $("#edit-customer").click(function(e) {
        id_nguoi_dung = $("#id_nguoi_dung");
        ho_ten = $("#ho_ten");
        dia_chi = $("#dia_chi");
        email = $("#email");
        so_dien_thoai = $("#so_dien_thoai");
        password = $("#password");
        
        if(checkEmptyAndHighlight(id_nguoi_dung) || checkEmptyAndHighlight(ho_ten) || checkEmptyAndHighlight(dia_chi) || checkEmptyAndHighlight(email) || checkEmptyAndHighlight(so_dien_thoai) || checkEmptyAndHighlight(password)){
            swal("Error", "Vui lòng nhập đầy đủ thông tin", "error");
        }else{
            if(!validateEmail(email.val())){
                swal("Error", "Email không hợp lệ", "error");
            }else{
                if(!validatePhone(so_dien_thoai.val())){
                    swal("Error", "Số điện thoại không hợp lệ", "error");
                }else{
                    $.ajax({
                        url: "http://localhost/Project_Laptop/admin/customerManage/edit_customer",
                        type: "POST",
                        data: {
                            id_nguoi_dung: id_nguoi_dung.val(),
                            ho_ten: ho_ten.val(),
                            dia_chi: dia_chi.val(),
                            email: email.val(),
                            so_dien_thoai: so_dien_thoai.val(),
                            password: password.val(),
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
            }
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
