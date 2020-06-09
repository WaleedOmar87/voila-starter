/* Build Theme Assets */

// Plugins
require("./settings");
const webpack = require("webpack");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const purgecss = require('@fullhuman/postcss-purgecss');

// plugins
let plugins = [
	new webpack.LoaderOptionsPlugin({
		minimize: true,
	}),
	new webpack.NamedModulesPlugin(),
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
		path: appSettings.path.dist,
	},
	module: {
		rules: [
			{
				test: /\.css$/i,
				use: [
					MiniCssExtractPlugin.loader,
					"css-loader",
					{
						loader: 'postcss-loader',
						options: {
							ident: 'postcss',
							plugins: (loader) => [
								require('postcss-import')({ root: loader.resourcePath }),
								require('postcss-preset-env')({
									browsers: "since 2015"
								}),
								require('cssnano')(),
								purgecss({
									content: ['./**/*.php']
								}),
							]
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
