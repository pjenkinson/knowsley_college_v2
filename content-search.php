<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package knowsley_college
 */
?>





<article class="the-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	<p>
	<?php if( get_field('meta_description') ): 
  the_field('meta_description'); 
  endif; ?>
	</p>
	
</article><!-- #post-## -->
