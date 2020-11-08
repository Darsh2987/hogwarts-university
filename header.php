<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
  <meta charset="<?php bloginfo("charset"); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body>
  <header class="header">
    <h1 id="hogwarts-logo" class="hogwarts-logo-text">
      <a href="<?php echo site_url() ?>"><strong>Hogwarts</strong> University</a>
    </h1>
    <nav id="nav" class="nav">
      <?php wp_nav_menu(array(
        "theme_location" => "headerMenuLocation"
      )); ?>
      <div class="mobile-nav--close"><i id="mobile-menu--close" class="fa fa-window-close" aria-hidden="true"></i></div>
      <div class="search-icon js-search-trigger site-header__search-trigger"><i class="fas fa-search" aria-hidden="true"></i></div>
    </nav>
    <div class="header--mobile-icons">
      <div class="hamburger-icon"><i id="hamburger-icon" class="fas fa-bars" aria-hidden="true"></i></div>
      <div class="search-icon js-search-trigger site-header__search-trigger"><i class="fas fa-search" aria-hidden="true"></i></div>
    </div>
    
  </header>
