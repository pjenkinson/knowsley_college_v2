<?php
/**
* Template Name: School Leavers Application Page
* @package knowsley_college
*/

if(!session_id()) {
	session_start();
}
get_header(); ?>

<!-- Scroll to top 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'scroll' );?>

<!-- jQuery datepicker 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<script>

jQuery( document ).ready(function() {

	bindDatePicker()

 });

function bindDatePicker() {
	jQuery( ".datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '1940:2020',
        dateFormat: 'yy-mm-dd'
    });
}
</script>

</header>

<!-- Breadcrumbs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php get_template_part( 'navigation', 'breadcrumbs' );?>


<!-- Main content
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<main id="main" class="site-main" role="main">


<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="full-width-container secondary-page">

	<div class="fixed-container">

<!-- Page content 
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- Start of loop
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>


<!-- Featured banner
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'content', 'featured-banner-has-parent' );?>

<section class="application-form-section">

<?php if( get_field('tagline') ): ?>

<!-- Homepage tagline and intro paragraph
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php get_template_part( 'acf', 'homepage-tagline' );?>

<?php endif; ?>

<?php

$courseID = filter_var($_GET['courseid'], FILTER_SANITIZE_NUMBER_INT);
$pageID   = filter_var($_GET['pageid'], FILTER_SANITIZE_NUMBER_INT);

//Process Form
if(!empty($_POST['submit'])) {
		//Add all form elements to the session
	  foreach($_POST AS $key => $value) {
	  		if(is_array($value)) {
	  				foreach($value AS $subKey => &$subValue) {
	  					  $subValue = filter_var($subValue, FILTER_SANITIZE_STRING);
	  				}
	  		} else {
	  	      $value = filter_var($value, FILTER_SANITIZE_STRING);
	  	  }

	  	  $_SESSION['appform']['contents'][$key] = $value;
	  }
}

