<?if (count($arResult['SIMILAR_PRODUCTS']['SIMILAR_BRAND']) > 0):?>
    <h2 class="prod-tab__title">Похожие модели <?= ucfirst($arResult['PROPERTIES']['BRAND']['VALUE']);?></h2>
<?endif;?>

<div class="prod-tab__cards js-similar-mob-slider" id="js-similar-mob-slider">
    <?foreach ($arResult['SIMILAR_PRODUCTS']['SIMILAR_BRAND'] as $product):?>
        <? $group = current($product['PROPERTIES']['ATTR_L_GOODGROUP']['VALUE']); ?>
        <div class="prod-tab__card">
            <div class="prod-card for-catalog">
                <ul class="prod-card__top">
                    <li class="prod-card__top-item">
                        <a class="prod-card__top-btn prod-card__top-btn_comp js-btn-сompare <?=(StashedProducts::checkCompare($product['CODE'], $group)?'is-compared':'')?>" role="button" data-code="<?=$product['CODE']?>" data-group="<?=$group?>" data-action="<?=(StashedProducts::checkCompare($product['CODE'], $group)?'remove':'add')?>">i</a>
                    </li>
                    <li class="prod-card__top-item">
                        <a data-code="<?=$product['CODE']?>" data-action="<?=(StashedProducts::checkWishlist($product['CODE'])?'remove':'add')?>" class="prod-card__top-btn prod-card__top-btn_like js-btn-like <?= StashedProducts::checkWishlist($product['CODE']) ? 'is-liked' : '';?>" role="button">i</a>
                    </li>
                </ul>
                <div class="prod-card__pict">
                    <img class="prod-card__img" src="<?= CFile::GetPath($product['PROPERTIES']['PHOTOES']['VALUE'][0]);?>" alt="<?= ucfirst($product['PROPERTIES']['BRAND']['VALUE']) . ' ' . $product['NAME'];?>">
                </div>
                <div class="prod-card__text">
                    <div class="prod-card__rate rate <?=getAssocClassByRate($product['PROPERTY_RATING_REVIEW_VALUE'])?>"></div>
                    <div class="prod-card__type"><?= $product['PROPERTIES']['ATTR_L_GOODGROUP']['VALUE'][0];?></div>
                    <div class="prod-card__name"><?= ucfirst($product['PROPERTIES']['BRAND']['VALUE']) . ' ' . $product['NAME'];?></div>
                    <div class="prod-card__price"><?= ((int) $product['PROPERTIES']["MIN_PRICE_BY_OFFERS"]['VALUE'] > 0) ? 'От ' . getPriceFormat($product['PROPERTIES']["MIN_PRICE_BY_OFFERS"]['VALUE']) . '<i class="icon-rub">a</i>': '';?> </div>
                </div>
                <div class="prod-card__more">
                    <div class="prod-card__status">
                        <div class="prod-card__comment"><?=(int)$product['PROPERTIES']['COUNT_REVIEW']['VALUE'];?> <?=getWordDeclination((int)$product['PROPERTIES']['COUNT_REVIEW']['VALUE'], ['Отзыв', 'Отзыва', 'Отзывов'])?></div>
                        <div class="prod-card__rate rate <?=getAssocClassByRate($product['PROPERTIES']['RATING_REVIEW']['VALUE'])?>"></div>
                    </div>
                    <ul class="features-line prod-card__icons">
                        <?$images = \PropertyPicture::getImages($product['PROPERTIES']['BRAND']['VALUE'], $product, function ($prop, $key){ return $prop["PROPERTIES"][$key]["VALUE"];})?>
                        <?foreach ($images as $img):?>
                            <li class="features-line__item"><img src="<?=$img['IMAGE']?>"></li>
                        <?endforeach;?>
                    </ul>
                    <a class="prod-card__btn btn btn_block" href="<?= $product["DETAIL_PAGE_URL"]?>?show=offers">Где купить</a>
                </div>
                <a class="prod-card__link" href="<?= $product["DETAIL_PAGE_URL"]?>" title="<?= ucfirst($product['PROPERTIES']['BRAND']['VALUE']) . ' ' . $product['NAME'];?>"></a>
            </div><!-- END prod-card -->
        </div><!-- END prod-tab__card -->
    <?endforeach;?>
