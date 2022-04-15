<?php
$instagram = get_field("instagram", "option");
$vk = get_field("vk", "option");
$telephone_first = get_field("telephone_first", "option");
$telephone_second = get_field("telephone_second", "option");
$whatapp = get_field("whatapp", "option");
$address = get_field("address", "option");
?>
<footer class="footer">
    <a class="footer-logo"> <img
            src="<?php echo get_template_directory_uri() . '/assets/images/content/logo_footer.svg'?>"" alt=" footer
            logo" /></div>
        <div class="footer-column">
            <div class="footer-header">БАНИ</div><a class="footer-link" href="#">Уральская</a><a class="footer-link"
                href="#">Охотничья</a><a class="footer-link" href="#">Ямская</a><a class="footer-link"
                href="#">Рыбацкая</a><a class="footer-link" href="#">Раздольная</a><a class="footer-link"
                href="#">Семейная</a><a class="footer-link" href="#">Сибирская</a><a class="footer-link"
                href="#">Лесная</a><a class="footer-link" href="#">Хуторок</a>
        </div>
        <div class="footer-column">
            <div class="footer-header">УСЛУГИ</div><a class="footer-link" href="#">Парение</a><a class="footer-link"
                href="#">Массаж</a><a class="footer-link" href="#">SPA - программы</a><a class="footer-link"
                href="#">Специалисты</a>
        </div>
        <div class="footer-column">
            <a class="footer-link--bold" target="_blank" href="<?=home_url();?>/cafe">КАФЕ</a>
            <a class="footer-link--bold" target="_blank" href="<?=home_url();?>/articles">PRO БАНЮ</a>
            <a class=" footer-link--bold" target="_blank" href="<?=home_url();?>/staff">ТОВАРЫ</a>
            <a class="footer-link--bold" target="_blank" href="<?=home_url();?>/feedback">ОТЗЫВЫ</a>
            <a class="footer-link--bold" target="_blank" href="<?=home_url();?>/contacts">КОНТАКТЫ</a>
        </div>
        <div class="footer-container">
            <div class="footer-contacts">
                <div class="footer-container__header">Телефон</div><a
                    href="tel:+<?=$telephone_first?>">+<?=$telephone_first?></a><a
                    href="tel:+<?=$telephone_second?>">+<?=$telephone_second?></a>
            </div>
            <div class="footer-adresses">
                <div class="footer-container__header">Адреса</div>
                <div class="footer-adress"><?=$address?></div>
            </div>
            <a href="<?=home_url();?>/book" class="footer-button">Забронировать</a>
            <div class="footer-socials">
                <a class="social" href="https://instagram.com/<?=$instagram?>"> <img
                        src="<?php echo get_template_directory_uri() . '/assets/images/content/instagram.svg'?>"" alt="
                        instgram" /></a>
                <a class="social" href="https://vk.com/<?=$vk?>"> <img
                        src="<?php echo get_template_directory_uri() . '/assets/images/content/vk.svg'?>"" alt=" vk" />
                </a>
            </div>
        </div>
</footer>
<div class="footer-line">
    <div class="company-name">© 2022 Загородный клуб “Паровоз”</div><a class="company-developer"
        href="https://yurin.biz" target="_blank">Сделано в Студии Юрина</a>
</div>

<script src="<?php echo get_template_directory_uri() . '/assets/js/main.min.js'?>"></script>

</body>

</html>