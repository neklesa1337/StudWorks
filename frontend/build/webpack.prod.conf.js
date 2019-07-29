var path = require('path')
var utils = require('./utils')
var webpack = require('webpack')
var config = require('../config')
var merge = require('webpack-merge')
var baseWebpackConfigArr = require('./webpack.base.conf')

var ExtractTextPlugin = require('extract-text-webpack-plugin')
var OptimizeCSSPlugin = require('optimize-css-assets-webpack-plugin')
var UglifyJsPlugin  =  require ('uglifyjs-webpack-plugin')
var WebpackNotifierPlugin = require('webpack-notifier')

var env = config.build.env
var confArr = [];

var extraPlugins = () => {
    if (config.build.watch) {
        return [
            new WebpackNotifierPlugin()
        ];
    }
    return [
        new UglifyJsPlugin({
            uglifyOptions: {
                warnings: false
            },
            sourceMap: true
        }),
    ];
}

for(var i = 0; i < baseWebpackConfigArr.length; i++){
    confArr.push(mergeBaseConf(i, baseWebpackConfigArr[i]));
}

function mergeBaseConf(index, conf){
    return  merge(conf, {
        watch: config.build.watch,
        module: {
            rules: utils.styleLoaders({
                sourceMap: config.build.productionSourceMap,
                extract: true
            })
        },
        devtool: config.build.devtools,
        output: {
            path: config.build.assetsRoot,
            filename: utils.assetsPath('[name].js', 'js'),
            chunkFilename: utils.assetsPath('[id].js', 'js'),
        },
        plugins: [
            // extract css into its own file
            new ExtractTextPlugin({
                filename: utils.assetsPath('[name].css', 'css')
            }),
            // Compress extracted CSS. We are using this plugin so that possible
            // duplicated CSS from different components can be deduped.
            new OptimizeCSSPlugin({
                cssProcessorOptions: {
                    safe: true
                }
            }),

            new webpack.ProvidePlugin({
                $: "jquery",
                jQuery: "jquery",
                "window.jQuery": "jquery"
            })
        ].concat(extraPlugins())
    })
}

module.exports = {confArr:confArr};