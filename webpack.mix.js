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

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
mix.copy('resources/js/jquery-3.2.1.slim.min.js' , 'public/js');
mix.copy('resources/js/popper.min.js' , 'public/js');
mix.copy('resources/js/bootstrap.min.js' , 'public/js');
mix.copy('resources/css/bootstrap.min.css' , 'public/css');
mix.copyDirectory('node_modules/tinymce', 'public/node_modules/tinymce');
