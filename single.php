<?php get_header(); ?>

<?php 
  while(have_posts()) {
    the_post(); ?>

    <section class="page-banner">
    <div class="page-banner--background-image" style="background-image: url(<?php $backgroundBanner = get_field("background_banner"); echo  $backgroundBanner["sizes"]["pageBanner"] ?>)"></div>
      <div class="page-banner--content page-banner--content-template section-width">
        <h1 class="title"><?php the_title(); ?></h1>
        <h2 class="headline">Posted By <?php the_author_posts_link(); ?></h2>
      </div>
    </section>

    <div class="metabox section-width">
      <?php $blogPage = get_page_by_title("Blog");?>
      <a class="metabox-item metabox-link--home" href="<?php echo get_permalink($blogPage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home</a>
      <div class="metabox-item metabox-item--date">
        <p><?php the_date("d M Y")?></p>
      </div>
    </div>  

    <?php get_template_part("template-parts/single-post-content"); ?>

  <?php }
?>
  
<?php get_footer(); ?>
