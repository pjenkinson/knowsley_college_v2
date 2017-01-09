<?php
/**
*
* @package knowsley_college
*/
get_header(); ?>

<!-- Scroll to top 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<script>
jQuery(function() {
    jQuery('.featured-article').matchHeight();
});

jQuery(function() {
    jQuery('.featured-news-heading').matchHeight();
});
</script>

<script>

jQuery(document).ready(function( $ ) {
	
	$('.main-carousel').flickity({
  // options
  cellAlign: 'left',
  contain: true,
  draggable: false,
  autoPlay: 6000,
  pauseAutoPlayOnHover: true,
  prevNextButtons: true,
  pageDots: true
 
});
	
});

jQuery(document).ready(function( $ ) {

$carousel.on( 'select.flickity', function() {

$( ".carousel-caption" ).addClass( "carousel-animation" );

})

});

</script>


<style>

.slider-container {
	overflow: hidden;
	clear: both;
	min-height: 500px;
	max-height: 500px;
}

.carousel-cell {
  width: 100%; /* full width */
  height: auto; /* height of carousel */
  margin-right: 10px;
}

.carousel-cell img {
	width: 100%;
	height: auto;
}

.is-selected .carousel-caption {
	opacity: 1 !important;	
	top: 50px !important;
}

.carousel-content {
	position: relative;
}


.carousel-caption {
	position: absolute;
	top: -1000px;
	background: rgba(146, 195, 98, 0.9);
	padding: 2em;
	width: 70%;
	opacity: 0;
		-webkit-transition: all 2.5s ease;
  -moz-transition:    all 2.5s ease;
  -o-transition:      all 2.5s ease;

}

.carousel-caption h2 {
	font-size: 3em;
	color: white;
	border-bottom: none;
	padding: 0px;
	margin: 0px;
}

.carousel-caption p {
	color: white;
}

.carousel-caption .button-default {
  
}

.carousel-caption .button-default a {
	color: #4d4d4c;
	background: white;
}

.carousel-caption .button-default a:hover {
	color: white;
	background: #4d4d4c;
}

/* smaller, dark, rounded square */
.flickity-prev-next-button {
  width: 30px;
  height: 30px;
  border-radius: 5px;
  background: #333;
}

.flickity-prev-next-button {
  width: 30px;
  height: 30px;
  border-radius: 5px;
  background: #333;
}
.flickity-prev-next-button:hover {
  background: #99cc66;;
}
/* arrow color */
.flickity-prev-next-button .arrow {
  fill: white;
}
.flickity-prev-next-button.no-svg {
  color: white;
}
/* position outside */
.flickity-prev-next-button.previous {
  top: 250px;
  left: 2em;
  position: absolute;
}
.flickity-prev-next-button.next {
  top: 250px;
  right: 2em;
  position: absolute;
}

.flickity-page-dots {
  top: 0px;
  right: 0px;
  padding-right: 2em;
  position: absolute;
}
/* white circles */
.flickity-page-dots .dot {
  width: 12px;
  height: 12px;
  opacity: 1;
  background: transparent;
  border: 2px solid white;
  list-style-type: none;
  margin-bottom: 8px;
}
/* fill-in selected dot */
.flickity-page-dots .dot.is-selected {
  background: white;
}

</style>



<!-- Slider
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<section class="full-width-container slider-container">

<div class="main-carousel" style="position:relative;">

  <div class="carousel-cell">
  	<div class="fixed-container carousel-content">
  		<div class="carousel-caption">
  			<h2>Knowsley Community College is the best local college in Liverpool</h2>
  			<p>Additional text can go here...</p><div class="button-default"><a href="">Find out more</a></div>
      </div>
    </div>
    <img alt="" src="https://images.pexels.com/photos/200431/pexels-photo-200431.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb">
  </div>

   <div class="carousel-cell">
  	<div class="fixed-container carousel-content">
  		<div class="carousel-caption">
  			<h2>Knowsley Community College is the best local college in Liverpool - Another line might be too big for this webpage.</h2>
  			<p>Additional text can go here...</p>
      </div>
    </div>
    <img alt="" src="https://images.pexels.com/photos/91988/pexels-photo-91988.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb">
  </div>

   <div class="carousel-cell">
  	<div class="fixed-container carousel-content">
  		<div class="carousel-caption">
  			<h2>Knowsley Community College is the best local college in Liverpool</h2>
  			<p>Additional text can go here...</p>
      </div>
    </div>
    <img alt="" src="https://images.pexels.com/photos/31049/pexels-photo-31049.jpg?w=1260&h=750&auto=compress&cs=tinysrgb">
  </div>

  <div class="carousel-cell">
  	<div class="fixed-container carousel-content">
  		<div class="carousel-caption">
  			<h2>Knowsley Community College is the best local college in Liverpool - Another line might be too big for this webpage. Another line is definitely too long for this webpage. This is definitely too far! Knowsley Community College is the best local college in Liverpool - Another line might be too big for this webpage.</h2>
  			<p>Additional text can go here...</p>
      </div>
    </div>
    <img alt="" src="https://images.pexels.com/photos/31049/pexels-photo-31049.jpg?w=1260&h=750&auto=compress&cs=tinysrgb">
  </div>



