var profileSettingItems = $(".profile-setting-item");
const bodyContainer = $(".body-container");

Array.from(profileSettingItems).forEach((profileSettingItem) => {
  profileSettingItem.addEventListener("click", () => {
    document.querySelector(".selected")?.classList.remove("selected");
    profileSettingItem.classList.add("selected");
  });
});

$(document).ready(function (event) {
  bodyContainer.ready(function () {
    $.ajax({
      url: "pages/main/Profile/UpdateProfileInfo/updateProfile.php",
      success: function (response) {
        $(".profile-content-container").html(response);
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
        success: function (response) {
          $(".profile-content-container").html(response);
        },
        data: {
          isUserInfo: updateProfileItem.classList.contains("isUserInfo")
            ? true
            : false,
        },
      });
    });
  });

  $(".orderManagement").click(function () {
    $.ajax({
      url: "pages/main/Profile/UpdateProfileInfo/orderManagement.php",
      success: function (response) {
        $(".profile-content-container").html(response);
      },
    });
  });
});

function handleLogout() {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "config/handleLogout.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          if (response.status === "success") {
              window.location.href = "index.php?quanly=trangchu";
          } else {
              console.error("Logout failed");
          }
      }
  };
  xhr.send();
}
