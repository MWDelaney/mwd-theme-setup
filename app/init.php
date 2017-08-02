<?php
namespace MWD\Setup;

// Set up plugin class
class Init {

	function __construct() {
		/**
	   * Flatfile includes
	   *
	   * The $includes array determines the code library included in your theme.
	   * Add or remove files to the array as needed. Supports child theme overrides.
	   *
	   * Please note that missing files will produce a fatal error.
	   *
	   */
		 $includes = [
		   'app/wp_bootstrap_navwalker.php',   // Bootstrap 3 Navwalker
		   'app/wp_bootstrap4_navwalker.php',   // Bootstrap 4 Navwalker
		   'app/wp_bootstrap_pagination.php',  // Bootstrap 3 Pagination
		   'app/wp_bootstrap4_pagination.php',  // Bootstrap 4 Pagination
		 ];

		 foreach ($includes as $file) {
		   if ( !$filepath = MWD_SETUP_PLUGIN_DIR . $file ) {
		     trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
		   }
		   require_once $filepath;
		 }
		 unset($file, $filepath);
	}

}

 ?>
