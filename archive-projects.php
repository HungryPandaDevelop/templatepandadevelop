<? get_header(); ?>

<?
$items = new WP_Query(array(
	'posts_per_page'  =>  3, // вывести все
	'post_type' =>  'projects ',
  'order' => 'ASC', // порядок сортировки
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
  <div class="main-full">
    <h1>
      Реализованные проекты
    </h1>
  </div>
  <?
    while($items->have_posts()){
      $items->the_post();?>
  <div class="project-item">
    <div class="main-grid">
      <div class="col-6 col-xs-12">
        <div class="project-item-img">
          <?
      $thumbnail_url = get_the_post_thumbnail_url($args['id'], 'full'); // Замените 'thumbnail' на нужный размер
      ?>
          <div class="img-cover"> <img src="<? echo $thumbnail_url; ?>" alt="">
          </div>
        </div>
      </div>
      <div class="col-6 col-xs-12">
        <div class="project-item-info">
          <div>
            <div class="project-item-type">
              <? echo get_field('spiskovyj_tip_ustanovki'); ?>
            </div>
            <h3>
              <?  echo get_the_title();?>
            </h3>
          </div>
          <div class="btn-container"><a class="more-btn--black" href="<?echo get_the_permalink();?>">
              <i></i><span>Подробнее</span></a></div>
        </div>
      </div>
    </div>
  </div>



  <?}?>

  <div class="main-full ">
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
<div class="stub"></div>
<? get_footer(); ?>