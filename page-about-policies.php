<?php
/**
* Template Name: Policies Page
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
<?php get_template_part( 'navigation', 'policies' );?>
</aside>

<section>


<article class="wp-content the-content">

<?php the_content();?>


<?php if( get_field('quick_links_toggle') )
{?>

<?php // check if the repeater field has rows of data
if( have_rows('quick_links') ):?>

<div class="quick-links">
<h3><?php the_field('quick_links_title');?> <i class="fa fa-link"></i></h3>
<ul>

<?php

 	// loop through the rows of data
    while ( have_rows('quick_links') ) : the_row();
?>

<li><a href="<?php the_sub_field('page_link');?>"><?php the_sub_field('title');?></a></li>
<?php endwhile;?>
</ul>
</div>

<?php else: //Do Nothing?>
<?php endif; ?>

<?php }
else
{?>



<?php }?>




</article>

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