var filterTimerId;

$(function () {
  if (!!window.dealersPageComponent)
    return;
  $(document).on('click', '.js-dealer-popup_show', function () {
    $('.row-item__feedback-rate').hide();
  });
  $(document).on('click', '.js-dealer-popup_hide', function () {
    $('.row-item__feedback-rate').show();
  });
  $(document)
    .on('click', '.articles__paging_new > div > a', function () {
      var obj = $('.articles__paging_new');
      var page = parseInt(obj.data('page'));
      var lastPage = parseInt(obj.data('lastpage'));

      if (page > lastPage) {
        $('.articles__paging_new').hide();
        return false;
      }

      $.ajax({
        type: "POST",
        url: document.location.href,
        data: {
          action: "show_more",
          "PAGEN_1": page,
          page: page
        },
        success: function (data) {
          $("#js-for-articles-list").append(data['content']);
          $('.js-for-load-acity').html(data.acity);
          obj.data("page", page + 1);
          if (lastPage <= page) $(".articles__paging_new").hide();
          else $(".articles__paging_new").html(data['nav']);
        },
        error: function () {
          $(".articles__paging_new").hide();
        }
      });
    })
    .on('change', '#js-filter-dealers2 > div input', function () {
      var obj = $(this).parents('.filters__unit');
      var page = parseInt(obj.data('page'));
      var lastPage = parseInt(obj.data('lastpage'));
      $("[name=city]").val($("[name=PROPERTY_CITY]").val());
      var filter = $('form#js-filter-dealers2').serializeArray();

      filterDealers(page, lastPage, filter, false, $(this), null);
    })
    .on('click', '.btn-submit-dealer', function (e) {
      e.preventDefault();

      showSpinner();
      $('.js-dealers-filter-tooltip').removeClass('is-active');
      var obj = $(this);
      var page = parseInt(obj.data('page'));
      var lastPage = parseInt(obj.data('lastpage'));
      $("[name=city]").val($("[name=PROPERTY_CITY]").val());
      var filter = $('form#js-filter-dealers2').serializeArray();

      filterDealers(page, lastPage, filter, true, null, 'filter-action');
    })
    .on('click', '.js-load-dealers2', function (e) {
      e.preventDefault();

      showSpinner();
      $('.js-dealers-filter-tooltip').removeClass('is-active');
      var obj = $(this);
      var page = parseInt(obj.data('page'));
      var lastPage = parseInt(obj.data('lastpage'));
      $("[name=city]").val($("[name=PROPERTY_CITY]").val());
      var filter = $('form#js-filter-dealers2').serializeArray();

      filterDealers(page, lastPage, filter, true, null, null);
    })
    .on('click', '.js-dealers-filter-tooltip', function () {
      showSpinner();
      $('.js-dealers-filter-tooltip').removeClass('is-active');
      var obj = $(this);
      var page = parseInt(obj.data('page'));
      var lastPage = parseInt(obj.data('lastpage'));
      $("[name=city]").val($("[name=PROPERTY_CITY]").val());
      var filter = $('form#js-filter-dealers2').serializeArray();

      filterDealers(page, lastPage, filter, true, null, 'filter-action');
    })
    .on('click', '.filters__btn-clear', function (e) {
      e.preventDefault();
      location.reload();
    })
    .on('change', '#region-select', function (e) {
      e.preventDefault();
      var obj = $(this);
      var lastPage = parseInt(obj.data('lastpage'));

      showSpinner();
      $("[name=city]").val($(this).val());
      $('#js-for-load-list-dealers .prod-tab__offer').css('opacity', 0.2);
      $.ajax({
        type: "POST",
        url: document.location.href,
        data: {
          'action': 'ajaxLoad',
          'page': 1,
          'filter': $('form#js-filter-dealers2').serializeArray()
        },
        dataType: 'json',
        success: function (data) {
          hideSpinner();
          if (!data.restricted) {

            var city = $('[name=city]').val();
            var cnt_name = 'dealers-no-results';

            if (
              city == 173
              || city == 614
              || city == 796
              || city == 757
              || city == 144
              || city == 948
              || city == 1029
              || city == 1066
              || city == 47
            ) {
              cnt_name = 'dealers-no-results-restrict';
              $('#' + cnt_name + ' .cat-noresults__change').html('<a href="http://dacnw.ru/" target="_blank">Для просмотра дилеров/сервисных центров в своем регионе перейдите на сайт компании ДАК</a>');
            }
// Вологда, Мурманск, Псков, Петрозаводск, Новгород, Сыктывкар, Ухта, Череповец, Архангельск + Санкт-Петербург
            if (data.count < 1) {
              setTimeout(function () {
                $('#' + cnt_name).show();
              }, 100);

            } else {
              $('#' + cnt_name).hide();
            }
          }
          var page = parseInt(data.page);

          if (page > 1) $('#js-for-load-list-dealers').append(data.content);
          else $('#js-for-load-list-dealers').html(data.content);
          $('.js-for-load-acity').html(data.acity);
          $('#nav-load-more').html(data.nav);

          $('.js-count-dealers').text(data.count);
          if (lastPage <= page) $(".articles__paging_new").hide();
        }
      });
    });

  $('form#js-filter-dealers button[type=reset]').click(function () {
    setTimeout(function (args) {
      $('form#js-filter-dealers').submit();
    }, 100);
  });
  window.dealersPageComponent = true;

});

function filterDealers(page, lastPage, filter, submit, input, filterAction) {
  $.ajax({
    type: "POST",
    url: document.location.href,
    data: {
      'action': 'ajaxLoad',
      'page': page,
      'filter': filter,
      'filterAction': filterAction
    },
    dataType: 'json',
    success: function (data) {
      var page = parseInt(data.page);
      if (submit) {
        if (data.click) {
          setTimeout(function () {
            $('#nav-load-more > a').click();
          }, 100);
        }
        hideSpinner();
        if (page > 1) $('#js-for-load-list-dealers').append(data.content);
        else $('#js-for-load-list-dealers').html(data.content);
        $('.js-for-load-acity').html(data.acity);
        $('#nav-load-more').html(data.nav);
        //Кастомный скроллбар после инициализации
        if (!global.isTouch() && $('.dealer-popup__body').length > 0) {
          $('.dealer-popup__body').mCustomScrollbar({
            theme: 'minimal-dark'
          });
        }

        $('.js-count-dealers').text(data.count);
        if (lastPage <= page) $(".articles__paging_new").hide();
        if (data.last_count < 1) $('.js-load-dealers2').hide();
        if (data.count < 1) {
          $('#dealers-no-results').show();
          $('html, body').animate({
            scrollTop: $("#dealers-no-results").offset().top
          }, 1000);
        }
        if (data.count >= 1) $('#dealer-no-results').hide();
      } else {
        if (input != null) {
          clearTimeout(filterTimerId);
          var filter_unit = $(input).parents('.filters__unit');
          var offset_top = $(input).offset().top - $('.filters').offset().top + $(input).outerHeight() / 2;
          $('.js-dealers-filter-tooltip').css('top', (offset_top + 'px'));
          $('#js-dealers-tooltip-count').html(data.count + " " + data.word);
          $('.js-dealers-filter-tooltip').addClass('is-active');

          filterTimerId = setTimeout(function () {
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

  window.setTimeout(function () {
    $spinner.css({
      'visibility': 'hidden'
    });
  }, 1000)
}
