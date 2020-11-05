<?php /* Template Name: Programs */?>

<?php get_header(); ?>
<?php get_template_part("template-parts/page-banner")?>

<div class="metabox section-width">
  <?php $homePage = get_page_by_title("Home Page");?>
  <a class="metabox-item metabox-link--home metabox-link--home-single" href="<?php echo get_permalink($homePage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
</div> 


<section class="section-width">
  <?php 

  $allPrograms = new WP_Query(array(
    "post_type" => "program",
    "posts_per_page" => -1
  ));
    while($allPrograms->have_posts()) {
      $allPrograms->the_post(); ?>

      <div class="post-item">
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
      </div>

  <?php }
  ?>
</section>
  
<?php get_footer(); ?>