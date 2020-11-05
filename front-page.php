<?php get_header(); ?>

<?php $backgroundBanner = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full"); ?>
<section class="page-banner">
<div class="page-banner--background-image" style="background-image: url(<?php $backgroundBanner = get_field("background_banner"); echo  $backgroundBanner["url"] ?>)"></div>
  <div class="page-banner--content">
    <h1 class="headline"><?php echo get_field("main_headline"); ?></h1>
    <h2 class="headline"><?php echo get_field("sub_headline"); ?></h2>
    <h3 class="headline"><?php echo get_field("sub_headline_two"); ?></h3>
    <?php $linkButton = (get_field("link_button")); ?> 
      <a class="btn" href="<?php echo $linkButton["url"]?>"><?php echo $linkButton["title"]?></a>
  </div>
</section>

<section class="post-summary-container">

  <div class="post-summary-split post-summary-split--one">
    <h2 class="">Upcoming Events</h2>

    <?php
      $today = date("Ymd");
      $homepageEvents = new WP_Query(array(
        "posts_per_page" => 3,
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
    <?php $eventsPage = get_page_by_title("Events");?>
    <button><a href="<?php echo get_permalink($eventsPage->ID); ?>">View All Events</a></button>
  </div>


  <div class="post-summary-split post-summary-split--two">
    <h2 class="">From Our Blog</h2>

    <?php 
      $homepageBlogPosts = new WP_Query(array(
        "posts_per_page" => 3
      ));

      while($homepageBlogPosts->have_posts()) {
        $homepageBlogPosts->the_post(); ?>
          <div class="post-summary">
            <a class="post-summary--date" href="<?php the_permalink(); ?>">
              <span class="post-summary--month">
                <?php the_time("M")?>
              </span>
              <span class="post-summary--day">
                <?php the_time("d")?>
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
                <a class="read-learn-more" href="<?php the_permalink(); ?>">Read More</a>
              </p>
            </div>
          </div>
      <?php }
    ?>
    <?php $blogPage = get_page_by_title("Blog");?>
    <button><a href="<?php echo get_permalink($blogPage->ID); ?>">View All Blog Posts</a></button>
  </div>
</section>


  
<?php get_footer(); ?>