<?php
// Must be inside a loop.

// Displays featured image with page title

if ( has_post_thumbnail() ) {

	echo '<div class="featured-banner featured-banner-child">' . '<div class="banner-heading">' ;
	echo'<div class="featured-banner-bg fixed-container">';
	echo '<h1 class="has-parent">';
	 the_title();
	echo '</h1>';
	echo '<p class="featured-banner-location">';
	echo'/ ';
	echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );
	echo '</p>';
	echo '</div>';
	echo '</div>';
		the_post_thumbnail();
	echo '</div>';
	}

// Displays parent featured image with page title
else {
	echo '<div class="featured-banner featured-banner-child">' . '<div class="banner-heading">' ;
	echo'<div class="featured-banner-bg fixed-container">';
	echo '<h1 class="has-parent">';
	 the_title();
	echo '</h1>';
	echo '<p class="featured-banner-location">';
	echo'/ ';
	echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );
	echo '</p>';
	echo '</div>';
	echo '</div>';
		echo get_the_post_thumbnail($post->post_parent, 'full');
	echo '</div>';
	
}
?>
