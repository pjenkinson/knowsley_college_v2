<?php
    
 // Capture output of echo into variables
 $studentName = $CourseChoice1 = $CourseChoice2 = $CourseChoice3 = $studentEmail = "";

  ob_start();
  echo $insertData['FirstForename'];
  $studentName = ob_get_clean();

  ob_start();
  echo $insertData['Offering1'];
  $courseChoice1 = ob_get_clean();

  ob_start();
  echo $insertData['Offering2'];
  $courseChoice2 = ob_get_clean();

  ob_start();
  echo $insertData['Offering3'];
  $courseChoice3 = ob_get_clean();

  ob_start();
  echo $insertData['Email'];
  $studentEmail = ob_get_clean();

  // Query to get Factsheet Name from Offering ID

  // Course Choice 1

    $sql = "SELECT factsheetname, OfferingID
            FROM fact_sheets
            INNER JOIN Offering
            On fact_sheets.id=Offering.CourseInformationID
            WHERE OfferingID = $courseChoice1";

    $CourseNameFromID1 = $wpdb->get_results($sql);
 
    $courseChoice1 = $CourseNameFromID1[0]->factsheetname;

  // Course Choice 2

    $sql = "SELECT factsheetname, OfferingID
            FROM fact_sheets
            INNER JOIN Offering
            On fact_sheets.id=Offering.CourseInformationID
            WHERE OfferingID = $courseChoice2";

    $CourseNameFromID2 = $wpdb->get_results($sql);
 
    $courseChoice2 = $CourseNameFromID2[0]->factsheetname;


  // Course Choice 3

    $sql = "SELECT factsheetname, OfferingID
            FROM fact_sheets
            INNER JOIN Offering
            On fact_sheets.id=Offering.CourseInformationID
            WHERE OfferingID = $courseChoice3";

    $CourseNameFromID3 = $wpdb->get_results($sql);
 
    $courseChoice3 = $CourseNameFromID3[0]->factsheetname;


  // Course Choice 3

add_action( 'phpmailer_init', 'configure_smtp' );
function configure_smtp( PHPMailer $phpmailer ){
    $phpmailer = new PHPMailer( true );
    $phpmailer->CharSet = 'UTF-8';
    $phpmailer->isSMTP(); //switch to smtp
    $phpmailer->Host = 'smtp.office365.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 587;
    $phpmailer->Username = 'applications@knowsleycollege.ac.uk';
    $phpmailer->Password = 'Kccapp123';
    $phpmailer->SMTPSecure = 'tls';
    $phpmailer->From = 'applications@knowsleycollege.ac.uk';
    $phpmailer->FromName = 'Knowsley Community College';
}



ob_start();                      // start capturing output
include (locate_template('application-reply.php'));   // execute the file
$htmlcontent = ob_get_contents();    // get the contents from the buffer
ob_end_clean();  


// WP Mail
  $to = $studentEmail;
  $subject = 'Application to Knowlsey Community College';
  $body = $htmlcontent;
  $headers = array('Content-Type: text/html; charset=UTF-8'); 
  wp_mail( $to, $subject, $body, $headers );

  unset($phpmailer);
?>