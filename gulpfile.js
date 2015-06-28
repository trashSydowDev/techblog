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
    mix.copy(
            'resources/assets/fonts',
            'public/fonts'
        )
        .copy(
            'resources/assets/img',
            'public/img'
        )
        .copy(
            'vendor/bower_components/jquery/index.js',
            'resources/js/vendor/jquery.js'
        )
        .copy(
            'vendor/bower_components/highlightjs/index.js',
            'resources/js/vendor/highlight.js'
        )
        .copy(
            'vendor/bower_components/highlightcss/index.css',
            'resources/assets/less/vendor/highlight.less'
        )
        .less([
            'admin.less',
            'front.less'
        ])
        .scripts([
            'vendor/**/*.js',
            '**/*.js'
        ]);
});
