<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('/staff/pages/index.php');
}

$id = $_GET['id'] ?? '1';

if(is_post_request()) {

  $result = delete_page($id);
  redirect_to('/staff/pages/index.php');

} else {
  $page_set = find_page($id);
  $page = mysqli_fetch_assoc($page_set);
}

?>

<?php $page_title = 'Delete page'; ?>
<?php 

include_once(SHARED_PATH.'/staff_header.php');
include_once(SHARED_PATH.'/staff_nav.php'); 
 ?>

<div class="container">

  <a class="btn btn-success" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="page delete">
    <h1>Delete page</h1>
    <p>Are you sure you want to delete this page?</p>
    <h3><?php echo h($page['page_name']) ?></h3>

    <form action="<?php echo url_for('/staff/pages/delete.php?id=' . h(u($page['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" class="btn btn-danger" name="commit" value="Delete page" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
