<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package knowsley_college
 */
?>

<article class="the-content search-result" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-summary">
	<?php if( get_field('meta_description') ): 
  the_field('meta_description'); 
  endif; ?>
	</div><!-- .entry-summary -->
	
</article><!-- #post-## -->
