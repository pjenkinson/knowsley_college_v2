<?php
/**
* Template Name: Search Test HTML
*/

 if(isset($_GET['term'])) {
 $searchTerm = filter_var($_GET['term'], FILTER_SANITIZE_STRING);
     $sql = "SELECT programmearea, id, factsheetname, level, location, duration, course_url FROM fact_sheets
              WHERE factsheetname LIKE '%".$searchTerm."%' OR programmearea LIKE '%".$searchTerm."%'
              LIMIT 100";
     $courses = $wpdb->get_results($sql);
     foreach ($courses as $courses) {
          $results[] = array('id' => $courses->id, 
                              'text' => $courses->factsheetname,
                              'level' => $courses->level,
                              'duration' => $courses->duration,
                              'location' => $courses->location,
                              'programme' => $courses->programmearea,
                              'url' => $courses->course_url
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
    myClass: 'something anotherclass'
 });


});
</script>


<style>
/* Stacktable */

.stacktable.small-only {
 display: none;
}

@media (max-width: 900px) {
  #advanced-search-table.stacktable.large-only { display: none; }
  .stacktable.small-only { display: table; } /* Responsive Table */
  .stacktable.small-only tr:first-of-type {
    display: none;
  }

}

.stacktable-factsheet:nth-of-type(5n), .stacktable-factsheet:nth-of-type(6n) {
 display: none;
}


</style>



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
      <th scope="col">Course Info</th>
    </tr>
  
<?php

if(!is_null($results)) {
  foreach($results as $value) {
    ?>
      <tr class="stacktable-factsheet">
      <td class="stacktable-about"><a href="/course-finder/factsheet/?factsheet=<?=$value['id']?>"><?=$value['text']?></a></td>
      <td class="stacktable-programme"><?=$value['programme']?></td>
      <td class="stacktable-level"><?=$value['level']?></td>
      <td class="stacktable-campus"><?=$value['location']?></td>
      <td class="stacktable-duration"><?=$value['duration']?></td>
      <td class="more"><a href="/course-finder/factsheet/?factsheet=<?=$value['id']?>">More</a></td>
      </tr>
    <?php
  }
}
else {?>
    
    <tr>
      <td colspan="6">No courses found: Try searching by subject area, e.g Art or Sport</td>
    </tr>

<?php
}
?>

    <tr>
      <td colspan="2"><i class="fa fa-phone" aria-hidden="true"></i> Call us on 0151 477 5850</td>
      <td colspan="4" style="text-align:center;"><i class="fa fa-info" aria-hidden="true"></i> We can provide advice on courses, finance and student support.</td>
    </tr>
    
  </tbody>

    
</table>



</div>


