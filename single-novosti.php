<? get_header(); ?>

<div class="stub"></div>
<div class="main-full">
  <div class="breadcrumbs">
    <?php 
      bcn_display();
    ?>
  </div>
</div>

<div class="content">

  <div class="main-grid product-main order-item-js">
    <div class="col-8  col-xs-12">
      <h1 class="get-title-order">
        <? the_title(); ?>
      </h1>
    </div>


    <?

      $next_post = get_adjacent_post(false, '', false);

      $next_post_id = $next_post->ID;

      if($next_post_id){ ?>
    <div class="col-4  col-xs-12 link-next-container">
      <a class="link-next" href="<? echo get_the_permalink( $next_post_id ) ?>"> <span>Следующая Новость
        </span><i></i>
      </a>
    </div>
    <?}?>


    <div class="col-6 col-xs-12">
      <div class="product-slider-container">
        <div class="product-slider">
          <? 	$imgs = acf_photo_gallery('news_photo', get_the_ID()); ?>

          <?php
            if($imgs){
            foreach ($imgs as $image) {
          ?>
          <a class="product-slider-item" data-thumb="<?php echo $image["full_image_url"];?>"
            data-src="<?php echo $image["full_image_url"];?>" href="<?php echo $image["full_image_url"];?>"
            data-lightbox="product">
            <div class="product-slider-loop"><i class="loop-ico"></i></div><img
              src="<?php echo $image["full_image_url"];?>" alt="">
          </a>
          <?}}?>

        </div>
      </div>

    </div>
    <div class="col-6 col-xs-12">
      <? the_content(); ?>
    </div>
  </div>
  <div class="main-full">
    <? the_field('dop_oblast_teksta_news'); ?>
  </div>




  <? get_template_part('template-parts/home/feedback'); ?>
  <div class="stub"></div>
</div>



<? get_footer(); ?>