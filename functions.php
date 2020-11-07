<?php

require get_theme_file_path('/inc/like-route.php');
require get_theme_file_path('/inc/search-route.php');

function university_custom_rest() {
  register_rest_field('post', 'authorName', array(
    'get_callback' => function() {return get_the_author();}
  ));

  register_rest_field('note', 'userNoteCount', array(
    'get_callback' => function() {return count_user_posts(get_current_user_id(), 'note');}
  ));
}

add_action('rest_api_init', 'university_custom_rest');

// Enqueuing style, font-awesome and js files
function hogwarts_files() {
  wp_enqueue_style("google-fonts", "https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@100;300;400;500&display=swap", false);
  wp_enqueue_style("font-awesome", "https://use.fontawesome.com/releases/v5.15.1/css/all.css");
  wp_enqueue_style("main-styles", get_theme_file_uri("/dist/bundled-styles.css"));
  wp_enqueue_script("main-js", get_theme_file_uri("/dist/bundled-script.js"), NULL, "1.0", true);

  wp_localize_script('main-js', 'universityData', array(
    'root_url' => get_site_url(),
    'nonce' => wp_create_nonce('wp_rest')
  ));
}

add_action("wp_enqueue_scripts", "hogwarts_files");

// Theme features/support functions ie: title tag, feature image, nav menus
function hogwarts_features() {
  add_theme_support("title-tag");
  add_theme_support("post-thumbnails");
  add_image_size("professorLandscape", 400, 260, true);
  add_image_size("professorPortrait", 480, 450, true);
  add_image_size("pageBanner", 1500, 350, true);
  register_nav_menu("headerMenuLocation", "Header Menu Location");
  register_nav_menu("footerMenuLocationOne", "Footer Menu Location One");
  register_nav_menu("footerMenuLocationTwo", "Footer Menu Location Two");
}

add_action("after_setup_theme", "hogwarts_features");

//  Manipulate query
function hogwarts_adjust_queries($query) {

  if (!is_admin() AND is_post_type_archive("program") AND $query->is_main_query()) {
    $query->set("orderby", "title");
    $query->set("order", "ASC");
    $query->set("posts_per_page", -1);
  }

  if (!is_admin() AND is_post_type_archive("event") AND $query->is_main_query()) {
    $today = date("Ymd");
    $query->set("meta_key", "event_date");
    $query->set("orderby", "meta_value_num");
    $query->set("order", "ASC");
    $query->set("meta_query", array (
      array( 
        "key" => "event_date",
        "compare" => ">=",
        "value" => $today,
        "type" => "numeric"
      )
    ));
  }
}

add_action("pre_get_posts", "hogwarts_adjust_queries");

function custom_comment() { ?>
<div class="comment-user--block">
  <div class="comment-user--avatar">
    <?php
    global $current_user; 
    if (is_user_logged_in()): get_currentUserInfo();
    echo get_avatar($current_user->ID, 80);
    endif
    ?>
  </div>
  <div class="comment-user--content">
    <div class="comment-user--date"><p><?php echo get_comment_date(); ?></p></div>
    <div class="comment-user--name"><h4>Comment by <?php echo get_comment_author(); ?><h4></div>
    <div class="comment-user--comment-text"><p><?php echo get_comment_text(); ?><p></div>
  </div>
</div>
<hr class="section-break">
<?php }

function custom_comment_form() { ?>
<div class="comments-section--form">
  <h3>
    <?php if(have_comments()) {
      echo "Leave a Comment";
    }
    ?>
  </h3>
  <form action="http://hogwarts-university.local/wp-comments-post.php" method="post" id="commentform" class="comment-form">
  <textarea name="comment" id="comment" require="required"></textarea>
  <button class="form-submit">
    <input name="submit" type="submit" id="submit" class="submit" value="Post Comment">
    <input type="hidden" name="comment_post_ID" value="226" id="comment_post_ID">
    <input type="hidden" name="comment_parent" id="comment_parent" value="0">
  </button>
  </form>
</div>
<?php }

?>