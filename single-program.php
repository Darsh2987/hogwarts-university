<?php get_header(); ?>

<?php 
  while(have_posts()) {
    the_post(); ?>
    <?php get_template_part("template-parts/single-banner")?>

    <div class="metabox section-width">
      <?php $subjectsPage = get_page_by_title("Subjects");?>
      <a class="metabox-item metabox-link--home metabox-link--home-single" href="<?php echo get_permalink($subjectsPage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> Subjects Home</a>
    </div>  

    <?php get_template_part("template-parts/single-post-content"); ?>

  <?php }
?>
  
<?php get_footer(); ?>