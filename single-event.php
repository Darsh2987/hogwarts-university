<?php get_header(); ?>

<?php 
  while(have_posts()) {
    the_post(); ?>

    <?php $backgroundBanner = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full"); ?>
    <section class="page-banner">
      <div class="page-banner--background-image" style="background-image: url(<?php echo $backgroundBanner["0"]; ?>)"></div>
      <div class="page-banner--content page-banner--content-template section-width">
        <h1 class="title"><?php the_title(); ?></h1>
        <h2 class="headline"><?php the_field("event_sub_title"); ?></h2>
      </div>
    </section>

    <div class="metabox-links section-width">
      <?php $eventsPage = get_page_by_title("Events");?>
      <button><a class="metabox-links--home" href="<?php echo get_permalink($eventsPage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> Events Home</a></button>
    </div>  

    <section class="single-post-content-container section-width">
      <?php $eventImage = get_field("event_image"); ?>
      <img src="<?php echo $eventImage["url"] ?>" alt="">
      <?php the_content(); ?>
    </section>
  <?php }
?>
  
<?php get_footer(); ?>