</section>


</header>



<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<main id="main" class="site-main site-homepage" role="main">
<?php
$currentID = get_the_ID();
$currentCategory = get_the_category();
?>

<!-- Courses section
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<section class="full-width-container courses-section white-background">
<div class="fixed-container">

<div class="learners-container">

	<div class="learner-item">
	<a href="<?php the_field('16_19_permalink', 'option'); ?>">
			<div class="learner-item-image">
			<img alt="School Leavers" src="<?php the_field('16_19_image', 'option'); ?>">
			</div>
			<h3><?php the_field('16_19_title', 'option'); ?><i class="fa fa-arrow-circle-o-right link-arrow"></i></h3>
	</a>
	</div>

	<div class="learner-item">
	<a href="<?php the_field('apprenticeships_permalink', 'option'); ?>">
			<div class="learner-item-image">
			<img alt="Apprenticeships" src="<?php the_field('apprenticeships_image', 'option'); ?>">
			</div>
			<h3><?php the_field('apprenticeships_title', 'option'); ?><i class="fa fa-arrow-circle-o-right link-arrow"></i></h3>
	</a>
	</div>

	<div class="learner-item">
	<a href="<?php the_field('adults_permalink', 'option'); ?>">
			<div class="learner-item-image">
			<img alt="Adults" src="<?php the_field('adults_image', 'option'); ?>">
			</div>
			<h3><?php the_field('adults_title', 'option'); ?><i class="fa fa-arrow-circle-o-right link-arrow"></i></h3>
	</a>
	</div>

	<div class="learner-item">
	<a href="<?php the_field('higher_education_permalink', 'option'); ?>">
			<div class="learner-item-image">
			<img alt="Higher Education" src="<?php the_field('higher_education_image', 'option'); ?>">
			</div>
			<h3><?php the_field('higher_education_title', 'option'); ?><i class="fa fa-arrow-circle-o-right link-arrow"></i></h3>
	</a>
	</div>
		
</div>

</section>




<!-- News section -->
<section class="full-width-container news-section">
<div class="fixed-container">
<?php
// Query for displaying the latest post, larger image and main focus of news page.
$the_query = new WP_Query( array( 'category_name' => 'news' , 'showposts' => '2'));
?>
<div class="featured-news-container">
<h2 class="section-heading">Latest News and Events</h2>
<p class="content-snippet-intro">Stay up to date with KCC <a href="<?php echo site_url(); ?>/news">News</a> and <a href="<?php echo site_url(); ?>/events">Events</a>.</p>

<div class="featured-news">
<?php
// The Loop
while ( $the_query->have_posts() ) :
$the_query->the_post();
?>

<div class="featured-news-snippet featured-article">
	<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
	<div class="featured-news-snippet-details">
	<div class="featured-news-heading">
	<h3><?php the_title(); ?></h3>
	</div>
	<div class="homepage-featured-news-image">
	<?php if ( has_post_thumbnail() ) {
the_post_thumbnail();
} else { ?>
<img src="<?php echo site_url(); ?>/wp-content/uploads/2015/06/the-latest.png" alt="<?php the_title(); ?>" />
<?php } ?>
	</div>
	<div class="featured-post-date">
		<p><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></p>
	</div>
	</div>
	</a>
</div>

<?php
endwhile;
// Restore original Query & Post Data
wp_reset_query();
wp_reset_postdata();
?>

<?php 

// If 0 event posts, display news post

$events = get_posts( array('post_type' => 'events', 'posts_per_page' => -1) );

if($events) {
$the_query = new WP_Query( array( 'post_type' => 'events' , 'showposts' => '1' , 'orderby' => 'date', 'order' => 'ASC' ));
$noevents = 'a';
} 

else { ?>
<?php
$the_query = new WP_Query( array( 'category_name' => 'news' , 'showposts' => '1', 'offset' => '2'));

} 
?>

<?php
// The Loop
while ( $the_query->have_posts() ) :
$the_query->the_post();
?>

<?php // Get the Event ID
$id = get_the_ID(); ?>