</div><!-- END prod-tab__cards -->

<?if (count($arResult['SIMILAR_PRODUCTS']['DIFFERENT_BRAND']) > 0):?>
    <h2 class="prod-tab__title">Похожие модели других брендов</h2>
<?endif;?>
<div class="prod-tab__cards js-similar-mob-slider">
    <?foreach ($arResult['SIMILAR_PRODUCTS']['DIFFERENT_BRAND'] as $product):?>
        <? $group = current($product['PROPERTIES']['ATTR_L_GOODGROUP']['VALUE']); ?>
        <div class="prod-tab__card">
            <div class="prod-card for-catalog">
                <ul class="prod-card__top">
                    <li class="prod-card__top-item">
                        <a class="prod-card__top-btn prod-card__top-btn_comp js-btn-сompare <?=(StashedProducts::checkCompare($product['CODE'], $group)?'is-compared':'')?>" role="button" data-code="<?=$product['CODE']?>" data-group="<?=$group?>" data-action="<?=(StashedProducts::checkCompare($product['CODE'], $group)?'remove':'add')?>">i</a>
                    </li>
                    <li class="prod-card__top-item">
                        <a data-code="<?=$product['CODE']?>" data-action="<?=(StashedProducts::checkWishlist($product['CODE'])?'remove':'add')?>" class="prod-card__top-btn prod-card__top-btn_like js-btn-like <?= StashedProducts::checkWishlist($product['CODE']) ? 'is-liked' : '';?>" role="button">i</a>
                    </li>
                </ul>
                <div class="prod-card__pict">
                    <img class="prod-card__img" src="<?= CFile::GetPath($product['PROPERTIES']['PHOTOES']['VALUE'][0]);?>" alt="<?= ucfirst($product['PROPERTIES']['BRAND']['VALUE']) . ' ' . $product['NAME'];?>">
                </div>
                <div class="prod-card__text">
                    <div class="prod-card__rate rate <?=getAssocClassByRate($product['PROPERTY_RATING_REVIEW_VALUE'])?>"></div>
                    <div class="prod-card__type"><?= $product['PROPERTIES']['ATTR_L_GOODGROUP']['VALUE'][0];?></div>
                    <div class="prod-card__name"><?= ucfirst($product['PROPERTIES']['BRAND']['VALUE']) . ' ' . $product['NAME'];?></div>
                    <div class="prod-card__price"><?= ((int) $product['PROPERTIES']["MIN_PRICE_BY_OFFERS"]['VALUE'] > 0) ? 'От ' . getPriceFormat($product['PROPERTIES']["MIN_PRICE_BY_OFFERS"]['VALUE']) . '<i class="icon-rub">a</i>': '';?> </div>
                </div>
                <div class="prod-card__more">
                    <div class="prod-card__status">
                        <div class="prod-card__comment"><?=(int)$product['PROPERTIES']['COUNT_REVIEW']['VALUE'];?> <?=getWordDeclination((int)$product['PROPERTIES']['COUNT_REVIEW']['VALUE'], ['Отзыв', 'Отзыва', 'Отзывов'])?></div>
                        <div class="prod-card__rate rate <?=getAssocClassByRate($product['PROPERTIES']['RATING_REVIEW']['VALUE'])?>"></div>
                    </div>
                    <ul class="features-line prod-card__icons">
                        <?$images = \PropertyPicture::getImages($product['PROPERTIES']['BRAND']['VALUE'], $product, function ($prop, $key){ return $prop["PROPERTIES"][$key]["VALUE"];})?>
                        <?foreach ($images as $img):?>
                            <li class="features-line__item"><img src="<?=$img['IMAGE']?>"></li>
                        <?endforeach;?>
                    </ul>
                    <a class="prod-card__btn btn btn_block" href="<?= $product["DETAIL_PAGE_URL"]?>?show=offers">Где купить</a>
                </div>
                <a class="prod-card__link" href="<?= $product["DETAIL_PAGE_URL"]?>" title="<?= ucfirst($product['PROPERTIES']['BRAND']['VALUE']) . ' ' . $product['NAME'];?>"></a>
            </div><!-- END prod-card -->
        </div><!-- END prod-tab__card -->
    <?endforeach;?>
</div><!-- END prod-tab__cards -->
