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
    .js('resources/js/posts/create.js', 'public/js/posts')
    .js('resources/js/posts/index.js', 'public/js/posts')
    .js('resources/js/overviews/overview.js', 'public/js/overviews')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/overview.scss', 'public/css')
    .sass('resources/sass/post.scss', 'public/css')
    .sass('resources/sass/experience.scss', 'public/css');

mix.copyDirectory('resources/images/image', 'public/images/image')
    .copyDirectory('resources/images/logo', 'public/images/logo')
