<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die() ?>

<aside class="catalog__side" id="js-catalog-side">
    <form class="filters service-filters" id="js-filter-dealers2" method="POST">
        <input type="hidden" name="city" value="">
        <? foreach ($arResult['USER_FILTER'] as $code): ?>
            <? if ( !($prop = $arResult['PROPS'][$code]) || !$prop['VALUES'] || empty($prop['VALUES']) ) continue; ?>

            <div class="filters__unit">
                <h5 class="filters__unit-title js-accordion-head is-open"><?= $prop['NAME']?></h5>
                <div class="filters__unit-body js-accordion-body">
                    <?foreach ($prop['VALUES'] as $i => $value):?>
                        <input type="checkbox" name="<?= $prop['CODE'] ?>" value="<?= CDealersList::getValueID( $prop, $value ) ?>" id="<?= "{$code}_$i" ?>">
                        <label for="<?= "{$code}_$i" ?>"><?= CDealersList::getValue( $prop, $value ) ?></label>
                    <?endforeach;?>
                </div>
            </div>

        <? endforeach; ?>
        <div class="filters__unit-btns">
            <button class="btn btn_border btn_block btn-submit-dealer" data-page="1" data-lastpage="2" type="submit">Применить</button>
            <button class="filters__btn-clear" type="reset">Сбросить фильтр</button>
        </div>
        <!--div class="filters__unit-btns filters__unit-btnsmobile">
            <button class="btn btn_border btn_block btn-submit-dealer" type="submit">Применить</button>
            <button class="btn filters__btn-clear" type="reset">Сбросить</button>
        </div-->
        <a class="filters__tooltip js-dealers-filter-tooltip">
            <span class="filters__tooltip-wrapper">
                Подобрано <span id="js-dealers-tooltip-count"></span>
                <br>
                <strong>Показать</strong>
            </span>
        </a>
    </form>
</aside>