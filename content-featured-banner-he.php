<?php
// Must be inside a loop.

// Displays featured image with page title

if ( has_post_thumbnail() ) {
	echo '<div class="featured-banner">' . '<div class="banner-heading">' ;
	echo'<div class="featured-banner-bg fixed-container featured-banner-parent">';
	echo '<h1>';
	 the_title();
	echo '</h1>';
	echo '<p class="featured-banner-strapline">';
	echo'Designed with Employers. Devised for your career.';
	echo '</p>';
	echo '</div>';
	echo '</div>';
		the_post_thumbnail();
	echo '</div>';
	}

// Displays parent featured image with page title
else {
	echo '<div class="featured-banner">' . '<div class="banner-heading">' ;
	echo'<div class="featured-banner-bg fixed-container featured-banner-parent">';
	echo '<h1>';
	 the_title();
	echo '</h1>';
	echo '<p class="featured-banner-strapline">';
	echo'Designed with Employers. Devised for your career.';
	echo '</p>';
	echo '</div>';
	echo '</div>';
		echo get_the_post_thumbnail($post->post_parent, 'full');
	echo '</div>';
	
}
?>
