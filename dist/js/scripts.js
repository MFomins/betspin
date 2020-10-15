jQuery(document).ready(function ($) {

    $('.search-icon').on('click', function () {
        $('.search-overlay').css('display', 'flex');
        $('body').css('overflow-y', 'hidden');
    });

    $('.overlay-close').on('click', function () {
        $('.search-overlay').css('display', 'none');
        $('body').css('overflow-y', 'initial');
    });

});
