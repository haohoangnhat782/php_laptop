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
