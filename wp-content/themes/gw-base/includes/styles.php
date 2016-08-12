<?php

// Styles can also be added via LESS

// Less Style nicht im Backend
function silberweiss_setup() {
	if (!is_admin() and !is_login_page()) {
		wp_enqueue_style( 'lekton', '//fonts.googleapis.com/css?family=Lekton:400,700' );
		wp_enqueue_style( 'roboto', '//fonts.googleapis.com/css?family=Roboto:400,300,700' );
		wp_enqueue_style( 'less-style', get_template_directory_uri() . '/less/silberweiss-theme.less' );
	}
}
add_action( 'wp_enqueue_scripts', 'silberweiss_setup' );


?>