<?php
// Must be inside a loop.

// Displays featured image with page title

if ( has_post_thumbnail() ) {

	echo '<div class="featured-banner">' . '<div class="banner-heading">' ;
	echo '<h1 class="has-parent">';
	 the_title();
	echo '</h1>';
	echo '<p>';
	echo'/ ';
	echo 'Alumni';
	echo '</p>';
	echo '</div>';
		the_post_thumbnail();
	echo '</div>';
	}

// Displays parent featured image with page title
else {
	echo '<div class="featured-banner">' . '<div class="banner-heading">' ;
	echo '<h1 class="has-parent">';
	 the_title();
	echo '</h1>';
	echo '<p>';
	echo'/ ';
	echo 'Alumni';
	echo '</p>';
	echo '</div>';
		echo get_the_post_thumbnail($post->post_parent, 'full');
	echo '</div>';
	
}
?>
