<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/element/index.php'));
}
$id = $_GET['id'];
$element = Element::find_by_id($id);
if($element == false) {
  redirect_to(url_for('/staff/element/index.php'));
}

if(is_post_request()) {

  // Delete Element
  $result = $element->delete();
  $session->message('The Element was deleted successfully.');
  redirect_to(url_for('/staff/element/index.php'));

} else {
  // Display form
}

?>

<?php $page_title = 'Delete Element'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/element/index.php'); ?>">&laquo; Back to List</a>

  <div class="Element delete">
    <h1>Delete Element</h1>
    <p>Are you sure you want to delete this Element?</p>
    <p class="item"><?php echo h($element->name()); ?></p>

    <form action="<?php echo url_for('/staff/element/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Element" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
