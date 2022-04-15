<?php
 /* Template Name: Пример услуги */
get_header();
$service_price = get_field("service_price");
$service_content_header = get_field("service_content_header");
$service_content_description = get_field("service_content_description");
$service_section_bg = get_field("service_section_bg");
?>
<main class="main main-service">
    <div class="breadcrumbs">
        <a href="<?=home_url();?>">Главная</a> /
        <a href="<?=home_url();?>/services">Услуги</a> /
        <?=get_the_title() ?>
    </div>
    <div class="main__container">
        <div class="container__service-name" style="background: linear-gradient(360deg, rgba(26, 47, 68, 0.9) 0%, rgba(26, 47, 68, 0) 100%), url(<?=$service_section_bg?>) no-repeat;">
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
                    <a href="<?=home_url();?>/book" target="_blank"
                        class="service-data__book-btn apply-btn">Забронировать</a>
                </div>
            </div>
        </div>
        <div class="container__description">
            <div class="description-header"><?=$service_content_header?></div>
            <div class="description-content"><?=$service_content_description?></div>
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
get_footer();