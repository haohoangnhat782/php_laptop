function validateEmail(email) {
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}

function validatePassword(password) {
    // Kiểm tra mật khẩu không có khoảng trắng
    if (/\s/.test(password)) {
        return false;
    }

    // Kiểm tra độ dài mật khẩu
    if (password.length < 8 || password.length > 16) {
        return false;
    }
    return true;
}
function validatePhone(phone) {
    var phonePattern = /^\d{10,11}$/;
    return phonePattern.test(phone);
}
//isNaN(value)
function isEmpty(value) {
    return value.trim() === '';
}
function checkEmptyAndHighlight(inputElement) {
    if (isEmpty(inputElement.val())) {
        return inputElement.css('border', '1px solid red');
    }
}
// $('input').on('input', function() {
//     $(this).css('border', '');
// });
function checkNegativeNumber(inputElement) {
    if (inputElement.val() < 0) {
        return inputElement.css('border', '1px solid red');
    }
}