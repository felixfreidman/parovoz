<div class="feedback-item">
    <div class="feedback-item__info">
        <div class="feedback-item__name"><?=get_the_title(); ?></div>
        <div class="feedback-item__date"><?=get_the_date("d M Y"); ?></div>
        <div class="feedback-item__rating"><svg aria-hidden="true" focusable="false">
                <use href="#stars-full-star"></use>
                <use href="#stars-full-star"></use>
                <use href="#stars-full-star"></use>
                <use href="#stars-full-star"></use>
                <use href="#stars-empty-star"></use>
            </svg>
            <div class="amount">4</div>
        </div>
    </div>
    <div class="feedback-item__content"><?php the_content(); ?> </div>
</div>