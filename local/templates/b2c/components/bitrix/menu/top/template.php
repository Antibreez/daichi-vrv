<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>

<?
$header = "header-desktop_white";
$header_mobile = "";
$uri = explode('/', $_SERVER["REQUEST_URI"]);
if ($uri[1] == 'promo') {
    $header = PromoHelper::getClass($_GET['CODE'])['header'] ?: $header;
    $header_mobile = PromoHelper::getClass($_GET['CODE'])['header_mobile'] ?: $header_mobile;
} elseif ($uri[1] == 'about') {
    $header = 'header-desktop_transparent header-desktop_cl-white';
    $header_mobile = 'header-mobile_transparent';
}
?>
<header class="header">
    <div class="header-desktop <?= $header ?>" id="header-desktop">
        <a href="<?= MAIN_DAICHI_URL ?>/" title="На главную">
            <img class="header-logo header-logo_desktop-lg for-black"
                 src="<?= SITE_TEMPLATE_PATH ?>/build/img/logo-daichi-white.svg" alt="Daichi">
            <img class="header-logo header-logo_desktop-lg for-white"
                 src="<?= SITE_TEMPLATE_PATH ?>/build/img/logo-daichi-color.svg" alt="Daichi">
        </a>

        <?
        $APPLICATION->IncludeComponent(
            "b2c:location",
            ".default",
            array(
                "CITIES" => array(
                    0 => "Астрахань",
                    1 => "Владивосток",
                    2 => "Волгоград",
                    3 => "Воронеж",
                    4 => "Екатеринбург",
                    5 => "Иркутск",
                    6 => "Казань",
                    7 => "Калининград",
                    8 => "Краснодар",
                    9 => "Красноярск",
                    10 => "Москва",
                    11 => 'Минск',
                    12 => "Нижний Новгород",
                    13 => "Новосибирск",
                    14 => "Омск",
                    15 => "Ростов-на-Дону",
                    16 => "Санкт-Петербург",
                    17 => "Симферополь",
                    18 => "Сочи",
                    19 => "Тольятти",
                    20 => "Уфа",
                    21 => "Хабаровск"
                )
            ),
            false
        ); ?>


        <!--div style="margin-left: 20px; display: inline-block; position: relative; overflow: visible;">
            <a class="main-nav__link" href="javascript: void(0)" onclick="flipShopMenu();" style="color: #00adef; text-decoration: none; font-weight: 600;">
                Интернет магазин <span class="icon icon-arrow"></span>
            </a>
            <ul id="shop-inet-menu" class="main-nav-subnav" style="top: 49px; width: 500px;">
                <li class="main-nav-subnav__item main-nav-subnav__item_blue" style="width: 50%">
                    <a target="_blank" class="main-nav-subnav__link" href="https://shop.daichi.ru">Daikin</a>
                </li>
                <li class="main-nav-subnav__item main-nav-subnav__item_green" style="width: 50%">
                    <a target="_blank" class="main-nav-subnav__link" href="https://midea.daichi.ru">Midea</a>
                </li>
            </ul>
<script>

    function flipShopMenu() {
        if ($('#shop-inet-menu').hasClass('is-active')) {
            $('#shop-inet-menu').removeClass('is-active');
        }
        else {
            $('#shop-inet-menu').addClass('is-active');
        }
    }

</script>
</div-->


        <nav class="main-nav pull-right">
            <ul class="main-nav__list">
                <!--li class="main-nav__item main-nav__item_ml">
                    <?
                $list = StashedProducts::getCompareList();
                foreach ($list as $one) {
                    $res = $one;
                }
                $count = count($res);
                $disabled = $count > 0 ? '' : 'disabled';
                ?>
                    <a target="_blank" class="btn btn_clean mb0 compare-link" href="https://store.daichi.ru/compare/" title="Сравнение товаров" <?= $disabled ?>><span class="icon icon-list"></span> <span class="js-compare-count"><?= $count; ?></span> </a>
                </li>
                <li class="main-nav__item main-nav__item_ml">
                    <a target="_blank" class="btn btn_clean mb0" href="https://store.daichi.ru/wishlist/" title="Отложенные товары"><span class="icon icon-heart"></span> <span id="wishlist-count-head"><?= count(StashedProducts::getWishlist()); ?></span> </a>
                </li-->

