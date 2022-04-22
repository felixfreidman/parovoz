<?php /* Template Name: Страница кафе */
get_header(); 
$cafe_caption = get_field("cafe_caption");
$cafe_first_image = get_field('cafe_first_image');
$cafe_second_image = get_field("cafe_second_image");
?>
<main class="main main-cafe">
    <div class="breadcrumbs">
        <a href="<?=home_url();?>">Главная</a> /
        <a href="<?=home_url();?>/cafe">Кафе</a>
    </div>
    <div class="header-container">
        <div class="header">Кафе</div>
        <div class="header-bar"></div>
    </div>
    <div class="cafe-description"><?=$cafe_caption?></div>
    <div class="cafe-images"> <img src="<?=$cafe_first_image?>" alt="" /><img src="<?=$cafe_second_image?>" alt="" />
    </div>
    <div class="section-header">Меню</div>
    <?php  if( have_rows('cafe_repeater') ): ?>
    <div class="container-swiper">
        <div class="swiper cafe-swiper" id="cafeSwiper">
            <div class="swiper-wrapper">
                <?php while( have_rows('cafe_repeater') ) : the_row();
                    $menu_page = get_sub_field("menu_page"); ?>
                <div class="swiper-slide">
                    <img src="<?=$menu_page?>" alt="" />
                </div>

                <?php endwhile; ?>
            </div>

        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"> </div>
        <div class="swiper-button-next"></div>
    </div>
    <?php endif; ?>
</main>
<?php
get_footer();