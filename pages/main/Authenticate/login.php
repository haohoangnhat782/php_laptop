<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$register_email = '';
$register_pwd = '';
if (isset($_SESSION['register'])) {
    $register_data = $_SESSION['register'];
    $register_pwd = $register_data['pwd'];
    $register_email = $register_data['email'];
}
?>

<form class="frmLogin" id="frmLogin" action="config/handleLogin.php" method="POST">
    <div class="box">
        <input autocomplete="off" value="<?php echo $register_email; ?>" onblur="validateEmailFieldLogin()" type="text" class="form-control" name="log_email" id="log_email" placeholder="Email đăng nhập">
    </div>
    <div class="box">
        <input autocomplete="off" value="<?php echo $register_pwd; ?>" onblur="validatePasswordFieldLogin()" type="password" class="form-control" name="log_pass" id="log_pass" placeholder="Mật khẩu">
    </div>
    <div class="box box-right">
        <span title="Quên mật khẩu?" class="forgot-password">Quên mật khẩu</span>
    </div>
    <div class="box" onclick="handleLogin()">
        <span class="submitLogin submit-btn">Đăng nhập</span>
    </div>
</form>
<?php
unset($_SESSION['register']);
session_destroy();
?>