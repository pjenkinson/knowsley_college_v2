<?php
/**
 * ACF Homepage tagline
 */
?>

<?php
$sql = "SELECT id, programmearea AS name 
          FROM fact_sheets_live 
      GROUP BY programmearea
      ORDER BY programmearea ASC";

$courses = $wpdb->get_results($sql);
?>

<select id="course-select">
	<option value="">Select a subject</option>
	<?php
	foreach($courses AS $course) {
		?>
		<option value="<?=$course->id ?>"><?=$course->name?></option>
		<?php
	}
	?>
</select>
