<?php /* Template Name: Past Events */?>

<?php get_header(); ?>
<?php get_template_part("template-parts/page-banner")?>

<div class="metabox section-width">
<?php $homePage = get_page_by_title("Home Page");?>
  <a class="metabox-item metabox-link--home" href="<?php echo get_permalink($homePage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
  <?php $eventsPage = get_page_by_title("Events");?>
  <a class="metabox-item metabox-link--events" href="<?php echo get_permalink($eventsPage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> Events Home</a>
</div>  

<section class="all-events-summary section-width">
  <?php
    $today = date("Ymd");
    $pastEvents = new WP_Query(array(
      "post_type" => "event",
      "meta_key" => "event_date",
      "orderby" => "meta_value_num",
      "order" => "ASC",
      "meta_query" => array(
        array(
          "key" => "event_date",
          "compare" => "<",
          "value" => $today,
          "type" => "numeric"
        )
      )
    ));

    while($pastEvents->have_posts()) {
      $pastEvents->the_post();
         get_template_part("template-parts/event", "summary");
   }
  ?>

  <?php
    echo paginate_links();
  ?>

<hr class="section-break">

<?php $eventsPage = get_page_by_title("Events");?>
<p><a href="<?php echo get_permalink($eventsPage->ID); ?>">Back to all Upcoming Events</a></p>


</section>