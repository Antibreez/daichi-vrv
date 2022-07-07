<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$header = "header-desktop_white";
$header_mobile = "";
$uri = explode('/', $_SERVER["REQUEST_URI"]);
if ($uri[1] == 'promo') {
    $header = PromoHelper::getClass($_GET['CODE'])['header']?:$header;
    $header_mobile = PromoHelper::getClass($_GET['CODE'])['header_mobile']?:$header_mobile;
} elseif ($uri[1] == 'about') {
    $header = 'header-desktop_transparent header-desktop_cl-white';
    $header_mobile = 'header-mobile_transparent';
}
?>
<header class="header">
    <div class="header-desktop <?= $header?>" id="header-desktop">
        <a href="https://daichi.ru" title="На главную">
            <img class="header-logo header-logo_desktop-lg for-black" src="<?= SITE_TEMPLATE_PATH?>/build/img/logo-daichi-white.svg" alt="Daichi">
            <img class="header-logo header-logo_desktop-lg for-white" src="<?= SITE_TEMPLATE_PATH?>/build/img/logo-daichi-color.svg" alt="Daichi">
        </a>

        <?$APPLICATION->IncludeComponent(
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
                    11 => "Нижний Новгород",
                    12 => "Новосибирск",
                    13 => "Омск",
                    14 => "Ростов-на-Дону",
                    15 => "Санкт-Петербург",
                    16 => "Симферополь",
                    17 => "Сочи",
                    18 => "Тольятти",
                    19 => "Уфа",
                    20 => "Хабаровск"
                )
            ),
            false
        );?>


            <div style="margin-left: 20px; display: inline-block; position: relative; overflow: visible;">
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
</div>


        <nav class="main-nav pull-right">
            <ul class="main-nav__list">
                <li class="main-nav__item main-nav__item_ml main-nav__item_relative">
                    <?$APPLICATION->IncludeComponent("bitrix:search.form", "top", Array(
                            "PAGE" => "#SITE_DIR#search/index.php",
                            "USE_SUGGEST" => "N",
                        )
                    );?>
                </li>
                <li class="main-nav__item main-nav__item_ml">
                    <?/*<button class="btn btn_clean mb0" type="button" title="Личный кабинет">
                        <span class="icon icon-user"></span>
                    </button>*/?>
                </li>
                <li class="main-nav__item main-nav__item_ml">
                    <?$list = StashedProducts::getCompareList();
                    foreach ($list as $one) {
                        $res = $one;
                    }
                    $count = count($res);
                    $disabled = $count > 0 ? '' : 'disabled';
                    ?>
                    <a class="btn btn_clean mb0 compare-link" href="/compare/" title="Сравнение товаров" <?= $disabled ?>><span class="icon icon-list"></span> <span class="js-compare-count"><?= $count;?></span> </a>
                </li>
                <li class="main-nav__item main-nav__item_ml">
                    <a class="btn btn_clean mb0" href="/wishlist/" title="Отложенные товары"><span class="icon icon-heart"></span> <span id="wishlist-count-head"><?= count(StashedProducts::getWishlist());?></span> </a>
                </li>
                <li class="main-nav__item main-nav__item_ml">
                    <span class="js-dealers-and-partners-popup">Дилерам и партнерам</span>

                    <script type="text/javascript">
                        $(document).on('click', '.js-dealers-and-partners-popup', function () {
                            window.location.href = '/partner-services/';
                        });
                    </script>
                </li>
            </ul>
        </nav>

        <nav class="main-nav main-nav_desktop pull-right">
            <? require '_partical/top_menu.php' ?>
        </nav>
    </div>

    <!-- ----------------------------------- Блок пунктов меню "Оборудование" ------------------------------------------ -->
	<div class="header__prod-menu prod-menu" id="prod-menu">
		<div class="prod-menu__back js-prod-menu_hide"></div>
		<div class="prod-menu__body" id="prod-menu-body">
			<a class="prod-menu__close js-prod-menu_hide" role="button"></a>
      <div class="prod-menu__shadow">
      <div class="prod-menu__nav">
				<h5 class="prod-menu__title">Оборудование</h5>
				<ul class="prod-menu__list">
					<?foreach ($arResult['EQUIPMENT'] as $equipment):?>
						<li class="prod-menu__line">
							<a class="prod-menu__link js-prod-submenu-link" role="button"><?=$equipment['name']?></a>
						</li>
					<?endforeach;?>
				</ul>
			</div>
    </div>
    <?foreach ($arResult['EQUIPMENT'] as $equipment):?>
        <div class="prod-menu__offer offer-menu">
    <?foreach ($equipment['brands'] as $brand):?>
        <h5 class="offer-menu__title"><?=$brand['name']?></h5>
        <ul class="offer-menu__list">
          <?foreach ($brand['promos'] as $promo):?>
            <li>
              <a class="offer-menu__link" href="<?=PromoHelper::getLink($promo['CODE'])?>">
                <img class="offer-menu__img" src="<?=PromoHelper::getFilePath($promo['CODE'], 'menu')?>" alt="<?=$brand['name']?> <?=$promo['NAME']?>">
                <div class="offer-menu__txt"><?=$promo['NAME']?></div>
              </a>
            </li>
          <?endforeach;?>
        </ul>
      <?endforeach;?>
              </div>
    <?endforeach;?>
		</div>
	</div>

    <div class="header-mobile <?= $header_mobile?>">

      <?if(!empty($arResult['menuItems'])):?>
          <nav class="main-nav main-nav_tablet pull-right">
              <? require '_partical/top_menu.php' ?>
          </nav>
      <?endif;?>
        <div class="clearfix">
            <div class="hamburger js-menu-open">
                <span class="hamburger__line hamburger__line_top"></span>
                <span class="hamburger__line hamburger__line_middle"></span>
                <span class="hamburger__line hamburger__line_bottom"></span>
            </div>

            <?$APPLICATION->IncludeComponent("bitrix:search.form", "mobile_top", Array(
                    "PAGE" => "#SITE_DIR#search/index.php",
                    "USE_SUGGEST" => "Y",
                )
            );?>

            <a href="/">
              <img class="header-logo for-black" src="<?= SITE_TEMPLATE_PATH;?>/build/img/logo-daichi-white.svg" alt="Daichi">
              <img class="header-logo for-white" src="<?= SITE_TEMPLATE_PATH;?>/build/img/logo-daichi-color.svg" alt="Daichi">
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

        <div class="header-shop">
            <div class="pull-left header-shop__item" data-shop="#shop-equipment">
                <?= $arResult['menuItems'][0]["TEXT"];?> <span class="icon icon-arrow"></span>
            </div>
            <div class="pull-right header-shop__item" data-shop="#shop-buy">
                <?= $arResult['menuItems'][1]["TEXT"];?> <span class="icon icon-arrow"></span>
            </div>
        </div>
    </div>


	<!-- ----------------------------------- Блок пунктов меню "Оборудование" для мобильной версии --------------------- -->
    <div class="mobile-shop js-shop" id="shop-equipment">
        <p class="mobile-shop__title"><span class="mobile-shop__wrapper">Оборудование</span> <span class="icon icon-cross"></span></p>
        <ul class="mobile-shop__list">
			<?foreach ($arResult["EQUIPMENT"] as $equipment):?>
				<li class="mobile-shop__item" data-item="<?= $equipment['key'];?>"><?=$equipment['name']?></li>
			<?endforeach;?>
		</ul>
	</div>


    <?$i = 9;?>
    <?foreach ($arResult['EQUIPMENT'] as $equipment):?>
        <div class="mobile-shop" data-list="<?= $equipment['key'];?>">
            <p class="mobile-shop__title"><span class="mobile-shop__wrapper"><?= $equipment['name'];?></span> <span class="icon icon-cross"></span><span class="icon icon-arrow"></span></p>
            <ul class="mobile-shop__list mobile-shop__list_lvl2">
                <?foreach ($equipment['brands'] as $brand):?>
                    <li class="mobile-shop__item" data-item="<?= $i;?>"><?= $brand['name'];?></li>
                    <?$i++;?>
                <?endforeach;?>
            </ul>
        </div>
    <?endforeach;?>

    <?$j = 9;?>
    <?foreach ($arResult['EQUIPMENT'] as $equipment):?>
        <?foreach ($equipment['brands'] as $brand):?>
            <div class="mobile-shop" data-list="<?= $j;?>">
                <p class="mobile-shop__title"><span class="mobile-shop__wrapper"><?= $brand['name'];?></span> <span class="icon icon-cross"></span><span class="icon icon-arrow"></span></p>
                <ul class="mobile-shop__list mobile-shop__list_lvl2">
                    <?foreach ($brand['promos'] as $model):?>
                        <li class="mobile-shop__item mobile-shop__item_last"><a href="<?=PromoHelper::getLink($model['CODE'])?>"><?= $model['NAME'];?></a></li>
                    <?endforeach;?>
                </ul>
            </div>
            <?$j++;?>
        <?endforeach;?>
    <?endforeach;?>

    <div class="mobile-shop js-shop" id="shop-buy">
        <p class="mobile-shop__title"><span class="mobile-shop__wrapper">Купить оборудование</span> <span class="icon icon-cross"></span></p>
        <ul class="mobile-shop__list">
            <?foreach ($arResult["BUY_MENU_LIST"] as $one):?>
                <li class="mobile-shop__item mobile-shop__item_last">
                    <a class="mobile-shop__link mobile-shop__link_<?= $one['class'];?>" href="/catalog/<?= $one["CODE"];?>/"><?= $one["NAME"];?></a>
                </li>
            <?endforeach;?>
        </ul>
    </div>
