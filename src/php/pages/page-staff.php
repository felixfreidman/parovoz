<?php /* Template Name: Страница Товаров */

get_header();
?>
<main class="main main-staff staff-body">
    <div class="breadcrumbs">
        <a href="<?=home_url();?>">Главная</a> /
        <a href="<?=home_url();?>/staff">Товары</a>
    </div>
    <div class="header-container">
        <div class="header"> Товары с символикой <strong>ПАРОВОЗ</strong></div>
        <div class="header-bar"></div>
    </div>
    <?php 
    if( have_rows('staff_repeater') ):
        while( have_rows('staff_repeater') ) : the_row(); 
            $section_header = get_sub_field("section_header");
            $section_amount = get_sub_field("section_amount");
            $section_tax = get_sub_field("section_tax");
            $my_staff = array(
                'post_type' => $section_tax,
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'ASC',
            );
            
            $loop_section = new WP_Query($my_staff);
    ?>
    <div class="section">
        <div class="section__header-container">
            <div class="header"><?=$section_header?></div>
            <div class="amount"><?=$section_amount?></div>
        </div>
        <div class="staff-container">

            <?php while ($loop_section->have_posts()): $loop_section->the_post();

                        get_template_part('template/staff-card');
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
</main>
<?php
get_footer();