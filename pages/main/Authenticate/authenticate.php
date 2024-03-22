

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-control" content="public">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='css/authenticate.css' />
    <script src="https://kit.fontawesome.com/e634a8a20d.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script defer src="js/authenticate.js"></script> -->
    
</head>

<body>
    <div class="body-container">
        <div class="container">
            <div class="row" id="main-container">
                <div class="main-column">
                    <main>
                        <div class="grid-members">
                            <div class="grid-item">
                                <img src="images/login.svg" alt="login">
                                <p>Quyền lợi thành viên</p>
                                <ul>
                                    <li>
                                        <img src="images/tick.svg" alt="tick">
                                        <span>
                                            Mua hàng khắp thế giới cực dễ dàng, nhanh chóng
                                        </span>
                                    </li>
                                    <li>
                                        <img src="images/tick.svg" alt="tick">
                                        <span>
                                            Theo dõi chi tiết đơn hàng, địa chỉ thanh toán dễ dàng
                                        </span>
                                    </li>
                                    <li>
                                        <img src="images/tick.svg" alt="tick">
                                        <span>
                                            Nhận nhiều chương trình ưu đãi hấp dẫn từ chúng tôi
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="grid-item">
                                <div class="top-title">
                                 <span title="Đăng nhập" class="login"> <a href="index.php?quanly=authenticate&hd=dn">  Đăng nhập</a></span>
                                <span title="Đăng ký" class="register">    <a href="index.php?quanly=authenticate&hd=dk"> Đăng ký </a></span>
                                </div>
                                <div class="form-container">
                                <?php
    if(isset($_GET['quanly']) && isset($_GET['hd']) ){
        $tam=$_GET['quanly'];
        $hd=$_GET['hd'];
    }
    else{
        $tam='';
        $hd='';
    }
    

    if($tam=='authenticate'& $hd=='dn'){
        include('pages/main/Authenticate/login.php');
    }
    elseif ($tam=='authenticate'& $hd=='dk'){
        include('pages/main/Authenticate/register.php');
    } 
    else{
        include('pages//main/Authenticate/login.php');
    }
  

?>
                                </div>
                                <div class="wrapper">
                                    <span></span>
                                    Hoặc bằng đăng nhập bằng
                                    <span></span>
                                </div>
                                <div class="log-google log-social" title="Google Login">
                                    <span>
                                        <img src="images/login-gg.svg" alt="Google login">
                                    </span>
                                    Google
                                </div>
                                <div class="log-facebook log-social" title="Facebook Login">
                                    <span>
                                        <img src="images/login-fb.svg" alt="Facebook login">
                                    </span>
                                    Facebook
                                </div>
                                <p class="note">
                                    Di Động Thông Minh cam kết bảo mật và sẽ không bao giờ đăng hay chia sẻ thông tin mà chưa có được sự đồng ý của bạn.
                                </p>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>  
</body>
