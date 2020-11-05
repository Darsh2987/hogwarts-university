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

    <section class="single-post-content-container section-width">
      <article class="single-post-content">
      <div class="single-post-content--image">
        <?php the_post_thumbnail("professorPortrait"); ?>
      </div>
        <?php the_content(); ?>
      </article>

      <hr class="section-break">
    </section>

  <?php }
?>
  
<?php get_footer(); ?>
