const path                = require('path');
const webpack             = require('webpack');
const CopyWebpackPlugin   = require('copy-webpack-plugin');
const CleanWebpackPlugin  = require('clean-webpack-plugin');
const ExtractTextPlugin   = require('extract-text-webpack-plugin');

const src  = './src';
// const dist = process.env.dist ? process.env.dist : './dist';
// commented for use with local development only.
const dist = process.env.DIST
  ? `${process.env.DIST}/a_wordpress/wp-content/themes/parent`
  : './dist';

const webpackConfig = {
  entry: {
    'assets/js/app.vendor.js': `${src}/scripts/vendor.js`,
    'assets/js/app.main.js': `${src}/scripts/app.js`,
    'style.css': `${src}/scss/style.scss`
  },
  output: {
    filename: '[name]',
    path: path.resolve(__dirname, dist),
    sourceMapFilename: '[name].map'
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /(node_modules)/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['env', 'es2015'],
            plugins: ['transform-runtime']
          }
        }
      },
      {
        test: /\.(sass|scss)$/,
        exclude: /(node_modules)/,
        use: ExtractTextPlugin.extract({
          use: [
            { loader: 'css-loader' },
            {
              loader: 'sass-loader',
              options: {
                outputStyle: 'compressed',
                includePaths: [
                  `${src}/scss`
                ]
              }
            }
          ],
          publicPath: `${dist}assets/styles`,
          fallback: 'style-loader'
        })
      },
      {
        test: /\.hbs$/,
        use: 'handlebars-loader',
        exclude: /(node_modules)/
      },
      { test: /\.html$/, use: 'raw-loader!html-minify-loader' }
    ]
  },
  resolve: {
    modules: ['./node_modules'],
    alias: { }
  },
  plugins: [
    new CleanWebpackPlugin([`${dist}/**`]),
    new ExtractTextPlugin({
      allChunks: false,
      filename: '[name]'
    }),
    new webpack.optimize.UglifyJsPlugin(),
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery',
      'window.jQuery': 'jquery',
      Popper: ['popper.js', 'default'],
      Alert: 'exports-loader?Alert!bootstrap/js/dist/alert',
      Button: 'exports-loader?Button!bootstrap/js/dist/button',
      Carousel: 'exports-loader?Carousel!bootstrap/js/dist/carousel',
      Collapse: 'exports-loader?Collapse!bootstrap/js/dist/collapse',
      Dropdown: 'exports-loader?Dropdown!bootstrap/js/dist/dropdown',
      Modal: 'exports-loader?Modal!bootstrap/js/dist/modal',
      Popover: 'exports-loader?Popover!bootstrap/js/dist/popover',
      Scrollspy: 'exports-loader?Scrollspy!bootstrap/js/dist/scrollspy',
      Tab: 'exports-loader?Tab!bootstrap/js/dist/tab',
      Tooltip: 'exports-loader?Tooltip!bootstrap/js/dist/tooltip',
      Util: 'exports-loader?Util!bootstrap/js/dist/util'
    }),
    new CopyWebpackPlugin([
      { from: `${src}/theme/` },
      { from: `${src}/images/screenshot.png` }
    ])
  ]
};

module.exports = webpackConfig;
