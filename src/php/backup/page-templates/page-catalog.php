<?php
/*
Template Name: catalog
Template Post Type: page
*/
?>

<?php get_header('simple'); ?>

</div>
</div>
<style>
    .catalog, .articles{
        padding: 4rem 0;
    }
    .catalog__list{
        padding-bottom: 4rem;
    }
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
</style>
<div class="catalog">
    <div class="container">
        <?php the_post(); ?>
        <?php the_title('<h1 class="header-articles">', '</h1>'); ?>
        <hr style="background: #D1D1D1; margin-top: 0; margin-bottom: 20px;" >
        <div class="row">
            <div class="col-md-3 d-md-block d-none">
                <style>
                    .accordion-item{
                        margin-bottom: 1rem;
                    }
                    .accordion-header{
                        -webkit-touch-callout: none; /* iOS Safari */
                        -webkit-user-select: none;   /* Chrome/Safari/Opera */
                        -khtml-user-select: none;    /* Konqueror */
                        -moz-user-select: none;      /* Firefox */
                        -ms-user-select: none;       /* Internet Explorer/Edge */
                        user-select: none;   
                        position: relative;
                        font-size: 15px;
                        font-weight: 400;
                        cursor: pointer;
                        margin-bottom: 0;
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                    }
                    .accordion-header svg{
                        transition: 0.2s;
                        transform: rotate(0deg);
                    }
                    .accordion-item .collapsed svg{
                        transform: rotate(180deg);
                    }
                    .accordion-list{
                        list-style: none;
                        padding-left: 12px;
                        margin-bottom: 0;
                    }
                    .accordion-list li{
                        margin-top: 4px;
                        -webkit-touch-callout: none; /* iOS Safari */
                        -webkit-user-select: none;   /* Chrome/Safari/Opera */
                        -khtml-user-select: none;    /* Konqueror */
                        -moz-user-select: none;      /* Firefox */
                        -ms-user-select: none;       /* Internet Explorer/Edge */
                        user-select: none;      
                    }
                    .accordion-list li a{
                        color: #767676;
                        font-size: 15px;
                        text-decoration: none;
                    }
                    .accordion-list li a:hover{
                        color: #0A5BAC;
                        text-decoration: none;
                    }

                   /* .accordion-item{
                        margin-bottom: 1rem;
                    }*/
                </style>
                

                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h5 class="accordion-header" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="headingOne">Бетон гранитный<svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M13 10.5L7 4.5L1 10.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0"><rect width="14" height="14" fill="white" transform="translate(14 14.5) rotate(-180)"/></clipPath></defs></svg></h5>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <ul class="accordion-list">
                                <li><a href="">М100</a></li>
                                <li><a href="">М150</a></li>
                                <li><a href="">М200</a></li>
                                <li><a href="">М250</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">Бетон гравийный<svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M13 10.5L7 4.5L1 10.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0"><rect width="14" height="14" fill="white" transform="translate(14 14.5) rotate(-180)"/></clipPath></defs></svg></h5>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <ul class="accordion-list">
                                <li><a href="">М100</a></li>
                                <li><a href="">М150</a></li>
                                <li><a href="">М200</a></li>
                                <li><a href="">М250</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h5 class="accordion-header collapsed" data-toggle="collapse" data-target="#collapseTree" aria-expanded="true" aria-controls="collapseTree" id="headingTree">Цементный кладочный раствор<svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M13 10.5L7 4.5L1 10.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0"><rect width="14" height="14" fill="white" transform="translate(14 14.5) rotate(-180)"/></clipPath></defs></svg></h5>
                        <div id="collapseTree" class="collapse" aria-labelledby="headingTree" data-parent="#accordionExample">
                            <ul class="accordion-list">
                                <li><a href="">М100</a></li>
                                <li><a href="">М150</a></li>
                                <li><a href="">М200</a></li>
                                <li><a href="">М250</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <style>
                    .toggle-price{
                        position: relative;
                        display: flex;
                        align-items: center;
                        cursor: pointer;
                    }
                    .toggle-price > span{
                        color: black;
                        font-size: 15px;
                        padding: 0 8px;
                    }
                    .toggle-price.show > span{
                        color: #0C4988;
                    }
                    .toggle-price.show .toggle-price-blocks path{
                        fill: #0C4988;
                    }
                    .toggle-price.show .toggle-price-arrow path{
                        stroke: #0C4988;
                    }

                    .toggle-price-arrow{
                        transition: 0.2s;
                        transform: rotate(180deg);
                    }
                    .toggle-price.show .toggle-price-arrow{
                        transform: rotate(0deg);
                    }
                    .toggle-price-menu{
                        transition: 0.3s;
                        opacity: 0;
                        visibility: hidden;
                        position: absolute;
                        bottom: 0;
                        right: 0;
                        transform: translateY(calc(100% + 0.5rem));
                        background-color: white;
                        box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.2);
                        border-radius: 4px;
                        padding: 1rem;
                    }
                    .toggle-price-menu-item{
                        margin-bottom: 0.5rem;
                        display: flex;
                        font-size: 15px;
                        align-items: center;
                    }
                    .toggle-price-menu-item span{
                        white-space: nowrap;
                        color: black;
                        padding-left: 4px;
                    }
                    .toggle-price-menu-item:last-child{
                        margin-bottom: 0;
                    }
                    
                    .toggle-menu-btn{
                        font-size: 15px;
                        font-weight: 700;
                        cursor: pointer;
                        text-transform: uppercase;
                    }
                    .toggle-price-menu-item svg{
                        opacity: 0;
                    }
                    .toggle-price-menu-item.active svg{
                        opacity: 1;
                    }
                    .toggle-price.show .toggle-price-menu{
                        opacity: 1;
                        visibility: visible;
                    }
                    .toggle-price.toggle-price-asc .toggle-price-blocks{
                        transform: scale(1, 1);
                    }
                    .toggle-price.toggle-price-desc .toggle-price-blocks{
                        transform: scale(1, -1);
                    }
                </style>
                <div class="d-flex align-items-center justify-content-md-end justify-content-between pb-4">
                    <span class="toggle-menu-btn show-menu-accordion-mobile d-md-none d-block">Меню</span>
                    <div class="toggle-price toggle-price-asc">
                        <svg class="toggle-price-blocks" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 13H5.33333V11.3333H0V13ZM0 3V4.66667H16V3H0ZM0 8.83333H10.6667V7.16667H0V8.83333Z" fill="#000000"/></svg>
                        <span id="toggle-price-text">цена по убыванию</span>
                        <svg class="toggle-price-arrow" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M13 10L7 4L1 10" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0"><rect width="14" height="14" fill="white" transform="translate(14 14) rotate(-180)"/></clipPath></defs></svg>
                        <div class="toggle-price-menu">
                            <div class="toggle-price-menu-item active"  data-order="ASC">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.45455 10.9104L2.11364 7.77612L1 8.8209L5.45455 13L15 4.04478L13.8864 3L5.45455 10.9104Z" fill="black"/></svg>
                                <span>цена по убыванию</span>
                            </div>
                            <div class="toggle-price-menu-item" data-order="DESC">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.45455 10.9104L2.11364 7.77612L1 8.8209L5.45455 13L15 4.04478L13.8864 3L5.45455 10.9104Z" fill="black"/></svg>
                                <span>цена по возрастанию</span>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .cart-products-long{
                        background: #FFFFFF;
                        border: 1px solid #E7E7E7;
                        border-bottom: none;
                        transition: 145ms ease-in-out;
                        padding: 2rem;
                        display: flex;
                    }
                    .cart-products-long:last-child{
                        border-bottom: 1px solid #E7E7E7;
                    }
                    .cart-products-long__preview{
                        width: 9.25rem;
                        min-width: 9.25rem;
                        height: auto;
                    }
                    .cart-products-long__preview img{
                        width: 100%;
                        height: auto;
                    }
                    .cart-products-long__body{
                        width: 100%;
                        padding-left: 30px;
                        display: flex;
                        justify-content: space-between;
                        align-items: flex-end;
                    }
                    .card-products-long__title{
                        font-weight: bold;
                        font-size: 17px;
                        color: #000000;
                        margin-bottom: 52px;
                        position: relative;
                    }
                    .card-products-long__title:after {
                        content: '';
                        position: absolute;
                        left: 0;
                        bottom: -24px;
                        border-bottom: 4px solid #0A5BAC;
                        width: 100%;
                        max-width: 127px;
                    }
                    .cart-products-long .card-products-list__price{
                        font-size: 1.5rem !important;
                        margin-bottom: 1rem !important;
                        text-align: right;
                    }
                    .cart-products-long .btn-primary{
                        max-width: none!important;
                        padding: 16px 64px !important;
                    }
                    @media screen and (max-width: 768px){
                        .cart-products-long{
                            display: block;
                        }
                        .cart-products-long__body{
                            display: block;
                            padding-left: 0!important;
                        }
                        .cart-products-long .card-products-list__price{
                            font-size: 1.75rem;
                            text-align: left;
                        }
                        .cart-products-long__preview{
                            margin-bottom: 1rem;
                        }
                        .cart-products-long__content{
                            margin-bottom: 1rem;
                        }
                    }
                    .catalog__list{
                        display: flex;
                        flex-direction: column;
                    }
                    .catalog__list.catalog__list-desc{
                        flex-direction: column-reverse;
                    }
                </style>    
                <div class="catalog__list" id="sort-catalog__list">
                    <?php 

                    // создаем экземпляр
                    $products = new WP_Query;

                    // делаем запрос
                    $products = $products->query( array(
                        'post_type'              => 'product',
                        'post_status'            => 'publish',
                        'posts_per_page' => '-1',
                        'orderby'   => 'meta_value_num',
                        'meta_key'  => '_price',
                        'order' => 'DESC',
                    ) );
                    
                    foreach( $products as $obj ){
                        $product_id = $obj->ID;

                        $product = get_post( $product_id );
                        // print_r($product);
                        // $image_id = $product->get_image_id();

                        $durability = mb_strtolower(get_post_meta($product_id, 'durability', true));
                        $density = get_post_meta($product_id, 'density', true);
                        $props = get_post_meta($product_id, 'properties', true);
                        $properties = [];
                        $icon = '';
                        $item_label = get_post_meta($product_id, 'item_label', true);
                        if ($item_label === 'Востребованный') {
                            $item_label_class = 'green';
                        } else {
                            $item_label_class = 'orange';
                        }
                        if ($durability) {
                            switch ($durability) {
                                case 'пластичный':
                                    $icon = '/wp-content/themes/storefront-child/svg/plastichnyj.svg';
                                    break;
                                case 'высокооднородный':
                                    $icon = '/wp-content/themes/storefront-child/svg/Vysokoodnorodnyj.svg';
                                    break;
                                case 'низкая прочность':
                                    $icon = '/wp-content/themes/storefront-child/svg/nizkaya-prochnost.svg';
                                    break;
                                case 'средняя прочность':
                                    $icon = '/wp-content/themes/storefront-child/svg/srednyaya-prochnost.svg';
                                    break;
                                case 'высокая прочность':
                                    $icon = '/wp-content/themes/storefront-child/svg/vysokaya-prochnost.svg';
                                    break;
                                case 'повышенная прочность':
                                    $icon = '/wp-content/themes/storefront-child/svg/povyshennaya-prochnost.svg';
                                    break;
                                case 'экстремальная прочность' :
                                    $icon = '/wp-content/themes/storefront-child/svg/ekstremalnaya-prochnost.svg';
                                    break;
                            }
                            $properties[] = '<span class="card-products-list__property"><img src="' . $icon . '" alt="' . $durability . '">' . $durability . '</span>';
                        }
                        if ($density) {
                            $icon = '/wp-content/themes/storefront-child/svg/Plotnost.svg';
                            $properties[] = '<span class="card-products-list__property"><img src="' . $icon . '" alt="плотность">плотность ' . $density . ' кг/м³</span>';
                        }
                        if (is_array($props)) {
                            foreach ($props as $prop) {
                                $lowerProp = mb_strtolower($prop);
                                switch ($lowerProp) {
                                    case 'подготовка фундамента':
                                    case 'подготовительные работы':
                                        $icon = '/wp-content/themes/storefront-child/svg/Podgotovitelnye-raboty.svg';
                                        break;
                                    case 'для стяжек':
                                        $icon = '/wp-content/themes/storefront-child/svg/Styazhka.svg';
                                        break;
                                    case 'для заливки фундамента':
                                        $icon = '/wp-content/themes/storefront-child/svg/Zalivka-betona.svg';
                                        break;
                                    case 'несущие конструкции':
                                        $icon = '/wp-content/themes/storefront-child/svg/Nesushchie-konstrukcii.svg';
                                        break;
                                    case 'монолитный фундамент':
                                    case 'изготовление фундамента':
                                        $icon = '/wp-content/themes/storefront-child/svg/Monolitnyj-fundament.svg';
                                        break;
                                    case 'для жби':
                                        $icon = '/wp-content/themes/storefront-child/svg/ZHBI.svg';
                                        break;
                                    case 'ответственные конструкции':
                                        $icon = '/wp-content/themes/storefront-child/svg/Vazhnye-konstrukcii.svg';
                                        break;
                                    case 'для кладки':
                                        $icon = '/wp-content/themes/storefront-child/svg/Dlya-kladki.svg';
                                        break;
                                    case 'для выравнивания':
                                        $icon = '/wp-content/themes/storefront-child/svg/Vyravnivanie.svg';
                                        break;
                                    case 'для затирки':
                                        $icon = '/wp-content/themes/storefront-child/svg/Dlya-zatirki.svg';
                                        break;
                                }
                                $properties[] = '<span class="card-products-list__property"><img src="' . $icon . '" alt="' . $lowerProp . '">' . $lowerProp . '</span>';
                            }
                        }

                        setup_postdata($product);

                        ?>
                        <div class="cart-products-long" data-price="<?= $product->get_price(); ?>">
                            <div class="cart-products-long__preview">
                                <?= get_the_post_thumbnail($product_id, 'full'); ?>
                            </div>
                            <div class="cart-products-long__body">
                                <div class="cart-products-long__content">
                                    <p class="card-products-long__title"><?= $product->name; ?></p>
                                    <?php foreach ($properties as $property) {
                                        echo $property;
                                    } ?>
                                </div>
                                <div class="cart-products-long__right">
                                    <p class="card-products-list__price"><?= $product->get_price(); ?> ₽/м³</p>
                                    <button class="btn btn-primary btnOrderCatalog" data-name-product="<?= $product->name; ?>">Заказать</button>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                       
                    wp_reset_postdata();

                ?>
                </div>

                <?php the_content(); ?>
            </div>
        </div>
       
        
    </div>
</div>

<?php 
    $catalog_Qdelivery = get_field('catalog_Qdelivery');
    if( $catalog_Qdelivery ){
        get_template_part('template-parts/delivery-zone', 'delivery-zone');
    }

?>


<?php 
    $catalog_Qarticles = get_field('catalog_Qarticles');
    if ( $catalog_Qarticles ){
        ?>
        <div class="articles">
            <div class="container">
                <h1  class="header-articles" style="margin-bottom: 2rem;">Статьи</h1>
                <?php 
                    $catalog_obj_articles = get_field('catalog_obj_articles');
                    if ( $catalog_obj_articles ){
                        echo '<div class="row">';
                        foreach( $catalog_obj_articles as $obj ){
                            $article_id = $obj->ID;
                            $post = get_post( $article_id );
                            setup_postdata($post);
                            ?>
                            <a href="<?php echo get_permalink() ?>" class="articles__item col-md-6">
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
                        ?>
                        <a href="<?php echo get_permalink(242) ?>" style="text-decoration: none; margin-top: 2rem;" class="btn btn-outline-primary">ВСЕ СТАТЬИ</a>
                        <?php
                    }
                    wp_reset_postdata();
                ?>
            </div>
        </div>
        <?php
    }
?>



<?php 
    //Получаем данные со страницы О компании
    $about_page_ID = 44;
    $post = get_post( $about_page_ID );
    setup_postdata($post);
?>
<style>
    @media screen and (max-width: 576px){
        html .contacts .container {
            padding: 0 15px;
        }
    }
</style>
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

<style>
    .menu-accordion-mobile{
        z-index: 10000000;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: white;
        transition: 0.35s;
        transform: translateX(100%);
    }
    .menu-accordion-mobile.show{
         transform: translateX(0%);
    }
    .menu-accordion-mobile__header{
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 15px;
        border-bottom: 1px solid #e7e7e7;
    }
    .menu-accordion-mobile__header span{
        font-size: 15px;
        font-weight: 700;
        text-transform: uppercase;
    }
    .menu-accordion-mobile__body{
        padding: 24px 15px;
    }
</style>
<div class="menu-accordion-mobile">
    <div class="menu-accordion-mobile__header">
        <span>Меню</span>
        <svg class="close close-menu-accordion-mobile" width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="30.1725" height="2.10432" rx="1.05216" transform="matrix(0.711585 0.7026 -0.711585 0.7026 2.20312 0)" fill="#DDDDDD"/>
            <rect width="30.1725" height="2.10432" rx="1.05216" transform="matrix(-0.711585 0.7026 0.711585 0.7026 22.1768 0)" fill="#DDDDDD"/>
        </svg>
    </div>
    <div class="menu-accordion-mobile__body">
        <div class="accordion" id="accordionExample2">
            <div class="accordion-item">
                <h5 class="accordion-header" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="headingOne">Бетон гранитный<svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M13 10.5L7 4.5L1 10.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0"><rect width="14" height="14" fill="white" transform="translate(14 14.5) rotate(-180)"/></clipPath></defs></svg></h5>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample2">
                    <ul class="accordion-list">
                        <li><a href="">М100</a></li>
                        <li><a href="">М150</a></li>
                        <li><a href="">М200</a></li>
                        <li><a href="">М250</a></li>
                    </ul>
                </div>
            </div>
            <div class="accordion-item">
                <h5 class="accordion-header collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">Бетон гравийный<svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M13 10.5L7 4.5L1 10.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0"><rect width="14" height="14" fill="white" transform="translate(14 14.5) rotate(-180)"/></clipPath></defs></svg></h5>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample2">
                    <ul class="accordion-list">
                        <li><a href="">М100</a></li>
                        <li><a href="">М150</a></li>
                        <li><a href="">М200</a></li>
                        <li><a href="">М250</a></li>
                    </ul>
                </div>
            </div>
            <div class="accordion-item">
                <h5 class="accordion-header collapsed" data-toggle="collapse" data-target="#collapseTree" aria-expanded="true" aria-controls="collapseTree" id="headingTree">Цементный кладочный раствор<svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M13 10.5L7 4.5L1 10.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0"><rect width="14" height="14" fill="white" transform="translate(14 14.5) rotate(-180)"/></clipPath></defs></svg></h5>
                <div id="collapseTree" class="collapse" aria-labelledby="headingTree" data-parent="#accordionExample2">
                    <ul class="accordion-list">
                        <li><a href="">М100</a></li>
                        <li><a href="">М150</a></li>
                        <li><a href="">М200</a></li>
                        <li><a href="">М250</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
