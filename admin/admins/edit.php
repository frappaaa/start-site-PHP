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

  // Save record using post parameters
  $args = $_POST['Admin'];
  $admin->merge_attributes($args);
  $result = $admin->save();

  if($result === true) {
    $session->message('The admin user was updated successfully.');
    redirect_to(url_for('/staff/element/show?id=' . $id));
  } else {
    // show errors
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit Admin'; ?>
<?php include(PRIVATE_PATH . '/private_header.php'); ?>

<div class="inside edit">

  <a class="back-link" href="<?php echo url_for('/admin/admins/index'); ?>">&laquo; Back to List</a>

  <div>
    <h1>Edit Admin</h1>

    <?php echo display_errors($admin->errors); ?>

    <form action="<?php echo url_for('/admin/admins/edit?id=' . h(u($id))); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Edit Admin" />
      </div>
    </form>

  </div>

</div>

<?php include(PRIVATE_PATH . '/private_footer.php'); ?>