<!--                <li class="main-nav__item main-nav__item_ml">-->
<!--                    <a class="main-nav__link" href="/partner-services/">Дилерам и партнерам</a>-->
<!--                    <span class="js-dealers-and-partners-popup">Дилерам и партнерам</span>-->
<!---->
<!--                    <script type="text/javascript">-->
<!--                        $(document).on('click', '.js-dealers-and-partners-popup', function () {-->
<!--                            window.location.href = '--><?//= MAIN_DAICHI_URL ?><!--/partner-services/';-->
<!--                        });-->
<!--                    </script>-->
<!--                </li>-->
<!--                <li class="main-nav__item main-nav__item_ml">-->
<!--                    --><?//
//                    global $USER;
//                    if (!$USER->IsAuthorized()) {
//                        ?>
<!--                        <a href="https://lk.daichi.ru"-->
<!--                           style="display: block; height: 22px; line-height: 22px; color: #00adef; border-width: 0; font-weight: 100; font-size: 15px;">-->
<!--                            <span style="margin-right: 10px; margin-top: -1px;" class="icon icon-user"></span>Войти-->
<!--                        </a>-->
<!--                        --><?//
//                    } else {
//                        ?>
<!--                        <a href="https://lk.daichi.ru/?logout=yes"-->
<!--                           style="display: block; height: 22px; line-height: 22px; color: #00adef; border-width: 0; font-weight: 100; font-size: 15px;">-->
<!--                            <span style="margin-right: 10px; margin-top: -1px;" class="icon icon-user"></span>Выйти-->
<!--                        </a>-->
<!--                        --><?//
//                    }
//                    ?>
<!--                    <button onclick="document.location.href='/warranty/personal/';" class="btn btn_clean mb0" type="button" title="Личный кабинет">-->
<!--                    </button>-->
<!--                </li>-->


            </ul>
        </nav>

        <nav class="main-nav main-nav_desktop pull-right">
            <ul>
                <li class="main-nav__item ">
                    <div class="header-search">

                        <form method="GET" action="/search/new.php" id="search-form-desktop" class="header-search__form"
                              style="display: none;">
                            <button type="submit" class="header-search__search-btn btn btn_link inside"><span
                                        class="icon icon-search active"></span></button>
                            <input type="text" placeholder="Что Вы ищете?" name="q">
                            <button type="button" class="header-search__close-btn btn btn_link close" data-visibility="show"
                                    data-show="#show-search-desktop" data-hide="#search-form-desktop"  data-queue="show">
                                <span class="icon icon-cross"></span>
                            </button>
                            <div id="offers" class="search-results is-active">
                                <div id="popular-block" class="search-results-item">
                                    <p style="display: none;" class="search-results__category">Популярное</p>
                                </div>

                                <div id="category-block" class="search-results-item">
                                    <p style="display: none;" class="search-results__category">Категории</p>
                                </div>

                                <div id="articles-block" class="search-results-item">
                                    <p style="display: none;" class="search-results__category">Статьи</p>
                                </div>
                            </div>
                        </form>

                        <button id="show-search-desktop" type="button" class="header-search__show-btn btn btn_link mb0"
                                data-visibility="show" data-show="#search-form-desktop" data-hide="#show-search-desktop"
                                data-queue="show">
                            <span class="icon icon-search"></span>
                        </button>
                    </div>
                </li>
            <?
            require '_partical/top_menu.php' ?>
                </ul>
        </nav>
    </div>

    <!-- ----------------------------------- Блок пунктов меню "Оборудование" ------------------------------------------ -->
    <div class="header__prod-menu prod-menu" id="prod-menu">
        <div class="prod-menu__back js-prod-menu_hide"></div>
        <div class="prod-menu__body" id="prod-menu-body">
            <a class="prod-menu__close js-prod-menu_hide" role="button"></a>
            <div class="prod-menu__shadow">
                <div class="prod-menu__nav">
                    <h5 class="prod-menu__title">Товары и услуги</h5>
                    <ul class="prod-menu__list">
                        <li class="prod-menu__line">
                            <a class="prod-menu__link js-prod-submenu-link" role="button">Программы обслуживания
                                клиентов</a>
                        </li>
                        <?
                        foreach ($arResult['EQUIPMENT'] as $equipment): ?>
                            <li class="prod-menu__line">
                                <a class="prod-menu__link js-prod-submenu-link"
                                   role="button"><?= $equipment['name'] ?></a>
                            </li>
                        <?
                        endforeach; ?>
                        <li class="prod-menu__line">
                            <a class="prod-menu__link js-prod-submenu-link" role="button">WiFi-контроллеры</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="prod-menu__offer offer-menu">
                <h5 class="offer-menu__title">Программы обслуживания клиентов</h5>
                <ul class="offer-menu__list">
                    <li>
                        <a class="offer-menu__link" href="/promo/my-comfort/">
                            <img class="offer-menu__img" src="/uslugi/img/my-comfort.svg" alt="Мой комфорт">
                            <div class="offer-menu__txt">Мой комфорт</div>
                        </a>
                    </li>
                    <!--<li>
                        <a class="offer-menu__link" href="/promo/my-comfort/">
                            <img class="offer-menu__img" src="/uslugi/img/my-comfort-plus.svg" alt="Мой комфорт+">
                            <div class="offer-menu__txt">Мой комфорт+</div>
                        </a>
                    </li>-->
                    <li>
                        <a class="offer-menu__link" href="/promo/climat-online/">
                            <img class="offer-menu__img" src="/uslugi/img/climat-online.svg" alt="Климат онлай">
                            <div class="offer-menu__txt">Климат онлайн</div>
                        </a>
                    </li>
                    <li>
                        <a class="offer-menu__link" href="/promo/mobile-control/">
                            <img class="offer-menu__img" src="/uslugi/img/mobile-control.svg"
                                 alt="Мобильное управление">
                            <div class="offer-menu__txt">Мобильное управление</div>
                        </a>
                    </li>
                    <li>
                        <a class="offer-menu__link" href="/checkaccount/">
                            <img class="offer-menu__img" src="/uslugi/img/contract.png" alt="Проверить статус договора">
                            <div class="offer-menu__txt">Проверить статус договора</div>
                        </a>
                    </li>
                </ul>
            </div>


            <?
            foreach ($arResult['EQUIPMENT'] as $equipment): ?>
                <div class="prod-menu__offer offer-menu">
                    <?
                    foreach ($equipment['brands'] as $brand): ?>
                        <h5 class="offer-menu__title"><?= $brand['name'] ?></h5>
                        <ul class="offer-menu__list">
                            <?
                            foreach ($brand['promos'] as $promo): ?>
                                <li>
                                    <a class="offer-menu__link"
                                       href="<?= MAIN_DAICHI_URL ?><?= PromoHelper::getLink($promo['CODE']) ?>">
                                        <img class="offer-menu__img"
                                             src="<?= PromoHelper::getFilePath($promo['CODE'], 'menu') ?>"
                                             alt="<?= $brand['name'] ?> <?= $promo['NAME'] ?>">
                                        <div class="offer-menu__txt"><?= $promo['NAME'] ?></div>
                                    </a>
                                </li>
                            <?
                            endforeach; ?>
                        </ul>
                    <?
                    endforeach; ?>
                </div>
            <?
            endforeach; ?>


            <div class="prod-menu__offer offer-menu">
                <h5 class="offer-menu__title">WiFi-контроллеры</h5>
                <ul class="offer-menu__list">
                    <li>
                        <a class="offer-menu__link" href="/promo/split-control/">
                            <!--img class="offer-menu__img" src="img" alt="Оборудование мобильного управления для сплит-систем"-->
                            <div class="offer-menu__txt">Оборудование мобильного управления для сплит-систем</div>
                        </a>
                    </li>
                    <li>
                        <a class="offer-menu__link" href="/promo/vrf-control/">
                            <!--img class="offer-menu__img" src="img" alt="Оборудование мобильного управления для систем ВРФ"-->
                            <div class="offer-menu__txt">Оборудование мобильного управления для систем ВРФ</div>
                        </a>
                    </li>
                </ul>
            </div>


        </div>
    </div>

    <div class="header-mobile <?= $header_mobile ?>">

        <?php /*
        $APPLICATION->IncludeComponent("bitrix:search.form", "top", array(
                "USE_SUGGEST" => "N",
                "PAGE" => "#SITE_DIR#search/index.php"
            )
        ); */?>

        <?
        if (!empty($arResult['menuItems'])): ?>
            <nav class="main-nav main-nav_tablet pull-right">
                <ul class="main-nav__items">
                    <li class="main-nav__item ">
                        <div class="header-search">
                            <form method="GET" action="/search/new.php" id="search-form-desktop2" class="header-search__form"
                                  style="display: none;">
                                <button type="submit" class="header-search__search-btn btn btn_link inside"><span
                                            class="icon icon-search active"></span></button>
                                <input type="text" placeholder="Что Вы ищете?" name="q">
                                <button type="button" class="header-search__close-btn btn btn_link close" data-visibility="show"
                                        data-show="#show-search-desktop2" data-hide="#search-form-desktop2" data-queue="show">
                                    <span class="icon icon-cross"></span>
                                </button>
                                <div id="offers" class="search-results is-active">
                                    <div id="popular-block2" class="search-results-item">
                                        <p style="display: none;" class="search-results__category">Популярное</p>
                                    </div>

                                    <div id="category-block2" class="search-results-item">
                                        <p style="display: none;" class="search-results__category">Категории</p>
                                    </div>

                                    <div id="articles-block2" class="search-results-item">
                                        <p style="display: none;" class="search-results__category">Статьи</p>
                                    </div>
                                </div>
                            </form>
                            <button id="show-search-desktop2" type="button" class="header-search__show-btn btn btn_link mb0"
                                    data-visibility="show" data-show="#search-form-desktop2" data-hide="#show-search-desktop2"
                                    data-queue="show">
                                <span class="icon icon-search"></span>
                            </button>

                        </div>
                    </li>
                <?
                require '_partical/top_menu.php' ?>
                </ul>
            </nav>
        <?
        endif; ?>

        <div class="clearfix">
            <div class="hamburger js-menu-open">
                <span class="hamburger__line hamburger__line_top"></span>
                <span class="hamburger__line hamburger__line_middle"></span>
                <span class="hamburger__line hamburger__line_bottom"></span>
            </div>
            <a href="<?= MAIN_DAICHI_URL ?>/">
                <img class="header-logo for-black" src="<?= SITE_TEMPLATE_PATH; ?>/build/img/logo-daichi-white.svg"
                     alt="Daichi">
                <img class="header-logo for-white" src="<?= SITE_TEMPLATE_PATH; ?>/build/img/logo-daichi-color.svg"
                     alt="Daichi">
            </a>
            <a href="http://daichi.test.itech-test.ru/search/new.php" class="clearfix__show-btn btn btn_link mb0">
                <span class="icon icon-search"></span>
            </a>

            <!--div style="margin-left: 20px; display: inline-block; position: relative; overflow: visible; margin-top: 20px;">
                <a class="main-nav__link" href="javascript: void(0)" onclick="flipShopMenuMob();" style="text-decoration: none;">
                    Интернет магазин <span class="icon icon-arrow"></span>
                </a>
                <ul id="shop-inet-menu-mob" class="main-nav-subnav" style="top: 46px; width: 500px;">
                    <li class="main-nav-subnav__item main-nav-subnav__item_blue" style="width: 50%">
                        <a class="main-nav-subnav__link" href="https://shop.daichi.ru">Daikin</a>
                    </li>
                    <li class="main-nav-subnav__item main-nav-subnav__item_green" style="width: 50%">
                        <a class="main-nav-subnav__link" href="https://midea.daichi.ru">Midea</a>
                    </li>
                </ul>
                <script>

                    function flipShopMenuMob() {
                        if ($('#shop-inet-menu-mob').hasClass('is-active')) {
                            $('#shop-inet-menu-mob').removeClass('is-active');
                        }
                        else {
                            $('#shop-inet-menu-mob').addClass('is-active');
                        }
                    }

                </script>
            </div-->


        </div>

        <div class="header-shop" style="">
            <div class="pull-left header-shop__item">
                <a style="text-decoration: none; border-width: 0; margin-left: 30px;"
                   href="/catalog/conditioning/">Каталог</a>
            </div>
            <!--div class="pull-right header-shop__item" data-shop="#shop-buy">
                Купить <span class="icon icon-arrow"></span>
            </div-->
            <div class="pull-left">
                <a target="_blank" style="text-decoration: none; border-width: 0; margin-left: 30px;"
                   href="https://daichi.market/">Магазин</a>
            </div>
        </div>
    </div>


    <!-- ----------------------------------- Блок пунктов меню "Оборудование" для мобильной версии --------------------- -->
    <div class="mobile-shop js-shop" id="shop-equipment">
        <p class="mobile-shop__title"><span class="mobile-shop__wrapper">Товары и услуги</span> <span
                    class="icon icon-cross"></span></p>
        <ul class="mobile-shop__list">
            <li class="mobile-shop__item" data-item="usl">Программы обслуживания клиентов</li>
            <?
            foreach ($arResult["EQUIPMENT"] as $equipment): ?>
                <li class="mobile-shop__item" data-item="<?= $equipment['key']; ?>"><?= $equipment['name'] ?></li>
            <?
            endforeach; ?>
            <li class="mobile-shop__item" data-item="wifi">WiFi-контроллеры</li>
        </ul>
    </div>


    <?
    $i = 9; ?>
    <div class="mobile-shop" data-list="usl">
        <p class="mobile-shop__title"><span class="mobile-shop__wrapper">Программы обслуживания клиентов</span> <span
                    class="icon icon-cross"></span><span class="icon icon-arrow"></span></p>
        <ul class="mobile-shop__list mobile-shop__list_lvl2">
            <li class="mobile-shop__item mobile-shop__item_last"><a href="/promo/my-comfort/">Мой комфорт</a></li>
            <li class="mobile-shop__item mobile-shop__item_last"><a href="/promo/my-comfort/">Мой комфорт+</a></li>
            <li class="mobile-shop__item mobile-shop__item_last"><a href="/promo/climat-online/">Климат онлайн</a></li>
            <li class="mobile-shop__item mobile-shop__item_last"><a href="/promo/mobile-control/">Мобильное
                    управление</a></li>
            <li class="mobile-shop__item mobile-shop__item_last"><a href="/checkaccount/">Проверить статус договора</a>
            </li>
        </ul>
    </div>
    <?
    foreach ($arResult['EQUIPMENT'] as $equipment): ?>
        <div class="mobile-shop" data-list="<?= $equipment['key']; ?>">
            <p class="mobile-shop__title"><span class="mobile-shop__wrapper"><?= $equipment['name']; ?></span> <span
                        class="icon icon-cross"></span><span class="icon icon-arrow"></span></p>
            <ul class="mobile-shop__list mobile-shop__list_lvl2">
                <?
                foreach ($equipment['brands'] as $brand): ?>
                    <li class="mobile-shop__item" data-item="<?= $i; ?>"><?= $brand['name']; ?></li>
                    <?
                    $i++; ?>
                <?
                endforeach; ?>
            </ul>
        </div>
    <?
    endforeach; ?>
    <div class="mobile-shop" data-list="wifi">
        <p class="mobile-shop__title"><span class="mobile-shop__wrapper">WiFi-контроллеры</span> <span
                    class="icon icon-cross"></span><span class="icon icon-arrow"></span></p>
        <ul class="mobile-shop__list mobile-shop__list_lvl2">
            <li class="mobile-shop__item mobile-shop__item_last"><a href="/promo/split-control/">Оборудование мобильного
                    управления для сплит-систем</a></li>
            <li class="mobile-shop__item mobile-shop__item_last"><a href="/promo/vrf-control/">Оборудование мобильного
                    управления для систем ВРФ</a></li>
        </ul>
    </div>


    <?
    $j = 9; ?>
    <?
    foreach ($arResult['EQUIPMENT'] as $equipment): ?>
        <?
        foreach ($equipment['brands'] as $brand): ?>
            <div class="mobile-shop" data-list="<?= $j; ?>">
                <p class="mobile-shop__title"><span class="mobile-shop__wrapper"><?= $brand['name']; ?></span> <span
                            class="icon icon-cross"></span><span class="icon icon-arrow"></span></p>
                <ul class="mobile-shop__list mobile-shop__list_lvl2">
                    <?
                    foreach ($brand['promos'] as $model): ?>
                        <li class="mobile-shop__item mobile-shop__item_last"><a
                                    href="<?= MAIN_DAICHI_URL ?><?= PromoHelper::getLink($model['CODE']) ?>"><?= $model['NAME']; ?></a>
                        </li>
                    <?
                    endforeach; ?>
                </ul>
            </div>
            <?
            $j++; ?>
        <?
        endforeach; ?>
    <?
    endforeach; ?>

    <div class="mobile-shop js-shop" id="shop-buy">
        <p class="mobile-shop__title"><span class="mobile-shop__wrapper">Купить оборудование</span> <span
                    class="icon icon-cross"></span></p>
        <ul class="mobile-shop__list">
            <?
            foreach ($arResult["BUY_MENU_LIST"] as $one): ?>
                <li class="mobile-shop__item mobile-shop__item_last">
                    <a target="_blank" class="mobile-shop__link mobile-shop__link_<?= $one['class']; ?>"
                       href="https://daichi.market/catalog/<?= $one["CODE"]; ?>/"><?= $one["NAME"]; ?></a>
                </li>
            <?
            endforeach; ?>
        </ul>
    </div>
