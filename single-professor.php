<?php get_header(); ?>

<?php 
  while(have_posts()) {
    the_post(); 
    get_template_part("template-parts/single-banner")?>

    <div class="metabox section-width">
      <?php $homePage = get_page_by_title("Home Page");?>
      <a class="metabox-item metabox-link--home" href="<?php echo get_permalink($homePage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
      <?php $professorsPage = get_page_by_title("Professors");?>
      <a class="metabox-item metabox-link--parent" href="<?php echo get_permalink($professorsPage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Professors</a>
    </div>  

    <?php get_template_part("template-parts/single-post-content"); ?>

    <section class="related-subjects section-width">
      <?php
        $relatedSubjects = get_field("related_subjects");
        if ($relatedSubjects) { ?>
          <h2>Subjects Taught</h2>
          <?php foreach($relatedSubjects as $subject) { ?>
            <div class="post-item post-item--subjects">
              <h3><a href="<?php echo get_the_permalink($subject); ?>"><?php echo get_the_title($subject); ?></a></h3>
            </div>
          <?php }
        }
      ?>
    </section>

    <section class="related-events section-width">
      <?php
        $today = date("Ymd");
        $homepageEvents = new WP_Query(array(
          "posts_per_page" => -1,
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
            ),
            array(
              "key" => "related_professors",
              "compare" => "LIKE",
              "value" => '"' . get_the_ID() . '"',
            )
          )
        ));
        
        if($homepageEvents->have_posts()) { ?>
          <hr class="section-break">
          <h2>Upcoming Events</h2>
          <?php while($homepageEvents->have_posts()) {
            $homepageEvents->the_post();
              get_template_part("template-parts/event", "summary");
          }
        } else { ?>
          <hr class="section-break">
          <h2>No Upcoming Events</h2>
        <?php }
      ?>
    </section>

    <?php wp_reset_postdata();?> 

  <?php }
?>
  
<?php get_footer(); ?>