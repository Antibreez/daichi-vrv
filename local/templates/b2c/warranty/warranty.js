$(".code1, .code2, .code3").bind("keyup", function () {
    var code1 = $(".code1").val();
    var code2 = $(".code2").val();
    var code3 = $(".code3").val();
    $("#code_all_data").val(code1 + code2 + code3);
});

function inpJump(x) {
    var ml = ~~x.getAttribute('maxlength');
    if (ml && x.value.length >= ml) {
        do {
            x = x.nextSibling;
        }
        while (x && !(/text/.test(x.type)));
        if (x && /text/.test(x.type)) {
            x.focus();
        }
    }
}


// AJAX запрос
//$('.warranty_ajax_result').hide();
// $('#warranty_finde').submit(function(){
//
//     var code1 = $('#CODE1').val();
//     var code2 = $('#CODE2').val();
//     var code2 = $('#CODE3').val();
//     $.ajax({
//         type: "POST",
//         url: "/warranty/ajax/finde_product.php",
//         data: {
//             'CODE1': code1,
//             'CODE2': code2,
//             'CODE3': code3,
//         },
//         dataType: "json",
//         success: function(data){
//             if(data.result == 'success'){
//                 alert('код найден');
//             }else{
//                 alert('Код не найден или зарегистрирован');
//             }
//         }
//     });
//     return false;
// });





/* Локализация datepicker */
$.datepicker.regional['ru'] = {
    closeText: 'Закрыть',
    prevText: 'Предыдущий',
    nextText: 'Следующий',
    currentText: 'Сегодня',
    monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
    monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
    dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
    dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
    dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
    weekHeader: 'Не',
    dateFormat: 'dd.mm.yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['ru']);

$(document).ready(function () {
    $("#BYER_DATE").datepicker({dateFormat: 'dd.mm.yy'});
});




$("#phone").mask('+7(999)999-9999');