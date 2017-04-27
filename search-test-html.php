<?php
/**
* Template Name: Search Test HTML
*/

 if(isset($_GET['term'])) {
 $searchTerm = filter_var($_GET['term'], FILTER_SANITIZE_STRING);
     $sql = "SELECT programmearea, id, factsheetname, level, location, duration FROM fact_sheets
              WHERE factsheetname LIKE '%".$searchTerm."%' OR programmearea LIKE '%".$searchTerm."%'
              LIMIT 20";
     $courses = $wpdb->get_results($sql);
     foreach ($courses as $courses) {
          $results[] = array('id' => $courses->id, 
                              'text' => $courses->factsheetname,
                              'level' => $courses->level,
                              'duration' => $courses->duration,
                              'location' => $courses->location
                              );
     }
     header('Content-Type: application/json');

     // echo json_encode($results);

     // exit;
} 

?>

<div>

   <table>
  <caption>We have found the following courses from your search term ""</caption>
  <colgroup />
  <colgroup span="2" title="title" />
  <thead>
    <tr>
      <th scope="col">Course Title</th>
      <th scope="col">Level</th>
      <th scope="col">Campus</th>
      <th scope="col">Duration</th>
      <th scope="col">Apply</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <td colspan="2">Call us on 0000 000 000</td>
      <td colspan="3">We can provide advice on courses, finance and student support.</td>
    </tr>
  </tfoot>
 
  <tbody> 
  
<?php

if(!is_null($results)) {
  foreach($results as $value) {
    ?>
      <tr>
      <td><?=$value['text']?></td>
      <td><?=$value['level']?></td>
      <td><?=$value['location']?></td>
      <td><?=$value['duration']?></td>
      <td><a href="/course-finder/factsheet/?factsheet=<?=$value['id']?>">Apply Now</a></td>
      </tr>
    <?php
  }
}
?>
    
  </tbody>
</table>


</div>


