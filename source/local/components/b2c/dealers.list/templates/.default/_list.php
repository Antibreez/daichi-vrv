<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die() ?>

<div id="dealers-no-results" style="display: none;" class="cat-noresults">
    <img src="<?=SITE_TEMPLATE_PATH?>/build/img/svg/search_gradient.svg" class="cat-noresults__image" alt="Ничего не найдено">
    <h3 class="cat-noresults__title">Нет подходящих дилеров</h3>
    <div class="cat-noresults__change">Попробуйте изменить условия поиска.</div>
    <div class="cat-noresults__reset">
        <a class="btn btn_border btn_block" href="<?= $_SERVER['REQUEST_URI'];?>">Сбросить фильтры</a>
    </div>
</div>

<?php foreach ($arResult['ITEMS'] as $shop) require '_item.php' ?>