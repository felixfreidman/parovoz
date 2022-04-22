<?php
// defined('ABSPATH') || exit;
?>

<main class="main main-book">
    <div class="header-container">
        <div class="header">Бронирование</div>
        <div class="header-bar"></div>
    </div>
    <form class="form-book" id="orderForm">
        <input type="text" name="userOrder" id="userOrder"
            style="position:absolute; bottom: 0; right: 0; visibility: hidden;">
        <div class="contact-section">
            <div class="section-header">Контактные данные</div><label class="form-label form-label--big"
                for="userName">ФИО
                <input class="form-input" id="userName" type="text" name="userName" placeholder="Ваше имя" required />
            </label>
            <div class="section-row">
                <label class="form-label form-label--small" for="userPhone"> Телефон
                    <input class="form-input" id="userPhone" type="text" name="userPhone" placeholder="Ваш телефон"
                        data-inputmask="'mask' : '+7(999) 999-99-99'" inputmode="text" required />
                </label>
                <label class="form-label form-label--small" for="userEmail">E-mail
                    <input class="form-input" id="userEmail" type="text" name="userEmail" placeholder="Ваша почта"
                        required />
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
        <?php 
            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) { ?>
        <div class="order-container order-place">
            <?php 
            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
            $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
            if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
            ?>
            <tr
                class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

                <?php
                    echo apply_filters('woocommerce_cart_item_remove_link',
                    sprintf( '<a href="%s" class="remove cross" aria-label="%s" data-product_id="%s" data-product_sku="%s"><div class="cross-one"> </div>
                    <div class="cross-two"></div></a>',
                        esc_url(wc_get_cart_remove_url($cart_item_key)),
                        esc_html__('Remove this item', 'woocommerce'),
                        esc_attr($product_id),
                        esc_attr($_product->get_sku())
                    ),
                    $cart_item_key
                    ); 
                ?>
                <div class="order-row">
                    <div class="order-info">
                        <div class="order-header" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
                            <?php
                                if (!$product_permalink) {
                                    echo apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
                                } else {
                                    echo apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key);
                                }
                               
                            ?>
                        </div>
                        <div class="order-cost" data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
                            <?php
                                echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
                            ?>/ час
                        </div>
                    </div>
                </div>
                <div class="order-content">
                    <div class="content-header">Описание</div>
                    <div class="content-description">
                        <div>
                            <?php
                             // Meta data.
                             echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.
    


                             // Backorder notification.
                             if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                 echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
                             }
                            do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);
                            apply_filters('woocommerce_get_item_data',$cart_item, $cart_item_key);
                             
                        ?>
                        </div>
                    </div>
                </div>
            </tr>
            <?php }?>
        </div>
        <?php }?>
    </div>
    </div>
</main>