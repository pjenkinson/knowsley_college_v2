<?php
/**
* Template Name: Meet the team
* Content Page
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

<div class="full-width-container secondary-page meet-the-team">

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


<?php

// check if the repeater field has rows of data
if( have_rows('slt_member') ):

 	// loop through the rows of data
    while ( have_rows('slt_member') ) : the_row();
?>

<article class="slt-profile slt-profile-1col">

	<div class="slt-image">
		<img src="<?php the_sub_field('slt_member_image')?>" alt="">
		<p class="slt-member-name"><?php the_sub_field('slt_member_name')?></p>
	</div>

	<div class="slt-info">
		<p class="slt-member-title"><?php the_sub_field('slt_member_title')?></p>
		<p class="slt-member-info"><?php the_sub_field('slt_member_info')?></p>
	</div>



</article>

<?php
    endwhile;

else :

    echo 'No SLT Members found';

endif;

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