<?php get_header(); ?>

<section class="page-banner">
<div class="page-banner--background-image" style="background-image: url(<?php $backgroundBanner = get_field("background_banner"); echo  $backgroundBanner["url"] ?>)"></div>
  <div class="page-banner--content page-banner--content-template section-width">
    <h1 class="title">All Posts by <?php the_author(); ?></h1>
    <h2 class="headline"><?php the_field("event_sub_title"); ?></h2>
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

  $authorPosts = new WP_Query(array(
    "paged" => get_query_var("paged", 1),
    "post_type" => "post",
    'author' => $author->ID,
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
  echo paginate_links(array(
    "total" => $authorPosts->max_num_pages
  ));
  ?>
</section>
  
<?php get_footer(); ?>