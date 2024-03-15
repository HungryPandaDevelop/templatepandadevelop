<?

$idCustomType = $args['idCustomType'];
$news = new WP_Query(array(
	'posts_per_page'  =>  4, // вывести все
	'post_type' =>  $idCustomType,
	'order' =>  'DESK', // порядок сортировки
));

$obj = get_post_type_object( $idCustomType );

?>

<section>
  <div class="main-full">
    <h2>
      <? echo $obj->label; ?>
    </h2>
  </div>
  <div class="main-grid">
    <?php
		while($news->have_posts()) {
			$news->the_post();
		?>
    <div class="item item-col-quarter news-item">

      <a class="item__img img-cover" href="<? the_permalink(); ?>">
        <? if(get_the_post_thumbnail_url()){?>
        <img src="<? the_post_thumbnail_url(); ?>" alt="">
        <?}else{?>
        <img src="<?php echo get_bloginfo('template_url');?>/images/item-stub.svg" alt="">
        <?} ?>
      </a>
      <div class="item__date">
        <? echo carbon_get_the_post_meta( 'date_start' ); ?>
        <? if(carbon_get_the_post_meta( 'date_end' )){ ?>/
        <? echo carbon_get_the_post_meta( 'date_end' ); }?>
      </div>
      <h3><a href="<? the_permalink(); ?>">
          <? the_title(); ?>
        </a></h3>
      <div class="item__description">
        <?   echo get_the_excerpt(); ?>
      </div>
      <a class="btn btn--green" href="<? the_permalink(); ?>">Подробнее</a>
    </div>
    <? }
		wp_reset_postdata();
		?>
  </div>
  <div class="main-full">
    <div class="btn-container">
      <a href="<? echo get_post_type_archive_link($idCustomType);  ?>" class="btn btn--black">Все
        <? echo $obj->label; ?>
      </a>
    </div>
  </div>
</section>