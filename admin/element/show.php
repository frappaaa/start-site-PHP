<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>

<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$element = Element::find_by_id($id);

?>

<?php $page_title = 'Show Element: ' . h($element->name()); ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/element/index.php'); ?>">&laquo; Back to List</a>

  <div class="Element show">

    <h1>Element: <?php echo h($element->name()); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Brand</dt>
        <dd><?php echo h($element->brand); ?></dd>
      </dl>
      <dl>
        <dt>Model</dt>
        <dd><?php echo h($element->model); ?></dd>
      </dl>
      <dl>
        <dt>Year</dt>
        <dd><?php echo h($element->year); ?></dd>
      </dl>
      <dl>
        <dt>Category</dt>
        <dd><?php echo h($element->category); ?></dd>
      </dl>
      <dl>
        <dt>Color</dt>
        <dd><?php echo h($element->color); ?></dd>
      </dl>
      <dl>
        <dt>Gender</dt>
        <dd><?php echo h($element->gender); ?></dd>
      </dl>
      <dl>
        <dt>Weight</dt>
        <dd><?php echo h($element->weight_kg()) . ' / ' . h($element->weight_lbs()); ?></dd>
      </dl>
      <dl>
        <dt>Condition</dt>
        <dd><?php echo h($element->condition()); ?></dd>
      </dl>
      <dl>
        <dt>Price</dt>
        <dd><?php echo h(money_format('$%i', $element->price)); ?></dd>
      </dl>
      <dl>
        <dt>Description</dt>
        <dd><?php echo h($element->description); ?></dd>
      </dl>
    </div>

  </div>

</div>
