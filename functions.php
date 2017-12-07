<?php
/*
 * knowsley_college functions and definitions
 *
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'knowsley_college_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function knowsley_college_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on knowsley_college, use a find and replace
	 * to change 'knowsley_college' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'knowsley_college', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 add_theme_support( 'title-tag' );
	 */
	
// Removes the white spaces from wp_title
function af_titledespacer($title) {
	return trim($title);
}

add_filter('wp_title', 'af_titledespacer');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );
	// This theme uses wp_nav_menu() in one location.
	function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Primary Menu' ),
      'about-menu' => __( 'About Menu' ),
      'school-leavers-a-levels' => __( 'A Levels' ),
      'alumni-menu' => __( 'Alumni Menu' ),
      'about-student-support-menu' => __( 'About Student Support' ),
      'about-services' => __( 'Services' ),
      'about-partners' => __( 'Partners' ),
      'higher-education' => __( 'Higher Education' ),
      '16-19' => __( '16-19' ),
      '16-19-subject' => __( '16-19 - Courses' ),
      'adult-subject' => __( 'Adult - Courses' ),
      'adults-2018' => __( 'Adults 2018' ),
      'apprenticeships' => __( 'Apprenticeships' ),
      'eduroam' => __( 'Eduroam' ),
      'employers' => __( 'Employers' ),
      'employers-training' => __( 'Employers Training' ),
      'employers-case-studies' => __( 'Employers Case Studies' ),
      'adults-gcse' => __( 'Adult GCSE' ),
      'adults' => __( 'Adults' ),
      'contact' => __( 'Contact' ),
      'external-access' => __( 'External Access' ),
      'governors' => __( 'governors' ),
      'vacancies' => __( 'vacancies' ),
      'workworld' => __( 'workworld' ),
      'campus' => __( 'campus' ),
      'policies' => __( 'policies' ),
      'nla' => __( 'Northern Logistics Academy' ),
      'leisure-courses' => __( 'Leisure Courses' ),
      'employers-courses' => __( 'Employers Courses' ),
      'supported-learning' => __( 'Supported Learning' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'knowsley_college_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // knowsley_college_setup
add_action( 'after_setup_theme', 'knowsley_college_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function knowsley_college_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'knowsley_college' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'knowsley_college_widgets_init' );
 
/**
 * Enqueue scripts and styles.
 */
function knowsley_college_scripts() {
	wp_enqueue_style(
	'knowsley_college-style', // handle name
    get_stylesheet_uri() , // the URL of the stylesheet
    array(), // an array of dependent styles
    '1', // version number
    'screen, print' // CSS media type
    );

	wp_enqueue_script('jquery-ui-autocomplete');

	wp_enqueue_script('jquery-ui-accordion');

	wp_enqueue_script( 'js_cookie', get_template_directory_uri() . '/inc/js.cookie.js', array(), '201401131', true );

	wp_enqueue_script( 'knowsley_college-skip-link-focus-fix', get_template_directory_uri() . '/inc/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/inc/matchHeight/matchHeight.min.js', array(), '20140116', true );

	wp_enqueue_script( 'jquery_collapse', get_template_directory_uri() . '/inc/jquery.collapse.js', array(), '20130318', true );

	wp_enqueue_script( 'knowsley_college-scrollup', get_template_directory_uri() . '/inc/scrollup/scrollUp.min.js', array('jquery'), '20130116', true );

	wp_enqueue_style( 'flickity_style', get_template_directory_uri() . '/inc/flickity/flickity.css' );
	wp_enqueue_script( 'flickity_carousel', get_template_directory_uri() . '/inc/flickity/flickity.js', array('jquery'), '2013023556', true );

	wp_enqueue_style( 'time_picker_style', get_template_directory_uri() . '/inc/jquery.timepicker.css' );
	wp_enqueue_script( 'time_picker', get_template_directory_uri() . '/inc/jquery.timepicker.min.js', array('jquery'), '2013024556', true );

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/inc/modernizr-svgasimg.js', array('jquery'), '2013024576', true );

	wp_enqueue_style( 'select-style', get_template_directory_uri() . '/inc/select2/style.css' );

	wp_enqueue_script( 'select2-script', get_template_directory_uri() . '/inc/select2/select2.js', array('jquery'), '20130216', true );

	if (is_single('') )
		{
	wp_enqueue_script( 'jquery-lazy', get_template_directory_uri() . '/inc/lazy/jquery.lazy.min.js', array('jquery'), '20130222', true );
		}

	if (is_page_template('page-apply-school-leavers.php' || 'page-apply.php' || 'facilities-enquiry.php' || 'prospectus-form.php') )
		{
	wp_enqueue_script( 'picker', get_template_directory_uri() . '/inc/pickadate/picker.js', array('jquery'), '20130276', true );
	wp_enqueue_script( 'picker-date', get_template_directory_uri() . '/inc/pickadate/picker.date.js', array('jquery'), '20130277', true );
	wp_enqueue_script( 'picker-legacy', get_template_directory_uri() . '/inc/pickadate/legacy.js', array('jquery'), '20130278', true );

    // Parsley (Form Validation)
	wp_enqueue_script( 'parsley', get_template_directory_uri() . '/inc/parsley/parsley.min.js', array(), '20130118', true );


	wp_enqueue_style( 'picker-default-style', get_template_directory_uri() . '/inc/pickadate/themes/default.css' );
	wp_enqueue_style( 'picker-default-date-style', get_template_directory_uri() . '/inc/pickadate/themes/default.date.css' );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'knowsley_college_scripts' ); 

/* CONDITIONAL SCRIPTS */

/* Select 2 Static Homepage Live Search */

function conditional_script_home_livesearch() {
    if (is_front_page())
		{
				wp_enqueue_script( 'select2-home-livesearch', get_template_directory_uri() . '/inc/select2/select2-home-livesearch.js', array('jquery'), '20130219', true );
    } 
}
add_action('wp_enqueue_scripts', 'conditional_script_home_livesearch');

/* Responsive tables with stackable */

function conditional_script_livesearch_advanced() {
    if (is_page_template('page-search.php') || is_search() || is_page_template('factsheet.php') )
		{
				wp_enqueue_script( 'stacktable', get_template_directory_uri() . '/inc/stacktable/stacktable.js', array('jquery'), '20134219', true );
				wp_enqueue_style( 'stacktable-style', get_template_directory_uri() . '/inc/stacktable/style.css' );
    } 
}
add_action('wp_enqueue_scripts', 'conditional_script_livesearch_advanced');

/* Hover Effects */

function conditional_script_loading_he_hover () {
    wp_enqueue_script( 'knowsley_college-he-hover', get_template_directory_uri() . '/inc/hover-effects.js', array('jquery'), '20130119', true );
}
add_action('wp_enqueue_scripts', 'conditional_script_loading_he_hover');

function conditional_script_loading_factsheet() {
    if ( is_page_template('factsheet.php') ){
        wp_enqueue_script( 'jquery-ui-tabs', array( 'jquery' ));
    } 
}
add_action('wp_enqueue_scripts', 'conditional_script_loading_factsheet');

/* Mega Menu UI */

function conditional_script_mega_menu_ui() {
    if (is_page_template('flexible-content-page.php') || is_archive() || is_page_template('flexible-course-page.php') || is_page_template('flexible-content-page-eventbrite.php') || is_page_template('flexible-course-page-sport-pub.php') || is_page_template('flexible-course-page-school-leavers-2.php') || is_page_template('flexible-course-page-adult.php') || is_page_template('flexible-course-page-adult-sport-pub.php') || is_page_template('flexible-course-page-adult-access.php') || is_page_template('flexible-course-page-higher-education.php') || is_page_template('facilities-enquiry.php')  ) {
        wp_enqueue_script( 'mega_menu_ui', get_template_directory_uri() . '/inc/mega-menu-ui.js', array('jquery'), '1000000', true );
    } 
}
add_action('wp_enqueue_scripts', 'conditional_script_mega_menu_ui');

function conditional_script_content_page() {
    if (is_page_template('flexible-content-page.php') || is_page_template('flexible-homepage.php') )
		{
        wp_enqueue_script( 'accordion-ui-pages', get_template_directory_uri() . '/inc/accordion-ui-pages.js', array('jquery'), '14587987', false );
    } 
}
add_action('wp_enqueue_scripts', 'conditional_script_content_page');


/**
 * Add support for custom single news post
 */
 
function get_custom_post_template($single_news_post) {
     global $post;
 
       if ( in_category( array( 'news' ) )) {
          $single_template = dirname( __FILE__ ) . '/single-news.php';
     }
     return $single_news_post;
}
 
add_filter( "single_news_post", "get_custom_post_template" ) ;


/**
 * Add support for text excerpt word limited
 */

function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}

// ACF Options Pages (Global posts)

if( function_exists('acf_add_options_sub_page') ) {
	
	acf_add_options_sub_page('Homepage');
	acf_add_options_sub_page('Global');
	acf_add_options_sub_page('Footer');
	acf_add_options_sub_page('Factsheets');
	
}

// Shortcodes 

// Quote

function quote( $atts, $content = null ) {
    return '<div class="quote-box">
	<p><i class="fa fa-quote-left"></i>'.$content.'<i class="fa fa-quote-right"></i></p>
</div>';
}

add_shortcode("quote", "quote");

// HTML5 Form Search Support

add_theme_support( 'html5', array( 'search-form' ) );

// Gallery category support 

/**
* separate media categories from post categories
* use a custom category called 'category_media' for the categories in the media library
*/
add_filter( 'wpmediacategory_taxonomy', function(){ return 'category_media'; } ); //requires PHP 5.3 or newer

/**
* Removes emoji support
*/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Remove p tag from images

function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

// Hide password protected posts 

function wpb_password_post_filter( $where = '' ) {
    if (!is_single() && !is_admin()) {
        $where .= " AND post_password = ''";
    }
    return $where;
}
add_filter( 'posts_where', 'wpb_password_post_filter' );

/**
 * Add support for featured thumbnails in posts.
 */

add_theme_support( 'post-thumbnails' ); 

// define the wp_mail_failed callback 
function action_wp_mail_failed($wp_error) 
{
    return error_log(print_r($wp_error, true));
}
          
// add the action 
add_action('wp_mail_failed', 'action_wp_mail_failed', 10, 1);