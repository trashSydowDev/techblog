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
        'admin.less',
        'front.less'
    ])
        .copy(
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
        .scripts([
            'vendor/**/*.js',
            '**/*.js'
        ]);
});
