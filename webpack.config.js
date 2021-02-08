const path = require('path'); // Core node.js module to manipulate file paths
const glob = require('glob'); // We won't need this once it's just admin

module.exports = {
    entry: { 
        'front': glob.sync('./assets/js/front.js'), // This will end up in the skin
    },
    output: { // Multiple outputs
        path: path.resolve(__dirname, 'assets/dist'), // Must be in assets, otherwise fonts can't be loaded
        filename: '[name].js', // Name is admin or front
        pathinfo: false,
    },
    
    module: {
        rules: [
            {
                test: /\.js$/,
                include: path.resolve(__dirname, 'assets'),
                exclude: /node_modules/,
                use: [
                    {
                        loader: "babel-loader",
                        options: {
                            presets: [
                                "@babel/preset-react"
                            ]
                        }
                    },
                    {
                        loader: "import-glob",
                    },
                ],
            },
        ]
    },
};