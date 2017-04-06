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
unset($phpmailer);
$studentEmail = 'pjenkinsonmail@gmail.com';
$body = 'bodyContent';

add_action( 'phpmailer_init', 'configure_smtp' );
function configure_smtp( PHPMailer $phpmailer ){
    $phpmailer = new PHPMailer( true );
    $phpmailer->CharSet = 'UTF-8';
    $phpmailer->IsHTML(true);
    $phpmailer->isSMTP(); //switch to smtp
    $phpmailer->Host = 'smtp.office365.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 587;
    $phpmailer->Username = 'applications@knowsleycollege.ac.uk';
    $phpmailer->Password = 'Kccapp123';
    $phpmailer->SMTPSecure = 'tls';
    $phpmailer->From = 'applications@knowsleycollege.ac.uk';
    $phpmailer->FromName = 'Knowsley Community College';
    $phpmailer->SMTPDebug = true;
    ob_start();
}
?>
<div id="message" class="updated fade"><p><strong><?php _e('Test Message Sent', 'wp_mail_smtp'); ?></strong></p>
<p><?php _e('The result was:', 'wp_mail_smtp'); ?></p>
<pre><?php var_dump($result); ?></pre>
<p><?php _e('The full debugging output is shown below:', 'wp_mail_smtp'); ?></p>
<pre><?php var_dump($phpmailer); ?></pre>
<p><?php _e('The SMTP debugging output is shown below:', 'wp_mail_smtp'); ?></p>
<pre><?php echo $smtp_debug ?></pre>
</div>

<?php 
 // Custom Email

ob_start();                      // start capturing output
include (locate_template('application-reply.php'));   // execute the file
$htmlcontent = ob_get_contents();    // get the contents from the buffer
ob_end_clean();  


// WP Mail
  $to = $studentEmail;
  $subject = 'Application to Knowlsey Community College';
  $body = $body;
  $headers = array('Content-Type: text/html; charset=UTF-8');

  // $headers = array('Content-Type: text/html; charset=UTF-8');
 
  wp_mail( $to, $subject, $body, $headers );

// Destroy $phpmailer so it doesn't cause issues later
    unset($phpmailer);

?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
