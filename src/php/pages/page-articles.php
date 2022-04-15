<?php 
/* Template Name: Страница Статьи */
get_header();
$my_articles = array(
    'post_type' => 'article',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'ASC',
);

$loop_articles = new WP_Query($my_articles);
?>
<main class="main main-articles">
    <div class="breadcrumbs">
        <a href="<?=home_url();?>">Главная</a> /
        <a href="<?=home_url();?>/articles">PRO баню</a>
    </div>
    <div class="header-container">
        <div class="header">PRO баню</div>
        <div class="header-bar"></div>
    </div>
    <div class="articles-container">
        <?php while ($loop_articles->have_posts()): $loop_articles->the_post();

                get_template_part('template/article-card');
                $i++;
                endwhile;
                wp_reset_postdata();
        ?>
    </div>
</main>
<?php 
get_footer();