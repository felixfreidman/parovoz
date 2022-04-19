"use strict";

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
        order: order
      },
      success: function success(response) {
        orderButton.textContent = response;
        setTimeout(eraseLocalStorage, 300);
        setTimeout(function () {
          window.location.href = "https://parovoz.yurin.biz/product/single-product/";
        }, 1200);
      }
    });
  });
}); // Проверяем, что все поля важные заполнены

$(".order-button").on("click", function () {
  inputAuthorization();
}); //   
// Сама функция проверки полей и добавления дополнительных свойств полю

function inputAuthorization() {
  var inputsArray = document.querySelectorAll(".form-input");
  inputsArray.forEach(function (input) {
    if (!input.value) {
      var span = addWarningEmptySpan();
      input.classList.add("form-input--warning");
      var inputID = input.id;
      var inputLabel = document.querySelector("[for=".concat(inputID, "]"));
      inputLabel.appendChild(span);
    }
  });
} // Не хотел перегружать функция проверки и прочее, поэтому создание отдельного спана вынес отдельно


function addWarningEmptySpan() {
  var warningEmptySpan = document.createElement("span");
  warningEmptySpan.classList.add("empty--input");
  return warningEmptySpan;
} // Как только пользователь решился ввести данные, если было предупреждение я удаляю предупреждения всякие


function deleteWarningSpans() {
  var inputsArray = document.querySelectorAll(".form-input");
  inputsArray.forEach(function (input) {
    input.addEventListener("input", function () {
      var inputID = input.id;
      var inputLabel = document.querySelector("[for=".concat(inputID, "]"));

      if (inputLabel.querySelector(".empty--input")) {
        var certainSpan = inputLabel.querySelector(".empty--input");
        certainSpan.remove();
        input.classList.remove("form-input--warning");
      }
    });
  });
}

deleteWarningSpans(); // Чистим локальное хранилище

function eraseLocalStorage() {
  localStorage.removeItem("globalCounter");
  localStorage.removeItem("bookedServices");
}

Storage.prototype.setObj = function (key, obj) {
  return this.setItem(key, JSON.stringify(obj));
};

Storage.prototype.getObj = function (key) {
  return JSON.parse(this.getItem(key));
};

var globalCounter = 0;

if (localStorage.getItem("globalCounter")) {
  globalCounter = localStorage.getItem("globalCounter");
}

var booksArray = new Array();

if (localStorage.getObj("bookedServices")) {
  booksArray = localStorage.getObj("bookedServices");
}

if (document.querySelector(".article-card")) {
  var cardsArray = document.querySelectorAll(".article-card");
  cardsArray.forEach(function (card) {
    card.addEventListener("mouseover", function () {
      var background = card.style.background;
      background = background.replace("linear-gradient(360deg, rgba(26, 47, 68, 0.9) 0%, rgba(26, 47, 68, 0) 100%)", "linear-gradient( 360deg, rgba(212, 37, 21, 0.8) 0%, rgba(212, 37, 21, 0) 100%)");
      card.style.background = background;
    });
    card.addEventListener("mouseout", function () {
      var background = card.style.background;
      background = background.replace("linear-gradient(360deg, rgba(212, 37, 21, 0.8) 0%, rgba(212, 37, 21, 0) 100%)", "linear-gradient(360deg, rgba(26, 47, 68, 0.9) 0%, rgba(26, 47, 68, 0) 100%)");
      card.style.background = background;
    });
  });
}

if (document.getElementById("orderDate")) {
  document.getElementById('orderDate').valueAsDate = new Date();
}

if (window.location.href.includes("product")) {
  var createBookingItem = function createBookingItem() {
    var serviceName = document.querySelector(".service-header").textContent;
    var servicePrice = document.querySelector(".price-tag").textContent;
    var serviceDescription = document.querySelector(".description-content").textContent;
    var bookObj = {
      serviceCounter: parseInt(globalCounter),
      serviceName: serviceName,
      servicePrice: servicePrice,
      serviceDescription: serviceDescription
    };
    booksArray.push(bookObj);
    localStorage.setObj("bookedServices", booksArray);
    localStorage.setItem("globalCounter", globalCounter);
    globalCounter++;
    window.location.href = "book";
  };

  var bookBtn = document.querySelector(".service-data__book-btn");
  bookBtn.addEventListener("click", createBookingItem);
}

