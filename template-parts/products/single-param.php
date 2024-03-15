<h3>Технические характеристики
</h3>
<div class="product-info-item">
  <div class="main-grid">
    <div class="col-12">
      <h2>
        Основные параметры
      </h2>
    </div>
    <?
    $getField = $args['term'];

    if($getField ==='dorozhnye-frezy' || $getField === 'trotuarnye-katki' || $getField ==='asfaltovye-katki' ){
      $getField =  'dorozhno-stroitel-naya-tehnika';
    }
    // if($getField ==='asfaltovye-katki'){
    //   $getField =  'katki';
    // }
    
    $repeater_items = get_field($getField); 
      
    ?>

    <?
    $i = 0;
    foreach ($repeater_items as $field_name => $field_value) {
    // print_r($field_name);
    if($field_name == 'dop_title'){?>
  </div>
</div>
<div class="product-info-item">
  <div class="main-grid">
    <div class="col-12">
      <h2>
        Дополнительные параметры
      </h2>
    </div>
    <?}else{?>
    <? if($field_value){?>
    <div class="col-6">
      <h4>
        <? echo $field_value; ?>
      </h4>
      <span>
        <? echo get_field_object($getField)[sub_fields][$i][label] ?>
      </span>
    </div>
    <?}?>
    <?}?>
    <?

$i++;
  }
    ?>

  </div>
</div>