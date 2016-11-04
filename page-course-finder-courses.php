<?php
/**
* Template Name: Course finder results
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

<div class="full-width-container secondary-page content-page">

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

</aside>

<section>

<?php if( get_field('tagline') ): ?>

<!-- Homepage tagline and intro paragraph
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'acf', 'homepage-tagline' );?>

<?php endif; ?>

<?php 
//the_content();

$courseID = filter_var($_GET['course'], FILTER_SANITIZE_STRING);

$sql = "SELECT programmearea AS name, programmearea
         	FROM fact_sheets
         WHERE id = '".$courseID."'";

$courses = $wpdb->get_results($sql);

?>

<article class="the-content">

<h1><?=$courses[0]->name?></h1>

<?php the_content();?>

<div class="button-default"><a href="<?php the_field('page_link');?>">Back to Course Finder</a></div>

</article>

<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>

<!-- End of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php 
//the_content();

$courseID = filter_var($_GET['course'], FILTER_SANITIZE_STRING);

$sql = "SELECT id, factsheetname AS programmearea, factsheetname, courseabout, level
          FROM fact_sheets
         WHERE programmearea = '".$courses[0]->name."'";

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


<!-- End of course results
–––––––––––––––––––––––––––––––––––––––––––––––––– -->


	
	</section>

		


	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>