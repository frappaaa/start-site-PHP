<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>

<?php

$current_page = $_GET['page'] ?? 1;
$per_page = 5;
$total_count = Element::count_all();

$pagination = new Pagination($current_page, $per_page, $total_count);

// Find all element;
// use pagination instead
// $elements = Element::find_all();

$sql = "SELECT * FROM element ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";
$elements = Element::find_by_sql($sql);

?>
<?php $page_title = 'element'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="element listing">
    <h1>element</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/element/new.php'); ?>">Add Element</a>
    </div>

  	<table class="list">
      <tr>
        <th>ID</th>
        <th>Brand</th>
        <th>Model</th>
        <th>Year</th>
        <th>Category</th>
        <th>Gender</th>
        <th>Color</th>
        <th>Price</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach($elements as $element) { ?>
        <tr>
          <td><?php echo h($element->id); ?></td>
          <td><?php echo h($element->brand); ?></td>
          <td><?php echo h($element->model); ?></td>
          <td><?php echo h($element->year); ?></td>
          <td><?php echo h($element->category); ?></td>
          <td><?php echo h($element->gender); ?></td>
          <td><?php echo h($element->color); ?></td>
          <td><?php echo h($element->price); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/element/show.php?id=' . h(u($element->id))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/element/edit.php?id=' . h(u($element->id))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/element/delete.php?id=' . h(u($element->id))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

<?php
$url = url_for('/staff/element/index.php');
echo $pagination->page_links($url);
?>


  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
