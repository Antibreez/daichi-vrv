<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

$this->setFrameMode(true);

if(!$arResult["NavShowAlways"]) {
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
        return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>

<?if($arResult['NavPageNomer'] != $arResult["NavPageCount"] && $arParams["HIDE_LOAD_MORE"] != "Y"):?>
    <div class="content-more catalog__more">
        <a class="content-more__btn js-load-cat-prod" role="button">
            <i class="content-more__icon"></i>
            <span class="content-more__text" data-text="Показать еще">Показать еще</span>
        </a>
    </div>
<?endif?>

<span style="display: none;" id="pagen-key-info" data-pagen-key="PAGEN_<?=$arResult["NavNum"]?>"></span>
<ul class="paging" style="padding-bottom: 30px;">
    <?if($arResult["bDescPageNumbering"] === true):?>
        <?if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
            <?if($arResult["bSavePage"]):?>
                <li class="paging__prev">
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>" data-pagen-value="<?=($arResult["NavPageNomer"]+1)?>">
                        Назад
                    </a>
                </li>
            <?else:?>
                <?if (($arResult["NavPageNomer"]+1) == $arResult["NavPageCount"]):?>
                    <li class="paging__prev">
                        <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">
                            Назад
                        </a>
                    </li>
                <?else:?>
                    <li class="paging__prev">
                        <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>" data-pagen-value="<?=($arResult["NavPageNomer"]+1)?>">
                            Назад
                        </a>
                    </li>
                <?endif;?>
                <li class="paging__page is-active"><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" data-pagen-value="1">1</a></li>
            <?endif?>
        <?else:?>
            <li class="paging__page is-active"><a href="#" data-pagen-value="1">1</a></li>
        <?endif;?>
        <?$arResult["nStartPage"]--;
        while($arResult["nStartPage"] >= $arResult["nEndPage"]+1):?>
            <?$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;?>
            <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
                <li class="paging__page is-active"><?=$NavRecordGroupPrint?></li>
            <?else:?>
                <li class="paging__page">
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>" data-pagen-value="<?=$arResult["nStartPage"]?>">
                        <?=$NavRecordGroupPrint?>
                    </a>
                </li>
            <?endif?>
            <?$arResult["nStartPage"]--?>
        <?endwhile?>

        <?if ($arResult["NavPageNomer"] > 1):?>
            <?if($arResult["NavPageCount"] > 1):?>
                <li class="paging__page">
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1" data-pagen-value="1">
                        <?=$arResult["NavPageCount"]?>
                    </a>
                </li>
            <?endif;?>
            <li class="paging__next">
                <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>" data-pagen-value="<?=($arResult["NavPageNomer"]-1)?>">
                    Вперёд
                </a>
            </li>
        <?else:?>
            <?if($arResult["NavPageCount"] > 1):?>
                <li class="paging__page is-active"><?=$arResult["NavPageCount"]?></li>
            <?endif?>
            <li class="paging__next"><a href="javascript:0;">Вперёд</a></li>
        <?endif?>
    <?else:?>
        <?if ($arResult["NavPageNomer"] > 1):?>
            <?if($arResult["bSavePage"]):?>
                <li class="paging__prev">
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>" data-pagen-value="<?=($arResult["NavPageNomer"]-1)?>">
                        Назад
                    </a>
                </li>
                <li class="paging__page">
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1" data-pagen-value="1">
                        1
                    </a>
                </li>
            <?else:?>
                <?if ($arResult["NavPageNomer"] > 5):?>
                    <li class="paging__page">
                        <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-5)?>" data-pagen-value="<?=($arResult["NavPageNomer"]-5)?>"></a>
                    </li>
                <?endif;?>
                <?if ($arResult["NavPageNomer"] > 2):?>
                    <li class="paging__prev">
                        <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>" data-pagen-value="<?=($arResult["NavPageNomer"]-1)?>">
                            Назад
                        </a>
                    </li>
                <?else:?>
                    <li class="paging__prev">
                        <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">
                            Назад
                        </a>
                    </li>
                <?endif;?>
                <li class="paging__page"><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" data-pagen-value="1">1</a></li>
                <?if($arResult["NavPageNomer"] !=2 && $arResult["NavPageNomer"] !=3 && $arResult["NavPageCount"] > 4):?>
                    <li class="paging__dots">...</li>
                <?endif;?>
            <?endif?>
        <?else:?>
            <li class="paging__page is-active"><a href="#" data-pagen-value="1">1</a></li>
        <?endif;?>

        <?if ($arResult["NavPageNomer"] > 3):?>
            <li class="paging__dots">...</li>
        <?endif;?>

        <?$arResult["nStartPage"]++;
        while($arResult["nStartPage"] <= $arResult["nEndPage"]-1):?>
            <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
                <li class="paging__page is-active"><a href="#" data-pagen-value="<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a></li>
            <?else:?>
                <li class="paging__page">
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>" data-pagen-value="<?=$arResult["nStartPage"]?>">
                        <?=$arResult["nStartPage"]?>
                    </a>
                </li>
            <?endif;?>
            <?$arResult["nStartPage"]++?>
        <?endwhile?>

        <?if ($arResult["NavPageCount"]>4&&$arResult["NavPageNomer"]<($arResult["NavPageCount"]-2)):?>
            <li class="paging__dots">...</li>
        <?endif;?>
        <?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
            <?if($arResult["NavPageCount"] > 1):?>
                <li class="paging__page">
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>" data-pagen-value="<?=$arResult["NavPageCount"]?>">
                        <?=$arResult["NavPageCount"]?>
                    </a>
                </li>
            <?endif;?>
            <li class="paging__next"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageNomer"] + 1;?>" data-pagen-value="<?=($arResult["NavPageNomer"]+1)?>">Вперёд</a></li>
        <?else:?>
            <?if($arResult["NavPageCount"] > 1):?>
                <li class="paging__page is-active">
                    <a href="#" data-pagen-value="<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a>
                </li>
            <?endif;?>
        <?endif;?>
    <?endif;?>
</ul>
