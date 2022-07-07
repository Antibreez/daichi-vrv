<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die() ?>

<?if( (int) $arResult['COUNT'] > 10 && (int) $arResult['LAST_COUNT'] > 0 ):?>
        <a class="content-more__btn js-load-dealers2" role="button" data-page="<?= $arResult['PAGE'] + 1 ?>" data-lastpage="<?= $arResult['LAST_PAGE'] ?>" data-offset="10" data-count-all="<?=$arResult['COUNT']?>">
            <i class="content-more__icon"></i>
            <span class="content-more__text" data-text="Показать еще <?=$arResult['LAST_COUNT']?> <?=getWordDeclination(($arResult['LAST_COUNT']), ['дилер', 'дилера', 'дилеров'])?>">Показать еще <?=($arResult['LAST_COUNT'])?> <?=getWordDeclination(($arResult['LAST_COUNT']), ['дилер', 'дилера', 'дилеров'])?></span>
        </a>
<?endif;?>

<script>
    $(document).ready(function () {
        var summary = <?=$arResult['COUNT'] - 10?>;
        var count = summary;
        $('.js-load-dealers2').on('click', function () {
            count = count - 10;
            //console.log(count);
            if (count > 0) $('.content-more__text').text("Показать еще " + count + "<?=getWordDeclination(($arResult['COUNT'] - 10), ['дилер', 'дилера', 'дилеров'])?>");
            else $('.prod-tab__more').attr('style', 'display: none;');
        });
    });
</script>
