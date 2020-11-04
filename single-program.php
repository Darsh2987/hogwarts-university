<?php get_header(); ?>

<?php 
  while(have_posts()) {
    the_post(); ?>
    <section class="page-banner">
      <?php $backgroundBanner = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full"); ?>
      <div class="page-banner--background-image" style="background-image: url(<?php echo $backgroundBanner["0"]; ?>)"></div>
      <div class="page-banner--content page-banner--content-template section-width">
        <h1 class="title"><?php the_title(); ?></h1>
        <h2 class="headline"><?php  ?></h2>
      </div>
    </section>

    <div class="metabox section-width">
      <?php $subjectsPage = get_page_by_title("Subjects");?>
      <a class="metabox-item metabox-link--home" href="<?php echo get_permalink($subjectsPage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> Subjects Home</a>
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