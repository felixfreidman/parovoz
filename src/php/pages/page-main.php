<?php /* Template Name: Главная страница */
get_header(); 
$reviews = array(
    'post_type' => 'reviews',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'ASC',
);

$loop_reviews = new WP_Query($reviews); 
$instagram = get_field("instagram", "option");
$vk = get_field("vk", "option");
$telephone_first = get_field("telephone_first", "option");
$telephone_second = get_field("telephone_second", "option");
$whatapp = get_field("whatapp", "option");
$address = get_field("address", "option");
$main_header = get_field('main_header');
$main_sub_header = get_field('main_sub_header');
$return_header = get_field('return_header');
$return_sub_header = get_field('return_sub_header');
$about_header = get_field('about_header');
?>
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
<main class="main main-main">
    <div class="main__greeting"
        style="background: linear-gradient(360deg, #1A2F44 0%, rgba(26, 47, 68, 0) 100%), url(<?php echo get_template_directory_uri() . '/assets/images/content/main_bg.png'?>)">
        <div class="greeting-container">
            <div class="greeting-place"> <img
                    src="<?php echo get_template_directory_uri() . '/assets/images/content/map_marker.svg'?>"
                    alt="" />Екатеринбург
            </div>
            <div class="greeting-header"><?=$main_header?></div>
            <div class="greeting-caption"><?=$main_sub_header?></div>
            <?php 
                if( have_rows('main_repeater') ): ?>
            <div class="greeting-benefits">
                <?php while( have_rows('main_repeater') ) : the_row();
                    $main_name = get_sub_field("main_name");
                    $main_subname = get_sub_field("main_subname");
                    $main_iscolored = get_sub_field("main_iscolored");
                    ?>
                <div class="benefits-item">
                    <div class="benefits-header"><?=$main_name?></div>
                    <div class="benefits-subheader"><?=$main_subname?></div>
                    <div class="benefits-bar <?php if($main_iscolored) echo 'benefits-bar--red'?> "></div>
                </div>
                <div class="description__item"><?=$service_column_item?></div>
                <?php endwhile;?>
            </div>
            <?php endif;?>
        </div>
    </div>
    <div class="main__return">
        <div class="header-container">
            <div class="header"><?=$return_header?></div>
            <div class="header-bar"></div>
        </div>
        <div class="return-caption"><?=$return_sub_header?></div>
        <div class="return-container">
            <div class="return-container__benefits">
                <?php 
                    if( have_rows('benefit_repeater') ):
                        while( have_rows('benefit_repeater') ) : the_row();
                            $benefit_logo = get_sub_field("benefit_logo");
                            $benefit_caption = get_sub_field("benefit_caption");?>

                <div class="benefit-item">
                    <div class="benefit-logo"> <img src="<?=$benefit_logo?>" alt="" /></div>
                    <div class="benefit-bar"> </div>
                    <div class="benefit-name"><?=$benefit_caption ?></div>
                </div>
                <?php endwhile; endif; ?>
            </div>
            <div class="return-container__image"> <img
                    src="<?php echo get_template_directory_uri() . '/assets/images/content/main_bg1.png'?>" alt="" />
            </div>
        </div>
    </div>
    <div class="main__map">
        <div class="header-container">
            <div class="header">Карта наших бань</div>
            <div class="header-bar"></div>
        </div><img src="<?php echo get_template_directory_uri() . '/assets/images/content/map_bg.svg'?>" alt="" />
    </div>
    <div class="main__feedback">
        <div class="header-container">
            <div class="header">Отзывы</div>
            <div class="header-bar"></div>
        </div>
        <div class="feedback-container">
            <div class="feedback-list">
                <?php while ($loop_reviews->have_posts()): $loop_reviews->the_post();
                get_template_part('template/feedback-card');
                $i++;
                endwhile;
                wp_reset_postdata();
            ?>

            </div>
        </div>
    </div>
    <div class="main__about">
        <div class="header-container">
            <div class="header"><?=$about_header?></div>
            <div class="header-bar"></div>
        </div>
        <div class="about-table">
            <div class="about-table__header">
                <div class="header-type">Баня</div>
                <div class="header-capacity"><img
                        src="<?php echo get_template_directory_uri() . '/assets/images/content/capacity.svg'?>"
                        alt="" />Вместимость
                </div>
                <div class="header-conv"> <img
                        src="<?php echo get_template_directory_uri() . '/assets/images/content/conv.svg'?>"
                        alt="" />Удобства</div>
                <div class="header-equip"><img
                        src="<?php echo get_template_directory_uri() . '/assets/images/content/equip.svg'?>"
                        alt="" />Оборудование</div>
                <div class="header-day-tariff">Тариф “День” 06:00 - 16:00, за час</div>
                <div class="header-evening-tariff">Тариф “День” 06:00 - 16:00, за час</div>
            </div>
            <div class="about-table__content">

                <?php 
                    if( have_rows('about_repeater') ):
                        while( have_rows('about_repeater') ) : the_row();
                            $about_name = get_sub_field("about_name");
                            $about_image = get_sub_field("about_image");
                            $about_capacity = get_sub_field("about_capacity");
                            $about_conv = get_sub_field("about_conv");
                            $about_equip = get_sub_field("about_equip");
                            $about_addprice = get_sub_field("about_addprice");
                            $about_sale_day = get_sub_field("about_sale_day");
                            $about_real_day = get_sub_field("about_real_day");
                            $about_sale_evening = get_sub_field("about_sale_evening");
                            $about_real_evening = get_sub_field("about_real_evening");?>

                <a class="about-table__item" href="<?=home_url();?>/bathroom">
                    <div class="item-type"><img src="<?=$about_image?>" alt="" /><?=$about_name?>
                    </div>
                    <div class="item-capacity">
                        <div class="circle"><?=$about_capacity?></div>
                    </div>
                    <div class="item-conv"><?=$about_conv?></div>
                    <div class="item-equip">
                        <div class="item"><?=$about_equip?></div>
                        <div class="add-price">(+<?=$about_addprice?> ₽)</div>
                    </div>
                    <div class="item-day-tariff">
                        <div class="sale-price"><?=$about_sale_day?>₽</div>
                        <div class="real-price"><?=$about_real_day?>₽</div>
                    </div>
                    <div class="item-evening-tariff">
                        <div class="sale-price"><?=$about_sale_evening?>₽</div>
                        <div class="real-price"><?=$about_real_evening?>₽</div>
                    </div>
                </a>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
    <?php 
                    if( have_rows('action_repeater') ):?>

    <div class="main__actions">
        <div class="header-container">
            <div class="header">Акции</div>
            <div class="header-bar"></div>
        </div>
        <div class="action-swiper-container">
            <div class="swiper action-swiper" id="actionSwiper">
                <div class="swiper-wrapper">
                    <?php while( have_rows('action_repeater') ) : the_row();
                            $action_logo = get_sub_field("action_logo");
                            $action_header = get_sub_field("action_header");
                            $action_due = get_sub_field("action_due");
                            $action_desc = get_sub_field("action_desc");?>
                    <div class="swiper-slide">
                        <div class="action-container">
                            <div class="action-container__column">
                                <div class="action-container__due"><?=$action_due?></div>
                                <div class="action-container__header"><?=$action_header?></div>
                                <div class="action-container__caption"><?=$action_desc?></div>
                            </div>
                            <div class="action-container__image"> <img src="<?=$action_logo?>" alt="" /></div>
                        </div>
                    </div>
                    <?php endwhile;?>
                </div>
            </div>
            <div class="swiper-button-prev"> </div>
            <div class="swiper-button-next"></div>
        </div>
    </div>

    <?php endif; ?>
    <div class="main__contacts">
        <div class="header-container">
            <div class="header">Контакты</div>
            <div class="header-bar"></div>
        </div>
        <div class="contact-container">
            <div class="contact-column">
                <div class="column-header">Адреса</div>
                <div class="column-adress"><?=$address?></div>
                <div class="column-caption">Ежедневно, круглосуточно</div>
            </div>
            <div class="contact-column">
                <div class="column-header">Телефон</div><a class="column-link" href="tel:+<?=$telephone_first?>">+
                    <?=$telephone_first?></a><a class="column-link" href="tel:+<?=$telephone_second?>">+
                    <?=$telephone_second?></a>
            </div>
            <div class="contact-column">
                <div class="column-header">Социальные сети</div>
                <div class="social-container">
                    <a class="social-circle" href="https://instagram.com/<?=$instagram?>"> <img
                            src="<?php echo get_template_directory_uri() . '/assets/images/content/instaDark.svg'?>"
                            alt="" /></a>
                    <a class="social-circle" href="https://vk.com/<?=$vk?>"> <img
                            src="<?php echo get_template_directory_uri() . '/assets/images/content/vkDark.svg'?>"
                            alt="" />
                    </a>
                    <a class="social-circle" href="https://wa.me/<?=$whatapp?>"> <img
                            src="<?php echo get_template_directory_uri() . '/assets/images/content/whatApp_white.svg'?>"
                            alt="" />
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="map-container">
        <div id="map"></div>
    </div>
</main>
<script>
ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map('map', {
            center: [56.81122355, 60.72763708],
            zoom: 14
        }),

        myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
            balloonContent: 'г. Екатеринбург, ул. Летняя, 20',
            iconCaption: 'г. Екатеринбург, ул. Летняя, 20',
        }, {
            iconLayout: 'default#image',
            iconImageHref: "<?php echo get_template_directory_uri() . '/assets/images/content/logo.svg'?>",
            iconImageSize: [30, 42],
            iconImageOffset: [-5, -38],
        })

    myMap.geoObjects
        .add(myPlacemark);
}
</script>
<?php
get_footer();