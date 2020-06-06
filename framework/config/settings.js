const path = require('path');
const appPath = path.join(__dirname, '../../.');
const srcPath = appPath + '/assets/src';
const distPath = appPath + '/assets/dist';

module.exports = appSettings = {
	configPath: path.join(__dirname, '.'),
	appPath: appPath,
	distPath: distPath,
	srcPath: srcPath ,
	backend: "localhost:8888/wordpress_voila" ,
	backendPath: 'http://localhost:8888/wordpress_voila',
	entry: srcPath + "/index.js"
};