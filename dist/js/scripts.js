jQuery(document).ready(function ($) {
    $('.nav-search button').on('mouseenter', function () {
        $('.nav-search input').show();
    });

    $('.nav-search input').on('mouseleave', function () {
        $('.nav-search input').css('display', 'none');
    });

    $('#nav-icon').on('click', function () {
        $('.slideout-menu').toggle();
    });
});