<div class="featured-news-snippet featured-events-snippet featured-article">
	<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
	<div class="featured-news-snippet-details">
	<div class="featured-news-heading">
	<h3><?php the_title(); ?></h3>
	</div>
	<div class="homepage-featured-news-image">
		<?php the_post_thumbnail();?>
	</div>

	<?php // If events post, replace news icon with events icon and text
	if ($noevents == 'a') {?>
  <div class="featured-post-date">
	<p>Event  <i class="fa fa-calendar"></i> <?php the_field('event_date', $id); ?></p>
	</div>
	<?php } else {?>
  <div class="featured-post-date">
	<p><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></p>
  </div>
	<?php }?>
	</div>
	</a>
</div>

<?php
endwhile;
// Restore original Query & Post Data
wp_reset_query();
wp_reset_postdata();
?>

</div>

</section>


<!-- Main Campus Video section -->
<section class="full-width-container students-section">
<div class="fixed-container">
<div class="two-col-section-main">
<h2 class="section-heading">Main Campus</h2>
<p>KNOW how to dream big with Knowsley Community College. Our brand new £32 million Main Campus is now open!</p>
<div class="button-default section-margin-top button-primary">
<a href="http://www.knowsleycollege.ac.uk/about/our-campuses/main-campus/" title="Main Campus - KCC">
Find out more
</a>
</div>
</div>
<div class="two-col-section-side two-col-section-image">
	<div class="section-image-container">
	<?php the_field('main_campus_video', 'option'); ?>
	</div>
</div>
</div>
</section>






<section class="full-width-container download-prospectus">

<div class="fixed-container">
	<div class="two-col-section-prospectus-description">
		<h2 class="section-heading">View our 2017-18 Prospectus</h2>
		<p>For a guide to courses available to you, view our School Leavers or Adult Prospectus.</p>
	</div>
	<div class="two-col-section-prospectus-download">
		<?php

// check if the repeater field has rows of data
if( have_rows('download_prospectus', 'option') ):

?>
<?php

 	// loop through the rows of data
    while ( have_rows('download_prospectus', 'option') ) : the_row();
?>

		<div class="prospectus-container">
			<div class="prospectus-cover">
			<a href="<?php the_sub_field('prospectus_pdf', 'option'); ?>" title="">
			<img width="104px" height="140px" src="<?php the_sub_field('prospectus_cover', 'option'); ?>" alt="<?php the_sub_field('title', 'option'); ?> " />
		  </a>
		  </div>
		  <div class="prospectus-description">
		  	<p><?php the_sub_field('title', 'option'); ?></p>
		  	<a href="<?php the_sub_field('prospectus_pdf', 'option'); ?>">
		  		<button class="download-button">View</button></a>
		  </div>
		</div>

<?php
    endwhile;?>
<?php

else :
?>

<p>Download a prospectus from the resources page.</p>

<?php

endif;

?>

</div>

</section>

<!--
<section class="full-width-container newsletter-signup">

<div class="fixed-container">
<form class="newsletter-form-signup-bar" method="POST" action="" data-parsley-validate>
	<label>Sign up to our newsletter</label>
	<input class="email-input" name="email" placeholder="Enter your email address" email></input>
	<input class="submit" name="submit" type="submit" value="Sign up"></input>
</form>

</div>

</section>
-->

<!-- Careers Coach -->
<section class="full-width-container employers-section">
	<div class="fixed-container">

		<div class="two-col-section-main two-col-section-image">
			<div class="section-image-container">
				<a href="<?php the_field('career_coach_page_link', 'option'); ?>" title="<?php the_field('career_coach_title', 'option'); ?>">
				<img src="<?php the_field('career_coach_thumbnail', 'option'); ?>" alt="<?php the_field('career_coach_title', 'option'); ?>">
				</a>
			</div>
		</div>
			<div class="two-col-section-side right-float">
			<h2 class="section-heading"><?php the_field('career_coach_title', 'option'); ?></h2>
			<p><?php the_field('career_coach_description', 'option'); ?></p>

			<div class="button-default section-margin-top button-primary">
			<a title="Careers Coach Knowsley Community College" href="<?php the_field('career_coach_page_link', 'option'); ?>" title="Find out more">
			Find out more
			</a>
			</div>
		</div>
	</div>
</section>

