/* Server Configurations */
/*
	Server Settings
	- in order to get hmr to work you need to enqueue output js file in your theme
	- for example , if the server is running on http://localhost:3000/wordpress
	- the output file should be located at http://localhost:3000/wordpress/ENTRY.js
*/
require("./settings");
const chokidar = require("chokidar");

const config = {
	entry: appSettings.entry,
	output: {
		filename: "[name].js",
		path: appSettings.path.dist,
	},
	mode: "development",
	devtool: "source-map",
	devServer: {
		// use chokidar to watch over any php file changes and force page refresh when it happens
		before(app, server) {
			chokidar
				.watch(["./../../*.php", "./../../**/*.php"])
				.on("all", function () {
					server.sockWrite(server.sockets, "content-changed");
				});
		},
		// webpack proxy port , 3000 is default
		port: appSettings.proxy.port,
		// force server to open a browser window
		open: true,
		// specify which page to open , in this tell the server to open dev server page followed by wordpress directory name
		openPage: `http::localhost:${appSettings.proxy.port}/${appSettings.proxy.wp}/`,
		// public path to server bundle js file to , the file is not being written to the hard disk , and this path should be enqueued in the theme functions file to make sure hmr works
		publicPath: `http://${appSettings.proxy.host}/${appSettings.proxy.wp}`,
		historyApiFallback: false,
		// proxy settings , "target" is the local server url and the key is where to wordpress directory name
		proxy: {
			[`/${appSettings.proxy.wp}/**`]: {
				target: `http://${appSettings.proxy.host}`,
				changeOrigin: true,
			},
		},
		// the root which the dev server will serve files from
		contentBase: [appSettings.path.themeRoot, appSettings.path.dist],
		// enable hmr
		hot: true,
	},
	module: {
		rules: [
			{
				test: /\.css$/i,
				use: [
					"style-loader",
					"css-loader",
					{
						// postcss is not required here , but we need it in order to get @import to work when importing files from node_modules and to parse any css features that's not currently supported by chrome .
						loader: "postcss-loader",
						options: {
							plugins: (loader) => [
								require("postcss-import")({
									root: loader.resourcePath,
								}),
							],
						},
					},
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
