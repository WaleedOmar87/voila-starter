const shell = require("shelljs");

const backup = () => {
	return new Promise((resolve, reject) => {
		let error = false;
		try {
			shell.exec(
				"rsync -av --progress ./ ../../voilaBackup --exclude node_modules"
			);
		} catch (e) {
			error = new Error(e);
		}
		return error ? reject(error) : resolve("done");
	});
};
backup().then((e) => {
	if (e === "done") {
		// TODO cleaning up
		// shell.exec('trash .node_modules .DS_Store')
	}else {
		console.log(e);
	}
});