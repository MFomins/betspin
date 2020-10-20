jQuery(document).ready(function ($) {
    //Open search
    $('.search-icon').on('click', function () {
        $('.search-overlay').css('display', 'flex');
        $('body').css('overflow-y', 'hidden');
        $('.nav-search .icon-search').hide();
    });

    $('.overlay-close').on('click', function () {
        $('.search-overlay').css('display', 'none');
        $('body').css('overflow-y', 'initial');
        $('.nav-search .icon-search').show();
    });

    //Mobile menu
    $('#nav-icon').on('click', function () {
        $('.slideout-menu').toggle();
    });

    //Submenu level 1
    $('.menu-item-has-children').on('mouseenter', function () {
        var sub = $(this).find('.sub-menu-1');
        sub.removeClass('hide-menu');
        sub.addClass('show-menu');

        $('.sub-menu-1').on('mouseleave', function () {
            $(this).removeClass('show-menu');
            $(this).addClass('hide-menu');
        });
    });



    //Submenu level 2
    $('.menu-item-has-children .menu-item-has-children').on('mouseenter', function () {
        var sub2 = $(this).find('.sub-menu-2');

        sub2.addClass('show-menu');

        $('.sub-menu-2').on('mouseleave', function () {
            $(this).removeClass('show-menu');
            $(this).addClass('hide-menu');
        });
    });



    // $('.menu-item-has-children').on('mouseleave', function(){
    //     $(this).find('.sub-menu-1').slideUp();
    // });

});
