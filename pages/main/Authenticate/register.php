<form action="pages/main/database/auth.php" method="POST" class="frmRegister" id="frmRegister">
    <div class="box">
        <input onblur="validateName()" type="text" class="form-control" name="reg_name" id="reg_name" placeholder="Họ và tên*">
    </div>
    <div class="box">
        <input onblur="validateTel()" type="text" class="form-control" name="reg_tel" id="reg_tel" placeholder="Số điện thoại*">
    </div>
    <div class="box">
        <input onblur="validateEmailField()" type="text" class="form-control" name="reg_email" id="reg_email" placeholder="Nhập địa chỉ email*">
    </div>
    <div class="box">
        <input onblur="validatePassword()" type="text" class="form-control" name="reg_pass" id="reg_pass" placeholder="Mật khẩu*">
    </div>
    <div class="box" onclick="handleRegister()">
        <span class="submitRegister submit-btn">Đăng ký</span>
    </div>
</form>
