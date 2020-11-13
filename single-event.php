<?php get_header(); ?>

<?php 
  while(have_posts()) {
    the_post(); ?>
    <section class="page-banner">
      <div class="page-banner--background-image" style="background-image: url(<?php $backgroundBanner = get_field("background_banner"); echo  $backgroundBanner["sizes"]["pageBanner"] ?>)"></div>
      <div class="page-banner--content page-banner--content-template section-width">
        <h1 class="title"><?php the_title(); ?></h1>
        <h2 class="headline"><?php the_field("sub_title"); ?></h2>
        <h3>
          <?php 
            $eventDate = new DateTime(get_field("event_date")); 
            echo $eventDate->format("d M Y")
          ?>
        </h3>
      </div>
    </section>

    <div class="metabox section-width">
    <?php $homePage = get_page_by_title("Home Page");?>
      <a class="metabox-item metabox-link--home" href="<?php echo get_permalink($homePage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
      <?php $eventsPage = get_page_by_title("Events");?>
      <a class="metabox-item metabox-link--parent" href="<?php echo get_permalink($eventsPage->ID); ?>"><i class="far fa-arrow-alt-circle-left" aria-hidden="true"></i> All Events</a>
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
            <hr class="section-break">
          <?php }
        ?>
      </div>
    </section>

    <?php wp_reset_postdata(); ?>

    <section class="related-subjects section-width">
      <?php
        $relatedSubjects = get_field("related_subjects");
        if ($relatedSubjects) { ?>
          <h2>Related Subject</h2>
          <?php foreach($relatedSubjects as $subject) { ?>
            <div class="post-item post-item--subjects">
              <h3><a href="<?php echo get_the_permalink($subject); ?>"><?php echo get_the_title($subject); ?></a></h3>
            </div>
            <hr class="section-break">
          <?php }
        }
      ?>
    </section>
    <?php 
      comments_template();
    ?>
    
  <?php }
?>
  
<?php get_footer(); ?>