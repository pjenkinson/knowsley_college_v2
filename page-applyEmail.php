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
    $phpmailer->FromName = 'Knowsley Community College';
}

 // Custom Email

$studentEmail = 'pjenkinson@knowsleycollege.ac.uk';
$body = 'bodyContent';

ob_start();                      // start capturing output
include (locate_template('application-reply.php'));   // execute the file
$htmlcontent = ob_get_contents();    // get the contents from the buffer
ob_end_clean();  


// WP Mail
  $to = $studentEmail;
  $subject = 'Application to Knowlsey Community College';
  $body = $htmlcontent;
  $headers = array('Content-Type: text/html; charset=UTF-8');

  // $headers = array('Content-Type: text/html; charset=UTF-8');
 
  wp_mail( $to, $subject, $body, $headers );

/*


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
    $phpmailer->FromName = 'Knowsley Community College';
}

/*
 // Custom Email

  // Capture output of echo into variables

  ob_start();
  echo $insertData['FirstForename'];
  $studentName = ob_get_clean();

  ob_start();
  echo $insertData['Offering1'];
  $CourseChoice1 = ob_get_clean();

  ob_start();
  echo $insertData['Offering2'];
  $CourseChoice2 = ob_get_clean();

  ob_start();
  echo $insertData['Offering3'];
  $CourseChoice3 = ob_get_clean();

  ob_start();
  echo $insertData['Email'];
  $studentEmail = ob_get_clean();

 //$includehtmlcontent = include(locate_template('application-reply.php'));

ob_start();                      // start capturing output
include (locate_template('application-reply.php'));   // execute the file
$htmlcontent = ob_get_contents();    // get the contents from the buffer
ob_end_clean();  



$studentEmail = 'pjenkinson@knowsleycollege.ac.uk';
$body = 'bodyContent';

// WP Mail
  $to = $studentEmail;
  $subject = 'Application to Knowlsey Community College';
  $body = '' . $htmlcontent;
  $headers = array('Content-Type: text/html; charset=UTF-8');

  // $headers = array('Content-Type: text/html; charset=UTF-8');
 
  wp_mail( $to, $subject, $body, $headers );


?>
*/
?>