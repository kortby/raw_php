<?php 
require_once('../../../private/initialize.php');

$test = $_GET['test'] ?? '1';

if($test == '404') {
	error_404();
} elseif($test == '500') {
	error_500();
} elseif( $test == 'redirect') {
	redirect_to('staff/pages');
} 


$pages_set = find_all_pages();
  $pages_count = mysqli_num_rows($pages_set) + 1;

  $subjects_set = find_all_subjects();
  $subjects_count = mysqli_num_rows($subjects_set);



$page_title = "Create New page ";
 include_once(SHARED_PATH.'/staff_header.php');
 include_once(SHARED_PATH.'/staff_nav.php'); 

 ?>

<div class="container">

	<div class="row">
		<div class="col-10">
			<h3>Create new page</h3>
		</div>
        <div class="col-2">
			<p><a class="btn btn-link" href="<?php echo url_for('staff/pages'); ?>">&#60;&#60; Back to the List</a></p>        	
        </div>
	</div>

	<div class="row">
		<div class="col">
		 <form action="<?php echo url_for('staff/pages/create.php'); ?>" method="POST">
		  <div class="form-group">
		    <label for="page_name">Title</label>
		    <input type="text" class="form-control" name="page_name" aria-describedby="Menu" placeholder="Title">
		  </div>
		  <div class="form-group">
		    <label for="subject_id">Subject_id</label>
		    <select class="form-control" name="subject_id">
		      <?php while ($subject = mysqli_fetch_assoc($subjects_set)) {	 ?>
				<option value="<?php echo h($subject['id']) ?>">
					<?php echo h($subject['menu_name']) ?>
				</option>
		      <?php
		      }
		       ?>
		      
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="position">Position</label>
		    <select class="form-control" name="position">
		      <?php 
		      for ($i=1; $i <= $pages_count; $i++) { 
		      ?>
				<option value="<?php echo $i ?>">
					<?php echo $i ?>
				</option>
		      <?php
		      }
		       ?>
		      
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="content">Text</label>
		    <textarea class="form-control" name="content"></textarea>
		  </div>
		  <div class="form-check">
		    <label class="form-check-label">
		    	<input type="hidden" name="visible" value="0">
		      <input type="checkbox" class="form-check-input" name="visible" value="1">
		      Visible
		    </label>
		  </div>
		  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
		</form>
		</div>
		<div class="col"></div>
	</div>

</div>

<?php include_once(SHARED_PATH.'/staff_footer.php') ?>