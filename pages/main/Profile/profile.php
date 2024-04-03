<?php
if (isset($_GET['quanly']) && isset($_GET['hd'])) {
    $tam = $_GET['quanly'];
    $hd = $_GET['hd'];
} else {
    $tam = '';
    $hd = '';
}


?>

<head>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                                    <span class="name"> duchien230904</span>
                                </div>
                            </div>
                            <ul class="profile-setting-menu">
                                <li class="profile-setting-item selected updateProfile isUserInfo">
                                    <span class="profile-setting-link">
                                        <i class="fa-solid fa-user profile-setting-item-icon"></i>
                                        <!-- <a href="index.php?quanly=profile&hd=tt_tk">Thông tin tài khoản</a> -->
                                        Thông tin tài khoản
                                    </span>
                                </li>
                                <li class="profile-setting-item orderManagement">
                                    <span class="profile-setting-link">
                                        <i class="fa-brands fa-wpforms profile-setting-item-icon"></i>
                                        <!-- <a href="index.php?quanly=profile&hd=qldonhang">Quản lý đơn hàng</a> -->
                                        Quản lý đơn hàng
                                    </span>
                                </li>
                                <li class="profile-setting-item updateProfile">
                                    <span class="profile-setting-link">
                                        <i class="fa-solid fa-lock profile-setting-item-icon"></i>
                                        <!-- <a href="index.php?quanly=profile&hd=doimk"> Đổi mật khẩu</a> -->
                                        Đổi mật khẩu
                                    </span>
                                </li>
                                <li class="profile-setting-item">
                                    <span class="profile-setting-link">
                                        <i class="fa-solid fa-power-off profile-setting-item-icon"></i>
                                        <!-- <a href="">Đăng xuất</a> -->
                                        Đăng xuất
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="profile-content-container">
                            <?php
                            if ($tam == 'profile' && $hd == 'qldonhang') {
                                include('pages/main/Profile/UpdateProfileInfo/orderManagement.php');
                            }
                            if ($tam == 'profile' && $hd == 'tt_tk') {
                                include('pages/main/Profile/UpdateProfileInfo/AcoutProfile.php');
                            } elseif ($tam == 'profile' && $hd == 'doimk') {
                                include('pages/main/Profile/UpdateProfileInfo/updateProfile.php');
                            }


                            ?>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

</body>