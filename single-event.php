<?php get_header(); ?>

<?php 
  while(have_posts()) {
    the_post(); ?>
    <section class="page-banner">
    <div class="page-banner--background-image" style="background-image: url(<?php $backgroundBanner = get_field("background_banner"); echo  $backgroundBanner["url"] ?>)"></div>
      <div class="page-banner--content page-banner--content-template section-width">
        <h1 class="title"><?php the_title(); ?></h1>
        <h2 class="headline"><?php the_field("sub_title"); ?></h2>
      </div>
    </section>

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

    <section class="single-post-content-container section-width">
      <div class="single-post-content--image">
        <?php the_post_thumbnail(); ?>
      </div>
      <?php the_content(); ?>
    </section>
  <?php }
?>
  
<?php get_footer(); ?>