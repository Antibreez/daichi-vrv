<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>

<? //dump($arResult['CITY']) ?>

<div class="page page_dealers">
    <section class="page-head">
        <h2 class="page-head__title">Дилеры</h2>
    </section>

    <section class="select-section clearfix">
        <div class="container">
            <div class="select-section__form-wrapper">
                <form action="#" class="select-form" id="select-city-form">
                    <label for="region-select" class="select-form__label">Регион:</label>
                    <div class="select-form__select">
                    <style>
                    .hovered {float: right; display: block; margin-right: -100px; color: #E6000F; text-decoration: none;}
                    .hovered:hover {text-decoration: underline}
                    </style>
			<a class="hovered" href="/notice" style="margin-top: 13px; color: #E6000F; border-bottom-width: 0;">Внимание</a>
                        <select name="PROPERTY_CITY" id="region-select" data-search="true" data-placeholder="Select an option" required class="js-city-select">
                            <?foreach ($arResult['CITY'] as $city):?>
                                <option value="<?=$city['UF_XML_ID']?>" <?if($city['UF_XML_ID'] == $arParams['CURRENT_CITY']):?>selected<?endif?>><?=$city['UF_NAME']?></option>
                            <?endforeach;?>
                        </select>
                    </div>
                </form>
                <script>
                    document.getElementById('select-city-form').reset();
                </script>
            </div>
            <div class="select-section__right">
                <div class="select-section__count-wrapper">
                    Найдено дилеров: <span class="select-section__count-text js-count-dealers"></span>
                </div>
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="container">
            <?php require '_filter.php' ?>
            <div class="catalog__main">
                <?if ($arParams['DIFFERENT_CITY']):?>
                    <p class="js-for-load-acity"><!--В вашем городе дилеров не найдено. Результаты показаны для города: <?= $arParams['DIFFERENT_CITY'];?>--></p>
                <?else:?>
                    <p class="js-for-load-acity"></p>
                <?endif;?>
                <div class="catalog__col"  id="js-for-load-list-dealers">
                    <?php require '_list.php' ?>
                </div>

                <div style="display: <?=(($arResult['RESTRICTED']) ? 'block' : 'none')?>" id="dealers-no-results-restrict" class="cat-noresults">
                    <img src="<?=SITE_TEMPLATE_PATH?>/build/img/svg/search_gradient.svg" class="cat-noresults__image" alt="Ничего не найдено">
                    <div class="cat-noresults__change"><a href="<?= $arResult['RESTRICTED']['UF_LINK'];?>" target="_blank"><?= $arResult['RESTRICTED']['UF_TEXT'];?></a></div>
                </div>

                <div class="content-more prod-tab__more" id="nav-load-more">
                    <?php require '_show_more.php' ?>
                </div>
            </div>
        </div>
    </section>
</div>


<script>
    $(function () {
        $('.js-count-dealers').text('<?=$arResult['COUNT']?>');
    })
</script>