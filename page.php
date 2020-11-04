<?php get_header(); ?>

<section class="page-banner">
  <?php $backgroundBanner = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full"); ?>
  <div class="page-banner--background-image" style="background-image: url('<?php echo $backgroundBanner[0] ?>"></div>
  <div class="page-banner--content page-banner--content-template section-width">
    <h1 class="title"><?php single_post_title(); ?></h1>
    <h2 class="headline"><?php the_field("sub_title"); ?></h2>
  </div>
</section>

<?php 

$all = new WP_Query(array(
  "post_type" => "post",
  "posts_per_page" => "-1"
));
  while($all->have_posts()) {
    $all->the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <p><?php the_content(); ?></p>
<?php }
?>
  
<?php get_footer(); ?>