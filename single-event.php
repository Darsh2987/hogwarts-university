<?php get_header(); ?>

<?php 
  while(have_posts()) {
    the_post(); 
    get_template_part("template-parts/single-banner")?>

    <div class="metabox section-width">
    <?php $homePage = get_page_by_title("Home Page");?>
      <a class="metabox-item metabox-link--home" href="<?php echo get_permalink($homePage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
      <?php $eventsPage = get_page_by_title("Events");?>
      <a class="metabox-item metabox-link--parent remove-border-radius" href="<?php echo get_permalink($eventsPage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Events</a>
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

    <section class="related-professors section-width">
      <div class="professors">
        <?php 
          $relatedProfessors = new WP_Query(array(
            "posts_per_page" => -1,
            "post_type" => "professor",
            "orderby" => "title",
            "order" => "ASC",
            "meta_query" => array(
              array(
                "key" => "related_events",
                "compare" => "LIKE",
                "value" => '"' . get_the_ID() . '"',
              )
            )
          ));
          if ($relatedProfessors->have_posts()) { ?>
            <h2>Related Professors</h2>
            <div class="related-professors--item-wrapper">
              <?php while($relatedProfessors->have_posts()) {
                $relatedProfessors->the_post(); ?>
                <div class="professor-post-item">
                  <a class="professor-card" href="<?php the_permalink(); ?>">
                    <img class="professor-card--image" src="<?php the_post_thumbnail_url("professorLandscape"); ?>" alt="<?php the_title(); ?>">
                    <span class="professor-card--name"><?php the_title(); ?></span>
                  </a>
                </div>
              <?php } ?>
            </div>
          <?php }
        ?>
      </div>
    </section>

    <?php wp_reset_postdata(); ?>

    <section class="related-subjects section-width">
      <?php
        $relatedSubjects = get_field("related_subjects");
        if ($relatedSubjects) { ?>
        <hr class="section-break">
          <h2>Related Subject</h2>
          <?php foreach($relatedSubjects as $subject) { ?>
            <div class="post-item post-item--subjects">
              <h3><a href="<?php echo get_the_permalink($subject); ?>"><?php echo get_the_title($subject); ?></a></h3>
            </div>
          <?php }
        }
      ?>
    </section>

    
  <?php }
?>
  
<?php get_footer(); ?>