if (window.location.href.includes("book")) {
  var createServiceOrder = function createServiceOrder(name, price, description, id) {
    var HTMLString = "\n    <div class=\"order-container order-service\" id=\"service".concat(id, "\">\n    <div class=\"cross\" id=\"cross").concat(id, "\">\n        <div class=\"cross-one\"> </div>\n        <div class=\"cross-two\"></div>\n    </div>\n    <div class=\"order-row\">\n        <div class=\"order-info\">\n            <div class=\"order-header\">").concat(name, "</div>\n            <div class=\"order-cost\">").concat(price, " \u20BD / \u0447\u0430\u0441</div>\n        </div>\n    </div>\n    <div class=\"order-content\">\n        <div class=\"content-header\">\u041E\u043F\u0438\u0441\u0430\u043D\u0438\u0435</div>\n        <div class=\"content-description\">\n            <div>").concat(description, "</div>\n        </div>\n    </div>\n</div>\n    ");
    return HTMLString;
  };

  var createServiceTotal = function createServiceTotal(name, price, id) {
    var HTMLString = "\n      <div class=\"order-item order-item--service\" id=\"totalOrderID".concat(id, "\">\n        <div class=\"order-item__name\" id=\"orderServiceName\">").concat(name, "</div>\n        <div class=\"order-item__bar\"> </div>\n        <div class=\"order-item__price\" id=\"orderServicePrice\">").concat(price, " <span>\u20BD</span></div>\n    </div>\n    ");
    return HTMLString;
  };

  var updateUserOrderField = function updateUserOrderField() {
    var userOrderField = document.getElementById("userOrder");
    var userOrderList = document.querySelectorAll(".order-item");
    var totalPrice = document.getElementById("orderTotalPrice").textContent;
    var orderString = '';
    userOrderList.forEach(function (order) {
      var orderName = order.querySelector(".order-item__name").textContent;
      var orderPrice = order.querySelector(".order-item__price").textContent;
      orderString = "".concat(orderString, " ").concat(orderName, " - ").concat(orderPrice, ".  ");
    });
    var totalString = "\u0412\u0441\u0435\u0433\u043E: ".concat(totalPrice);
    orderString += totalString;
    userOrderField.value = orderString;
    console.log(userOrderField.value);
  };

  var updateTotalNumber = function updateTotalNumber() {
    if (document.querySelectorAll(".order-item__price")) {
      var allOrdersNums = document.querySelectorAll(".order-item__price");
      var totalNum = document.getElementById("orderTotalPrice");
      var totalSum = 0;
      allOrdersNums.forEach(function (price) {
        var realPrice = parseInt(price.textContent);
        totalSum += realPrice;
      });
      var totalNumFinal = totalNum.childNodes[0];
      totalNumFinal.nodeValue = totalSum + ' ';
    } else {
      var _totalNum = document.getElementById("orderTotalPrice");

      var _totalSum = 0;
      var _totalNumFinal = _totalNum.childNodes[0];
      _totalNumFinal.nodeValue = _totalSum + ' ';
    }
  };

  var deleteOrderFromLists = function deleteOrderFromLists() {
    var allCrosses = document.querySelectorAll(".cross");
    var orderContainer = document.querySelector(".orders-container");
    var orderList = document.querySelector(".order-list");
    allCrosses.forEach(function (cross) {
      cross.addEventListener("click", function () {
        var crossCounter = cross.id.replace('cross', '');
        var orderItem = document.getElementById("service".concat(crossCounter));
        var orderTotalItem = document.getElementById("totalOrderID".concat(crossCounter));
        orderContainer.removeChild(orderItem);
        orderList.removeChild(orderTotalItem);
        updateTotalNumber();
        updateUserOrderField();
        crossCounter = parseInt(crossCounter);
        var filteredArray = booksArray.filter(function (value, index, arr) {
          value = value.serviceCounter;
          return value != crossCounter;
        });
        localStorage.setObj("bookedServices", filteredArray);
      });
    });
  };

  var bookedItems = localStorage.getObj("bookedServices");
  var orderContainer = document.querySelector(".orders-container");
  var orderList = document.querySelector(".order-list");
  var counter = 0;
  bookedItems.forEach(function (order) {
    var serviceName = order.serviceName;
    var servicePrice = order.servicePrice;
    var serviceDescription = order.serviceDescription;
    var serviceCounter = order.serviceCounter;
    var readyOrder = createServiceOrder(serviceName, servicePrice, serviceDescription, serviceCounter);
    var totalOrder = createServiceTotal(serviceName, servicePrice, serviceCounter);
    orderContainer.insertAdjacentHTML('beforeend', readyOrder);
    orderList.insertAdjacentHTML('beforeend', totalOrder);
  });
  setTimeout(updateTotalNumber, 100);
  setTimeout(deleteOrderFromLists, 100);
  setTimeout(updateUserOrderField, 100);
  $(document).ready(function () {
    $("#userPhone").inputmask();
  });
}

