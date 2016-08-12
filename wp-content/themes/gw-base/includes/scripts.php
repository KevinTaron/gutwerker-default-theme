<?php 

// Include Scripts
function silberweiss_scripts() {

	// Override Jquery
	wp_deregister_script('jquery');
	wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js", false, null);
	wp_enqueue_script('jquery');

	// Add Bootstrap
	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'));

	// Add Royalslider
	wp_enqueue_script( 'royalslider', get_stylesheet_directory_uri() . '/js/jquery.royalslider.min.js', array('jquery'));	

	// Add Ownscriptfile
	wp_enqueue_script( 'myscripts', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery', 'royalslider'));

}
if (!is_admin()) add_action("wp_enqueue_scripts", "silberweiss_scripts", 11);


?>