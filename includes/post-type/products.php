<?php

register_post_type('product', array(
	'supports'          => array('title','editor','thumbnail','excerpt',),
	'has_archive'       => true,
	'public'            => true,
	// 'hierarchical'      => true,
	'query_var'         => true,
	'show_ui'           => true,
	'labels'            => array(
			'name'          => 'Продукт',
			'add_new_item'  => 'Добавить Продукт',
			'edit_item'     => 'Редактировать Продукт',
			'all_items'     => 'Все Продукты',
			'singular_name' => 'Продукты'
	),
	'menu_icon'         => 'dashicons-hammer',

));




register_taxonomy(
	'production_category', 
	array( 'product' ),
	array(
			'label'             => 'Рубрика Продукты',
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'hierarchical'      => true,
			// 'rewrite'           => array( 'slug' => 'production' ),
	) 
);




/////////////////////////////////


/*
 * Replace Taxonomy slug with Post Type slug in url
*/
function generate_taxonomy_rewrite_rules( $wp_rewrite ) {
	
  $rules = array();
  $post_types = get_post_types( array( 'name' => 'production', 'public' => true, '_builtin' => false ), 'objects' );
  $taxonomies = get_taxonomies( array( 'name' => 'production_category', 'public' => true, '_builtin' => false ), 'objects' );
	
  foreach ( $post_types as $post_type ) {
    $post_type_name = $post_type->name; // 'developer'
    $post_type_slug = $post_type->rewrite['slug']; // 'developers'

    foreach ( $taxonomies as $taxonomy ) {
      if ( $taxonomy->object_type[0] == $post_type_name ) {
        $terms = get_categories( array( 'type' => $post_type_name, 'taxonomy' => $taxonomy->name, 'hide_empty' => 0 ) );
        foreach ( $terms as $term ) {
					
					
          $rules[$post_type_slug . '/' . $term->slug . '/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug;
          $rules[$post_type_slug . '/' . $term->slug . '/page/?([0-9]{1,})/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug . '&paged=' . $wp_rewrite->preg_index( 1 );
				}
			}
    }
  }
	// echo '<pre>';
	// print_r($wp_rewrite);
	// echo '</pre>';
	
  $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}

// add_action('generate_rewrite_rules', 'generate_taxonomy_rewrite_rules',10,3);


// Замена placeholder'а %production_category% в URL
function custom_post_type_permalinks( $post_link, $post ) {
	if ( is_object( $post ) && $post->post_type == 'production' ) {

			$terms = wp_get_object_terms( $post->ID, 'production_category' );

			if ( $terms ) {
					return str_replace( '%production_oblako%', $terms[0]->slug, $post_link );
			}
	}
	return $post_link;
}

// add_filter( 'post_type_link', 'custom_post_type_permalinks', 10, 2 );

function custom_post_type_permalinks_2( $post_link, $post ) {
	if ( is_object( $post ) && $post->post_type == 'production' ) {
			$terms = wp_get_object_terms( $post->ID, 'production_category' );

			if ( $terms ) {
					$term_slugs = array();
					foreach ( $terms as $term ) {
							$term_slugs[] = $term->slug;
					}
					if ( ! empty( $term_slugs ) ) {
							$post_type_slug = $post->post_type;
							$post_link = home_url( user_trailingslashit( "$post_type_slug/$term_slugs[0]/$post->post_name" ) );

							$post_link = '/'.$post_type_slug.'/'.$term_slugs[0].'/'.$post->post_name;
					}
			}
	}
	return $post_link;
}
// add_filter( 'post_type_link', 'custom_post_type_permalinks_2', 10, 2 );