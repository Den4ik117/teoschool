const mix = require('laravel-mix');

mix.sass('resources/scss/index.scss', 'public/css')
    .sass('resources/scss/article.scss', 'public/css')
    .sass('resources/scss/dashboard.scss', 'public/css')
    .sass('resources/scss/icofont.scss', 'public/css')
    .sass('resources/scss/auth.scss', 'public/css')
    .js('resources/js/index.js', 'public/js')
    .js('resources/js/article.js', 'public/js')
    .js('resources/js/app.js', 'public/js');
