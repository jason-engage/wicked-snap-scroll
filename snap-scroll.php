<?php
/* Plugin Name: Wicked Snap Scroll
 * @package   			Wicked Snap Scroll
 * @author    			Engage Inc
 * @link      			http://snapscroll.engagefb.com/      
 * Description:         Our Wicked Snap Scroll for Wordpress plugin allows you to define 'anchor points' into which the window snaps when you scroll through a webpage.
 * Version:             1.0.0
 * Author:              Engage Inc
 * Author URI:          http://en.gg
 * Copyright: 		    Engage Inc.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

error_reporting(1);

/*
 * TODO:
 *
 * - replace `class-plugin-name.php` with the name of the plugin's class file
 * - replace `class-plugin-admin.php` with the name of the plugin's admin file
 *
 */
require_once( plugin_dir_path( __FILE__ ) . 'class-snap-scroll.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-snap-scroll-admin.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-settings-api.php' );
require_once( plugin_dir_path( __FILE__ ) . 'views/class-admin-panel.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 * TODO:
 *
 * - replace Plugin_Name with the name of the class defined in
 *   `class-plugin-name.php`
 */
register_activation_hook( __FILE__, array( 'Snap_Scroll', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Snap_Scroll', 'deactivate' ) );

/*
 * TODO:
 *
 * - replace Plugin_Name with the name of the class defined in
 *   `class-plugin-name.php`
 * - replace Plugin_Name_Admin with the name of the class defined in
 *   `class-plugin-name-admin.php`
 */
add_action( 'plugins_loaded', array( 'Snap_Scroll', 'get_instance' ) );
add_action( 'plugins_loaded', array( 'Snap_Scroll_Admin', 'get_instance' ) );