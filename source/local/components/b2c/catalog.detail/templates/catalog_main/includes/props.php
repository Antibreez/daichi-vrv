<div class="prod-tab product__tabs-item js-tabs-item" id="props">
    <a class="prod-tab__spoiler-btn js-prod-tab-spoiler js-all-props-mobile" role="button">Характеристики</a>
    <div class="prod-tab__spoiler-content js-spoiler-body">

        <?foreach ($arResult['VISIBLE'] as $visible):?>
            <div class="prod-tab__main for-prod-props">
                <?if (count($visible['VALUES']) > 0):?>
                    <?if ($visible['NAME'] != 'Скрытые'):?>
                        <h2 class="prod-tab__title"><?=$visible['NAME']?></h2>
                        <ul class="prod-props">
                            <?$temp = [];?>
                            <?foreach ($visible['VALUES'] as $value):?>
                                <?if (!in_array($value["NAME"], $temp)):?>
                                    <?$temp[] = $value["NAME"];?>
                                    <li class="prod-props__item">
                                        <div class="prod-props__name"><span><?= htmlspecialcharsback($value["NAME"]);?></span></div>
                                        <div class="prod-props__data">
                                    <span>
                                        <?if (is_array($value["VALUE"])):?>
                                            <?foreach ($value["VALUE"] as $one):?>
                                                <?= nl2br($one);?>
                                            <?endforeach;?>
                                        <?else:?>
                                            <?= nl2br(ucfirst($value["VALUE"]));?>
                                        <?endif;?>
                                    </span>
                                        </div>
                                    </li>
                                <?endif;?>
                            <?endforeach;?>
                        </ul>
                    <?endif;?>
                <?endif;?>
            </div><!-- END prod-tab__main -->
        <?endforeach;?>




        <?/*<aside class="prod-tab__side for-prod-props">
            <?if(count($arResult["PROPERTIES"]['REVIEWS'])>0):?>
                <div class="prod-tab__side-unit">
                    <h3 class="prod-tab__side-title">Обзоры</h3>
                    <div class="overview">
                        <div class="overview__video">
                            <iframe class="overview__frame" width="640" height="360" allowfullscreen
                                    src="<?=$arResult["PROPERTIES"]['REVIEWS'][0]['LINK']?>?showinfo=0&amp;rel=0&amp;autoplay=0">
                            </iframe>
                        </div>
                        <div class="overview__text"><?=$arResult["PROPERTIES"]['REVIEWS'][0]['NAME']?></div>
                        <?if(count($arResult["PROPERTIES"]['REVIEWS'])>1):?>
                            <div class="overview__more">
                                <a class="btn btn_link overview__more-link js-video-tab_show" role="button">Еще <?=count($arResult["PROPERTIES"]['REVIEWS'])-1?> видео</a>
                            </div>
                        <?endif;?>
                    </div>
                </div>
            <?endif;?>
            <?if(count($arResult["PROPERTIES"]['ARTICLES'])>0):?>
                <div class="prod-tab__side-unit">
                    <h3 class="prod-tab__side-title">Статьи</h3>
                    <div class="overview">
                        <ul class="overview__list for-aside">
                            <?foreach ($arResult["PROPERTIES"]['ARTICLES'] as $ARTICLE):?>
                                <li class="overview-article">
                                    <h5 class="overview-article__title"><a href="<?=$ARTICLE['LINK']?>"><?=$ARTICLE['NAME']?></a></h5>
                                    <div class="overview-article__link"><a href="<?=$ARTICLE['LINK']?>"><?=$ARTICLE['LINK']?></a></div>
                                </li>
                            <?endforeach;?>
                        </ul>
                    </div>
                </div>
            <?endif;?>
        </aside><!-- END prod-tab__side -->*/?>

    </div><!-- END prod-tab__spoiler-content -->
</div><!-- END product__tabs-item #prod_props -->