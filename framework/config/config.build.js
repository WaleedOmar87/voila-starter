/* Build Theme Assets */

// Plugins
require("./settings");
const path = require("path");
const webpack = require("webpack");
const WebpackNotifierPlugin = require("webpack-notifier");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

// plugins
let plugins = [
	new webpack.LoaderOptionsPlugin({
		minimize: true,
	}),
	new webpack.NamedModulesPlugin(),
	new WebpackNotifierPlugin(),
	new MiniCssExtractPlugin({
		filename: '[name].css',
		chunkFilename: '[id].css',
	}),
];

// Configuration
const config = {
	entry: appSettings.entry,
	mode: "production",
	output: {
		filename: "[name].js",
		path: appSettings.distPath, // path.resolve(__dirname,  '../dist/'),
	},
	module: {
		rules: [
			{
				test: /\.css$/i,
				use: [
					{
						loader: MiniCssExtractPlugin.loader
					},
					"css-loader",
					{
						loader: "postcss-loader",
						options: {
							config: {
								path: appSettings.configPath + '/postcss.config.js'
							}
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
	plugins: plugins,
};

module.exports = config;
