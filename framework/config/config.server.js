/*
	Webpack Server Config
*/

// Plugins
require("./settings");
const path = require("path");
const webpack = require("webpack");
const WebpackNotifierPlugin = require("webpack-notifier");
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');


/* Switching the extract plugin due to compatibility issues */
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

// Plugins
let plugins = [
	new webpack.LoaderOptionsPlugin({
		minimize: true
	}),
	new webpack.NamedModulesPlugin(),
	new webpack.HotModuleReplacementPlugin(),
	new WebpackNotifierPlugin(),
	new BrowserSyncPlugin({
		host: 'localhost',
		port: 3000,
		proxy: {
			target: "http://localhost:8888/wordpress_voila/"
		},
		files: [
			'./*.php',
			'./',
			'!./node_modules',
			'!./yarn-error.log',
			'!./package.json',
			'!./style.css.map',
			'!./app.js.map'
		],
		reloadDelay: 0
	})
];

// Configuration
const config = {
	entry: appSettings.entry,
	mode: "development" ,
	output: {
		filename: "app.js",
		path: appSettings.appPath + "/dist",  // path.resolve(__dirname,  '../dist/'),
	},
	devServer: {
		contentBase: appSettings.appPath + "/dist",
		inline: true,
		hot: true
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: /(node_modules)/,
				loader: "babel-loader",
				query: {
					presets: [
						"env" // es2015
					]
				}
			},
			{
				test: /\.scss$/,
				use: [
					 {
					   loader: MiniCssExtractPlugin.loader,
					   options: {
					   // you can specify a publicPath here
					   publicPath: '../',
					   hmr: process.env.NODE_ENV === 'development',
					   },
					},
					"style-loader",
					"css-loader",
					"sass-loader"
				]
			},
			{
				test: /.pug$/,
				use: ["pug-loader"]
			},
			{
				test: /\.html$/,
				loader: "raw-loader"
			}
		]
	},
	plugins: plugins
};

module.exports = config;