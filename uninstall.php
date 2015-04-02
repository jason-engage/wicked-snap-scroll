<?php
/* 
 * @package   			Wicked Snap Scroll
 * @author    			Engage Inc
 * @link      			http://snapscroll.engagefb.com/     
 * Description:         Our Wicked Snap Scroll for Wordpress plugin allows you to define 'anchor points' into which the window snaps when you scroll through a webpage.
 * Version:             1.0.0
 * Author:              Engage Inc
 * Author URI:          http://en.gg
 * Copyright: 		    Engage Inc.
 */

// If uninstall, not called from WordPress, then exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// TODO: Define uninstall functionality here
	delete_option('snap_basics');

