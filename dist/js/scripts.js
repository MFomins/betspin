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
    $('.navbar .menu-item-has-children').on('mouseenter', function () {
        var sub = $(this).find('.sub-menu-1');
        sub.removeClass('hide-menu');
        sub.addClass('show-menu');

        $('.sub-menu-1').on('mouseleave', function () {
            $(this).removeClass('show-menu');
            $(this).addClass('hide-menu');
        });
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


    //Add stuff to aweber forms
    $('.af-body').addClass('container');

    $(".af-body").append('<img class="bts-dealer" src="https://betspin.yoursite.lv/wp-content/themes/betspin-theme/dist/img/woman-dealer.png" alt="form-dealer">');

    $(".af-body").prepend('<div class="form-head">Sign up now for <span>+100 free spins<span></div>');
});


