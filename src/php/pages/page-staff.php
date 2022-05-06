<?php /* Template Name: Страница Товаров */

get_header();
?>
<main class="main main-staff">
    <div class="breadcrumbs">
        <a href="<?=home_url();?>">Главная</a> /
        <a href="<?=home_url();?>/staff">Товары</a>
    </div>
    <div class="header-container">
        <div class="header"> Товары с символикой <strong>ПАРОВОЗ</strong></div>
        <div class="header-bar"></div>
    </div>
    <?php 
            $my_staff = array(
                'post_type' => 'cloth',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'ASC',
            );
            
            $loop_section = new WP_Query($my_staff);
    ?>
    <div class="section">
        <div class="section__header-container">
            <div class="header">Текстиль</div>
            <div class="amount"><?php echo $count = $loop_section->found_posts; ?> товар</div>
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
            $my_staff = array(
                'post_type' => 'aroma',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'ASC',
            );
            
            $loop_section = new WP_Query($my_staff);
    ?>
    <div class="section">
        <div class="section__header-container">
            <div class="header">Аромотерапия</div>
            <div class="amount"><?php echo $count = $loop_section->found_posts; ?> товар</div>
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
            $my_staff = array(
                'post_type' => 'plant',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'ASC',
            );
            
            $loop_section = new WP_Query($my_staff);
    ?>
    <div class="section">
        <div class="section__header-container">
            <div class="header">Веники для бани</div>
            <div class="amount"><?php echo $count = $loop_section->found_posts; ?> товар</div>
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
</main>
<?php
get_footer();