<?php require_once('../../project_files/initialize.php');?>
<?php require_login(); ?>



<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$admin = Admin::find_by_id($id);

?>

<?php $page_title = 'Show Admin: ' . h($admin->full_name()); ?>
<?php include(PRIVATE_PATH.'/private_header.php'); ?>

<div class="inside show">

  <a class="back-link" href="<?php echo url_for('/admin/admins/index.php'); ?>">&laquo; Back to List</a>

  <div >

    <h1>Admin: <?php echo h($admin->name()); ?></h1>

    <div class="attributes">
      <dl>
        <dt>ID</dt>
        <dd><?php echo h($admin->id); ?></dd>
      </dl>
      <dl>
        <dt>Nome</dt>
        <dd><?php echo h($admin->nome); ?></dd>
      </dl>
      <dl>
        <dt>Cognome</dt>
        <dd><?php echo h($admin->cognome); ?></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><?php echo h($admin->email); ?></dd>
      </dl>
      <dl>
        <dt>Username</dt>
        <dd><?php echo h($admin->username); ?></dd>
      </dl>
      
    </div>

  </div>

</div>
