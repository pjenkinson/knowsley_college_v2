<?php
/**
 * Secondary Navigation, including quick links.
 * @package knowsley_college
 */
?>

<div class="knowsley-university-centre-logo">
	<img src="<?php echo get_bloginfo('template_directory');?>/images/employer-services.svg" alt="Knowsley University Centre">
</div>

<nav class="nav-secondary">
	<?php wp_nav_menu( array( 'theme_location' => 'employers' ) ); ?>
</nav>
