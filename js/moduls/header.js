export function header() {

    jQuery(document).ready(function ($) {
        /**
         *  Drop Down Menu
         */
        var dropDownActionName = 'scroll',
            scrollTopY = 240;

        $(window).on(dropDownActionName, function () {
            if ($(window).scrollTop() > scrollTopY) {
                $('#header-drop-down').fadeIn();
            } else {
                $('#header-drop-down').fadeOut();
            }
        });

        $('.menu-button').click(function (event) {
            $('#mobile-menu').fadeIn();
            $('.mobile-menu-left').addClass('open');
            event.preventDefault();
        });

        $('#mobile-menu').click(function (event) {
            if (event.target.tagName.toLowerCase() === 'menu') {
                closeMenu();
            }
        });

        $('#back-button').click(function () {
            closeMenu();
        });

        $('.mobile-menu-left .menu-item-has-children').click(function () {
            $(this).children('.sub-menu').toggleClass('open');

        });

        function closeMenu() {
            $('#mobile-menu').fadeOut();
            $('.mobile-menu-left').removeClass('open');
        }
    });
};




