<?php
include "../../../../config/config.php";
session_start();

$isUserInfo = $_GET["isUserInfo"] === "true";
$title = $isUserInfo ? "Thông tin tài khoản" : "Đổi mật khẩu";
$labels = $isUserInfo ? ["Họ và Tên", "Email", "Điện thoại"] : ["Mật khẩu cũ", "Mật khẩu mới", "Nhập lại mật khẩu mới"];
$placeholders = $isUserInfo ? ["Họ và Tên", "Email", "Điện thoại"] : ["Mật khẩu cũ", "Mật khẩu mới", "Nhập lại mật khẩu mới"];
$buttonClass = $isUserInfo ? "profile-update-submit-btn" : "profile-change-password-btn";

global $mysqli;
$userInfo = [];

if (isset($_SESSION["login"]) && isset($_SESSION["userId"])) {
    if ($_SESSION["login"] === true) {
        $userId = $_SESSION["userId"];
        $query = "SELECT id_nguoi_dung, ho_ten, email, so_dien_thoai, dia_chi FROM nguoi_dung WHERE id_nguoi_dung = '$userId'";
        $user = $mysqli->query($query);
        $row = $user->fetch_assoc();
        $fullname = $row["ho_ten"];
        $email = $row["email"];
        $phoneNumber = $row["so_dien_thoai"];
        $userInfo = [$fullname, $email, $phoneNumber];
    }
}

?>

<body>
    <div class="profile-content">
        <h2 class="profile-content-title">
            <?php echo $title ?>
        </h2>
        <form>
            <?php for ($i = 0; $i < 3; $i++) : ?>
                <div class="box-user">
                    <label class="label-input" for="input<?php echo $i ?>">
                        <?php echo $labels[$i] ?>
                    </label>
                    <input type="<?php if ($isUserInfo) {
                                        echo "Text";
                                    } else {
                                        echo "password";
                                    } ?>" id="input<?php echo $i ?>" class="form-control" placeholder="<?php echo $placeholders[$i] ?>" value="<?php if ($isUserInfo)
                                                                                                                                                    echo $userInfo[$i];
                                                                                                                                                ?>">
                </div>
            <?php endfor; ?>
            <div class="box-user box-submit">
                <button type="button" class="profile-update-btn <?php echo $buttonClass ?>">Cập nhật</button>
            </div>
        </form>
    </div>
</body>