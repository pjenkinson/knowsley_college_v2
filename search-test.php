<?php
/**
* Template Name: Search Test
*/

 if(isset($_GET['term'])) {
 $searchTerm = filter_var($_GET['term'], FILTER_SANITIZE_STRING);
     $sql = "SELECT id, factsheetname, level
               FROM fact_sheets
              WHERE factsheetname LIKE '%".$searchTerm."%'
              LIMIT 20";
     $courses = $wpdb->get_results($sql);
     foreach ($courses as $courses) {
          $results[] = array('id' => $courses->id, 
                              'text' => $courses->factsheetname,
                              'level' => $courses->level 
                              );
     }
     header('Content-Type: application/json');
     echo json_encode($results);
     exit;
} 
?>


