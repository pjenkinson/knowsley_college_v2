<?php 

if(isset($_GET['term'])) {
 $searchTerm = filter_var($_GET['term'], FILTER_SANITIZE_STRING);

     $sql = "SELECT id, factsheetname as name
               FROM fact_sheets_live
              WHERE factsheetname LIKE '%".$searchTerm."%'
              LIMIT 20";

     $courses = $wpdb->get_results($sql);

     foreach ($courses as $courses) {
          $results[] = array('id' => $courses->id, 
                              'label' => $courses->name, 
                              'value' => $courses->name);
     }

     echo json_encode($results);

     exit;
} 

?>