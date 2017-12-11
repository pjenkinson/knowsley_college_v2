<optgroup label="January Courses">
<?php
foreach($JanuaryCourses AS $key => $value) {
$storedValue = $_SESSION['appform']['contents']['Offering1'];
if($storedValue == $value) {
$selected = 'selected';
} else {
$selected = '';
}
?>


<option value="<?=$value->id?>">
<?=$value->factsheetname?>
</option>


<?php
}
?>
</optgroup>