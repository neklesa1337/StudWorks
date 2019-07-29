// see http://vuejs-templates.github.io/webpack for documentation.
const commandLineArgs = require('command-line-args')

const optionDefinitions = [
    { name: 'watch', type: Boolean, defaultValue: false },
    { name: 'env', type: String, defaultValue: 'prod' },
    { name: 'devtools', type: String, defaultValue: false }
]

const cli = commandLineArgs(optionDefinitions)

var path = require('path')

module.exports = {
  build: {
    env: require('./' + cli.env + '.env'),
    watch: cli.watch,
    devtools: cli.devtools,
    assetsRoot: path.resolve(__dirname, '../../public/build'),
    assetsSubDirectory: 'static',
    assetsJS: 'js',
    assetsCSS: 'css',
    assetsPublicPath: '/',
    productionSourceMap: true,
    productionGzip: false,
    productionGzipExtensions: ['js', 'css'],
    bundleAnalyzerReport: process.env.npm_config_report
  }
}
