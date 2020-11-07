<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
  <meta charset="<?php bloginfo("charset"); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body>
  <header class="header">
    <h1 class="hogwarts-logo-text">
      <a href="<?php echo site_url() ?>"><strong>Hogwarts</strong> University</a>
    </h1>
    <nav>
      <?php wp_nav_menu(array(
        "theme_location" => "headerMenuLocation"
      )); ?>
      <div class="search-icon js-search-trigger site-header__search-trigger"><i class="fas fa-search"></i></div>
    </nav>
    <div class="header--mobile-icons">
      <div class="hamburger-icon"><i class="fas fa-bars"></i></div>
      <div class="search-icon js-search-trigger site-header__search-trigger"><i class="fas fa-search"></i></div>
    </div>
    
  </header>