</header>


<nav class="main-nav main-nav_mobile js-sliding-menu">
    <ul class="main-nav__list main-nav__list_white">
        <li class="main-nav__item"><span class="icon icon-cross icon-cross_big js-menu-close"></span><a
                    href="<?= MAIN_DAICHI_URL ?>/partner-services/">
                <div class="pull-right">Дилерам и партнерам</div>
            </a></li>
        <li class="main-nav__item"><a id="geo-choose-mobile" class="main-nav__link" href="#geo-check" data-popup="open"><span
                        class="icon icon-baloon"></span><?= GeoHelper::getCurrentCity()['NAME'] ?></a>
            <div class="pull-right"><span class="icon icon-geolocation"></span></div>
        </li>

        <!--li class="main-nav__item"><a target="_blank" class="main-nav__link compare-link" href="https://shop.daichi.ru">Интернет магазин Daikin</a></li>
        <li class="main-nav__item"><a target="_blank" class="main-nav__link compare-link" href="https://midea.daichi.ru">Интернет магазин Midea</a></li-->

        <!--li class="main-nav__item"><a target="_blank" class="main-nav__link" href="https://store.daichi.ru/wishlist/"><span class="icon icon-heart"></span>Отложенные товары</a><div class="pull-right cl-grey"><?= count(StashedProducts::getWishlist()); ?></div></li>
        <li class="main-nav__item"><a target="_blank" class="main-nav__link compare-link" href="https://store.daichi.ru/compare/" <?= $disabled ?>><span class="icon icon-list"></span>Сравнение товаров</a><div class="pull-right cl-grey js-compare-count"><?= count(StashedProducts::getCompareList()) ?></div></li-->

        <li class="main-nav__item">
            <?
            global $USER;
            if (!$USER->IsAuthorized()) {
                ?>
                <a href="https://lk.daichi.ru"
                   style="display: block; height: 22px; line-height: 22px; color: #00adef; border-width: 0; font-weight: 100; font-size: 15px;">
                    <span style="margin-right: 15px; margin-top: -1px;" class="icon icon-user"></span>Войти
                </a>
                <?
            } else {
                ?>
                <a href="https://lk.daichi.ru/?logout=yes"
                   style="display: block; height: 22px; line-height: 22px; color: #00adef; border-width: 0; font-weight: 100; font-size: 15px;">
                    <span style="margin-right: 15px; margin-top: -1px;" class="icon icon-user"></span>Выйти
                </a>
                <?
            }
            ?>
        </li>
    </ul>

    <script>
        $(document).on('click', '.js-geo-choose', function () {
            $('#geo-check').attr('style', 'display: block');
        });
    </script>

    <ul class="main-nav__list">
        <?
        require '_partical/menu_item.php' ?>
    </ul>

    <div class="main-nav__footer">
        <p class="contacts">Служба поддержки<br><a class="btn btn_link mb0" href="#">8 800 201-45-84</a></p>
        <p class="contacts">Офис компании<br><a class="btn btn_link mb0" href="#">+7 (495) 737-37-33</a></p>
    </div>
</nav>
