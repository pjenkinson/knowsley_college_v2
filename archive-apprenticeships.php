<?php
/**
* Apprenticeship Vacancies Archive
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

<div class="full-width-container secondary-page vacancies-page">

	<div class="full-width-container">

<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner-archive' );?>

<div class="fixed-container">

<aside>
	<nav class="nav-secondary apprenticeships-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'apprenticeships' ) ); ?>
</nav>
</aside>

<section>

<div class="the-content">

<p>If you are interested in applying for future KCC apprenticeship  vacancies, please email <a href="mailto:EmployerServices@knowsleycollege.ac.uk">EmployerServices@knowsleycollege.ac.uk</a> with your CV attached, noting your area of interest.</p>
</div>

<!-- Vacancies
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article class="vacancies vacancies-archive">
		<div class="title">

		<h1 style="margin-bottom: 0.5em;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<p class="post-date"><i class="fa fa-clock-o"></i><?php the_date() ?> | Apprenticeship Vacancy | <i class="fa fa-map-marker"></i></i><?php the_field('location') ?></p>
		</div>

		<div class="description">
			<p><?php the_excerpt(); ?></p>
		</div>

		<p class="apply"><a href="<?php the_permalink(); ?>">View details</a></p>

	</article>


<?php endwhile; else : ?>


<?php endif; ?>

<div class="the-content">

	<iframe class='apprenticeships' height=750 width=100% src='//avlive.apprenticeships.org.uk/remote/f8c0cec2595ac2467f8beedbcd137a12'><p>Your browser does not support iframes.</p></iframe>

    </div>


</div>



	
	</section>

		


	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>