<?php 
require_once('../../../private/initialize.php');
if (is_post_request()) {
	
	$menu_name = $_POST['menu_name'] ?? '';
	$position = $_POST['position'] ?? '';
	$visible = $_POST['visible'] ?? '';

	insert_subject($menu_name, $position, $visible);

} else {
	redirect_to('staff/subjects/new.php');
}


?>