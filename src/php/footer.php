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
            logo" />
    </a>
    <div class="footer-column">
        <div class="footer-header">БАНИ</div>
        <a class="footer-link" href="#">Уральская</a>
        <a class="footer-link" href="#">Охотничья</a>
        <a class="footer-link" href="#">Ямская</a>
        <a class="footer-link" href="#">Рыбацкая</a>
        <a class="footer-link" href="#">Раздольная</a>
        <a class="footer-link" href="#">Семейная</a>
        <a class="footer-link" href="#">Сибирская</a>
        <a class="footer-link" href="<?=home_url();?>/bathroom">Лесная</a>
        <a class="footer-link" href="#">Хуторок</a>
    </div>
    <div class="footer-column">
        <a class="footer-header" href="<?=home_url();?>/services">УСЛУГИ</a>
        <a class="footer-link" href="<?=home_url();?>/services#vapor">Парение</a>
        <a class="footer-link" href="<?=home_url();?>/services#massage">Массаж</a>
        <a class="footer-link" href="<?=home_url();?>/services#spa">SPA - программы</a>
        <a class="footer-link" href="<?=home_url();?>/services#workers">Специалисты</a>
    </div>
    <div class="footer-column">
        <a class="footer-link--bold" href="<?=home_url();?>/cafe">КАФЕ</a>
        <a class="footer-link--bold" href="<?=home_url();?>/articles">PRO БАНЮ</a>
        <a class=" footer-link--bold" href="<?=home_url();?>/staff">ТОВАРЫ</a>
        <a class="footer-link--bold" href="<?=home_url();?>/feedback">ОТЗЫВЫ</a>
        <a class="footer-link--bold" href="<?=home_url();?>/contacts">КОНТАКТЫ</a>
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
        <a href="<?=home_url();?>/cart" class="footer-button">Забронировать</a>
        <div class="footer-socials">
            <a class="social" href="https://instagram.com/<?=$instagram?>"> <img
                    src="<?php echo get_template_directory_uri() . '/assets/images/content/instagram.svg'?>"" alt="
                    instgram" /></a>
            <a class="social" href="https://vk.com/<?=$vk?>"> <img
                    src="<?php echo get_template_directory_uri() . '/assets/images/content/vk.svg'?>"" alt=" vk" />
            </a>
            <a class="social" href="https://whatapp.com/<?=$whatapp?>"> <img
                    src="<?php echo get_template_directory_uri() . '/assets/images/content/whatApp.svg'?>"" alt="
                    whatapp" />
            </a>
        </div>
    </div>
</footer>
<div class="footer-line">
    <div class="company-name">© 2022 Загородный клуб “Паровоз”</div><a class="company-developer"
        href="https://yurin.biz" target="_blank">Сделано в Студии Юрина</a>
</div>
<div class="dark-layer js--hidden">
    <form class="form apply-form" id="applyForm">
        <div class="form-close" id="closeForm"><span class="cross-one"> </span><span class="cross-two"></span></div>
        <div class="form-header">Оставить отзыв</div>
        <div class="form-row">
            <select class="controls-section__select" id="bathTypeSelect" name="bathType">
                <option value="Ура">Уральская</option>
                <option value="Охо">Охотничья</option>
                <option value="Ямс">Ямская</option>
                <option value="Рыб">Рыбацкая</option>
                <option value="Раз">Раздольная</option>
                <option value="Сем">Семейная</option>
                <option value="Сиб">Сибирская</option>
                <option value="Лес" checked>Лесная</option>
                <option value="Хут">Хуторок</option>
            </select>
            <label for="starRating">Ваша оценка?
                <input type="text" name='starRating' id='starRatingInput' value='5'>
            </label>
        </div>
        <label for="description">Комментарий</label><br />
        <textarea id="description" tabindex="3" name="description" rows="6" class="form-textarea"></textarea>
        <label for="reviewName"> Имя
            <input class="form-input" id="reviewName" type="text" name="userName" placeholder="Ваше имя"></label>
        <button class="form-button" type="submit">Отправить</button>
    </form>
</div>
<script src="<?php echo get_stylesheet_directory_uri() . '/assets/js/jquery.min.js'?>"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() . '/assets/js/plugins.min.js'?>"></script>
<script src="<?php echo get_stylesheet_directory_uri() . '/assets/js/main.min.js'?>"></script>

</body>

</html>