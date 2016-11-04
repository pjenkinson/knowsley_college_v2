<?php
/**
* Template Name: Services Single Page
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

<div class="full-width-container secondary-page services-page">

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

<div class="services-contact">
	<h2>Contact</h2>
	<ul>
		<?php if( get_field('tel') ): ?>
		<li><i class="fa fa-phone"></i><a href="tel:<?php the_field('tel'); ?>"><?php the_field('tel'); ?></a></li>
		<?php endif; ?>
		<?php if( get_field('email') ): ?>
		<li><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></li>
		<?php endif; ?>
		<?php if( get_field('website') ): ?>
		<li><a href="mailto:<?php the_field('website'); ?>"><?php the_field('website'); ?></a></li>
		<?php endif; ?>
		<?php if( get_field('campus') ): ?>
		<li><i class="fa fa-map-marker"></i><a href="<?php the_field('campus_link'); ?>"><?php the_field('campus'); ?></a></li>
		<?php endif; ?>
	</ul>
</div>


<div class="services-contact the-content">
	<?php

// check if the repeater field has rows of data
if( have_rows('opening_times') ):

?>
	<h2>Opening times</h2>

<ul>
<?php

 	// loop through the rows of data
    while ( have_rows('opening_times') ) : the_row();
?>
       
      <li><?php the_sub_field('opening_time');?></a></li>
     
<?php
    endwhile;
?>
</ul>
<?php
else :
?>

<?php //?>

<?php

endif;

?>

</div>
 



</aside>

<section>

	<!-- Content page heading
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<article class="the-content">
<?php the_content();?>
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