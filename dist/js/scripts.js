jQuery(document).ready(function ($) {

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

    $('#nav-icon').on('click', function(){
        $('.slideout-menu').toggle();
    });

});
