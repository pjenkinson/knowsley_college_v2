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

// find date time now
$date_now = date('Y-m-d H:i:s');

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
	'posts_per_page' => 9,
  	'paged'          => $paged,
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

<?php 
$prev_link = get_previous_posts_link(__('&laquo; Older Entries'));
$next_link = get_next_posts_link(__('Newer Entries &raquo;'));
?>

<nav class="prev-next-posts">

	<?php if ($prev_link) {?>
	<div class="prev-posts-link">
	<i class="fa fa-angle-double-left" style="color: white;"></i> <?php echo get_previous_posts_link('Previous'); ?>
    </div>
	<?php }?>
    
	<?php if ($next_link) {?>
	<div class="next-posts-link">
	<?php echo get_next_posts_link('Next'); ?> <i class="fa fa-angle-double-right" style="color: white;"></i>
	</div>
    <?php }?>
 	
   
  </nav>
  
 
<?php else : ?>
<p><?php esc_html_e( 'No events to display' ); ?></p>
<?php endif; ?>

	</section>



</div>
</div>




</main><!-- #main -->
<?php get_footer(); ?>