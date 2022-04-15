<?php
 /* Template Name: Пример статьи */
get_header();

$article_bg = get_field('article_bg');

?>
<main class="main main-service">
    <div class="main__breadcrumbs">
        <a href="<?=home_url();?>">Главная</a> / <a href="<?=home_url();?>/articles">Статьи</a> / <?=get_the_title() ?>
    </div>
    <div class="main__container">
        <div class="container__service-name article-container"
            style="background: linear-gradient( 360deg, rgba(26, 47, 68, 0.9) 0%, rgba(26, 47, 68, 0) 100%), url(<?=$article_bg?>) no-repeat;">
            <div class="row">
                <div class="name-container">
                    <div class="service-data"><?=get_the_date("d M Y"); ?></div>
                    <div class="service-header"><?=get_the_title() ?></div>
                    <div class="container-bar"> </div>
                </div>
            </div>
        </div>
        <div class="container__description">

            <?php 
                if( have_rows('article_content') ):
                    while( have_rows('article_content') ) : the_row(); 
                        $article_par = get_sub_field('article_par');?>
            <div class="description-content low-margin"><?=$article_par?></div>
            <?php endwhile;
                endif;
            ?>
        </div>
    </div>
</main>
<?php
get_footer();