<div class="container">
    <ul class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="/catalog/<?= $arResult["SECTION"]["CODE"];?>/"><span itemprop="name"><?= $arResult["SECTION"]["NAME"];?></span></a>
            <meta itemprop="position" content="1" />
        </li>
        <li class="breadcrumbs__item for-mobile" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="/catalog/<?= $arResult["SECTION"]["CODE"] . '/?filter-ATTR_L_GOODGROUP-' . $arResult["PROPERTIES"]["ATTR_L_GOODGROUP"]["ENUM_ID"];?>"><span itemprop="name"><?= $arResult["PROPERTIES"]["ATTR_L_GOODGROUP"]["VALUE"];?></span></a>
            <meta itemprop="position" content="2" />
        </li>
        <li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="/catalog/<?= $arResult["SECTION"]["CODE"] . '/?filter-ATTR_L_GOODGROUP-' . $arResult["PROPERTIES"]["ATTR_L_GOODGROUP"]["ENUM_ID"] . '&filter-BRAND-' . $arResult["PROPERTIES"]["BRAND"]["UF_XML_ID"];?>"><span itemprop="name"><?= ucfirst($arResult["PROPERTIES"]["BRAND"]["VALUE"]);?></span></a>
            <meta itemprop="position" content="3" />
        </li>
    </ul>
</div>