<?php
	
	/**
	 * This is class Urban_Model_Donation
	 *
	 * @author Rocky Chronister <rocky@hyperiondesigned.com>
	 * @copyright 2014 Rocky Chronister
	 * 
	 * @category WordPress Plugins
	 * @see http://developer.wordpress.org/reference WordPress Developer Reference for stuff that's not documented here or is marked 'See WPDR'
	 * 
	 */	

	class Urban_Model_Donation{
	
		private $post_type;
		private $template_parser;
		private $donor_taxonomy;
		private $district_taxonomy;
		private $error_message;
	
		
		public function __construct ( $template_parser ){
			// Initializer
			
			$this->post_type			= "urban_donation";
			$this->donor_taxonomy		= "urban_donor";
			$this->district_taxonomy	= "urban_district";
		
			$this->error_message		= "";
		
			$this->template_parser		= $template_parser;
		
			add_action( 'init', array( $this, 'create_donations_post_type' ) );
		
			add_action( 'init', array( $this, 'create_donations_custom_taxonomies' ) );
		
			add_action( 'add_meta_boxes', array( $this, 'add_donations_meta_boxes' ) );
		
			add_action( 'save_post', array( $this, 'save_donation_meta_data' ) );
		
			add_filter( 'post_updated_messages', array( $this, 'generate_donation_messages' ) );
		}
		
		
		public function create_donations_post_type(){
			// Configure the Donations WordPress Post Type
				// Build array of label options. Used in $args['labels'].
				$labels = array(
					'name'                  => __( 'Donations', 'urban' ),
					'singular_name'         => __( 'Donation', 'urban' ),
					'add_new'               => __( 'Add New', 'urban' ),
					'add_new_item'          => __( 'Add New Donation', 'urban' ),
					'edit_item'             => __( 'Edit Donation', 'urban' ),
					'new_item'              => __( 'New Donation', 'urban' ),
					'all_items'             => __( 'All Donations', 'urban' ),
					'view_item'             => __( 'View Donation', 'urban' ),
					'search_items'          => __( 'Search Donations', 'urban' ),
					'not_found'             => __( 'No donations found', 'urban' ),
					'not_found_in_trash'    => __( 'No donations found in the Trash', 'urban' ),
					'parent_item_colon'     => '',
					'menu_name'             => __( 'Donations', 'urban' )
				);
				
				// Build array of Rewrite options. Used in $args['rewrite'].
				$rewrite = array(
					'slug'					=> 'donations',
					'with_front'			=> false
				);
				
				// Build array of register_post_type options. See WPDR.
				$args = array(
					'labels'                => $labels,
					'hierarchical'          => true,
					'description'           => 'Donations',
					'supports'              => array('title', 'editor'),
					'public'                => true,
					'show_ui'               => true,
					'show_in_menu'          => true,
					'menu_icon'				=> 'dashicons-id-alt',
					'show_in_nav_menus'     => true,
					'publicly_queryable'    => true,
					'exclude_from_search'   => false,
					'has_archive'           => true,
					'query_var'             => true,
					'can_export'            => true,
					'rewrite'               => $rewrite,
					'capability_type'       => 'post'	
				);
		
		// Fire WordPress Function.
				register_post_type ( $this->post_type, $args);
		}
		
	
	public function create_donations_custom_taxonomies(){}
	public function add_donations_meta_boxes(){}
	public function save_donation_meta_data(){}
	public function generate_donation_messages(){}
	
}
	
?>