<?foreach ($arResult['REVIEWS']['LIST'] as $review):?>
    <div class="review prod-tab__review is-hidden">
        <div class="review__info">
            <div class="review__rate rate <?=getAssocClassByRate($review['PROPERTY_GRADE_XML_ID'])?>"></div>
            <h4 class="review__title review__title_mobile"><?=$review['PROPERTY_GRADE_VALUE']?></h4>

            <div class="review__name"><?=$review['NAME']?></div>
            <div class="review__city"><?=$review['PROPERTY_PLACE_VALUE']?></div>
            <?if($review['PROPERTY_EXPERIENCE_VALUE']):?>
                <div class="review__time">Опыт использования: <br><?=$review['PROPERTY_EXPERIENCE_VALUE']?></div>
            <?endif;?>
            <div class="review__date"><?=$review["DATE"]?></div>
        </div>
        <div class="review__text">
            <h4 class="review__title"><?=$review['PROPERTY_GRADE_VALUE']?></h4>
            <div class="review__note"><?=$review['PROPERTY_COMMENT_VALUE']?></div>

            <?if($review['PROPERTY_EXPERIENCE_VALUE']):?>
                <div class="review__time review__time_mobile">Опыт использования: <br><?=$review['PROPERTY_EXPERIENCE_VALUE']?></div>
            <?endif;?>
        </div>
    </div><!-- END review -->
<?endforeach;?>