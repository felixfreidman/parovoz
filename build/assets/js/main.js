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
        setTimeout(function () {
          window.location.href = "https://parovoz.yurin.biz/services";
        }, 1200);
      }
    });
  });
});
$(function () {
  $(".apply-form").on("submit", function (e) {
    e.preventDefault();
    var name = $("#reviewName").val();
    var description = $("#description").val();
    var orderButton = document.querySelector('.form-button');
    orderButton.textContent = "Подтверждаем";
    $.ajax({
      type: "post",
      url: "/wp-admin/admin-ajax.php",
      data: {
        action: "review_form",
        name: name,
        description: description
      },
      success: function success(response) {
        $(".dark-layer").html(response);
        closeAppliedForm();
      }
    });
  });
});

function closeAppliedForm() {
  var closeAppliedForm = document.getElementById("closeAppliedForm");
  var darkLayer__local = document.querySelector(".dark-layer");
  closeAppliedForm.addEventListener("click", function () {
    darkLayer__local.classList.toggle("js--hidden");
  });
} // Проверяем, что все поля важные заполнены


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

deleteWarningSpans();

Storage.prototype.setObj = function (key, obj) {
  return this.setItem(key, JSON.stringify(obj));
};

Storage.prototype.getObj = function (key) {
  return JSON.parse(this.getItem(key));
};

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

function updateUserOrderField() {
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
}

if (window.location.href.includes("book")) {
  $(document).ready(function () {
    $("#userPhone").inputmask();
  });
}

if (document.querySelector(".container-card")) {
  setTimeout(makeCardsLink, 300);
}

function makeCardsLink() {
  var cards = document.querySelectorAll(".container-card");
  cards.forEach(function (card) {
    card.addEventListener('click', function () {
      var link = card.dataset.href;
      window.location.href = link;
    });
  });
}

if (window.location.href.includes("cart")) {
  var createServiceTotal = function createServiceTotal(name, price, id) {
    var HTMLString = "\n      <div class=\"order-item order-item--service\" id=\"totalOrderID".concat(id, "\">\n        <div class=\"order-item__name\" id=\"orderServiceName\">").concat(name, "</div>\n        <div class=\"order-item__bar\"> </div>\n        <div class=\"order-item__price\" id=\"orderServicePrice\">").concat(price, " <span>\u20BD</span></div>\n    </div>\n    ");
    return HTMLString;
  };

  var _updateUserOrderField = function _updateUserOrderField() {
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

  var orderList = document.querySelector(".order-list");
  var bookedItems = document.querySelectorAll(".order-container");
  bookedItems.forEach(function (order, index) {
    var serviceName = order.querySelector('.order-header').querySelector("a").textContent;
    var servicePrice = order.querySelector('.order-cost').querySelector("span").querySelector("bdi").textContent;
    servicePrice = servicePrice.match(/\d+/g);
    servicePrice = servicePrice[0] + '';
    var serviceCounter = index;
    var totalOrder = createServiceTotal(serviceName, servicePrice, index);
    orderList.insertAdjacentHTML('beforeend', totalOrder);
  });
  setTimeout(updateTotalNumber, 100);
  setTimeout(_updateUserOrderField, 100);
  $(document).ready(function () {
    $("#userPhone").inputmask();
  });
}

if (document.querySelector(".add-feedback")) {
  var darkLayer = document.querySelector(".dark-layer");
  var applyBtn = document.querySelector(".add-feedback");
  var closeForm = document.getElementById("closeForm");
  var applyFormScreen = document.getElementById("applyForm");
  applyBtn.addEventListener("click", function () {
    darkLayer.classList.toggle("js--hidden");
  });
  closeForm.addEventListener("click", function () {
    darkLayer.classList.toggle("js--hidden");
  });

  window.onclick = function (event) {
    if (event.target == darkLayer) {
      darkLayer.classList.toggle("js--hidden");
    }
  };
}

if (window.location.href.includes("feedback")) {
  var reviews = document.querySelectorAll('.feedback-item');
  reviews.forEach(function (review) {
    var review_content = review.querySelector('.feedback-item__content').textContent;
    var bath_type_name = review.querySelector('.feedback-item__caption');
    var star_rating_amount = review.querySelector('.amount');
    var star_rating = review_content.substring(review_content.indexOf("star") - 1, review_content.indexOf("star"));
    var bath_type = review_content.substring(review_content.indexOf("bath") - 3, review_content.indexOf("bath"));
    review_content = review_content.replace("".concat(bath_type, "bath"), '');
    review_content = review_content.replace("".concat(star_rating, "star"), '');
    review.querySelector('.feedback-item__content').textContent = review_content;
    star_rating_amount.textContent = star_rating;
    bath_type_name.textContent = bath_type;

    switch (bath_type) {
      case 'Ура':
        bath_type_name.textContent = 'Уральская';
        break;

      case 'Охо':
        bath_type_name.textContent = 'Охотничья';
        break;

      case 'Ямс':
        bath_type_name.textContent = 'Ямская';
        break;

      case 'Рыб':
        bath_type_name.textContent = 'Рыбацкая';
        break;

      case 'Раз':
        bath_type_name.textContent = 'Раздольная';
        break;

      case 'Сем':
        bath_type_name.textContent = 'Семейная';
        break;

      case 'Сиб':
        bath_type_name.textContent = 'Сибирская';
        break;

      case 'Лес':
        bath_type_name.textContent = 'Лесная';
        break;

      case 'Хут':
        bath_type_name.textContent = 'Хуторок';
        break;
    }
  });
}

ymaps.ready(init);

function init() {
  var myMap = new ymaps.Map('map', {
    center: [56.81122355, 60.72763708],
    zoom: 14
  }),
      myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
    balloonContent: 'г. Екатеринбург, ул. Летняя, 20',
    iconCaption: 'г. Екатеринбург, ул. Летняя, 20'
  }, {
    iconLayout: 'default#image',
    iconImageHref: "./assets/images/content/logo.svg",
    iconImageSize: [30, 42],
    iconImageOffset: [-5, -38]
  });
  myMap.geoObjects.add(myPlacemark);
}

jQuery("#slider").slider({
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
var cafeSwiper = new Swiper('#cafeSwiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: false,
  speed: 400,
  spaceBetween: 24,
  effect: 'cards',
  slidesPerView: '2',
  // swipeHandler: '.swiper-wrapper',
  pagination: {
    el: '.swiper-pagination',
    clickable: true
  },
  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev'
  }
});
var actionSwiper = new Swiper('#actionSwiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  speed: 400,
  spaceBetween: 24,
  effect: 'cards',
  slidesPerView: '2',
  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev'
  }
});