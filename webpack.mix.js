const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.setResourceRoot("../");

mix.js('resources/js/app.js', 'public/js')
	.js('resources/js/tocbot.js', 'public/js')
	.js('resources/js/darkmode.js', 'public/js')
	.js('resources/js/darkmodetoggle.js', 'public/js')
	.js('resources/js/fitvids.js', 'public/js')
	.copyDirectory('resources/assets', 'public/assets')
	.postCss('resources/css/app.css', 'public/css', [
		//
	])
	.options({
		processCssUrls: true,
	});
