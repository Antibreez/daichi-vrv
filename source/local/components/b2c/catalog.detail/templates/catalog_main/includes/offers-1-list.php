<?php
    $productURL = "";
    $list = count($arResult['OFFERS']['LIST']) ? $arResult['OFFERS']['LIST'] : $arResult['OFFERS']['PROMO'];
    foreach ($list as $offer) {
        if(\Daichi\Tools::checkVal($offer['UF_PRODUCT_YANDEX_ID'])) {
            $productURL = "https://market.yandex.ru/product/{$offer['UF_PRODUCT_YANDEX_ID']}";
            break;
        }
    }
?>

<?foreach ($arResult['OFFERS']['PROMO'] as $offer):?>
    <?php
        $shop = $offer->getShop(3600);
        if (!$shop) continue;

        $promoList = $shop->getActualPromo(3600);
        $rating = $shop->getRating(3600);
        $bannerList = $shop->getActualBanners(3600);
        $shop['HOST'] = \b2c\Util::getHostFromUrl($shop['PROPERTY_WEB_SITE_VALUE']);
    ?>

    <div class="offer offer_adv prod-tab__offer row-item">
        <span class="offer__advicon">Реклама</span>
        <div class="offer__info">
            <div class="offer__shop">
                <span class="offer__shop-name"><a class="js-dealer-popup_show"><?= $shop['NAME'] ?></a></span>
                <span class="offer__shop-review"><?= $rating['TEXT'] ?></span>
                <span class="offer__shop-rate rate rate_<?= $rating['CLASS'] ?>"></span>
            </div>

            <ul class="offer__terms">
                <?foreach ($shop->getStatus(3600) as $info):?>
                    <li class="offer__terms-item"><?=$info['NAME']?></li>
                <?endforeach;?>
            </ul>

            <?php if ( \Daichi\Tools::checkVal( $shop->getAddress() )): ?>
                <p class="row-item__address">Адрес: <?= $shop->getAddress() ?></p>
            <?endif;?>

            <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_PHONE_NUMBER_VALUE'])): ?>
                <p class="row-item__phone">Телефон: <a href="tel:<?=$shop['PROPERTY_PHONE_NUMBER_VALUE']?>"><?=$shop['PROPERTY_PHONE_NUMBER_VALUE']?></a></p>
            <?endif;?>
            <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_WEB_SITE_VALUE'])): ?>
                <a href="http:<?=$shop['PROPERTY_WEB_SITE_VALUE']?>" class="row-item__site blue" target="_blank"><?= $shop['HOST'] == 'нет данных' ? '' : 'перейти на сайт';?></a>
            <?endif;?>

        </div>
        <div class="offer__sales">
                <div class="offer__sales-title">
                        Акции и спецпредложения:
                </div>
                <ul class="offer__sales-list">
                    <?php foreach ($promoList as $promo): ?>
                        <li class="offer__sales-item"><?= $promo['UF_DESCRIPTION'] ?></li>
                    <?php endforeach; ?>
                </ul>
        </div>
        <div class="offer__price">
            <?php if((float) $offer['UF_OLD_PRICE'] > 0): ?>
                <div class="offer__price-now"><span><em>-<?= (int) ( 100 - ( $offer['UF_PRICE'] * 100 / $offer['UF_OLD_PRICE']) ) ?>%</em><?=$offer['UF_PRICE']?></span> <i class="icon-rub">a</i></div>
                <div class="offer__price-old"><span><?=$offer['UF_OLD_PRICE']?></span> <i class="icon-rub">a</i></div>
            <?php else: ?>
                <div class="offer__price-now"><span><?=$offer['UF_PRICE']?></span> <i class="icon-rub">a</i></div>
            <?php endif; ?>
            <?php if ( \Daichi\Tools::checkVal($offer['UF_URL'])): ?>
                <div class="offer__price-btn">
                    <a class="btn" href="<?= $offer['UF_URL']; ?>" target="_blank">В магазин</a>
                </div>
            <?php else: ?>
                <div class="offer__price-btn">
                    <a class="btn" href="<?=$shop['PROPERTY_WEB_SITE_VALUE']?>" target="_blank">В магазин</a>
                </div>
            <?php endif; ?>
        </div>


        <div class="dealer-popup">
            <div class="dealer-popup__back js-dealer-popup_hide"></div>
            <div class="dealer-popup__inner">
                <a role="button" class="close-btn close-btn_lg js-dealer-popup_hide" data-popup="close">Закрыть</a>
                <div class="dealer-popup__body">
                    <div class="dealer-popup__section">
                      <?php if ( \Daichi\Tools::checkVal($shop->getLogo())): ?>
                        <img src="<?= $shop->getLogo(['width' => 187, 'height' => 40]) ?>" class="dealer-popup__logo" alt="<?=$shop['NAME']?>">
                        <div class="dealer-popup__main">
                      <?php else: ?>
                        <div class="dealer-popup__main dealer-popup__main_nologo">
                      <?php endif ?>
                            <h4 class="dealer-popup__link m0"><a class="black" href="<?=$shop['PROPERTY_WEB_SITE_VALUE']?>"><?=$shop['NAME']?></a></h4>
                            <span class="offer__shop-review m0"><?= $rating['TEXT'] ?></span><span class="offer__shop-rate rate rate_<?= $rating['CLASS'] ?> dealer-popup__stars"></span>
                            <?/*<a href="#" class="btn btn_block dealer-popup__btn">Предложения дилера</a>*/?>
                        </div>
                        <div class="dealer-popup__info"><?= $shop['DETAIL_TEXT'] ?></div>
                        <div class="dealer-popup__features">
                            <? foreach ($shop->getStatus(3600) as $status): ?>
                                <span class="dealer__feature"><?= $status['NAME'] ?></span>
                            <? endforeach; ?>
                        </div>
                    </div>
                    <div class="dealer-popup__section">
                        <ul class="dealer-desc">
                            <?php if ( \Daichi\Tools::checkVal($shop->getAddress())): ?>
                                <li class="dealer-desc__item"><img src="<?= SITE_TEMPLATE_PATH . "/build/"?>img/svg/geo.svg" class="dealer-desc__icon dealer-desc__icon_geo" alt=""><?= $shop->getAddress() ?></li>
                            <?php endif ?>
                            <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_PHONE_NUMBER_VALUE'])): ?>
                                <li class="dealer-desc__item"><img src="<?= SITE_TEMPLATE_PATH . "/build/"?>img/svg/phone.svg" class="dealer-desc__icon" alt=""><?=$shop['PROPERTY_PHONE_NUMBER_VALUE']?></li>
                            <?php endif ?>
                            <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_WEB_SITE_VALUE'])): ?>
                                <li class="dealer-desc__item"><img src="<?= SITE_TEMPLATE_PATH . "/build/"?>img/svg/link.svg" class="dealer-desc__icon" alt="">
                                    <?php if($shop['HOST'] == 'нет данных'):?>
                                        нет данных
                                    <?php else:?>
                                        <a href="<?=$shop['PROPERTY_WEB_SITE_VALUE']?>" target="_blank" class="blue">перейти на сайт</a>
                                    <?php endif;?>
                                </li>
                            <?php endif ?>
                            <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_EMAIL_VALUE'])): ?>
                                <li class="dealer-desc__item">Email: <a href="mailto:<?=$shop['PROPERTY_EMAIL_VALUE']?>"> <?=$shop['PROPERTY_EMAIL_VALUE']?> </a> </li>
                            <?php endif ?>
                            <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_SCHEDULE_VALUE'])): ?>
                                <li class="dealer-desc__item"><img src="<?= SITE_TEMPLATE_PATH . "/build/"?>img/svg/worktime.svg" class="dealer-desc__icon" alt=""><?= $shop['PROPERTY_SCHEDULE_VALUE'] ?></li>
                            <?php endif ?>
                        </ul>
                        <ul class="social-list">
                            <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_FACEBOOK_VALUE'])): ?>
                                <li><a class="social-list__icon icon-fb icon-fb_big" href="<?= $shop['PROPERTY_FACEBOOK_VALUE'] ?>" target="_blank" title="Facebook"></a></li>
                            <?php endif ?>
                            <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_VKONTAKTE_VALUE'])): ?>
                                <li><a class="social-list__icon icon-vk icon-vk_big" href="<?= $shop['PROPERTY_VKONTAKTE_VALUE'] ?>" target="_blank" title="ВКонтакте"></a></li>
                            <?php endif ?>
                            <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_TWITTER_VALUE'])): ?>
                                <li><a class="social-list__icon icon-tw icon-tw_big" href="<?= $shop['PROPERTY_TWITTER_VALUE'] ?>" target="_blank" title="Twitter"></a></li>
                            <?php endif ?>
                            <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_ODNOKLASSNIKI_VALUE'])): ?>
                                <li><a class="social-list__icon icon-ok icon-ok_big" href="<?= $shop['PROPERTY_ODNOKLASSNIKI_VALUE'] ?>" target="_blank" title="Одноклассники"></a></li>
                            <?php endif ?>
                            <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_GOOGLE_PLUS_VALUE'])): ?>
                                <li><a class="social-list__icon icon-google icon-google_big" href="<?= $shop['PROPERTY_GOOGLE_PLUS_VALUE'] ?>" target="_blank" title="Google+"></a></li>
                            <?php endif ?>
                        </ul>
                    </div>
                    <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_SERVICES_VALUE'])): ?>
                        <div class="dealer-popup__section">
                            <h6 class="dealer-popup__title">Услуги</h6>
                            <ul class="dealer-popup__services">
                                <?php foreach ($shop['PROPERTY_SERVICES_VALUE'] as $service): ?>
                                    <li> <?= $service ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif ?>

                    <?php if(count($bannerList) || count($promoList)): ?>
                        <div class="dealer-popup__section">
                            <h6 class="dealer-popup__title">Акции и спецпредложения</h6>
                            <?php foreach ($promoList as $promo) echo $promo['UF_DESCRIPTION'] ?>

                            <?php foreach ($bannerList as $banner): ?>
                                <img src="<?= $banner->getPath(['width' => 624, 'height' => 198]) ?>" class="dealer-popup__banner" alt="<?= $shop['NAME'] ?>">
                            <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>


    </div>
