<?php /* Template Name: Blog*/?>

<?php get_header(); ?>
<?php get_template_part("template-parts/page-banner")?>

<div class="metabox section-width">
  <?php $homePage = get_page_by_title("Home Page");?>
  <a class="metabox-item metabox-link--home metabox-link--home-single" href="<?php echo get_permalink($homePage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
</div> 


<section class="section-width">
  <?php 

  $all = new WP_Query(array(
    "paged" => get_query_var("paged", 1),
    "post_type" => "post",
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
  echo paginate_links(array(
    "total" => $all->max_num_pages
  ));
  ?>
</section>
  
<?php get_footer(); ?>