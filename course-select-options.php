<optgroup label="Entry Level Courses">
				 						 <?php
				 					foreach($EntryLevelCourses AS $key => $value) {
				 							$storedValue = $_SESSION['appform']['contents']['Offering3'];
				 							if($storedValue == $value) {
				 								  $selected = 'selected';
				 							} else {
				 									$selected = '';
				 							}
				 						  ?>


				 						  <option value="<?=$value->OfferingID?>">
				 						  <?=$value->level?> - <?=$value->factsheetname?>
				 						  </option>


				 						  <?php
				 					}
				 					?>
				 						  </optgroup>
				 				
				 					 <optgroup label="Level 1 Courses">
				 						 <?php
				 					foreach($level1Courses AS $key => $value) {
				 							$storedValue = $_SESSION['appform']['contents']['Offering3'];
				 							if($storedValue == $value) {
				 								  $selected = 'selected';
				 							} else {
				 									$selected = '';
				 							}
				 						  ?>

				 						  <option value="<?=$value->OfferingID?>">
				 						  	<?=$value->factsheetname?>
				 						  </option>

				 						  <?php
				 					}
				 					?>
				 						  </optgroup>


				 						  <optgroup label="Level 2 Courses">
				 						 <?php
				 					foreach($level2Courses AS $key => $value) {
				 							$storedValue = $_SESSION['appform']['contents']['Offering3'];
				 							if($storedValue == $value) {
				 								  $selected = 'selected';
				 							} else {
				 									$selected = '';
				 							}
				 						  ?>

				 						  <option value="<?=$value->OfferingID?>">
				 						  	<?=$value->factsheetname?>
				 						  </option>

				 						  <?php
				 					}
				 					?>
				 						  </optgroup>

				 						   <optgroup label="Level 3 Courses">
				 						 <?php
				 					foreach($level2Courses AS $key => $value) {
				 							$storedValue = $_SESSION['appform']['contents']['Offering3'];
				 							if($storedValue == $value) {
				 								  $selected = 'selected';
				 							} else {
				 									$selected = '';
				 							}
				 						  ?>

				 						  <option value="<?=$value->OfferingID?>">
				 						  	<?=$value->factsheetname?>
				 						  </option>

				 						  <?php
				 					}
				 					?>
				 						  </optgroup>

				 						   <optgroup label="Level 4 Courses">
				 						 <?php
				 					foreach($level2Courses AS $key => $value) {
				 							$storedValue = $_SESSION['appform']['contents']['Offering3'];
				 							if($storedValue == $value) {
				 								  $selected = 'selected';
				 							} else {
				 									$selected = '';
				 							}
				 						  ?>

				 						  <option value="<?=$value->OfferingID?>">
				 						  	<?=$value->factsheetname?>
				 						  </option>

				 						  <?php
				 					}
				 					?>
				 						  </optgroup>

				 						   <optgroup label="Level 5 Courses">
				 						 <?php
				 					foreach($level2Courses AS $key => $value) {
				 							$storedValue = $_SESSION['appform']['contents']['Offering3'];
				 							if($storedValue == $value) {
				 								  $selected = 'selected';
				 							} else {
				 									$selected = '';
				 							}
				 						  ?>

				 						  <option value="<?=$value->OfferingID?>">
				 						  	<?=$value->factsheetname?>
				 						  </option>

				 						  <?php
				 					}
				 					?>
				 						  </optgroup>