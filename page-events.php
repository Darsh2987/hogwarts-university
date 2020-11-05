<?php /* Template Name: Events */?>

<?php get_header(); ?>
<section class="page-banner">
<div class="page-banner--background-image" style="background-image: url(<?php $backgroundBanner = get_field("background_banner"); echo  $backgroundBanner["sizes"]["pageBanner"] ?>)"></div>
  <div class="page-banner--content page-banner--content-template section-width">
    <h1 class="title">All <?php the_title(); ?></h1>
    <h2 class="headline"><?php the_field("sub_title"); ?></h2>
  </div>
</section>

<div class="metabox section-width">
  <?php $homePage = get_page_by_title("Home Page");?>
  <a class="metabox-item metabox-link--home" href="<?php echo get_permalink($homePage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
  <?php $pastEventsPage = get_page_by_title("Past Events");?>
  <a class="metabox-item metabox-link--events" href="<?php echo get_permalink($pastEventsPage->ID); ?>"><i class="fa fa-history" aria-hidden="true"></i> Past Events</a>
</div>  

<section class="all-events-summary section-width">
  <?php
    $today = date("Ymd");
    $homepageEvents = new WP_Query(array(
      "post_type" => "event",
      "meta_key" => "event_date",
      "orderby" => "meta_value_num",
      "order" => "ASC",
      "meta_query" => array(
        array(
          "key" => "event_date",
          "compare" => ">=",
          "value" => $today,
          "type" => "numeric"
        )
      )
    ));

    while($homepageEvents->have_posts()) {
      $homepageEvents->the_post();
         get_template_part("template-parts/event", "summary");
    }
  ?>

  <?php
    echo paginate_links();
  ?>

<hr class="section-break">

<?php $pastEventsPage = get_page_by_title("Past Events");?>
<p>Looking for a recap of past events? <a href="<?php echo get_permalink($pastEventsPage->ID); ?>">Check out our past events archive</a></p>


</section>

  
<?php get_footer(); ?>