</header>

<nav class="main-nav main-nav_mobile js-sliding-menu">
    <ul class="main-nav__list main-nav__list_white">
        <li class="main-nav__item"><span class="icon icon-cross icon-cross_big js-menu-close"></span><a href="/partner-services/"><div class="pull-right">Дилерам и партнерам</div></a></li>
        <li class="main-nav__item"><a id="geo-choose-mobile" class="main-nav__link" href="#geo-check" data-popup="open"><span class="icon icon-baloon"></span><?=GeoHelper::getCurrentCity()['NAME']?></a><div class="pull-right"><span class="icon icon-geolocation"></span></div></li>

            <li class="main-nav__item"><a target="_blank" class="main-nav__link compare-link" href="https://shop.daichi.ru">Интернет магазин Daikin</a></li>
            <li class="main-nav__item"><a target="_blank" class="main-nav__link compare-link" href="https://midea.daichi.ru">Интернет магазин Midea</a></li>

        <li class="main-nav__item"><a class="main-nav__link" href="/wishlist/"><span class="icon icon-heart"></span>Отложенные товары</a><div class="pull-right cl-grey"><?= count(StashedProducts::getWishlist());?></div></li>
        <li class="main-nav__item"><a class="main-nav__link compare-link" href="/compare/" <?= $disabled ?>><span class="icon icon-list"></span>Сравнение товаров</a><div class="pull-right cl-grey js-compare-count"><?=count(StashedProducts::getCompareList())?></div></li>
    </ul>

    <script>
        $(document).on('click', '.js-geo-choose', function () {
            $('#geo-check').attr('style', 'display: block');
        });
    </script>

    <ul class="main-nav__list">
        <?require '_partical/menu_item.php'?>
    </ul>

    <div class="main-nav__footer">
        <p class="contacts">Служба поддержки<br><a class="btn btn_link mb0" href="#">8 800 200-00-05</a></p>
        <p class="contacts">Офис компании<br><a class="btn btn_link mb0" href="#">+7 (495) 737-37-33</a></p>
    </div>
</nav>
