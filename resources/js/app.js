require('./bootstrap');
import Form from './Form';

window.addEventListener('load', () => {
    new Form('.form');
});

// Mobile Menu
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

// Mobile Sidebar Dashboard
(function () {
    const menuIconEl = document.querySelector('.sidebar-icon');
    const sidenavEl = document.querySelector('.sidenav');

    const animateSidebar = function init() {
        menuIconEl.addEventListener('click', () => {
            if (sidenavEl.classList.contains('active')) {
                sidenavEl.classList.remove('active');
            } else {
                sidenavEl.classList.add('active');
            }
        });
    };
    animateSidebar();
})();
