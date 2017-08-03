<?php
namespace MWD\Setup;

// Set up plugin class
class Branding {

  function __construct() {
    add_action( 'login_enqueue_scripts', array($this, 'my_login_logo') );
    add_filter( 'admin_footer_text', array($this, 'admin_footer'), 11 );
    add_action( 'admin_bar_menu', array($this, 'remove_wp_logo'), 999 );
    add_action('admin_bar_menu', array($this, 'create_menu'), 1);
    add_action('wp_before_admin_bar_render', array($this, 'menu_custom_logo'));
  }


  /**
  * Remove WordPress admin bar menu
  */
  function remove_wp_logo( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'wp-logo' );
  }


  /**
  * Replace login screen logo with WSS logo
  */
  function my_login_logo() { ?>
    <style type="text/css">
      body.login div#login h1 a {
      background-image: url( <?php echo(MWD_SETUP_PLUGIN_URL . 'assets/images/logo.svg') ?> );
      background-repeat: no-repeat;
      background-size: auto;
      width: 300px;
    }
    </style>
  <?php }


  function create_menu() {
    global $wp_admin_bar;
    $menu_id = 'my-logo';
    $wp_admin_bar->add_node(array('id' => $menu_id, 'title' => '<span class="ab-icon"></span>', 'href' => '/'));
    $wp_admin_bar->add_node(array('parent' => $menu_id, 'title' => __('Homepage'), 'id' => 'my-logo-home', 'href' => 'https://michaeldelaney.me', 'meta' => array('target' => '_blank')));
  }


  /**
  * Replace login screen logo with MWD logo
  */
  function menu_custom_logo() { ?>
    <style type="text/css">
      #wpadminbar #wp-admin-bar-my-logo > .ab-item .ab-icon {
        height: 26px;
        width: 26px;
      }
      #wpadminbar #wp-admin-bar-my-logo > .ab-item .ab-icon:before {
        content: url( <?php echo(MWD_SETUP_PLUGIN_URL . 'assets/images/logo-white.svg') ?> )
      }
    </style>
  <?php }

  /**
  * Add "designed and developed..." to admin footer.
  */
  function admin_footer($content) {
    return 'Site Designed and Developed by <a href="https://michaeldelaney.me">Michael W. Delaney</a>';
  }

}
