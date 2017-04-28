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
                              'location' => $courses->location,
                              'programme' => $courses->programmearea
                              );
     }
     header('Content-Type: application/json');

     // echo json_encode($results);

     // exit;
} 

?>

<script>
jQuery( document ).ready(function() {
 jQuery('#advanced-search-table').stacktable({
    myClass: 'something anotherclass',
 });

});
</script>



<div>

   <table id="advanced-search-table"> 
 <!-- thead not supported by stacktable yet; neither is <th> in <tbody>; but the later is working in stackcolumns.--> 
  <tbody> 

   <tr>
      <th scope="col">Course Title</th>
      <th scope="col">Programme Area</th>
      <th scope="col">Level</th>
      <th scope="col">Campus</th>
      <th scope="col">Duration</th>
      <th scope="col">Apply</th>
    </tr>
  
<?php

if(!is_null($results)) {
  foreach($results as $value) {
    ?>
      <tr>
      <td><?=$value['text']?></td>
      <td><?=$value['programme']?></td>
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

  <tfoot>
    <tr>
      <td colspan="2"><i class="fa fa-phone" aria-hidden="true"></i> Call us on 0151 477 5850</td>
      <td colspan="4" style="text-align:center;"><i class="fa fa-info" aria-hidden="true"></i> We can provide advice on courses, finance and student support.</td>
    </tr>
  </tfoot>
</table>


</div>


