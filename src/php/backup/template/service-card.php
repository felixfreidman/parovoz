<?php 
$service_price = get_field("service_price");
$service_time = get_field("service_time");
$service_section_bg = get_field("service_section_bg");
?>
<div data-href="<?=get_post_permalink();?>" class="container-card">

    <div class="card-image" style="background: url(<?=$service_section_bg?>)"> </div>
    <div class="card-container">
        <div class="card-name">Авторское парение</div>
        <div class="card-time">
            <div class="card-time__image"> <img
                    src="<?php echo get_template_directory_uri() . '/assets/images/content/services_time.svg'?>" />
            </div>
            <div class="card-time__value"><?=$service_time?></div>
        </div>
        <div class="card-description">
            <?php 
                if( have_rows('service_repeater_page') ):
                    while( have_rows('service_repeater_page') ) : the_row(); 
                    $service_image = get_sub_field('service_image');
    
            ?>
            <div class="description__container">
                <div class="description__logo"> <img src="<?=$service_image?>" />
                </div>
                <div class="description__list">
                    <?php 
                            if( have_rows('service_page_repeater') ):
                                while( have_rows('service_page_repeater') ) : the_row();
                                $service_column_item = get_sub_field("service_column_item"); 
                            ?>

                    <div class="description__item"><?=$service_column_item?></div>
                    <?php 
                                endwhile;
                            endif;
                    ?>
                </div>
            </div>
            <?php 
                    endwhile;
                endif;
            ?>
        </div>
        <div class="card-info">
            <div class="service-price">
                <div class="price-value"><?=$service_price?></div>
                <div class="prive-currency">₽</div>
            </div>
            <?php $add_to_cart = do_shortcode('[add_to_cart_url id="'.$post->ID.'"]');?>
            <a href="<?=$add_to_cart;?>" class="service-book">Забронировать</a>

        </div>
    </div>
</div>