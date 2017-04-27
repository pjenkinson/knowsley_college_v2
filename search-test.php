<?php
/**
* Template Name: Search Test
*/

 if(isset($_GET['term'])) {
 $searchTerm = filter_var($_GET['term'], FILTER_SANITIZE_STRING);
     $sql = "SELECT CONCAT (factsheetname, ' - ', level) as factsheetname, id
               FROM fact_sheets
              WHERE factsheetname LIKE '%".$searchTerm."%' OR programmearea LIKE '%".$searchTerm."%'
              LIMIT 20";
     $courses = $wpdb->get_results($sql);
     foreach ($courses as $courses) {
          $results[] = array('id' => $courses->id, 
                              'text' => $courses->factsheetname
                              );
     }
     header('Content-Type: application/json');
     echo json_encode($results);
     exit;
} 
?>


