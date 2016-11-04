<?php
/**
* Template Name: Contact Homepage
*
* @package knowsley_college
*/
get_header(); ?>

<!-- Scroll to top 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'scroll' );?>

<script>
jQuery(function() {
    jQuery('.contact-sections').matchHeight();
});
</script>
	
</header>

<!-- Breadcrumbs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'breadcrumbs' );?>


<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<main id="main" class="site-main" role="main">


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="full-width-container secondary-page secondary-home-page">

	<div class="fixed-container">

<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- Start of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner' );?>

<aside>
<!-- Secondary Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'contact' );?>
</aside>


<section>

<?php the_content();?>


<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>




<!-- Homepage thumbnails
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'acf', 'contact' );?>

<!-- New Campus Promo
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php /*
<article class="slt-profile slt-profile-1col the-content">

	<a href="<?php the_field('new_campus_link')?>" alt="<?php the_field('new_campus_title')?>">
	<div class="slt-image">
		<img src="<?php the_field('new_campus_image')?>" alt="">
		<p class="slt-member-name"><?php the_field('new_campus_title')?></p>
	</div>
	</a>

	<div class="slt-info">
		<p class="slt-member-title"><?php the_field('new_campus_sub_title')?></p>
		<p class="slt-member-info"><?php the_field('new_campus_info')?> <a href="<?php the_field('new_campus_link')?>" alt="<?php the_field('new_campus_title')?>">Find out more</a></p>

	</div>



</article>
*/
?>
	
</section>
		


	</div>

</div>



</main><!-- #main -->
<?php get_footer(); ?>