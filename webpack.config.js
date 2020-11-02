const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const TerserJSPlugin = require("terser-webpack-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const CopyPlugin = require("copy-webpack-plugin");

module.exports = {
  entry: "./assets/js/app.js",
  output: {
    filename: "bundled-script.js",
    path: path.resolve(__dirname, "dist"),
  },
  optimization: {
    minimizer: [new TerserJSPlugin({}), new OptimizeCSSAssetsPlugin({})],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "bundled-styles.css",
    }),
    new CopyPlugin({
      patterns: [{ from: "assets/images", to: "assets/images" }],
    }),
  ],
  module: {
    rules: [
      {
        test: /\.(s*)css$/i,
        use: [MiniCssExtractPlugin.loader, { loader: "css-loader" }, { loader: "sass-loader" }],
      },
      {
        test: /\.(jpe?g|png|gif|svg)$/i,
        use: [
          {
            loader: "file-loader",
            options: {
              name: "[name].[ext]",
              outputPath: "./assets/images",
              publicPath: "assets/images",
            },
          },
        ],
      },
    ],
  },
};
