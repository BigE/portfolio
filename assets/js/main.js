document.addEventListener("DOMContentLoaded", function (event) {
    var header = document.getElementById('header'),
        WINDOW_CHANGE_EVENT = ('onorientationchange' in window) ? 'orientationchange':'resize';

    function closeMenu() {
        if (header.classList.contains('active')) {
            toggleMenu();
        }
    }

    function toggleHorizontal() {
        Array.prototype.forEach.call(document.getElementsByClassName('can-transform'), function (element, i, a) {
            element.classList.toggle('pure-menu-horizontal');
        });
    }

    function toggleMenu() {
        if (header.classList.contains('active')) {
            setTimeout(toggleHorizontal, 500);
        } else {
            toggleHorizontal();
        }

        document.getElementById('toggle').classList.toggle('active');
        header.classList.toggle('active');
    }

    Array.prototype.forEach.call(document.getElementsByClassName('menu-icon'), function (element, index, array) {
        element.addEventListener('click', function (event) {
            toggleMenu();
            event.preventDefault();
        });
    });

    window.addEventListener(WINDOW_CHANGE_EVENT, closeMenu);
});
