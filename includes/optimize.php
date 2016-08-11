<?php

// Auf der Login/Registrierungs Seite?
function is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

// Wordpress Version nicht im Quellcode ausgeben
function wp_remove_version() {
	return '';
}
add_filter('the_generator', 'wp_remove_version');


// Fehlermeldungen beim Login überschreiben
add_filter('login_errors',create_function('$a', "return 'Die eingegebenen Logindaten sind falsch.';"));

/**
 * Add HTML5 theme support.
 */
function wpdocs_after_setup_theme() {
    add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );

// Farbpalette im Pagebuilder anpassen
function siteorigin_universal_color_pallet() {
?>
    <script>
        jQuery(document).ready(function($){
            $.wp.wpColorPicker.prototype.options = {
                palettes: ['#ffffff', '#000000','#f07f3c', '#eb7d25','#818181', '#cdcdcd', '#EBEBEB']
            };
        });
    </script>
<?php
}
add_action('admin_print_footer_scripts', 'siteorigin_universal_color_pallet');
add_action('customize_controls_print_footer_scripts', 'siteorigin_universal_color_pallet');


// Margin Bottom PagebuildeR Widgets
add_theme_support( 'siteorigin-panels', array(
	'margin-bottom' => 0,
	'responsive' => true,
) );

// Images Sizes in Pagebuilder Image Widget anzeigen
function mytheme_extend_size_description($form_options, $widget) {
	global $_wp_additional_image_sizes;

	$sizes = array();
    $form_options['size']['options'] = array();
    $form_options['size']['options']['full'] = 'Ganzes Bild';

	foreach ( get_intermediate_image_sizes() as $_size ) {
		if ( in_array( $_size, array('thumbnail', 'medium', 'large') ) ) {
			$sizes[ $_size ]['width']  = get_option( "{$_size}_size_w" );
			$sizes[ $_size ]['height'] = get_option( "{$_size}_size_h" );
			$sizes[ $_size ]['crop']   = (bool) get_option( "{$_size}_crop" );
		} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
			$sizes[ $_size ] = array(
				'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
				'height' => $_wp_additional_image_sizes[ $_size ]['height'],
				'crop'   => $_wp_additional_image_sizes[ $_size ]['crop'],
			);
		}
	}

	foreach ($sizes as $size => $value) {
		if($value['crop']) {
 			$form_options['size']['options'][$size] = $size . " (" . $value['width'] . "x" . $value['height'] . ", angeschnitten )";
		} else {
 			$form_options['size']['options'][$size] = $size . " (" . $value['width'] . "x" . $value['height'] . ", maximal Breite oder Höhe)";
		}
	}

    return $form_options;
}

add_filter('siteorigin_widgets_form_options_sow-image', 'mytheme_extend_size_description', 10, 2);


// Remove emojis
function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}


// Rewrite www wp-json to non www
function rewrite_api() {
    if(!preg_match("/^www/", $_SERVER['HTTP_HOST'])) { return; }
    $re = "/wp-json.*/";
    $uri = $_SERVER['REQUEST_URI'];
    preg_match_all($re, $uri, $matches);

    if(count($matches[0]) > 0) {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $newurl = $protocol;
        $newurl .= str_replace('www.', '', $_SERVER['HTTP_HOST']);
        $newurl .= $_SERVER['REQUEST_URI'];
        wp_redirect($newurl, 301);
    }
}
add_action('init', 'rewrite_api');

?>
