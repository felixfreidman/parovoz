<?php /* Template Name: Страница Отзывы */

get_header();
$reviews = array(
    'post_type' => 'reviews',
    'posts_per_page' => 15,
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $currentPage,
);

$loop_reviews = new WP_Query($reviews); ?>
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
<main class="main main-feedback">
    <div class="breadcrumbs"><a href="<?=home_url();?>">Главная</a> / <a href="<?=home_url();?>/feedback">Контакты</a>
    </div>
    <div class="header-container">
        <div class="header">Отзывы</div>
        <div class="header-bar"></div>
    </div>
    <div class="controls-section">
        <form id="ratingForm"><select class="controls-section__select" id="bathType" name="bathType">
                <option value="Все" checked>Все</option>
                <option value="Уральская">Уральская</option>
                <option value="Охотничья">Охотничья</option>
                <option value="Ямская">Ямская</option>
                <option value="Рыбацкая">Рыбацкая</option>
                <option value="Раздольная">Раздольная</option>
                <option value="Семейная">Семейная</option>
                <option value="Сибирская">Сибирская</option>
                <option value="Лесная">Лесная</option>
                <option value="Хуторок">Хуторок</option>
            </select>
            <div class="box-container"><input class="controls-section__input" id="starRating" type="text"
                    name="starRating" value="5" readonly>
                <div class="slider-rating" id="slider"></div>
            </div><button class="controls-section__button js--hidden" type="reset">Сбросить фильтр</button>
        </form>
        <a class="book-button service-book add-feedback test">Оставить отзыв
            <div class="plus-container">
                <span class="line"></span>
                <span class="line-vertical"></span>
            </div>
        </a>
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
    <div class="articles-pagination">
        <?php 
            echo paginate_links( array(
                'total' => $loop_reviews->max_num_pages
            ) );
            wp_reset_postdata();
            ?>
    </div>
</main>
<?php
get_footer();