<?php get_header(); ?>

<?php $backgroundBanner = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full"); ?>
<section class="page-banner">
  <div class="page-banner--background-image" style="background-image: url(<?php echo $backgroundBanner["0"]; ?>)"></div>
  <div class="page-banner--content">
    <h1 class="headline"><?php echo get_field("main_headline"); ?></h1>
    <h2 class="headline"><?php echo get_field("sub_headline"); ?></h2>
    <h3 class="headline"><?php echo get_field("sub_headline_two"); ?></h3>
    <?php $linkButton = (get_field("link_button")); ?> 
      <a class="btn" href="<?php echo $linkButton["url"]?>"><?php echo $linkButton["title"]?></a>
  </div>
</section>
  
<?php get_footer(); ?>