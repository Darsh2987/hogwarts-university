<?php /* Template Name: Past Events */?>

<?php get_header(); ?>

<?php $backgroundBanner = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full"); ?>
<section class="page-banner">
  <div class="page-banner--background-image" style="background-image: url(<?php echo $backgroundBanner["0"]; ?>)"></div>
  <div class="page-banner--content page-banner--content-template">
    <h1 class="title">All <?php the_title(); ?></h1>
    <h2 class="headline"><?php the_content(); ?></h2>
  </div>
</section>

<section class="all-events-summary">
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
      $pastEvents->the_post(); ?>
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

</section>