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
      $termID = wp_get_post_terms(get_the_ID(), 'production_category')[0]->term_id;
      $next_post = get_adjacent_post(false, '', false);

      $next_post_id = $next_post->ID;
      $next_termID = wp_get_post_terms($next_post_id, 'production_category')[0]->term_id;

      if($termID==$next_termID){ ?>
    <div class="col-4  col-xs-12 link-next-container">
      <a class="link-next" href="<? echo get_the_permalink( $next_post_id ) ?>"> <span>Следующий товар
        </span><i></i>
      </a>
    </div>
    <?}?>


    <div class="col-6 col-xs-12">
      <div class="product-slider-container">
        <div class="product-slider">
          <? 	$imgs = acf_photo_gallery('gallery', get_the_ID()); ?>

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

      <div class="product-about">
        <div class="btn btn--red element-btn" data-element="3">Забронировать</div>
        <div class="about-item about-item-price hidden-xs">
          <!-- <h3>150 млн. руб</h3> -->
          <!-- <div>Средняя стоимость</div> -->
          <div class="btn-container"> <a class="more-btn--white element-btn" data-element="3" href="#">
              <i></i><span>Забронировать</span></a></div>

        </div>
        <div class="product-about-text">
          <? the_field('opisanie_po_galereej'); ?>
          <!-- <p>Все оборудование имеет сертификаты ISO9001:2000 и сертификаты соответствия нормам и директива Евросоюза –
            СЕ.</p>
          <p>Асфальтобетонный завод данной серии служит отличным решением для выпуска щебеночно-мастичных
            сфальтобетонных смесей.</p> -->
        </div>
      </div>
    </div>
    <div class="col-6 col-xs-12">
      <div class="product-info">

        <? 
        $categories = get_the_terms(get_the_ID(), 'production_category');
    
        get_template_part('template-parts/products/single-param',null, array(
            'term' =>  $categories[0]->slug,
            // 'id'  => get_the_ID()
          )); ?>
      </div>
    </div>
  </div>
  <div class="main-full">
    <div class="product-description">
      <div class="product-description-container">
        <? the_content(); ?>
      </div>
      <div class="btn-container">
        <!-- <div class="btn btn--black-border">Показать еще </div> -->
      </div>
    </div>
  </div>


  <? 
  $terms = get_the_terms( get_the_ID(), 'production_category');

  get_template_part('template-parts/home/products',null, array(
    'term' =>  $terms[0]->slug
  )); 
  ?>

  <? get_template_part('template-parts/home/feedback'); ?>

</div>

<div class="stub-footer"></div>
<? get_footer(); ?>