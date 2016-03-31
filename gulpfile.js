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

elixir(function(mix) {
    mix.copy('bower_components/admin-lte/dist', 'public/assets');
    mix.copy('bower_components/admin-lte/plugins', 'public/assets/plugins');
    mix.copy('bower_components/admin-lte/bootstrap/fonts', 'public/assets/fonts');
    mix.copy('bower_components/admin-lte/bootstrap/css/bootstrap.min.css', 'public/assets/css/bootstrap.min.css');
    mix.copy('bower_components/admin-lte/bootstrap/js/bootstrap.min.js', 'public/assets/js/bootstrap.min.js');
});
