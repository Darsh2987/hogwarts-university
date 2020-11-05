<?php get_header(); ?>

<?php 
  while(have_posts()) {
    the_post(); ?>
    <section class="page-banner">
    <div class="page-banner--background-image" style="background-image: url(<?php $backgroundBanner = get_field("background_banner"); echo  $backgroundBanner["sizes"]["pageBanner"] ?>)"></div>
      <div class="page-banner--content page-banner--content-template section-width">
        <h1 class="title"><?php the_title(); ?></h1>
        <h2 class="headline"><?php the_field("sub_title"); ?></h2>
      </div>
    </section>

    <div class="metabox section-width">
      <?php $subjectsPage = get_page_by_title("Subjects");?>
      <a class="metabox-item metabox-link--home metabox-link--home-single" href="<?php echo get_permalink($subjectsPage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> Subjects Home</a>
    </div>  

    <section class="single-post-content-container section-width">
      <article class="single-post-content">
        <?php the_content(); ?>
      </article>

      <hr class="section-break">
    </section>

  <?php }
?>
  
<?php get_footer(); ?>