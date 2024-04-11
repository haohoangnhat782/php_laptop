var topTitle = $(".top-title span");
const bodyContainer = $(".body-container");

Array.from(topTitle).forEach((topTitleItem) => {
  topTitleItem.addEventListener("click", () => {
    document.querySelector(".active")?.classList.remove("active");
    topTitleItem.classList.add("active");
  });
});

$(document).ready(function () {
  window.scrollTo(0, 30);
  bodyContainer.ready(function () {
    $.ajax({
      url: "pages/main/Authenticate/login.php",
      success: function (response) {
        $(".form-container").html(response);
      },
    });
  });

  $(".login").click(function () {
    $.ajax({
      url: "pages/main/Authenticate/login.php",
      success: function (response) {
        $(".form-container").html(response);
      },
    });
  });

  $(".register").click(function () {
    $.ajax({
      url: "pages/main/Authenticate/register.php",
      success: function (response) {
        $(".form-container").html(response);
      },
    });
  });
});

const handleRegister = () => {
  if(!validateForm()){
    return;
  }else{
    document.getElementById("frmRegister").submit();
  }
}


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

  return isNameValid && isTelValid && isEmailValid && isPwdValid;
};

function isVietnamesePhoneNumber(number) {
  return /(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/.test(number);
}

const isPassWord = (password) => {
  const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
  return regex.test(password);
};

const isEmail = (email) => {
  const regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return regex.test(email);
};
