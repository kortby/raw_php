<?php 

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('/staff/pages/index.php');
}
$id = $_GET['id'];

if(is_post_request()) {

  // Handle form values sent by new.php

  $page = [];
  $page['id'] = $id;
  $page['subject_id'] = $_POST['subject_id'] ?? '';
  $page['page_name'] = $_POST['page_name'] ?? '';
  $page['position'] = $_POST['position'] ?? '';
  $page['visible'] = $_POST['visible'] ?? '';
  $page['content'] = h($_POST['content']) ?? '';

  $result = update_page($page);
  redirect_to('/staff/pages/show.php?id=' . $id);

} else {

  $page_set = find_page($id);
  $page = mysqli_fetch_assoc($page_set);

  $pages_set = find_all_pages();
  $pages_count = mysqli_num_rows($pages_set);

  $subjects_set = find_all_subjects();
}

?>

<?php $page_title = 'Edit page';


include_once(SHARED_PATH.'/staff_header.php');
include_once(SHARED_PATH.'/staff_nav.php'); 
 	
 ?>

<div class="container">

	<div class="row">
		<div class="col-10">
			<h3>Edit page <?php echo $id ?></h3>
		</div>
        <div class="col-2">
			<p><a class="btn btn-link" href="<?php echo url_for('staff/pages'); ?>">&#60;&#60; Back to the List</a></p>        	
        </div>
	</div>

	<div class="row">
		<div class="col">
			<form action="<?php echo url_for('staff/pages/edit.php?id='.h(u($id))); ?>" method="POST">
		  <div class="form-group">
		    <label for="page_name">Title</label>
		    <input type="text" class="form-control" name="page_name" aria-describedby="Menu" value="<?php echo h($page['page_name']); ?>" >
		  </div>
		  <div class="form-group">
		    <label for="subject_id">Subject_id</label>
		    <select class="form-control" name="subject_id">
		      <?php while ($subject = mysqli_fetch_assoc($subjects_set)) {	 ?>
				<option value="<?php echo h($subject['id']) ?>"  
					<?php 
					if($page['subject_id'] == $subject['id']) { echo 'selected';} 
					?> 
				>
					<?php echo $subject['menu_name'] ?>
				</option>
		      <?php
		      }
		       ?>
		      
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="content">Text</label>
		    <textarea class="form-control" name="content"><?php echo h($page['content']); ?></textarea>
		  </div>
		  <div class="form-group">
		    <label for="position">Position</label>
		    <select class="form-control" name="position">
		      <?php 
		      for ($i=1; $i <= $pages_count; $i++) { 
		      ?>
				<option value="<?php echo $i ?>"  
					<?php 
					if($page['position'] == $i) { echo 'selected';} 
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
					if($page['visible'] == '1') { echo 'checked';} 
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
