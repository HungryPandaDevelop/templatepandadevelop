<? get_header(); ?>

<?
$items = new WP_Query(array(
	'posts_per_page'  =>  6, // вывести все
	'post_type' =>  'novosti ',
	'order' =>  'DESK', // порядок сортировки
  'paged' => get_query_var('paged') ? get_query_var('paged') : 1, // Учтем текущую страницу пагинации
  ));

?>
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
    <div class="col-12">
      <h1>
        Новости
      </h1>
    </div>
    <?
    while($items->have_posts()){
      $items->the_post();?>
    <div class="col-4  col-sm-6 col-xs-12">
      <div class="blog-item">
        <a class="blog-item-img" href="<? echo get_the_permalink(); ?>">
          <?
      $thumbnail_url = get_the_post_thumbnail_url($args['id'], 'full'); // Замените 'thumbnail' на нужный размер
      ?>
          <div class="img-cover"> <img src="<? echo $thumbnail_url; ?>" alt="">
          </div>
        </a>
        <div class="blog-item-info">
          <div class="blog-item-date">
            <? echo get_the_date(); ?>
          </div>
          <h3><a href="<?echo get_the_permalink();?>">
              <?the_title();?>
            </a></h3>
          <div class="blog-item-text">
            <? the_excerpt(); ?>
          </div>
          <div class="btn-container"><a class="btn btn--black-border"
              href="<? echo get_the_permalink(); ?>">Подробнее</a></div>
        </div>
      </div>
    </div>



    <?}?>

  </div>
  <? 
  // wp_reset_query();
  
  ?>

  <div class="pagination">
    <?
          echo paginate_links(array(
            'total' => $items->max_num_pages,
            'current' => max(1, get_query_var('paged')),
        ));
      ?>
  </div>
</div>
<div class="stub"></div>
<? get_footer(); ?>