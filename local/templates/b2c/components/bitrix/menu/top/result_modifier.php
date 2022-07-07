<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$menuItems = $arResult;
$arResult = [
    'menuItems' => $menuItems
];
//Запрашиваем разделы для каталога
$arSelect = array('ID', 'NAME', 'CODE');
$arFilter = array('IBLOCK_CODE' => CATALOG_GOODS);

$res = CIBlockSection::GetList(array(), $arFilter, false, $arSelect);

$i = 0;
while ($arSect = $res->GetNext()) {
    switch ($arSect["CODE"]) {
        case 'ventilation': $class = 'green'; break;
        case 'wetting': $class = 'violet'; break;
        case 'heat': $class = 'orange'; break;
        default: $class = 'blue'; break;
    }
    $arSect['class'] = $class;

    $arResult["BUY_MENU_LIST"][$i] = $arSect;
    $i++;
}

//----------------------------Запрашиваем промо-страницы----------------------------------------------------------------
$arResult['EQUIPMENT'] = PromoHelper::getListForMenu();
/*
if (isset($_REQUEST['test'])) {
    echo '<pre>';
    print_r($arResult['EQUIPMENT']);
    echo '</pre>';
}
*/