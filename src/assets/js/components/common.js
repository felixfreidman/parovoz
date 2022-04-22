
Storage.prototype.setObj = function (key, obj) {
  return this.setItem(key, JSON.stringify(obj))
}
Storage.prototype.getObj = function (key) {
  return JSON.parse(this.getItem(key))
}

if (document.querySelector(".article-card")) {
  const cardsArray = document.querySelectorAll(".article-card");
  cardsArray.forEach((card) => {
    card.addEventListener("mouseover", () => {
      let background = card.style.background;
      background = background.replace(
        "linear-gradient(360deg, rgba(26, 47, 68, 0.9) 0%, rgba(26, 47, 68, 0) 100%)",
        "linear-gradient( 360deg, rgba(212, 37, 21, 0.8) 0%, rgba(212, 37, 21, 0) 100%)"
      );
      card.style.background = background;
    });
    card.addEventListener("mouseout", () => {
      let background = card.style.background;
      background = background.replace(
        "linear-gradient(360deg, rgba(212, 37, 21, 0.8) 0%, rgba(212, 37, 21, 0) 100%)",
        "linear-gradient(360deg, rgba(26, 47, 68, 0.9) 0%, rgba(26, 47, 68, 0) 100%)"
      );
      card.style.background = background;
    });
  });
}
if (document.getElementById("orderDate")) {

  document.getElementById('orderDate').valueAsDate = new Date();
}

function updateUserOrderField() {
  const userOrderField = document.getElementById("userOrder");
  const userOrderList = document.querySelectorAll(".order-item");
  const totalPrice = document.getElementById("orderTotalPrice").textContent;
  let orderString = '';
  userOrderList.forEach(order => {
    const orderName = order.querySelector(".order-item__name").textContent;
    const orderPrice = order.querySelector(".order-item__price").textContent;
    orderString = `${orderString} ${orderName} - ${orderPrice}.  `
  });
  let totalString = `Всего: ${totalPrice}`;
  orderString += totalString;
  userOrderField.value = orderString;
}


if (window.location.href.includes("book")) {

  $(document).ready(function () {
    $("#userPhone").inputmask();
  });

}

if (document.querySelector(".container-card")) {
  setTimeout(makeCardsLink, 300)
}

function makeCardsLink() {
  const cards = document.querySelectorAll(".container-card");

  cards.forEach(card => {
    card.addEventListener('click', () => {
      const link = card.dataset.href;
      window.location.href = link;
    })
  })
}



if (window.location.href.includes("cart")) {
  var orderList = document.querySelector(".order-list");
  const bookedItems = document.querySelectorAll(".order-container")
  bookedItems.forEach((order, index) => {
    const serviceName = order.querySelector('.order-header').querySelector("a").textContent;
    let servicePrice = order.querySelector('.order-cost').querySelector("span").querySelector("bdi").textContent;
    servicePrice = servicePrice.match(/\d+/g);
    servicePrice = servicePrice[0] + '';
    const serviceCounter = index;

    const totalOrder = createServiceTotal(serviceName, servicePrice, index);
    orderList.insertAdjacentHTML('beforeend', totalOrder);
  })

  function createServiceTotal(name, price, id) {
    const HTMLString =
      `
      <div class="order-item order-item--service" id="totalOrderID${id}">
        <div class="order-item__name" id="orderServiceName">${name}</div>
        <div class="order-item__bar"> </div>
        <div class="order-item__price" id="orderServicePrice">${price} <span>₽</span></div>
    </div>
    `;
    return HTMLString;
  }

  function updateUserOrderField() {
    const userOrderField = document.getElementById("userOrder");
    const userOrderList = document.querySelectorAll(".order-item");
    const totalPrice = document.getElementById("orderTotalPrice").textContent;
    let orderString = '';
    userOrderList.forEach(order => {
      const orderName = order.querySelector(".order-item__name").textContent;
      const orderPrice = order.querySelector(".order-item__price").textContent;
      orderString = `${orderString} ${orderName} - ${orderPrice}.  `
    });
    let totalString = `Всего: ${totalPrice}`;
    orderString += totalString;
    userOrderField.value = orderString;
    console.log(userOrderField.value);
  }

  function updateTotalNumber() {
    if (document.querySelectorAll(".order-item__price")) {
      const allOrdersNums = document.querySelectorAll(".order-item__price");
      const totalNum = document.getElementById("orderTotalPrice");
      let totalSum = 0;
      allOrdersNums.forEach(price => {
        var realPrice = parseInt(price.textContent)
        totalSum += realPrice;
      })
      let totalNumFinal = totalNum.childNodes[0];
      totalNumFinal.nodeValue = totalSum + ' ';
    }
    else {
      const totalNum = document.getElementById("orderTotalPrice");
      let totalSum = 0;
      let totalNumFinal = totalNum.childNodes[0];
      totalNumFinal.nodeValue = totalSum + ' ';
    }
  }
  setTimeout(updateTotalNumber, 100)
  setTimeout(updateUserOrderField, 100)
  $(document).ready(function () {
    $("#userPhone").inputmask();
  });

}



