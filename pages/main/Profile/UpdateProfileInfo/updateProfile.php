<!-- <?php
$isUserInfo = $_GET["isUserInfo"] === "true";
$title = $isUserInfo ? "Thông tin tài khoản" : "Đổi mật khẩu";
$labels = $isUserInfo ? ["Họ và Tên", "Email", "Điện thoại"] : ["Mật khẩu cũ", "Mật khẩu mới", "Nhập lại mật khẩu mới"];
$placeholders = $isUserInfo ? ["Họ và Tên", "Email", "Điện thoại"] : ["Mật khẩu cũ", "Mật khẩu mới", "Nhập lại mật khẩu mới"];
?> -->

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
                    <input type="text" id="input<?php echo $i ?>" class="form-control" placeholder="<?php echo $placeholders[$i] ?>" value="">
                </div>
            <?php endfor; ?>
            <div class="box-user box-submit">
                <button class="profile-update-btn">Cập nhật</button>
            </div>
        </form>
    </div>
</body>