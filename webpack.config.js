const webpack = require('webpack')
const path = require('path')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')

const config = {
  entry: {
    main: ['./src/js/index.js', './src/scss/style.scss'],
    responsive: ['./src/scss/responsive.scss'],
  },

  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: '[name].min.js',
  },
  devtool: 'source-map',

  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader'],
      },
      {
        test: /\.js$/,
        use: 'babel-loader',
        exclude: /node_modules/,
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '[name].min.css', // Specify the output file for the extracted CSS
    }),
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery',
      'window.jQuery': 'jquery',
    }),
  ],
  watch: true,
}

module.exports = config
