document.addEventListener("DOMContentLoaded", function (event) {
    var body = document.body,
        menu_items = [],
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

    document.getElementById('nav').querySelectorAll('.section-link').forEach(function (element, i, a) {
        menu_items.push(element);
        element.querySelector('a').addEventListener('click', function (event) {
            clicked = true;
            clearActive();
            this.parentNode.classList.add('pure-menu-active');
            var start = new Date().getTime(),
                elem = document.scrollingElement || document.documentElement,
                id = this.getAttribute('data-section'),
                from = elem.scrollTop,
                to = document.getElementById(id).offsetTop,
                timer = setInterval(function () {
                    var step = Math.min(1, (new Date().getTime() - start) / 1000);
                    elem['scrollTop'] = (from + step * (to - from));
                    if (step === 1) {
                        clearInterval(timer);
                        clicked = false;
                    }
                }, 25);
            elem['scrollTop'] = from;
            event.preventDefault();
        });
    });

    window.addEventListener('scroll', function () {
        if (clicked) return;

        var elem = (document.scrollingElement || document.documentElement),
            top = elem.scrollTop,
            BreakException = {};
        try {
            Array.prototype.forEach.call(document.getElementsByClassName('panel'), function (element, i, a) {
                if ((element.offsetTop + element.offsetHeight) > (top + 100)) {
                    clearActive();
                    menu_items.forEach(function (item, x, aa) {
                        if (item.querySelector('.pure-menu-link').getAttribute('data-section') === element.id) {
                            item.classList.add('pure-menu-active');
                        }
                    });
                    throw BreakException;
                }
            });
        } catch (e) {
            if (e !== BreakException) throw e;
        }
    });
    window.addEventListener(WINDOW_CHANGE_EVENT, closeMenu);
});
