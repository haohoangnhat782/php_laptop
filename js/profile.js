var profileSettingItems = $(".profile-setting-item");
const bodyContainer = $(".body-container");
const emailRegex = new RegExp("^([\\w\\-.]+@(\\w+\\.)+\\w{2,4})$");
const passwordRegex = new RegExp("^(.{6,})$");
const phoneNumberRegex = new RegExp("^(0[0-9]{9,10})$");

Array.from(profileSettingItems).forEach((profileSettingItem) => {
  profileSettingItem.addEventListener("click", () => {
    document.querySelector(".selected")?.classList.remove("selected");
    profileSettingItem.classList.add("selected");
  });
});

const regexValidateInput = (regex, input) => {
  return regex.test(input);
};

const validateData = (data) => {
  const { action } = data;
  let flag = true;
  if (action == "userInfo") {
    if (!regexValidateInput(emailRegex, data.secondInputValue)) {
      alert("Email không hợp lệ");
      flag = false;
    } else if (!regexValidateInput(phoneNumberRegex, data.thirdInputValue)) {
      alert("Số điện thoại không hợp lệ");
      flag = false;
    }
  } else {
    if (!regexValidateInput(passwordRegex, data.secondInputValue)) {
      alert("Mật khẩu phải có ít nhất 6 ký tự");
      flag = false;
    } else if (!regexValidateInput(passwordRegex, data.thirdInputValue)) {
      alert("Mật khẩu xác nhận phải có ít nhất 6 ký tự");
      flag = false;
    } else if (data.secondInputValue !== data.thirdInputValue) {
      alert("Mật khẩu xác nhận không khớp");
      flag = false;
    }
  }
  return flag;
};

$(document).ready(function (event) {
  bodyContainer.ready(function () {
    $.ajax({
      url: "pages/main/Profile/UpdateProfileInfo/updateProfile.php",
      success: function (response) {
        $(".profile-content-container").html(response);
        history.pushState(null, null, "index.php?quanly=profile&hd=userInfo");
      },
      data: {
        isUserInfo: true,
      },
    });
  });

  const updateProfile = $(".updateProfile");
  Array.from(updateProfile).forEach((updateProfileItem) => {
    updateProfileItem.addEventListener("click", () => {
      $.ajax({
        url: "pages/main/Profile/UpdateProfileInfo/updateProfile.php",
        data: {
          isUserInfo: updateProfileItem.classList.contains("isUserInfo")
            ? true
            : false,
        },
        success: function (response) {
          $(".profile-content-container").html(response);
          if (updateProfileItem.classList.contains("isUserInfo")) {
            history.pushState(
              null,
              null,
              "index.php?quanly=profile&hd=userInfo"
            );
          } else {
            history.pushState(
              null,
              null,
              "index.php?quanly=profile&hd=passwordManagement"
            );
          }
        },
      });
    });
  });

  $(".orderManagement").click(function () {
    $.ajax({
      url: "pages/main/Profile/UpdateProfileInfo/orderManagement.php",
      success: function (response) {
        $(".profile-content-container").html(response);
        history.pushState(
          null,
          null,
          "index.php?quanly=profile&hd=orderManagement"
        );
      },
    });
  });

  $(".submitLogout").on("click", function () {
    $(".btn-submit-logout").on("click", function () {
      $(".modal").modal("hide");
      $(".modal").on("hidden.bs.modal", function () {
        $.ajax({
          url: "pages/main/Authenticate/logout.php",
          success: function (response) {
            alert(response);
            if (response === "Đăng xuất thành công!") {
              window.location.href = "index.php";
            }
          },
        });
      });
    });
  });

  const data = {
    firstInputValue: "",
    secondInputValue: "",
    thirdInputValue: "",
    action: "",
  };

  function clearData() {
    data.firstInputValue = "";
    data.secondInputValue = "";
    data.thirdInputValue = "";
    data.action = "";
  }

  function handleAjax(data) {
    $.ajax({
      url: "pages/main/Profile/profileAction.php",
      type: "POST",
      data,
      success: function (response) {
        alert(response);

        if (response == "Cập nhật thành công") {
          window.location.href = "index.php?quanly=profile&hd=userInfo";
        }
      },
    });
  }

  $(".profile-content-container").on(
    "click",
    ".profile-update-submit-btn",
    function () {
      clearData();
      data.firstInputValue = $("#input0").val();
      data.secondInputValue = $("#input1").val();
      data.thirdInputValue = $("#input2").val();
      data.action = "userInfo";

      if (validateData(data)) {
        handleAjax(data);
      }
    }
  );

  $(".profile-content-container").on(
    "click",
    ".profile-change-password-btn",
    function () {
      clearData();
      data.firstInputValue = $("#input0").val();
      data.secondInputValue = $("#input1").val();
      data.thirdInputValue = $("#input2").val();
      data.action = "passwordManagement";

      if (validateData(data)) {
        handleAjax(data);
      }
    }
  );
});
