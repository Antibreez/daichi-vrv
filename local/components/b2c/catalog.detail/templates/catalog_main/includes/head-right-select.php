<div class="prod-desc__params">
    <div class="prod-desc__params-blocks">
        <?if(count($arResult['SERIES_VALUES']['GENERAL']['VALUES']) > 0):?>
            <div class="prod-desc__params-item">
                <div class="prod-desc__params-title"><?=htmlspecialcharsback($arResult['SERIES_VALUES']['GENERAL']['NAME'])?></div>
                <select class="prod-desc__params-select">

                    <?foreach ($arResult['SERIES_VALUES']['GENERAL']['VALUES'] as $general):?>
                        <option data-link="/catalog/<?=$_GET['CODE']?>/<?=$general['CODE']?>/" <?=(($arResult['SERIES_VALUES']['GENERAL_VALUE'] == $general['VALUE'])?'selected':'')?>>
                            <?= \Daichi\Tools::getNumber( $general['VALUE'] ) ?>
                        </option>
                    <?endforeach;?>

                </select>
            </div>
            <?if (isset($_REQUEST['test'])) {?>
                <!--div style="vertical-align: bottom; position: relative; width: 50%; display: inline-block; margin-bottom: 16px; padding-left: 10px;">
                    <a style="width: 100%;" class="row-item__btn btn btn_block m0 js-dealer-popup_show">Купить онлайн</a>
                </div-->
            <?}?>
        <?endif;?>


        <?if(count($arResult['SERIES_VALUES']['EXTRA']['VALUES']) > 0):?>
            <div class="prod-desc__params-item">
                <div class="prod-desc__params-title"><?=htmlspecialcharsback($arResult['SERIES_VALUES']['EXTRA']['NAME'])?></div>
                <select class="prod-desc__params-select">

                    <?foreach ($arResult['SERIES_VALUES']['EXTRA']['VALUES'] as $extra):?>
                        <?if ($extra['ACTIVE'] == 'Y'):?>
                            <option data-link="/catalog/<?=$_GET['CODE']?>/<?=$extra['CODE']?>/" <?=(($arResult['CODE'] == $extra['CODE'])?'selected':'')?>>
                                <?= \Daichi\Tools::getNumber( $extra['VALUE'] ) ?>
                            </option>
                        <?endif;?>
                    <?endforeach;?>
                </select>
            </div>
        <?endif;?>
    </div>
</div>