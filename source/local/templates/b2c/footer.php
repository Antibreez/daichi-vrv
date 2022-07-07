<footer class="footer">
    <div class="container">

        <div class="footer__top">
            <div class="footer__side">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "footer",
                    array(
                        "MENU_CACHE_TIME" => "3600",
                        "ROOT_MENU_TYPE" => "top"
                    ),
                    false
                );?>
                <ul class="footer__cont">
                    <?= \Daichi\Tools::listIncludeAreas(2, 'footer/phone') ?>
                </ul>
                <ul class="footer__sonet">
                    <?= \Daichi\Tools::includeArea('footer/socserv') ?>
                </ul>
            </div>


            <style>
                .footer-menu-desktop {display: block;}
                @media(max-width: 1023px){
                    .footer-menu-desktop {display: none;}
                }
                @media(max-width: 767px){
                    .footer-menu-desktop {display: none;}
                }
            </style>

            <div class="footer__main js-accordions-footer">

                <div class="footer__unit">
                    <h5 class="footer__title js-accordion-head">Программы обслуживания клиентов</h5>
                    <ul class="footer__menu" style="">
                        <li><a href="/promo/my-comfort/">Мой комфорт</a></li>
                        <li><a href="/promo/climat-online/">Климат онлайн</a></li>
                        <li><a href="/promo/mobile-control/">Мобильное управление</a></li>
                        <li><a href="/checkaccount/">Проверить статус договора</a></li>
                    </ul>
                </div>


                <?foreach (PromoHelper::getListForMenu() as $equipment):?>
                    <?if($equipment['XML_ID']==PromoHelper::SPLIT_XML_ID):?>
                        <?foreach ($equipment['brands'] as $brand):?>
                        <div class="footer__unit footer-menu-desktop">
                            <h5 class="footer__title js-accordion-head"><?=$equipment['name']?> <?=$brand['name']?></h5>
                            <ul class="footer__menu">
                                <?foreach ($brand['promos'] as $promo):?>
                                    <li><a href="<?=MAIN_DAICHI_URL?><?=PromoHelper::getLink($promo['CODE'])?>"><?=$promo['NAME']?></a></li>
                                <?endforeach;?>
                            </ul>
                        </div>
                        <?endforeach;?>
                    <?else:?>
                        <div class="footer__unit footer-menu-desktop">
                            <h5 class="footer__title js-accordion-head"><?=$equipment['name']?></h5>
                            <ul class="footer__menu">
                                <?foreach ($equipment['brands'] as $brand):?>
                                    <?foreach ($brand['promos'] as $promo):?>
                                        <li><a href="<?=MAIN_DAICHI_URL?><?=PromoHelper::getLink($promo['CODE'])?>"><?=PromoHelper::getNameWithBrand($brand['name'], $promo['NAME'])?></a></li>
                                    <?endforeach;?>
                                <?endforeach;?>
                            </ul>
                        </div>
                    <?endif;?>
                <?endforeach;?>

            </div>
        </div><!-- END footer__top -->

        <div class="footer__btm">
            <div class="footer__btm-lt">
                <ul class="footer__btm-info">
                    <li><?= \Daichi\Tools::includeArea('footer/copyright.php') ?></li>
                    <li><?= \Daichi\Tools::includeArea('footer/rules.php') ?></li>
                </ul>
            </div>
            <div class="footer__btm-rt">
                <div class="footer__btm-made">Сделано в <a href="http://greensight.ru/">Greensight</a></div>
            </div>
        </div><!-- END footer__btm -->

    </div><!-- END container -->
</footer><!-- END Site footer-->

</div><!-- END wrap-main -->

<?php $GLOBALS['APPLICATION']->ShowViewContent('cities_popup') ?>
<?php $APPLICATION->IncludeComponent("b2c:dealer.popup", "", [], false) ?>

<?php include($_SERVER["DOCUMENT_ROOT"] . "/local/cookie.php"); ?>


<script src="<?= SITE_TEMPLATE_PATH;?>/build/js/external.js" type="text/javascript" defer></script>
    <script src="<?= SITE_TEMPLATE_PATH;?>/build/js/internal.js" type="text/javascript" defer></script>
<?php \Daichi\Ajax::initToken() ?>


<?if(CSite::InDir('/warranty/')){?>
    <script src="<?= SITE_TEMPLATE_PATH;?>/warranty/datapicker.min.js"></script>
    <script src="<?= SITE_TEMPLATE_PATH;?>/warranty/warranty.min.js"></script>
    <!--link href="<?= SITE_TEMPLATE_PATH;?>/warranty/warranty_registration.min.css" rel="stylesheet"-->
<?}?>


<script src="/h/assets/support.js?nocache=<?=$cacheLock?>"></script>

<?if(!isset($thisPage) || $thisPage <> "index"):?>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5CDVXGM');</script>
    <!-- End Google Tag Manager -->

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5CDVXGM%22";
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-153502112-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-153502112-1');
    </script>


    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(32876370, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/32876370" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

<?endif?>

</body>
</html>
