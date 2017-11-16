<?php
/**
* Vacancies Archive
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
<main id="main" class="site-main kcc-primary" role="main">


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="full-width-container secondary-page vacancies-page">

	<div class="full-width-container">

<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner-archive' );?>


<div class="fixed-container">

<aside>
<nav class="nav-secondary about-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'about-menu' ) ); ?>
</nav>
</aside>

<section>

<!-- Vacancies
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article class="vacancies vacancies-archive">
		<div class="title">

		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
		<p><?php the_field('type'); ?></p>
		<?php if( get_field('salary') ): ?>
		<p>Salary: <?php the_field('salary'); ?></p>
		<?php endif; ?>
	
		</div>

		<div class="description">
			<p><?php the_excerpt(); ?></p>
		</div>

		<div class="button-default section-button" style="margin-top: 2em;"><a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">Find out more</a></div>

	</article>


<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


</div>

	
	</section>

		


	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>