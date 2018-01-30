export function header() {

    jQuery(document).ready(function ($) {
        /**
         *  Drop Down Menu
         */
        var dropDownActionName = 'scroll',
            scrollTopY = 240;

        var lastX = 0,
            lastCloseX = 1000;

        var startMove = false;
        var isCloseMenu = true;

        $(window).on(dropDownActionName, function () {
            if ($(window).scrollTop() > scrollTopY) {
                $('#header-drop-down').fadeIn();
            } else {
                $('#header-drop-down').fadeOut();
            }
        });

        $('.menu-button').click(function (event) {
            openMenu();
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

        $('.mobile-menu-left .menu-item-has-children').click(function (event) {
            if (event.target.tagName.toLowerCase() !== 'a') {
                $(this).toggleClass('open');
            }
        });

        $('.mobile-menu-left').bind('touchmove', function (e) {
            var currentX = e.originalEvent.touches[0].clientX || e.originalEvent.changedTouches[0].clientX;
            touchCloseMenu(currentX);
        });

        $('.mobile-menu-left').mousedown(function (e) {
            startMove = true;
        });

        $('.mobile-menu-left').mousemove(function (e) {
            if (startMove) {
                touchCloseMenu(e.clientX);
            }
        });

        $(document).mouseup(function () {
            startMove = false;
            lastX = 0;
        });

        $(document).bind('touchend', function () {
            lastX = 0;
            lastCloseX = 1000;
        });

        $(document).bind('touchmove', function (e) {
            var currentX = e.originalEvent.touches[0].clientX || e.originalEvent.changedTouches[0].clientX;
            if (isCloseMenu) {
                if (currentX > lastCloseX) {
                    openMenu();
                }
                lastCloseX = currentX;
            }
        });

        function touchCloseMenu(currentX) {
            if (currentX < lastX) {
                closeMenu();
            }
            lastX = currentX;
        }

        function closeMenu() {
            $("body").removeClass('open-menu');
            $('#mobile-menu').fadeOut();
            $('.mobile-menu-left').removeClass('open');
        }

        function openMenu() {
            $("body").addClass('open-menu');
            $('#mobile-menu').fadeIn();
            $('.mobile-menu-left').addClass('open');
        }
    });
};




