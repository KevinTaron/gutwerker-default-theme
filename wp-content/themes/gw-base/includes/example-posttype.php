<?php 

/**
 * Title: Posttypes 
 * Description: Erstellt Posttyp und Taxonomy für "Filialien"
 * Version: 2.0
 * Author: SILBERWEISS | Kevin Taron
 */

/**
 * Erstellt den Post-Typ: "Filialien"
 * @return none
 */
function create_post_type_filialien() {
  register_post_type( 'filialien',
    array(
      'labels' => array(
        'name' => __( 'Filialien' ),
        'singular_name' => __( 'Filialie' )
        ),
      'public' => true,
      'has_archive' => true,
      'supports' => array('title', 'editor', 'thumbnail'),
      'map_meta_cap' => true
      )
    );

}
add_action( 'init', 'create_post_type_filialien' );

/**
 * Erstellt die Taxonomy: "Filialien "
 * @return none
 */
register_taxonomy('filialien_category',array('filialien'), array(
  'hierarchical' => true,
  'labels' => array('name' => 'Filialien Kategorien', 'singular_name' => 'Filialie Kategorie'),
  'show_ui' => true,
  'query_var' => true,
  'rewrite' => true,
  ));


/**


?>