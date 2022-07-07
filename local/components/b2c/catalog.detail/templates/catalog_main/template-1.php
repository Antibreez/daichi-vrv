<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<main class="page product" id="<?= \Daichi\Tools::initEditLink($this, $arResult, "Редактировать товар") ?>">
    <div id="good-info" data-code="<?=$arResult['CODE']?>"></div>

    <?$APPLICATION->IncludeFile($templateFolder . '/includes/breadcrumbs.php', ['arResult' => $arResult])?>

    <section class="prod-desc product__head">
        <div class="container">
            <?$APPLICATION->IncludeFile($templateFolder . '/includes/head-left.php', ['arResult' => $arResult])?>

            <?$APPLICATION->IncludeFile($templateFolder . '/includes/head-right-1.php', ['arResult' => $arResult, 'templateFolder' => $templateFolder])?>
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

                var t = $('.product__tabs-body #'+tab_name+' .js-prod-tab-spoiler');
                if (t.length > 0) {
                    o = t.siblings(".js-spoiler-body");
                    t.hasClass("is-active") ? (t.removeClass("is-active"), o.slideUp(600)) : (t.addClass("is-active"), o.slideDown(600)/*, setTimeout(e, 100)*/), $("html, body").animate({
                        scrollTop: t.offset().top
                    }, 600);
                }
            }
        });
    </script>
    <section class="product__tabs">
        <div class="container">
            <?$featuresImages = \PropertyPicture::getImages($arResult["PROPERTIES"]['BRAND']['UF_XML_ID'], $arResult["PROPERTIES"], function ($prop, $key){ return $prop[$key]["VALUE"];})?>

            <nav class="product__tabs-head js-prod-tabs" id="prod-tabs-nav">
                <a id="offers-link" class="product__tabs-btn js-tabs-link js-prod-offers-desktop is-active" data-tab="offers" role="button">Предложения <span><?=$arResult['OFFERS']['COUNT']?></span></a>
                <a id="where-to-buy-link" style="display: none;" class="product__tabs-btn js-tabs-link is-active" data-tab="dealers" role="button">Где купить <span class="js-count-dealers"></span></a>
                <a class="product__tabs-btn js-tabs-link js-all-props-desktop" data-tab="props" role="button">Характеристики</a>
                <?if (!empty($featuresImages)):?>
                    <a class="product__tabs-btn js-tabs-link js-all-features-desktop" data-tab="features" role="button" id="all-features">Особенности</a>
                <?endif;?>
                <?if (count($arResult["RELATIONS"]) > 0):?>
                    <a class="product__tabs-btn js-tabs-link" data-tab="option" role="button">Опции <span><?=count($arResult["RELATIONS"])?></a>
                <?endif;?>
                <a class="product__tabs-btn js-tabs-link" data-tab="reviews"  data-tab="reviews" role="button">Отзывы <span><?=$arResult['PROPERTIES']['COUNT_REVIEW']?></span></a>
                <a class="product__tabs-btn js-tabs-link" data-tab="similar" role="button">Похожие модели <span></span></a>
                <?if(count($arResult['PROPERTIES']['DOCUMENTS']) > 0):?>
                    <a class="product__tabs-btn js-tabs-link" data-tab="manual"  role="button">Документация</a>
                <?endif;?>
                <?if ($arResult["COUNT_POSTING"] > 0):?>
                    <a class="product__tabs-btn js-tabs-link" data-tab="posting" role="button">Статьи и обзоры <span><?=$arResult["COUNT_POSTING"]?></span></a>
                <?endif;?>
            </nav><!-- END product__tabs-head -->

            <div class="product__tabs-body js-tabs-body">

                <?$APPLICATION->IncludeFile($templateFolder . '/includes/offers-1.php', ['arResult' => $arResult, 'templateFolder' => $templateFolder])?>

                <?$APPLICATION->IncludeFile($templateFolder . '/includes/props.php', ['arResult' => $arResult])?>

                <?$APPLICATION->IncludeFile($templateFolder . '/includes/features.php', ['images' => $featuresImages])?>

                <?$APPLICATION->IncludeFile($templateFolder . '/includes/reviews.php', ['arResult' => $arResult, 'templateFolder' => $templateFolder])?>

                <div class="prod-tab product__tabs-item js-tabs-item" id="similar">
                    <a class="prod-tab__spoiler-btn js-prod-tab-spoiler" role="button">Похожие товары <span>4</span></a>
                    <div class="prod-tab__spoiler-content js-spoiler-body">
                        <?$APPLICATION->IncludeFile($templateFolder . '/includes/similar.php', ['arResult' => $arResult])?>
                    </div><!-- END prod-tab__spoiler-content -->
                </div><!-- END product__tabs-item #similar -->

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

    <?$APPLICATION->IncludeComponent('b2c:watched', '',['CODE' => $_GET['GOOD_CODE']])?>

</main><!-- END page -->

<?$APPLICATION->IncludeFile($templateFolder . '/includes/reviews-add.php', ['arResult' => $arResult])?>

