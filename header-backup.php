<?php
/**
 * The header for our theme.
  * @package knowsley_college
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php if ( is_front_page() ) {echo'Knowsley Community College ';} else { wp_title(''); } echo' | KCC'?></title>
<meta http-equiv="X-UA-Compatible" content="IE=EDGE; IE=9; IE=8; IE=7" />
<meta name="description" content="<?php if ( is_front_page() ) { echo'We are an innovative and dynamic Further Education College based in the Liverpool region. Our track record of high quality education and training from our two main campuses, as well as our partner and employer locations, makes us the bustling hub of learning and employment in the area.';} else
if( get_field('meta_description') ): ?><?php the_field('meta_description'); ?><?php else: ?><?php the_title();?><?php endif; ?>">
<meta name="author" content="Knowsley Community College">

<?php if (is_page_template('cron1.php')) { ?>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<?php }?>

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- JS
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<script src="<?php echo get_bloginfo('template_directory');?>/js/modernizr.custom.64847.js"></script>

<!--[if lt IE 9]>

<script src="<?php echo get_bloginfo('template_directory');?>/inc/html5shiv/html5shiv.min.js"></script>
<script src="<?php echo get_bloginfo('template_directory');?>/inc/html5shiv/html5shiv-printshiv.min.js"></script>

<![endif]-->

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwwjXh9emEaz5Av5yZtDkKPzVIxb4DKfM&callback=initMap">
    </script>


<!-- Favicon
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png">

<?php wp_head(); ?>

<!-- Share this for single pages -->
<?php if ( is_single() ) {?>
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://ws.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "b018ceee-b502-4f45-8a6f-58da868c1cf4", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<?php } else {}?>

<?php if ( is_front_page() ) { ?>
<?php get_template_part( 'script', 'owlcarousel' );?>
<?php get_template_part( 'navigation', 'scroll' );?>
<?php }
?>
</head>
<body>

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

				<div class="top-nav-apply-button"><a href="<?php echo site_url(); ?>/apply">Apply</a></div>

					<div class="external-access">
					<?php wp_nav_menu( array( 'theme_location' => 'external-access' ) ); ?>
					</div>

						<div class="search-media-container">

							<div class="social-media-buttons">

								<ul class="social-media">
								<li><a href="https://www.instagram.com/knowsleycollege" title="Instagram - KCC"><i class="fa fa-instagram"></i><span class="link-text">Instagram - Knowsley College</span></a></li>
								<li><a href="https://www.facebook.com/knowsleycollege" title="Facebook - KCC"><i class="fa fa-facebook"></i><span class="link-text">Facebook - Knowsley College</span></a></li>
								<li><a href="https://twitter.com/knowsleycollege" title="Twitter - KCC"><i class="fa fa-twitter"></i><span class="link-text">Twitter - Knowsley College</span></a></li>
								<li><a href="https://www.youtube.com/user/KnowsleyCollege" title="YouTube - KCC"><i class="fa fa-youtube"></i><span class="link-text">YouTube - Knowsley College</span></a></li>
								</ul>

							</div>

							<div class="search-form-wp">

								<?php get_search_form(); ?>

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

		<div class="kcc-logo-container">
			<div class="kcc-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">

					<?php get_template_part( 'branding-logo-flex' );?>
 
				</a>
			</div>
		</div>

		<nav class="primary">
		<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
		</nav>

	</div>

</div>