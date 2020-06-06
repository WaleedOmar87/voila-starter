/*
	Webpack Server Config
*/
// Plugins
require("./settings");
const webpack = require("webpack");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin")
const chokidar = require('chokidar');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");


// Plugins
let plugins = [
	new webpack.LoaderOptionsPlugin({
		minimize: true,
	}),
	new webpack.NamedModulesPlugin(),
	// new MiniCssExtractPlugin({
	// 	filename: '[name].css',
	// 	chunkFilename: '[id].css',
	// }),
	// new BrowserSyncPlugin({
	// 	port: 3000,
	// 	proxy: 'localhost:8080',
	// 	open: "external",
	// 	files: [
	// 		'./**/*.php',
	// 		'!./node_modules',
	// 		'!./yarn-error.log',
	// 		'!./package.json',
	// 		'!./style.css.map',
	// 		'!./app.js.map'
	// 	]
	// 	// // // 	// url for WebpackDevServer
	// 	// // // 	proxy: appSettings.backendPath ,
	// 	// // // 	host: 'localhost',
	// 	// // // 	port: 3000,
	// 	// // // 	proxy: appSettings.backendPath ,
	// 	// // // 	serveStatic: ["app/static"],
	// 	// // // 	files: appSettings.srcPath + '/css/main.css',
	// 	// // // 	snippetOptions: {
	// 	// // // 		rule: {
	// 	// // // 			match: /<\/head>/i,
	// 	// // // 			fn: function (snippet, match) {
	// 	// // // 				return '<link rel="stylesheet" type="text/css" href="/main.css"/>' + snippet + match;
	// 	// // // 			}
	// 	// // // 		}
	// 	// // // 	},
	// 	// // // 	files: [
	// 	// // // 		appSettings.appPath,
	// 	// // // 		appSettings.appPath + '/**/*.php',
	// 	// // // 		appSettings.appPath + '/*.php',
	// 	// // // 		'!./node_modules',
	// 	// // // 		'!./yarn-error.log',
	// 	// // // 		'!./package.json',
	// 	// // // 		'!./style.css.map',
	// 	// // // 		'!./app.js.map'
	// 	// // // 	]
	// 	}, {
	// 	reload: false
	// })
];

// Configuration
const config = {
	entry: appSettings.entry,
	mode: "development",
	output: {
		filename: "[name].js",
		path: appSettings.distPath
	},
	devServer: {
		// contentBase: appSettings.appPath,
		// inline: true,
		// hot: true,
		host: 'localhost',
		port: 8080,
		// before(app, server) {
		// 	chokidar.watch([
		// 		'./**/*.php'
		// 	]).on('all', function () {
		// 		server.sockWrite(server.sockets, 'content-changed');
		// 	})
		// },
		// open: true,
		proxy: {
			'**': {
				target: appSettings.backendPath,
				changeOrigin: true,
				headers: {
					'X-Dev-Server-Proxy': appSettings.backendPath
				}
			}
		},
		// compress: true ,
		contentBase: appSettings.appPath ,
		hot: true ,
		inline: true,
		// proxy: {
		// 	'/api' : appSettings.backendPath
		// },
		// public: appSettings.backendPath ,
		// publicPath: appSettings.bundlePath
	},
	module: {
		rules: [
			{
				test: /\.css$/i,
				use: [
					"style-loader", "css-loader"
				],
			},
			{
				test: /\.js$/,
				exclude: /(node_modules)/,
				loader: "babel-loader",
				query: {
					presets: [
						"env", // es2015
					],
				},
			},
		],
	},
	plugins: plugins,
};

module.exports = config;
