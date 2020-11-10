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
  <div class="comments-section--form">
  <?php
    if(comments_open()) {
      if(have_comments()) { ?>
        <h3>Leave a Comment</h3>
      <?php }
      comment_form(array(
        'title_reply'=>''
      ));
    }
  ?>
  </div>
</section>