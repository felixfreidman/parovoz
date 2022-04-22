<?php
get_header();
?>
<main class="main main-book">
    <div class="header-container">
        <div class="header">Бронирование</div>
        <div class="header-bar"></div>
    </div>
    <form class="form-book" id="orderForm">
        <input type="text" name="userOrder" id="userOrder" style="position:absolute; bottom: 0; right: 0; visibility: hidden;">
        <div class="contact-section">
            <div class="section-header">Контактные данные</div><label class="form-label form-label--big"
                for="userName">ФИО
                <input class="form-input" id="userName" type="text" name="userName" placeholder="Ваше имя" required />
            </label>
            <div class="section-row">
                <label class="form-label form-label--small" for="userPhone"> Телефон
                    <input class="form-input" id="userPhone" type="text" name="userPhone" placeholder="Ваш телефон"
                        data-inputmask="'mask' : '+7(999) 999-99-99'" inputmode="text" required/>
                </label>
                <label class="form-label form-label--small" for="userEmail">E-mail
                    <input class="form-input" id="userEmail" type="text" name="userEmail" placeholder="Ваша почта" required />
                </label>
            </div>
        </div>
        <div class="book-section">
            <div class="section-header">Ваше Бронирование</div>
            <div class="order-list">
            </div>
            <div class="order-total">
                <div class="order-total__name">Итого</div>
                <div class="order-total__bar"> </div>
                <div class="order-total__price" id="orderTotalPrice">0 <span>₽ </span></div>
            </div><button class="order-button" type="submit">Подтвердить</button>
        </div>
    </form>
    <div class="orders-container">
        <div class="section-header">Формирование заказа</div>
    </div>
</main>
<?php
get_footer();
