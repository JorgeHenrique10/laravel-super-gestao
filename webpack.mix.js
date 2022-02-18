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

mix.styles(['node_modules/bootstrap/dist/css/bootstrap.css'], 'public/app/css/bootstrap.css')
    .styles(['resources/css/style.css'], 'public/app/css/styles.css')
    .scripts('node_modules/jquery/dist/jquery.js', 'public/app/js/jquery.js')
    .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/app/js/bootstrap.js')
    .scripts('resources/js/script.js', 'public/app/js/script.js')


// mix.stylus(['resources/css/bootstrap.css', 'resources/css/style.css'], 'public/app/css')
//     .js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);
