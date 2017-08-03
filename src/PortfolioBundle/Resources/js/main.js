document.addEventListener("DOMContentLoaded", function (event) {
    var body = document.body,
        WINDOW_CHANGE_EVENT = ('onorientationchange' in window) ? 'orientationchange':'resize';

    function closeMenu() {
        if (body.classList.contains('header-visible')) {
            toggleMenu();
        }
    }

    function toggleMenu() {
        body.classList.toggle('header-visible');
    }

    document.getElementById('menuToggle').addEventListener('click', function (event) {
        toggleMenu();
        event.preventDefault();
    });

    document.getElementById('content').addEventListener('click', function (event) {
        if (body.classList.contains('header-visible')) {
            toggleMenu();
            event.preventDefault();
        }
    });

    window.addEventListener(WINDOW_CHANGE_EVENT, closeMenu);
});
