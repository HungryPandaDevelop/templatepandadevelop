<? get_header(); ?>
<? 	$imgs = acf_photo_gallery('galereya', get_the_ID()); ?>

<div class="stub"></div>
<div class="main-full">
  <div class="breadcrumbs">
    <?
      bcn_display();
		?>
  </div>
</div>

<div class="content">
  <div class="main-grid">
    <div class="col-8">
      <h1>
        <? the_title(); ?>
      </h1>
    </div>
    <div class="col-4 link-next-container"><a class="link-next" href="#"> <span>Следующий проект</span><i></i></a></div>
  </div>
  <div class="main-grid product-main">
    <div class="col-6 col-xs-12">
      <div class="product-slider-container">
        <div class="product-slider">
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
      <div class="product-info">
        <h3>Технические характеристики проекта</h3>
        <div class="main-grid">
          <div class="col-6 col-xs-12">
            <h4>
              <? echo get_field('srok_realizacii'); ?>
            </h4><span>Срок реализации проекта</span>
          </div>
          <div class="col-6 col-xs-12">
            <h4>
              <? echo get_field('data_sdachi'); ?>
            </h4><span>Дата сдачи проекта</span>
          </div>
          <div class="col-12">
            <h4>
              <? echo get_field('ispolzuemoe_oborudovanie'); ?>
            </h4><span>Использованное
              оборудование</span>
          </div>
          <div class="col-12">
            <h4>
              <? echo get_field('mestorapolozhenie'); ?>
            </h4><span>Месторасположение</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main-full">
    <div class="product-description">
      <h3>Описание проекта:</h3>
      <div class="product-description-container">
        <? the_content();?>
      </div>

    </div>
  </div>



  <? get_template_part('template-parts/home/products',null, array(
    'term' =>  'asfaltobetonnye-zavody'
  )); ?>


  <? get_template_part('template-parts/home/feedback'); ?>

  <div class="stub"></div>
</div>

<div class="stub"></div>
<? get_footer(); ?>