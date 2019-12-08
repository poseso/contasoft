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

mix.setPublicPath('public')
    .setResourceRoot('../') // Turns assets paths in css relative to css file
    // .options({
    //     processCssUrls: false,
    // })
    // Extract packages from node_modules to vendor.js
    .extract()
    .js([
        'resources/js/app.js',
    ], 'public/js/app.bundle.js')
    .js([
        'resources/js/custom.js',
    ], 'public/js/custom.bundle.js')
    // Copy the media and specific pages JS to there directory's.
    .copyDirectory('resources/assets/media', 'public/media')
    .copyDirectory('resources/assets/js/pages', 'public/js/pages')
    // Merge the default SASS files
    .sass('resources/sass/app.scss', 'public/css/style.bundle.css')
    .sass('resources/assets/sass/global/layout/aside/skins/dark.scss', 'public/css/skins/aside/dark.css')
    .sass('resources/assets/sass/global/layout/aside/skins/light.scss', 'public/css/skins/aside/light.css')
    .sass('resources/assets/sass/global/layout/brand/skins/dark.scss', 'public/css/skins/brand/dark.css')
    .sass('resources/assets/sass/global/layout/brand/skins/light.scss', 'public/css/skins/brand/light.css')
    .sass('resources/assets/sass/global/layout/header/skins/base/dark.scss', 'public/css/skins/header/base/dark.css')
    .sass('resources/assets/sass/global/layout/header/skins/base/light.scss', 'public/css/skins/header/base/light.css')
    .sass('resources/assets/sass/global/layout/header/skins/menu/dark.scss', 'public/css/skins/header/menu/dark.css')
    .sass('resources/assets/sass/global/layout/header/skins/menu/light.scss', 'public/css/skins/header/menu/light.css')
    // Add some custom webpack configuration.
    .webpackConfig({
        resolve: {
            alias: {
                "morris.js": "morris.js/morris.js",
                "jquery-ui": "jquery-ui"
            },
        },
    });

if (mix.inProduction()) {
    mix.version()
        .options({
            // Optimize JS minification process
            terser: {
                cache: true,
                parallel: true,
                sourceMap: true
            }
        });
} else {
    // Uses inline source-maps on development
    mix.webpackConfig({
        devtool: 'inline-source-map'
    });
}
