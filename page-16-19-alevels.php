<?php
/**
* Template Name: Vocational A Levels
* 16-19 / Vocational 
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

<!-- Start of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>


<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner-has-parent' );?>


<aside>
<!-- Secondary Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', '16-19' );?>
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
// Put courses not to be displayed here
$ignoreCourse = array();

$url = $_SERVER['REQUEST_URI'];
$urlSections = explode('/', $url);
$finalBreakdown = explode('-', $urlSections[2]);
$finalCount = count($finalBreakdown) - 1;
$id = $finalBreakdown[$finalCount];

$sql = "SELECT id,
               programmearea,
               factsheetname, 
               courseabout,
               entryrequirements
          FROM fact_sheets 
         WHERE programmearea = (SELECT programmearea 
        												  FROM fact_sheets 
        												 WHERE id = '".$id."') ";

if(!empty($ignoreCourse)) {
    $sql .= " AND id NOT IN (".implode(',', $ignoreCourse).") ";
}

$sql .= " ORDER BY factsheetname ASC";

$courses = $wpdb->get_results($sql);

?>
<h1><?=$courses[0]->programmearea?></h1>
<?php

foreach($courses AS $course) {
		?>
		<div class="course-info">
		<div>
			  <h2><?=$course->factsheetname?></h2>
			  <p><?=$course->courseabout?></p>
			  <div class="apply">
			  <a href="/apply/?courseid=<?=$course->id?>">Apply</a>
			  </div>
		</div>
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