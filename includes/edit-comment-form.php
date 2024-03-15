<?

add_filter('comment_form_default_fields', 'unset_url_field');
function unset_url_field($fields){
    if(isset($fields['url']))
      unset($fields['url']);
      return $fields;
}





//function rjs_comments_walker()

if( ! function_exists( 'rjs_comments_walker' ) ):
function rjs_comments_walker($comment, $args, $depth) {
    ?>
<div class="reviews-item" <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
  <div class="comment">
    <div class="reviews-head">

      <div class="reviews-name reviews-head-item"><?php echo get_comment_author() ?></div>
      <div class="reviews-date reviews-head-item">
        <?php printf(/* translators: 1: date and time(s). */ esc_html__('%1$s at %2$s' , '5balloons_theme'), get_comment_date(),  get_comment_time()) ?>
      </div>
      <? 
      $count_rating = get_comment_meta( get_comment_ID(), 'rating', true );
      if($count_rating){?>
      <div class="reviews-grade reviews-head-item">
        <? echo $count_rating; ?>
      </div>
      <?}?>
    </div>
    <div class="reviews-body">
      <div class="reviews-img img-cover">
        <?php echo get_avatar(get_the_author_meta('user_email') ); ?>
      </div>
      <div class="reviews-text">
        <?php comment_text() ?>
      </div>
    </div>
  </div>
</div>
<?php
        }
endif;


add_filter('comment_form_fields', 'kama_reorder_comment_fields' );
function kama_reorder_comment_fields( $fields ){
	// die(print_r( $fields )); // посмотрим какие поля есть

	$new_fields = array(); // сюда соберем поля в новом порядке

	$myorder = array('author','email','comment'); // нужный порядок

	foreach( $myorder as $key ){
		$new_fields[ $key ] = $fields[ $key ];
		unset( $fields[ $key ] );
	}

	// если остались еще какие-то поля добавим их в конец
	if( $fields )
		foreach( $fields as $key => $val )
			$new_fields[ $key ] = $val;

	return $new_fields;
}