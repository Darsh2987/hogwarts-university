<?php get_header(); ?>

<?php 
  while(have_posts()) {
    the_post(); 
    get_template_part("template-parts/single-banner")?>

    <div class="metabox section-width">
      <?php $professorsPage = get_page_by_title("Professors");?>
      <a class="metabox-item metabox-link--home metabox-link--home-single" href="<?php echo get_permalink($professorsPage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> Professors Home</a>
    </div>  

    <?php get_template_part("template-parts/single-post-content"); ?>

  <?php }
?>
  
<?php get_footer(); ?>