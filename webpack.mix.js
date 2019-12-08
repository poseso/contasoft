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
    .js([
        'resources/assets/js/global/components/base/util.js',
        'resources/assets/js/global/components/base/app.js',
        'resources/assets/js/global/components/base/avatar.js',
        'resources/assets/js/global/components/base/dialog.js',
        'resources/assets/js/global/components/base/header.js',
        'resources/assets/js/global/components/base/menu.js',
        'resources/assets/js/global/components/base/offcanvas.js',
        'resources/assets/js/global/components/base/portlet.js',
        'resources/assets/js/global/components/base/scrolltop.js',
        'resources/assets/js/global/components/base/toggle.js',
        'resources/assets/js/global/components/base/wizard.js',
        'resources/assets/js/global/components/base/datatable/core.datatable.js',
        'resources/assets/js/global/components/base/datatable/datatable.checkbox.js',
        'resources/assets/js/global/components/base/datatable/datatable.rtl.js',
        'resources/assets/js/global/layout/layout.js',
        'resources/assets/js/global/layout/demo-panel.js',
        'resources/assets/js/global/layout/offcanvas-panel.js',
        'resources/assets/js/global/layout/quick-panel.js',
        'resources/assets/js/global/layout/quick-search.js',
    ], 'public/js/scripts.bundle.js')
    .extract([
        // Extract packages from node_modules to vendor.js
        'jquery',
        'bootstrap',
        'popper.js',
        'axios',
        'sweetalert2',
        'lodash'
    ])
    .sourceMaps()
    // Copy the media and specific pages JS to there directory's.
    .copyDirectory('resources/assets/media', 'public/media')
    .copyDirectory('resources/assets/js/pages', 'public/js/pages')
    // Merge the default SASS files
    .sass('resources/assets/sass/style.scss', 'public/css/style.bundle.css')
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
