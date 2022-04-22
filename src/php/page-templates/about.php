<?php
/*
Template Name: about
Template Post Type: post, page, product
*/
?>

<?php get_header(); ?>

</div>
</div>

<div class="bg-blue about-block">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="about-block__header">О компании БетонСтрой</p>
                <p class="about-block__after-header">Главное направление компании — производство бетоных смесей всех
                    классов. Наша команда успешно применяет новые добавки и примеси для улучшения свойств смесей.
                    Благодаря современному автопарку и работе операторов мы покрываем новые зоны доставки.</p>
                <p class="about-block__info">БетонСтрой расширяет производство за счет:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="row">
                    <div class="col about-block__point">
                        <img src="/wp-content/themes/storefront-child/images/img-point-1.png" alt="">
                        <p>Новых мощностей</p>
                    </div>
                    <div class="col about-block__point">
                        <img src="/wp-content/themes/storefront-child/images/img-point-2.png" alt="">
                        <p>Новых типов смесей</p>
                    </div>
                    <div class="col about-block__point">
                        <img src="/wp-content/themes/storefront-child/images/img-point-3.png" alt="">
                        <p>Качества сервиса</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 mt-auto">
                <a class="btn btn-outline-white mb-0" href="/#products">Продукция</a>
            </div>
        </div>
    </div>
</div>

<div class="bg-grey team">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="team__header">Команда</p>
                <p class="team__after-header">Которая идет к этим целям</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="card-team">
                    <div class="card-team__header" style="background: url(<?= get_field('img_first') ?>) center;">
                    </div>
                    <div class="card-team__body">
                        <p class="card-team__title"><?= get_field('fio_first') ?></p>
                        <p class="card-team__info"><?= get_field('post_first') ?></p>
                        <a class="card-item__email"
                           href="mailto:<?= get_field('email_first') ?>"
						   onclick="ym(65345989,'reachGoal','mail')"><?= get_field('email_first') ?></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="card-team">
                    <div class="card-team__header" style="background: url(<?= get_field('img_second') ?>) center;">
                    </div>
                    <div class="card-team__body">
                        <p class="card-team__title"><?= get_field('fio_second') ?></p>
                        <p class="card-team__info"><?= get_field('post_second') ?></p>
                        <a class="card-item__email"
                           href="mailto:<?= get_field('email_second') ?>"
						   onclick="ym(65345989,'reachGoal','mail')"><?= get_field('email_second') ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="passports" class="bg-white passports">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="passports__header">Паспорта качества продукции</p>
                <p class="passports__after-header">Вся продукция сертифицирована и успешно прошла проверки</p>
            </div>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php
                $gallery = get_post_gallery_images_with_info();
                foreach ($gallery as $image_obj) :
                    ?>
                    <div class="swiper-slide">
                        <div class="card-certificate">
                            <div class="card-certificate__header">
                                <img src="<?= $image_obj['src'] ?>" alt="">
                            </div>
                            <div class="card-certificate__body">
                                <p class="card-certificate__title"><?= $image_obj['caption'] ?></p>
                                <a data-lightbox="<?= $image_obj['caption'] ?>" href="<?= $image_obj['src'] ?>">Показать ></a>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
        <div class="passports-arrows">
            <div class="passports-arrows-prev"><svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.74031 1.08008L2.32031 8.50008L9.74031 15.9201" stroke="black" stroke-width="2"/>
                </svg>
            </div>
            <div class="passports-arrows-next"><svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.25969 1.08008L8.67969 8.50008L1.25969 15.9201" stroke="black" stroke-width="2"/>
                </svg>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <p class="passports__header">Паспорта качества материала</p>
                <p class="passports__after-header">Вся продукция сертифицирована и успешно прошла проверки</p>
            </div>
        </div>
        <div class="row">
            <?php
            $gallerySecond = get_post_gallery_images_with_info(null, 1);
            foreach ($gallerySecond as $image_obj) :
                ?>
                <div class="col-lg-6 col-12">
                    <div class="card-passport">
                        <div class="card-passport__img">
                            <img src="/wp-content/themes/storefront-child/svg/svg-card-passport.svg" alt="">
                        </div>
                        <div>
                            <p class="card-passport__title"><?= $image_obj['caption'] ?></p>
                            <a data-lightbox="<?= $image_obj['caption'] ?>" href="<?= $image_obj['src'] ?>">Показать ></a>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</div>

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
<?php get_footer(); ?>