$("#slider").slider({
  animate: "fast",
  max: 5,
  min: 1,
  step: 1,
  range: true,
  values: [1, 5],
  slide: function slide(event, ui) {
    $("#starRating").val(ui.value);
    $(".controls-section__button").removeClass("js--hidden");
    filterFeedbacksByRating();
  }
});

if (document.getElementById("ratingForm")) {
  var form = document.getElementById("ratingForm");
  var select = document.getElementById("bathType");
  form.addEventListener("reset", function () {
    $("#slider").slider("values", [1, 5]);
    $(".controls-section__button").addClass("js--hidden");
    var allFeedbacks = document.querySelectorAll('.feedback-item');
    allFeedbacks.forEach(function (feedback) {
      feedback.classList.remove("js--hidden");
    });
  });
  select.addEventListener("change", function () {
    $(".controls-section__button").removeClass("js--hidden");
    var checkedOption = $(select).val();
    filterFeedbacksByName(checkedOption);
  });
}

function filterFeedbacksByRating() {
  var allFeedbacks = document.querySelectorAll('.feedback-item');
  var starRating = $("#slider").slider("values");
  allFeedbacks.forEach(function (feedback) {
    if (feedback.querySelector(".amount").textContent != $("#starRating").val()) {
      feedback.classList.add("js--hidden");
    } else {
      feedback.classList.remove("js--hidden");
    }
  });
}

function filterFeedbacksByName(checkedValue) {
  var allFeedbacks = document.querySelectorAll('.feedback-item');
  allFeedbacks.forEach(function (feedback) {
    if (feedback.querySelector(".feedback-item__caption").textContent != checkedValue) {
      feedback.classList.add("js--hidden");
    } else {
      feedback.classList.remove("js--hidden");
    }
  });
}

var swiper = new Swiper('#workerSwiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  speed: 400,
  spaceBetween: 34,
  effect: 'cards',
  slidesPerView: '4',
  swipeHandler: '.swiper-wrapper'
});
var swiperImages = document.querySelectorAll(".bathroom-preview");
console.log(swiperImages);
var imgLinkArray = new Array();
var returnValue = 0;
swiperImages.forEach(function (image) {
  var imageSrc = image.src.replace("http://localhost:3000", ".");
  var returnValue = "<img class=\"swiper-preview swiper-pagination-bullet\" src=".concat(imageSrc, ">");
  imgLinkArray.push(returnValue);
});
var fancySwiper = new Swiper('#fancySwiper', {
  direction: 'horizontal',
  loop: true,
  speed: 500,
  spaceBetween: 34,
  effect: 'fade',
  fadeEffect: {
    crossFade: true
  },
  slidesPerView: '1',
  swipeHandler: '.swiper-wrapper',
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
    renderBullet: function renderBullet(index) {
      return imgLinkArray[index];
    }
  }
});