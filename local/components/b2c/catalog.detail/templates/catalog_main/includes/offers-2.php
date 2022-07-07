<div <?= $hide ? 'style="display: none;"' : '';?> class="prod-tab product__tabs-item js-tabs-item is-active" id="dealers">
    <h2 class="product__tabs-title" style="margin-top: -29px;"><a style="display: none; font-size: 20px;" href="#" id="show-offers-link" class="blue">Посмотреть ценовые предложения</a></h2>
    <?$filterParameters = explode(',', sprint_options_get('WHERE_TO_BUY_FILTER'));?>
    <?foreach ($filterParameters as $key => $parameter):?>
        <?$filterParameters[$key] = trim($parameter);?>
    <?endforeach;?>
    <?$_SESSION['PRODUCT_ID'] = $arResult['CODE'];?>
    <?$_SESSION['PRODUCT_NAME'] = $arResult['NAME'];?>
    <span id="dealers_offers" class="product__dealers-offers" data-code="<?= $arResult['CODE'];?>" data-name="<?= $arResult['NAME'];?>">
        <?php

        $filterParameters = explode(',', sprint_options_get('WHERE_TO_BUY_FILTER'));
        foreach ($filterParameters as $key => $parameter) {
            $filterParameters[$key] = trim($parameter);
        }

        $APPLICATION->IncludeComponent(
            "b2c:dealers.list",
            "catalog",
            array(
                "USER_FILTER" => $filterParameters,
                'PRODUCT_ID' => $_SESSION['PRODUCT_ID'],
                'PRODUCT_NAME' => $_SESSION['PRODUCT_NAME']
            ),
            false
        );
        ?>
    </span>

</div><!-- END product__tabs-item #prod_dealers -->

<script>
    var filterTimerId;

    $(document).on('click', '.js-dealer-popup_show', function () {
        $('.row-item__feedback-rate').hide();
    });
    $(document).on('click', '.js-dealer-popup_hide', function() {
        $('.row-item__feedback-rate').show();
    });
    $(document).on('change', '#js-filter-dealers2 > div input', function() {
        var obj = $(this).parents('.filters__unit');
        var page = parseInt(obj.data('page'));
        var lastPage = parseInt(obj.data('lastpage'));
        $("[name=city]").val($("[name=PROPERTY_CITY]").val());
        var filter = $('form#js-filter-dealers2').serializeArray();

        filterDealers2(page, lastPage, filter, false, $(this), null);
    })
    .on('click', '.js-dealers-filter-tooltip', function() {
        showSpinner();
        $('.js-dealers-filter-tooltip').removeClass('is-active');
        var obj = $(this);
        var page = parseInt(obj.data('page'));
        var lastPage = parseInt(obj.data('lastpage'));
        $("[name=city]").val($("[name=PROPERTY_CITY]").val());
        var filter = $('form#js-filter-dealers2').serializeArray();

        filterDealers2(page, lastPage, filter, true, null, 'filter-action');
    })
    .on('reset', '#js-filter-dealers2', function() {
            location.reload();
        })
    .on('click', '.btn-submit-dealer-2', function(e) {
        e.preventDefault();
        showSpinner();
        $('.js-dealers-filter-tooltip').removeClass('is-active');
        var obj = $(this);
        var page = parseInt(obj.data('page'));
        var lastPage = parseInt(obj.data('lastpage'));
        $("[name=city]").val($("[name=PROPERTY_CITY]").val());
        var filter = $('form#js-filter-dealers2').serializeArray();

        filterDealers2(page, lastPage, filter, true, null, 'filter-action');
    })
    .on('click', '.js-load-dealers2', function(e) {
        e.preventDefault();

        $('.content-more__text').hide();
        showSpinner();
        $('.js-dealers-filter-tooltip').removeClass('is-active');
        var obj = $(this);
        var page = parseInt(obj.data('page'));
        var lastPage = parseInt(obj.data('lastpage'));
        $("[name=city]").val($("[name=PROPERTY_CITY]").val());
        var filter = $('form#js-filter-dealers2').serializeArray();
        $(this).show();

        filterDealers2(page, lastPage, filter, true, null, null);
    })
	$(document).on('click', '#show-offers-link', function (e) {
        e.preventDefault();
        $('#show-dealers-link').show();
        $('#offers').show();
        $('#dealers').hide();
        $(this).hide();
        $('#where-to-buy-link').hide();
        $('#offers-link').show();
        $('#offers-link').click();
    });

    function filterDealers2(page, lastPage, filter, submit, input, filterAction) {
        $.ajax({
            type: "POST",
            url: "/catalog/ajax/dealers-get.php",
            data: {
                'action': 'ajaxLoad',
                'page': page,
                'filter': filter,
                'filterAction': filterAction
            },
            dataType: 'json',
            error: function (error) {
                console.log(error);
            },
            success: function(data) {
                console.log(data);
                var page = parseInt(data.page);
                if (submit) {
                    if (data.click) {
                        setTimeout(function() {
                            $('#nav-load-more > a').click();
                        }, 100);
                    }
                    hideSpinner();
                    if (page > 1) $('#js-for-load-list-dealers').append(data.content);
                    else $('#js-for-load-list-dealers').html(data.content);
                    $('#nav-load-more').html(data.nav);
                    //Кастомный скроллбар после инициализации
                    /*if (!global.isTouch() && $('.dealer-popup__body').length > 0) {
                        $('.dealer-popup__body').mCustomScrollbar({
                            theme: 'minimal-dark'
                        });
                    }*/

                    $('.js-count-dealers').text(data.count);
                    if (lastPage <= page) $(".articles__paging_new").hide();
                    console.log('asdasddasdasd');
                    if (data.count < 1) {
                        $('#dealers-no-results').show();
                        $('html, body').animate({
                            scrollTop: $("#dealers-no-results").offset().top
                        }, 1000);
                        $('.js-for-load-acity').hide();
                    }
                    if (data.count >= 1) $('#dealers-no-results').hide();
                } else {
                    if (input != null) {
                        clearTimeout(filterTimerId);
                        var filter_unit = $(input).parents('.filters__unit');
                        var offset_top = $(input).offset().top - $('.filters').offset().top + $(input).outerHeight() / 2;
                        $('.js-dealers-filter-tooltip').css('top', (offset_top + 'px'));
                        $('#js-dealers-tooltip-count').html(data.count + " " + data.word);
                        $('.js-dealers-filter-tooltip').addClass('is-active');

                        filterTimerId = setTimeout(function() {
                            $('.js-dealers-filter-tooltip').removeClass('is-active');
                        }, 5000);
                    }
                }
            }
        });
    }


function showSpinner() {
    var $spinner = $('.js-spinner');
    $spinner.css({
        'visibility': 'visible',
        'opacity': '1'
    });
}

function hideSpinner() {
    var $spinner = $('.js-spinner');

    $spinner.css({
        'opacity': '0'
    });

    window.setTimeout(function() {
        $spinner.css({
            'visibility': 'hidden'
        });
    }, 1000)
}

</script>
