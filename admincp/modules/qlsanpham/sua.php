<?php
$sql_xem="SELECT * from san_pham where id_san_pham='$_GET[id]'";
$query_xem =mysqli_query($con,$sql_xem);
$row=mysqli_fetch_array($query_xem);
?>
<div class="main-content">
        <h1>Sửa sản phẩm</h1>
        <div id="content-box">
           
                <div class = "container">
            
                <form id="editing-form" method="POST" action="modules/qlsanpham/xuly.php?idsanpham=<?php echo  $row['id_san_pham'] ?>"  enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="clear-both"></div>
            
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Tên sản phẩm: </label>
                        <input type="text" name="tensp" value="<?php echo $row['ten_san_pham'] ?>" style="width: 400px;"  />
                        <div class="clear-both"></div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Ảnh : </label>
                        <div class="right-wrap-field">
                        <img width="300" height="250" src="modules/qlsanpham/uploads/<?php echo $row['hinh_anh']?>" alt="">
                            <input type="file" name="hinhanh" style="padding=5px" />
                        </div>
                        <div class="clear-both"></div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Danh mục: </label>
                        <select name="danhmuc" id="" >
                        <?php 
$sql_dm1="SELECT * FROM danh_muc ORDER BY id_danh_muc DESC";
$query_danhmuc=mysqli_query($con,$sql_dm1);
while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){
  if($row_danhmuc['id_danhmuc']==$row['id_danhmuc']){
 ?>

        <option selected value="<?php echo $row_danhmuc['id_danh_muc'] ?>"  > <?php echo $row_danhmuc['ten_danh_muc'] ?></option>
 
       <?php 
}else {

       ?> 
      <option  value="<?php echo $row_danhmuc['id_danh_muc'] ?>"  > <?php echo $row_danhmuc['ten_danh_muc'] ?></option>
        <?php 


     }  } ?>
                        </select>
                        <div class="clear-both"></div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Giá sản phẩm: </label>
                        <input type="text" name="giasp" value="<?php echo $row['don_gia'] ?>"  style="width: 400px;" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Số lượng: </label>
                        <input type="text" name="soluong" value="<?php echo $row['so_luong'] ?>" style="width: 400px;"  />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Dung lượng pin: </label>
                        <input type="text" name="dungluongpin" value="<?php echo $row['dung_luong_pin'] ?>"  style="width: 400px;" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Màn hình: </label>
                        <input type="text" name="manhinh" value="<?php echo $row['man_hinh'] ?>" style="width: 400px;" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>CPU: </label>
                        <input type="text" name="cpu" value="<?php echo $row['cpu'] ?>" style="width: 400px;" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Ram: </label>
                        <input type="text" name="ram" value="<?php echo $row['ram'] ?>" style="width: 400px;" />
                        <div class="clear-both"></div>
                    </div>
                    
                    
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Thông tin chung: </label>
                        <textarea name="thongtinchung" value="" id="product-content" > <?php echo $row['thong_tin_chung'] ?></textarea>
                        <div class="clear-both"></div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Bảo hành: </label>
                        <textarea name="baohanh" id="product-content"   value="" style="margin-bottom=7px"> <?php echo $row['bao_hanh'] ?></textarea>
                        <div class="clear-both"></div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Trạng thái: </label>
                        <select name="trangthai" id="" >
                    <?php         if($row['trang_thai']==1){ ?>
                            <option value="1" selected>
                                Kích hoạt
                            </option>
                            <option value="0">
                                Ẩn
                            </option>
                            <?php } else { ?>
                                <option value="1" >
                                Kích hoạt
                            </option>
                            <option value="0" selected>
                                Ẩn
                            </option>
                            <?php } ?>
                        </select>
                        <div class="clear-both"></div>
                    </div>
                    <div class="clear-both"></div>
                    <button class="btn-submit" name="suasanpham"> Sửa sản phẩm </button>


                </form>
                <div class="clear-both"></div>
                <script>
               
                    CKEDITOR.replace('product-content');
                </script>
  
        </div>
    </div>
    <script>
    function validateForm() {
        var tensp = document.forms["editing-form"]["tensp"].value;
        var hinhanh = document.forms["editing-form"]["hinhanh"].value;
        var giasp = document.forms["editing-form"]["giasp"].value;
        var soluong = document.forms["editing-form"]["soluong"].value;
        var dungluongpin = document.forms["editing-form"]["dungluongpin"].value;
        var manhinh = document.forms["editing-form"]["manhinh"].value;
        var cpu = document.forms["editing-form"]["cpu"].value;
        var ram = document.forms["editing-form"]["ram"].value;
        var thongtinchung = document.forms["editing-form"]["thongtinchung"].value;
        var baohanh = document.forms["editing-form"]["baohanh"].value;

        if (tensp.trim() == "" || giasp.trim() == "" || soluong.trim()== "" || dungluongpin.trim() == "" || manhinh.trim() == "" || cpu.trim() == "" || ram.trim() == "" || thongtinchung.trim() == "" || baohanh.trim() == "") {
            alert("Vui lòng điền đầy đủ thông tin sản phẩm.");
            return false;
        }

        // var fileInput = document.getElementById('hinhanh');
        // var filePath = fileInput.value;
        // var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        // if (!allowedExtensions.exec(filePath)) {
        //     alert('Vui lòng chọn file hình ảnh có định dạng: .jpg/.jpeg/.png/.gif.');
        //     fileInput.value = '';
        //     return false;
        // }

        if (isNaN(giasp) || isNaN(soluong) || parseInt(giasp) <= 0 || parseInt(soluong) <= 0) {
            alert("Giá sản phẩm và số lượng phải là số lớn hơn 0.");
            return false;
        }

        return true;
    }
</script>

  