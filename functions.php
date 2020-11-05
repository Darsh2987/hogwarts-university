<?php

// Enqueuing style, font-awesome and js files
function hogwarts_files() {
  wp_enqueue_style("google-fonts", "https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@100;300;400;500&display=swap", false);
  wp_enqueue_style("font-awesome", "https://use.fontawesome.com/releases/v5.15.1/css/all.css");
  wp_enqueue_style("main-styles", get_theme_file_uri("/dist/bundled-styles.css"));
  wp_enqueue_script("main-js", get_theme_file_uri("/dist/bundled-script.js"), NULL, "1.0", true);
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

?>