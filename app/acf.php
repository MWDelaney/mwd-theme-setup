<?php
namespace MWD\Setup;

// Set up plugin class
class ACF {

	function __construct() {

		// Hide ACF menu item in Production
		if (WP_ENV == 'production') {
			add_filter('acf/settings/show_admin', '__return_false');
		}
		
		// Set local json directory
		add_filter('acf/settings/save_json', function($path) {
			// update path
			$path = get_stylesheet_directory() . '/assets/acf-json';
			// return
			return $path;
		});

	}

}

 ?>
