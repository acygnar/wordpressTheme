<?php 

/////////////////////////////////////////////ENQUEUE/////////////////////////////////////////////////

function load_stylesheets(){

    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css',array(),false,'all' );
    wp_enqueue_style('bootstrap');

    wp_register_style('style', get_template_directory_uri() . '/style.css',array(),false,'all' );
    wp_enqueue_style('style');

}
add_action('wp_enqueue_scripts', 'load_stylesheets');

function include_jquery(){

wp_deregister_script('jquery');
wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.5.1.min.js','',1 , true );

add_action('wp_enqueue_scripts', 'jquery');

}
add_action('wp_enqueue_scripts', 'include_jquery');

function loadjs(){

    wp_register_script('customjs', get_template_directory_uri() . '/js/scripts.js','',1 , true );
    wp_enqueue_script('customjs');

}


add_action('wp_enqueue_scripts', 'loadjs');


////////////////////////////////////////////////////////////////////////////////////////////////////


add_theme_support('menus');                      
add_theme_support( 'post-thumbnails' );
add_image_size( 'small', 200, 100, true); 
add_image_size('medium',500,500, false);                                    
  




////////////////////////////////////////////MENU//////////////////////////////////////////////////////

register_nav_menus( array(

  'top-menu' => __('Top Menu', 'theme'),
  'footer-menu' => __('Footer Menu', 'theme'),

) );


// CPT


///////////////////////////////////////PRODUCT/////////////////////////////////////////////////
function my_custom_post_product() {
  $labels = array(
    'name'               => _x( 'Products', 'post type general name' ),
    'singular_name'      => _x( 'Product', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Product' ),
    'edit_item'          => __( 'Edit Product' ),
    'new_item'           => __( 'New Product' ),
    'all_items'          => __( 'All Products' ),
    'view_item'          => __( 'View Product' ),
    'search_items'       => __( 'Search Products' ),
    'not_found'          => __( 'No products found' ),
    'not_found_in_trash' => __( 'No products found in the Trash' ), 
    'parent_item_colon'  => '’',
    'menu_name'          => 'Products'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our products and product specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'product', $args ); 
}
add_action( 'init', 'my_custom_post_product' );

  function my_taxonomies_product() {
    $labels = array(
      'name'              => _x( 'Product Categories', 'taxonomy general name' ),
      'singular_name'     => _x( 'Product Category', 'taxonomy singular name' ),
      'search_items'      => __( 'Search Product Categories' ),
      'all_items'         => __( 'All Product Categories' ),
      'parent_item'       => __( 'Parent Product Category' ),
      'parent_item_colon' => __( 'Parent Product Category:' ),
      'edit_item'         => __( 'Edit Product Category' ), 
      'update_item'       => __( 'Update Product Category' ),
      'add_new_item'      => __( 'Add New Product Category' ),
      'new_item_name'     => __( 'New Product Category' ),
      'menu_name'         => __( 'Product Categories' ),
    );
    $args = array(
      'labels' => $labels,
      'hierarchical' => true,
    );
    register_taxonomy( 'product_category', 'product', $args );
  }
  add_action( 'init', 'my_taxonomies_product', 0 );

  ////////////////////////////////////CARS////////////////////////////////////////////////////


  function cars_post_type(){
    $labels = array(
            'name' => 'Samochody',
            'singular_name' => 'Samochód',
    );
  
    $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'public'=> true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-car',
            'supports' => array('title','editor','thumbnail','custom-fields'),
          );
  
    register_post_type('cars', $args);
  
  };
  add_action( 'init', 'cars_post_type');
  
  
  function cars_first_taxonomy(){
    $args = array(
    'labels' => array(
        'name' => 'Marki',
        'singular_name' => 'Marka',
    ),
    'public' => true,
    'hierarchical' =>true,
    
  );
  
    register_taxonomy('brands',array('cars'),$args);
  };
  add_action( 'init', 'cars_first_taxonomy');





 //////////////////////// CONDITIONALS TAGS ///////////////////////////////////


function conditionalText(){
if(is_front_page()) {
  echo 'To jest Strona Głowna plik front-page.php';
}
elseif(is_home()) {
  echo 'To jest Blog, korzysta z index.php';
}
elseif(is_page()){
  echo 'Korzystam z page.php';
}
elseif(is_single()){
  echo 'Korzystam z single-slug.php';
}
elseif(is_archive()){
  echo 'Korzystam z archive.php';
}
};


///////////////////////////ACF/////////////////////////////////////


function get_specifications_fields() {

	global $post;
	
	$specifications_group_id = 479; // Post ID of the specifications field group.
	$specifications_fields = array();
	
	$fields = acf_get_fields( $specifications_group_id );
	
	foreach ( $fields as $field ) {
		$field_value = get_field( $field['name'] );
		
		if ( $field_value && !empty( $field_value ) ) {
			$specifications_fields[$field['name']] = $field;
			$specifications_fields[$field['name']]['value'] = $field_value;
		}
	}
	
	return $specifications_fields;

}




?>
