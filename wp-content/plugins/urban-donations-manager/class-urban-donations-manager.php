<?php
/*
  Plugin Name: UrbanMilwaukee Political Donations Manager
  Plugin URI:
  Description: Core data management using Custom Post Types for the management of content in regard to political donations on http://UrbanMilwaukee.com
  Author: Rocky Chronister
  Version: 0.1.0
  Author URI: http://twitter.com/designbyrocky
 */


	// ADD AUTOLOADER
	spl_autoload_register('urban_autoloader');
	
	// @todo Build an autoloader that loads models programatically using class name to find the right file.
		function urban_autoloader(){
			$base_path = plugin_dir_path(__FILE__);
			$file_path = $base_path . "models/class-urban-donations-model-donation.php";
			include_once $file_path;
		}
	
	
	/**
	 * This is class Urban_Donations_Manager
	 * 
	 * @author Rocky Chronister <rocky@hyperiondesigned.com>
	 * @copyright 2014 Rocky Chronister
	 * 
	 * @category WordPress Plugins
	 * @see http://developer.wordpress.org/reference WordPress Developer Reference for stuff that's not documented here or is marked 'See WPDR'
	 */

	class Urban_Donations_Manager {
		// Private Properties
		private $base_path;
		private $template_parser;
		private $donations;
	
		public function __construct() {
			// Initialization
			$this->base_path = plugin_dir_path(__FILE__);
		
			// require_once $this->base_path . '[TEMPLATE_INIT CLASS].php'
			// $this->template_parser = [TEMPLATE_INIT :: INIT_TEMPLATES();
		
			$this->donations	= new Urban_Model_Donation( $this->template_parser );
		
		}
	}
	
	$donations_manager = new Urban_Donations_Manager();
?>
