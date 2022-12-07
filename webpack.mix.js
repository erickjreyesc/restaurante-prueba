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

mix.js('resources/js/admin/admin.js', 'public/js')
    .js('resources/js/admin/ckeditor.js', 'public/js')
    .js('resources/js/admin/filepond.js', 'public/js')
    .js('resources/js/main/app.js', 'public/js')
    .sass('resources/sass/main/app.scss', 'public/css')
    .sass('resources/sass/admin/admin.scss', 'public/css')
    .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.minify(['public/js/admin.js', 'public/js/main.js', 'public/css/appmain.css', 'public/css/sadmin.css']);
    mix.version();
}
