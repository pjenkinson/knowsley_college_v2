<?php
$factsheetID = filter_var($_GET['factsheet'], FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT id, 
               factsheetname AS name, 
               courseabout,
               entryrequirements,
               duration,
               assessment,
               level,
               progression, 
               location
          FROM fact_sheets
         WHERE id = '".$factsheetID."'";

$factsheet = $wpdb->get_results($sql);

$factsheet = $factsheet[0];
?>