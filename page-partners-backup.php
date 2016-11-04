<?php
/**
* Template Name: Partners Page Backup
* Content Page
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
<main id="main" class="site-main services" role="main" >

<!-- Title and strapline
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<section class="full-width-container">
	<div class="fixed-container">


	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner' );?>

	<?php the_content();?>

	<?php endwhile; else: ?>
	<p>Sorry, no posts matched your criteria.</p>


	<?php endif; ?>



<div class="intro-6-col">

<!-- Homepage tagline and intro paragraph
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'acf', 'homepage-tagline' );?>

</div>

<div class="intro-6-col-last">

<div class="secondary-homepage-intro">	
	<h2>Secondary Homepage</h2>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla erat mauris, vehicula et lectus congue, elementum convallis lacus. Vivamus dapibus nunc eget urna tristique, sollicitudin bibendum est tempus.</p>
</div>

</div>

<!-- ACF partners sections
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'acf', 'partners' );?>


</section>






</main>
<?php get_footer(); ?>