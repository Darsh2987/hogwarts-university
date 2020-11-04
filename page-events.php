<?php /* Template Name: Events */?>

<?php get_header(); ?>

<?php $backgroundBanner = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full"); ?>
<section class="page-banner">
  <div class="page-banner--background-image" style="background-image: url(<?php echo $backgroundBanner["0"]; ?>)"></div>
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
      $homepageEvents->the_post(); ?>
        <div class="post-summary">
          <a class="post-summary--date" href="<?php the_permalink(); ?>">
            <span class="post-summary--month">
              <?php 
                $eventDate = new DateTime(get_field("event_date")); 
                echo $eventDate->format("M")
              ?>
            </span>
            <span class="post-summary--day">
              <?php 
                $eventDate = new DateTime(get_field("event_date")); 
                echo $eventDate->format("d")
              ?>
            </span>
          </a>
          <div class="post-summary--content">
            <h5 class="post-summary--title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            <p class="post-summary--excerpt">
              <?php 
                if(has_excerpt()) {
                  echo get_the_excerpt();
                } else {
                  echo wp_trim_words(get_the_content(), 15);
                }
              ?>
              <a class="read-learn-more" href="<?php the_permalink(); ?>">Learn More</a>
            </p>
          </div>
        </div>
    <?php }
  ?>

  <?php
    echo paginate_links();
  ?>

<hr class="section-break">

<?php $pastEventsPage = get_page_by_title("Past Events");?>
<p>Looking for a recap of past events? <a href="<?php echo get_permalink($pastEventsPage->ID); ?>">Check out our past events archive</a></p>


</section>

  
<?php get_footer(); ?>