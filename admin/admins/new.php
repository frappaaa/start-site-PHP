<?php

require_once('../../../private/initialize.php');

require_login();

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['admin'];
  $admin = new Admin($args);
  $result = $admin->save();

  if($result === true) {
    $new_id = $admin->id;
    $session->message('The Admin was created successfully.');
    redirect_to(url_for('/admin/admins/show?id=' . $new_id));
  } else {
    // show errors
  }

} else {
  // display the form
  $admin = new Admin;
}

?>

<?php $page_title = 'Create Admin'; ?>
<?php include(PRIVATE_PATH . '/private_header.php'); ?>

<div class="inside new">

  <a class="back-link" href="<?php echo url_for('/admin/admins/index.php'); ?>">&laquo; Back to List</a>

  <div>
    <h1>Create Admin</h1>

    <?php echo display_errors($admin->errors); ?>

    <form action="<?php echo url_for('/admin/admins/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Create Admin" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
