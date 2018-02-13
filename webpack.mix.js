let mix = require('laravel-mix');

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

mix
    .js('./node_modules/underscore/underscore.js', 'public/js/underscore.js')
    .js('resources/assets/js/app.js', 'public/js/app.js')
    .scripts(['resources/assets/js/manage.js'], 'public/js/manage.js')
    .scripts(['resources/assets/js/converter.js'], 'public/js/converter.js')
    .sass('resources/assets/sass/app.scss', 'public/css');
