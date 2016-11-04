<?php
/**
* Template Name: Higher Education Courses
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
<?php get_template_part( 'navigation', 'higher-education' );?>
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

<?php
    endwhile;

else :

    echo 'No Subject Info found';

endif;

?>

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

<?php
    endwhile;

else :

    echo 'No Subject Info found';

endif;

?>

<?php
$url = $_SERVER['REQUEST_URI'];
$urlSections = explode('/', $url);
$finalBreakdown = explode('-', $urlSections[2]);
$finalCount = count($finalBreakdown) - 1;
$id = $finalBreakdown[$finalCount];

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

  <!-- PDFs -->

  <?php if ($course->id == '14852' or '14856' or '14858' or '14853' or '14855' or '14859' or '14854' or '14862' or '14863' or '14860' or '14850' or '14824' or '14823' or '14857' or '14849' or '14789' ) {?>

  <?php $HEpdf = 0;?>

	<?php if ($course->id == '14939') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnc-early-years.pdf' ;}?>
	<?php if ($course->id == '14858') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnc-biological-sciences.pdf' ;}?>
	<?php if ($course->id == '14915') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnc-business.pdf'; }?>
	<?php if ($course->id == '15021') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnc-computing-systems-development.pdf' ;}?>
	<?php if ($course->id == '15025') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnc-creative-media.pdf' ;}?>
	<?php if ($course->id == '14961') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnc-electrical-engineering.pdf' ;}?>
	<?php if ($course->id == '14860') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnc-manufacturing-engineering.pdf' ;}?>
	<?php if ($course->id == '15058') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnc-sport.pdf' ;}?>
	<?php if ($course->id == '14912') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnd-business.pdf' ;}?>
	<?php if ($course->id == '15020') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnd-computing-systems-development.pdf' ;}?>
	<?php if ($course->id == '14984') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnc-hospitality-management.pdf' ;}?>
	<?php if ($course->id == '15031') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnc-music.pdf' ;}?>
	<?php if ($course->id == '15024') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnd-creative-media.pdf' ;}?>
	<?php if ($course->id == '15059') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnd-sport.pdf' ;}?>
	<?php if ($course->id == '15030') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnd-music.pdf' ;}?>
	<?php if ($course->id == '14863') { $HEpdf = 'http://www.knowsleycollege.ac.uk/wp-content/uploads/2016/04/hnc-mechanical-engineering.pdf' ;}?>	
	<?php }?>

	
	<div class="button-default"><a title="<?=$course->factsheetname?>" href="/?page_id=1789&factsheet=<?=$course->id?>">Course Factsheet</a></div>
  

  <?php if ( ($course->level == 'Level 5') && ($course->programmearea == 'Higher Education') )  {?>
  <?php if ($HEpdf === 0) {?> <?php } else {?>
 	<div class="button-default"><a href="<?php echo $HEpdf ?>">Download Factsheet <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></div> 	
  <?php } ?>
  <div class="button-default"><a href="/apply/?courseid=<?=$course->id?>">Apply Part Time</a></div>
	<div class="button-default"><a title="UCAS" href="https://www.ucas.com/" target="_blank">Apply Full Time <i class="fa fa-external-link"></i></a></div>
<?php } 


else {?>
   <?php if ($HEpdf === 0) {?> <?php } else {?>
 	<div class="button-default"><a href="<?php echo $HEpdf ?>">Download Factsheet <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></div> 	
  <?php } ?>
	<div class="button-default"><a href="/apply/?courseid=<?=$course->id?>">Apply</a></div>
<?php }?> 

  
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