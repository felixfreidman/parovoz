const swiper = new Swiper('#workerSwiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    speed: 400,
    spaceBetween: 34,
    effect: 'cards',
    slidesPerView: '4',
    swipeHandler: '.swiper-wrapper',
});
const swiperImages = document.querySelectorAll(".bathroom-preview");
console.log(swiperImages);
let imgLinkArray = new Array();
let returnValue = 0;
swiperImages.forEach(image => {
    const imageSrc = image.src.replace("http://localhost:3000", ".");
    var returnValue = `<img class="swiper-preview swiper-pagination-bullet" src=${imageSrc}>`;
    imgLinkArray.push(returnValue)
})

const fancySwiper = new Swiper('#fancySwiper', {
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
        renderBullet: function (index) {
            return imgLinkArray[index];
        },
    }
});