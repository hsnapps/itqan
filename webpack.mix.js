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

mix.styles([
   'resources/assets/css/bootstrap.3.3.7.css',
   'resources/assets/css/bootstrap-rtl.3.3.4.css',
   'resources/assets/css/font-awesome.4.7.0.css',
   'resources/assets/css/style.css'
], 'public/css/all-styles.css')
.scripts([
   'resources/assets/js/jquery-2.2.4.min.js',
   'resources/assets/js/bootstrap.3.3.7.js',
   'resources/assets/js/app.js'
], 'public/js/all-scripts.js')
.version();

mix.copyDirectory('resources/assets/images', 'public/images')
   .copyDirectory('resources/assets/fonts', 'public/fonts')
   .copy('resources/assets/css/admin.css', 'public/css/admin.css');
