<?php 
 $sql_sua_thanhvien="SELECT * FROM user WHERE id= '$_GET[id]' LIMIT 1";
 $query_sua_thanhvien =mysqli_query($con,$sql_sua_thanhvien);

 ?>
<div class="main-content">
        <h1>Sửa thành viên</h1>
        <div id="content-box">
           
                <div class = "container">
            <?php while($row= mysqli_fetch_array($query_sua_thanhvien)){ ?>
                <form id="editing-form" method="POST" action="modules/qlthanhvien/xuly.php?id=<?php echo $row['id'] ?>"  enctype="multipart/form-data" onsubmit="return validateForm();">
                    
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Họ và tên: </label>
                        <input type="text" name="hoten" value="<?= $row['fullname'] ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Tên tài khoản: </label>
                        <input type="text" name="username" value="<?= $row['username'] ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Password: </label>
                        <input type="text" name="password" value="<?= $row['password'] ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Trạng thái: </label>
                        <select name="trangthai" id="">
                            <?php if($row['TTTK']==1){ ?>
                            <option value="1" selected>
                                Kích hoạt
                            </option>
                            <option value="0">
                                Ẩn
                            </option>
                            <?php }else{ ?>
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
                    <button class="btn-submit" name="suathanhvien"> Sửa thành viên</button>
                </form>
           <?php } ?>
                <div class="clear-both"></div>
                <script>
                function validateForm() {
        var hoten = document.forms["editing-form"]["hoten"].value;
        var username = document.forms["editing-form"]["username"].value;
        var password = document.forms["editing-form"]["password"].value;
        var trangthai = document.forms["editing-form"]["trangthai"].value;

        
        if (hoten.trim() === "" || username.trim() === "" || password.trim() === "" || trangthai === "") {
            alert("Vui lòng điền đầy đủ thông tin.");
            return false;
        }

        if (password.length < 6 || !/\d/.test(password) || !/[a-zA-Z]/.test(password)) {
            alert("Mật khẩu phải chứa ít nhất 6 ký tự và bao gồm ít nhất một chữ cái và một số.");
            return false;
        }
        
        return true;
    }
                    // CKEDITOR.replace('product-content');
                </script>
        </div>
    </div>

  