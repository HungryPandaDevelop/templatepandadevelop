<?

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Container::make( 'post_meta', 'Даты' )
// 	->where('post_type', '=', 'news')
// 	->or_where('post_type', '=', 'article')
// 	->add_fields([
// 		Field::make( 'date', 'date_start', 'Дата' )
// 		->set_storage_format( 'Y-m-d' )
// 	]);



// Container::make( 'post_meta', 'Даты' )
// 	->where('post_type', '=', 'discount')
// 	->add_fields([
// 		Field::make( 'date', 'date_start', 'Дата' )
// 		->set_storage_format( 'Y-m-d' )
// 	])
// 	->add_fields([
// 		Field::make( 'date', 'date_end', 'Дата окончания' )
// 		->set_storage_format( 'Y-m-d' )
// 	]);

// Container::make( 'post_meta', 'Пункты узлов' )
// 	->where('post_type', '=', 'nodes')
// 	->add_fields([
// 		Field::make( 'image', 'nodes_img', 'Главная картинка' )
// 			->set_value_type( 'url' ),
// 		Field::make( 'media_gallery', 'nodes_imgs', 'Галерея' ),
// 		Field::make( 'complex', 'nodes_point', 'Пункты' )
// 		->set_layout( 'tabbed-horizontal' )
// 		->add_fields( array(
// 			Field::make( 'text', 'nodes_text', 'Сам текст' ),
// 		))
// 	]);