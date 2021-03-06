<?php /* Template Name: Past Events */?>

<?php get_header(); ?>
<?php get_template_part("template-parts/page-banner")?>

<div class="metabox section-width">
<?php $homePage = get_page_by_title("Home Page");?>
  <a class="metabox-item metabox-link--home" href="<?php echo get_permalink($homePage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
  <?php $eventsPage = get_page_by_title("Events");?>
  <a class="metabox-item metabox-link--parent" href="<?php echo get_permalink($eventsPage->ID); ?>"><i class="far fa-arrow-alt-circle-left" aria-hidden="true"></i> Upcoming Events</a>
</div>  

<section class="all-events-summary section-width">
  <?php
    $today = date("Ymd");
    $pastEvents = new WP_Query(array(
      "paged" => get_query_var("paged", 1),
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
    echo paginate_links(array(
      "total" => $pastEvents->max_num_pages
    ));
  ?>

<hr class="section-break">

<?php $eventsPage = get_page_by_title("Events");?>
<p><a href="<?php echo get_permalink($eventsPage->ID); ?>">Back to all Upcoming Events</a></p>


</section>