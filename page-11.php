<?php get_header(); ?>

<div class="stub"></div>
<div class="main-full">
  <div class="breadcrumbs">
    <?php
      bcn_display();
		?>
  </div>
</div>

<div class="content page-contacts">
  <div class="main-full">
    <h1>
      <?php the_title(); ?>
    </h1>
  </div>
  <div class="main-full ">
    <?php the_content(); ?>
  </div>
</div>

<? get_footer(); ?>