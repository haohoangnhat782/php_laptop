var topTitle = $(".top-title span");
const bodyContainer = $(".body-container");
const emailRegex = new RegExp("^([\\w\\-.]+@(\\w+\\.)+\\w{2,4})$");
const passwordRegex = new RegExp("^(.{6,})$");

Array.from(topTitle).forEach((topTitleItem) => {
  topTitleItem.addEventListener("click", () => {
    document.querySelector(".active")?.classList.remove("active");
    topTitleItem.classList.add("active");
  });
});

const regexValidateInput = (regex, input) => {
  return regex.test(input);
};

const checkEmptyField = (...fields) => {
  let flag = false;
  for (let field of fields) {
    if (field === "") {
      flag = true;
      break;
    }
  }
  return flag;
};

const validateData = (data) => {
  const { email, password } = data;
  let flag = true;
  if (checkEmptyField(email, password)) {
    alert("Vui lòng nhập đầy đủ thông tin");
    flag = false;
  } else if (!regexValidateInput(emailRegex, email)) {
    alert("Email không hợp lệ");
    flag = false;
  } else if (!regexValidateInput(passwordRegex, password)) {
    alert("Mật khẩu phải có ít nhất 6 ký tự");
    flag = false;
  }
  return flag;
};
const validateDataDK = (data) => {
  const { maKH, reg_name,reg_tel,reg_email,reg_pass,dia_chi} = data;
  let flag = true;
  if (checkEmptyField(maKH, reg_name,reg_tel,reg_email,reg_pass,dia_chi)) {
    alert("Vui lòng nhập đầy đủ thông tin");
    flag = false;
  } 
  return flag;
};
const showLoginForm = () => {
  $.ajax({
    url: "pages/main/Authenticate/login.php",
    success: function (response) {
      $(".form-container").html(response);
      history.pushState(null, null, "index.php?quanly=authenticate&hd=login");
    },
  });
};

const showRegisterForm = () => {
  $.ajax({
    url: "pages/main/Authenticate/register.php",
    success: function (response) {
      $(".form-container").html(response);
      history.pushState(
        null,
        null,
        "index.php?quanly=authenticate&hd=register"
      );
    },
  });
};

$(document).ready(function () {
  window.scrollTo(0, 30);
  bodyContainer.ready(function () {
    showLoginForm();
  });

  $(".login").click(function () {
    showLoginForm();
  });

  $(".register").click(function () {
    showRegisterForm();
  });

  const data = {
    email: "",
    password: "",
    name: "",
    phoneNumber: "",
    action: "",
  };

  function clearData() {
    data.email = "";
    data.password = "";
    data.name = "";
    data.phoneNumber = "";
    data.action = "";
  }

  function handleAjax(data) {
    $.ajax({
      url: "pages/main/Authenticate/authenticateAction.php",
      type: "POST",
      data,
      success: function (response) {
        alert(response);

        if (response === "Đăng nhập thành công") {
          window.location.href = "index.php";
        }
        else if(response === "Đăng ký thành công") {
          window.location.href = "index.php?quanly=authenticate";
        }
      },
    });
  }

  $(".form-container").on("click", ".submitLogin", function () {
    clearData();
    data.email = $("#log-email").val();
    data.password = $("#log-pass").val();
    data.action = "login";

    if (validateData(data)) {
      handleAjax(data);
    }
  });

  $(".form-container").on("click", ".submitRegister", function () {
    clearData();
    data.maKH = $("#maKH").val();
    data.reg_name = $("#reg_name").val();
    data.reg_tel = $("#reg_tel").val();
    data.reg_email = $("#reg_email").val();
    data.reg_pass = $("#reg_pass").val();
    data.dia_chi = $("#reg_diachi").val();
    data.action = "register";
    if (validateDataDK(data)) {
      handleAjax(data);
    }
  });
});


const validateName = () => {
  const fname = document.getElementById("reg_name");
  if (fname.value.length < 6) {
      fname.style.borderColor = "red";
      return false;
  } else {
      fname.style.borderColor = "green";
      return true;
  }
};

const validateMakh = () => {
  const makh = document.getElementById("makh");
  if (!/^KH\d{5}$/.test(makh.value)) {
      makh.style.borderColor = "red";
      return false;
  } else {
      makh.style.borderColor = "green";
      return true;
  }
};

const validateEmailField = () => {
  const email = document.getElementById("reg_email");
  if (!isEmail(email.value)) {
      email.style.borderColor = "red";
      return false;
  } else {
      email.style.borderColor = "green";
      return true;
  }
};

const validatePassword = () => {
  const pwd = document.getElementById("reg_pass");
  if (!isPassWord(pwd.value)) {
      pwd.style.borderColor = "red";
      return false;
  } else {
      pwd.style.borderColor = "green";
      return true;
  }
};

const validateForm = () => {
  const isNameValid = validateName();
  const isTelValid = validateTel();
  const isEmailValid = validateEmailField();
  const isPwdValid = validatePassword();
  const isMaKh=validateMakh();

  return isNameValid && isTelValid && isEmailValid && isPwdValid && isMaKh;
};

function isVietnamesePhoneNumber(number) {
  return /(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/.test(number);
}

const isPassWord = (password) => {
  const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
  return regex.test(password);
};
const validateTel = () => {
  const tel = document.getElementById("reg_tel");
  if (!isVietnamesePhoneNumber(tel.value)) {
    tel.style.borderColor = "red";
    return false;
  } else {
    tel.style.borderColor = "green";
    return true;
  }
};
const isEmail = (email) => {
  const regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return regex.test(email);
};

const isMaKh = (makh) => {
 
  const regex = /^KH\d{5}$/;
  return regex.test(makh);
};


const showAlertErr = (content) => {
  const alert = document.getElementById("alert-error");
  alert.innerText = content
  alert.style.display = 'block'
  alert.addEventListener('animationend', function() {
    alert.style.display = 'none';
  });
}

const showAlertSuccess = (content) => {
  const alert = document.getElementById("alert-success");
  alert.innerText = content
  alert.style.display = 'block'
  alert.addEventListener('animationend', function() {
    alert.style.display = 'none';
  });
}


