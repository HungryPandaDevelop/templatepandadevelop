<?php    function filter_item_range($title, $name, $min, $max){    
    
  $from = isset($_GET[$name.'_from']) ? $_GET[$name.'_from'] : $min;
  $to = isset($_GET[$name.'_to']) ? $_GET[$name.'_to'] : $max;
    
  ?>
<div class="filter-product-item">
  <h3><?php echo $title;?>:</h3>

  <div class="range-slider-box">
    <div class="hidden-input-irs">
      <input type="text" name="<?php echo $name;?>_from" value="<?php echo $_GET[$name.'_from']; ?>" class="from">
      <input type="text" name="<?php echo $name;?>_to" value="<?php echo $_GET[$name.'_to']; ?>" class="to">
    </div>
    <div class="range-slider" data-type="double" data-min="<?php echo $min; ?>" data-max="<?php echo $max; ?>"
      data-from="<?php echo $from; ?>" data-to="<?php echo $to; ?>"></div>
  </div>

</div>
<?php    };    ?>

<?php function filter_item_options($title, $name, $values){?>

<div class="filter-product-item">
  <h3><?php echo $title;?>:</h3>
  <?php

    foreach ($values as $value) {
    ?>
  <div class="checkbox">
    <label><?php echo $value; ?>
      <input type="radio" value="<?php echo $value; ?>" name=<?php echo $name; ?>
        <?php echo isset($_GET[$name]) && $_GET[$name] === (string) $value ? 'checked' : ''; ?>><span></span>
    </label>
  </div>
  <?php
    }
    ?>
</div>

<?php } ?>

<form action="">




  <?php
  if( $args['typeItem']=='asfaltobetonnye-zavody'){?>

  <?php 
  filter_item_range('Производительность (т/ч)', 'asfaltobetonnye-zavody_proizvod', 30, 360);
  ?>

  <?php 
  filter_item_options('Масса замеса смесителя', 'asfaltobetonnye-zavody_massa_smesitelya', array(1250, 1650, 2300, 3500,  4000 ));
  ?>

  <?php }?>

  <?php
  if( $args['typeItem']=='betonosmesitel-nye-ustanovki'){?>

  <?php 
  filter_item_range('Производительность м<sup>3</sup>/ч', 'betonosmesitel-nye-ustanovki_proizvod', 1, 300);
  ?>

  <?php 
  filter_item_options('Объём смесителя м<sup>3</sup>', 'betonosmesitel-nye-ustanovki_massa_smesitelya', array(1000, 1500, 2000, 3000, 4000));
  ?>

  <?php }?>



  <?php
  if( $args['typeItem']=='dorozhno-stroitel-naya-tehnika'){?>

  <?php 
    filter_item_range('Рабочий вес', 'dorozhno-stroitel-naya-tehnika_ves', 1, 3000);
    ?>
  <?php 
    filter_item_range('Рабочая ширина', 'dorozhno-stroitel-naya-tehnika_shirina', 600, 1400);
    ?>

  <?php 
  // filter_item_options('Исполнение', 'dorozhno-stroitel-naya-tehnika_ispolnenie', array('двухвальцовый', 'комбинированный'));
  ?>

  <?php }?>

  <?php
  if( $args['typeItem']=='frontal-nye-pogruzchiki'){?>

  <?php 
  filter_item_options('Грузоподъемность', 'frontal-nye-pogruzchiki-gruz', array(900, 1200, 6000));
  ?>
  <?php 
  filter_item_options('Высота выгрузки', 'frontal-nye-pogruzchiki-visota', array(3080, 3280, 6100));
  ?>

  <?php }?>


  <?php    $current_url = strtok($_SERVER["REQUEST_URI"], '?');    ?>
  <div class="btn-container">
    <input type="submit" class="btn btn--red" value="Показать" />
    <a href="<?echo $current_url;?>" class="btn btn--black-border">Сбросить</a>
  </div>



</form>