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
    .js('resources/js/experiences/index.js', 'public/js/experiences')
    .js('resources/js/travels/index.js', 'public/js/travels')
    .js('resources/js/profiles/index.js', 'public/js/profiles')
    .js('resources/js/admin.js', 'public/js/admin')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/overview.scss', 'public/css')
    .sass('resources/sass/post.scss', 'public/css')
    .sass('resources/sass/experience.scss', 'public/css')
    .sass('resources/sass/profile.scss', 'public/css')
    .sass('resources/sass/travel.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css');

mix.copyDirectory('resources/images/image', 'public/images/image')
    .copyDirectory('resources/images/logo', 'public/images/logo');
