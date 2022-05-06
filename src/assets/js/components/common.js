

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
    if (orderName.includes('Станция')) {
      let orderID = order.id.match(/\d+/g);
      console.log(orderID);
      orderID = orderID[0];
      console.log(orderID);
      let cardItem = document.getElementById(`service${orderID}`);
      console.log(cardItem);
      console.log(cardItem.querySelector('.order-input').value);
      let dateValue = cardItem.querySelector('[name="orderDate"]').value;
      let selectValue = cardItem.querySelector('[name="orderDateTime"]').value;
      let peopleValue = cardItem.querySelector('[name="orderAmountPeople"]').value;
      let hourValue = cardItem.querySelector('[name="orderTotalTime"]').value;

      orderString = `${orderString} ${orderName} - ${orderPrice}. Дата бронирования: ${dateValue};  Время заезда: ${selectValue}; Количество человек: ${peopleValue};   Количество часов: ${hourValue};   
      `
    } else {
      orderString = `${orderString} ${orderName} - ${orderPrice}.   `
    }
  });
  let totalString = `Всего: ${totalPrice}`;
  orderString += totalString;
  userOrderField.value = orderString;
  console.log(userOrderField.value);
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
      if (!window.location.href.includes('staff')) window.location.href = link;
    })
  })
}



