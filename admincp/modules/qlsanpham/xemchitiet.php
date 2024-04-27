<?php
$sql_xem="SELECT * from san_pham where id_san_pham='$_GET[id]'";
$query_xem =mysqli_query($con,$sql_xem);
$row=mysqli_fetch_array($query_xem);
?>
<div class="main-content">
        <h1>Xem chi tiết sản phẩm</h1>
        <div id="content-box">
           
                <div class = "container">
            
                <form id="editing-form" method="POST" action="modules/qlsanpham/xuly.php"  enctype="multipart/form-data">
                <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>ID Sản phẩm: </label>
                        <input type="text" name="tensp" value="<?php echo $row['id_san_pham'] ?>" style="width: 400px;" readonly />
                        <div class="clear-both"></div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Tên sản phẩm: </label>
                        <input type="text" name="tensp" value="<?php echo $row['ten_san_pham'] ?>" style="width: 400px;" readonly  />
                        <div class="clear-both"></div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Ảnh : </label>
                        <div class="right-wrap-field">
                        <img width="300" height="250" src="modules/qlsanpham/uploads/<?php echo $row['hinh_anh']?>" alt="">
                            <!-- <input type="file" name="hinhanh" style="padding=5px" /> -->
                        </div>
                        <div class="clear-both"></div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Danh mục: </label>
                        <select name="danhmuc" id="" readonly>
                        <?php 
                            $sql="SELECT * FROM danh_muc,san_pham where danh_muc.id_danh_muc=san_pham.ma_danh_muc limit 1";
                            $query_danhmuc=mysqli_query($con,$sql);
                            while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){
                            ?>
                            <option value="<?php echo $row_danhmuc['id_danh_muc'] ?>" >
                            <?php echo $row_danhmuc['ten_danh_muc'] ?>
                            </option>
                           <?php } ?>
                        </select>
                        <div class="clear-both"></div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Giá sản phẩm: </label>
                        <input type="text" name="giasp" value="<?php echo $row['don_gia'] ?>"  style="width: 400px;" readonly/>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Số lượng: </label>
                        <input type="text" name="soluong" value="<?php echo $row['so_luong'] ?>" style="width: 400px;" readonly />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Dung lượng pin: </label>
                        <input type="text" name="dungluongpin" value="<?php echo $row['dung_luong_pin'] ?>"  style="width: 400px;" readonly/>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Màn hình: </label>
                        <input type="text" name="manhinh" value="<?php echo $row['man_hinh'] ?>" style="width: 400px;" readonly/>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>CPU: </label>
                        <input type="text" name="cpu" value="<?php echo $row['cpu'] ?>" style="width: 400px;" readonly/>
                        <div class="clear-both"></div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Ram: </label>
                        <input type="text" name="ram" value="<?php echo $row['ram'] ?>" style="width: 400px;" readonly/>
                        <div class="clear-both"></div>
                    </div>
                    
                    
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Thông tin chung: </label>
                        <textarea name="thontinchung" value="" id="product-content" readonly> <?php echo $row['thong_tin_chung'] ?></textarea>
                        <div class="clear-both"></div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Bảo hành: </label>
                        <textarea name="baohanh" id="product-content"  readonly value="" style="margin-bottom=7px"> <?php echo $row['bao_hanh'] ?></textarea>
                        <div class="clear-both"></div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Trạng thái: </label>
                        <select name="trangthai" id="" readonly>
                    <?php         if($row['trang_thai']==1){ ?>
                            <option value="1">
                                Kích hoạt
                            </option>
                            <?php } else { ?>
                            <option value="0">
                                Ẩn
                            </option>
                            <?php } ?>
                        </select>
                        <div class="clear-both"></div>
                    </div>
                    <div class="clear-both"></div>
                    <button class="btn-submit" name=""> <a href="?action=quanlysanpham&query=hienthi">Thoát</a> </button>


                </form>
                <div class="clear-both"></div>
                <script>
               
                    CKEDITOR.replace('product-content');
                </script>
  
        </div>
    </div>

  