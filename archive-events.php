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

<div class="full-width-container news-page">

<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->


<div class="fixed-container">
<section class="archive-events">

<h2>Next Event</h2>

<?php

// find date time now
$date_now = date('Y-m-d H:i:s');


// query events
$posts = get_posts(array(
	'posts_per_page'	=> 1,
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

	</section>


    	<section class="news-section">

		<h2>Upcoming Events</h2>


<div class="news-posts-container">


<?php

// find date time now
$date_now = date('Y-m-d H:i:s');


// query events
$posts = get_posts(array(
	'posts_per_page'	=> '10',
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


  	<article class="news-item news-item-3col">
		
			<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
			<div class="small-news-thumb">
				<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail();
				} else { ?>
				<img src="<?php the_field('event_image', $p->ID); ?>" alt="<?php the_field('event_title', $p->ID); ?>">
				<?php } ?>
			</div>
			
			<div class="small-news-content">
				<h1><?php the_field('event_title', $p->ID); ?></h1>
				<p><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></p>
			</div>
			</a>

      </article>

	<?php endforeach; ?>

<?php endif; ?>

  



	</section>

</div>
</div>


<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>



</main><!-- #main -->
<?php get_footer(); ?>