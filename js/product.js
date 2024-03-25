document.addEventListener('DOMContentLoaded', function () {
    var decreaseButtons = document.querySelectorAll('.decrease');
    var increaseButtons = document.querySelectorAll('.increase');
    var quantityInputs = document.querySelectorAll('.quantity-input');

    decreaseButtons.forEach(function (button, index) {
        button.addEventListener('click', function () {
            var currentValue = parseInt(quantityInputs[index].value);
            if (currentValue > 1) {
                quantityInputs[index].value = currentValue - 1;
            }
        });
    });

    increaseButtons.forEach(function (button, index) {
        button.addEventListener('click', function () {
            var currentValue = parseInt(quantityInputs[index].value);
            quantityInputs[index].value = currentValue + 1;
        });
    });
});