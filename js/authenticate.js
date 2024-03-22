var topTitle = $(".top-title span");
const bodyContainer = $(".body-container");

Array.from(topTitle).forEach((topTitleItem) => {
  topTitleItem.addEventListener("click", () => {
    document.querySelector(".active")?.classList.remove("active");
    topTitleItem.classList.add("active");
  });
});

// $(document).ready(function () {
//   window.scrollTo(0, 30);
//   bodyContainer.ready(function () {
//     $.ajax({
//       url: "login.php",
//       success: function (response) {
//         $(".form-container").html(response);
//       },
//     });
//   });

//   $(".login").click(function () {
//     $.ajax({
//       url: "login.php",
//       success: function (response) {
//         $(".form-container").html(response);
//       },
//     });
//   });

//   $(".register").click(function () {
//     $.ajax({
//       url: "register.php",
//       success: function (response) {
//         $(".form-container").html(response);
//       },
//     });
//   });
// });
