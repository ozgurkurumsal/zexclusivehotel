$(document).ready(function () {
    "use strict";
    /* Responsive menu*/
    if ($("#mp-menu").length > 0)
        new mlPushMenu(document.getElementById('mp-menu'), document.getElementById('sys_btn_toogle_menu'), { dockSide: "right" });

    // Heading large	
    var doMargintop = -$(".decription-override").outerHeight() / 2;
    $(".decription-override").css("margin-top", doMargintop);

    //=============== IF IE 8 ===================
    var rex = new RegExp("MSIE 8.0");
    var trueIE = rex.test(navigator.userAgent);

    if (trueIE) {
        jQuery('#mp-menu').hide();
        // jQuery('.md-slide').find('LI').children('IMG').css({
        // 	top: '0px',
        // 	left: '0px'
        // });
        jQuery('.content-slide .home-content').css({
            left: '24%',
            top: '25%'
        });
    }
    $('input[name="searchguest"]')
    .focusin(function () {
        $(".popoverWrap").removeClass("block");
        $(".popoverWrap.guestField").addClass("block");
    });
    $("#adult, #child").on("change", function () {
        var adult = $("#adult").val();
        var child = $("#child").val();
        var personCount = parseInt(adult) + parseInt(child);
        var searchCount = personCount + " Misafir";
        $('input[name="searchguest"]').val(searchCount);
    });
    $(".popoverWrap .popoverCloseBtn").click(function () {
        $(".popoverWrap").removeClass("block");
    });
    $("#owl-slider").owlCarousel({
        slideSpeed: 300,
        paginationSpeed: 400,
        autoPlay: 5000,
        singleItem: true,
        pagination: false,
        navigation: true,
        navigationText: ['<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>']
    });
    $("#owl-roomList").owlCarousel({
        slideSpeed: 300,
        paginationSpeed: 400,
        autoPlay: 3000,
        singleItem: false,
        items: 3,
        itemsDesktop: [1180, 3],
        itemsDesktopSmall: [991, 2],
        itemsTablet: [640, 1],
        itemsMobile: [420, 1],
        pagination: false,
        navigation: true,
        navigationText: ['<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>']
    });
    $("#owl-photoGallery").owlCarousel({
        slideSpeed: 300,
        paginationSpeed: 400,
        autoPlay: 5000,
        singleItem: false,
        items: 3,
        itemsDesktop: [1180, 3],
        itemsDesktopSmall: [991, 3],
        itemsTablet: [640, 2],
        itemsMobile: [420, 1],
        pagination: false,
        navigation: true,
        navigationText: ['<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>']
    });
    $(".owl-roomGallery").owlCarousel({
        slideSpeed: 300,
        paginationSpeed: 400,
        autoPlay: 3000,
        singleItem: true,
        pagination: false,
        navigation: true,
        navigationText: ['<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>']
    });
    if ($(".photoGallery").length > 0) {
        $(".photoGallery").lightGallery({
            selector: 'a',
            fullScreen: true,
            thumbnail: true
        });
        $(".photoGallery").on('onCloseAfter.lg',function(event){
            $("#detailGallery").hide();
        }); 
    }
});

function creditCart() {
    $("#bankTransfer").fadeOut();
    $("#creditCart").fadeIn();
    $("#creditCart input").prop("required", true);
}

function bankTransfer() {
    $("#creditCart").fadeOut();
    $("#bankTransfer").fadeIn();
    $("#creditCart input").removeAttr("required");
}

if ($(".searchdate").length > 0) {
    var defaultDate = new Date();
    $(".searchdate").datepicker({
        minDate: +0
    }).datepicker('setDate', defaultDate);
    $(".enddate").datepicker({
        minDate: +1
    }).datepicker('setDate', defaultDate);
    $(function () {
        $(".searchdate").datepicker({
            monthNamesShort: $.datepicker.regional["tr"].monthNames,
            minDate: +0,
            onSelect: function () {
                var start_date = $(".searchdate").val();
                var a = start_date.substring(0, 2);
                var b = start_date.substring(3, 5);
                var c = start_date.substring(6, 10);
                var start_date = new Date(c + "-" + b + "-" + a);
                var end_date = new Date(c + "-" + b + "-" + a);
                if ($(".enddate").val() == "" || start_date > end_date) {
                    var start_time = new Date(start_date);
                    start_time.setDate(start_time.getDate() + 1);
                    var ay = ((start_time.getMonth() + 1).toString().length == 1) ? "0" + (start_time.getMonth() + 1).toString() : (start_time.getMonth() + 1).toString();
                    var gun = (start_time.getDate().toString().length == 1) ? "0" + start_time.getDate().toString() : start_time.getDate().toString();
                    $(".enddate").val(gun + "." + ay + "." + start_time.getFullYear());
                }
            },
            onClose: function (selectedDate) {
                $(".enddate").datepicker("option", "minDate", selectedDate).focus();
            }
        });
        $(".enddate").datepicker({ minDate: 0, monthNamesShort: $.datepicker.regional["tr"].monthNames });
    });
}

$('.btn-number').click(function (e) {
    e.preventDefault();
    var fieldName = $(this).attr('data-field');
    var type = $(this).attr('data-type');
    var input = $("input[name='" + fieldName + "']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if (type == 'minus') {
            var minValue = parseInt(input.attr('min'));
            if (!minValue) minValue = 0;
            if (currentVal > minValue) {
                input.val(currentVal - 1).change();
            }
            if (parseInt(input.val()) == minValue) {
                $(this).attr('disabled', true);
            }
        } else if (type == 'plus') {
            var maxValue = parseInt(input.attr('max'));
            if (!maxValue) maxValue = 9999999999999;
            if (currentVal < maxValue) {
                input.val(currentVal + 1).change();
            }
            if (parseInt(input.val()) == maxValue) {
                $(this).attr('disabled', true);
            }
        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function () {
    $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function () {
    var minValue = parseInt($(this).attr('min'));
    var maxValue = parseInt($(this).attr('max'));
    if (!minValue) minValue = 0;
    if (!maxValue) maxValue = 9999999999999;
    var valueCurrent = parseInt($(this).val());
    var name = $(this).attr('name');
    if (valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if (valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
});
$(".input-number").keydown(function (e) {
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 || (e.keyCode == 65 && e.ctrlKey === true) || (e.keyCode >= 35 && e.keyCode <= 39)) {
        return;
    }
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});
if ($(".accordion").length > 0) {
    $(".accordion").accordion({
        //whether the first section is expanded or not
        firstChildExpand: true,
        //whether expanding mulitple section is allowed or not
        multiExpand: false,
        //slide animation speed
        slideSpeed: 500,
        //drop down icon
        dropDownIcon: ""
    });
}

var id = $(".map").data('id');
var lat = $(".map").data('lat');
var lng = $(".map").data('lng');

if(typeof ymaps!="undefined"){
    ymaps.ready(function () {
        var myMap = new ymaps.Map(document.getElementById(id), {
            center: [lat, lng],
            zoom: 9
        }),
        myPlacemark = new ymaps.Placemark(myMap.getCenter(), {}, {
            iconImageHref: 'img/map_icon.png',
            iconImageSize: [30, 42],
            iconImageOffset: [-5, -38]
        });
        myMap.behaviors.disable('scrollZoom');
        myMap.geoObjects.add(myPlacemark);
    });
}