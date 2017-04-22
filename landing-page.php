<?php

if(!class_exists('W_Landing_Page')){
  class W_Landing_Page {

        function __construct() {
            
            
            register_activation_hook( __FILE__, array( $this, 'wpa_install' ) );
            register_deactivation_hook( __FILE__, array( $this, 'wpa_uninstall' ) );
        }

        /*
      * Actions perform at loading of admin menu
      */
        function wpa_add_menu() {

            add_menu_page( 'Landing Page', 'LandingPage', 'manage_options', 'landingpage-dashboard', array(
                              __CLASS__,
                             'wpa_page_file_path'
                            ), plugins_url('img/logo.png', __FILE__),'2.2.9');

            add_submenu_page( 'landingpage-dashboard', 'Landing Page' . ' Front Page', ' Front Page', 'manage_options', 'landingpage-dashboard', array(
                                  __CLASS__,
                                 'wpa_page_file_path'
                                ));

            add_submenu_page( 'landingpage-dashboard', 'Landing Page' . ' Templates', ' Templates', 'manage_options', 'landingpage-templates', array(
                                  __CLASS__,
                                 'wpa_page_file_path'
                                ));

            add_submenu_page( 'landingpage-dashboard', 'Landing Page' . ' Settings', '<b style="color:#f9845b">Settings</b>', 'manage_options', 'landingpage-settings', array(
                                  __CLASS__,
                                 'wpa_page_file_path'
                                ));
        }
		
		function init(){
			add_action( 'admin_menu', array( $this, 'wpa_add_menu' ) );
            add_action( 'admin_enqueue_scripts', array( $this, 'wpa_styles') );
			add_action('init', array(&$this, 'register_landingpage_posttype'));
			//add_action('init', array(&$this, 'add_shortcode'));
		}
		
		
		/**
		 * Register template post type
		 */
		function register_landingpage_posttype() {
		
			if(!post_type_exists('landingpage')) {
			
				$template_args = array(
					'labels' => array(
						'name' => 'Templates',
					),
					'public' => false,
					'show_ui' => false,
					'capability_type' => 'page',
					'hierarchical' => false,
					'rewrite' => false,
					'supports' => array( 'title', 'editor' ), 
					'query_var' => false,
					'can_export' => true,
					'show_in_nav_menus' => false
				);
				
				if($this->args['debug'] == true && WP_DEBUG == true) {
					$template_args['public'] = true;
					$template_args['show_ui'] = true;
				}
				
				register_post_type( 'landingpage', $template_args);
				
			} 			
		}
       

        /*
         * Actions perform on loading of menu pages
         */
        static function wpa_page_file_path() {
          
            $screen = get_current_screen();

            if ( strpos( $screen->base, 'landingpage-settings' ) !== false ) {
                include( dirname(__FILE__) . '/includes/analytify-settings.php' );
            } 
            elseif(strpos( $screen->base, 'landingpage-templates' ) !== false){
                include( dirname(__FILE__) . '/includes/editor.php' );
            }
            else {
                include( dirname(__FILE__) . '/includes/landingpage-dashboard.php' );
            }

        }

        /**
         * Styling: loading stylesheets for the plugin.
         */
        public function wpa_styles( $page ) {

            wp_enqueue_style( 'wp-landing-style', plugins_url('css/style.css', __FILE__));
            wp_enqueue_style( 'wp-bootstrap-landing-style', plugins_url('css/bootstrap.min.css', __FILE__));
            wp_enqueue_style( 'gridster-style', plugins_url('css/jquery.gridster.css', __FILE__));
            wp_enqueue_style( 'gridster-script-extra', plugins_url('js/jquery.gridster.with-extras.min.js', __FILE__));

            wp_enqueue_script("gridster-script", plugins_url('js/jquery.gridster.min.js', __FILE__));
            
            wp_enqueue_script('jquery-custom-injection', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', __FILE__, '2.1.3', 0 );
            wp_enqueue_script('angular_landing_js', plugins_url('/js/angular.min.js', __FILE__));
            wp_enqueue_script('script-landing-javascript', plugins_url('js/script.js', __FILE__));

            wp_enqueue_script('wp-bootstrap-landing-javascript', plugins_url('js/bootstrap.min.js', __FILE__));
            wp_enqueue_script('pagination_js', plugins_url('/js/dirPagination.js', __FILE__));
            wp_enqueue_script('landing_masonry_js', plugins_url('/js/masonry.pkgd.min.js', __FILE__));
            wp_enqueue_script('landing_imageloaded_js', plugins_url('/js/imagesloaded.pkgd.js', __FILE__));
        }
    }
}