<!-- Student support section -->
<section class="full-width-container students-section white-background">
<div class="fixed-container">
<div class="two-col-section-main">
<h2 class="section-heading"><?php the_field('student_support_title', 'option'); ?></h2>
<p><?php the_field('student_support_description', 'option'); ?></p>
<div class="button-default section-margin-top button-primary">
<a href="<?php the_field('student_support_page_link', 'option'); ?>" title="<?php the_field('student_support_title', 'option'); ?>">
Find out more
</a>
</div>
</div>
<div class="two-col-section-side two-col-section-image">
	<div class="section-image-container">
		<a title="Student Support" href="<?php the_field('student_support_page_link', 'option'); ?>" title="<?php the_field('student_support_title', 'option'); ?>">
		<img src="<?php the_field('student_support_thumbnail', 'option'); ?>" alt="<?php the_field('student_support_title', 'option'); ?>">
		</a>
	</div>
</div>
</div>
</section>

<!-- Employers section -->
<section class="full-width-container employers-section">
	<div class="fixed-container">

		<div class="two-col-section-main two-col-section-image">
			<div class="section-image-container">
				<a href="<?php the_field('employers_page_link', 'option'); ?>" title="<?php the_field('employers_title', 'option'); ?>">
				<img src="<?php the_field('employers_thumbnail', 'option'); ?>" alt="<?php the_field('employers_title', 'option'); ?>">
				</a>
			</div>
		</div>
			<div class="two-col-section-side right-float">
			<h2 class="section-heading"><?php the_field('employers_title', 'option'); ?></h2>
			<p><?php the_field('employers_description', 'option'); ?></p>

			<div class="button-default section-margin-top button-primary">
			<a title="Employers" href="<?php the_field('employers_page_link', 'option'); ?>" title="Find out more">
			Find out more
			</a>
			</div>
		</div>
	</div>
</section>


<!-- College services carousel -->
<section class="full-width-container services-section white-background">
<div class="fixed-container">
<h2 class="section-heading">College Services</h2>
<p class="section-sub-heading">Knowsley Community College has a range of services at our campuses available to the public.</p>
<div id="owl-demo">
<div class="item">
<a href="<?php the_field('carousel_one', 'option'); ?>"><img src="<?php echo get_bloginfo('template_directory');?>/images/services/the-bistro.png" alt="The Bistro">
</a></div>
<div class="item">
<a href="<?php the_field('carousel_two', 'option'); ?>"><img src="<?php echo get_bloginfo('template_directory');?>/images/services/lee-stafford-education.png" alt="KCC Live">
</a></div>
<div class="item">
<a href="<?php the_field('carousel_four', 'option'); ?>"><img src="<?php echo get_bloginfo('template_directory');?>/images/services/radio.png" alt="KCC Live">
</a></div>
</div>
</div>
</section>

<!-- Resources section -->
<section class="full-width-container resources-section">
	<div class="fixed-container">

		<div class="home-section-3col">

			<div class="resources">
				<h2><?php the_field('resources_title', 'option'); ?></h2>
				<p><?php the_field('resources_link_description', 'option'); ?> <a title="More <?php the_field('resources_title', 'option'); ?>" href="<?php the_field('resources_page_link', 'option'); ?>" title="<?php the_field('resources_title', 'option'); ?>">More <i class="fa fa-arrow-circle-o-right"></i></a></p>
				<a href="<?php the_field('resources_page_link', 'option'); ?>">
					<img src="<?php the_field('resources_thumbnail', 'option'); ?>" alt="<?php the_field('resources_title', 'option'); ?>">
				</a>
			</div>
			<div class="alumni">
				<h2><?php the_field('alumni_title', 'option'); ?></h2>
				<p><?php the_field('alumni_link_description', 'option'); ?> <a title="More <?php the_field('alumni_title', 'option'); ?>" href="<?php the_field('alumni_custom_link', 'option'); ?>" title="<?php the_field('resources_title', 'option'); ?>">More <i class="fa fa-arrow-circle-o-right"></i></a></p>
				<a href="<?php the_field('alumni_custom_link', 'option'); ?>">
					<img src="<?php the_field('alumni_thumbnail', 'option'); ?>" alt="<?php the_field('alumni_title', 'option'); ?>">
				</a>
			</div>
			<div class="extra">
				<h2><?php the_field('newsletter_title', 'option'); ?></h2>
				<p><?php the_field('newsletter_link_description', 'option'); ?> <a title="More <?php the_field('newsletter_title', 'option'); ?>" href="<?php the_field('newsletter_page_link', 'option'); ?>" title="<?php the_field('resources_title', 'option'); ?>">More <i class="fa fa-arrow-circle-o-right"></i></a></p>
				<a href="<?php the_field('newsletter_page_link', 'option'); ?>">
					<img src="<?php the_field('newsletter_thumbnail', 'option'); ?>" alt="<?php the_field('newsletter_title', 'option'); ?>">
				</a>
			</div>

		</div>

	</div>

</section>

</main>
<?php get_footer(); ?>