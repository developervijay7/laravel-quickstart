const mix = require('laravel-mix');
const tailwindcss = require("tailwindcss");

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

mix.setPublicPath('public')
    .setResourceRoot('../') // Turns assets paths in css relative to css file
    .js("resources/js/frontend/app.js", "public/js/frontend.js")
    .js("resources/js/backend/app.js", "public/js/backend.js")
    .postCss("resources/css/frontend/app.css", "public/css/frontend.css", [
        tailwindcss('./tailwind-frontend.config.js'),
    ])
    .postCss("resources/css/backend/app.css", "public/css/backend.css", [
        tailwindcss('./tailwind-backend.config.js'),
    ])
    .extract([
        'axios',
        'lodash',
        'alpinejs',
        'laravel-echo',
        'pusher-js',
    ])
    .sourceMaps();

mix.copyDirectory('resources/images', 'public/images');


if (mix.inProduction()) {
    mix.version();
} else {
    // Uses inline source-maps on development
    mix.webpackConfig({
        devtool: 'inline-source-map'
    });
}
