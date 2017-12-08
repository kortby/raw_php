<?php 
require_once('../../../private/initialize.php');

if (is_post_request()) {
	$page_name = $_POST['page_name'] ?? '';
	$content = h($_POST['content']) ?? '';
	$subject_id = $_POST['subject_id'] ?? '';
	$position = $_POST['position'] ?? '';
	$visible = $_POST['visible'] ?? '';

	insert_page($page_name, $content, $subject_id, $position, $visible);
} else {
	redirect_to('staff/pages/new.php');
}

?>