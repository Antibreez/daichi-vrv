<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="prod-tab product__tabs-item js-tabs-item" id="option">
    <? foreach ($relations as $option) : ?>
    <div style="text-align: center; display: inline-block;">
        <a href="<?= $option["DETAIL_PAGE_URL"] ?>" style="border: 0;">
            <img src="<?= CFile::GetPath($option["PROPERTY_PHOTOES_VALUE"]) ?>" style="width: 200px; height: auto;">
            <br />
            <?= $option["NAME"] ?>
        </a>
    </div>
    <? endforeach; ?>
</div>