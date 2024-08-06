// webpack.mix.js

let mix = require('laravel-mix');
require('tailwindcss');

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/qrscanner.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
       require('tailwindcss'),
   ]);

if (mix.inProduction()) {
    mix.version();
}
