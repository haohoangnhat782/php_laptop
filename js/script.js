//-----------slider--------
let index = 0;
const imgNumber = document.querySelectorAll(".slider-content-left-top img");
const rightbtn = document.querySelector(".fa-chevron-right");
const leftbtn = document.querySelector(".fa-chevron-left");

rightbtn.addEventListener("click", function () {
  index += 1;
  if (index > imgNumber.length - 1) index = 0;
  document.querySelector(".slider-content-left-top").style.right =
    index * 100 + "%";
});
leftbtn.addEventListener("click", function () {
  index -= 1;
  if (index <= 0) index = imgNumber.length - 1;
  document.querySelector(".slider-content-left-top").style.right =
    index * 100 + "%";
});

const imgNumberLi = document.querySelectorAll(".slider-content-left-bottom li");
imgNumberLi.forEach(function (image, index) {
  image.addEventListener("click", function () {
    removeActive();
    document.querySelector(".slider-content-left-top").style.right =
      index * 100 + "%";
    image.classList.add("active-product");
  });
});
function removeActive() {
  let liActive = document.querySelector(".active-product");
  liActive.classList.remove("active-product");
}

function autoSlider() {
  index += 1;
  if (index > imgNumber.length - 1) index = 0;
  removeActive();
  document.querySelector(".slider-content-left-top").style.right =
    index * 100 + "%";
  imgNumberLi[index].classList.add("active-product");
}
setInterval(autoSlider, 5000);
