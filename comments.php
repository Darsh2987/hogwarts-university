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
    if (is_user_logged_in()) {
      if(comments_open()) {
        if(have_comments()) { ?>
          <h3>Leave a Comment</h3>
        <?php }
        comment_form(array(
          'title_reply'=>''
        ));
      }
    } else { ?>
      <h4>Please <a href="<?php echo wp_login_url(); ?>"><u>log in</u></a> if you wish to comment.</h4>
   <?php }
    
  ?>
  </div>
</section>