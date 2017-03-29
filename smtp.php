<?php
/* Template Name: SMTP Email
 * The template for displaying all pages.
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<h1><?php wp_title();?></h1>

			<p>test email</p>

<?php

add_action( 'phpmailer_init', 'configure_smtp' );
function configure_smtp( PHPMailer $phpmailer ){
    $phpmailer->isSMTP(); //switch to smtp
    $phpmailer->Host = 'smtp.office365.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 587;
    $phpmailer->Username = 'applications@knowsleycollege.ac.uk';
    $phpmailer->Password = 'Kccapp123';
    $phpmailer->SMTPSecure = 'tls';
    $phpmailer->From = 'applications@knowsleycollege.ac.uk';
    $phpmailer->FromName = 'Testing';
}


 // Custom Email

 $studentName = 'Paul';
 $CourseChoice1 = 'Course Choice 1';
 $CourseChoice1 = 'Course Choice 2';
 $CourseChoice1 = 'Course Choice 3';

 //$includehtmlcontent = include(locate_template('application-reply.php'));

ob_start();                      // start capturing output
include (locate_template('application-reply.php'));   // execute the file
$htmlcontent = ob_get_contents();    // get the contents from the buffer
ob_end_clean();  


// WP Mail
  $to = 'pjenkinson@knowsleycollege.ac.uk';
  $subject = 'The Subject';
  $body = '' . $htmlcontent;
  $headers = array('Content-Type: text/html; charset=UTF-8');

  // $headers = array('Content-Type: text/html; charset=UTF-8');
 
  wp_mail( $to, $subject, $body, $headers );

  if(!$phpmailer ->Send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $phpmailer->ErrorInfo;
    exit;
}

?>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
