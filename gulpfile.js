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
    mix.copy('node_modules/bootstrap/fonts', 'public/build/fonts/bootstrap');
    mix.sass(['app.scss', 'front.scss'], 'public/css/all.css')
        .styles([//front stylesheet files
            './public/css/all.css',
            'f/custom.css',
            'f/owl.carousel.css',
            'f/owl.theme.css',
            'f/style.css',
            'f/animate.css',
            'f/magnific-popup.css',
            'f/general.css',
            'front.css'
        ], 'public/css/front.css')
        .styles([//backend stylesheet files
            './node_modules/morris.js/morris.css',
            './public/css/all.css',
            'sb-admin.css'
        ], 'public/css/admin.css')
        .browserify('app.js')
        .scripts([//front javascript files
            './public/js/app.js',
            'f/modernizr-2.8.3.min.js',
            'f/owl.carousel.js',
            'f/script.js',
            'f/stickUp.min.js',
            'f/jquery.corner.js',
            'f/wow.min.js',
            'f/classie.js',
            'f/uiMorphingButton_inflow.js',
            'f/jquery.magnific-popup.js',
            'front.js'
        ], 'public/js/front.js')
        .scripts([//backend javascript files
            './public/js/app.js',
            'admin.js',
            //'./node_modules/raphael/raphael.js',
            //'./node_modules/morris.js/morris.js',
        ], 'public/js/admin.js')
        .version(['css/front.css', 'css/admin.css', 'js/front.js', 'js/admin.js']);

});



