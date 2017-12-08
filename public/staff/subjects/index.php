<?php require_once('../../../private/initialize.php') ?>

<?php $page_title = 'Subjects' ?>

<?php 
// database subjects
$subjects_set = find_all_subjects();
 ?>

<?php include_once(SHARED_PATH.'/staff_header.php') ?>
<?php include_once(SHARED_PATH.'/staff_nav.php') ?>

	<div class="container">
		<h1>SUBJECTS</h1>
		<p><a href="<?php echo url_for('staff/subjects/new.php'); ?>" class="btn btn-success">Create Subject</a></p>
		<div class="row">
			<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Position</th>
      <th scope="col">Visible</th>
      <th scope="col">Name</th>
      <th scope="col">#</th>
      <th scope="col">#</th>
      <th scope="col">#</th>
    </tr>
  </thead>
  <tbody>
  	<?php while ($subject = mysqli_fetch_assoc($subjects_set)) {	 ?>
    <tr>
      <td><strong><?php echo $subject['id']; ?></strong></td>
      <td><?php echo $subject['position']; ?></td>
      <td><?php echo $subject['visible'] == 1 ? 'True': 'False'; ?></td>
      <td><?php echo $subject['menu_name']; ?></td>
      <td><a href="<?php echo url_for('staff/subjects/show.php?id='.h(u($subject['id']))); ?>" class="btn btn-link">View</a></td>
      <td><a href="<?php echo url_for('staff/subjects/edit.php?id='.h(u($subject['id']))); ?>" class="btn btn-link">Edit</a></td>
      <td><a href="<?php echo url_for('staff/subjects/delete.php?id='.h(u($subject['id']))); ?>" class="btn btn-link">Delete</a></td>
    </tr>

    <?php } ?>
    
  </tbody>
</table>
		</div>
	</div>
	
<?php 
mysqli_free_result($subjects_set); 
?>

<?php include_once(SHARED_PATH.'/staff_footer.php') ?>
	