<div class="prod-tab product__tabs-item js-tabs-item" id="posting">
    <a class="prod-tab__spoiler-btn js-prod-tab-spoiler" role="button">Статьи и обзоры <span><?=count($arResult['PROPERTIES']['REVIEWS']) + count($arResult['PROPERTIES']['ARTICLES'])?></span></a>

    <div class="prod-tab__spoiler-content js-spoiler-body">

        <?if(count($arResult['PROPERTIES']['REVIEWS'])>0):?>
            <h2 class="prod-tab__title">Обзоры</h2>
            <div class="prod-tab__videos">
                <?foreach ($arResult['PROPERTIES']['REVIEWS'] as $REVIEW):?>
                    <div class="prod-tab__video overview">
                        <div class="overview__video">
                            <iframe class="overview__frame" width="640" height="360" allowfullscreen
                                    src="<?=$REVIEW['LINK']?>?showinfo=0&amp;rel=0&amp;autoplay=0">
                            </iframe>
                        </div>
                        <div class="overview__text"><?=$REVIEW['NAME']?></div>
                    </div>
                <?endforeach;?>
            </div>
        <?endif;?>

        <?if((count($arResult['PROPERTIES']['ARTICLES']) + count($arResult['PROPERTIES']['ARTICLES_INTERNAL']) + count($arResult['PROPERTIES']['NEWS']))>0):?>
            <h2 class="prod-tab__title">Статьи</h2>
            <div class="prod-tab__articles overview">
                <ul class="overview__list">
                    <?foreach (['ARTICLES', 'ARTICLES_INTERNAL', 'NEWS'] as $prop):?>
                        <?foreach ((array)$arResult['PROPERTIES'][$prop] as $ARTICLE):?>
                            <li class="overview-article">
                                <h5 class="overview-article__title">
                                    <i class="overview-article__icon" style="background-image: url('https://www.google.com/s2/favicons?domain=<?=parse_url($ARTICLE['LINK'])['host']?>');"></i>
                                    <a href="<?=$ARTICLE['LINK']?>"><?=$ARTICLE['NAME']?></a>
                                </h5>
                                <div class="overview-article__link">
                                    <a href="<?=$ARTICLE['LINK']?>"><?=$ARTICLE['LINK']?></a>
                                </div>
                            </li>
                        <?endforeach;?>
                    <?endforeach;?>
                </ul>
            </div>
        <?endif;?>

    </div><!-- END prod-tab__spoiler-content -->
</div><!-- END product__tabs-item #prod_posting -->