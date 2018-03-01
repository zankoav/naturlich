module.exports = {
    entry: './app.js',
    output: {
        filename: './bundle.js',
        library: 'app'
    },

    watch: false,
    devtool: 'source-map',

    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /(node_modules|bower_components)\/(?!(dom7|swiper)\/).*/,
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