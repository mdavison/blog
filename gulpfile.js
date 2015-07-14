var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less([
        'blog-template.less',
        'app.less',
        'dashboard.less'
    ]);

    mix.scripts([
        '../bower_components/jquery/dist/jquery.min.js',
        '../bower_components/bootstrap/dist/js/bootstrap.min.js',
        'vendor/bootbox.4.4.0.min.js',
        'bootbox.js',
        'parsecode.js',
        'vendor/prism.js',
        'google-analytics.js'
    ]);

    mix.styles([
        "app.css",
        "blog-template.css",
        "prism.css"
    ], 'public/css/all.css', 'public/css');

});
