<?php
/**
* Template Name: Adults Vocational Courses
* Adults / Vocational 
* @package knowsley_college
*/
get_header(); ?>

<!-- Scroll to top 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'scroll' );?>
	
</header>

<!-- Breadcrumbs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'breadcrumbs' );?>


<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<main id="main" class="site-main" role="main">


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="full-width-container secondary-page courses">

	<div class="fixed-container">

<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- Start of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>


<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner-has-parent' );?>


<aside>
<!-- Secondary Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'adults-subject' );?>
</aside>

<section>

<?php if( get_field('tagline') ): ?>

<!-- Homepage tagline and intro paragraph
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'acf', 'homepage-tagline' );?>

<?php endif; ?>

<?php 
//the_content();
?>

<?php
$url = $_SERVER['REQUEST_URI'];
$urlSections = explode('/', $url);
$finalBreakdown = explode('-', $urlSections[3]);
$finalCount = count($finalBreakdown) - 1;
$id = $finalBreakdown[$finalCount];

      $sql = 	"SELECT DISTINCT id,
               programmearea,
               factsheetname, 
               courseabout,
               entryrequirements,
               level
          FROM fact_sheets 
          INNER JOIN Offering
         	   On Offering.CourseInformationID=fact_sheets.id
         WHERE level != 'Level 1' /* Level 1 Courses not included for Adults */ AND programmearea = (SELECT programmearea 
								FROM fact_sheets 
								WHERE id = '".$id."')
				AND fact_sheets.id = Offering.CourseInformationID	
		ORDER BY level ASC";

$courses = $wpdb->get_results($sql);

?>


<?php

foreach($courses AS $course) {
	?>
	<article class="course-listing the-content">
	<h2><?=$course->factsheetname?></h2>
	<div class="course-level"><?=$course->level?></div>
	<p><?=$course->courseabout?></p>
	<!--Include ID of 16-19 course factsheet page -->
	<div class="button-default"><a href="/?page_id=1789&factsheet=<?=$course->id?>">Course information</a></div>
  <div class="button-default"><a href="/apply/?courseid=<?=$course->id?>">Apply</a></div>
  </article>
	<?php
}
?>


<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>

<!-- End of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	
	</section>

		


	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>