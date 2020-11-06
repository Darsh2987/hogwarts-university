<section class="comments-section section-width">
  <h2>
    <?php if(!have_comments()) {
      echo "Be the first to comment";
    } else {
      echo get_comments_number(). " Comment(s)";
    }
    ?>
  </h2>
  <div class="comments-block">
    <?php 
      wp_list_comments("type=comment&callback=custom_comment");
    ?>
  </div>
  <?php
    if(comments_open()) {
      comment_form(custom_comment_form(), array(
        'title_reply'=>''
      ));
    }
  ?>
</section>