if (window.location.href.includes("/cart")) {
  var orderList = document.querySelector(".order-list");
  const bookedItems = document.querySelectorAll(".order-container")
  let serviceName = '';
  let servicePrice = '';
  bookedItems.forEach((order, index) => {
    if (order.querySelector('.order-header').querySelector("a")) {
      serviceName = order.querySelector('.order-header').querySelector("a").textContent;
    } else {
      serviceName = order.querySelector('.order-header').textContent;
    }
    if (order.querySelector('.order-cost').querySelector("span")) {
      servicePrice = order.querySelector('.order-cost').querySelector("span").querySelector("bdi").textContent;
      servicePrice = servicePrice.match(/\d+/g);
      servicePrice = servicePrice[0];
    } else {
      servicePrice = order.querySelector('.order-cost').textContent;
      servicePrice = servicePrice.match(/\d+/g);
      servicePrice = servicePrice[0] + servicePrice[1];
    }

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
      if (orderName.includes('Станция')) {
        let orderID = order.id.match(/\d+/g);
        console.log(orderID);
        orderID = orderID[0];
        console.log(orderID);
        let cardItem = document.getElementById(`service${orderID}`);
        console.log(cardItem);
        console.log(cardItem.querySelector('.order-input').value);
        let dateValue = cardItem.querySelector('[name="orderDate"]').value;
        let selectValue = cardItem.querySelector('[name="orderDateTime"]').value;
        let peopleValue = cardItem.querySelector('[name="orderAmountPeople"]').value;
        let hourValue = cardItem.querySelector('[name="orderTotalTime"]').value;

        orderString = `${orderString} ${orderName} - ${orderPrice}. Дата бронирования: ${dateValue};  Время заезда: ${selectValue}; Количество человек: ${peopleValue};   Количество часов: ${hourValue}; `
      } else {
        orderString = `${orderString} ${orderName} - ${orderPrice}.   `
      }
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
if (document.querySelector(".feedback-add")) {
  const darkLayer = document.querySelector(".dark-layer");
  const applyBtn = document.querySelector(".feedback-add");
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



if (document.getElementById("lesBathName")) {
  const lesBathName = document.getElementById("lesBathName");
  lesBathName.addEventListener("click", () => {
    let link = window.location.href;
    link += '/bathroom';
    window.location.href = link
  })
  const hutBathName = document.getElementById("hutBathName");
  hutBathName.addEventListener("click", () => {
    let link = window.location.href;
    link += '/hutBath';
    window.location.href = link
  })
  const hutUralName = document.getElementById("hutUralName");
  hutUralName.addEventListener("click", () => {
    let link = window.location.href;
    link += '/uralBath';
    window.location.href = link
  })
  const razBathName = document.getElementById("razBathName");
  razBathName.addEventListener("click", () => {
    let link = window.location.href;
    link += '/razBath';
    window.location.href = link
  })
  const ribBathName = document.getElementById("ribBathName");
  ribBathName.addEventListener("click", () => {
    let link = window.location.href;
    link += '/ribBath';
    window.location.href = link
  })
  const famBathName = document.getElementById("famBathName");
  famBathName.addEventListener("click", () => {
    let link = window.location.href;
    link += '/famBath';
    window.location.href = link
  })
  const yamBathName = document.getElementById("yamBathName");
  yamBathName.addEventListener("click", () => {
    let link = window.location.href;
    link += '/yamBath';
    window.location.href = link
  })
  const sibBathName = document.getElementById("sibBathName");
  sibBathName.addEventListener("click", () => {
    let link = window.location.href;
    link += '/sibBath';
    window.location.href = link
  })
  const ohotBathName = document.getElementById("ohotBathName");
  ohotBathName.addEventListener("click", () => {
    let link = window.location.href;
    link += '/ohotBath';
    window.location.href = link
  })
  const cafeNodeName = document.getElementById("cafeNodeName");
  cafeNodeName.addEventListener("click", () => {
    let link = window.location.href;
    link += '/cafe';
    window.location.href = link
  })
}


if (window.location.href.includes('staff')) {
  var allAmounts = document.querySelectorAll('.amount');
  allAmounts.forEach(amount => {
    var textValue = amount.textContent;
    var matches = textValue.match(/(\d+)/);
    var lastDigit = parseInt(matches[0]) % 10;
    switch (lastDigit) {
      case 1:
        amount.textContent = `${matches[0]} товар`;
        break;
      case 2:
        amount.textContent = `${matches[0]} товара`;
        break;
      case 3:
        amount.textContent = `${matches[0]} товара`;
        break;
      case 4:
        amount.textContent = `${matches[0]} товара`;
        break;
      default:
        amount.textContent = `${matches[0]} товаров`;
        break;
    }


    if (textValue.includes('11') || textValue.includes('12') || textValue.includes('13') || textValue.includes('14')) {
      amount.textContent = textValue.replace('товар', 'товаров')
    }
  })
}

if (window.location.href.includes('bathroom')) {
  let header = document.querySelector('.bathroom-header').textContent;
  let bathName = header.replace('Станция ', '');
  closeUnrelevantFeedbacks(bathName);
}

function closeUnrelevantFeedbacks(name) {
  let feedbackList = document.querySelector('.feedback-list');
  let allFeedbacks = feedbackList.querySelectorAll('.feedback-item');
  allFeedbacks.forEach(item => {
    let itemName = item.querySelector('.feedback-item__caption').textContent;
    if (itemName != name) {
      item.classList.add('js--hidden');
    } else {
      item.classList.add('js--show');
    }
    countAverageScoreAndAmountOfFeedbacks()
  })
  createStars();
}

function countAverageScoreAndAmountOfFeedbacks() {
  let feedbackList = document.querySelector('.feedback-list');
  let allFeedbacks = feedbackList.querySelectorAll('.feedback-item');
  let totalScore = 0;
  let totalLength = 0;
  allFeedbacks.forEach(item => {
    if (item.classList.contains('js--show')) {
      totalLength++;
      let rating = parseInt(item.querySelector('.amount').textContent);
      totalScore += rating;
    }
  });
  let averageScore = totalScore / totalLength;
  averageScore = Math.round(averageScore * 10) / 10
  let feedbackScore = document.querySelector(".feedback-score");
  let feedbackCounter = document.querySelector('.feedback-amount');
  feedbackScore.textContent = `${averageScore}`;
  var lastDigit = totalLength % 10;
  switch (lastDigit) {
    case 1:
      feedbackCounter.textContent = `(${totalLength} отзыв)`;
      break;
    case 2:
      feedbackCounter.textContent = `(${totalLength} отзыва)`;
      break;
    case 3:
      feedbackCounter.textContent = `(${totalLength} отзыва)`;
      break;
    case 4:
      feedbackCounter.textContent = `(${totalLength} отзыва)`;
      break;
    default:
      feedbackCounter.textContent = `(${totalLength} отзывов)`;
      break;
  }
  let textValue = feedbackCounter.textContent
  if (textValue.includes('11') || textValue.includes('12') || textValue.includes('13') || textValue.includes('14')) {
    feedbackCounter.textContent = textValue.replace('отзыв', 'отзывов')
  }

  let globalScore = document.querySelector('.bathroom-rating__score');
  globalScore.textContent = averageScore;
  let globalAmount = document.querySelector('.bathroom-rating__amount');
  globalAmount.textContent = feedbackCounter.textContent;
}

function createStars() {

  let starCounter = document.getElementById('starsCounter');
  let globalScore = document.querySelector('.bathroom-rating__score');
  let averageScore = globalScore.textContent;
  averageScore = Math.round(averageScore);
  for (let counter = 1; counter <= averageScore; counter++) {
    let useElement = document.createElementNS('http://www.w3.org/2000/svg', 'use');
    useElement.setAttributeNS('http://www.w3.org/1999/xlink', 'href', '#stars-full-star');
    starCounter.appendChild(useElement);
  }
  for (let counter = 1; counter <= 5 - parseInt(averageScore); counter++) {
    let useElement = document.createElementNS('http://www.w3.org/2000/svg', 'use');
    useElement.setAttributeNS('http://www.w3.org/1999/xlink', 'href', '#stars-empty-star');
    starCounter.appendChild(useElement);
  }
}


if (window.location.href.includes('add-to-cart')) {
  const newHeader = localStorage.getItem('clickedHeader');
  console.log(newHeader);
  const addedModalNew = document.querySelector('.modal-container');
  console.log(addedModalNew);
  const headerName = addedModalNew.querySelector('.modal-container__caption');
  headerName.textContent = newHeader;
  addedModalNew.classList.remove('js--transformed');
  setTimeout(() => {
    addedModalNew.classList.add('js--transformed');
  }, 1500)
}

if (window.location.href.includes('services')) {
  var buttons = document.querySelectorAll('.service-book');
  buttons.forEach(button => {
    button.addEventListener('click', () => {
      button.classList.add('buttonClicked')
    })
  })
  var cards = document.querySelectorAll('.container-card');
  cards.forEach(card => {
    if (card.querySelector('.service-book').classList.contains('buttonClicked')) {
      localStorage.setItem('clickedHeader', card.querySelector('.card-name').textContent);
      const newHeader = localStorage.getItem('clickedHeader');
      console.log(newHeader);
    }
  })
}

let bookCounter = document.querySelector('.book-counter').textContent;
if (localStorage.getObj("bookedServices")) {
  const array = localStorage.getObj("bookedServices").length;

  bookCounter = parseInt(bookCounter) + array;
  document.querySelector('.book-counter').textContent = bookCounter;
}