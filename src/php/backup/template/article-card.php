<?php
$article = get_post();
$article_bg = get_field('article_bg');
?>

<a class="article-card" href="<?=get_post_permalink();?>" style=" background: linear-gradient( 360deg, rgba(26, 47, 68, 0.9) 0%, rgba(26, 47, 68, 0) 100%),
        url(<?=$article_bg?>)">
    <div class="article-card__header"><?=get_the_title(); ?></div>
    <div class="article-card__data article-card__data--white"><?=get_the_date("d M Y"); ?></div>
</a>