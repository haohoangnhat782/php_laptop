<head>
    <meta http-equiv="Cache-control" content="public">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='css/product.css' />
    <link href="https://panpic.vn/fontawesome/css/all.css" rel="stylesheet">
</head>

<body>

<?php  
$sql_chitiet="SELECT * FROM san_pham,danh_muc WHERE san_pham.ma_danh_muc=danh_muc.id and san_pham.id ='$_GET[id]' LIMIT 1";
$query_chitiet=mysqli_query($mysqli,$sql_chitiet);

?>
    <div class="body-container">
        <div class="container">
            <main id="main-container">

                <div class="grid-members row">
                    <?php while($row=mysqli_fetch_array($query_chitiet)){ ?>
                    <div class="grid-item col-md-5">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="images/<?php echo $row['hinh_anh']?>" class="d-block w-100" alt="Image 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/<?php echo $row['hinh_anh']?>" class="d-block w-100" alt="Image 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/<?php echo $row['hinh_anh']?>" class="d-block w-100" alt="Image 3">
                                </div>
                            </div>
                            <div class="carousel-control">
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item col-md-7">
                        <div class="d-flex flex-column flex-auto">
                            <div class="product-name text-break fs-4 fw-medium">
                                <span><?php echo $row['ten_san_pham']?></span>
                            </div>
                            <div class="d-flex mt-2">
                                <!-- <button class="d-flex bg-transparent border-0 px-4">
                                    <div class="text-danger fw-medium border-bottom border-danger">
                                        4.9
                                    </div>
                                    <div class="ms-1">
                                        <div class="five-stars">
                                            <div class="one-star">
                                                <div class="full-star">
                                                    <svg class="full-star-img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path fill="#ee4d2d" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                    </svg>
                                                </div>
                                                <svg class="empty-star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                    <path fill="#c4c4c4" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                </svg>
                                            </div>
                                            <div class="one-star">
                                                <div class="full-star">
                                                    <svg class="full-star-img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path fill="#ee4d2d" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                    </svg>
                                                </div>
                                                <svg class="empty-star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                    <path fill="#c4c4c4" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                </svg>
                                            </div>
                                            <div class="one-star">
                                                <div class="full-star">
                                                    <svg class="full-star-img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path fill="#ee4d2d" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                    </svg>
                                                </div>
                                                <svg class="empty-star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                    <path fill="#c4c4c4" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                </svg>
                                            </div>
                                            <div class="one-star">
                                                <div class="full-star">
                                                    <svg class="full-star-img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path fill="#ee4d2d" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                    </svg>
                                                </div>
                                                <svg class="empty-star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                    <path fill="#c4c4c4" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                </svg>
                                            </div>
                                            <div class="one-star">
                                                <div class="full-star">
                                                    <svg class="full-star-img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path fill="#ee4d2d" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                    </svg>
                                                </div>
                                                <svg class="empty-star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                    <path fill="#c4c4c4" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </button> -->
                                <!-- <button class="d-flex bg-transparent border-0 px-4">
                                    <div class="fw-medium border-bottom border-secondary" style="font-size: 1rem">
                                        25k
                                    </div>
                                    <div class="ms-1 text-body-secondary">
                                        Đánh Giá
                                    </div>
                                </button>

                                <button class="d-flex bg-transparent border-0 px-4">
                                    <div class="fw-medium border-bottom border-secondary" style="font-size: 1rem">
                                        50k
                                    </div>
                                    <div class="ms-1 text-body-secondary">
                                        Đã Bán
                                    </div>
                                </button> -->
                            </div>
                            <div class="mt-2 bg-body-tertiary">
                                <div class="d-flex align-items-center">
                                    <div class="price-default fw-bold text-body-tertiary px-3" style="font-size: 1rem">
                                  
                                    <?php echo $row['don_gia'] + $row['don_gia'] * 10 / 100 ?>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="price-details fw-bold text-danger" style="font-size: 1.875rem">
                                        <?php echo $row['don_gia']?>
                                        </div>
                                        <div class="voucher">10% GIẢM</div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center m-2">
                                <div class="me-2">Số Lượng</div>
                                <div class="d-flex align-items-center">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-outline-secondary decrease" aria-label="Decrease">-</button>
                                        <input type="text" class="form-control border-light-subtle text-center quantity-input" aria-valuenow="1" value="1" style="max-width: 50px;">
                                        <button type="button" class="btn btn-outline-secondary increase" aria-label="Increase">+</button>
                                    </div>
                                    <div class="ms-2"><?php echo $row['so_luong']?> sản phẩm có sẵn</div>
                                </div>
                            </div>
                            <div class="information">
                                <p>Danh muc: <?php echo $row['ten_danh_muc']?></p>
                                <p>Dung lượng pin: <?php echo $row['dung_luong_pin']?></p>
                                <p>Màn hình: <?php echo $row['man_hinh']?></p>
                                <p>CPU: <?php echo $row['cpu']?></p>
                                <p>Ram: <?php echo $row['ram']?></p>
                                <p>Thông tin chung: <?php echo $row['thong_tin_chung']?></p>
                                <p>Bảo hành: <?php echo $row['bao_hanh']?></p>

                            </div>
                            <div class="mt-5 d-flex">
                                <div class="d-flex align-items-center">
                                    <button type="button" class="btn-tinted" aria-disabled="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="cart-icon">
                                            <path d="M504.7 320H211.6l6.5 32h268.4c15.4 0 26.8 14.3 23.4 29.3l-5.5 24.3C523.1 414.7 536 433.8 536 456c0 31.2-25.5 56.4-56.8 56-29.8-.4-54.4-24.6-55.2-54.4-.4-16.3 6.1-31 16.8-41.5H231.2C241.6 426.2 248 440.3 248 456c0 31.8-26.5 57.4-58.7 55.9-28.5-1.3-51.8-24.4-53.3-52.9-1.2-22 10.4-41.5 28.1-51.6L93.9 64H24C10.7 64 0 53.3 0 40V24C0 10.7 10.7 0 24 0h102.5c11.4 0 21.2 8 23.5 19.2L159.2 64H552c15.4 0 26.8 14.3 23.4 29.3l-47.3 208C525.6 312.2 515.9 320 504.7 320zM408 168h-48v-40c0-8.8-7.2-16-16-16h-16c-8.8 0-16 7.2-16 16v40h-48c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16h48v40c0 8.8 7.2 16 16 16h16c8.8 0 16-7.2 16-16v-40h48c8.8 0 16-7.2 16-16v-16c0-8.8-7.2-16-16-16z" fill="#ee4d2d" />
                                        </svg>
                                        <span style="color: #ee4d2d">Thêm vào giỏ hàng</span>
                                    </button>
                                    <button type="button" class="btn-buy" aria-disabled="false">
                                        <span>Mua ngay</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </main>
        </div>
    </div>
</body>

<script src="https://kit.fontawesome.com/e634a8a20d.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script defer src="js/product.js"></script>
    