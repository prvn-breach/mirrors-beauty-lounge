const mix = require('laravel-mix');
require('dotenv').config();
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
let webpack = require('webpack')
const WebpackShellPluginNext = require('webpack-shell-plugin-next');

 
let dotenvplugin = new webpack.DefinePlugin({
    'process.env': {
        APP_NAME: JSON.stringify(process.env.APP_NAME || 'Default app name'),
        NODE_ENV: JSON.stringify(process.env.NODE_ENV || 'development'),
        MIX_BASE_URL: JSON.stringify(process.env.MIX_BASE_URL),

    }
})
mix.webpackConfig({
	plugins: [
     new WebpackShellPluginNext({
      onBuildStart:{
        scripts: ['echo "===> Starting packing with WEBPACK 5"'],
        blocking: true,
        parallel: false
      },
      onBuildEnd:{
        scripts: ['php artisan lang:js resources/web/js/vue-translations.js --no-lib'],
        blocking: false,
        parallel: true
      }
    }),  
    dotenvplugin,
        //new WebpackShellPlugin({onBuildStart:['php artisan lang:js resources/js/vue-translations.js --no-lib --quiet'], onBuildEnd:[]}),
    ],
    module: {
      rules: [
        {
          test: /\.tsx?$/,
          loader: 'ts-loader',
          options: { appendTsSuffixTo: [/\.vue$/] },
          exclude: /node_modules/,
        },
      ],
    },
	resolve: {
		extensions: ['*', '.js', '.jsx', '.vue', '.ts', '.tsx'],
		alias: {
			'@admin':__dirname + '/resources/admin/js',
			'@web':__dirname + '/resources/web/js',
      '@npm':__dirname + '/node_modules'
		}
	}
});
mix.js('resources/admin/js/app.js', 'public/admin/js').vue()
    .postCss('resources/admin/css/app.css', 'public/admin/css', [
        //
    ]);

 mix.js('resources/web/js/app.js', 'public/web/js').vue()
    .postCss('resources/web/css/app.css', 'public/web/css', [
        //
    ]);