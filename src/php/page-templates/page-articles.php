<?php
/*
Template Name: articles
Template Post Type: page
*/
?>

<?php get_header('simple'); ?>

</div>
</div>
<style>
    .articles{
        padding-bottom: 4rem;
    }
</style>
<?php if ( !get_the_post_thumbnail_url() ){
    ?>
    <style>
        .articles{
            padding-top: 4rem;
        }
    </style>
    <?php
}else{
    ?>
    <style>
        .little-mainscreen .header-articles{
            position: relative;
        }
        .little-mainscreen .header-articles:after{
            content: '';
            position: absolute;
            left: 0;
            bottom: -12px;
            border-bottom: 4px solid #0A5BAC;
            width: 100%;
            max-width: 127px;
        }
    </style>
    <?php
}?>

<div class="articles">
    <style>
        .articles__item{
            height: 100%;
            display: block;
            background-color: white;
            padding-bottom: 15px;
        }
        .articles__item:hover svg{
            transform: translateX(10px);
        }
        .articles__item .preview{
            height: 13.125rem;
            width: 100%;
            object-fit: cover;
            background-color: rgba(0,0,0,0.3);
        }
        .articles__item .body{
            position: relative;
            padding: 1.5rem;
            min-height: 10rem;
            border: 1px solid #E7E7E7;
        }
        .articles__item .date{
            color: #A3A3A3;
            font-size: 14px;
            margin-bottom: 0.5rem;
        }
        .articles__item .title{
            font-weight: 700;
            font-size: 18px;
            color: black;
            margin-bottom: 0;
        }
        .articles__item svg{
            transition: 0.3s;
            position: absolute;
            bottom: 1.5rem;
            height: 12px;
            width: 12px;
        }
        .header-articles{
            text-transform: uppercase;
            color: black;
            margin-bottom: 12px;
            font-size: 42px;
            font-weight: 700;
        }
        @media screen and (max-width: 576px){
            .header-articles{
                font-size: 2.4rem;
            }
        }

        .little-mainscreen{
            z-index: 1;
            overflow: hidden;
            min-height: 13.4375rem;
            position: relative;
        }
        .little-mainscreen .container{
            margin-top: 7.375rem;
            position: relative;
            z-index: 3;
            color: white;
        }
        .little-mainscreen .background{
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            object-fit: cover;
        }
        .little-mainscreen:after{
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
    <?php the_post(); ?>
    <?php if ( get_the_post_thumbnail_url() ){
        ?>
        <div class="little-mainscreen">
            <div class="container">
                <?php the_title('<h1 class="header-articles text-white">', '</h1>'); ?>
            </div>
            <img src="<?php echo get_the_post_thumbnail_url() ?>"  class="background">
        </div>
        <?php
    } ?>
    <div class="container">
        <style>
            .categories-articles{
                margin-top: 2rem;
            }
            .categories-articles .categories-articles-header{
                font-size: 1rem;
                font-weight: 700;
                color: black;
                margin-bottom: 0.75rem;
            }
            .categories-articles-list{
                display: flex;
                flex-wrap: wrap;
                margin-bottom: -8px;
                margin-right: -8px;
            }
            .categories-articles-list .item-categories-articles{
                transition: 0.2s;
                cursor: pointer;
                color: #A3A3A3;
                background-color: #eeeeee;
                padding: 8px 16px;
                margin-bottom: 8px;
                margin-right: 8px;
                line-height: 14px;
                font-size: 0.9375rem;
            }
            .item-categories-articles.active{
                background-color: #0A5BAC;
                color: white;
            }
        </style>
        <?php 
        $categories = get_categories( [
            'taxonomy'     => 'type',
            'type'         => 'post',
            'child_of'     => 0,
            'orderby'      => 'name',
            'order'        => 'ASC',
            'hierarchical' => 1,
        ] );

        if( $categories ){
            echo '<div class="categories-articles">';
            echo '<div class="categories-articles-header">Ключевые запросы</div>';
            echo '<div class="categories-articles-list">';
            foreach( $categories as $cat ){
                echo '<div class="item-categories-articles item-categories-articles--'.$cat->slug.'" id="item-categories-articles-'.$cat->slug.'" data-slug="'.$cat->slug.'">'.$cat->name.'</div>';
            }
            echo '</div>';
            echo '</div>';
        }

        echo '<hr style="background: #DDDDDD; margin-top: 20px; margin-bottom: 20px;" >';
        ?>
            
        
        <?php 
            $args = array(
                'posts_per_page' => -1,
                'post_type' => 'article',
            );
            $query = new WP_Query( $args );

            $counter_result = wp_count_posts('article')->publish;

            function result_count_right_ending( $total_col ){
                if ( ( $total_col < 5 ) and ( $total_col != 0 ) ){
                    if ( $total_col == 1 ){
                        return 'статья'; 
                    }else{
                        return 'статьи';
                    }
                }else{
                    return 'статей'; 
                }
            }
            ?>
            <div class="my-3">
                <span style="color:#767676; font-size: 0.9375rem;"><?php echo $counter_result.' '.result_count_right_ending($counter_result) ?></span>
            </div>
            <?php
            // Цикл
            if ( $query->have_posts() ) {
                echo '<div class="row">';
                while ( $query->have_posts() ) {
                    $query->the_post(); 
                    $terms = get_the_terms(get_the_ID(), 'type');
                    $terms_list = '';
                    if ( $terms ){
                        foreach( $terms as $term){
                            $terms_list .= ' slug-'.$term->slug;
                        }
                    }
                   ?>
                    <a href="<?php echo get_permalink() ?>" class="articles__item col-md-6 <?php echo $terms_list; ?>">
                        <?php 
                            if ( get_the_post_thumbnail_url() ){
                                ?>
                                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="" class="preview dont-hover">
                                <?php
                            }else{
                                ?> 
                                    <div class="preview"></div>
                                <?php
                            }
                        ?>
                        <div class="body">
                            <div class="date"><?php the_date('d/m/y', '<span>', '</span>'); ?></div>
                            <h2 class="title"><?php the_title() ?></h2>
                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 13L7 7L0.999999 1" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </div>
                    </a>
                   <?php
                }
                echo '</div>';
            }else{
                echo 'Статей нет';
            }
            wp_reset_postdata();
        ?>
    </div>
</div>


<?php 
    //Получаем данные со страницы О компании
    $about_page_ID = 44;
    $post = get_post( $about_page_ID );
    setup_postdata($post);
?>
<div class="bg-grey contacts">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-12 contacts-left">
                <p class="contacts__header">Контакты</p>
                <p class="contacts__after-header">Всю интересующую информацию можно получить, связавшись с нами</p>
                <p class="contacts__title">Отдел производства</p>
                <div class="contacts__list">
                    <img src="/wp-content/themes/storefront-child/svg/navigation.svg" alt="">
                    <div>
                        <p><?= get_field('about_address') ?></p>
                    </div>
                </div>
                <div class="contacts__list">
                    <img src="/wp-content/themes/storefront-child/svg/svg-worktime.svg" alt="">
                    <div>
                        <p><?= get_field('about_worktime') ?></p>
                    </div>
                </div>
                <div class="contacts__list">
                    <img src="/wp-content/themes/storefront-child/svg/svg-phone.svg" alt="">
                    <div>
                        <a href="tel:<?= get_field('about_phone1') ?>"
						   onclick="ym(65345989,'reachGoal','phone')"><?= get_field('about_phone1') ?></a>
                        <a href="tel:<?= get_field('about_phone2') ?>"
						   onclick="ym(65345989,'reachGoal','phone')"><?= get_field('about_phone2') ?></a>
                        <a href="tel:<?= get_field('about_phone3') ?>"
						   onclick="ym(65345989,'reachGoal','phone')"><?= get_field('about_phone3') ?></a>
                    </div>
                </div>
                <div class="contacts__list">
                    <img src="/wp-content/themes/storefront-child/svg/svg-mail.svg" alt="">
                    <div>
                        <a href="mailto:<?= get_field('about_email') ?>"
						   onclick="ym(65345989,'reachGoal','mail')"><?= get_field('about_email') ?></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-12 contacts__map-container">
                <div class="contacts__map">
                    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ab78ff9a0398894c79b4d7789f0e62d644266cc8ce0fb893157dd55ff2790db07&amp;source=constructor"
                            width="100%" height="100%" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<?= add_help_banner('Остались вопросы?') ?>
<script>
    jQuery(function ($) {
        $('body').on('click', '.item-categories-articles', function(){
            var data_slug = $(this).attr('data-slug');
            console.log(data_slug);
            if ( !$(this).hasClass('active') ){
                $('.item-categories-articles').removeClass('active');
                $(this).addClass('active');
                $('.articles__item').addClass('d-none');
                $('.slug-'+data_slug).removeClass('d-none');
            }else{
                 $(this).removeClass('active');
                $('.articles__item').removeClass('d-none');
            }
        });
    });
    lightbox.option({
        'resizeDuration': 100,
        'wrapAround': true,
        'disableScrolling': true
    })
    const swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 30,
        freeMode: true,
        loop: true,
        navigation: {
            nextEl: '.passports-arrows-next',
            prevEl: '.passports-arrows-prev',
        },
        breakpoints: {
            450: {
                slidesPerView: 1.5,
                spaceBetween: 30,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            991: {
                slidesPerView: 3,
                spaceBetween: 50,
            },
        }
    });
</script>
<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>
