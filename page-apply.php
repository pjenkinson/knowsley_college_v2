<?php
/**
* Template Name: Apply Page
*/

if(!session_id()) {
	session_start();
}
get_header(); ?>

<!-- Scroll to top  -->
<?php get_template_part( 'navigation', 'scroll' );?>

<!-- pickadate.js
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<script>
jQuery( document ).ready(function() {
	jQuery('.datepicker').pickadate({
		labelMonthNext: 'Go to the next month',
  		labelMonthPrev: 'Go to the previous month',
  		labelMonthSelect: 'Pick a month from the dropdown',
  		labelYearSelect: 'Pick a year from the dropdown',
  		selectMonths: true,
  		showMonthsShort: true,
  		selectYears: 90,
  		format: 'yyyy-mm-dd',
  		formatSubmit: 'yyyy/mm/dd',
  		min: [1950,1,01],
  		max: [2022,12,31],
  		today: ''
	})
});
</script>

</header>

<!-- Breadcrumbs-->
<?php get_template_part( 'navigation', 'breadcrumbs' );?>


<!-- Main content-->
<main id="main" class="site-main" role="main">


<!-- Page content-->

<div class="full-width-container secondary-page">

	<div class="fixed-container">

<!-- Page content-->

<!-- Start of loop-->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>


<!-- Featured banner-->

<?php get_template_part( 'content', 'featured-banner-has-parent' );?>

<section class="application-form-section">



<?php if( get_field('tagline') ): ?>

<!-- Homepage tagline and intro paragraph-->

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
	  					  // Put apostrophe back in string
	  					  $textOutput = preg_replace_callback("/(&#39+;)/", function($m) { return mb_convert_encoding($m[1], "UTF-8", "HTML-ENTITIES"); }, $subValue);
	  					  $subValue = $textOutput;
	  				}
	  		} else {
	  	      $value = filter_var($value, FILTER_SANITIZE_STRING);
	  	      // Put apostrophe back in string
	  	      $textOutput = preg_replace_callback("/(&#39+;)/", function($m) { return mb_convert_encoding($m[1], "UTF-8", "HTML-ENTITIES"); }, $value);
	  		  $value = $textOutput;
	  	  }

	  	  $_SESSION['appform']['contents'][$key] = $value;
	  }
}

