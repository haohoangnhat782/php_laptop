<head>
    <link rel='stylesheet' type='text/css' href='css/purchase.css' />
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script defer src="https://kit.fontawesome.com/e634a8a20d.js" crossorigin="anonymous"></script>
    <script defer src="js/purchase.js"></script>
</head>

<body>
    <div class="body-container purchase-body-container">
        <div class="container">
            <div id="main-container" class="row">
                <main>
                    <div class="container">
                        <div class="container-cart">
                            <div class="nav-cart">
                                <a href="index.php" class="buy-more">
                                    <i class="fa fa-angle-left"></i>
                                    Mua thêm sản phẩm khác
                                </a>
                                <a class="user" href="index.php?quanly=profile" title="Trang cá nhân">
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 0.285706C3.58036 0.285706 0 3.86606 0 8.28571C0 12.6875 3.57143 16.2857 8 16.2857C12.4375 16.2857 16 12.6786 16 8.28571C16 3.86606 12.4196 0.285706 8 0.285706ZM13.5268 12.3482C13.2054 10.75 12.4286 9.42856 10.7946 9.42856C10.0714 10.1339 9.08929 10.5714 8 10.5714C6.91071 10.5714 5.92857 10.1339 5.20536 9.42856C3.57143 9.42856 2.79464 10.75 2.47321 12.3482C1.64286 11.2053 1.14286 9.80356 1.14286 8.28571C1.14286 4.50892 4.22321 1.42856 8 1.42856C11.7768 1.42856 14.8571 4.50892 14.8571 8.28571C14.8571 9.80356 14.3571 11.2053 13.5268 12.3482ZM11.4286 6.57142C11.4286 8.46428 9.89286 9.99999 8 9.99999C6.10714 9.99999 4.57143 8.46428 4.57143 6.57142C4.57143 4.67856 6.10714 3.14285 8 3.14285C9.89286 3.14285 11.4286 4.67856 11.4286 6.57142Z" fill="#FF6700"></path>
                                    </svg>
                                    Trang cá nhân
                                </a>
                            </div>
                            <div class="content-cart">
                                <div class="dynamicContentCart">
                                    <?php include "pages/main/Purchase/purchaseForm.php"; ?>
                                </div>
                                <div class="payment">
                                    <form method="post" class="formPayment" id="formPayment">
                                        <h3 class="h3_title">Thông tin mua hàng</h3>
                                        <div class="row">
                                            <div class="inputContainer">
                                                <input class="form-control" type="text" name="name" id="name" placeholder="Họ tên" value="<?php echo $fullname ?>">
                                            </div>
                                            <div class="inputContainer">
                                                <input class="form-control" type="text" name="telephone" id="telephone" placeholder="Số điện thoại" value="<?php echo $phoneNumber ?>">
                                            </div>
                                            <div class="inputContainer">
                                                <input class="form-control" type="text" name="address" id="address" placeholder="Địa chỉ" value="<?php echo $address ?>">
                                            </div>
                                        </div>
                                        <div class="total-price-products"></div>
                                        <div class="btn-area">
                                            <button id="cod-btn btn" class="payment-btn" title="Đặt hàng" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Đặt hàng
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <span class="agree">Bằng cách đặt hàng, bạn đồng ý với Điều khoản sử dụng của Didongthongminh</span>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xác nhận đặt hàng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn muốn đặt hàng chứ ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy Bỏ</button>
                    <button type="button" class="btn btn-primary btn-modal-confirm">Đặt Hàng</button>
                </div>
            </div>
        </div>
    </div>
</body>