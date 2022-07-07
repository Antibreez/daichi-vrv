
<div class="prod-desc__rt">
    <form class="prod-desc__form js-product-select">
        <?$APPLICATION->IncludeFile($templateFolder . '/includes/head-right-select.php', ['arResult' => $arResult])?>

        <?
        foreach ($arResult['OFFERS']['LIST'] as $offer) {
            if($offer->fields['UF_DEALER_ID'] == 'L569') {
                $shop_url  = $offer->fields['UF_URL'].'/?utm_source=daichi.ru';
            }
        }
        ?>


        <?if (isset($shop_url)) {?>
            <div style="position: relative; width: 50%; margin-bottom: 10px;">
                <a target="_blank" href="<?=$shop_url?>" style="position: relative; width: 100%;" class="row-item__btn btn btn_block m0 js-dealer-popup_show">Купить онлайн</a>
            </div>
        <?}?>


        <div class="prod-desc__offer">
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
        <?if (!empty($featuresImages)):?>
            <span class="btn btn_link prod-desc__features-more js-all-features" role="button">Все особенности</span>
        <?endif;?>
    </div>
</div><!-- END prod-desc__rt -->
