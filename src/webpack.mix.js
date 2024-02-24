const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/menu.js', 'public/js')
    .js('resources/js/shop_edit.js', 'public/js')
    .js('resources/js/tab.js', 'public/js')
    .js('resources/js/count.js', 'public/js')
    .js('resources/js/image.js', 'public/js')
    .js('resources/js/image_create.js', 'public/js')
    .js('resources/js/sort.js', 'public/js')
    .js('resources/js/shop_menu_edit.js', 'public/js')
    .js('resources/js/reserve_confirm.js', 'public/js');
