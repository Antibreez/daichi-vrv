

    <li class="main-nav__item">
        <a target="_blank" class="main-nav__link" href="https://daichi.market" role="button">Магазин</a>
    </li>
    <li class="main-nav__item">
        <a class="main-nav__link js-buy-menu_show" role="button">Каталог <span class="icon icon-arrow"></span></a>
        <ul class="main-nav-subnav">
            <?
            foreach ($arResult["BUY_MENU_LIST"] as $one): ?>
                <li class="main-nav-subnav__item main-nav-subnav__item_<?= $one["class"]; ?>">
                    <a class="main-nav-subnav__link" href="/catalog/<?= $one["CODE"]; ?>/"><?= $one["NAME"]; ?></a>
                </li>
            <?
            endforeach; ?>
        </ul>
    </li>

    <?
    require 'menu_item.php' ?>

    <li class="main-nav__item main-nav__item_ml">
        <a class="main-nav__link" href="/partner-services/">Дилерам и партнерам</a>
    </li>
    <li class="main-nav__item main-nav__item_ml">
        <?
        global $USER;
        if (!$USER->IsAuthorized()) {
            ?>
            <a href="https://lk.daichi.ru"
               style="display: block; height: 22px; line-height: 22px; color: #00adef; border-width: 0; font-weight: 100; font-size: 15px;">
                <span style="margin-right: 10px; margin-top: -1px;" class="icon icon-user"></span>Войти
            </a>
            <?
        } else {
            ?>
            <a href="https://lk.daichi.ru/?logout=yes"
               style="display: block; height: 22px; line-height: 22px; color: #00adef; border-width: 0; font-weight: 100; font-size: 15px;">
                <span style="margin-right: 10px; margin-top: -1px;" class="icon icon-user"></span>Выйти
            </a>
            <?
        }
        ?>
        <!--button onclick="document.location.href='/warranty/personal/';" class="btn btn_clean mb0" type="button" title="Личный кабинет">
        </button-->
    </li>
