const path = require('path');

module.exports = {
    mode: "production",
    watch: false,

    entry: path.resolve(__dirname, 'assets/scripts/src/index.js'),

    output: {
        filename: 'dist.js',
        path: path.resolve(__dirname, 'assets/scripts/'),
    },
};