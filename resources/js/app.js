require('./bootstrap');
require('./add_product');
require('./upload_images');
require('./mobile_menu');

import Form from './Form';

window.addEventListener('load', () => {
    new Form('.form');
});