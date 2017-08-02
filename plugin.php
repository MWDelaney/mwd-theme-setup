<?php
/*
Plugin Name: Michael W. Delaney Theme Setup for Sage-based themes
Plugin URI:
Description:
Version: 1.0
Author: Michael W. Delaney
Author URI:
License: MIT
*/

namespace MWD\Setup;

/**
 * Set up autoloader
 */
require __DIR__ . '/vendor/autoload.php';

define( 'MWD_SETUP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'MWD_SETUP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

$mwd_branding = new \MWD\Setup\Branding();

$mwd_metaboxes = new \MWD\Setup\Init();

$mwd_acf = new \MWD\Setup\ACF();

$mwd_metaboxes = new \MWD\Setup\Metaboxes();
