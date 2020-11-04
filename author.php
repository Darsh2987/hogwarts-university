<?php get_header(); ?>

<section class="page-banner">
  <?php $backgroundBanner = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full"); ?>
  <div class="page-banner--background-image" style="background-image: url(<?php echo $backgroundBanner["0"]; ?>)"></div>
  <div class="page-banner--content page-banner--content-template section-width">
    <h1 class="title">All Posts by <?php the_author(); ?></h1>
    <h2 class="headline"><?php the_field("event_sub_title"); ?></h2>
  </div>
</section>

<div class="metabox section-width">
  <?php $blogPage = get_page_by_title("Blog");?>
  <a class="metabox-item metabox-link--home metabox-link--home-single" href="<?php echo get_permalink($blogPage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home</a>
</div>  

<section class="section-width">
  <?php 

  $authorPosts = new WP_Query(array(
    "post_type" => "post",
    'author' => $author->ID,
    "posts_per_page" => "-1"
  ));
    while($authorPosts->have_posts()) {
      $authorPosts->the_post(); ?>

      <div class="post-item">
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <div class="post-item--excerpt">
          <p><?php the_excerpt(); ?></p>
        </div>
        <button><a class="post-item--button" href="<?php the_permalink(); ?>">Continue Reading</a></button>
        <hr class="section-break">
      </div>

  <?php }
  ?>
</section>
  
<?php get_footer(); ?>