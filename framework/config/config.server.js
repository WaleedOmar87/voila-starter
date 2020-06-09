/* Server Configurations */
/*
	Server Settings
	- in order to get hmr to work you need to enqueue output js file in your theme
	- for example , if the server is running on http://localhost:3000/wordpress
	- the output file should be located at http://localhost:3000/wordpress/ENTRY.js
*/
require("./settings");
const chokidar = require('chokidar');

const config = {
	entry: appSettings.entry,
	output: {
		filename: "[name].js",
		path: appSettings.path.dist
	},
	mode: "development",
	devtool: "source-map",
	devServer: {
		// use chokidar to watch over any php file changes and force page refresh when it happens
		before(app, server) {
			chokidar.watch([
				'./../../*.php' , './../../**/*.php'
			]).on('all', function () {
				server.sockWrite(server.sockets, 'content-changed');
			})
		},
		port: 3000,
		publicPath: 'http://' + appSettings.proxy.host + '/' + appSettings.proxy.wp,
		historyApiFallback: true,
		proxy: {
			[`/${appSettings.proxy.wp}/**`]: {
				target: 'http://' + appSettings.proxy.host,
				changeOrigin: true
			},
		},
		contentBase: [appSettings.path.themeRoot, appSettings.path.dist],
		hot: true
	},
	module: {
		rules: [
			{
				test: /\.css$/i,
				use: [
					"style-loader",
					"css-loader",
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
	plugins: [],
};

module.exports = config;
