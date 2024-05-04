function up_quantity(masp) {
  var currentQuantity = parseInt(
    $('input[name="quantity_' + masp + '"]').val()
  );
  $('input[name="quantity_' + masp + '"]').val(currentQuantity + 1);
  change_quantity(masp);
}

function down_quantity(masp) {
  var currentQuantity = parseInt(
    $('input[name="quantity_' + masp + '"]').val()
  );
  if (currentQuantity > 1) {
    $('input[name="quantity_' + masp + '"]').val(currentQuantity - 1);
    change_quantity(masp);
  }
}

function change_quantity(masp) {
  updateQuantity(masp);
}

function updateQuantity(masp) {
  $.ajax({
    url: "pages/main/Purchase/refreshPurchaseForm.php",
    type: "POST",
    data: {
      masp,
      quantity: $('input[name="quantity_' + masp + '"]').val(),
    },
    success: function (response) {
      $(".dynamicContentCart").html(response);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      // Handle any errors
    },
  });
}

const data = {
  name: "",
  phoneNumber: "",
  address: "",
  datePurchase: "",
  dateReceive: "",
  totalPrice: "",
};

let datePurchase = new Date();

const formattedDatePurchase =
  datePurchase.getFullYear() +
  "-" +
  ("0" + (datePurchase.getMonth() + 1)).slice(-2) +
  "-" +
  ("0" + datePurchase.getDate()).slice(-2) +
  " " +
  ("0" + datePurchase.getHours()).slice(-2) +
  ":" +
  ("0" + datePurchase.getMinutes()).slice(-2) +
  ":" +
  ("0" + datePurchase.getSeconds()).slice(-2);

const dateReceive = new Date(datePurchase); // Create a copy of currentDate
dateReceive.setDate(datePurchase.getDate() + 7); // Add 7 days to currentDate
const formattedDateReceive =
  dateReceive.getFullYear() +
  "-" +
  ("0" + (datePurchase.getMonth() + 1)).slice(-2) +
  "-" +
  ("0" + datePurchase.getDate()).slice(-2) +
  " " +
  ("0" + datePurchase.getHours()).slice(-2) +
  ":" +
  ("0" + datePurchase.getMinutes()).slice(-2) +
  ":" +
  ("0" + datePurchase.getSeconds()).slice(-2);

function isVietnamesePhoneNumber(number) {
  return /(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/.test(number);
}

const validateInput = (data) => {
  const { name, phoneNumber, address } = data;
  let flag = true;
  if (!name || !phoneNumber || !address) {
    alert("Vui lòng nhập đầy đủ thông tin");
    flag = false;
  } else if (!isVietnamesePhoneNumber(phoneNumber)) {
    alert("Số điện thoại không hợp lệ");
    flag = false;
  }
  return flag;
};


$(document).ready(function () {
  $(".btn-modal-confirm").on("click", function () {
    console.log("clicked");
    $("#exampleModal").modal("hide");
    $(".modal").on("hidden.bs.modal", function () {
      data.name = $("#name").val();
      data.phoneNumber = $("#telephone").val();
      data.address = $("#address").val();
      data.datePurchase = formattedDatePurchase;
      data.dateReceive = formattedDateReceive;
      data.totalPrice = $("#total_money")
        .text()
        .replace("$", "")
        .replaceAll(",", "")
        .replace(".00", "");
      console.log(data.totalPrice);


        $.ajax({
          url: "pages/main/Purchase/purchaseAction.php",
          type: "POST",
          data,
          success: function (response) {
            alert(response);

            if (response === "Đặt hàng thành công") {
              window.location.href = "index.php";
            }
          },
        });
      
    });
  });
});
