<?php

register_post_type('news', array(
	'public'	=>	true,
	'supports'	=> array('title','editor','thumbnail','excerpt',),
	'has_archive'	=>	true,
	'public'	=>	true,
	'show_in_menu' => true,
	'query_var' => true,
	'show_ui' => true,
	'labels'	=>	array(
		'name'	=>	'Новости',
		'add_new_item'	=>	'Добавить Новости',
		'edit_item'	=>	'Редактировать Новости',
		'all_items'	=>	'Все Новости',
		'singular_name'	=>	'Новости'
	),
	'menu_icon'	=>	'dashicons-admin-site'
));