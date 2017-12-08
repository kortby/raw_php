<?php require_once('../../../private/initialize.php') ?>

<?php 
	

	$id = $_GET['id'] ?? '1';
	$subject_set = find_subject($id);
	$subject = mysqli_fetch_assoc($subject_set);

	$page_title = "Show Subject ".h($id);
 ?>


<?php include_once(SHARED_PATH.'/staff_header.php') ?>
<?php include_once(SHARED_PATH.'/staff_nav.php') ?>

<div class="container">
	<h3><?php echo $subject['menu_name'] ?></h3>
	<p>ID: <?php echo $subject['id'] ?></p>
	<p>Position: <?php echo $subject['position'] ?></p>
	<p>Visible: <?php echo $subject['visible'] ?></p>
        <a class="btn btn-primary" href="<?php echo url_for('staff/subjects'); ?>">Back to the List</a>
	<p></p>
</div>


<?php include_once(SHARED_PATH.'/staff_footer.php') ?>

<?php 
mysqli_free_result($subject_set); 
?>