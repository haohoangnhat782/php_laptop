<?php 
 $sql_sua_danhmucsp="SELECT * FROM danh_muc WHERE id_danh_muc= '$_GET[id]' LIMIT 1";
 $query_sua_danhmucsanpham =mysqli_query($con,$sql_sua_danhmucsp);

 ?>

<div class="main-content">
        <h1>Sửa danh mục</h1>
        <div id="content-box">
           
                <div class = "container">
                
<?php 
while($row=mysqli_fetch_array($query_sua_danhmucsanpham)){
 ?>
                <form id="editing-form" method="POST" action="modules/qldanhmuc/xuly.php?id=<?php echo $_GET['id'] ?>"  enctype="multipart/form-data" onsubmit="return validateForm();">
                    
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Tên danh mục: </label>
                        <input type="text" name="tendanhmuc" value="<?php echo $row['ten_danh_muc'] ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <button class="btn-submit" name="suadanhmuc"> Sửa danh mục</button>
                </form>
           <?php } ?>
                <div class="clear-both"></div>
                <script>
                    function validateForm(){
                        var tendanhmuc=document.forms["editing-form"]["tendanhmuc"].value;
                         
        if (tendanhmuc.trim() === "" ) {
            alert("Vui lòng điền đầy đủ thông tin.");
            return false;
        }

 return true;

                    }
               
                    CKEDITOR.replace('product-content');
                </script>
  
        </div>
    </div>

  