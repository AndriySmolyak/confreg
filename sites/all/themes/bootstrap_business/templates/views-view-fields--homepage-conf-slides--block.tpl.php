<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php
$stateVar = strip_tags($fields['field_conf_state']->content);
?>
<div class="slide-image-wrapper <?php echo $stateVar?>">
  <?php  print $fields['field_image_slide']->wrapper_prefix; ?>
  <?php  print $fields['field_image_slide']->content; ?>
  <?php  print $fields['field_image_slide']->wrapper_suffix; ?>
  <?php  print $fields['field_conf_state']->wrapper_prefix; ?>

  <?php
  $searchVar = array('open', 'planned', 'closed');
  $replaceVar = array('Registration is open', 'Planned conferention', 'passed conferention');
  $resultVar = str_replace($searchVar, $replaceVar, $fields['field_conf_state']->content);
  print $resultVar;
  ?>
  <?php print $fields['field_conf_state']->wrapper_suffix; ?>

</div>

<div class="slide-text-wrapper">
  <?php  print $fields['title']->wrapper_prefix; ?>
  <?php  print $fields['title']->content; ?>
  <?php  print $fields['title']->wrapper_suffix; ?>

  <?php  print $fields['field_conf_country']->wrapper_prefix; ?>

  <?php
  $country = strip_tags($fields['field_conf_country']->content);
  $city = strip_tags($fields['field_conf_city']->content);
  ?>
  <?php print '<div class="field-content">'.$country.', '.$city.'</div>'; ?>
  <?php  print $fields['field_conf_country']->wrapper_suffix; ?>

  <?php  print $fields['field_conf_date']->wrapper_prefix; ?>
  <?php  print $fields['field_conf_date']->label_html; ?>
  <?php  print $fields['field_conf_date']->content; ?>
  <?php  print $fields['field_conf_date']->wrapper_suffix; ?>
  <?php
  if($stateVar == 'open'){
    print "<a href='/registration'>REGISTER</a>";
  }
  ?>

</div>
