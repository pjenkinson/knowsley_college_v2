<?php
/**
* Template Name: Prospectus Form
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
<?php get_template_part( 'branding-flex' );?>


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="full-width-container secondary-page">

	<div class="full-width-container">


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- Start of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->


<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner-has-parent' );?>

<div class="fixed-container">

<aside>
<!-- Secondary Navigation
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'flex-secondary' );?>
</aside>

<section>


<article class="the-content">

<?php the_content();?>


<!-- Form
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php $firstName = $surname = $address1 = $address2 = $address3 = $address4 = $postCode = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["firstName"])) { 
	  $errors['firstName'] = "Missing";	 
	} else {$firstName = $_POST['firstName'];}

	if (empty($_POST["surname"])) { 
	  $errors['surname'] = "Missing";	 
	} else {$surname = $_POST['surname'];}

	if (empty($_POST["address1"])) { 
	  $errors['address1'] = "Missing";	 
	} else {$address1 = $_POST['address1'];}

	if (empty($_POST["address2"])) { 
	  $errors['address2'] = "Missing";	 
	} else {$address2 = $_POST['address2'];}

	if (empty($_POST["address3"])) { 
	  $errors['address3'] = "Missing";	 
	} else {$address3 = $_POST['address3'];}

	if (empty($_POST["address4"])) { 
	  $errors['address4'] = "Missing";	 
	} else {$address4 = $_POST['address4'];}

	if (empty($_POST["postCode"])) { 
	  $errors['postCode'] = "Missing";	 
	} else {$postCode = $_POST['postCode'];}

	if (empty($_POST["email"])) { 
	  $errors['email'] = "Missing";	 
	} else {$email = $_POST['email'];}

}


?>
 


<form class="app-form" method="POST" action="" data-parsley-validate>
	
	<h3>Request a prospectus</h3>
	<fieldset>
	<label for="firstName"><span class="required-ast" style="color:#e64799;">*</span> First name:</label>
	<input class="input-inline" type="text" name="firstName" required>
	<label for="surname"><span class="required-ast" style="color:#e64799;">*</span> Surname:</label>
	<input class="input-inline" type="text" name="surname" required>
	<label for="address1"><span class="required-ast" style="color:#e64799;">*</span> Address line 1</label><input class="input-inline" type="text" name="address1" required/>
	<label for="address2">Address line 2</label><input class="input-inline" type="text" name="address2"/>
	<label for="address3">Address line 3</label><input class="input-inline" type="text" name="address3"/>
	<label for="address4">Address line 4</label><input class="input-inline" type="text" name="address4"/>
	<label for="postCode"><span class="required-ast" style="color:#e64799;">*</span> Post code:</label><input class="input-inline"  name="postCode" maxlength="8" required/>
	<label for="email"><span class="required-ast" style="color:#e64799;">*</span> Email address:</label>
	<input class="input-inline" type="text" name="email" required>

	</fieldset>

<input class="submit" type="submit" name="submit" value="Send form" style="clear:both; margin-bottom:1em;">

</form>

<!-- Flexible Content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->




<?php get_template_part( 'custom-fields/acf', 'content-flex' );?>


<?php 
  if (isset($_POST['submit'])) {

 $sql ="INSERT INTO `prospectusForm`
			(
			`enquiryDate`,
			`firstName`,
			`surname`,
			`address1`,
			`address2`,
			`address3`,
			`address4`,
			`postCode`,
			`email`
			)
VALUES
			(NOW(),
			'$firstName',
			'$surname',
			'$address1',
			'$address2',
			'$address3',
			'$address4',
			'$postCode',
			'$email'
			)";

$wpdb->query($sql);?>

<?php

// Email to Staff
  $to = 'anash@knowsleycollege.ac.uk';
  $subject = 'KCC prosepctus request';
  $body .= '<html><body>';
  $body .= '<h2>KCC Prospectus Request</h2>';
  $body .= '<p>First name: ' . $firstName . '</p>'  ;
  $body .= '<p>Surname: ' . $surname . '</p>'  ;
  $body .= '<p>Email: ' . $email . '</p>'  ;
  $body .= '<p>Address: ' . $address1 . ',' .  $address2 . ',' . $address3 . ',' . $address4 . '</p>' ;
  $body .= '<p>Postcode: ' . $postCode . '</p>'  ;
  $body .= '</body></html>';
  $headers = array('Content-Type: text/html; charset=UTF-8'); 
  $headers[]  = 'From:' . $firstName . ' ' . $surname . '<applications@knowsleycollege.ac.uk>';
  $headers[]  = 'Reply-To:' . $firstName . ' ' . $surname . '<'.$email.'>';
  wp_mail( $to, $subject, $body, $headers );

  unset($to, $subject, $body, $headers ); 

?>



<?php 
// Email to user
$to = $email;
$subject = 'KCC prospectus request';
$body .= '<html><body>';
$body .= '<h1>KCC prospectus request</h1>';
$body .= '<p>Hi ' . $firstName . ', thank you for your prospectus request. We will send you a School Leavers Prospectus 2018 in the post. While you are waiting, why not <a href="https://www.knowsleycollege.ac.uk/about/prospectus/" title="KCC School Leavers Prospectus 2018">view the prospectus online</a>.</p>' ;
$body .= '</body></html>';
$headers = array('Content-Type: text/html; charset=UTF-8'); 
$headers[]   = 'Reply-To: KCC prospectus request <anash@knowsleycollege.ac.uk>';
$headers[] = 'From: KCC prospectus request <applications@knowsleycollege.ac.uk>';
wp_mail( $to, $subject, $body, $headers );
?>

<script>
window.location = 'https://www.knowsleycollege.ac.uk/about/services/facility-hire/form-confirmation/';
</script>
<?php

} ?>

<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>

<!-- End of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	
	</section>

	</div>

</div>





</main><!-- #main -->
<?php get_footer(); ?>