<?php endforeach; ?>


<?foreach ($arResult['OFFERS']['LIST'] as $offer):?>
    <?php
        $shop = $offer->getShop(3600);
        if (!$shop) continue;

        $rating = $shop->getRating(3600);
        $promoList = $shop->getActualPromo(3600);
        $bannerList = $shop->getActualBanners(3600);
        if ($offer->fields['UF_PRICE_SOURCE'] == '2') {
            $shop['HOST'] = \b2c\Util::getHostFromUrl($shop['PROPERTY_WEB_SITE_VALUE']);
        } else {
            $shop['HOST'] = $offer->fields['UF_URL'];
        }
        if (!strstr($shop['HOST'], 'http') && !strstr($shop['HOST'], 'https')) {
            $shop['HOST'] = 'http://' . $shop['HOST'];
        }
    ?>

    <div class="offer prod-tab__offer row-item">
        <div class="offer__info">
            <div class="offer__shop">
                <span class="offer__shop-name"><a class="js-dealer-popup_show"><?= $shop['NAME'] ?></a></span>
                <?if ($rating['SHOP_YANDEX_ID']):?>
                    <a href="https://market.yandex.ru/shop/<?= $rating['SHOP_YANDEX_ID'];?>/reviews" target="_blank"><span class="offer__shop-review"><?= $rating['TEXT'] ?></span></a>
                <?else:?>
                    <span class="offer__shop-review"><?= $rating['TEXT'] ?></span>
                <?endif;?>
                <span class="offer__shop-rate rate rate_<?= $rating['CLASS'] ?>"></span>
            </div>

            <ul class="offer__terms">
                <?foreach ($shop->getStatus(3600) as $info):?>
                    <li class="offer__terms-item"><?=$info['NAME']?></li>
                <?endforeach;?>
            </ul>

            <?php if ( \Daichi\Tools::checkVal( $shop->getAddress() )): ?>
                <p class="row-item__address">Адрес: <?= $shop->getAddress() ?></p>
            <?endif;?>

            <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_PHONE_NUMBER_VALUE'])): ?>
                <p class="row-item__phone">Телефон: <a href="tel:<?=$shop['PROPERTY_PHONE_NUMBER_VALUE']?>"><?=$shop['PROPERTY_PHONE_NUMBER_VALUE']?></a></p>
            <?endif;?>
            <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_WEB_SITE_VALUE'])): ?>
                <a href="<?=$shop['HOST']?>?utm_source=daichi.ru" class="row-item__site blue" target="_blank"><?= $shop['HOST'] == 'нет данных' ? '' : 'перейти на сайт';?></a>
            <?endif;?>

        </div>
        <div class="offer__sales">
                <div class="offer__sales-title">
                    <?php if( count($promoList) ): ?>Акции и спецпредложения:<?php endif; ?>
                </div>
                <ul class="offer__sales-list">
                    <?php foreach ($promoList as $promo): ?>
                        <li class="offer__sales-item"><?= $promo['UF_DESCRIPTION'] ?></li>
                    <?endforeach;?>
                </ul>
        </div>
        <div class="offer__price">
            <?php if((float) $offer['UF_OLD_PRICE'] > 0): ?>
                <div class="offer__price-now"><span><em>-<?= (int) ( 100 - ( $offer['UF_PRICE'] * 100 / $offer['UF_OLD_PRICE']) ) ?>%</em><?=$offer['UF_PRICE']?></span> <i class="icon-rub">a</i></div>
                <div class="offer__price-old"><span><?=$offer['UF_OLD_PRICE']?></span> <i class="icon-rub">a</i></div>
            <?php else: ?>
                <div class="offer__price-now"><span><?=$offer['UF_PRICE']?></span> <i class="icon-rub">a</i></div>
            <?php endif; ?>

            <?php if ( \Daichi\Tools::checkVal($offer['UF_URL'])): ?>
                <div class="offer__price-btn">
                    <a class="btn" href="<?= $offer['UF_URL'] ?>?utm_source=daichi.ru" target="_blank">В магазин</a>
                </div>
            <?php else: ?>
                <div class="offer__price-btn">
                    <a class="btn" href="<?=$shop['PROPERTY_WEB_SITE_VALUE']?>?utm_source=daichi.ru" target="_blank">В магазин</a>
                </div>
            <?php endif; ?>
        </div>

        <div class="dealer-popup">
            <div class="dealer-popup__back js-dealer-popup_hide"></div>
            <div class="dealer-popup__inner">
                <a role="button" class="close-btn close-btn_lg js-dealer-popup_hide" data-popup="close">Закрыть</a>
                <div class="dealer-popup__body">
                    <div class="dealer-popup__section">
                      <?php if ( \Daichi\Tools::checkVal($shop->getLogo())): ?>
                        <img src="<?= $shop->getLogo(['width' => 187, 'height' => 40]) ?>" class="dealer-popup__logo" alt="<?=$shop['NAME']?>">
                        <div class="dealer-popup__main">
                      <?php else: ?>
                        <div class="dealer-popup__main dealer-popup__main_nologo">
                      <?php endif ?>
                            <h4 class="dealer-popup__link m0"><a class="black" href="http://<?=$shop['HOST']?>?utm_source=daichi.ru" target="_blank"><?=$shop['NAME']?></a></h4>
                            <span class="offer__shop-review m0"><?= $rating['TEXT'] ?></span><span class="offer__shop-rate rate rate_<?= $rating['CLASS'] ?> dealer-popup__stars"></span>
                            <?/*<a href="#" class="btn btn_block dealer-popup__btn">Предложения дилера</a>*/?>
                        </div>
                        <div class="dealer-popup__info"><?= $shop['DETAIL_TEXT'] ?></div>
                        <div class="dealer-popup__features">
                            <? foreach ($shop->getStatus(3600) as $status): ?>
                                <span class="dealer__feature"><?= $status['NAME'] ?></span>
                            <? endforeach; ?>
                        </div>
                    </div>
                    <div class="dealer-popup__section">
                        <ul class="dealer-desc">
                            <?php if ( \Daichi\Tools::checkVal($shop->getAddress())): ?>
                                <li class="dealer-desc__item"><img src="<?= SITE_TEMPLATE_PATH . "/build/"?>img/svg/geo.svg" class="dealer-desc__icon dealer-desc__icon_geo" alt=""><?= $shop->getAddress() ?></li>
                            <?php endif ?>
                            <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_PHONE_NUMBER_VALUE'])): ?>
                                <li class="dealer-desc__item"><img src="<?= SITE_TEMPLATE_PATH . "/build/"?>img/svg/phone.svg" class="dealer-desc__icon" alt=""><?=$shop['PROPERTY_PHONE_NUMBER_VALUE']?></li>
                            <?php endif ?>
                            <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_WEB_SITE_VALUE'])): ?>
                                <li class="dealer-desc__item"><img src="<?= SITE_TEMPLATE_PATH . "/build/"?>img/svg/link.svg" class="dealer-desc__icon" alt="">
                                    <?php if($shop['HOST'] == 'нет данных'):?>
                                        нет данных
                                    <?php else:?>
                                        <a href="<?=$shop['HOST']?>?utm_source=daichi.ru" target="_blank" class="blue">перейти на сайт</a>
                                    <?php endif;?>
                                </li>
                            <?php endif ?>
                            <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_EMAIL_VALUE'])): ?>
                                <li class="dealer-desc__item">Email: <a href="mailto:<?=$shop['PROPERTY_EMAIL_VALUE']?>"> <?=$shop['PROPERTY_EMAIL_VALUE']?> </a> </li>
                            <?php endif ?>
                            <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_SCHEDULE_VALUE'])): ?>
                                <li class="dealer-desc__item"><img src="<?= SITE_TEMPLATE_PATH . "/build/"?>img/svg/worktime.svg" class="dealer-desc__icon" alt=""><?= $shop['PROPERTY_SCHEDULE_VALUE'] ?></li>
                            <?php endif ?>
                        </ul>
                        <ul class="social-list">
                            <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_FACEBOOK_VALUE'])): ?>
                                <li><a class="social-list__icon icon-fb icon-fb_big" href="<?= $shop['PROPERTY_FACEBOOK_VALUE'] ?>" target="_blank" title="Facebook"></a></li>
                            <?php endif ?>
                            <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_VKONTAKTE_VALUE'])): ?>
                                <li><a class="social-list__icon icon-vk icon-vk_big" href="<?= $shop['PROPERTY_VKONTAKTE_VALUE'] ?>" target="_blank" title="ВКонтакте"></a></li>
                            <?php endif ?>
                            <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_TWITTER_VALUE'])): ?>
                                <li><a class="social-list__icon icon-tw icon-tw_big" href="<?= $shop['PROPERTY_TWITTER_VALUE'] ?>" target="_blank" title="Twitter"></a></li>
                            <?php endif ?>
                            <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_ODNOKLASSNIKI_VALUE'])): ?>
                                <li><a class="social-list__icon icon-ok icon-ok_big" href="<?= $shop['PROPERTY_ODNOKLASSNIKI_VALUE'] ?>" target="_blank" title="Одноклассники"></a></li>
                            <?php endif ?>
                            <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_GOOGLE_PLUS_VALUE'])): ?>
                                <li><a class="social-list__icon icon-google icon-google_big" href="<?= $shop['PROPERTY_GOOGLE_PLUS_VALUE'] ?>" target="_blank" title="Google+"></a></li>
                            <?php endif ?>
                        </ul>
                    </div>
                    <?php if ( \Daichi\Tools::checkVal($shop['PROPERTY_SERVICES_VALUE'])): ?>
                        <div class="dealer-popup__section">
                            <h6 class="dealer-popup__title">Услуги</h6>
                            <ul class="dealer-popup__services">
                                <?php foreach ($shop['PROPERTY_SERVICES_VALUE'] as $service): ?>
                                    <li> <?= \Daichi\Models\Base\Shop::getServices(3600)[$result]['VALUE'] ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif ?>

                    <?php if(count($bannerList) || count($promoList)): ?>
                        <div class="dealer-popup__section">
                            <h6 class="dealer-popup__title">Акции и спецпредложения</h6>
                            <?php foreach ($promoList as $promo) echo $promo['UF_DESCRIPTION']."<br>" ?>

                            <?php foreach ($bannerList as $banner): ?>
                                <img src="<?= $banner->getPath(['width' => 624, 'height' => 198]) ?>" class="dealer-popup__banner" alt="<?= $shop['NAME'] ?>"><br>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>


    </div>
<?endforeach;?>
