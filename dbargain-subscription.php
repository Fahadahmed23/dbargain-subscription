<?php
 /**
  * Plugin Name: D-Bargain Subscription Checker
  * Plugin URI: http://cloudprimero.com/
  * Description: This Plugin is used for checking subscription of the Dbargain 
  * Version: 1.0.0
  * Author: Cloud Primero B.V. 
  * Author URI: http://cloudprimero.com/
  * Developer: Fahad Ahmed
  * Developer URI: https://www.linkedin.com/in/fahad-ahmed-optimist/
  *
  *
  * License: GPLv3 or later
  * License URI: http://www.gnu.org/licenses/gpl-3.0.html
  */
 
 
 if ( ! defined( 'ABSPATH' ) ) {
	 exit; // Exit if accessed directly
 }
 
 define( 'DBARGAINSUBS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
 // Test to see if Subscriptions_For_Woocommerce is active (including network activated).
 $plugin_path = trailingslashit( WP_PLUGIN_DIR ) . 'subscriptions-for-woocommerce/subscriptions-for-woocommerce.php';
 if ( in_array( $plugin_path, wp_get_active_and_valid_plugins() )){
	ob_start();
	require_once __DIR__ . '/include/class-dbargain-subscription.php';
 }
 