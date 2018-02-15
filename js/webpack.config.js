module.exports = {
    entry: './taxonomy_and_page_products/taxonomy_and_page_products.js',
    output: {
        filename: './taxonomy_and_page_products/bundle.js',
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