const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
.postCss('resources/css/app.css', 'public/css', [
    require('tailwindcss'),
    require('autoprefixer'),
])
.react();
//Plugins
mix
.scripts('node_modules/sweetalert2/dist/sweetalert2.min.js', 'public/vendor/sweetalert2/sweetalert2.min.js')
.sass('node_modules/sweetalert2/src/sweetalert2.scss', 'public/vendor/sweetalert2/sweetalert2.min.css')
//Sistema
mix
.scripts('resources/views/app/assets/js/app_main.js', 'public/assets/js/app_main.js')
.scripts('resources/views/app/assets/js/app_crud.js', 'public/assets/js/app_crud.js')
.scripts('resources/views/app/assets/js/app_masks.js', 'public/assets/js/app_masks.js')
