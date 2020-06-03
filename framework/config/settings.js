const path = require('path');
const appPath = path.join(__dirname, '../../.');
const srcPath = appPath + '/assets/src';
const distPath = appPath + '/assets/dist';

module.exports = appSettings = {
	configPath: path.join(__dirname, '.'),
	appPath: appPath,
	entry: srcPath + "/index.js",
	roots: {
		javascript: {
			src: srcPath + "/javascript" ,
			dist: "distPath" + '/javascript'
		},
		images: {
			src: srcPath + '/images',
			dist: distPath + '/images'
		},
		css: {
			src: srcPath + '/css',
			dist: distPath + '/css'
		}
	}
}