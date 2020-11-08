<?php get_header(); ?>

<section class="page-banner">
<div class="page-banner--background-image" style="background-image: url(<?php echo get_theme_file_uri("assets/images/hogwarts-banner.png"); ?>)"></div>
  <div class="page-banner--content">
    <h1 class="headline">404 Error!</h1>
  </div>
</section>

<section class="section-width error-page">
  <p>Oops, Sorry! Looks like there's been an error. That page or post either could not be found or does not exist. <br><br>Please try search or head back <a href="<?php echo site_url("/home")?>">Home</a>. </p>
</section>



  
<?php get_footer(); ?>
