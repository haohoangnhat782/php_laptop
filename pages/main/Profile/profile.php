<?php
include __DIR__ . "/../../../config/config.php";
global $mysqli;

if (isset($_GET['quanly']) && isset($_GET['hd'])) {
    $tam = $_GET['quanly'];
    $hd = $_GET['hd'];
} else {
    $tam = '';
    $hd = '';
}

$email = "";
if (isset($_SESSION["login"]) && isset($_SESSION["userId"])) {
    if ($_SESSION["login"] == true) {
        $userId = $_SESSION["userId"];
        $query = "SELECT id_nguoi_dung, ho_ten, email, so_dien_thoai, dia_chi FROM nguoi_dung WHERE id_nguoi_dung = '$userId'";
        $user = $mysqli->query($query);
        $row = $user->fetch_assoc();
        $email = $row["email"];
    }
}

?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <script src="https://kit.fontawesome.com/e634a8a20d.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer src="js/profile.js"></script>

</head>

<body>
    <div class="body-container">
        <div class="container">
            <div class="main-container row">
                <main>
                    <div class="grid-member">
                        <div class="profile-setting-container">
                            <div class="profile">
                                <div class="profile-avatar-container">
                                    <img class="profile-avatar" src="images/logo-user.svg" alt="logo-user">
                                </div>
                                <div class="profile-label">Xin chào,
                                    <span class="name"> <?php echo " " . $email ?> </span>
                                </div>
                            </div>
                            <ul class="profile-setting-menu">
                                <li class="profile-setting-item selected updateProfile isUserInfo">
                                    <span class="profile-setting-link">
                                        <i class="fa-solid fa-user profile-setting-item-icon"></i>
                                        Thông tin tài khoản
                                    </span>
                                </li>
                                <li class="profile-setting-item orderManagement">
                                    <span class="profile-setting-link">
                                        <i class="fa-brands fa-wpforms profile-setting-item-icon"></i>
                                        Quản lý đơn hàng
                                    </span>
                                </li>
                                <li class="profile-setting-item updateProfile">
                                    <span class="profile-setting-link">
                                        <i class="fa-solid fa-lock profile-setting-item-icon"></i>
                                        Đổi mật khẩu
                                    </span>
                                </li>
                                <li class="profile-setting-item submitLogout" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <span class="profile-setting-link">
                                        <i class="fa-solid fa-power-off profile-setting-item-icon"></i>
                                        Đăng xuất
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="profile-content-container">
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ĐĂNG XUẤT ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span>Bạn có chắc chắn muốn đăng xuất ?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary btn-submit-logout">Đăng xuất</button>
                </div>
            </div>
        </div>
    </div>
</body>