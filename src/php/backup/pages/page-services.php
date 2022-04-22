<?php /* Template Name: Страница Услуг */

get_header();
?>
<main class="main main-services">
    <div class="breadcrumbs">
        <a href="<?=home_url();?>">Главная</a> /
        <a href="<?=home_url();?>/services">Услуги</a>
    </div>
    <div class="header-container">
        <div class="header">Услуги</div>
        <div class="header-bar"></div>
    </div>
    <?php 
    if( have_rows('staff_repeater') ):
        while( have_rows('staff_repeater') ) : the_row(); 
            $section_header = get_sub_field("section_header");
            $section_amount = get_sub_field("section_amount");
            $section_tax = get_sub_field("section_tax");
            $my_staff = array(
                'post_type' => 'product',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'ASC',
                'tax_query'             => array(
                    array(
                        'taxonomy'      => 'product_cat',
                        'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                        'terms'         => $section_tax,
                        'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
                    ),
                    array(
                        'taxonomy'      => 'product_visibility',
                        'field'         => 'slug',
                        'terms'         => 'exclude-from-catalog', // Possibly 'exclude-from-search' too
                        'operator'      => 'NOT IN'
                    )
                )
            );
            
            $loop_section = new WP_Query($my_staff);
    ?>
    <div class="section">
        <div class="section__header-container">
            <div class="header"><?=$section_header?></div>
            <div class="amount"><?=$section_amount?></div>
        </div>
        <div class="service-container">

            <?php while ($loop_section->have_posts()): $loop_section->the_post();

                        get_template_part('template/service-card');
                        $i++;
                        endwhile;
                        wp_reset_postdata();
                    ?>
        </div>
    </div>
    <?php 
        endwhile;
    endif;
    ?>
    <div class="section">
        <div class="header-container">
            <div class="header">Услуги</div>
            <div class="header-bar"> </div>
        </div>

        <?php 
if( have_rows('worker_repeater') ):
    
?>

        <div class="swiper" id="workerSwiper">
            <div class="swiper-wrapper">
                <?php while( have_rows('worker_repeater') ) : the_row();
    $worker_image = get_sub_field("worker_image");
    $worker_name = get_sub_field("worker_name");
    $worker_job = get_sub_field("worker_job");
    $worker_desc = get_sub_field("worker_desc"); ?>
                <div class="swiper-slide">
                    <div class="worker-image"><img src="<?=$worker_image?>" alt="" /></div>
                    <div class="worker-name"><?=$worker_name?></div>
                    <div class="worker-job"><?=$worker_job?></div>
                    <div class="worker-description"><?=$worker_desc?></div>
                </div>
                <?php endwhile;?>
            </div>
        </div>
        <?php  endif; ?>
    </div>
</main>
<?php
get_footer();