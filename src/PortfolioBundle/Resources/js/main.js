document.addEventListener("DOMContentLoaded", function (event) {
    var body = document.body,
        menu_items = document.body.querySelectorAll('#nav .pure-menu-item'),
        clicked = false,
        WINDOW_CHANGE_EVENT = ('onorientationchange' in window) ? 'orientationchange':'resize';

    function clearActive() {
        menu_items.forEach(function (element, i, a) {
            element.classList.remove('pure-menu-active');
        });
    }

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

    document.body.querySelectorAll('.menu-trigger').forEach(function (element, i, a) {
        element.addEventListener('click', function (event) {
            clicked = true;
            clearActive();

            if (this.parentNode.classList.contains('pure-menu-item')) {
                this.parentNode.classList.add('pure-menu-active');
            }

            var start = new Date().getTime(),
                elem = document.scrollingElement || document.documentElement,
                id = this.getAttribute('data-section'),
                from = elem.scrollTop,
                to = document.getElementById(id).offsetTop,
                timer = setInterval(function () {
                    var step = Math.min(1, (new Date().getTime() - start) / 600);
                    elem['scrollTop'] = (from + step * (to - from));
                    if (step === 1) {
                        clearInterval(timer);
                        clicked = false;
                    }
                }, 25);
            elem['scrollTop'] = from;
            event.preventDefault();
            closeMenu();
        });
    });

    window.addEventListener('scroll', function () {
        if (clicked) return;

        var elem = (document.scrollingElement || document.documentElement),
            top = elem.scrollTop,
            elements = Array.prototype.slice.call(document.getElementsByClassName('menu-block')).reverse();

        clearActive();
        for (var i = 0; i < elements.length; i++) {
            if (top >= (elements[i].offsetTop - 100) && elem.scrollTop > 0) {
                menu_items.forEach(function (item, x, aa) {
                    if (item.querySelector('.pure-menu-link').getAttribute('data-section') === elements[i].id) {
                        item.classList.add('pure-menu-active');
                    }
                });
                break;
            }
        }
    });
    window.addEventListener(WINDOW_CHANGE_EVENT, closeMenu);
});
