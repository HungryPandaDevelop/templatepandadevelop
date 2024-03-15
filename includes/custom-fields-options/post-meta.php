<?
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;


Container::make( 'post_meta', 'Первый слайдер' )
	->show_on_page(6)
	->add_tab('Первый слайдер',[
		Field::make( 'complex', 'crb_slides', 'Slides' )
		->set_layout( 'tabbed-horizontal' )
		->add_fields( array(
			Field::make( 'text', 'line_1', 'Линия 1' ),
			Field::make( 'text', 'line_2', 'Линия 2' ),
			Field::make( 'text', 'line_3', 'Линия 3' ),
			Field::make( 'text', 'link', 'Ссылка' ),
			Field::make( 'image', 'img', 'Главная картинка' )
				->set_value_type( 'url' ),
		))
	]);