<?php

require_once('../../../private/initialize.php');

require_login();

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['Element'];
  $element = new Element($args);
  $result = $element->save();

  if($result === true) {
    $new_id = $element->id;
    $session->message('The Element was created successfully.');
    redirect_to(url_for('/staff/element/show.php?id=' . $new_id));
  } else {
    // show errors
  }

} else {
  // display the form
  $element = new Element;
}

?>

<?php $page_title = 'Create Element'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/element/index.php'); ?>">&laquo; Back to List</a>

  <div class="Element new">
    <h1>Create Element</h1>

    <?php echo display_errors($element->errors); ?>

    <form action="<?php echo url_for('/staff/element/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Create Element" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
