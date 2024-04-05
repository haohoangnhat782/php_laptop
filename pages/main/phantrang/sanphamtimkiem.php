<?php 
include("../../../config/config.php"); ?>
<?php

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$so_sp = 8;
$offset = ($page -1) * $so_sp;
$tukhoa=$_GET['tukhoa'];
$sql_pro = "SELECT * FROM san_pham, danh_muc WHERE san_pham.ma_danh_muc = danh_muc.id AND san_pham.ten_san_pham LIKE '%" . $tukhoa . "%' ORDER BY san_pham.id DESC LIMIT $offset, $so_sp";
$query_sp = mysqli_query($mysqli, $sql_pro);


?>
                        
                                <?php
                                while ($row = mysqli_fetch_array($query_sp)) {

                                ?>
                                    <div class="product-filter-content-product-item">
                                        <a href="index.php?quanly=chitiet&id=<?php echo $row['id'] ?>">
                                            <img src="images/<?php echo $row['hinh_anh'] ?>" alt="">
                                            <div class="product-filter-content-product-item-text">
                                                <li>
                                                    <p class="title-item"><?php echo $row['ten_san_pham'] ?></p>

                                                    <div class="prices">

                                                        <p class="price">Giá: <?php echo $row['don_gia'] ?><sup>đ</sup></p>
                                                        <!-- <p class="discount-item"><a href="">21.490.000 <sup>đ</sup></a></p> -->
                                                    </div>

                                                    <div class="information-container">
                                                    <p class="brand-item">Danh mục: <?php echo $row['ten_danh_muc'] ?></p>
                                                        <div class="information-item">
                                                           
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
