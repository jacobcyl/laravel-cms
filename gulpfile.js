var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */
elixir.config.production = false;
elixir.config.sourcemaps = false;

elixir(function(mix) {
    mix.copy('node_modules/font-awesome/fonts', 'public/build/fonts');
    mix.sass(['app.scss', 'front.scss'], 'public/css/all.css')
        .styles([
            './public/css/all.css'
        ], 'public/css/front.css')
        .styles([
            './node_modules/morris.js/morris.css',
            './public/css/all.css',
            'sb-admin.css'
        ], 'public/css/admin.css')
        .browserify('app.js')
        .scripts([
            './public/js/app.js',
            'front.js'
        ], 'public/js/front.js')
        .scripts([
            './public/js/app.js',
            './node_modules/raphael/raphael.js',
            './node_modules/morris.js/morris.js',
        ], 'public/js/admin.js')
        .version(['css/front.css', 'css/admin.css', 'js/front.js', 'js/admin.js']);

});



