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

<div class="fixed-container">


<aside>
<nav class="nav-secondary about-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'about-menu' ) ); ?>
</nav>
</aside>

<section class="archive-events">


<?php

// find date time now
$date_now = date('Y-m-d H:i:s');


// query events
$posts = get_posts(array(
	'posts_per_page'	=> -1,
	'post_type'			=> 'events',
	'meta_query' 		=> array(
	        'key'			=> 'start_date',
	        'compare'		=> '>',
	        'value'			=> $date_now,
	        'type'			=> 'DATETIME'
	),
	'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'start_date',
	'meta_type'			=> 'DATETIME'
));

if( $posts ): ?>

		<?php foreach( $posts as $p ): ?>

		<article class="slt-profile slt-profile-1col">
		<a href="<?php the_permalink($p->ID); ?>" alt="<?php echo $p->post_title;?> - <?php the_field('event_date', $p->ID); ?>">
		<div class="slt-image">
		<img src="<?php the_field('event_image', $p->ID); ?>" alt="<?php the_field('event_title', $p->ID); ?>">
		</div>
		</a>

		<div class="slt-info">
		<p class="slt-member-title"><a href="<?php the_permalink($p->ID); ?>" alt="<?php echo $p->post_title;?>"><?php echo $p->post_title;?></a></p>
		<p><strong><?php the_field('start_date', $p->ID)?></strong></p>
		<p class="slt-member-info"><?php the_field('event_excerpt', $p->ID); ?></p>

		</div>
		</article>

		<?php endforeach; ?>

<?php endif; ?>


</div>

	
	</section>

		


	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>