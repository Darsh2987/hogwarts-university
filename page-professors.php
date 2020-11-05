<?php /* Template Name: Professors */?>

<?php get_header(); ?>
<?php get_template_part("template-parts/page-banner")?>

<div class="metabox section-width">
  <?php $homePage = get_page_by_title("Home Page");?>
  <a class="metabox-item metabox-link--home metabox-link--home-single" href="<?php echo get_permalink($homePage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
</div> 


<section class="professors section-width">
  <?php 

  $allProfessors = new WP_Query(array(
    "post_type" => "professor",
    "posts_per_page" => -1,
    "orderby" => "name",
    "order" => "ASC",
  ));
    while($allProfessors->have_posts()) {
      $allProfessors->the_post(); ?>

      <div class="professor-post-item">
        <a class="professor-card" href="<?php the_permalink(); ?>">
          <img class="professor-card--image" src="<?php the_post_thumbnail_url("professorLandscape"); ?>" alt="<?php the_title(); ?>">
          <span class="professor-card--name"><?php the_title(); ?></span>
        </a>
      </div>

  <?php }
  ?>
</section>
  
<?php get_footer(); ?>