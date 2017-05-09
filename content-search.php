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
		<?php the_title( sprintf( '<h1><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

	<div class="entry-summary">
	<p>
	<?php if( get_field('meta_description') ): 
  the_field('meta_description'); 
  endif; ?>
	</p>
	</div><!-- .entry-summary -->
	
</article><!-- #post-## -->
