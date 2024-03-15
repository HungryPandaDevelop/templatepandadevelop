<div class="product-item-hint">
  <? if($args['typeItem'] == 'asfaltobetonnye-zavody'){ ?>
  <?  if( get_field('tehnicheskie_harakteristiki')['sushilnyj_baraban']['diametr_sushilnogo_barabana']){ ?> Шеф -
  монтаж:
  <? echo get_field('tehnicheskie_harakteristiki')['sushilnyj_baraban']['diametr_sushilnogo_barabana']; ?>
  <?};?>
  <?}else{?>

  <?  if(get_field('otgruzka',  $args['id'] )){ ?> Отгрузка:
  <? echo get_field('otgruzka',  $args['id'] ); ?>
  <?};?>
  <?}?>
</div>
<div class="product-item order-item-js">
  <span class="more-btn--white product-btn-hover"><i></i></span>
  <a href="<? the_permalink( $args['id'] ); ?>" class="product-item-img">
    <h3 class="get-title-order">
      <? echo get_the_title(); ?>
    </h3>
    <?
      $thumbnail_url = get_the_post_thumbnail_url($args['id'], 'full'); // Замените 'thumbnail' на нужный размер
      ?>
    <div class="product-item-cover img-cover"><img src="<?php echo $thumbnail_url; ?>" alt=""></div>
    <span class="more-btn--white product-btn-bottom"><i></i></span>
  </a>
  <?
    // echo $args['typeItem'];
  ?>
  <? /*get_template_part('template-parts/module/items/product-info/'. $args['typeItem'],null, array(
            // 'ID' =>  get_the_ID(),
          ));*/
          
          
          
          ?>

  <? 
    $getField = $args['typeItem'];
    // print_r($getField);

    if($getField ==='dorozhnye-frezy'  || $getField === 'asfaltovye-katki' || $getField === 'trotuarnye-katki' ){
      $getField =  'dorozhno-stroitel-naya-tehnika';
    }
    // if($getField ==='asfaltovye-katki'){
    //   $getField =  'katki';
    // }


    if($args['typeItem'] == 'asfaltobetonnye-zavody'){
      $getField = 'tehnicheskie_harakteristiki';
      $repeater_items = get_field($getField)['osnovnye_parametry']; 
      
    }
    else{
      $repeater_items = get_field($getField); 
    }
    
    
    ?>
  <div class="product-item-info">
    <ul class="ln product-item-description">

      <?
      // print_r(get_field_object('tehnicheskie_harakteristiki')[sub_fields][0][sub_fields][0]);
    $i = 0;

    foreach ($repeater_items as $field_name => $field_value) {
    
  ?>
      <? if($args['typeItem'] == 'asfaltobetonnye-zavody'){ ?>
      <? if($field_value && ($i==0 || $i==1 || $i==2)){?>
      <li>
        <div>
          <? echo get_field_object('tehnicheskie_harakteristiki')[sub_fields][0][sub_fields][$i][label] ?>:
        </div>
        <b>
          <? echo $field_value; ?>
        </b>
      </li>
      <?}?>
      <?}?>



      <? if($args['typeItem'] != 'asfaltobetonnye-zavody' && $args['typeItem'] != 'dorozhnye-frezy' && $args['typeItem'] != 'asfaltovye-katki' && $args['typeItem'] != 'trotuarnye-katki' && $args['typeItem'] != 'frontal-nye-pogruzchiki'    ){?>
      <? if($field_value && $i<3){?>
      <li>
        <div>
          <? echo get_field_object($getField)[sub_fields][$i][label] ?>:
        </div>
        <b>
          <? echo $field_value; ?>
        </b>
      </li>
      <?}?>
      <?} ?>

      <? if($args['typeItem'] == 'dorozhnye-frezy'){?>
      <? if($field_value && ($i == 2 || $i == 7 || $i == 8)){?>
      <li>
        <div>
          <? echo get_field_object($getField)[sub_fields][$i][label] ?>:
        </div>
        <b>
          <? echo $field_value; ?>
        </b>
      </li>
      <?}?>

      <?} ?>

      <? if($args['typeItem'] == 'asfaltovye-katki' || $args['typeItem']  == 'trotuarnye-katki'){?>
      <? if($field_value && ( $i == 1 || $i == 7|| $i == 8)){?>
      <li>
        <div>
          <? echo get_field_object($getField)[sub_fields][$i][label] ?>:
        </div>
        <b>
          <? echo $field_value; ?>
        </b>
      </li>
      <?}?>
      <?} ?>

      <? if($args['typeItem'] == 'frontal-nye-pogruzchiki'){?>
      <? if($field_value && ( $i == 1 || $i == 3 || $i == 4)){?>
      <li>
        <div>
          <? echo get_field_object($getField)[sub_fields][$i][label] ?>:
        </div>
        <b>
          <? echo $field_value; ?>
        </b>
      </li>
      <?}?>
      <?} ?>


      <?
$i++;
  }
    ?>
    </ul>
  </div>
  <div class="btn-product-container">
    <div><a class="btn btn--red element-btn " data-element="3" href="#">Забронировать</a></div>
    <!-- <div class="product-item-price">150 млн. руб.</div> -->
  </div>
</div>