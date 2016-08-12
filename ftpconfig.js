var config = {
    host: 'host.net',
    user: 'user',
    pass: 'password',
    port: 21,
    remoteFolder: '/',
    localFilesGlob: ['./**/*', '!node_modules/**', '!bower_components/**', '!.tmp/**', '!.git/**', '!ftpconfig.js', '!sftp-config.json']
};
exports.config = config;