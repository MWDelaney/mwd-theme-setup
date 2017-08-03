<?php
namespace MWD\Setup;

// Set up plugin class
class Init {

  function __construct() {
  
    /**
    * Flatfile includes
    */
    foreach(glob(MWD_SETUP_PLUGIN_DIR . 'app/includes/*.php') as $inc) {
      require_once($inc);

    }
  }
}
