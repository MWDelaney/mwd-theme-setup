<?php
namespace MWD\Setup;

// Set up plugin class
class ACF {

	function __construct() {

    // The theme's acf-json directory
    $theme_dir = get_stylesheet_directory() . '/assets/acf-json';

    // This plugin's skeleton acf-json directory
    $plugin_dir = MWD_SETUP_PLUGIN_DIR . '/assets/acf-json';

		// Hide ACF menu item in Production
		if (WP_ENV == 'production') {
			add_filter('acf/settings/show_admin', '__return_false');
		}

		// Set local json directory
		add_filter('acf/settings/save_json', function($path) use(&$theme_dir) {
			// update path
			$path = $theme_dir;
			// return
			return $path;
		});

    add_action('init', function() use(&$theme_dir, &$plugin_dir) {
      if(!file_exists($theme_dir)) {
        mkdir($theme_dir);
        copy($plugin_dir . '/.gitkeep', $theme_dir . '/.gitkeep');
      }
    });

	}

}

