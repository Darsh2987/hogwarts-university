<?php /* Template Name: Subjects */?>

<?php get_header(); ?>

<section class="page-banner">
  <?php $backgroundBanner = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full"); ?>
  <div class="page-banner--background-image" style="background-image: url('<?php echo $backgroundBanner["0"] ?>"></div>
  <div class="page-banner--content page-banner--content-template section-width">
    <h1 class="title"><?php the_title(); ?></h1>
    <h2 class="headline"><?php the_field("sub_title"); ?></h2>
  </div>
</section>

<div class="metabox section-width">
  <?php $homePage = get_page_by_title("Home Page");?>
  <a class="metabox-item metabox-link--home metabox-link--home-single" href="<?php echo get_permalink($homePage->ID); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
</div> 


<section class="subjects section-width">

  <div class="subjects--year first-year-subjects">
    <?php
      $firstYearSubjects = new WP_Query(array(
        "post_type" => "program",
        "category_name" => "First Year Subjects",
        "posts_per_page" => -1,
        "orderby" => "name",
        "order" => "ASC"
      ));
    ?>

    
    <h1>First Year Subjects</h1>
    <?php 
      while($firstYearSubjects->have_posts()) {
        $firstYearSubjects->the_post(); ?>
        <div class="post-item post-item--subjects">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </div>
    <?php }
    ?>
  </div>

  <div class="subjects--year third-year-subjects">
    <?php
      $thirdYearSubjects = new WP_Query(array(
        "post_type" => "program",
        "category_name" => "Third Year Subjects",
        "posts_per_page" => -1,
        "orderby" => "name",
        "order" => "ASC"
      ));
    ?>

    
    <h1>Third Year Subjects</h1>
    <?php 
      while($thirdYearSubjects->have_posts()) {
        $thirdYearSubjects->the_post(); ?>
        <div class="post-item post-item--subjects">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </div>
    <?php }
    ?>
  </div>

  <div class="subjects--year sixth-seventh-year-subjects">
    <?php
      $sixthSeventhYearSubjects = new WP_Query(array(
        "post_type" => "program",
        "category_name" => "Sixth and Seventh Year Subjects",
        "posts_per_page" => -1,
        "orderby" => "name",
        "order" => "ASC"
      ));
    ?>

    
    <h1>Sixth & Seventh Year Subjects</h1>
    <?php 
      while($sixthSeventhYearSubjects->have_posts()) {
        $sixthSeventhYearSubjects->the_post(); ?>
        <div class="post-item post-item--subjects">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </div>
    <?php }
    ?>
  </div>
</section>
  
<?php get_footer(); ?>