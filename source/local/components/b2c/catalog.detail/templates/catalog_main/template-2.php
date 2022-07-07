<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<main class="page product" id="<?= \Daichi\Tools::initEditLink($this, $arResult, "Редактировать товар") ?>">
    <div id="good-info" data-code="<?=$arResult['CODE']?>"></div>

    <?$APPLICATION->IncludeFile($templateFolder . '/includes/breadcrumbs.php', ['arResult' => $arResult])?>

    <section class="prod-desc product__head">
        <div class="container">
            <?$APPLICATION->IncludeFile($templateFolder . '/includes/head-left.php', ['arResult' => $arResult])?>

            <?$APPLICATION->IncludeFile($templateFolder . '/includes/head-right-2.php', ['arResult' => $arResult, 'templateFolder' => $templateFolder, 'featuresImages' => $featuresImages])?>
        </div><!-- END container -->
    </section><!-- END product__head -->

    <script>
    $(document).ready(function(){
        var url = new URL(document.location.href);
        var tab_name = url.hash.replace('#', '');
        if (tab_name != '') {
            $('.product__tabs-btn').removeClass("is-active");
            $('.product__tabs-item').removeClass("is-active");
            $('[data-tab='+tab_name+']').addClass("is-active");
            $('.product__tabs-body #'+tab_name).addClass("is-active");
        }
    });
    </script>
    <a name="posting"></a>
    <section class="product__tabs">
        <div class="container">
            <nav class="product__tabs-head js-prod-tabs" id="prod-tabs-nav">
                <a class="product__tabs-btn js-tabs-link is-active" data-tab="dealers" role="button">Где купить <span class="js-count-dealers"></span></a>
                <a class="product__tabs-btn js-tabs-link js-all-props-desktop" data-tab="props" role="button">Характеристики</a>
                <?$featuresImages = \PropertyPicture::getImages($arResult["PROPERTIES"]['BRAND']['UF_XML_ID'], $arResult["PROPERTIES"], function ($prop, $key){ return $prop[$key]["VALUE"];})?>
                <?if (!empty($featuresImages)):?>
                    <a class="product__tabs-btn js-tabs-link js-all-features-desktop" data-tab="features" role="button" id="all-features">Особенности</a>
                <?endif;?>
                <?if (count($arResult["RELATIONS"]) > 0):?>
                    <a class="product__tabs-btn js-tabs-link" data-tab="option" role="button">Опции <span><?=count($arResult["RELATIONS"])?></a>
                <?endif;?>
                <a class="product__tabs-btn js-tabs-link" data-tab="reviews" role="button">Отзывы <span><?=$arResult['PROPERTIES']['COUNT_REVIEW']?></span></a>
                <?if(count($arResult['PROPERTIES']['DOCUMENTS']) > 0):?>
                    <a class="product__tabs-btn js-tabs-link" data-tab="manual"  role="button">Документация</a>
                <?endif;?>
                <?if ($arResult["COUNT_POSTING"] > 0):?>
                    <a class="product__tabs-btn js-tabs-link" data-tab="posting" role="button">Статьи и обзоры <span><?=$arResult["COUNT_POSTING"]?></span></a>
                <?endif;?>
            </nav><!-- END product__tabs-head -->

            <div class="product__tabs-body js-tabs-body">
                <?$APPLICATION->IncludeFile($templateFolder . '/includes/offers-2.php', ['arResult' => $arResult, 'templateFolder' => $templateFolder])?>

                <?$APPLICATION->IncludeFile($templateFolder . '/includes/props.php', ['arResult' => $arResult])?>

                <?$APPLICATION->IncludeFile($templateFolder . '/includes/reviews.php', ['arResult' => $arResult, 'templateFolder' => $templateFolder])?>

                <?$APPLICATION->IncludeFile($templateFolder . '/includes/features.php', ['images' => $featuresImages])?>


                <?if(count($arResult['PROPERTIES']['DOCUMENTS']) > 0):?>
                    <?$APPLICATION->IncludeFile($templateFolder . '/includes/manual.php', ['arResult' => $arResult])?>
                <?endif;?>

                <?if ($arResult["COUNT_POSTING"] > 0):?>
                    <?$APPLICATION->IncludeFile($templateFolder . '/includes/posting.php', ['arResult' => $arResult])?>
                <?endif;?>

                <?if(count($arResult["RELATIONS"]) > 0):?>
                    <?$APPLICATION->IncludeFile($templateFolder . '/includes/relations.php', ['relations' => $arResult["RELATIONS"]])?>
                <?endif;?>

            </div><!-- END product__tabs-body -->
        </div><!-- END container -->
    </section><!-- END product__tabs -->

    <?$APPLICATION->IncludeComponent('b2c:articles.list', 'mini', ['RAND' => true, 'PAGE_COUNT' => 3])?>

    <?$APPLICATION->IncludeComponent('b2c:watched', '', ['CODE' => $_GET['GOOD_CODE']])?>

</main><!-- END page -->

<?$APPLICATION->IncludeFile($templateFolder . '/includes/reviews-add.php', ['arResult' => $arResult])?>