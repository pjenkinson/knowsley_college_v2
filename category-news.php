<?php
/**
* Displays posts for News, Events and Press Releases*
* @package knowsley_college
*/
get_header(); ?>

<script>
jQuery(function() {
    jQuery('.news-item').matchHeight();
});
</script>

</header>
<!-- Breadcrumbs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="full-width-container primary-breadcrumbs">
<div class="fixed-container">
	<div id="breadcrumbs">
		<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
			<?php if(function_exists('bcn_display'))
			{
			bcn_display();
			}?>
		</div>
	</div>
</div>
</div>

<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<main id="main" class="site-main content-main" role="main">
<!-- Page content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="full-width-container default-page news-page">


<div class="fixed-container">

	<section class="news-section">

<!-- Featured news -->
		
<!-- Paginated news -->



<div class="news-posts-container">

<?php 
if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
else { $paged = 1; }

$wp_query = new WP_Query('posts_per_page=9&paged=' . $paged . '&category_name=news')
?>	

<?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); // run the loop ?>


  	<article class="news-item news-item-3col">
		
			<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
			<div class="small-news-thumb">
				<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail();
				} else { ?>
				<img src="https://www.knowsleycollege.ac.uk/wp-content/uploads/2015/06/the-latest.png" alt="<?php the_title(); ?>" />
				<?php } ?>
			</div>
			
			<div class="small-news-content">
				<h1><?php the_title(); ?></h1>
				<p><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></p>
			</div>
			</a>

      </article>

<?php endwhile; ?>

  <nav class="prev-next-posts">
    <div class="prev-posts-link">
      <?php echo get_next_posts_link( 'More News' );  ?>
    </div>
    <?php if ( is_paged() ) {?>
    <div class="next-posts-link">
      <?php echo get_previous_posts_link( 'Previous' ); ?>
    </div>
    <?php }?>
  </nav>

</div>


<?php else: ?>
  <article>
    <h1>Sorry...</h1>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  </article>
<?php endif; ?>



	</section>
	
</div>
</div>
</main><!-- #main -->
<?php get_footer(); ?>