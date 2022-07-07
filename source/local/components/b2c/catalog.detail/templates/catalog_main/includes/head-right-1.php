<div class="prod-desc__rt">
    <form class="prod-desc__form js-product-select">
        <script>
            $(document).on('click', '.js-all-offers', function () {
                $('#where-to-buy-link').hide();
                $('#offers-link').show();
                $('#show-offers-link').click();
                $('html, body').animate({
                    scrollTop: $("#prod_offers").offset().top
                }, 500);
            });
        </script>
        <?$APPLICATION->IncludeFile($templateFolder . '/includes/head-right-select.php', ['arResult' => $arResult])?>
        <?
            foreach ($arResult['OFFERS']['LIST'] as $offer) {
                if($offer->fields['UF_DEALER_ID'] == 'L569') {
                    $shop_url  = $offer->fields['UF_URL'].'/?utm_source=daichi.ru';
                }
            }
        ?>

        <?if ((int) $arResult['MIN_PRICE_BY_OFFERS'] > 0):?>
            <div class="prod-desc__price">
                <?if (isset($shop_url)) {?>
                <a target="_blank" href="<?=$shop_url?>" style="width: 50%; float: right; position: relative;" class="row-item__btn btn btn_block m0 js-dealer-popup_show">Купить онлайн</a>
                <?}?>
                от <span><?= getPriceFormat($arResult['MIN_PRICE_BY_OFFERS'])?></span> <i class="icon-rub">a</i></div>
        <?else:?>
            <div class="prod-desc__price">
                <?if (isset($shop_url)) {?>
                    <a href="<?=$shop_url?>" style="width: 50%; position: relative;" class="row-item__btn btn btn_block m0 js-dealer-popup_show">Купить онлайн</a>
                <?}?>
            </div>
        <?endif;?>
        <div class="prod-desc__offer">
            <span class="btn prod-desc__offer-all js-all-offers">Все предложения <span><?=$arResult['OFFERS']['COUNT']?></span></span>
            <?$group = $arResult['PROPERTIES']['ATTR_L_GOODGROUP']['VALUE'];?>
            <a class="prod-desc__btn" id="catalog-detail-to-wishlist" role="button" data-code="<?=$arResult['CODE']?>" data-action="<?=(StashedProducts::checkWishlist($arResult['CODE'])?'remove':'add')?>"><i class="icon-reserve"></i><span id="catalog-detail-stash-button-1">Отложить</span></a>
            <a class="prod-desc__btn" id="catalog-detail-to-compare" role="button" data-group="<?=$group?>" data-code="<?=$arResult['CODE']?>" data-action="<?=(StashedProducts::checkCompare($item['CODE'], $group)?'remove':'add')?>"><i class="icon-compare"></i>Сравнить</a>
        </div>

    </form>
    <div class="prod-desc__features">
        <ul class="features-list features-list_for-product prod-desc__features-list">
            <?$images = \PropertyPicture::getImages($arResult["PROPERTIES"]['BRAND']['UF_XML_ID'], $arResult["PROPERTIES"], function ($prop, $key){ return $prop[$key]["VALUE"];}, true)?>
            <?foreach ($images as $key => $img):?>
                <?if ($key > 5):?>
                    <?break;?>
                <?endif;?>
                <li class="features-list__item">
                    <img src="<?=$img['IMAGE']?>" alt="" class="features-list__icon-img">
                    <span class="features-list__title"><?=$img['NAME']?></span>
                    <p class="features-list__hint"><?=$img['TEXT']?></p>
                </li>
            <?endforeach;?>
        </ul>
        <span class="btn btn_link prod-desc__features-more js-all-features" role="button">Все особенности</span>
    </div>
</div><!-- END prod-desc__rt -->
