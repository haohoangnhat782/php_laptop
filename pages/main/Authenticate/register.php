<form  id="frmRegister"  method="POST"   class="frmRegister">
    <div class="box">
        <input onblur="" type="text" class="form-control" name="maKH" id="maKH" placeholder="Nhập mã khách hàng*" required>

        <span id="makhError" style="color: red; display: none; margin-top: 5px;">Mã khách khách phải bắt đầu KH rồi 5 chữ số - KH00001</span>
    </div>
    <div class="box">
        <input onblur="validateName()" type="text" class="form-control" name="reg_name" id="reg_name" placeholder="Họ và tên*" required>
    </div>
    <div class="box">
        <input onblur="" type="text" class="form-control" name="reg_tel" id="reg_tel" placeholder="Số điện thoại*" required>

        <span id="dienthoaiError" style="color: red; display: none;margin-top: 5px;">">Số điện thoại phải 10 số</span>
    </div>
    <div class="box">
        <input onblur="" type="text" class="form-control" name="reg_email" id="reg_email" placeholder="Nhập địa chỉ email*" required>
    
        <span id="emailError" style="color: red; display: none;margin-top: 5px;">">Email không hợp lệ</span>
    </div>
    <div class="box">
        <input onblur="" type="text" class="form-control" name="reg_pass" id="reg_pass" placeholder="Mật khẩu*" required>
    
        <span id="passError" style="color: red; display: none;margin-top: 5px;">" >Mật khẩu phải 8 kí tự chứa số và chữ</span>
    </div>
    <div class="box">
        <input onblur="" type="text" class="form-control" name="reg_diachi" id="reg_diachi" placeholder="Địa chỉ*" required>
    

    </div>
    <div class="box" onclick="">
        <span   class="submitRegister  submit-btn">Đăng ký</span>
    </div>
</form>

<script>
     document.getElementById("frmRegister").addEventListener("submit", function(event) {
      
      // ---------check-MAKH----------
      var makhInput = document.getElementsByName("maKH")[0];
      var makhError = document.getElementById("makhError");

      if (!/^KH\d+$/.test(makhInput.value)) {
        makhError.style.display = "inline";
        event.preventDefault(); 
      } else {
        makhError.style.display = "none";
      }

      var emailInput = document.getElementsByName("reg_email")[0];
      var emailError = document.getElementById("emailError");

      // ---------check-gmail----------
      if (!/\b[A-Za-z0-9._%+-]+@gmail\.com\b/.test(emailInput.value)) {
        emailError.style.display = "inline";
        event.preventDefault(); // 
      } else {
        emailError.style.display = "none";
      }

      var phoneInput = document.getElementsByName("reg_tel")[0];
      var phoneError = document.getElementById("dienthoaiError");

      // ------------check SDT-------------------
      if (!/^0\d{9}$/.test(phoneInput.value)) {
      phoneError.style.display = "inline";
      event.preventDefault(); 
       } else {
      phoneError.style.display = "none"; 
       }

       var passInput = document.getElementsByName("reg_pass")[0];
      var phoneError = document.getElementById("passError");

    
      // ------------check MK-------------------
      if (!/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(passInput.value)) {
      passError.style.display = "inline";
      event.preventDefault(); 
       } else {
      passError.style.display = "none"; 
       }
    });


</script>