<?php 
$staff_price = get_field("staff_price");
$staff_name = get_field("staff_name");
$staff_bg = get_field("staff_bg");
?>
<a href="<?=home_url();?>/product/single-product/" class="container-card"
    style="background: linear-gradient( 360deg, rgba(26, 47, 68, 0.9) 0%, rgba(26, 47, 68, 0) 100%), url(<?=$staff_bg?>)">
    <div class="container-card__name"><?=$staff_name?></div>
    <div class="container-card__price"><?=$staff_price?> ₽</div>
</a>