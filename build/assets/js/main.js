"use strict";

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

if (document.getElementById("map")) {
  var init = function init() {
    var myMap = new ymaps.Map('map', {
      center: [56.81122355, 60.72763708],
      zoom: 14
    }),
        myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
      balloonContent: 'Летняя, 20',
      iconCaption: 'Летняя, 20'
    }, {
      iconLayout: 'default#image',
      iconImageHref: './assets/images/content/logo.svg',
      iconImageSize: [30, 42],
      iconImageOffset: [-5, -38]
    });
    myMap.geoObjects.add(myPlacemark);
  };

  ymaps.ready(init);
} // // header-swiper
// var swiper = new Swiper('#main-swiper', {
//   fadeEffect: {
//     crossFade: true
//   },
//   navigation: {
//     nextEl: '.swiper-button-next--header',
//     prevEl: '.swiper-button-prev--header',
//   },
//   pagination: {
//     el: '.swiper-pagination',
//     type: 'bullets',
//     clickable: true,
//   },
//   loop: true,
//   // autoplay: {
//   //   delay: 2300,
//   // },
//   fadeEffect: {
//     crossFade: true
//   },
//   speed: 800,
//   watchSlidesProgress: true,
//   watchVisibility: true,
//   disableOnInteraction: true,
// });