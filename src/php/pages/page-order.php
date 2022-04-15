<?php /* Template Name: Страница бронирования */

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
                <!-- <div class="order-item">
                    <div class="order-item__name" id="orderPlaceName"> Тариф, Станция “Уральская”,<span id="orderTime">
                            3 часа</span></div>
                    <div class="order-item__bar"> </div>
                    <div class="order-item__price" id="orderPlacePrice"> 2 990 <span>₽</span></div>
                </div> -->
                <!-- <div class="order-item order-item--service">
                    <div class="order-item__name" id="orderServiceName">Парение “Стандарт”</div>
                    <div class="order-item__bar"> </div>
                    <div class="order-item__price" id="orderServicePrice"> 990 <span>₽</span></div>
                </div> -->
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
        <!-- <div class="order-container order-place">
            <div class="cross">
                <div class="cross-one"> </div>
                <div class="cross-two"></div>
            </div>
            <div class="order-row">
                <div class="order-image"><img src="./assets/images/content/article_bg1.png" alt="" /></div>
                <div class="order-info">
                    <div class="order-header">Баня Уральская</div>
                    <div class="order-cost">1 200 ₽ / час</div>
                </div>
            </div>
            <div class="order-row"> <label class="order-label" for="orderDate">Дата посещения <input class="order-input"
                        id="orderDate" type="date" name="orderDate" /></label><label class="order-label"
                    for="orderDateTime">Время<select class="order-input" id="orderDateTime" name="orderDateTime">
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                        <option value="19:00">19:00</option>
                        <option value="20:00">20:00</option>
                        <option value="21:00">21:00</option>
                        <option value="22:00">22:00</option>
                        <option value="23:00">23:00</option>
                        <option value="24:00">24:00 </option>
                    </select></label><label class="order-label" for="orderAmountPeople">Кол-во человек<input
                        class="order-input" id="orderAmountPeople" type="input" name="orderAmountPeople"
                        value="3" /></label><label class="order-label" for="orderTotalTime">Кол-во часов<input
                        class="order-input" id="orderTotalTime" type="input" name="orderTotalTime" value="2" /></label>
            </div>
        </div> -->
        <!-- <div class="order-container order-service">
            <div class="cross">
                <div class="cross-one"> </div>
                <div class="cross-two"></div>
            </div>
            <div class="order-row">
                <div class="order-info">
                    <div class="order-header">Парение “Стандарт”</div>
                    <div class="order-cost">990 ₽ / час</div>
                </div>
            </div>
            <div class="order-content">
                <div class="content-header">Описание</div>
                <div class="content-description">
                    <div>Насыщенная и разнообразная программа, рассчитана на самых искушенных ценителей бани.</div>
                    <div>Мастер индивидуально для гостя под бирает и проводит банный ритуал, с применением различных
                        техник про грева, контраста и массажа</div>
                </div>
            </div>
        </div> -->
    </div>
</main>
<?php
get_footer();