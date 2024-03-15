<? get_header(); ?>
<div class="main-full">
  <div class="breadcrumbs">
    <?
      // bcn_display();
		?>
  </div>
</div>
<?
$post_type = get_queried_object();
$idCustomType = $post_type->rewrite['slug'];

?>
<div class="stub"></div>
<div class="content">
  <div class="main-full">
    <h1>
      <? echo post_type_archive_title(); ?>
    </h1>
  </div>
  <div class="main-grid catalog-grid">
    <?
      while(have_posts()){
        the_post();?>

    <div class="item item-col-quarter <? echo $idCustomType; ?>-item">
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
      <h3>
        <a href="<? the_permalink(); ?>">
          <? the_title(); ?>
        </a>
      </h3>
      <div class="item__description">
        <? echo get_the_excerpt(); ?>
      </div>
      <a class="btn btn--black" href="<? the_permalink(); ?>">Подробнее</a>
    </div>

    <?}?>
  </div>
</div>
<div class="main-full">
  <?php the_posts_pagination(); ?>
</div>
<? get_footer(); ?>