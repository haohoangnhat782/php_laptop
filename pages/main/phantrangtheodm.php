<?php 
include("../../config/config.php"); ?>
<?php

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$so_sp = 8;
$offset = ($page -1) * $so_sp;

$sql_pro = "SELECT * FROM san_pham WHERE ma_danh_muc='$_GET[id]' ORDER BY id DESC LIMIT $offset, $so_sp";
$query_sp = mysqli_query($mysqli, $sql_pro);


?>
                        
                                <?php
                                while ($row = mysqli_fetch_array($query_sp)) {

                                ?>
                                    <div class="product-filter-content-product-item">
                                        <a href="index.php?quanly=sanpham&id=<?php echo $row['id'] ?>">
                                            <img src="images/<?php echo $row['hinh_anh'] ?>" alt="">
                                            <div class="product-filter-content-product-item-text">
                                                <li>
                                                    <p class="title-item"><?php echo $row['ten_san_pham'] ?></p>

                                                    <div class="prices">

                                                        <p class="price">Giá: <?php echo $row['don_gia'] ?><sup>đ</sup></p>
                                                        <!-- <p class="discount-item"><a href="">21.490.000 <sup>đ</sup></a></p> -->
                                                    </div>
                                                    <div class="information-container">
                                                        <div class="information-item">
                                                            <!-- <p class="brand-item"><?php echo $row_title['ten_danh_muc'] ?></p> -->
                                                            <p class="cpu-item">CPU: <?php echo $row['cpu'] ?></p>
                                                        </div>
                                                        <p class="ram-item">Ram: <?php echo $row['ram'] ?></p>
                                                    </div>

                                                </li>
                                            </div>
                                        </a>

                                    </div>
                                <?php
                                } ?>
