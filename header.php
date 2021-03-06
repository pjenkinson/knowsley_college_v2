<?php
/** Header */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php if ( is_front_page('') ) {echo'Knowsley Community College';} else if ( is_page_template('flexible-course-page.php') ) {wp_title(''); echo ' - Liverpool Courses';} else { wp_title(''); } echo' | Liverpool City Region | KCC'?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php if ( is_front_page() ) { echo'We are an innovative and dynamic Further Education College based in the Liverpool City Region. Our track record of high quality education and training from our two campuses, as well as our partner and employer locations, makes us the best choice for education and employment in Liverpool';} else
if( get_field('meta_description') ): ?><?php the_field('meta_description'); ?><?php else: ?><?php the_title();?><?php endif; ?>">
<meta name="author" content="Knowsley Community College">

<?php if (is_tag()) { ?>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<?php }?>

<!-- Mobile Specific Metas
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- JS -->

<!--[if lt IE 9]>

<script src="<?php echo get_bloginfo('template_directory');?>/inc/html5shiv/html5shiv.min.js"></script>
<script src="<?php echo get_bloginfo('template_directory');?>/inc/html5shiv/html5shiv-printshiv.min.js"></script>

<![endif]-->

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N2JVK5S');</script>
<!-- End Google Tag Manager -->


<!-- Google Maps -->

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwwjXh9emEaz5Av5yZtDkKPzVIxb4DKfM&callback">
</script>

<!-- Favicon
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png">

<?php wp_head(); ?>

<!-- Homepage scripts -->

<?php if ( is_front_page() ) { ?>
<?php get_template_part( 'navigation', 'scroll' );?>
<?php }
?>


</head>
<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N2JVK5S"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Google Analytics
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php include_once("analyticstracking.php") ?>

<div id="content" class="site-content">

<!-- Header
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<header>

<!-- Top navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

	<div class="full-width-container top-nav">

		<a title="Skip to main content" class="skip-link screen-reader-text" href="#main"><?php _e( 'Skip to content', 'knowsley_college' ); ?></a>

		<!-- Staff and Student Links
		–––––––––––––––––––––––––––––––––––––––––––––––––– -->
		<div class="fixed-container top-nav-container">

			<div class="top-nav-content">

				<div class="kcc-logo-container">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Knowsley Community College">

							<?php get_template_part( 'branding-logo-flex' );?>
		 
						</a>
				</div>

					<div class="external-access">
								<?php wp_nav_menu( array( 'theme_location' => 'external-access' ) ); ?>
							</div>
		</div>

					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Primary navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="full-width-container primary-navigation">

	<div class="fixed-container">

		<nav class="primary">
		<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
		</nav>

	</div>

</div>