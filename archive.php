<?php get_header(); ?>

<section class="page-banner">
  <?php 
    if (get_field("background_banner")) { ?>
      <div class="page-banner--background-image" style="background-image: url(<?php $backgroundBanner = get_field("background_banner"); echo  $backgroundBanner["sizes"]["pageBanner"] ?>)"></div>
    <?php } else { ?>
      <div class="page-banner--background-image" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/hogwarts-banner.png'); ?>)"></div>
    <?php }
  ?>
  <div class="page-banner--content page-banner--content-template section-width">
    <h1 class="title"><?php the_title(); ?></h1>
    <h2 class="headline">Posted By <?php the_author_posts_link(); ?></h2>
    <h3><?php the_date("d M Y")?></h3>
  </div>
</section>

<div class="metabox section-width">
<?php $homePage = get_page_by_title("Home Page");?>
  <a class="metabox-item metabox-link--home" href="<?php echo get_permalink($homePage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
  <?php $blogPage = get_page_by_title("Blog");?>
  <a class="metabox-item metabox-link--parent" href="<?php echo get_permalink($blogPage->ID); ?>"><i class="far fa-arrow-alt-circle-left" aria-hidden="true"></i> Blog Home</a>
</div>   

<section class="section-width">
  <?php 
    while(have_posts()) {
      the_post(); ?>

      <div class="post-item">
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <div class="post-item--excerpt">
          <p><?php the_excerpt(); ?></p>
        </div>
        <button><a class="post-item--button" href="<?php the_permalink(); ?>">Continue Reading</a></button>
        <hr class="section-break">
      </div>

  <?php }
  echo paginate_links();
  ?>
</section>



  
<?php get_footer(); ?>