<section id="comments" class="comments-area">
  <div class="main-full">
    <h2>Отзывы</h2>
  </div>
  <div class="main-grid">
    <? if ( have_comments() ) { ?>


    <div class="reviews-list">
      <? wp_list_comments( [
          'type' => 'comment', //Don't output pingbacks & trackbacks
          'callback' => 'rjs_comments_walker',
          'reverse_top_level' => true
        ]); ?>

      <div class="navigation">
        <div class="alignleft"><?php previous_comments_link(); ?></div>
        <div class="alignright"><?php next_comments_link(); ?></div>
      </div>
    </div><!-- .comment-list -->


    <? } // Check for have_comments(). ?>


    <div class="reviews-form" style="position: relative;">
      <?
      $comments_args = array(
        // изменим название кнопки
        'label_submit' => 'Отправить',
        // заголовок секции ответа
        'title_reply'=>'Оставьте ваш отзыв',
        // удалим текст, который будет показано после того как коммент отправлен
        'comment_notes_after' => '',
        // переопределим textarea (тело формы)
        'fields'               => [
          'author' => ' <input id="author" class="input-decorate" placeholder="Имя*" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' />',
          'email' => ' <input id="email" class="input-decorate" placeholder="Email*" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . $html_req . ' />'
        ],
        'comment_field' => '<textarea placeholder="Ваш отзыв" id="comment" name="comment" class="input-decorate"></textarea>',
        'class_submit'         => 'submit btn btn--black',
        
    );
    
    comment_form( $comments_args );
      
      ?>
    </div>
  </div>

</section><!-- .comments-area -->