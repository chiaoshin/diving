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
    .js('resources/js/map.js', 'public/js')
    .js('resources/js/chatGPT.js', 'public/js')
    .sass('resources/css/store.scss', 'public/css')
    .css('resources/css/partner.css', 'public/css')
    .css('resources/css/snorkeling.css', 'public/css')
    .css('resources/css/freeDiving.css', 'public/css')
    .css('resources/css/scuba.css', 'public/css')
    .css('resources/css/chatGPT.css', 'public/css')
    .css('resources/css/weather.css', 'public/css')
    .css('resources/css/law.css', 'public/css')
    .css('resources/css/search_res.css', 'public/css')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
