$(document).ready(function () {
    $('#show-search-desktop').one('click', function () {
        $.ajax({
            url: '/ajax/search-ajax.php',
            method: 'get',
            data: {'q' : $(this).val()},
            dataType: 'json',
            success: function (data) {
                $.each(data, function (key, value) {
                    $.each(value, function (index, value) {
                        var selector;
                        if (value.Type == 'Популярное') selector = $('#popular-block');
                        if (value.Type == 'Категории') selector = $('#category-block');
                        if (value.Type == 'Статьи') selector = $('#articles-block');
                        selector.children().removeAttr('style');
                        selector.append('<a class="black" href="' + value.Link + '">' + value.Name + '</a>');
                    })
                });
            }
        });
    });

    $('#show-search-desktop2').one('click', function () {
        $.ajax({
            url: '/ajax/search-ajax.php',
            method: 'get',
            data: {'q' : $(this).val()},
            dataType: 'json',
            success: function (data) {
                $.each(data, function (key, value) {
                    $.each(value, function (index, value) {
                        var selector;
                        if (value.Type == 'Популярное') selector = $('#popular-block2');
                        if (value.Type == 'Категории') selector = $('#category-block2');
                        if (value.Type == 'Статьи') selector = $('#articles-block2');
                        selector.children().removeAttr('style');
                        selector.append('<a class="black" href="' + value.Link + '">' + value.Name + '</a>');
                    })
                });
            }
        });
    });
});