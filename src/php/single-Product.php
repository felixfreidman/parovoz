<?php
 /* Template Name: Пример услуги */
get_header();
$service_price = get_field("service_price");
$service_content_header = get_field("service_content_header");
$service_content_description = get_field("service_content_description");
$service_section_bg = get_field("service_section_bg");
// Короче у меня задание было сделать, чтобы было 2 страницы "Услуги" и "Бани" в товарах WooComm
// Объявил поле и сравниаю значения, если услуга, то одна странциа, если баня то другая
$page_type = get_field('page_type');
if($page_type == 'service'){
?>
<main class="main main-service">
    <div class="breadcrumbs">
        <a href="<?=home_url();?>">Главная</a> /
        <a href="<?=home_url();?>/services">Услуги</a> /
        <?=get_the_title() ?>
    </div>
    <div class="main__container">
        <div class="container__service-name"
            style="background: linear-gradient(360deg, rgba(26, 47, 68, 0.9) 0%, rgba(26, 47, 68, 0) 100%), url(<?=$service_section_bg?>) no-repeat center;">
            <div class="row">
                <div class="name-container">
                    <div class="service-header"><?=get_the_title() ?></div>
                    <div class="container-bar"> </div>
                </div>
                <div class="service-data-container">
                    <div class="service-data__price-container">
                        <div class="price-tag"><?=$service_price?></div>
                        <div class="price-currency">₽</div>
                        <div class="price-time">/час</div>
                    </div>

                    <a href="<?php $add_to_cart = do_shortcode('[add_to_cart_url id="'.$post->ID.'"]'); echo $add_to_cart;?>"
                        class="book-button service-book special-button">Забронировать
                        <div class="plus-container">
                            <span class="line"></span>
                            <span class="line-vertical"></span>
                        </div>
                    </a>

                </div>
            </div>
        </div>
        <div class="container__description">
            <div class="description-header"><?=$service_content_header?></div>
            <div class="description-content">
                <?php woo_show_excerpt_shop_page()?>
            </div>
            <div class="description__information-container">
                <?php 
    if( have_rows('service_repeater') ):
        while( have_rows('service_repeater') ) : the_row(); 
        $service_image = get_sub_field('service_image');
        $service_column_header = get_sub_field('service_column_header');
        ?>

                <div class="information-container__column">
                    <div class="information-container__logo" style="background-image: url(<?=$service_image?>)"> </div>
                    <div class="information-container__text-info">
                        <div class="information-container__header"><?=$service_column_header?></div>
                        <ul class="information-container__list">
                            <?php 
                            if( have_rows('service_column_repeater') ):
                                while( have_rows('service_column_repeater') ) : the_row();
                                $service_column_item = get_sub_field("service_column_item"); 
                            ?>
                            <li class="information-container__item"><?=$service_column_item?></li>
                            <?php 
                                endwhile;
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
                <?php 
        endwhile;
    endif;
    ?>
            </div>
        </div>
    </div>
</main>
<?php
} else {
    $bath_description = get_field("bath_description");
    $bath_caption = get_field('bath_caption');
    $bath_cheap = get_field("bath_cheap");
    $bath_exp = get_field('bath_exp');
    $bath_cheap_price = get_field("bath_cheap_price");
    $bath_exp_price = get_field('bath_exp_price');
    $min_reg = get_field("min_reg");
    $sale_p = get_field("sale_p");
    $description_header = get_field("description_header");
    $char_header = get_field('char_header');
    $feedback_header = get_field("feedback_header");
    $per_more = get_field('per_more');
    $capacity = get_field("capacity");
    $reviews = array(
        'post_type' => 'reviews',
        'posts_per_page' => 2,
        'orderby' => 'date',
        'order' => 'DESC',
    ); 


$loop_reviews = new WP_Query($reviews); ?>

<svg id="stars" style="display: none;" version="1.1">
    <symbol id="stars-empty-star" viewBox="0 0 16 16" fill="#B5C0C6">
        <path
            d="M8 0.5L10.1489 5.54223L15.6085 6.02786L11.4771 9.62977L12.7023 14.9721L8 12.156L3.29772 14.9721L4.52294 9.62977L0.391548 6.02786L5.85106 5.54223L8 0.5Z">
        </path>
    </symbol>
    <symbol id="stars-full-star" viewBox="0 0 16 16" fill="#D42515">
        <path
            d="M8 0.5L10.1489 5.54223L15.6085 6.02786L11.4771 9.62977L12.7023 14.9721L8 12.156L3.29772 14.9721L4.52294 9.62977L0.391548 6.02786L5.85106 5.54223L8 0.5Z">
        </path>
    </symbol>
</svg>
<main class="main main-bathroom">
    <div class="main__breadcrumbs">
        <a href="<?=home_url();?>">Главная</a> /
        <span>Бани</span> /
        <a href=""><?=get_the_title(); ?></a>
    </div>
    <div class="bathroom-container">
        <div class="bathroom-checkout">
            <div class="bathroom-header"><?=get_the_title(); ?></div>
            <div class="bathroom-rating">
                <div class="bathroom-rating__container"> <svg class="rating" aria-hidden="true" focusable="false"
                        id='starsCounter'>

                    </svg></div>
                <div class="bathroom-rating__score"></div>
                <div class="bathroom-rating__amount"></div>
            </div>
            <div class="bathroom-book">
                <div class="book-column"><input class="js--hidden" id="cheapOption" type="radio" name="optionPrice"
                        checked>
                    <label class="book-option" for="cheapOption">
                        <div class="book-option__time"><?=$bath_cheap ?></div>
                        <div class="book-option__bar"> </div>
                        <div class="book-option__price">
                            <div class="price"> <?=$bath_cheap_price ?> </div>
                            <div class="currency">₽/час</div>
                        </div>
                    </label><input class="js--hidden" id="expensiveOption" type="radio" name="optionPrice"><label
                        class="book-option" for="expensiveOption">
                        <div class="book-option__time"><?=$bath_exp ?></div>
                        <div class="book-option__bar"> </div>
                        <div class="book-option__price">
                            <div class="price"><?=$bath_exp_price ?></div>
                            <div class="currency">₽/час </div>
                        </div>
                    </label>
                    <div class="book-caption">Минимальное время заказа - <strong><?=$min_reg?></strong></div>
                    <a class="book-button service-book">Забронировать
                        <div class="plus-container">
                            <span class="line"></span>
                            <span class="line-vertical"></span>
                        </div>
                    </a>
                    <div class="book-column__sale">
                        <div class="sale-logo"> <img
                                src="<?php echo get_stylesheet_directory_uri() . '/assets/images/content/sale.svg'?>"
                                alt=""></div>
                        <div class="sale-caption">При аренде бани на сутки — <strong>скидка <?=$sale_p?></strong></div>
                    </div>
                </div>
                <div class="book-column">
                    <div class="info-container">
                        <div class="logo"> <img
                                src="<?php echo get_stylesheet_directory_uri() . '/assets/images/content/person.svg'?>"
                                alt=""></div>
                        <div class="info-content">
                            <div class="info-content__subheader">Вместимость</div>
                            <div class="info-content__header"><?=$capacity?></div>
                        </div>
                    </div>
                    <div class="info-caption"> Каждый дополнительный гость <br><strong>+ <?=$per_more?> ₽</strong></div>
                </div>
            </div>
        </div>
        <?php 
        if( have_rows('bath_repeater') ): ?>

        <div class="bathroom-fancybook swiper" id="fancySwiper">
            <div class="swiper-wrapper">
                <?php while( have_rows('bath_repeater') ) : the_row();
                        $bath_image = get_sub_field("bath_image"); ?>
                <div class="swiper-slide"> <img class="bathroom-preview" src="<?=$bath_image?>" alt=""></div>
                <?php endwhile; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <?php  endif; ?>
    </div>
    <div class="bathroom-container">
        <div class="container-description">
            <div class="container-header"><?=$description_header?></div>
            <div class="header-bar"> </div>
            <div class="description"><?=$bath_description?></div>
            <div class="caption"><?=$bath_caption?></div>
        </div>
        <div class="container-features">
            <div class="container-header"><?=$char_header?></div>
            <div class="header-bar"> </div>
            <div class="features-list">
                <?php 
                    if( have_rows('features_repeater') ):
                        while( have_rows('features_repeater') ) : the_row();
                        $features_item = get_sub_field("features_item"); 
                    ?>

                <div class="feature-item"><?=$features_item?></div>
                <?php 
                        endwhile;
                    endif;
                ?>
            </div>
        </div>
    </div>
    <div class="bathroom-container vertical">
        <div class="container-header"><?=$feedback_header?></div>
        <div class="header-bar"> </div>
        <div class="feedback-container">
            <div class="feedback-controls">
                <div class="feedback-info"> <svg class="rating" aria-hidden="true" focusable="false">
                        <use href="#stars-full-star"></use>
                    </svg>
                    <div class="feedback-score">4.0 </div>
                    <div class="feedback-amount">(12 отзывов)</div>
                </div>
                <a class="book-button service-book feedback-add">Забронировать
                    <div class="plus-container">
                        <span class="line"></span>
                        <span class="line-vertical"></span>
                    </div>
                </a>
            </div>
            <div class="feedback-list">
                <?php while ($loop_reviews->have_posts()): $loop_reviews->the_post();
                get_template_part('template/product-feedback-card');
                $i++;
                endwhile;
                wp_reset_postdata();
                ?>
                <a href="<?=home_url();?>/feedback" class="feedback-more">Показать еще</a>
            </div>
        </div>
    </div>
</main>

<?php     
}
get_footer();