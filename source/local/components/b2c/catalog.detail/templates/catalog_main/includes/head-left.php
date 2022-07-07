<div class="prod-desc__lt">
    <div class="prod-desc__head">
        <div class="prod-desc__type"><?= join(',', $arResult["PROPERTIES"]["ATTR_L_GOODTYPE"]["VALUE"]);?></div>
        <h1 class="prod-desc__title">
            <span class="prod-desc__title-name"><?= ucfirst($arResult["PROPERTIES"]["BRAND"]["VALUE"]) . ' ' . $arResult["NAME"];?></span>
            <a class="prod-desc__title-note js-reviews-tab_show" role="button"><?=$arResult['PROPERTIES']['COUNT_REVIEW']?> <?=getWordDeclination($arResult['PROPERTIES']['COUNT_REVIEW'], ['Отзыв', 'Отзыва', 'Отзывов'])?></a>
            <span class="prod-desc__title-rate rate <?=getAssocClassByRate($arResult['PROPERTIES']['RATING_REVIEW']["VALUE"])?>"></span>
        </h1>
    </div>
    <div class="prod-desc__pict">
        <div class="prod-desc__thumbs" id="prod-thumbs">
            <?foreach ($arResult["PROPERTIES"]["PHOTOES"]["VALUE"] as $image):?>
                <div class="prod-desc__thumbs-item">
                    <img class="prod-desc__thumbs-img" src="<?= $image;?>" alt="<?= ucfirst($arResult["PROPERTIES"]["BRAND"]["VALUE"]);?>">
                </div>
            <?endforeach;?>
        </div>
        <div class="prod-desc__imgs" id="prod-imgs">
            <?foreach ($arResult["PROPERTIES"]["PHOTOES"]["VALUE"] as $image):?>
                <div class="prod-desc__imgs-item">
                    <img class="prod-desc__imgs-img" src="<?= $image;?>" alt="<?= ucfirst($arResult["PROPERTIES"]["BRAND"]["VALUE"]);?>">
                </div>
            <?endforeach;?>
        </div>
    </div>
</div><!-- END prod-desc__lt -->