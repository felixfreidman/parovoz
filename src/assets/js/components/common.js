Storage.prototype.setObj = function (key, obj) {
  return this.setItem(key, JSON.stringify(obj))
}
Storage.prototype.getObj = function (key) {
  return JSON.parse(this.getItem(key))
}
var globalCounter = 0;
if (localStorage.getItem("globalCounter")) {
  globalCounter = localStorage.getItem("globalCounter");
}


let booksArray = new Array();
if (localStorage.getObj("bookedServices")) {
  booksArray = localStorage.getObj("bookedServices");
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


if (window.location.href.includes("product")) {

  const bookBtn = document.querySelector(".service-data__book-btn");

  bookBtn.addEventListener("click", createBookingItem);

  function createBookingItem() {
    const serviceName = document.querySelector(".service-header").textContent;
    const servicePrice = document.querySelector(".price-tag").textContent;
    const serviceDescription = document.querySelector(".description-content").textContent;
    const bookObj = {
      serviceCounter: parseInt(globalCounter),
      serviceName: serviceName,
      servicePrice: servicePrice,
      serviceDescription: serviceDescription,
    }
    booksArray.push(bookObj);
    localStorage.setObj("bookedServices", booksArray);


    localStorage.setItem("globalCounter", globalCounter);
    globalCounter++;
    window.location.href = "book"


  }

}

if (window.location.href.includes("book")) {
  var bookedItems = localStorage.getObj("bookedServices");
  var orderContainer = document.querySelector(".orders-container");
  var orderList = document.querySelector(".order-list");
  let counter = 0;
  bookedItems.forEach(order => {
    const serviceName = order.serviceName;
    const servicePrice = order.servicePrice;
    const serviceDescription = order.serviceDescription;
    const serviceCounter = order.serviceCounter;

    const readyOrder = createServiceOrder(serviceName, servicePrice, serviceDescription, serviceCounter)
    const totalOrder = createServiceTotal(serviceName, servicePrice, serviceCounter);

    orderContainer.insertAdjacentHTML('beforeend', readyOrder);
    orderList.insertAdjacentHTML('beforeend', totalOrder);
  })

  function createServiceOrder(name, price, description, id) {
    const HTMLString = `
    <div class="order-container order-service" id="service${id}">
    <div class="cross" id="cross${id}">
        <div class="cross-one"> </div>
        <div class="cross-two"></div>
    </div>
    <div class="order-row">
        <div class="order-info">
            <div class="order-header">${name}</div>
            <div class="order-cost">${price} ₽ / час</div>
        </div>
    </div>
    <div class="order-content">
        <div class="content-header">Описание</div>
        <div class="content-description">
            <div>${description}</div>
        </div>
    </div>
</div>
    `;
    return HTMLString;
  }
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
  setTimeout(deleteOrderFromLists, 100)
  setTimeout(updateUserOrderField, 100)

  function deleteOrderFromLists() {
    const allCrosses = document.querySelectorAll(".cross");
    var orderContainer = document.querySelector(".orders-container");
    var orderList = document.querySelector(".order-list");
    allCrosses.forEach(cross => {
      cross.addEventListener("click", () => {
        let crossCounter = cross.id.replace('cross', '');

        const orderItem = document.getElementById(`service${crossCounter}`);
        const orderTotalItem = document.getElementById(`totalOrderID${crossCounter}`);
        orderContainer.removeChild(orderItem);
        orderList.removeChild(orderTotalItem);
        updateTotalNumber();
        updateUserOrderField()

        crossCounter = parseInt(crossCounter);
        var filteredArray = booksArray.filter(function (value, index, arr) {
          value = value.serviceCounter;
          return value != crossCounter;
        });
        localStorage.setObj("bookedServices", filteredArray);
      })
    })
  }
  $(document).ready(function () {
    $("#userPhone").inputmask();
  });

}
