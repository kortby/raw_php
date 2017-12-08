<?php 
require_once('../../../private/initialize.php');

$test = $_GET['test'] ?? '1';

if($test == '404') {
	error_404();
} elseif($test == '500') {
	error_500();
} elseif( $test == 'redirect') {
	redirect_to('staff/subjects');
} 


$subjects_set = find_all_subjects();
  $subjects_count = mysqli_num_rows($subjects_set) + 1;



$page_title = "Create New Subject ";
 include_once(SHARED_PATH.'/staff_header.php');
 include_once(SHARED_PATH.'/staff_nav.php'); 

 ?>

<div class="container">

	<div class="row">
		<div class="col-10">
			<h3>Create new Subject</h3>
		</div>
        <div class="col-2">
			<p><a class="btn btn-link" href="<?php echo url_for('staff/subjects'); ?>">&#60;&#60; Back to the List</a></p>        	
        </div>
	</div>

	<div class="row">
		<div class="col">
		 <form action="<?php echo url_for('staff/subjects/create.php'); ?>" method="POST">
		  <div class="form-group">
		    <label for="menu_name">Menu Name</label>
		    <input type="text" class="form-control" name="menu_name" aria-describedby="Menu" placeholder="Menu Name">
			

		  </div>
		  <div class="form-group">
		    <label for="position">Position</label>
		    <select class="form-control" name="position">
		      <?php 
		      for ($i=0; $i <= $subjects_count; $i++) { 
		      ?>
				<option value="<?php echo $i ?>">
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