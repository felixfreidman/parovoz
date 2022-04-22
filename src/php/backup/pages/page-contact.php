<?php /* Template Name: Страница Контакты */

get_header(); 
$instagram = get_field("instagram", "option");
$vk = get_field("vk", "option");
$telephone_first = get_field("telephone_first", "option");
$telephone_second = get_field("telephone_second", "option");
$whatapp = get_field("whatapp", "option");
$address = get_field("address", "option");
?>
<main class="main main-contact staff-body">
    <div class="breadcrumbs"><a href="<?=home_url();?>">Главная</a> / <a href="<?=home_url();?>/contacts">Контакты</a>
    </div>
    <div class="header-container">
        <div class="header">Контакты</div>
        <div class="header-bar"></div>
    </div>
    <div class="contact-container">
        <div class="contact-column">
            <div class="column-header">Адреса</div>
            <div class="column-adress"><?=$address?></div>
            <div class="column-caption">Ежедневно, круглосуточно</div>
        </div>
        <div class="contact-column">
            <div class="column-header">Телефон</div><a class="column-link" href="tel:+<?=$telephone_first?>">+
                <?=$telephone_first?></a><a class="column-link" href="tel:+<?=$telephone_second?>">+
                <?=$telephone_second?></a>
        </div>
        <div class="contact-column">
            <div class="column-header">Социальные сети</div>
            <div class="social-container">
                <a class="social-circle" href="https://instagram.com/<?=$instagram?>"> <img
                        src="<?php echo get_template_directory_uri() . '/assets/images/content/instaDark.svg'?>"
                        alt="" /></a>
                <a class="social-circle" href="https://vk.com/<?=$vk?>"> <img
                        src="<?php echo get_template_directory_uri() . '/assets/images/content/vkDark.svg'?>" alt="" />
                </a>
                <a class="social-circle" href="https://wa.me/<?=$whatapp?>"> <img
                        src="<?php echo get_template_directory_uri() . '/assets/images/content/whatApp.svg'?>" alt="" />
                </a>
            </div>
        </div>
    </div>
</main>
<div class="map-container">
    <div id="map"></div>
</div>
<script>
ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map('map', {
            center: [56.81122355, 60.72763708],
            zoom: 14
        }),

        myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
            balloonContent: 'г. Екатеринбург, ул. Летняя, 20',
            iconCaption: 'г. Екатеринбург, ул. Летняя, 20',
        }, {
            iconLayout: 'default#image',
            iconImageHref: "<?php echo get_template_directory_uri() . '/assets/images/content/logo.svg'?>",
            iconImageSize: [30, 42],
            iconImageOffset: [-5, -38],
        })

    myMap.geoObjects
        .add(myPlacemark);
}
</script>
<?php
get_footer();