<ul class="main-nav__list">
    <li class="main-nav__item">
        <a class="main-nav__link js-prod-menu_show" role="button"><?= $arResult['menuItems'][0]["TEXT"];?> <span class="icon icon-menu"></span></a>
    </li>
    <li class="main-nav__item">
        <a class="main-nav__link js-buy-menu_show" role="button"><?= $arResult['menuItems'][1]["TEXT"];?> <span class="icon icon-arrow"></span></a>
        <ul class="main-nav-subnav">
            <?foreach ($arResult["BUY_MENU_LIST"] as $one):?>
                <li class="main-nav-subnav__item main-nav-subnav__item_<?= $one["class"];?>">
                    <a class="main-nav-subnav__link" href="/catalog/<?= $one["CODE"];?>/"><?= $one["NAME"];?></a>
                </li>
            <?endforeach;?>
        </ul>
    </li>
    <?require 'menu_item.php'?>
</ul>