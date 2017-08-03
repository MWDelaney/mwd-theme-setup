<?php
namespace MWD\Setup;

// Set up plugin class
class Metaboxes {

	function __construct() {

		// Move Yoast SEO metabox to bottom if present
		add_filter( 'wpseo_metabox_prio', array( $this, 'metabox_priority' ) );

		// Move SEO Framework metabox to bottom if present
		add_filter( 'the_seo_framework_metabox_priority', array( $this, 'metabox_priority' ) );

	}

	function metabox_priority() {
		return 'low';
	}

}
