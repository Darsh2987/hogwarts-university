<?php get_header(); ?>

<section class="page-banner">
  <?php $backgroundBanner = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full"); ?>
  <div class="page-banner--background-image" style="background-image: url('<?php echo $backgroundBanner[0] ?>"></div>
  <div class="page-banner--content page-banner--content-template section-width">
    <h1 class="title"><?php the_title(); ?></h1>
    <h2 class="headline"><?php the_field("sub_title"); ?></h2>
  </div>
</section>

<div class="metabox section-width">
  <?php $homePage = get_page_by_title("Home Page");?>
  <a class="metabox-item metabox-link--home metabox-link--home-single" href="<?php echo get_permalink($homePage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
</div> 


<section class="section-width">
  <?php 

  $all = new WP_Query(array(
    "post_type" => "post",
    "posts_per_page" => -1
  ));
    while($all->have_posts()) {
      $all->the_post(); ?>

      <div class="post-item">
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <div class="post-item--metabox">
          <p>Posted by <?php the_author_posts_link(); ?> on <?php the_date("d M Y"); ?></p>
        </div>
        <div class="post-item--excerpt">
          <p>
            <?php 
              if(has_excerpt()) {
                echo get_the_excerpt();
              } else {
                echo wp_trim_words(get_the_content(), 15);
              }
            ?>
          </p>
        </div>
        <button><a class="post-item--button" href="<?php the_permalink(); ?>">Continue Reading</a></button>
        <hr class="section-break">
      </div>

  <?php }
  ?>
</section>
  
<?php get_footer(); ?>