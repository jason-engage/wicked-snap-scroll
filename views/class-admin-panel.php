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
if ( !class_exists('Snap_Settings_API_Test' ) ):
class Snap_Settings_API_Test {

    private $settings_api;

    function __construct() {
        $this->settings_api = new Snap_Settings_API;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
        add_options_page( 'Wicked Snap Scroll', 'Wicked Snap Scroll', 'delete_posts', 'snap-scroll-settings', array($this, 'plugin_page') );
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id' => 'snap_basics',
                'title' => __( 'Basic Settings', 'Snap' )
            )
        );
        
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'snap_basics' => array(
                array(
                    'name'      => 'snaps',
                    'label'     => __( 'CSS Selector', 'Snap' ),
                    'desc'      => __( 'Enter the #ID or .Class you would like to snap.', 'Snap' ),
                    'type'      => 'text',
                    'default'   => 'p'
                ),
                array(
                    'name'              => 'proximity',
                    'label'             => __( 'Proximity Range', 'Snap' ),
                    'desc'              => __( 'Enter the proximity in px. ', 'Snap' ),
                    'type'              => 'text',
                    'default'           => '300',
                    'sanitize_callback' => 'intval'
                ),
                array(
                    'name'              => 'offset',
                    'label'             => __( 'Offset Distance', 'Snap' ),
                    'desc'              => __( 'Enter the offset amount in px or -px.', 'Snap' ),
                    'type'              => 'text',
                    'default'           => '0',
                    'sanitize_callback' => 'intval'
                ),
                array(
                    'name'              => 'duration',
                    'label'             => __( 'Duration', 'Snap' ),
                    'desc'              => __( 'Enter the duration in ms (<3000).', 'Snap' ),
                    'type'              => 'text',
                    'default'           => '300',
                    'sanitize_callback' => 'intval'
                ),                
                array(
                    'name'      => 'direction',
                    'label'     => __( 'Direction', 'Snap' ),
                    'type'      => 'radio',
                    'default'   => 'y',
                    'options'   => array(
                        'y'     => 'Y-Direction (Vertical)',
                        'x'     => 'X-Direction (Horizontal)'
                    )
                ),
                array(
                    'name'      => 'easing',
                    'label'     => __( 'Animation Type', 'Snap' ),
                    'desc'      => __( 'Select an animation type', 'Snap' ),
                    'type'      => 'select',
                    'default'   => 'swing',
                    'options'   => array(
                    	'swing'             => 'swing',
                    	'easeInOutExpo'     => 'easeInOutExpo',
                    	'easeOutBack'       => 'easeOutBack',
                    	'easeOutElastic'    => 'easeOutElastic',
                    	'easeOutExpo'       => 'easeOutExpo',    	
                    	'easeOutBounce'     => 'easeOutBounce'

                    )
                ),
                array(
                    'name'      => 'once',
                    'label'     => __( 'Disable Multi Snap', 'Snap' ),
                    'type'      => 'checkbox',
                    'desc'      => __( 'Turn off repeated snapping.', 'Snap' ),
                    'default'   => ''
                    
                ),
            )
               
        );

        return $settings_fields;
    }

    function plugin_page() {
        echo '<div class="wrap">';

        $this->settings_api->show_forms();

        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif; 

$settings = new Snap_Settings_API_Test();

?>