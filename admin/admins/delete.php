<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/admin/admins/index'));
}
$id = $_GET['id'];
$admin = Admin::find_by_id($id);
if($admin == false) {
  redirect_to(url_for('/admin/admins/index'));
}

if(is_post_request()) {

  // Delete Element
  $result = $admin->delete();
  $session->message('The Admin was deleted successfully.');
  redirect_to(url_for('/admin/admins/index'));

} else {
  // Display form
}

?>

<?php $page_title = 'Delete Admin'; ?>
<?php include(PRIVATE_PATH . '/private_header.php'); ?>

<div class="inside delete">

  <a class="back-link" href="<?php echo url_for('/admin/admins/index'); ?>">&laquo; Back to List</a>

  <div>
    <h1>Delete Element</h1>
    <p>Are you sure you want to delete this Element?</p>
    <p class="item"><?php echo h($admin->name()); ?></p>

    <form action="<?php echo url_for('/staff/element/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Admin" />
      </div>
    </form>
  </div>

</div>

<?php include(PRIVATE_PATH . '/private_footer.php'); ?>
