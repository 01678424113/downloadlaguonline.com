//jQuery(document).ready(function($) {
//    var $filter = $('.menu');
//    var $filterSpacer = $('<div />', {
//        "class": "menu-spacer",
//        "height": $filter.outerHeight()
//    });
//    if ($filter.size()) {
//        $(window).scroll(function()
//        {
//            if (!$filter.hasClass('fix') && $(window).scrollTop() > $filter.offset().top)
//            {
//                $filter.before($filterSpacer);
//                $filter.addClass("fix");
//            }
//            else if ($filter.hasClass('fix') && $(window).scrollTop() < $filterSpacer.offset().top)
//            {
//                $filter.removeClass("fix");
//                $filterSpacer.remove();
//            }
//        });
//    }
//});
//
//jQuery(document).ready(function($) {
//    var $filter = $('.search-form');
//    var $filterSpacer = $('<div />', {
//        "class": "search-form-spacer",
//        "height": $filter.outerHeight()
//    });
//    if ($filter.size()) {
//        $(window).scroll(function()
//        {
//            if (!$filter.hasClass('search-fix') && $(window).scrollTop() > $filter.offset().top)
//            {
//                $filter.before($filterSpacer);
//                $filter.addClass("search-fix");
//            }
//            else if ($filter.hasClass('search-fix') && $(window).scrollTop() < $filterSpacer.offset().top)
//            {
//                $filter.removeClass("search-fix");
//                $filterSpacer.remove();
//            }
//        });
//    }
//});

function search() {
    var keyword = document.search_form.keyword.value;
    var alphaExp = /[^]/;

    if (keyword.match(alphaExp) == null) {
        search_form.keyword.focus();
        return false;
    }
};

jQuery(document).ready(function() {
    jQuery(document).ready(function($) {
        var offset = 300,
                offset_opacity = 1200,
                scroll_top_duration = 700,
                $back_to_top = $('.back-to-top');
        $(window).scroll(function() {
            ($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
            if ($(this).scrollTop() > offset_opacity) {
                $back_to_top.addClass('cd-fade-out');
            }
        });
        $back_to_top.on('click', function(event) {
            event.preventDefault();
            $('body,html').animate({
                scrollTop: 0,
            }, scroll_top_duration);
        });
    });
})

jQuery(document).ready(function() {
    $.fn.menumaker = function(options) {
        var menubox = $(this), settings = $.extend({
            format: "dropdown",
            sticky: false
        }, options);
        return this.each(function() {
            $(this).find(".button").on('click', function() {
                $(this).toggleClass('menu-opened');
                var mainmenu = $(this).next('ul');
                if (mainmenu.hasClass('open')) {
                    mainmenu.slideToggle().removeClass('open');
                }
                else {
                    mainmenu.slideToggle().addClass('open');
                    if (settings.format === "dropdown") {
                        mainmenu.find('ul').show();
                    }
                }
            });
            menubox.find('li .sub-menu').parent().addClass('has-sub');
            multiTg = function() {
                menubox.find(".has-sub").prepend('<span class="submenu-button"></span>');
                menubox.find('.submenu-button').on('click', function() {
                    $(this).toggleClass('submenu-opened');
                    if ($(this).siblings('ul').hasClass('open')) {
                        $(this).siblings('ul').removeClass('open').slideToggle();
                    }
                    else {
                        $(this).siblings('ul').addClass('open').slideToggle();
                    }
                });
            };
            if (settings.format === 'multitoggle')
                multiTg();
            else
                menubox.addClass('dropdown');
            if (settings.sticky === true)
                menubox.css('position', 'fixed');
            resizeFix();
            return $(window).on('resize', resizeFix);
        });
    };
});

jQuery(document).ready(function() {
    $(document).ready(function() {
        $("#menubox").menumaker({
            format: "multitoggle"
        });
    });
});