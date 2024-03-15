<?
use Carbon_Fields\Container;
use Carbon_Fields\Field;

	
Container::make( 'theme_options', 'Настройки сайта' )
	->add_tab( __( 'Контакты' ), array(
		Field::make( 'text', 'crb_address', __( 'Адрес' ) ),
		Field::make( 'map', 'crb_company_location', 'Location' ),
		Field::make( 'complex', 'crb_phones','Телефоны' )
		->set_layout( 'tabbed-horizontal' )
		->add_fields( array(
			Field::make( 'text', 'title' ),
			Field::make( 'text', 'link' ),
		)),
		Field::make( 'text', 'crb_mail', __( 'Почта' ) ),
		Field::make( 'text', 'crb_vk', __( 'Vk' ) ),
		Field::make( 'text', 'crb_instagam', __( 'Instagam' ) ),
		Field::make( 'text', 'crb_facebook', __( 'Facebook' ) ),
		Field::make( 'text', 'crb_twitter', __( 'Twitter' ) ),
		Field::make( 'text', 'crb_youtube', __( 'YouTube' ) ),
		Field::make( 'text', 'crb_google', __( 'Google' ) ),
		
	) )
	->add_tab( __( 'Общие настройки' ), array(
		Field::make( 'textarea', 'crb_footer_copyright', 'текс copyright' )
	));


add_action('init','create_global_variable');
function create_global_variable(){
	global $crbAll;

	$crbAll = [
//		'phone'	=>	carbon_get_theme_option('site_phone'),
		'address'	=>	carbon_get_theme_option('crb_address'),
		'phones'	=>	carbon_get_theme_option('crb_phones'),
		'mail'	=>	carbon_get_theme_option('crb_mail'),
		'facebook'	=>	carbon_get_theme_option('crb_facebook'),
		'inst'	=>	carbon_get_theme_option('crb_instagam'),
		'vk'	=>	carbon_get_theme_option('crb_vk'),
		'tw'	=>	carbon_get_theme_option('crb_twitter'),
		'youtube'	=>	carbon_get_theme_option('crb_youtube'),
		'google'	=>	carbon_get_theme_option('crb_google'),
		'copyright'	=>	carbon_get_theme_option('crb_footer_copyright')
	];
}

add_filter( 'carbon_fields_map_field_api_key', 'crb_get_gmaps_api_key' );
function crb_get_gmaps_api_key( $current_key ) {
    return 'AIzaSyDcU8bDX4cfpfloBvOB2sFIDio7guSEOlI';
}