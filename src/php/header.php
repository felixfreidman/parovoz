<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Паровоз: <?=get_the_title() ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() . '/assets/images/content/favicon.png'; ?>">
    <script src="https://api-maps.yandex.ru/2.1/?apikey=db32f154-f5b8-442a-bb04-5f55f07bbae7&lang=ru_RU"
        type="text/javascript">
    </script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
</head>

<body>

    <?php ini_set('display_errors', FALSE); ?>
    <header class="header">
        <div class="header__logo"> <img
                src="<?php echo get_template_directory_uri() . '/assets/images/content/logo_header.svg'?>" alt="" />
        </div>
        <div class="header__navigation"> <a class="navigation-link" href="<?=home_url();?>">Главная</a>
            <div class="navigation-link complex-link">Бани<div class="navigation-box"> <a class="navigation-box__link"
                        href="">Уральская</a><a class="navigation-box__link" href="">Охотничья</a><a
                        class="navigation-box__link" href="">Ямская</a><a class="navigation-box__link"
                        href="">Рыбацкая</a><a class="navigation-box__link" href="">Раздольная</a><a
                        class="navigation-box__link" href="">Семейная</a><a class="navigation-box__link"
                        href="">Сибирская</a><a class="navigation-box__link"
                        href="<?=home_url();?>/bathroom">Лесная</a><a class="navigation-box__link" href="">Хуторок</a>
                </div>
            </div><a class="navigation-link" href="<?=home_url();?>/services">Услуги</a>
            <a class="navigation-link" href="<?=home_url();?>/cafe">Кафе</a>
            <a class="navigation-link" href="<?=home_url();?>/articles">PRO баню</a>
            <a class="navigation-link" href="<?=home_url();?>/staff">Товары</a>
            <a class="navigation-link" href="<?=home_url();?>/contacts">Контакты</a>
        </div>
        <a class="header__book" href="<?=home_url();?>/cart"><img
                src="<?php echo get_template_directory_uri() . '/assets/images/content/cart_image.svg'?>" alt="" />
            <div class="book-header">Мое бронирование</div><span
                class="book-counter"><?php  echo count(WC()->cart->get_cart());?></span>
        </a>
    </header>