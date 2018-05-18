<?php
/**
* Template Name: Search Test Programme Area
*/

 if(isset($_GET['term'])) {
 $searchTerm = filter_var($_GET['term'], FILTER_SANITIZE_STRING);
     $sql = "SELECT programmearea, id
               FROM fact_sheets_live
              WHERE programmearea LIKE '%".$searchTerm."%'.
              LIMIT 20";
     $courses = $wpdb->get_results($sql);
     foreach ($courses as $courses) {
          $results[] = array('id' => $courses->id, 
                              'text' => $courses->programmearea
                              );
     }
     header('Content-Type: application/json');
     echo json_encode($results);
     exit;
} 
?>


