<?php
/**
* Template Name: 16-19 Course Page
*
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

<div class="full-width-container secondary-page">

	<div class="fixed-container">

<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner-has-parent' );?>

<aside>
<!-- Secondary Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', '16-19' );?>
</aside>

<section>

<?php 
//the_content();

$courseID = filter_var($_GET['course'], FILTER_SANITIZE_STRING);

$sql = "SELECT programmearea AS name
         	FROM fact_sheets
         WHERE id = '".$courseID."'";

$courses = $wpdb->get_results($sql);

?>
<h1><?=$courses[0]->name?></h1>
<?php 
//the_content();

$courseID = filter_var($_GET['course'], FILTER_SANITIZE_STRING);

$sql = "SELECT id, factsheetname AS factsheetname, courseabout, level
          FROM fact_sheets
         WHERE programmearea = '".$courses[0]->name."'";

$courses = $wpdb->get_results($sql);

foreach($courses AS $course) {
	?>
	<article class="course-listing">
	<h2><?=$course->name?></h2>
	<div class="course-level"><?=$course->level?></div>
	<p><?=$course->courseabout?></p>
	<!--Include ID of 16-19 course factsheet page -->
	<div class="button-default"><a href="/?page_id=460&factsheet=<?=$course->id?>">Course information</a></div>
  <div class="button-default"><a href="/apply/?courseid=<?=$course->id?>">Apply</a></div>
	<?php
}
?>
 </article>

	
	</section>
		


	</div>

</div>



</main><!-- #main -->
<?php get_footer(); ?>