<?php
/**
Tag Page
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
<?php// get_template_part( 'branding-flex' );?>

<main id="main" class="site-main kcc-primary" role="main">


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="full-width-container secondary-page">


<div class="full-width-container">
<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php // get_template_part( 'content', 'featured-banner-has-parent' );?>
</div>

<div class="fixed-container flexible-content-container">


<aside>
<!-- Secondary Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php // get_template_part( 'navigation', 'flex-secondary' );?>
</aside>

<section>

<article class="single-article the-content">



<!-- Start of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<h1><?php single_tag_title(); ?></h1>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

<a href="<?php the_permalink() ?>">

<h2><?php the_title(); ?></h2>
</a>

<p><?php the_excerpt(); ?></p>


<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>

<!-- End of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- Flexible Content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php // get_template_part( 'custom-fields/acf', 'content-flex' );?>


</article>


	
	</section>

		


	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>