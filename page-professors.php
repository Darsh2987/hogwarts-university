<?php /* Template Name: Professors */?>

<?php get_header(); ?>

<?php $backgroundBanner = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full"); ?>
<section class="page-banner">
  <div class="page-banner--background-image" style="background-image: url(<?php echo $backgroundBanner["0"]; ?>)"></div>
  <div class="page-banner--content page-banner--content-template section-width">
    <h1 class="title">All <?php the_title(); ?></h1>
    <h2 class="headline"><?php the_field("sub_title"); ?></h2>
  </div>
</section>
  
<?php get_footer(); ?>