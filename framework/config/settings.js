/*
	Config Settings

	@themeRoot: absolute path of theme root
	@dist: absolute path of dist folder
	@src: absolute path of src folder
	@config: absolute path of config folder , which the current file is stored in
	@proxy.host: wordpress server name
	@proxy.wp wordpress installation root , usually localhost:8888/wordpress
	@proxy.port webpack dev server proxy port
	@entry: location of entry point
*/
const path = require('path');
const srcPath = path.resolve(__dirname, '../../assets/src');
const distPath = path.resolve(__dirname, '../../assets/dist');

module.exports = appSettings = {
	path: {
		themeRoot: path.resolve(__dirname, '../../.'),
		dist: distPath,
		src: srcPath,
		config: path.resolve(__dirname, '.')
	},
	proxy: {
		host: 'localhost:8888',
		wp: 'wordpress_voila',
		port: 3000
	},
	entry: srcPath + "/index.js"
};