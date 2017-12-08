<?php require_once('../../../private/initialize.php') ?>

<?php 
	

	$id = $_GET['id'] ?? '1';
	$page_set = find_page($id);
	$page = mysqli_fetch_assoc($page_set);

	$page_title = "Show page ".h($id);
 ?>


<?php include_once(SHARED_PATH.'/staff_header.php') ?>
<?php include_once(SHARED_PATH.'/staff_nav.php') ?>

<div class="container">
	<h3><?php echo $page['page_name'] ?></h3>
	<h5>
		<?php 
      	$subject_set = find_subject($page['subject_id']);
		$subject = mysqli_fetch_assoc($subject_set);
      	echo h($subject['menu_name']);
	    ?>
	</h5>
	<p><?php echo $page['content'] ?></p>
	<p>Position: <?php echo $page['position'] ?></p>
	<p>Visible: <?php echo $page['visible'] ?></p>
        <a class="btn btn-primary" href="<?php echo url_for('staff/pages'); ?>">Back to the List</a>
	<p></p>
</div>


<?php include_once(SHARED_PATH.'/staff_footer.php') ?>

<?php 
mysqli_free_result($page_set); 
?>