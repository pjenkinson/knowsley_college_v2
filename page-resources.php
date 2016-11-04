<?php
/**
* Template Name: Resources
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

<!-- Start of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>


<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner-has-parent' );?>


<aside>
<!-- Secondary Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'about' );?>
</aside>

<section>

<?php if( get_field('tagline') ): ?>

<!-- Homepage tagline and intro paragraph
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'acf', 'homepage-tagline' );?>

<?php endif; ?>


<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>

<!-- End of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="the-content">

<!-- Resources| Course Information
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<h2>Course Information</h2>
<?php

// check if the repeater field has rows of data
if( have_rows('course_information_resource') ):

?>

<ul class="resources-list">
<?php

 	// loop through the rows of data
    while ( have_rows('course_information_resource') ) : the_row();
?>
       
      <li><a href="<?php the_sub_field('pdf_resource');?>"><?php the_sub_field('title');?> <i class="fa fa-file-pdf-o"></i><?php if( get_sub_field('cover') ): ?>
        <img src="<?php the_sub_field('cover');?>" alt="<?php the_sub_field('title');?>"><?php endif; ?></a></li>
     
<?php
    endwhile;?>
</uL>
<?php

else :
?>

<p>Sorry, we currently have no course information resourses to display.</p>

<?php

endif;

?>

<!-- Resources| Student Information
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<h2>Student Information</h2>

<?php

// check if the repeater field has rows of data
if( have_rows('college_information_resource') ):

?>

<ul class="resources-list">
<?php

 	// loop through the rows of data
    while ( have_rows('college_information_resource') ) : the_row();
?>
       
      <li><a href="<?php the_sub_field('pdf_resource');?>"><?php the_sub_field('title');?> <i class="fa fa-file-pdf-o"></i>
        <?php if( get_sub_field('cover') ): ?>
        <img src="<?php the_sub_field('cover');?>" alt="<?php the_sub_field('title');?>"><?php endif; ?></a></li>
     
<?php
    endwhile;?>
</ul>

<?php

else :
?>

<p>Sorry, we currently have no course information resourses to display.</p>

<?php

endif;

?>

<h2>KCC policies and statements</h2>


<?php the_content()?>


</div>

	
</section>

		


	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>