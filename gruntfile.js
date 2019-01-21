module.exports = function(grunt){
	grunt.initConfig({

		pkg: grunt.file.readJSON( 'package.json' ),

		makepot: {
			target: {
				options: {
					type: 'wp-plugin',
					mainFile: 'my-custom-plugin.php',
					domainPath: './languages'
				}
			}
		}

	});

	grunt.loadNpmTasks( 'grunt-wp-i18n' );
	grunt.registerTask( 'translate', [ 'makepot' ] );
};