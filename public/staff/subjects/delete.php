<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('/staff/subjects/index.php');
}

$id = $_GET['id'] ?? '1';

if(is_post_request()) {

  $result = delete_subject($id);
  redirect_to('/staff/subjects/index.php');

} else {
  $subject_set = find_subject($id);
  $subject = mysqli_fetch_assoc($subject_set);
}

?>

<?php $page_title = 'Delete Subject'; ?>
<?php 

include_once(SHARED_PATH.'/staff_header.php');
include_once(SHARED_PATH.'/staff_nav.php'); 
 ?>

<div class="container">

  <a class="btn btn-success" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject delete">
    <h1>Delete Subject</h1>
    <p>Are you sure you want to delete this subject?</p>
    <h3><?php echo $subject['menu_name'] ?></h3>

    <form action="<?php echo url_for('/staff/subjects/delete.php?id=' . h(u($subject['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" class="btn btn-danger" name="commit" value="Delete Subject" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
