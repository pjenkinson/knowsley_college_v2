<?php
/**
* Template Name: Taster Booking
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


<article class="the-content" style="margin-top: 2em;">


<?php the_content();?>
<!-- Form
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php $firstName = $surname = $postCode = $telephoneNumber = $email = $interest1 = $interest2 = $interest3 = $interest4 = $interest5 = $interest6 = $interest7 = $interest8 = $interest9 = $interest10 = $attending = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["firstName"])) { 
	  $errors['firstName'] = "Missing";	 
	} else {$firstName = $_POST['firstName'];}

	if (empty($_POST["surname"])) { 
	  $errors['surname'] = "Missing";	 
	} else {$surname = $_POST['surname'];}

	if (empty($_POST["postCode"])) { 
	  $errors['postCode'] = "Missing";	 
	} else {$postCode = $_POST['postCode'];}

	if (empty($_POST["telephoneNumber"])) { 
	  $errors['telephoneNumber'] = "Missing";	 
	} else {$telephoneNumber = $_POST['telephoneNumber'];}

	if (empty($_POST["email"])) { 
	  $errors['email'] = "Missing";	 
	} else {$email = $_POST['email'];}

	if (empty($_POST["interest1"])) { 
	  $errors['interest1'] = "Missing";	 
	} else {$interest1 = $_POST['interest1'];}

	if (empty($_POST["interest2"])) { 
	  $errors['interest2'] = "Missing";	 
	} else {$interest2 = $_POST['interest2'];}

	if (empty($_POST["interest3"])) { 
	  $errors['interest3'] = "Missing";	 
	} else {$interest3 = $_POST['interest3'];}

	if (empty($_POST["interest4"])) { 
	  $errors['interest4'] = "Missing";	 
	} else {$interest4 = $_POST['interest4'];}

	if (empty($_POST["interest5"])) { 
	  $errors['interest5'] = "Missing";	 
	} else {$interest5 = $_POST['interest5'];}

	if (empty($_POST["interest6"])) { 
	  $errors['interest6'] = "Missing";	 
	} else {$interest6 = $_POST['interest6'];}

	if (empty($_POST["interest7"])) { 
	  $errors['interest7'] = "Missing";	 
	} else {$interest7 = $_POST['interest7'];}

	if (empty($_POST["interest8"])) { 
	  $errors['interest8'] = "Missing";	 
	} else {$interest8 = $_POST['interest8'];}

	if (empty($_POST["interest9"])) { 
	  $errors['interest9'] = "Missing";	 
	} else {$interest9 = $_POST['interest9'];}

	if (empty($_POST["interest10"])) { 
	  $errors['interest10'] = "Missing";	 
	} else {$interest10 = $_POST['interest10'];}

	if (empty($_POST["attending"])) { 
	  $errors['attending'] = "Missing";	 
	} else {$attending = $_POST['attending'];}

}


?>


<form class="app-form" method="POST" action="" data-parsley-validate>
	
	<fieldset>
	<label for="firstName"><span class="required-ast" style="color:#e64799;">*</span> First Name:</label>
	<input class="input-inline" type="text" name="firstName" required>
	<label for="surname"><span class="required-ast" style="color:#e64799;">*</span> Surname:</label>
	<input class="input-inline" type="text" name="surname" required>
	<label for="postCode"><span class="required-ast" style="color:#e64799;">*</span> Post code:</label><input class="input-inline"  name="postCode" maxlength="8" required/>
    <label for="telephoneNumber"><span class="required-ast" style="color:#e64799;">*</span> Telephone Number:</label>
    <input class="input-inline" type="text" name="telephoneNumber" required>
	<label for="email"><span class="required-ast" style="color:#e64799;">*</span> Email Address:</label>
	<input class="input-inline" type="text" name="email" required>
	<label for="interest"><span class="required-ast" style="color:#e64799;">*</span> I am interested in:</label>
	  <input type="checkbox" name="interest1" value="YES" style="width: 15px; margin: 10px;"><label style="clear:none; margin:0; width:50%; margin: 10px;">Hiring an apprentice</label>
	  <input type="checkbox" name="interest2" value="YES" style="width: 15px; margin: 10px;"><label style="clear:none; margin:0; width:50%; margin: 10px;">Offering work placement opportunities</label>
	  <input type="checkbox" name="interest3" value="YES" style="width: 15px; margin: 10px;"><label style="clear:none; margin:0; width:50%; margin: 10px;">Staff development and staff up skilling</label>
	  <input type="checkbox" name="interest4" value="YES" style="width: 15px; margin: 10px;"><label style="clear:none; margin:0; width:50%; margin: 10px;">Part time courses</label>
	  <input type="checkbox" name="interest5" value="YES" style="width: 15px; margin: 10px;"><label style="clear:none; margin:0; width:50%; margin: 10px;">Hiring the facilities</label>
	  <input type="checkbox" name="interest6" value="YES" style="width: 15px; margin: 10px;"><label style="clear:none; margin:0; width:50%; margin: 10px;">Assessor awards</label>
	  <input type="checkbox" name="interest7" value="YES" style="width: 15px; margin: 10px;"><label style="clear:none; margin:0; width:50%; margin: 10px;">Health and safety/ first aid</label>
	  <input type="checkbox" name="interest8" value="YES" style="width: 15px; margin: 10px;"><label style="clear:none; margin:0; width:50%; margin: 10px;">Gift tokens to use in salon</label>
	  <input type="checkbox" name="interest9" value="YES" style="width: 15px; margin: 10px;"><label style="clear:none; margin:0; width:50%; margin: 10px;">Day gifts</label>
	  <input type="checkbox" name="interest10" value="YES" style="width: 15px; margin: 10px;"><label style="clear:none; margin:0; width:50%; margin: 10px;">Leisure/Short courses</label>
	<label for="attending"><span class="required-ast" style="color:#e64799;">*</span> Attending:</label>
	<select class="select-inline" type="text" name="attending" required>
		<option value="YES">Yes</option>
		<option value="No">No</option>
	</select>

	</fieldset>

<input class="submit" type="submit" name="submit" value="Send form" style="clear:both; margin-bottom:1em;">

</form>

<?php 
  if (isset($_POST['submit'])) {

 $sql ="INSERT INTO `bookTaster`
			(
			`firstName`,
			`surname`,
			`postCode`,
			`telephoneNumber`,
			`email`,
			`interest1`,
			`interest2`,
			`interest3`,
			`interest4`,
			`interest5`,
			`interest6`,
			`interest7`,
			`interest8`,
			`interest9`,
			`interest10`,
			`attending`
			)
VALUES
			(
			'$firstName',
			'$surname',
			'$postCode',
			'$telephoneNumber',
			'$email',
			'$interest1',
			'$interest2',
			'$interest3',
			'$interest4',
			'$interest5',
			'$interest6',
			'$interest7',
			'$interest8',
			'$interest9',
			'$interest10',
			'$attending'
			)";

$wpdb->query($sql);?>

<?php 
$to = 'marketing@knowsleycollege.ac.uk';
$subject = 'Lee Stafford Employers Event';
$body = '<html><body>';
$body .= '<h2>Taster Booking: ' . '</h2>';
$body .= '<p>Name: ' . $firstName . '</p>' ;
$body .= '<p>Surname: ' . $surname . '</p>'  ;
$body .= '<p>Email: ' . $email . '</p>'  ;
$body .= '<p>Tel: ' . $telephoneNumber . '</p>'  ;
$body .= '<p>Attending: ' . $attending . '</p>'  ;
$body .= '</body></html>';
$headers = array('Content-Type: text/html; charset=UTF-8');
 
wp_mail( $to, $subject, $body, $headers );
?>

<script>
window.location = 'https://www.knowsleycollege.ac.uk/taster-day-confirmation/';
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