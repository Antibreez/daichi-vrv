<div style="margin-top: -30px;" class="prod-tab product__tabs-item js-tabs-item is-active" id="offers">
    <h2 class="product__tabs-title"><a href="#" id="show-dealers-link" class="blue">Посмотреть общий список дилеров</a></h2>
    <a class="prod-tab__spoiler-btn js-prod-tab-spoiler js-prod-offers-mobile is-active" role="button">Предложения <span><?=$arResult['OFFERS']['COUNT']?></span></a>
    <div class="prod-tab__spoiler-content js-spoiler-body" style="display: block">
        <div class="sorting prod-tab__head">
            <div style="padding-top: 25px;" class="sorting__item">
                <a class="sorting__mob-btn js-mob-filter_toggle" role="button">Фильтр</a>
                <h4 class="sorting__title">Сортировать:</h4>
                <div class="sorting__by js-sorting-list">
                    <div class="sorting__by-list js-offers-sort-list">
                        <div class="sorting__by-item is-active">
                            <a class="sorting__by-btn js-offers-sort" data-order-key="UF_PRICE" role="button">
                                <span>По цене</span>
                                <i class="sorting__icon icon-az"></i>
                            </a>
                        </div>
<?/*
                        <div class="sorting__by-item">
                            <a class="sorting__by-btn js-offers-sort" role="button">
                                <span>По рейтингу</span>
                                <i class="sorting__icon icon-za"></i>
                            </a>
                        </div>
                        <div class="sorting__by-item">
                            <a class="sorting__by-btn js-offers-sort" role="button">
                                <span>По отзывам</span>
                                <i class="sorting__icon icon-za"></i>

                                <!-- <i class="sorting__icon"></i> -->
                            </a>
                        </div>
                        <div class="sorting__by-item">
                            <a class="sorting__by-btn js-offers-sort" role="button">
                                <span>По размеру скидки</span>
                                <i class="sorting__icon icon-za"></i>
                                <!-- <i class="sorting__icon"></i> -->
                            </a>
                        </div>
*/?>
                    </div>
                    <div class="sorting__arrow js-dropdown-btn"></div>
                </div>
            </div>

            <!--div class="sorting__item sorting__side">
                <div class="sorting__geo">
                    <span class="sorting__geo-name"><?=\GeoHelper::getCurrentCity()['NAME']?></span><a class="sorting__geo-btn" role="button"></a>
                </div>
            </div-->
        </div>
        <!-- END prod-tab__head -->

        <script>
        var filterTimerId;
            $(document).on('click', '#show-dealers-link', function (e) {
                e.preventDefault();
                console.log('покажи дилеров');
                $(this).hide();
                $('#offers').hide();
                $('#offers-link').hide();
                $('#dealers').show();
                $('#show-offers-link').show();
                $('#where-to-buy-link').show();
                $('#where-to-buy-link').click();
                /*$.ajax({
                    url: "/catalog/ajax/dealers-offers-selector.php",
                    method: "post",
                    data: {
                        action: 'selector',
                        show: 'dealers'
                    },
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        $('.product__tabs-body').html(data.html);
                    }
                });*/
            });
            $(document).on('click', '.js-load-offers-prod', function () {
            	showSpinner();
                $.ajax({
                    method: 'post',
                    url: '/ajax/offers-get-more.php',
                    data: {
                        'FILTER': $('#js-filter-offers-from-product-card').serializeArray(),
                        'product': window.location.href,
                        'count': <?=$arResult['OFFERS']['COUNT'] - 10?>,
                        'action': 'offers-more',
                    },
                    dataType: 'json',
                    success: function (data) {
                    	hideSpinner();
                        if ((<?=$arResult['OFFERS']['COUNT'] - 10?> - 10) < 1) $('.js-load-offers-prod').hide();
                        $('.js-for-load-offers').empty();
                        $('.js-for-load-offers').replaceWith(data.offers);
                    }
                });
            });
            $(document).on('change', '#js-filter-offers-from-product-card > div input', function() {
                $("[name=city]").val($("[name=PROPERTY_CITY]").val());
                var filter = $('form#js-filter-offers-from-product-card').serializeArray();

                filterDealers(filter, false, $(this), true);
            });
            $(document).on('submit', '#js-filter-offers-from-product-card', function (e) {
                e.preventDefault();

                showSpinner();
                $('.js-offers-filter-tooltip').removeClass('is-active');
                $("[name=city]").val($("[name=PROPERTY_CITY]").val());
                var filter = $('form#js-filter-offers-from-product-card').serializeArray();

                filterDealers(filter, true, null, false);
            });
            $(document).on('click', '.js-offers-filter-tooltip', function () {
                showSpinner();
                $('.js-offers-filter-tooltip').removeClass('is-active');
                $("[name=city]").val($("[name=PROPERTY_CITY]").val());
                var filter = $('form#js-filter-offers-from-product-card').serializeArray();

                filterDealers(filter, true, null, false);
            });
            $(document).on('reset', '#js-filter-offers-from-product-card', function (e) {
                e.preventDefault();
                location.reload();
            });

            function showSpinner () {
                var $spinner = $('.js-spinner');
                $spinner.css({'visibility': 'visible', 'opacity':'1'});
            }

            function hideSpinner () {
                var $spinner = $('.js-spinner');

                $spinner.css({'opacity': '0'});

                window.setTimeout(function () {
                    $spinner.css({'visibility': 'hidden'});
                }, 1000)
            }

            function filterDealers(filter, submit, input, getOnlyCount) {
                $.ajax({
                    method: 'post',
                    url: '/ajax/offers-get.php',
                    data: {
                        'FILTER': filter,
                        'product': window.location.href,
                        'action': 'offers-filter',
                        'get-only-count': getOnlyCount
                    },
                    'dataType': 'json',
                    success: function (data) {
                        console.log(data);
                        if (submit) {
                            hideSpinner();
                            if (data.count <= 10) $('.js-load-offers-prod').hide();
                            else $('.js-load-offers-prod').show();

                            if (data.count < 1) {
                                $('#offers-no-results').show();
                                $('.prod-tab__offer').hide();
                                $('html, body').animate({
                                    scrollTop: $(".sorting__title").offset().top
                                }, 1000);
                            } else {
                                $('#offers-no-results').hide();
                                $('.prod-tab__offer').show();
                            }

                            $('.js-prod-offers-desktop > span').replaceWith("<span>" + data.count + "</span>");
                            $('.js-for-load-offers').empty().append(data.offers);
                        } else {
                          if (input != null) {
                              clearTimeout(filterTimerId);
                              var filter_unit = $(input).parents('.filters__unit');
                              var offset_top = $(input).offset().top - $('.filters').offset().top + $(input).outerHeight() / 2;

                              $('.js-offers-filter-tooltip').css('top', (offset_top + 'px'));
                              $('#js-offers-tooltip-count').html(data.count + " " + data.word);
                              $('.js-offers-filter-tooltip').addClass('is-active');

                              filterTimerId = setTimeout(function() {
                                  $('.js-offers-filter-tooltip').removeClass('is-active');
                              }, 5000);
                          }
                        }
                    }
                });
            }
        </script>

        <span id="offers-filter" style="display: none;"></span>

        <div class="prod-tab__main for-prod-offers">
            <div id="offers-no-results" style="display: none;" class="cat-noresults">
                <img src="<?=SITE_TEMPLATE_PATH?>/build/img/svg/search_gradient.svg" class="cat-noresults__image" alt="Ничего не найдено">
                <h3 class="cat-noresults__title">Нет подходящих предложений</h3>
                <div class="cat-noresults__change">Попробуйте изменить условия поиска.</div>
                <div class="cat-noresults__reset">
                    <a class="btn btn_border btn_block" href="<?= $_SERVER['REQUEST_URI'];?>">Сбросить фильтры</a>
                </div>
            </div>
            <div class="prod-tab__offers js-for-load-offers">
                <?$APPLICATION->IncludeFile($templateFolder . '/includes/offers-1-list.php', ['arResult' => $arResult])?>
            </div><!-- END prod-tab__offers -->
            <?if(($arResult['OFFERS']['COUNT'] - 10) > 0):?>
                <div id="all-offers" class="content-more prod-tab__more">
                    <a class="content-more__btn js-load-offers-prod" role="button" data-offset="10" data-count-all="<?=$arResult['OFFERS']['COUNT']?>">
                        <i class="content-more__icon"></i>
                        <span class="content-more__text" data-text="Показать еще <?=$arResult['OFFERS']['COUNT'] % 10?> <?=getWordDeclination(($arResult['OFFERS']['COUNT'] % 10), ['предложение', 'предложения', 'предложений'])?>">
                            <?if($arResult['OFFERS']['COUNT'] < 20):?>
                                Показать еще <?=$arResult['OFFERS']['COUNT'] - 10?> <?=getWordDeclination(($arResult['OFFERS']['COUNT'] - 10), ['предложение', 'предложения', 'предложений'])?>
                            <?else:?>
                                Показать еще 10 предложений
                            <?endif;?>

                        </span>
                    </a>
                </div>
            <?endif;?>
        </div><!-- END prod-tab__main -->
    </div><!-- END prod-tab__spoiler-content -->
</div><!-- END product__tabs-item #prod_offers -->


<?$APPLICATION->IncludeFile($templateFolder . '/includes/offers-2.php', ['arResult' => $arResult, 'templateFolder' => $templateFolder, 'hide' => true])?>
