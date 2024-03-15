<div class="about-slider-item main-grid  order-item-js">
  <div class="col-4 col-xs-6">
    <div class="about-item about-item-main">
      <?
      $thumbnail_url = get_the_post_thumbnail_url($args['id'], 'full'); // Замените 'thumbnail' на нужный размер
      ?>

      <div class="img-cover"><img src="<? echo $thumbnail_url; ?>" alt=""></div>
      <div class="about-item-num"> <span>
          <? echo $args['count']; ?>
        </span></div>
    </div>
  </div>
  <div class="col-8 col-xs-12">
    <div class="about-item about-item-info">
      <div class="info-cell">
        <h3 class="get-title-order">

          <? echo get_field('tehnicheskie_harakteristiki')['osnovnye_parametry']['tip_ustanovki']; ?>
        </h3>
        <div>Модель</div>
      </div>
      <div class="info-cell">
        <h3>
          <? echo get_field('tehnicheskie_harakteristiki')['osnovnye_parametry']['proizvoditelnost']; ?>
        </h3>
        <div>Производительность </div>
      </div>
      <div class="info-cell">
        <h3>
          <? echo get_field('tehnicheskie_harakteristiki')['osnovnye_parametry']['obem_smesitelya']; ?>
        </h3>
        <div>Объем смесителя</div>
      </div>
      <div class="info-cell"><a class="about-btn--black" href="<? echo get_the_permalink($args['id']); ?>"> <i>
          </i><span>Подробнее</span></a></div>
    </div>
  </div>
  <div class="col-4 col-xs-6 about-item-price-cell">
    <div class="about-item about-item-price">
      <!-- <h3>150 млн. руб</h3> -->
      <!-- <div>Средняя стоимость</div> -->
      <div class="btn-container"> <a class="order-btn--white element-btn" data-element="3" href="#">
          <i></i><span>Забронировать</span></a></div>
    </div>
  </div>
  <? if($args['next_id']){?>
  <div class="col-4 col-xs-6">
    <div class="about-item about-item-next">
      <h3>
        <? echo get_the_title( $args['next_id']); ?>
      </h3>
      <div>
        <? echo get_field('tehnicheskie_harakteristiki', $args['next_id'])['osnovnye_parametry']['proizvoditelnost']; ?>
      </div>
      <div class="btn-container"> <a class="more-btn--gray next-about-slider" href="#"> <i></i><span>Следующий
            завод
          </span></a>
      </div>
    </div>
  </div>
  <div class="col-4 col-xs-6">
    <div class="about-item about-item-preview">
      <?
      
      $thumbnail_url_next = get_the_post_thumbnail_url($args['next_id'], 'full'); // Замените 'thumbnail' на нужный размер
      ?>
      <div class="img-cover"><img src="<? echo $thumbnail_url_next; ?>" alt=""></div>
      <div class="about-item-num"> <span>
          <? echo $args['count'] + 1; ?>
        </span></div>
    </div>
  </div>
  <?}else{?>

  <div class="col-4 col-xs-6">
    <div class="about-item about-item-next">
      <h3>
        <? echo get_the_title( $args['first_id']); ?>
      </h3>
      <div>
        <? echo get_field('tehnicheskie_harakteristiki', $args['first_id'])['osnovnye_parametry']['proizvoditelnost']; ?>
      </div>
      <div class="btn-container"> <a class="more-btn--gray next-about-slider" href="#"> <i></i><span>
            Следующий завод

          </span></a>
      </div>
    </div>
  </div>
  <div class="col-4 col-xs-6">
    <div class="about-item about-item-preview">
      <?
      $thumbnail_url_next = get_the_post_thumbnail_url($args['first_id'], 'full'); // Замените 'thumbnail' на нужный размер
      ?>
      <div class="img-cover"><img src="<? echo $thumbnail_url_next; ?>" alt=""></div>
      <div class="about-item-num"> <span>
          1
        </span></div>
    </div>
  </div>

  <?} ?>

</div>