//Start displaying the pages
if($pageID == '1' || empty($pageID)) {
		$sql = "SELECT factsheetname AS name
         	    FROM fact_sheets
             WHERE id = '".$courseID."'";

    $courses = $wpdb->get_results($sql);
	  ?>

	  <?php 
	  //Offering ID
	  $sql = "SELECT OfferingID
         	    FROM Offering
             WHERE CourseInformationID = '".$courseID."'";
    $offeringid = $wpdb->get_results($sql);
    ?>

	  <?php 
	  // Academic Year 
		$sql = "SELECT OfferingID, AcademicYearID, Name
         	    FROM Offering
             WHERE CourseInformationID IS NOT NULL";

    $offering = $wpdb->get_results($sql);?>



	  <?php 
							$sql = "SELECT DISTINCT programmearea FROM fact_sheets";

							    $subjects = $wpdb->get_results($sql);
						?>

		<?php $sql = "SELECT EthnicGroupID, Description
         	   FROM EthnicGroup";

    $EthnicGroup = $wpdb->get_results($sql);?>

    <?php $sql = "SELECT DisabilityID, Description
         	   FROM Disability";

    $DisabilityType = $wpdb->get_results($sql);?>

     <?php $sql = "SELECT OfferingID, AcademicYearID, Name, factsheetname, level, id, CourseInformationID
         	   FROM Offering
         	   INNER JOIN fact_sheets
         	   On Offering.CourseInformationID=fact_sheets.id
         	   ORDER BY factsheetname ASC";

    $allCourses = $wpdb->get_results($sql);?>


	  <form class="app-form" method="POST" action="/apply/?courseid=<?=$CourseID?>&pageid=2" data-parsley-validate>
	  		 <div class="the-content">

	  			<h2 class="section-heading">School Leavers Application Form</h2>

	  			<p>Online applications are currently being taken for 2018 entry.</p>

	  			<P>If you are still interested in joining us for this academic year, please call Learner Services on 0151 477 5850.</p>
			
			 

		<h3>Personal details</h3>
	  
	  	<fieldset>


	  		 <label for="FirstForename">First name:</label>
			  	<input class="input-inline" type="text" name="FirstForename" value="<?=$_SESSION['appform']['contents']['FirstForename']?>" required/>
			  <label for="Surname">Surname:</label>
			  	<input class="input-inline" type="text" name="Surname" value="<?=$_SESSION['appform']['contents']['Surname']?>" required/>

			  <label for="Sex">Gender:</label>
			  	<select class="select-inline" type="text" name="Sex" required>
  						<option value="male" <?php
  							if($_SESSION['appform']['contents']['Sex'] == 'male') {
  								echo 'selected';
  							}
  						?>>Male</option>
  						<option value="female" <?php
  							if($_SESSION['appform']['contents']['Sex'] == 'female') {
  								echo 'selected';
  							}
  						?>>Female</option>
			  	</select>
			  
			  <label for="DateOfBirth">Date of birth:</label>
			  <input class="input-inline datepicker" type="text" name="DateOfBirth" value="<?=$_SESSION['appform']['contents']['DateOfBirth']?>" required/>
			  
			  <label for="Address1">Address line 1</label><input class="input-inline" type="text" name="Address1" value="<?=$_SESSION['appform']['contents']['Address1']?>" />
			  <label for="Address2">Address line 2</label><input class="input-inline" type="text" name="Address2" value="<?=$_SESSION['appform']['contents']['Address2']?>" />
			  <label for="Address3">Address line 3</label><input class="input-inline" type="text" name="Address3" value="<?=$_SESSION['appform']['contents']['Address3']?>" />
			  <label for="Address4">Address line 4</label><input class="input-inline" type="text" name="Address4" value="<?=$_SESSION['appform']['contents']['Address4']?>" />
			  <label for="PostCodeOut">Post code</label><input class="input-inline postcodeout"  name="PostCodeOut" maxlength="4" value="<?=$_SESSION['appform']['contents']['PostCodeOut']?>" required/>
			  <input class="input-inline postcodein" name="PostCodein" maxlength="3" value="<?=$_SESSION['appform']['contents']['PostCodein']?>" required></input>


			  <label for="Tel">Telephone:</label>
					<input class="input-inline" type="text" name="Tel" value="<?=$_SESSION['appform']['contents']['Tel']?>" required/>
			  <label for="MobileTel">Mobile:</label>
			  	<input class="input-inline" type="text" name="MobileTel" value="<?=$_SESSION['appform']['contents']['MobileTel']?>" />
			  <label for="Email">Email:</label>
			  	<input class="input-inline" type="email" data-parsley-type="email" name="Email" value="<?=$_SESSION['appform']['contents']['Email']?>" required/>		 


<?php 
$sql = "SELECT OrganisationID, Name FROM Schools";

    $schools = $wpdb->get_results($sql);
?>

	  	  <input type="hidden" name="courseid" value="<?=$courseID?>" />
			  
	  	    <div>
			  	<label for="LastSchool">Name of your current school/college? </label>
			  	<select class="select-inline schoollist" type="text" name="LastSchool" required>
						<?php
													foreach($schools AS $key => $value) {
															$storedValue = $_SESSION['appform']['contents']['LastSchool'];
															if($storedValue == $value) {
																  $selected = 'selected';
															} else {
																	$selected = '';
															}
														  ?>
														  <option value="<?=$value->OrganisationID?>" <?=$selected?>><?=$value->Name?></option>
														  <?php
													}
												?>
			  	</select>

			  </fieldset>


			  <?php
					if(!empty($courses)) {
						?>
					  <p>You have selected the following courses to apply for,</p>

					  <ul>
					  	<li><?=$courses[0]->name?></li>
					 	</ul>
					 	<input type="hidden" name="Offering1" value="<?=$offeringid[0]->OfferingID?>" />
					 	<input type="hidden" name="AcademicYearID" value="17/18"/>

				 		<?php
				 	} else {
				 		?>

				 		<h3>Course choice</h3>
				 		
				 		<fieldset>

				 		<p>Which course/subject are you interested in studying?</p>	

				 		<div>
				 			<label class="course-choice" for="Offering1">Select your first choice course</label>
				 			<select name="Offering1" required>
				 				  <option value="">Please Select</option>
				 					<?php
				 					foreach($allCourses AS $key => $value) {
				 							$storedValue = $_SESSION['appform']['contents']['Offering1'];
				 							if($storedValue == $value) {
				 								  $selected = 'selected';
				 							} else {
				 									$selected = '';
				 							}
				 						  ?>
				 						  <option value="<?=$value->OfferingID?>" <?=$selected?>><?=$value->factsheetname?> - <?=$value->level?></option>
				 						  <?php
				 					}
				 					?>
				 			</select>
				 		</div>
				 		<?php
				 	}
				 	?>
				 	<input type="hidden" name="AcademicYearID" value="17/18"/>
				 	<div>
				 		  <label class="course-choice" for="Offering2">Select your second choice course (Optional)</label>
				 			<select name="Offering2">
				 				  <option value="">Please Select</option>
				 					<?php
				 					foreach($allCourses AS $key => $value) {
				 							$storedValue = $_SESSION['appform']['contents']['Offering2'];
				 							if($storedValue == $value) {
				 								  $selected = 'selected';
				 							} else {
				 									$selected = '';
				 							}
				 						  ?>
				 						  <option value="<?=$value->OfferingID?>" <?=$selected?>><?=$value->factsheetname?>  - <?=$value->level?></option>
				 						  <?php
				 					}
				 					?>
				 			</select>
				 	</div>
				 	<div>
				 			<label class="course-choice" for="Offering3">Select your third choice course (Optional)</label>
				 			<select name="Offering3">
				 					<option value="">Please Select</option>
				 					<?php
				 					foreach($allCourses AS $key => $value) {
				 							$storedValue = $_SESSION['appform']['contents']['Offering3'];
				 							if($storedValue == $value) {
				 								  $selected = 'selected';
				 							} else {
				 									$selected = '';
				 							}
				 						  ?>
				 						  <option value="<?=$value->OfferingID?>" <?=$selected?>><?=$value->factsheetname?> - <?=$value->level?></option>
				 						  <?php
				 					}
				 					?>
				 			</select>
				 	</div>
				 </fieldset>

			<h3>Marketing</h3>

			<fieldset>

<label class="marketing" for="SentMarketingInfo">Tick the box if you do NOT want to receive any marketing information from us</label>
<input class="input-inline" type="checkbox" name="SentMarketingInfo" value="true" <?php

if($_SESSION['appform']['contents']['SentMarketingInfo'] == 'true') {
	echo 'checked';
}

?>/>

<?php // Heard about the college ?>

<?php 
$sql = "SELECT HeardAboutCollegeID, Description
         	   FROM HeardAboutCollege";

    $HeardAboutCollege = $wpdb->get_results($sql);
?>

	<label class="feedback" for="HeardAboutCollegeID">How did you hear about KCC?</label>
	<select type="text" name="HeardAboutCollegeID">

	<?php
		foreach($HeardAboutCollege AS $key => $value) {
				$storedValue = $_SESSION['appform']['contents']['HeardAboutCollegeID'];
				if($storedValue == $value) {
					  $selected = 'selected';
				} else {
						$selected = '';
				}
			  ?>
			  <option value="<?=$value->HeardAboutCollegeID?>" <?=$selected?>><?=$value->Description?></option>
			  <?php
		}
	?>


		
	</select>

</fieldset>	 

<h3>Data Protection</h3>
<fieldset>
	<p>Please take time to read through this declaration before proceeding.</p>
<p>I declare that to the best of my knowledge, the information given in this application is correct. Information provided on this form will be processed solely for the purpose of application to and enrolment on a course at the College.</p>

	<label class="declaration" for="declaration">I agree to the data protection declaration above. Ticking the box serves as your signature</label>
<input class="input-inline" required type="checkbox" name="StudentDeclaration" value="true" <?php

if($_SESSION['appform']['contents']['StudentDeclaration'] == 'true') {
	echo 'checked';
}

?>/>
</fieldset>

			 <input class="submit" type="submit" name="submit" value="Next Step" />



	  </form>

</div>

	  <?php
} elseif($pageID == '2') {

	  ?>

	<?php

	$insertData = $_SESSION['appform']['contents'];

	$sql = "INSERT INTO `application_request`
										 (`RequestDate`, /* New */
										 	`Offering1ID`,
											`Offering2ID`,
											`Offering3ID`,
											`AcademicYearID`,
											`Title`,
											`FirstForename`,
											`Surname`,
											`DateOfBirth`,
											`Sex`,
											`EthnicGroupID`,
											`Tel`,
											`MobileTel`,
											`Email`,
											`Address1`,
											`Address2`,
											`Address3`,
											`Address4`,
											`PostCodeOut`,
											`PostCodein`,
											`InterviewSupportRequirements`,
											`DisabilityID`,
											`LastSchool`,
											`SchoolAttendedFrom`,
											`SchoolAttendedTo`,
											`StudentDeclaration`,
											`SentMarketingInfo`,
											`HeardAboutCollegeID`)
											VALUES
											(NOW(),
											'".$insertData['Offering1']."',
											'".$insertData['Offering2']."',
											'".$insertData['Offering3']."',
											'".$insertData['AcademicYearID']."',
											'".$insertData['Title']."',
											'".$insertData['FirstForename']."',
											'".$insertData['Surname']."',
											'".$insertData['DateOfBirth']."',
											'".$insertData['Sex']."',
											'".$insertData['Ethnicity']."',
											'".$insertData['Tel']."',
											'".$insertData['MobileTel']."',
											'".$insertData['Email']."',
											'".$insertData['Address1']."',
											'".$insertData['Address2']."',
											'".$insertData['Address3']."',
											'".$insertData['Address4']."',
											'".$insertData['PostCodeOut']."',
											'".$insertData['PostCodein']."',
											'".$insertData['InterviewSupportRequirements']."',
											'".$insertData['DisabilityType']."',
											'".$insertData['LastSchool']."',
											'".$insertData['SchoolAttendedFrom']."',
											'".$insertData['SchoolAttendedTo']."',
											'".$insertData['StudentDeclaration']."',
											'".$insertData['SentMarketingInfo']."',
											'".$insertData['HeardAboutCollegeID']."' 
											)";

	$wpdb->query($sql);

	//get_template_part( 'page', 'applyEmail' );
	//include (locate_template('page-applyEmail.php')); 

	$applicationID = $wpdb->insert_id;

	for ($i=0; $i < count($insertData['qualification']); $i++) { 
			$sql ="INSERT INTO `applications_qualifications`
												(`application_id`,
											  `qualification`,
												`subject`,
												`grade`,
												`dateawarded`)
												VALUES
												('".$applicationID."',
												'".$insertData['qualification'][$i]."',
												'".$insertData['subject'][$i]."',
												'".$insertData['grade'][$i]."',
												'".$insertData['dateawarded'][$i]."')";

			$wpdb->query($sql);
	}

	// Insert runs again to backup data

	$insertDataBackup = $_SESSION['appform']['contents'];

	$sql = "INSERT INTO `application_request_backup`
										 (`RequestDate`, /* New */
										 	`Offering1ID`,
											`Offering2ID`,
											`Offering3ID`,
											`AcademicYearID`,
											`Title`,
											`FirstForename`,
											`Surname`,
											`DateOfBirth`,
											`Sex`,
											`EthnicGroupID`,
											`Tel`,
											`MobileTel`,
											`Email`,
											`Address1`,
											`Address2`,
											`Address3`,
											`Address4`,
											`PostCodeOut`,
											`PostCodein`,
											`InterviewSupportRequirements`,
											`DisabilityID`,
											`LastSchool`,
											`SchoolAttendedFrom`,
											`SchoolAttendedTo`,
											`StudentDeclaration`,
											`SentMarketingInfo`,
											`HeardAboutCollegeID`)
											VALUES
											(NOW(),
											'".$insertData['Offering1']."',
											'".$insertData['Offering2']."',
											'".$insertData['Offering3']."',
											'".$insertData['AcademicYearID']."',
											'".$insertData['Title']."',
											'".$insertData['FirstForename']."',
											'".$insertData['Surname']."',
											'".$insertData['DateOfBirth']."',
											'".$insertData['Sex']."',
											'".$insertData['Ethnicity']."',
											'".$insertData['Tel']."',
											'".$insertData['MobileTel']."',
											'".$insertData['Email']."',
											'".$insertData['Address1']."',
											'".$insertData['Address2']."',
											'".$insertData['Address3']."',
											'".$insertData['Address4']."',
											'".$insertData['PostCodeOut']."',
											'".$insertData['PostCodein']."',
											'".$insertData['InterviewSupportRequirements']."',
											'".$insertData['DisabilityType']."',
											'".$insertData['LastSchool']."',
											'".$insertData['SchoolAttendedFrom']."',
											'".$insertData['SchoolAttendedTo']."',
											'".$insertData['StudentDeclaration']."',
											'".$insertData['SentMarketingInfo']."',
											'".$insertData['HeardAboutCollegeID']."' 
											)";

	$wpdb->query($sql);

	$applicationIDBackup = $wpdb->insert_id;

	for ($i=0; $i < count($insertData['qualification']); $i++) { 
			$sql ="INSERT INTO `applications_qualifications_backup`
												(`application_id`,
											  `qualification`,
												`subject`,
												`grade`,
												`dateawarded`)
												VALUES
												('".$applicationID."',
												'".$insertData['qualification'][$i]."',
												'".$insertData['subject'][$i]."',
												'".$insertData['grade'][$i]."',
												'".$insertData['dateawarded'][$i]."')";

			$wpdb->query($sql);
	}

	// Browser Info

	$insertBrowserInfo = $_SESSION['appform']['contents'];

	$sql = "INSERT INTO `application_browser_info`
										 (`RequestDate`, 
											`FirstForename`,
											`Surname`,
											`Browser`
											)
											VALUES
											(NOW(),
											'".$insertData['FirstForename']."',
											'".$insertData['Surname']."',
											'".$_SERVER['HTTP_USER_AGENT']."'
											)";

	$wpdb->query($sql);

	
	?>

	<?php session_unset();
	session_destroy();
	?>
	<div class="the-content">
		<h1>Thank you for your application</h1>
		<p>You will soon be contacted by a member of the KCC team to invite you to an interview. If you have any questions in the meantime, please call our Learner Services Department on <a href="tel:01514775850">0151 477 5850</a>.</p>
	</div>
	<?php
}
?>




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