<?php
/**
* Template Name: How to apply
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
<?php get_template_part( 'navigation', '16-19' );?>
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

<?php

// check if the repeater field has rows of data
if( have_rows('how_to_apply') ):

 	// loop through the rows of data
    while ( have_rows('how_to_apply') ) : the_row();
?>



<article class="slt-profile slt-profile-1col">

	<a href="<?php the_sub_field('link')?><?php the_sub_field('custom_link')?>" alt="<?php the_sub_field('title')?>">
	<div class="slt-image">
		<img src="<?php the_sub_field('image')?>" alt="">
		<p class="slt-member-name"><?php the_sub_field('title')?></p>
	</div>
	</a>

	<div class="slt-info">
		<p class="slt-member-title"><?php the_sub_field('description')?></p>
	</div>

</article>


<?php
    endwhile;

else :

    echo 'No Content';

endif;

?>
	
	
	</section>

		


	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>