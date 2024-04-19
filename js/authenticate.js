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
  if (validateForm()) {
    const data = {
      reg_name: document.getElementById('reg_name').value,
      reg_tel: document.getElementById('reg_tel').value,
      reg_email: document.getElementById('reg_email').value,
      reg_pass: document.getElementById('reg_pass').value
    };
    $.ajax({
      url: 'config/handleRegister.php',
      type: 'POST', 
      data: data,
      success: function(response) {
        console.log(response)
        const parsedResponse = JSON.parse(response);
        const status = parsedResponse.status;
        const message = parsedResponse.message;
          if(status === 200){
            showAlertSuccess(message)
            setTimeout(() => {
              document.querySelector(".login").click()
            }, 1600);
          }else{
            showAlertErr(message)
          }
      },
      error: function(xhr, status, error) {
          console.error(error);
      }
  });
  }
}

const handleLogin = () => {
  if(validateEmailFieldLogin && validatePasswordFieldLogin){
    const data = {
      log_email: document.getElementById('log_email').value,
      log_pass: document.getElementById('log_pass').value
    };
    $.ajax({
      url: 'config/handleLogin.php',
      type: 'POST',
      data: data,
      success: function(response){
        console.log(response)
        const parsedResponse = JSON.parse(response);
        const status = parsedResponse.status;
        const message = parsedResponse.message;
        if(status === 200){
          showAlertSuccess(message)
          window.location.href = 'index.php?quanly=trangchu'
        }else{
          showAlertErr(message)
          document.getElementById('log_email').innerText = ""
          document.getElementById('log_pass').innerText = ""
        }
      },
      error: function(xhr, status, error) {
        console.error(error);
    }
    });
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

const validateEmailFieldLogin = () => {
  const email = document.getElementById("log_email");
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

const validatePasswordFieldLogin = () => {
  const pwd = document.getElementById("log_pass");
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