//Start displaying the pages
if($pageID == '1' || empty($pageID)) {
		$sql = "SELECT factsheetname AS name
         	    FROM fact_sheets_live
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


	  <?php get_template_part( 'apply/apply', 'steps1' );?>

	  <?php 
							$sql = "SELECT DISTINCT programmearea FROM fact_sheets_live";

							    $subjects = $wpdb->get_results($sql);
						?>

		<?php $sql = "SELECT EthnicGroupID, Description
         	   FROM EthnicGroup";

    $EthnicGroup = $wpdb->get_results($sql);?>

    <?php $sql = "SELECT DisabilityID, Description
         	   FROM Disability";

    $DisabilityType = $wpdb->get_results($sql);

    $allCourses = $wpdb->get_results($sql);

    $sql = "SELECT OfferingID, AcademicYearID, Name, factsheetname, level, id, CourseInformationID, qualification_type
         	   FROM Offering
         	   INNER JOIN fact_sheets_live
         	   On Offering.CourseInformationID=fact_sheets_live.id
         	   WHERE level = 'Level 1'
         	   ORDER BY level ASC";

    $level1Courses = $wpdb->get_results($sql);?>

     <?php $sql = "SELECT OfferingID, AcademicYearID, Name, factsheetname, level, id, CourseInformationID, qualification_type
         	   FROM Offering
         	   INNER JOIN fact_sheets_live
         	   On Offering.CourseInformationID=fact_sheets_live.id
         	   WHERE level = 'Level 2'
         	   ORDER BY level ASC";

    $level2Courses = $wpdb->get_results($sql);?>

    <?php $sql = "SELECT OfferingID, AcademicYearID, Name, factsheetname, level, id, CourseInformationID, qualification_type
         	   FROM Offering
         	   INNER JOIN fact_sheets_live
         	   On Offering.CourseInformationID=fact_sheets_live.id
         	   WHERE level = 'Level 3'
         	   ORDER BY level ASC";

    $level3Courses = $wpdb->get_results($sql);?>

    <?php $sql = "SELECT OfferingID, AcademicYearID, Name, factsheetname, level, id, CourseInformationID, qualification_type
         	   FROM Offering
         	   INNER JOIN fact_sheets_live
         	   On Offering.CourseInformationID=fact_sheets_live.id
         	   WHERE level = 'Level 4'
         	   ORDER BY level ASC";

    $level4Courses = $wpdb->get_results($sql);?>

    <?php $sql = "SELECT OfferingID, AcademicYearID, Name, factsheetname, level, id, CourseInformationID, qualification_type
         	   FROM Offering
         	   INNER JOIN fact_sheets_live
         	   On Offering.CourseInformationID=fact_sheets_live.id
         	   WHERE level = 'Level 5'
         	   ORDER BY level ASC";

    $level5Courses = $wpdb->get_results($sql);?>

    <?php $sql = "SELECT OfferingID, AcademicYearID, Name, factsheetname, level, id, CourseInformationID, qualification_type
         	   FROM Offering
         	   INNER JOIN fact_sheets_live
         	   On Offering.CourseInformationID=fact_sheets_live.id
         	   WHERE level = 'Entry Level 1' or level = 'Entry Level 2' or level = 'Entry 3'
         	   ORDER BY level ASC";

    $EntryLevelCourses = $wpdb->get_results($sql);?>


	  <form class="app-form" method="POST" action="/apply/adults/?courseid=<?=$CourseID?>&pageid=2" data-parsley-validate>

	  	<div class="the-content" style="margin-bottom: 1em;">
		 	
		  <P>Online applications are currently being taken for 2018 entry.</P>
		 </div>

	  				
			  <div class="the-content">

			  	<?php
					if(!empty($courses)) {
						?>
					  <p>You have selected the following courses to apply for,</p>

					  <ul>
					  	<li><?=$courses[0]->name?></li>
					 	</ul>
					 	<input type="hidden" name="Offering1" value="<?=$offeringid[0]->OfferingID?>" />
					 	<input type="hidden" name="AcademicYearID" value="18/19"/>

				 		<?php
				 	} else {
				 		?>


				 		<h3>Select your course choices</h3>
				 		<p>Please select a course from the drop-down menu. If you are interested in more than one course, please select more choices (Maximum of 3 courses per application)</p>

				 		<fieldset>

				 		<p>Which course/subject are you interested in studying?</p>	

				 		<div>
				 			<label class="course-choice" for="Offering1">Select your first choice course</label>
				 			<select class="select-inline" name="Offering1" required>
				 				  <option value="">Please Select</option>
				 				  <?php include( locate_template( 'course-select-options-adults-1.php', false, false ) );?> 

				 			</select>
				 		</div>
				 		<?php
				 	}
				 	?>
				 	<input type="hidden" name="AcademicYearID" value="18/19"/>
				 	<div>
				 		  <label class="course-choice" for="Offering2">Select your second choice course (Optional)</label>
				 			<select class="select-inline" name="Offering2">
				 				  <option value="">Please Select</option>
				 				  <?php include( locate_template( 'course-select-options-adults-2.php', false, false ) );?> 

				 			</select>
				 	</div>
				 	<div>
				 			<label class="course-choice" for="Offering3">Select your third choice course (Optional)</label>
				 			<select class="select-inline" name="Offering3">
				 					<option value="">Please Select</option>
				 					<?php include( locate_template( 'course-select-options-adults-3.php', false, false ) );?> 
				 			</select>
				 	</div>
				 </fieldset>
		 

		  <h3>Personal Details</h3>
	  
	  	<fieldset>

			  <label for="Surname">Surname:</label>
			  	<input class="input-inline" type="text" name="Surname" value="<?=$_SESSION['appform']['contents']['Surname']?>" required/>
			  <label for="FirstForename">First name:</label>
			  	<input class="input-inline" type="text" name="FirstForename" value="<?=$_SESSION['appform']['contents']['FirstForename']?>" required/>
			  <label for="Title">Title:</label>
			  	<input class="input-inline"  type="text" name="Title" value="<?=$_SESSION['appform']['contents']['Title']?>" />
			  <label for="DateOfBirth">Date of birth:</label>
			  <input class="datepicker" type="text" name="DateOfBirth" value="<?=$_SESSION['appform']['contents']['DateOfBirth']?>" required/>
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
			  	 <label for="Ethnicity">Ethnicity:</label>
  						<select class="select-inline" name="Ethnicity">
				 				  <option value="">Please Select</option>
				 					<?php
				 					foreach($EthnicGroup  AS $key => $value) {
				 							$storedValue = $_SESSION['appform']['contents']['Ethnicity'];
				 							if($storedValue == $value) {
				 								  $selected = 'selected';
				 							} else {
				 									$selected = '';
				 							}
				 						  ?>
				 						  <option value="<?=$value->EthnicGroupID?>" <?=$selected?>><?=$value->Description?></option>
				 						  <?php
				 					}
				 					?>
				 			</select>
			  <label for="Tel">Telephone:</label>
					<input class="input-inline" type="text" name="Tel" value="<?=$_SESSION['appform']['contents']['Tel']?>" required/>
			  <label for="MobileTel">Mobile:</label>
			  	<input class="input-inline" type="text" name="MobileTel" value="<?=$_SESSION['appform']['contents']['MobileTel']?>" />
			  <label for="Email">Email:</label>
			  	<input class="input-inline" type="email" data-parsley-type="email" name="Email" value="<?=$_SESSION['appform']['contents']['Email']?>" required/>

			 	</fieldset>
			 	<fieldset>

			  <label for="Address1">Address line 1</label><input class="input-inline" type="text" name="Address1" value="<?=$_SESSION['appform']['contents']['Address1']?>" />
			  <label for="Address2">Address line 2</label><input class="input-inline" type="text" name="Address2" value="<?=$_SESSION['appform']['contents']['Address2']?>" />
			  <label for="Address3">Address line 3</label><input class="input-inline" type="text" name="Address3" value="<?=$_SESSION['appform']['contents']['Address3']?>" />
			  <label for="Address4">Address line 4</label><input class="input-inline" type="text" name="Address4" value="<?=$_SESSION['appform']['contents']['Address4']?>" />
			  <label for="PostCodeOut">Post code</label><input class="input-inline postcodeout"  name="PostCodeOut" maxlength="4" value="<?=$_SESSION['appform']['contents']['PostCodeOut']?>" required/>
			  <input class="input-inline postcodein" name="PostCodein" maxlength="3" value="<?=$_SESSION['appform']['contents']['PostCodein']?>" required></input>
			  
			 </fieldset>

			 <h3>Interview support requirements</h3>

			 <p>If you have any support requirements for your interview, please provide us with details so we can assist you.</p>

			 <fieldset>

			  <label for="InterviewSupportRequirements">Interview Support Requirements:</label>
			  <textarea name="InterviewSupportRequirements"></textarea>
			  <?=$_SESSION['appform']['contents']['InterviewSupportRequirements']?>
			 	<label for="Disability">Disability Type:</label>
			 	<select class="select-inline" name="DisabilityType">
				 				  <option value="">Please Select</option>
				 					<?php
				 					foreach($DisabilityType  AS $key => $value) {
				 							$storedValue = $_SESSION['appform']['contents']['DisabilityType'];
				 							if($storedValue == $value) {
				 								  $selected = 'selected';
				 							} else {
				 									$selected = '';
				 							}
				 						  ?>
				 						  <option value="<?=$value->DisabilityID?>" <?=$selected?>><?=$value->Description?></option>
				 						  <?php
				 					}
				 					?>
				</select>

			 </fieldset>

			 <input class="submit" type="submit" name="submit" value="Next Step" style="clear:both;" />

	  </form>

</div>

	  <?php
} elseif($pageID == '2') {
	  ?>
	  
<?php get_template_part( 'apply/apply', 'steps2' );?>

<?php // Pull Schools ?>

<?php 
$sql = "SELECT OrganisationID, Name FROM Schools";

    $schools = $wpdb->get_results($sql);
?>
	
		<div class="the-content">

		<h3>Education</h3>

	  <form class="app-form" method="POST" action="/apply/adults/?courseid=<?=$courseID?>&pageid=3" >
	  	<fieldset>

	  	  <input type="hidden" name="courseid" value="<?=$courseID?>" />
			  
	  	    <div>
			  	<label for="LastSchool">Previous/Current Secondary School: </label>
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
			  </div>
			  <div><label for="Address1">Attended from:</label>
			  	<input class="input-inline datepicker" type="text" name="SchoolAttendedFrom" value="<?=$_SESSION['appform']['contents']['SchoolAttendedFrom']?>" />
			  </div>
			  <div>
			  	<label for="Address1">Attended to:</label><input class="input-inline datepicker" type="text" name="SchoolAttendedTo" value="<?=$_SESSION['appform']['contents']['SchoolAttendedTo']?>" />
			  </div>

			</fieldset>

			<button type="button"><a href="/apply/adults/?courseid=<?=$courseID?>&pageid=1">Back</a></button>
			<input class="submit" type="submit" name="submit" value="Next Step" />
			

	  </form>

		</div>

	  <?php
} elseif($pageID == '3') {
		?>

<?php get_template_part( 'apply/apply', 'steps3' );?>

<div class="the-content">

	  <h3>Qualifications</h3>

	  <p>If you have not yet taken your exams, please provide us with your predicted grades. Please include information on all qualifications. ie GCSE, NVQs, BTEC, Diplomas, A levels or any other subjects you may have studied.

Please enter the details of your prior qualifications, choosing from the drop-down lists below.</p>



	  <form class="app-form" method="POST" action="/apply/adults/?courseid=<?=$courseID?>&pageid=4" >
	  	<fieldset>
	  	  <input type="hidden" name="courseid" value="<?=$courseID?>" />

	  	  <script>
	  	  	jQuery(document).ready(function(){
	  	  		  jQuery('#new-quali-row').on('click', function(e) {
	  	  		  	  e.preventDefault();
	  	  		  		var newRow = jQuery('.quali-row').first().parent().html();

	  	  		  		console.log(newRow);

	  	  		  		jQuery('.quali-wrapper').wrap('<div/>').append(newRow);
	  	  		  		jQuery('.quali-wrapper').find('.hasDatepicker').removeAttr('id');
	  	  		  		jQuery('.quali-wrapper').find('.hasDatepicker').removeClass('hasDatepicker');

	  	  		  		bindDatePicker();

	  	  		  		return false;
	  	  		  });
	  	  	});

	  	  </script>

	  	  <?php // Pull Grades ?>

	  	  <?php 
$sql = "SELECT Grade FROM Grades";

    $grades = $wpdb->get_results($sql);
?>

	  	  <div class="quali-wrapper">
	  	  		<div>
			  	      <div class="quali-row" style="width: 100%;">
			  	      		<label>Qualification</label>
			  	      	  <select class="select-inline" name="qualification[]" style="width: 150px;">
			  	      	  	<optgroup label="Qualifications">Qualifications</option>
			  	      	  	  <?php get_template_part( 'options', 'qualifications' );?>
			  	      	  	 </optgroup>
			  	      	  </select>
			  	      	  <label>Qualification (if unlisted)</label>
			  	      	  <input class="input-inline" type="text" name="subject[]" />
			  	      	  <label>Grade</label>
			  	      	  <select class="select-inline" name="grade[]" style="width: 150px;">
			  	      	  	<optgroup label="grades">Grades</option>
			  	      	  	  <?php
													foreach($grades AS $key => $value) {
															$storedValue = $_SESSION['appform']['contents']['grade'];
															if($storedValue == $value) {
																  $selected = 'selected';
															} else {
																	$selected = '';
															}
														  ?>
														  <option value="<?=$value->Grade?>" <?=$selected?>><?=$value->Grade?></option>
														  <?php
													}
												?>
			  	      	  	  </optgroup>
			  	      	  </select>
			  	      	  <label>Date awarded</label>
			  	      	  <input class="input-inline datepicker" name="dateawarded[]" />
			  	      </div>
	  	      </div>
	  	  </div>
	  	 <button id="new-quali-row" class="new-qualification-row">Add Qualification</button>
			</fieldset>


			<button type="button"><a href="/apply/adults/?courseid=<?=$courseID?>&pageid=2">Back</a></button>
			<input class="submit" type="submit" name="submit" value="Next Step" />


	  </form>

		</div>

	  <?php


} elseif($pageID == '4') { ?>

<?php get_template_part( 'apply/apply', 'steps4' );?>

<div class="the-content">

<h3>Declaration </h3>
<p>Please take time to read through this declaration before proceeding.</p>
<p>I declare that to the best of my knowledge, the information given in this application is correct. Information provided on this form will be processed solely for the purpose of application to and enrolment on a course at the College.</p>

<form class="app-form" method="POST" action="/apply/adults/?courseid=<?=$courseID?>&pageid=5">
<fieldset>
<label class="declaration" for="declaration">I agree to the data protection declaration above. Ticking the box serves as your signature</label>
<input type="checkbox" name="StudentDeclaration" value="true" <?php

if($_SESSION['appform']['contents']['StudentDeclaration'] == 'true') {
	echo 'checked';
}

?>/>

<label class="marketing" for="SentMarketingInfo">Tick the box if you do NOT want to receive any marketing information from us</label>
<input type="checkbox" name="SentMarketingInfo" value="true" <?php

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

			<button type="button"><a href="/apply/adults/?courseid=<?=$courseID?>&pageid=3">Back</a></button>
			<input class="submit" type="submit" name="submit" value="Submit" />
</form>
</div>

 <?php   
} elseif($pageID == '5') { 

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
	include (locate_template('page-applyEmail.php')); 

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
		
		<h2>Thank you for submitting your application for Knowsley Community College.</h2>
 
		<p>You will soon be contacted by a member of the KCC team to invite you to an interview. If you have any questions in the meantime, please call our Learner Services Department on <a href="tel:01514775850">0151 477 5850</a>.</p>


	</div>

	<?php
}
?>




<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>

<!-- End of loop-->

	</section>

	</div>

</div>
</main><!-- #main -->
<?php get_footer(); ?>