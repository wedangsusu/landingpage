<?php 
    /*
    Plugin Name: Landing Page
    Plugin URI: http://www.wedangsusu.com
    Description: Setting landingpage for your wordpress site.
    Author: wedangsusu
    Version: 1.0
    Author URI: http://wedangsusu.com
    */

    //definitions
    if(!defined('LANDING_PATH')) define( 'LANDING_PATH', plugin_dir_path(__FILE__) );
    if(!defined('LANDING_DIR')) define( 'LANDING_DIR', plugin_dir_url(__FILE__) );

    require_once(LANDING_PATH . 'landing-page.php');
    require_once(LANDING_PATH . 'vafpress/bootstrap.php');


    $landing_page = new W_Landing_Page();
	$landing_page->init();
?>