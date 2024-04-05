<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php echo "<link rel='stylesheet' type='text/css' href='css/styleIndex.css' />"; ?>
    <script src="https://kit.fontawesome.com/e634a8a20d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>


<body>
<?php 

$sql_dm = "SELECT * FROM danh_muc";
$query_dm=mysqli_query($mysqli,$sql_dm);

	 ?>
<section class="menu-bar">
      <div class="container-product">
        <div class="menu-bar-content">
          <ul>
            <li><a href="index.php?quanly=trangchu">Trang Chủ</a></li>
            <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo 1 ?>">Laptop <i style="margin-left: 5px;" class="fa-solid fa-sort-down"></i></href=>
              <div class="submenu">
                <ul>
                <?php  while ($row=mysqli_fetch_array($query_dm)) { ?>
                  <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id'] ?>"><p style="font-color=black"> <?php echo $row['ten_danh_muc'] ?></p></a></li>
                 <?php } ?>
                </ul>
              </div>
            </li>
            
            <li><a href="">Laptop Đồ họa và thiết kế<i style="margin-left: 5px;" class="fa-solid fa-sort-down"></i></a>
              <div class="submenu">
                <ul>
                  <li><a href="">Dell</a></li>
                  <li><a href="">Gaming</a></li>
                  <li><a href="">HP</a></li>
                  <li><a href="">Macbook</a></li>
                  <li><a href="">Dell</a></li>
                </ul>
              </div>
            </li>
            <li><a href="">Laptop Học tập<i style="margin-left: 5px;" class="fa-solid fa-sort-down"></i></a>
              <div class="submenu">
                <ul>
                  <li><a href="">Dell</a></li>
                  <li><a href="">Gaming</a></li>
                  <li><a href="">HP</a></li>
                  <li><a href="">Macbook</a></li>
                  <li><a href="">Dell</a></li>
                </ul>
              </div>
            </li>
            <li><a href="">Laptop Nhỏ gọn<i style="margin-left: 5px;" class="fa-solid fa-sort-down"></i></a>
              <div class="submenu">
                <ul>
                  <li><a href="">Dell</a></li>
                  <li><a href="">Gaming</a></li>
                  <li><a href="">HP</a></li>
                  <li><a href="">Macbook</a></li>
                  <li><a href="">Dell</a></li>
                </ul>
              </div>
            </li> 
          
            <li><a href="">Giỏ hàng</a>
            
            </li>
            <li><a href="">Liên hệ</a>
              
              </li>
              <li><a href="index.php?quanly=authenticate">Đăng nhập</a>
              </li>
              <li><a href="index.php?quanly=profile">Profile</a>              
              </li>


          </ul>
        </div>
      </div>
      <div class="clear"></div>
    </section>
</body>