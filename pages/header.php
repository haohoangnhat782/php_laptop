<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php echo "<link rel='stylesheet' type='text/css' href='css/header.css' />"; ?>
    <script src="https://kit.fontawesome.com/e634a8a20d.js" crossorigin="anonymous"></script>
</head>


<body>
    <header class="fix-top">
        <div class="top-header">
            <div class="container">
                <div class="menu-store">
                    <div class="logo-site">
                        <a href="#">
                            <img src="images/site-logo.svg" class="logo" alt="logo">
                        </a>
                    </div>
                    <div class="menu-center">
                        <button class="cate-btn" type="button">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.6666 0.833332H3.33325C1.95254 0.833332 0.833252 1.95262 0.833252 3.33333V16.6667C0.833252 18.0474 1.95254 19.1667 3.33325 19.1667H16.6666C18.0473 19.1667 19.1666 18.0474 19.1666 16.6667V3.33333C19.1666 1.95262 18.0473 0.833332 16.6666 0.833332Z" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M5 5.83333H5.83333" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.1665 5.83333H14.9998" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M5 10H5.83333" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.1665 10H14.9998" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M5 14.1667H5.83333" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.1665 14.1667H14.9998" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Danh mục
                        </button>
                        <div class="search-container">
                            <form action="index.php?quanly=timkiem" method="POST">
                                <input type="text" placeholder="Tìm kiếm sản phẩm" name="tukhoa" class="search-input">
                                <button type="submit" class="search-btn" name="timkiem"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="right-menu">
                        <div class="hotline-menu">
                            <span>Gọi mua hàng</span>
                            <br>
                            <span>0966 119 995</span>

                        </div>
                        <div class="address">
                            <span>Cửa hàng</span>
                            <br>
                            <span>Gần bạn</span>
                        </div>
                        <a href="index.php?quanly=cart">
                            <div class="cart">
                                <span class="nbc">0</span>
                            </div>
                        </a>
                        <div class="member-btn" title="Thành viên - Đăng ký - Đăng nhập"><a href="index.php?quanly=profile">
                          
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1971_5697)">
                                    <path d="M12 11.9625C10.35 11.9625 9 11.4375 7.95 10.3875C6.9 9.3375 6.375 7.9875 6.375 6.3375C6.375 4.6875 6.9 3.3375 7.95 2.2875C9 1.2375 10.35 0.712502 12 0.712502C13.65 0.712502 15 1.2375 16.05 2.2875C17.1 3.3375 17.625 4.6875 17.625 6.3375C17.625 7.9875 17.1 9.3375 16.05 10.3875C15 11.4375 13.65 11.9625 12 11.9625ZM0 24V20.475C0 19.525 0.2375 18.7125 0.7125 18.0375C1.1875 17.3625 1.8 16.85 2.55 16.5C4.225 15.75 5.83125 15.1875 7.36875 14.8125C8.90625 14.4375 10.45 14.25 12 14.25C13.55 14.25 15.0875 14.4438 16.6125 14.8313C18.1375 15.2188 19.7375 15.775 21.4125 16.5C22.1875 16.85 22.8125 17.3625 23.2875 18.0375C23.7625 18.7125 24 19.525 24 20.475V24H0ZM2.25 21.75H21.75V20.475C21.75 20.075 21.6313 19.6938 21.3938 19.3313C21.1563 18.9688 20.8625 18.7 20.5125 18.525C18.9125 17.75 17.45 17.2188 16.125 16.9313C14.8 16.6438 13.425 16.5 12 16.5C10.575 16.5 9.1875 16.6438 7.8375 16.9313C6.4875 17.2188 5.025 17.75 3.45 18.525C3.1 18.7 2.8125 18.9688 2.5875 19.3313C2.3625 19.6938 2.25 20.075 2.25 20.475V21.75ZM12 9.7125C12.975 9.7125 13.7812 9.39375 14.4188 8.75625C15.0563 8.11875 15.375 7.3125 15.375 6.3375C15.375 5.3625 15.0563 4.55625 14.4188 3.91875C13.7812 3.28125 12.975 2.9625 12 2.9625C11.025 2.9625 10.2188 3.28125 9.58125 3.91875C8.94375 4.55625 8.625 5.3625 8.625 6.3375C8.625 7.3125 8.94375 8.11875 9.58125 8.75625C10.2188 9.39375 11.025 9.7125 12 9.7125Z" fill="white" />
                                </g>
                            </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="clear"></div>
    <!-- <script>
        $(document).ready(() => {
            $(".member-btn").click(() => {
                window.location.href = "Authenticate/authenticate.php";
            });
        });
    </script> -->
</body>