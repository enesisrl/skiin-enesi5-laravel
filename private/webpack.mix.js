const mix = require('laravel-mix');
 
mix.setPublicPath('../');
 
mix.combine([
    '../assets/common/beers/beers.css',
    '../assets/main/css/styles.css',
    '../assets/main/css/animations.css',
    '../assets/main/css/responsive.css',
], '../assets/main/css/base.min.css');
 
mix.combine([
    '../assets/common/beers/beers.js',
    '../assets/main/js/main.js',
], '../assets/main/js/base.min.js');