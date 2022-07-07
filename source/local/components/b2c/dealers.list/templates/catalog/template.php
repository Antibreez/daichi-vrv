<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>

<? //dump($arResult['CITY']) ?>

<?php require '_filter.php' ?>
<div class="catalog__main">
    <?if ($arParams['DIFFERENT_CITY']):?>
        <p class="js-for-load-acity">В вашем городе дилеров не найдено. Результаты показаны для города: <?= $arParams['DIFFERENT_CITY'];?></p>
    <?else:?>
        <p class="js-for-load-acity"></p>
    <?endif;?>
    <div class="catalog__col"  id="js-for-load-list-dealers">
        <?php require '_list.php' ?>
    </div>

    <div class="content-more prod-tab__more" id="nav-load-more">
        <?php require '_show_more.php' ?>
    </div>
</div>


<script>
    $(function () {
        $('.js-count-dealers').text('<?=$arResult['COUNT']?>');
    })
</script>