<?php 

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('/staff/subjects/index.php');
}
$id = $_GET['id'];

if(is_post_request()) {

  // Handle form values sent by new.php

  $subject = [];
  $subject['id'] = $id;
  $subject['menu_name'] = $_POST['menu_name'] ?? '';
  $subject['position'] = $_POST['position'] ?? '';
  $subject['visible'] = $_POST['visible'] ?? '';

  $result = update_subject($subject);
  redirect_to('/staff/subjects/show.php?id=' . $id);

} else {

  $subject_set = find_subject($id);

  $subjects_set = find_all_subjects();
  $subjects_count = mysqli_num_rows($subjects_set);

  $subject = mysqli_fetch_assoc($subject_set);

}

?>

<?php $page_title = 'Edit Subject';


include_once(SHARED_PATH.'/staff_header.php');
include_once(SHARED_PATH.'/staff_nav.php'); 
 	
 ?>

<div class="container">

	<div class="row">
		<div class="col-10">
			<h3>Edit Subject <?php echo $id ?></h3>
		</div>
        <div class="col-2">
			<p><a class="btn btn-link" href="<?php echo url_for('staff/subjects'); ?>">&#60;&#60; Back to the List</a></p>        	
        </div>
	</div>

	<div class="row">
		<div class="col">
			<form action="<?php echo url_for('staff/subjects/edit.php?id='.h(u($id))); ?>" method="POST">
		  <div class="form-group">
		    <label for="menu_name">Menu Name</label>
		    <input type="text" class="form-control" name="menu_name" aria-describedby="Menu" value="<?php echo h($subject['menu_name']); ?>" >
		  </div>
		  <div class="form-group">
		    <label for="position">Position</label>
		    <select class="form-control" name="position">
		      <?php 
		      for ($i=0; $i <= $subjects_count; $i++) { 
		      ?>
				<option value="<?php echo $i ?>"  
					<?php 
					if($subject['position'] == $i) { echo 'selected';} 
					?> 
				>
					<?php echo $i ?>
				</option>
		      <?php
		      }
		       ?>
		      
		    </select>
		  </div>
		  <div class="form-check">
		    <label class="form-check-label">
		    	<input type="hidden" name="visible" value="0">
			      <input type="checkbox" class="form-check-input" name="visible" value="1" 
			      <?php 
					if($subject['visible'] == '1') { echo 'checked';} 
					?> 
				  >
		      Visible
		    </label>
		  </div>
		  <button type="submit" name="submit" class="btn btn-warning">Edit</button>
		</form>
		</div>
		<div class="col"></div>
	</div>

</div>


<?php include_once(SHARED_PATH.'/staff_footer.php') ?>
