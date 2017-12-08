<?php require_once('../../../private/initialize.php') ?>

<?php $page_title = 'pages' ?>

<?php 
// database pages
$pages_set = find_all_pages();

 ?>

<?php include_once(SHARED_PATH.'/staff_header.php') ?>
<?php include_once(SHARED_PATH.'/staff_nav.php') ?>

	<div class="container">
		<h1>Pages</h1>
		<p><a href="<?php echo url_for('staff/pages/new.php'); ?>" class="btn btn-success">Create page</a></p>
		<div class="row">
			<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Position</th>
      <th scope="col">Subject</th>
      <th scope="col">Visible</th>
      <th scope="col">Name</th>
      <th scope="col">#</th>
      <th scope="col">#</th>
      <th scope="col">#</th>
    </tr>
  </thead>
  <tbody>
  	<?php while ($page = mysqli_fetch_assoc($pages_set)) {	 ?>
    <tr>
      <td><strong><?php echo $page['id']; ?></strong></td>
      <td><?php echo $page['position']; ?></td>
      <td>
      	
      	<?php 
      	$subject_set = find_subject($page['subject_id']);
		$subject = mysqli_fetch_assoc($subject_set);
      	echo h($subject['menu_name']);
	    ?>
      		
      </td>
      <td><?php echo $page['visible'] == 1 ? 'True': 'False'; ?></td>
      <td><?php echo $page['page_name']; ?></td>
      <td><a href="<?php echo url_for('staff/pages/show.php?id='.h(u($page['id']))); ?>" class="btn btn-link">View</a></td>
      <td><a href="<?php echo url_for('staff/pages/edit.php?id='.h(u($page['id']))); ?>" class="btn btn-link">Edit</a></td>
      <td><a href="<?php echo url_for('staff/pages/delete.php?id='.h(u($page['id']))); ?>" class="btn btn-link">Delete</a></td>
    </tr>

    <?php } ?>
    
  </tbody>
</table>
		</div>
	</div>
	
<?php 
mysqli_free_result($pages_set); 
?>

<?php include_once(SHARED_PATH.'/staff_footer.php') ?>
	