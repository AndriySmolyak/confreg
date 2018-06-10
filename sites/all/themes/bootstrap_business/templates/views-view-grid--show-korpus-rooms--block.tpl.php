<?php

/**
 * @file
 * Default simple view template to display a rows in a grid.
 *
 * - $rows contains a nested array of rows. Each row contains an array of
 *   columns.
 *
 * @ingroup views_templates
 */
// ROOM TEMPLATE
//dsm(get_defined_vars());

// CURRENT TPL called for each PLACE (bed)

//$variables['view']->result => array[0 - 14] of all places for this CORPUS [id]->place object
// id = $id == $variables['id']  (0 - 14)

// Corpus NID; this view shown on corpus page (for certain corpus)
// 1) $variables['view']->args[0] = "11" // only one item specified
// 2) $variables['view']->result[$variables['id']]->field_field_korpus_place[0]['raw']['target_id']

// FLOOR ID
// $variables['view']->result[$variables['id']]->field_field_floor_place[0]['raw']['target_id']

// ROOM ID
// $variables['view']->result[$variables['id']]->node_field_data_field_room_place_nid = NID // ROOM NID
// $variables['view']->result[$variables['id']]->field_field_room_place[0]['raw']['target_id'] = NID // ROOM NID

// PLACE ID
// $variables['view']->result[$variables['id']]->PLACE CLASS (all fields)
// $variables['view']->result[$variables['id']]->nid // PLACE NID









//$variables['view']->args[0] = "11" //Corpus NID;
//$variables['view']->result[0]->class node ROOM (fields) =>
//$variables['view']->result[1]->class node ROOM (fields) =>
//result[NNN]   NNN = number of rooms

//nid (String, 2 characters ) 39
//node_field_data_field_room_place_nid (String, 2 characters ) 31  /// ROOM NID
//node_title (String, 8 characters ) qwerty
//_field_data (Array, 2 elements)
//field_field_room_place (Array, 1 element) //// row
//field_field_korpus_place (Array, 1 element) //// row
//field_field_floor_place (Array, 1 element) //// row
//field_field_bed_yarus (Array, 1 element) //// row
//field_field_room_type (Array, 0 elements)

//$rows[0][0] = rendered bed (full room) 37
//$rows[0][1] = rendered bed (full room) 38
//$rows[0][2] = rendered bed (full room) 39
//$rows[0][3] = rendered bed (full room) 40
?>
<div class="room_item">


<?php  if (!empty($title)) : ?>
    <div><?php print $title; ?></div>
<?php endif; ?>
<table class="<?php print $class; ?>"<?php print $attributes; ?>>
  <?php if (!empty($caption)) : ?>
      <caption><?php print $caption; ?></caption>
  <?php endif; ?>

    <tbody>
    <?php foreach ($rows as $row_number => $columns): ?>
        <tr <?php if ($row_classes[$row_number]) { print 'class="' . $row_classes[$row_number] .'"';  } ?>>
          <?php foreach ($columns as $column_number => $item): ?>
              <td <?php if ($column_classes[$row_number][$column_number]) { print 'class="' . $column_classes[$row_number][$column_number] .'"';  } ?>>
                <?php print $item; ?>
              </td>
          <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


</div>