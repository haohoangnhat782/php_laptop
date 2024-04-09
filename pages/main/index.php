<?php
$sql_sp="SELECT * FROM san_pham,danh_muc where san_pham.ma_danh_muc=danh_muc.id_danh_muc order by san_pham.id_san_pham DESC limit 4";
$query_sp=mysqli_query($mysqli,$sql_sp);
$sql_sp_noi_bat="SELECT * FROM san_pham,danh_muc where san_pham.ma_danh_muc=danh_muc.id_danh_muc order by san_pham.id_san_pham DESC limit 8";
$query_sp_noi_bat=mysqli_query($mysqli,$sql_sp_noi_bat);
?> 
<div class="body">
<!----------------------Slider-----------------     -->
<div class="slider ">
  <div class="container-product">
    <div class="slider-content">
      <div class="slider-content-left">
        <div class="slider-content-left-top-container">
       <div class="slider-content-left-top">
        <a href=""><img src="images/slider1.jpg" alt=""></a>
        <a href=""><img src="images/slider2.jpg" alt=""></a>
        <a href=""><img src="images/slider3.jpg" alt=""></a>
        <a href=""><img src="images/slider4.jpg" alt=""></a>
        <a href=""><img src="images/slider5.png" alt=""></a>

       </div>
       <div class="slider-content-left-top-btn">
        <i class="fa-solid fa-chevron-left"></i>
        <i class="fa-solid fa-chevron-right"></i>
        
      </div>
      </div>
      <div class="slider-content-left-bottom">
        <li class="active-product">Nhiểu tính năng </li>
        <li>Laptop cao cấp</li>
        <li>Thiết kế đẹp</li>
        <li>Bảo hành 12 tháng</li>
        <li>Laptop giá rẻ</li>
      </div>
      </div>
      <div class="slider-content-right">
        <a href=""><img src="images/slider-right.png" alt=""></a>

      </div>
    </div>
  </div>
</div>
<div class="clear"></div>

<section class="product-gallery-one">
  <div class="container-product">
    <div class="product-gallery-one-content">
      <div class="product-gallery-one-content-title">
        <p>LAPTOP MỚI</p>
         <a href="index.php?quanly=sanphamall"><p></p></a>
      

      </div>
      <div class="product-gallery-one-content-product body">
      <?php  
          while($row=mysqli_fetch_array($query_sp)){
        ?>
       <div class="product-gallery-one-content-product-item">
                        <a href="index.php?quanly=chitiet&id=<?php echo $row['id_san_pham'] ?>">
                            <img src="images/<?php echo $row['hinh_anh']?>" alt="">
                            <div class="product-gallery-one-content-product-item-text">
                                <li>
                                    <p class="title-item-index"><?php echo $row['ten_san_pham']?></p>
                                    <div class="prices-index">
                                        <p class="price-index">Giá: <?php echo $row['don_gia'] ?>  <sup>đ</sup></p>
                                    </div>
                                    <div class="information-container-index">
                                    <p class="brand-item-index">Danh mục:<?php echo $row['ten_danh_muc'] ?></p>
                                        <div class="information-item-index">
                                        
                                            <p class="cpu-item-index">CPU: <?php echo $row['cpu'] ?> </p>
                                        </div>
                                        <p class="ram-item-index">RAM: <?php echo $row['ram'] ?></p>
                                    </div>
                                </li>
                            </div>
                        </a>
                    </div>
        <?php } ?>
      
      

      
      </div>
      <div class="clear"></div>
    </div>

  </div>
  <div class="clear"></div>
</section>


<!-- -------------/product-gallery ------------>
<section class="product-gallery-one">
  <div class="container-product">
    <div class="product-gallery-one-content">
      <div class="product-gallery-one-content-title">
        <p>LAPTOP NỔI BẬT NHẤT</p>
         <a href="index.php?quanly=sanphamall"><p>Xem tất cả</p></a>
      

      </div>
      <div class="product-gallery-one-content-product body">
      <?php  
          while($row=mysqli_fetch_array($query_sp_noi_bat)){
        ?>
       <div class="product-gallery-one-content-product-item">
                        <a href="index.php?quanly=chitiet&id=<?php echo $row['id_san_pham'] ?>">
                            <img src="images/<?php echo $row['hinh_anh']?>" alt="">
                            <div class="product-gallery-one-content-product-item-text">
                                <li>
                                    <p class="title-item-index"><?php echo $row['ten_san_pham']?></p>
                                    <div class="prices-index">
                                        <p class="price-index">Giá: <?php echo $row['don_gia'] ?>  <sup>đ</sup></p>
                                    </div>
                                    <div class="information-container-index">
                                    <p class="brand-item-index">Danh mục:<?php echo $row['ten_danh_muc'] ?></p>
                                        <div class="information-item-index">
                                       
                                            <p class="cpu-item-index">CPU: <?php echo $row['cpu'] ?> </p>
                                        </div>
                                        <p class="ram-item-index">RAM: <?php echo $row['ram'] ?></p>
                                    </div>
                                </li>
                            </div>
                        </a>
                    </div>
        <?php } ?>
      
      

      
      </div>
      <div class="clear"></div>
    </div>

  </div>
  <div class="clear"></div>
</section>

    </div>
    <div class="space body"></div>

 