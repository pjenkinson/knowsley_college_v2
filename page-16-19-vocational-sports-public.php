<?php
/**
* Template Name: Sports & Public Services 16-19
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
<?php get_template_part( 'navigation', '16-19-subject' );?>
</aside>

<section>

<?php

// check if the repeater field has rows of data
if( have_rows('subject_info') ):

 	// loop through the rows of data
    while ( have_rows('subject_info') ) : the_row();
?>	

<div class="subject-intro the-content">
	<div class="subject-description"><p><?php the_sub_field('subject_description');?></p></div>
	<div class="subject-download">
		<a href="<?php the_sub_field('prospectus_download');?>" title="<?php the_sub_field('subject_title');?>"><img src="<?php the_sub_field('subject_image');?>" alt="<?php the_sub_field('subject_title');?>"></a>

	</div>
	<div class="subject-buttons">
	<div class="button-default"><a href="#courses" title="View courses">View courses</a></div>
	<div class="button-default"><a href="<?php the_sub_field('prospectus_download');?>" title="<?php the_sub_field('subject_title');?>">Download subject information <i class="fa fa-arrow-circle-o-down"></i></a></div>
	</div>
</div>

</article>

<?php
    endwhile;

else :

    echo 'No Subject Info found';

endif;

?>

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

$sql = 			"SELECT DISTINCT id,
               programmearea,
               factsheetname, 
               courseabout,
               entryrequirements,
               level
          FROM fact_sheets
          WHERE programmearea = 'Sport and Public Services'
          AND level <> 'level 4'";

$sportPublicServices = $wpdb->get_results($sql);   

foreach($sportPublicServices AS $spcourse) {
	?>
	<article class="course-listing the-content">
	<h2><?=$spcourse->factsheetname?></h2>
	<div class="course-level"><?=$spcourse->level?></div>
	<p><?=$spcourse->courseabout?></p>
	<!--Include ID of 16-19 course factsheet page -->
	<div class="button-default"><a href="/?page_id=1789&factsheet=<?=$spcourse->id?>">Course information</a></div>
  <div class="button-default"><a href="/apply/?courseid=<?=$spcourse->id?>">Apply</a></div>
  </article>
	<?php
}


$sql = 			"SELECT DISTINCT id,
               programmearea,
               factsheetname, 
               courseabout,
               entryrequirements,
               level
          FROM fact_sheets 
          INNER JOIN Offering
         	   On Offering.CourseInformationID=fact_sheets.id
         WHERE programmearea = (SELECT programmearea 
								FROM fact_sheets 
								WHERE id = '".$id."')
				AND fact_sheets.id = Offering.CourseInformationID	
				AND level <> 'level 4'
				ORDER BY level ASC";

$courses = $wpdb->get_results($sql);
       
?>

<div id="courses">

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
</div>
	
	</section>

		


	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>