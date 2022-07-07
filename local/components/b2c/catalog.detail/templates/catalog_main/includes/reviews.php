<div class="prod-tab product__tabs-item js-tabs-item" id="reviews">
    <a class="prod-tab__spoiler-btn js-prod-tab-spoiler" role="button">Отзывы <span><?=$arResult['PROPERTIES']['COUNT_REVIEW']?></span></a>

    <div class="prod-tab__spoiler-content js-spoiler-body">

        <aside class="prod-tab__side for-prod-reviews">
            <div class="prod-tab__rate-count">
                <?if(count($arResult['REVIEWS']['LIST']) > 0):?>
                    <a class="btn prod-tab__add-review js-add-review" role="button">Написать отзыв</a>
                <?endif;?>

                <div class="rate-count">
                    <div class="rate-count__total">
                        <div class="rate-count__total-digit"><?= (int) $arResult['PROPERTIES']['RATING_REVIEW']["VALUE"]?></div>
                        <div class="rate-count__total-stars"><div class="rate <?=getAssocClassByRate($arResult['PROPERTIES']['RATING_REVIEW']["VALUE"])?>"></div></div>
                    </div>
                    <div class="rate-count__note">
                        по <?if($arResult['PROPERTIES']['COUNT_REVIEW'] == 1):?>отзыву<?else:?>отзывам<?endif;?>
                        <?=$arResult['PROPERTIES']['COUNT_REVIEW']?>
                        <?=getWordDeclination($arResult['PROPERTIES']['COUNT_REVIEW'], ['человека', 'человек', 'человек'])?>
                    </div>
                    <ul class="rate-count__list">
                        <?foreach (getAssocClassByRate() as $key => $class):?>
                            <li class="rate-count__line <?if($arResult['REVIEWS']['COUNT'][$key]['C'] == 0):?>is-empty<?endif;?>">
                                <div class="rate-count__line-rate"><div class="rate rate_gray <?=$class?>"></div></div>
                                <div class="rate-count__line-pers"><?=(int)$arResult['REVIEWS']['COUNT'][$key]['P']?>%</div>
                                <div class="rate-count__line-note">
                                    <?if($arResult['REVIEWS']['COUNT'][$key]['C'] > 0):?>
                                        <?=$arResult['REVIEWS']['COUNT'][$key]['C']?> <?=getWordDeclination($arResult['REVIEWS']['COUNT'][$key], ['отзыв', 'отзыва', 'отзывов'])?>
                                    <?else:?>
                                        нет отзывов
                                    <?endif;?>
                                </div>
                            </li>
                        <?endforeach;?>
                    </ul>
                </div>
            </div>
        </aside><!-- END prod-tab__side -->

        <div class="prod-tab__main for-prod-reviews">
            <h2 class="prod-tab__title">Отзывы о товаре <?= ucfirst($arResult["PROPERTIES"]["BRAND"]["VALUE"]) . ' ' . $arResult["NAME"];?> <span><?=$arResult['PROPERTIES']['COUNT_REVIEW']?></span></h2>

            <?if(count($arResult['REVIEWS']['LIST']) > 0): //Смотрим именно на эту переменную, т.к. выводится количество отзывов с коментарием, а COUNT_REVIEW это общее количество отзывов?>
                <div class="sorting prod-tab__head prod-tab__head_reviews">
                    <div class="sorting__item">
                        <h4 class="sorting__title">Сортировать:</h4>
                        <div class="sorting__by js-sorting-list">
                            <div class="sorting__by-list js-reviews-sort-list">
                                <div class="sorting__by-item is-active">
                                    <a class="sorting__by-btn js-reviews-sort" role="button" data-order-key="created_date">
                                        <span>По дате</span>
                                        <i class="sorting__icon icon-az"></i>
                                        <!-- <i class="sorting__icon"></i> -->
                                    </a>
                                </div>

                                <div class="sorting__by-item">
                                    <a class="sorting__by-btn js-reviews-sort" role="button" data-order-key="propertysort_GRADE">
                                        <span>По рейтингу</span>
                                        <i class="sorting__icon icon-za"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="sorting__arrow js-dropdown-btn"></div>
                        </div>
                    </div>
                </div>

                <div class="prod-tab__reviews js-for-load-reviews">
                    <?$APPLICATION->IncludeFile($templateFolder . '/includes/reviews-list.php', ['arResult' => $arResult])?>
                </div><!-- END prod-tab__reviews -->
            <?else:?>
                <div class="review prod-tab__review review_no-review">
                    <div class="review__text">
                        <h4 class="review__title">Отзывов ещё нет - ваш может стать первым!</h4>
                        <a class="btn prod-tab__add-review js-add-review" role="button">Написать отзыв</a>
                    </div>
                </div>
            <?endif;?>
        </div><!-- END prod-tab__main -->

    </div><!-- END prod-tab__spoiler-content -->
</div><!-- END product__tabs-item #prod_reviews -->