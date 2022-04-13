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