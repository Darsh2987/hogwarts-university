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