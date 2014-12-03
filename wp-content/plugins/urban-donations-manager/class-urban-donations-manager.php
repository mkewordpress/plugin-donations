<?php
/*
  Plugin Name: UrbanMilwaukee Political Donations Manager
  Plugin URI:
  Description: Core data management using Custom Post Types for the management of content in regard to political donations on http://UrbanMilwaukee.com
  Author: Rocky Chronister
  Version: 0.1.0
  Author URI: http://www.hyperiondesigned.com/
 */

// ADD AUTOLOADER
spl_autoload_register('urban_autoloader');
function urban_autoloader(){
	$base_path = plugin_dir_path(__FILE__);
	$file_path = $base_path . "models/class-urban-donations-model-donation.php";
	include_once $file_path;
}

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