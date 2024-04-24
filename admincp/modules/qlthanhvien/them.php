
<div class="main-content">
        <h1>Thêm thành viên</h1>
        <div id="content-box">
           
                <div class = "container">
            
                <form id="editing-form" method="POST" action="modules/qlthanhvien/xuly.php"  enctype="multipart/form-data" onsubmit="return validateForm();">
                    
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Họ và tên: </label>
                        <input type="text" name="hoten" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Tên tài khoản: </label>
                        <input type="text" name="username" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Password: </label>
                        <input type="text" name="password" value="" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Trạng thái: </label>
                        <select name="trangthai" id="">
                            <option value="1">
                                Kích hoạt
                            </option>
                            <option value="0">
                                Ẩn
                            </option>
                        </select>
                        <div class="clear-both"></div>
                    </div>
                    <button class="btn-submit" name="themthanhvien"> Thêm thành viên</button>
                </form>
           
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

  