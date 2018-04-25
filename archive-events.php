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

<?php         
$paged = $wp_query->get( 'paged' );
 
if ( ! $paged || $paged < 2 ) {?>


<h2 style="text-align:center;">Next Event</h2>

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
		<p><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_field('start_date', $p->ID)?></p>
		<p class="slt-member-info"><?php the_field('event_excerpt', $p->ID); ?></p>

		</div>
		</article>

		<?php endforeach; ?>

<?php endif; ?>

	</section>

<?php } else {
   echo 'This is a paginated page.';
}
?>







    	<section class="news-section">

		<h2 style="text-align:center;">Upcoming Events</h2>


<?php
wp_reset_query();

// find date time now
$date_now = date('Y-m-d H:i:s');

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
	'posts_per_page' => 3,
  	'paged'          => $paged,
	'offset' => 1,
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
);
$Eventposts = new WP_Query( $args );
?>


<div class="news-posts-container">


<?php if ( $Eventposts->have_posts() ) : ?>

<!-- pagination here -->

<!-- the loop -->
<?php while ( $Eventposts->have_posts() ) : $Eventposts->the_post(); ?>
<article class="news-item news-item-3col">
		
		<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
		<div class="small-news-thumb">
			<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail();
			} else { ?>
			<img src="<?php the_field('event_image', $post->ID); ?>" alt="<?php the_title();?>">
			<?php } ?>
		</div>
		
		<div class="small-news-content">
			<h1><?php the_title();?></h1>
			<p><i class="fa fa-calendar" aria-hidden="true"></i><?php the_field('start_date', $post->ID); ?></p>
		</div>
		</a>

  </article>
<?php endwhile; ?>
<!-- end of the loop -->


<nav class="prev-next-posts">

    <?php if ( ! $paged || $paged < 2 ) {?>

	 <div class="next-posts-link">
	<?php echo get_next_posts_link('More'); ?>
    </div>
    
	<? } else {?>

	<div class="prev-posts-link">
	<?php echo get_previous_posts_link('Latest events'); ?>
    </div>

	<div class="next-posts-link">
	<?php echo get_next_posts_link('More'); ?>
    </div>
 
<?php } ?>
	
   
  </nav>
  
 


<?php wp_reset_postdata(); ?>

<?php else : ?>
<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>






	</section>



</div>
</div>




</main><!-- #main -->
<?php get_footer(); ?>