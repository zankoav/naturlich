module.exports = {
    entry: './front-page/front-page.js',
    output: {
        filename: './front-page/bundle.js',
        library: 'app'
    },

    watch: true,
    devtool: 'source-map',

    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /(node_modules|bower_components)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            }
        ]
    }
};