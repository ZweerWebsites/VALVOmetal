const path = require('path');
const webpack = require('webpack');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const WebpackCleanupPlugin = require('webpack-cleanup-plugin');

module.exports = {
  entry: {
    main: [
      './_js/main.js',
      './_scss/main.scss',
    ],
    vendor: [
      'bootstrap',
      'jquery',
    ],
  },

  output: {
    path: path.join(__dirname, 'dist'),
    filename: '[name].js',
  },

  module: {
    rules: [{
      test: /\.(scss)$/,
      loaders: ExtractTextPlugin.extract({
        fallback: 'style-loader', // in case the ExtractTextPlugin is disabled, inject CSS to <HEAD>
        use: [{
          loader: 'css-loader', // translates CSS into CommonJS modules
          options: {
            sourceMap: true,
          }
        }, {
          loader: 'postcss-loader', // Run post css actions
          options: {
            sourceMap: true,
            plugins: function () { // post css plugins, can be exported to postcss.config.js
              return [
                require('postcss-flexbugs-fixes'),
                require('autoprefixer'),
                require('cssnano'),
              ];
            }
          }
        }, {
          loader: 'sass-loader', // compiles SASS to CSS
          options: {
            sourceMap: true
          }
        }],
      }),
    }, {
      test: /\.js$/,
      exclude: /node_modules/,
      use: [{
        loader: 'babel-loader', // transpile to ES5
        options: {
          presets: ['es2015'],
        },
      }],
    }],
  },

  plugins: [
    new webpack.ProvidePlugin({ // inject ES5 modules as global vars
      $: 'jquery',
      jQuery: 'jquery',
      'window.jQuery': 'jquery',
      Popper: ['popper.js', 'default'],
      // in case bootstrap's modules were imported individually, they must also be provided here:
      // Util: "exports-loader?Util!bootstrap/js/dist/util",
    }),
    new webpack.optimize.CommonsChunkPlugin({ // seperate vendor chunks
      name: ['vendor', 'manifest'],
    }),
    new ExtractTextPlugin('[name].css'),
    new WebpackCleanupPlugin(),
    new webpack.optimize.UglifyJsPlugin({ minimize: true }),
  ],
};