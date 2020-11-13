jQuery(document).ready(function ($) {
    //Open search

    $('.search-icon').on('click', function () {
        $(this).css('display', 'none');
        $('.search-close').css('display', 'block');
        $('.navbar .search-form').css('display', 'flex');
    });

    $('.search-close').on('click', function () {
        $(this).css('display', 'none');
        $('.search-icon').css('display', 'block');
        $('.navbar .search-form').css('display', 'none');
    });

    //Mobile menu
    $('#nav-icon').on('click', function () {
        $('.slideout-menu').toggle();
    });

    //Submenu level 1
    $('.navbar .menu-item-has-children').on('mouseenter', function () {
        var sub = $(this).find('.sub-menu-1');
        sub.removeClass('hide-menu');
        sub.addClass('show-menu');

        $('.sub-menu-1').on('mouseleave', function () {
            $(this).removeClass('show-menu');
            $(this).addClass('hide-menu');
        });
    });


    $('.navbar .menu-item-has-children').on('mouseleave', function () {
        var sub = $(this).find('.sub-menu-1');
        sub.addClass('hide-menu');
        sub.removeClass('show-menu');
    });

    //Submenu level 2
    $('.navbar .menu-item-has-children .menu-item-has-children').on('mouseenter', function () {
        var sub2 = $(this).find('.sub-menu-2');

        sub2.addClass('show-menu');

        $(this).on('mouseleave', function () {
            sub2.removeClass('show-menu');
            sub2.addClass('hide-menu');
        });

        $('.sub-menu-2').on('mouseleave', function () {
            $(this).removeClass('show-menu');
            $(this).addClass('hide-menu');
        });
    });



    //mobile submenu
    $('.slideout-menu .menu-item-has-children i').on('click', function () {
        var sub = $(this).siblings('.sub-menu-1');
        sub.toggle();
    });

    $('.slideout-menu .menu-item-has-children .menu-item-has-children i').on('click', function () {
        var sub = $(this).siblings('.sub-menu-2');
        sub.toggle();
    });

});
