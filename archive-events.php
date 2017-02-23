<?php
/**
* Events Archive
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

<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner-archive' );?>

<div class="fixed-container">


<aside>
<nav class="nav-secondary about-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'about-menu' ) ); ?>
</nav>
</aside>

<section class="archive-events">

<!-- Events - * update to sort by date *
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php query_posts( 'posts_per_page=-1&post_type=events&order=ASC' );?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article class="slt-profile slt-profile-1col">
	<a href="<?php the_permalink(); ?>" alt="<?php the_field('event_title')?> - <?php the_field('event_date')?>">
	<div class="slt-image">
		<img src="<?php the_field('event_image')?>" alt="<?php the_field('event_title')?>">
		<p class="slt-member-name"><?php the_field('event_date')?></p>
	</div>
	</a>

	<div class="slt-info">
		<p class="slt-member-title"><a href="<?php the_permalink(); ?>" alt="<?php the_field('event_title')?>"><?php the_title('')?></a></p>
		<p class="slt-member-info"><?php the_field('event_excerpt')?></p>
		<p class="slt-member-info"><i class="fa fa-clock-o"></i> <?php the_field('event_time')?></p>
	</div>
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