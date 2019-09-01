var path = require('path');
module.exports = (env='development',arg) => {
	var config =
	{
		mode:env,
		plugins:[],
		externals:
		{
			jquery: 'jQuery'
		},
		entry:
		{
			app:path.resolve(__dirname, './src/js/app.js')
		},
		output:
		{
			path:path.resolve(__dirname, './dist/js/'),
			filename:'[name].bundle.js'
		},
		performance:
		{
			hints: process.env.NODE_ENV === 'production' ? "warning" : false
		},
		module:
		{
			rules: 
			[
				{
					test: /\.config$/,
					exclude: /node_modules/,
					loader:'raw-loader'
				},
				{
					test: /\.jsx?$/,
					exclude: /(node_modules|bower_components)/,
					loader: 'babel-loader'
				},
				{
					test: /\.(png|jpg|gif|svg)$/i,
					use:
					[
						{
							loader: 'url-loader',
							options:
							{
								limit: 8192
							}
						}
					]
				},
				{
					test: /\.css$/,
					use: 
					[
						'style-loader',
						'css-loader'
					]
				}
			]
		}
	}
	if(env == 'production')
	{
		
	}
	return config;
}