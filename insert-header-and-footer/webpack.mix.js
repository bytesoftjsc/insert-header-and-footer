let mix = require('laravel-mix');

const dist = 'public/vendor/core/plugins/insert-header-and-footer';
const source = './platform/plugins/insert-header-and-footer';

mix
    .js(source + '/resources/assets/js/insert-header-and-footer.js', dist + '/js')
    .copy(dist + '/js', source + '/public/js');
