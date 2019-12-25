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
    .js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .styles([
        'public/css/libs/reset.css',
        'public/css/libs/style.css',
        'public/css/libs/bootstrap.min.css'
    ], './public/css/libs.css') //aduna toate fisierele si le pune aici //este un fisier generat
    .scripts([
        'public/js/libs/jquery-2.1.4.js',
        'public/js/libs/jquery.menu-aim.js',
        'public/js/libs/main.js',
        'public/js/libs/bootstrap.min.js'
    ], './public/js/libs.js')
;
