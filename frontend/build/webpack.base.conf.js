var path = require('path');
var utils = require('./utils');
var config = require('../config');
var glob = require('glob');

var CopyWebpackPlugin = require('copy-webpack-plugin')

function resolve(dir) {
    return path.join(__dirname, '..', dir);
}
module.exports = [
    {
        entry: {
            react: getFilesList('./react/**/*.js*'),
        },
        output: {
            path: config.build.assetsRoot,
            filename: '[name].' + process.env.NODE_ENV + 'js',
            publicPath: process.env.NODE_ENV === 'production'
                ? config.build.assetsPublicPath
                : config.dev.assetsPublicPath,
        },
        resolve: {
            extensions: ['.js', '.jsx'],
            modules: [path.join(__dirname, '..', 'node_modules'), 'node_modules'],
        },
        module: {
            rules: [
                {
                    test: /\.jsx|\.js$/,
                    use: {
                        loader: 'babel-loader',
                        options: {
                            presets: [require.resolve('babel-preset-react')],
                        },
                    },
                    exclude: /node_modules/,
                },
            ],
        }
    },
];

function getFilesList(src) {
    return glob.sync(src);
}
