<?php 
	if(!isset($page_title)) { 
		$page_title = ''; 
	} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MBank | <?php echo h($page_title) ?> </title>
	<link rel="stylesheet" href="<?php echo url_for('css/bootstrap.min.css'); ?>">
</head>
<body>
