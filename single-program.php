<?php get_header(); ?>

<?php 
  while(have_posts()) {
    the_post(); ?>
    <?php get_template_part("template-parts/single-banner")?>

    <div class="metabox section-width">
    <?php $homePage = get_page_by_title("Home Page");?>
      <a class="metabox-item metabox-link--home" href="<?php echo get_permalink($homePage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
      <?php $subjectsPage = get_page_by_title("Subjects");?>
      <a class="metabox-item metabox-link--parent" href="<?php echo get_permalink($subjectsPage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Subjects</a>
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
                "key" => "related_subjects",
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

    <?php wp_reset_postdata();?> 

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
              "key" => "related_subjects",
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

  <?php }
?>
  
<?php get_footer(); ?>