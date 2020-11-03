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
  register_nav_menu("headerMenuLocation", "Header Menu Location");
}

add_action("after_setup_theme", "hogwarts_features");

?>