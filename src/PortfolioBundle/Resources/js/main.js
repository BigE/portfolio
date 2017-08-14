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

    document.body.querySelector('form[name=portfolio_bundle_contact_type]').addEventListener('submit', function (event) {
        event.preventDefault();

        var xhr = new XMLHttpRequest(),
            form = this,
            elements = this.querySelectorAll('input, select, textarea');
            data = [],
            clean = this.parentNode.querySelectorAll('.success, .error');

        for (var i = 0; i < clean.length; i++) {
            clean[i].parentNode.removeChild(clean[i]);
        }

        for (var i = 0; i < elements.length; i++) {
            var element = elements.item(i);
            data.push(element.name + '=' + encodeURIComponent(element.value));
        }

        xhr.open('POST', '/contact');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.send(data.join('&'));
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status !== 200) {
                    console.log('Error: ' + xhr.status);
                }

                var data = JSON.parse(xhr.responseText);
                if (typeof data.message === Array) {
                    console.log(data.message);
                    data.message = data.message.join('<br>');
                }

                if (data.message) {
                    var message = document.createTextNode(data.message),
                        messageP = document.createElement('p');
                    messageP.appendChild(message);
                    messageP.classList.add((data.success)? 'success' : 'error');
                }

                if (data.errors) {
                    Object.keys(data.errors).forEach(function (key,index) {
                        var element = form.querySelector('#'+form.name+'_'+key),
                            error = document.createTextNode(data.errors[key].join(', ')),
                            errorDiv = document.createElement('div');
                        console.log(element, errorDiv);
                        errorDiv.appendChild(error);
                        errorDiv.classList.add('error');
                        element.parentNode.appendChild(errorDiv);
                    });
                }

                form.parentNode.insertBefore(messageP, form);
            }
        };
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
            if (top >= (elements[i].offsetTop - 200) && elem.scrollTop > 0) {
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
