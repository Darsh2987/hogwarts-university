<?php get_header(); ?>

<?php 
  while(have_posts()) {
    the_post(); 
    get_template_part("template-parts/single-banner")?>

    <div class="metabox section-width">
      <?php $eventsPage = get_page_by_title("Events");?>
      <a class="metabox-item metabox-link--home" href="<?php echo get_permalink($eventsPage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> Events Home</a>
      <div class="metabox-item metabox-item--date">
        <p>
          <?php 
            $eventDate = new DateTime(get_field("event_date")); 
            echo $eventDate->format("d M Y")
          ?>
        </p>
      </div>
    </div>  

    <?php get_template_part("template-parts/single-post-content"); ?>
  <?php }
?>
  
<?php get_footer(); ?>