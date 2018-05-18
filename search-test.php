<?php
/**
* Template Name: Search Test
*/

 if(isset($_GET['term'])) {
 $searchTerm = filter_var($_GET['term'], FILTER_SANITIZE_STRING);
     $sql = "SELECT CONCAT (factsheetname, ' - ', level) as factsheetname, id, course_url
               FROM fact_sheets_live
              WHERE factsheetname LIKE '%".$searchTerm."%' OR programmearea LIKE '%".$searchTerm."%'
              UNION
              SELECT CONCAT (factsheetname, ' - ', level) as factsheetname, id, course_url
              FROM fact_sheets_custom
              WHERE factsheetname LIKE '%".$searchTerm."%' OR programmearea LIKE '%".$searchTerm."%'
              LIMIT 20";
     $courses = $wpdb->get_results($sql);
     foreach ($courses as $courses) {
          $results[] = array('id' => $courses->id, 
                              'text' => $courses->factsheetname,
                              'url' => $courses->course_url
                              );
     }
     header('Content-Type: application/json');
     echo json_encode($results);
     exit;
} 
?>


