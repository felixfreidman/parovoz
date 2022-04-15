// AJAX-запрос для отправки сообщений на почту, которая указана в админке сайта
$(function () {
    $("#orderForm").on("submit", function (e) {
        e.preventDefault();
        var name = $("#userName").val();
        var phone = $("#userPhone").val();
        var mail = $("#userEmail").val();
        var order = $("#userOrder").val();
        var orderButton = document.querySelector('.order-button');
        orderButton.textContent = "Подтверждаем";

        $.ajax({
            type: "post",
            url: "/wp-admin/admin-ajax.php",
            data: {
                action: "ajax_form",
                name: name,
                phone: phone,
                mail: mail,
                order: order,
            },
            success: function (response) {
                orderButton.textContent = response;
                setTimeout(eraseLocalStorage, 300);
                setTimeout(() => {
                    window.location.href = "https://parovoz.yurin.biz/product/single-product/";
                }, 1200);
            },
        });
    });
});
// Проверяем, что все поля важные заполнены
$(".order-button").on("click", function () {
    inputAuthorization();
});
//   
// Сама функция проверки полей и добавления дополнительных свойств полю
function inputAuthorization() {
    const inputsArray = document.querySelectorAll(".form-input");
    inputsArray.forEach((input) => {
        if (!input.value) {
            const span = addWarningEmptySpan();
            input.classList.add("form-input--warning");
            const inputID = input.id;
            const inputLabel = document.querySelector(`[for=${inputID}]`);
            inputLabel.appendChild(span);
        }
    });
}

// Не хотел перегружать функция проверки и прочее, поэтому создание отдельного спана вынес отдельно
function addWarningEmptySpan() {
    const warningEmptySpan = document.createElement("span");
    warningEmptySpan.classList.add("empty--input");
    return warningEmptySpan;
}
// Как только пользователь решился ввести данные, если было предупреждение я удаляю предупреждения всякие
function deleteWarningSpans() {
    const inputsArray = document.querySelectorAll(".form-input");
    inputsArray.forEach((input) => {
        input.addEventListener("input", () => {
            const inputID = input.id;
            const inputLabel = document.querySelector(`[for=${inputID}]`);
            if (inputLabel.querySelector(".empty--input")) {
                const certainSpan = inputLabel.querySelector(".empty--input");
                certainSpan.remove();
                input.classList.remove("form-input--warning");
            }
        });
    });
}

deleteWarningSpans();


// Чистим локальное хранилище
function eraseLocalStorage() {
    localStorage.removeItem("globalCounter");
    localStorage.removeItem("bookedServices");
}