if (document.querySelector(".add-feedback")) {
  const darkLayer = document.querySelector(".dark-layer");
  const applyBtn = document.querySelector(".add-feedback");
  const closeForm = document.getElementById("closeForm");
  const applyFormScreen = document.getElementById("applyForm");
  applyBtn.addEventListener("click", () => {

    darkLayer.classList.toggle("js--hidden");
  })

  closeForm.addEventListener("click", () => {
    darkLayer.classList.toggle("js--hidden");
  });

  window.onclick = function (event) {
    if (event.target == darkLayer) {
      darkLayer.classList.toggle("js--hidden");
    }
  };
}
const ns = 'http://www.w3.org/2000/svg';

if (document.querySelector('.feedback-item')) {
  const reviews = document.querySelectorAll('.feedback-item');
  reviews.forEach(review => {
    let review_content = review.querySelector('.feedback-item__content').textContent;
    const bath_type_name = review.querySelector('.feedback-item__caption');
    const star_rating_amount = review.querySelector('.amount');
    const star_rating = review_content.substring(review_content.indexOf("star") - 1, review_content.indexOf("star"));
    const bath_type = review_content.substring(review_content.indexOf("bath") - 3, review_content.indexOf("bath"));
    review_content = review_content.replace(`${bath_type}bath`, '')
    review_content = review_content.replace(`${star_rating}star`, '')
    review.querySelector('.feedback-item__content').textContent = review_content;
    star_rating_amount.textContent = star_rating
    bath_type_name.textContent = bath_type
    switch (bath_type) {
      case 'Ура':
        bath_type_name.textContent = 'Уральская'
        break;
      case 'Охо':
        bath_type_name.textContent = 'Охотничья'
        break;
      case 'Ямс':
        bath_type_name.textContent = 'Ямская'
        break;
      case 'Рыб':
        bath_type_name.textContent = 'Рыбацкая'
        break;
      case 'Раз':
        bath_type_name.textContent = 'Раздольная'
        break;
      case 'Сем':
        bath_type_name.textContent = 'Семейная'
        break;
      case 'Сиб':
        bath_type_name.textContent = 'Сибирская'
        break;
      case 'Лес':
        bath_type_name.textContent = 'Лесная'
        break;
      case 'Хут':
        bath_type_name.textContent = 'Хуторок'
        break;
    }
    const reviewStars = review.querySelector('.feedback-item__rating').querySelector("svg");

    switch (star_rating) {
      case '1':
        for (let i = 0; i < 5 - parseInt(star_rating); i++) {
          reviewStars.removeChild(review.querySelector('svg use'));
        }
        for (let i = 0; i < 5 - parseInt(star_rating); i++) {
          const useElement = document.createElementNS(ns, 'use');
          useElement.setAttribute('href', '#stars-empty-star');
          reviewStars.appendChild(useElement)
        }
        break;
      case '2':
        for (let i = 0; i < 5 - parseInt(star_rating); i++) {
          reviewStars.removeChild(review.querySelector('svg use'));
        }
        for (let i = 0; i < 5 - parseInt(star_rating); i++) {
          const useElement = document.createElementNS(ns, 'use');
          useElement.setAttribute('href', '#stars-empty-star');
          reviewStars.appendChild(useElement)
        }
        break;
      case '3':
        for (let i = 0; i < 5 - parseInt(star_rating); i++) {
          reviewStars.removeChild(review.querySelector('svg use'));
        }
        for (let i = 1; i <= 5 - parseInt(star_rating); i++) {
          let useElement = document.createElementNS(ns, 'use');
          useElement.setAttribute('href', '#stars-empty-star');
          reviewStars.appendChild(useElement)
        }
        break;
      case '4':
        for (let i = 0; i < 5 - parseInt(star_rating); i++) {
          reviewStars.removeChild(review.querySelector('svg use'));
        }
        for (let i = 1; i <= 5 - parseInt(star_rating); i++) {
          const useElement = document.createElementNS(ns, 'use');
          useElement.setAttribute('href', '#stars-empty-star');
          reviewStars.appendChild(useElement)
        }
        break;
      case '5':
        for (let i = 0; i < 5 - parseInt(star_rating); i++) {
          reviewStars.removeChild(review.querySelector('svg use'));
        }
        for (let i = 1; i <= 5 - parseInt(star_rating); i++) {
          const useElement = document.createElementNS(ns, 'use');
          useElement.setAttribute('href', '#stars-empty-star');
          reviewStars.appendChild(useElement)
        }
        break;
    }
  })
}

