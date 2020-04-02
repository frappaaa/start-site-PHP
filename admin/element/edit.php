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

  // Save record using post parameters
  $args = $_POST['Element'];
  $element->merge_attributes($args);
  $result = $element->save();

  if($result === true) {
    $session->message('The Element was updated successfully.');
    redirect_to(url_for('/staff/element/show.php?id=' . $id));
  } else {
    // show errors
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit Element'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/element/index.php'); ?>">&laquo; Back to List</a>

  <div class="Element edit">
    <h1>Edit Element</h1>

    <?php echo display_errors($element->errors); ?>

    <form action="<?php echo url_for('/staff/element/edit.php?id=' . h(u($id))); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Edit Element" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
