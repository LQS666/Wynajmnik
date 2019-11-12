// require('./bootstrap');
import Form from './Form';

window.addEventListener('load', () => {
    new Form('.form');
});

(function () {
    const body = document.querySelector('body');
    const menu = document.querySelector('.menu-icon');

    const animateMobileMenu = function init() {
        menu.addEventListener('click', () => {
            if (body.classList.contains('nav-active')) {
                body.classList.remove('nav-active');
            } else {
                body.classList.add('nav-active');
            }
        });
    };
    animateMobileMenu();
})();