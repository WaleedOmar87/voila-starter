// BrowserSync Settings , Not included in config file atm
module.exports = new BrowserSyncPlugin({
	proxy: appSettings.proxy.host + '/' + appSettings.proxy.wp,
	open: 'external',
	host: "localhost:3000",
	port: 3000,
	files: [
		'./../../**/*.php',
		'./../../*.php',
	],
}, { reload: false });