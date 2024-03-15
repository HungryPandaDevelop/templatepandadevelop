<?php


function new_theme_settings() {
	// add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	// add_image_size('professorLandscape', 400, 260, true);
	// add_image_size('professorPortrait', 480, 650, true);
	// add_image_size('pageBanner', 1500, 350, true);
}

add_action('after_setup_theme', 'new_theme_settings');


// customizing breadcrumbs
add_filter('bcn_breadcrumb_title', 'my_breadcrumb_title_swapper', 3, 10);
function my_breadcrumb_title_swapper($title, $type, $id)
{
    if(in_array('home', $type))
    {
        $title = __('Home');
    }
    return $title;
}

// customizing breadcrumbs


// add_filter('wpcf7_form_elements', function($content) {
// 	$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

// 	return $content;
// });

/* menu  удалить классы */


/* +удалить классы */



// таксономия в админке
function true_taxonomy_filter() {
	global $typenow; // тип поста
	if( $typenow == 'production' ){ // для каких типов постов отображать
		$taxes = array('production_category'); // таксономии через запятую
		foreach ($taxes as $tax) {
			$current_tax = isset( $_GET[$tax] ) ? $_GET[$tax] : '';
			$tax_obj = get_taxonomy($tax);
			$tax_name = mb_strtolower($tax_obj->labels->name);
			// функция mb_strtolower переводит в нижний регистр
			// она может не работать на некоторых хостингах, если что, убирайте её отсюда
			$terms = get_terms($tax);
			if(count($terms) > 0) {
				echo "<select name='$tax' id='$tax' class='postform'>";
				echo "<option value=''>Все $tax_name</option>";
				foreach ($terms as $term) {
					echo '<option value='. $term->slug, $current_tax == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>'; 
				}
				echo "</select>";
			}
		}
	}
}

add_action( 'restrict_manage_posts', 'true_taxonomy_filter' );
// таксономия в админке

// шаблон для термы таксономии
function custom_single_template($single_template) {
	global $post;

	if ($post->post_type == 'production') {
			$terms = get_the_terms($post->ID, 'production_category');

			if ($terms && !is_wp_error($terms)) {
					foreach ($terms as $term) {
							if ($term->slug == 'asfaltobetonnye-zavody') {
									// Если есть категория 'zavod', используем соответствующий шаблон
									return locate_template(array('single-production-asfaltobetonnye-zavody.php', 'single-production.php'));
							}
					}
			}
	}

	return $single_template;
}
add_filter('single_template', 'custom_single_template');
// шаблон для термы таксономии






// РОУТ ДЛЯ РЕГИСТРАЦИИ

function add_user_api($request){

	$user_id = wp_insert_user([
		'user_login'	=>	'test',
		'user_pass'	=>	'test',
		'user_email'	=>	'test@test.ru',
	]);

	if( is_wp_error($user_id) ){
		return $user_id->get_error_message();
	}else{
		return 'add done';
	}
}


add_action('rest_api_init', function(){
	register_rest_route('adeapi/v1', 'add_user_api',[
		'methods'	=>	'POST',
		'callback'	=>	'add_user_api'
	]);

});