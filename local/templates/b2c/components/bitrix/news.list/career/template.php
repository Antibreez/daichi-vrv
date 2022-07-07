<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>


<!--<pre>--><?php //print_r($arResult['ITEMS'][0]['NAME']) ?><!--</pre>-->


    <? if ($arResult['ITEMS']) { ?>

    <h3 class="main-disclaimer">В настоящее время в нашей компании открыты следующие вакансии:</h3>

    <div class="career-items">

        <? foreach ($arResult['ITEMS'] as $key => $arItem) { ?>

        <div class="item">
            <div class="filters__unit-title js-accordion-head">
                <div class="name">
                    <b>
                        <?=$arItem['NAME']?>
                    </b>
                </div>
                <div class="desc">
                    <b>Обязанности:</b>
                    <ul>
                        <li>
                            <?=$arResult['ITEMS'][$key]['PROPERTIES']['RES']['VALUE'][0]?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="filters__unit-body js-accordion-body js-filter-body" style="display: none;">
                <div class="desc">
                    <ul>
                        <? foreach ($arResult['ITEMS'][$key]['PROPERTIES']['RES']['VALUE'] as $key2 => $arRes) {
                            if ($key2 == 0) {
                                continue;
                            }
                            ?>
                        <li>
                            <?=$arRes?>
                        </li>
                        <? } ?>
                    </ul>

                    <? if ($arResult['ITEMS'][$key]['PROPERTIES']['REQ']) { ?>

                    <div class="title">
                        <b>Требования:</b>
                    </div>
                    <ul>
                        <? foreach ($arResult['ITEMS'][$key]['PROPERTIES']['REQ']['VALUE'] as $arReq) { ?>
                        <li>
                            <?=$arReq?>
                        </li>
                        <? } ?>
                    </ul>

                    <? } ?>

                    <? if ($arResult['ITEMS'][$key]['PROPERTIES']['CON']) { ?>

                    <div class="title">
                        <b>Условия:</b>
                    </div>
                    <ul>
                        <? foreach ($arResult['ITEMS'][$key]['PROPERTIES']['CON']['VALUE'] as $arCon) { ?>
                        <li>
                            <?=$arCon?>
                        </li>
                        <? } ?>
                    </ul>

                    <? } ?>

                    <a class="btn js-popup-open" href="javascript:void(0);" data-name="<?=$arItem['NAME']?>">Откликнуться на вакансию</a>
                </div>
            </div>
        </div>

        <? } ?>

    </div>


    <? } else { ?>

    <h3 class="main-disclaimer _no">В настоящий момент все вакансии закрыты, но мы всегда готовы рассмотреть резюме профессионалов разных специальностей</h3>

        <?$APPLICATION->IncludeComponent(
            "project:webform",
            "career",
            [
                "WEBFORM_SID" => "career_form",
                "REQUIRED" => [],
                'NOT_AGREE' => 'Y',
                "REQUIRED_OR" => [],
                "REQUIRED_FILE" => [],
                "SUCCESS_TITLE" => 'Спасибо. <br>Ваша заявка отправлена.',
                "SUCCESS_TEXT" => 'Менеджер перезвонит вам в ближайшее время',
            ]
        );?>

    <? } ?>
