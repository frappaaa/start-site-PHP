<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($element)) {
  redirect_to(url_for('/admin/element/index.php'));
}
?>

<label for="element[nome]">Nome</label>
<input type="text" name="element[nome]" value="<?php echo h($element->brand); ?>" />


<label for="element[year]">Year</label>
    <select name="bicycle[year]">
      <option value=""></option>
    <?php $this_year = idate('Y') ?>
    <?php for($year=$this_year-20; $year <= $this_year; $year++) { ?>
      <option value="<?php echo $year; ?>" <?php if($element->year == $year) { echo 'selected'; } ?>><?php echo $year; ?></option>
    <?php } ?>
    </select>


<label for="element[gender]">Gender</label>
    <select name="element[gender]">
      <option value=""></option>
    <?php foreach(Element::GENDERS as $gender) { ?>
      <option value="<?php echo $gender; ?>" <?php if($element->gender == $gender) { echo 'selected'; } ?>><?php echo $gender; ?></option>
    <?php } ?>
    </select>




<dl>
  <dt>Description</dt>
  <dd><textarea name="element[description]" rows="5" cols="50"><?php echo h($element->description); ?></textarea></dd>
</dl>
