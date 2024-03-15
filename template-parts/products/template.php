<? get_header(); ?>

<div class="stub"></div>

<?
  $current_term = get_queried_object();

  $args = array(
    'posts_per_page' => 9,
    'post_type' => 'production',
    'order' => 'ASC',
    // 'order' => 'DESK',
    'paged' => get_query_var('paged') ? get_query_var('paged') : 1, // Учтем текущую страницу пагинации
  );

  if (is_tax('production_category')) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'production_category',
            'field' => 'slug',
            'terms' => $current_term->slug,
        ),
    );
  }

  function filterGetRange($get, $field, $args){
    $from = isset($_GET[$get.'_from']) ? sanitize_text_field($_GET[$get.'_from']) : '';
    $to = isset($_GET[$get.'_to']) ? sanitize_text_field($_GET[$get.'_to']) : '';
    print_r($from);
    if (!empty($from) && !empty($to)) {

      $param_filter = [
          'key' => $field, // Замените на реальное имя вашего ACF поля
          'value' => array($from, $to),
          'compare' => 'BETWEEN',
          'type' => 'NUMERIC', // Замените на тип данных вашего ACF поля
        ];

      array_push($args['meta_query'], $param_filter );

    }

    return $args;

  }

  function filterGetOptions($value, $field, $args){
    $option = isset($_GET[$value]) ? sanitize_text_field($_GET[$value]) : '';

    if (!empty($option)) {

      $param_filter =  [
            'key' => $field, // Замените на реальное имя вашего ACF поля
            'value' => $option,
            'compare' => 'LIKE',
            'type' => 'CHAR', // Замените на тип данных вашего ACF поля
      ];

      array_push($args['meta_query'], $param_filter );
    }

    return $args;
  }

  $args['meta_query'] = ['relation' => 'AND'];
  
  $args = filterGetRange('asfaltobetonnye-zavody_proizvod', 'tehnicheskie_harakteristiki_osnovnye_parametry_proizvoditelnost', $args);
  $args = filterGetOptions('asfaltobetonnye-zavody_massa_smesitelya', 'tehnicheskie_harakteristiki_osnovnye_parametry_obem_smesitelya', $args);
  
  $args = filterGetRange('betonosmesitel-nye-ustanovki_proizvod', 'betonosmesitel-nye-ustanovki_proizvoditelnost', $args);
  $args = filterGetOptions('betonosmesitel-nye-ustanovki_massa_smesitelya', 'betonosmesitel-nye-ustanovki_objom_smesitelya', $args);
  
  $args = filterGetRange('dorozhno-stroitel-naya-tehnika_ves', 'dorozhno-stroitel-naya-tehnika_rabochij_ves_cece', $args);
  $args = filterGetRange('dorozhno-stroitel-naya-tehnika_shirina', 'dorozhno-stroitel-naya-tehnika_rabochaya_shirina', $args);
  // $args = filterGetOptions('dorozhno-stroitel-naya-tehnika_ispolnenie', 'dorozhno-stroitel-naya-tehnika_objom_smesitelya', $args);
  
  $args = filterGetOptions('frontal-nye-pogruzchiki-gruz', 'frontal-nye-pogruzchiki_nominalnaya_nagruzka', $args);
  $args = filterGetOptions('frontal-nye-pogruzchiki-visota', 'frontal-nye-pogruzchiki_maks_vysota_razgruzki', $args);

  /*?>

<pre>
<?
  print_r($args);
?>
</pre>

<?*/

  $items = new WP_Query($args);
?>
<div class="main-full">
  <div class="breadcrumbs">
    <?
      bcn_display();
		?>
  </div>
</div>

<div class="content">
  <div class="main-full">
    <h1>
      <? 
      if(!is_tax()){?>
      Продукция
      <?}else{?>
      <? echo $current_term->name; ?>

      <?} ?>

    </h1>

  </div>
  <div class="main-grid ">
    <div class="col-xs-12 btn-filter-container">
      <div class="btn btn--black element-btn " data-element="10">
        Категории
      </div>
      <div class=" btn btn--red filter-btn--red element-btn " data-element="11">
        <span>Фильтры</span>
        <i></i>
      </div>
    </div>
    <div class="col-3 col-xs-12">

      <div class="filter-product filter-product-container element-show" data-element="10">
        <div class="close-btn close-btn--popup close-js"></div>
        <? get_template_part('template-parts/products/products-nav',null, array(
    // 'term' =>  'betonosmesitel-nye-ustanovki'
  )); ?>
      </div>
      <div class="filter-product filter-product-container element-show" data-element="11">
        <div class="close-btn close-btn--popup close-js"></div>
        <? 

        get_template_part('template-parts/products/filter',null, array(
    'typeItem'  => $current_term->slug
  )); ?>
      </div>
    </div>

    <div class="col-9 col-xs-12">
      <div class="main-grid">

        <?
    if($items->have_posts()){
    while($items->have_posts()){
      $items->the_post();
      
      $terms_cur = wp_get_post_terms(get_the_ID(), 'production_category');
  
      $term_cur = $terms_cur[0];
      ?>

        <div class="col-4 col-xs-12">

          <? get_template_part('template-parts/module/items/product-item',null, array(
            'id' =>  get_the_ID(),
            // 'typeItem'  => $current_term->slug
            'typeItem'  => $term_cur->slug
          )); ?>


        </div>
        <?}?>
        <?}else{?>
        <?php   /* $current_url = strtok($_SERVER["REQUEST_URI"], '?'); */   ?>
        <div class="col-12 product-empty">
          <h3>По данному запросу ни чего не найдено</h3>
          <div class="btn-container">
            <a href="/production/" class="btn btn--black-border">В каталог</a>
          </div>
        </div>
        <?}?>
      </div>
      <? 

        wp_reset_postdata(); // Сбрасываем данные о посте
      ?>

      <!-- pagination-component start-->
      <div class="pagination">
        <?
          echo paginate_links(array(
            'total' => $items->max_num_pages,
            'current' => max(1, get_query_var('paged')),
        ));
      ?>
      </div>
      <!-- pagination-component start-->
    </div>
  </div>
</div>

<div class="stub-footer"></div>
<? get_footer(); ?>