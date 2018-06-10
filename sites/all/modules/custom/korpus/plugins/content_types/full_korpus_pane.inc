<?php
/**
 * This plugin array is more or less self documenting
 */
$plugin = array(
  'single' => TRUE,  // Just do this one, it is needed.
  'title' => t('Full Korpus view'),  // Title to show up on the pane screen.
  'description' => t('ER MAH GERD, ERT DERS THINS'), // Description to show up on the pane screen.
  'category' => t('Custom panes'), // A category to put this under.
  'edit form' => 'korpus_pane_custom_pane_edit_form', // A function that will return the settings form for the pane.
  'render callback' => 'korpus_pane_custom_pane_render', // A function that will return the renderable content.
  'admin info' => 'korpus_pane_custom_pane_admin_info', // A function that will return the information displayed on the admin screen (optional).
  'defaults' => array( // Array of defaults for the settings form.
    'text' => '',
  ),
  'all contexts' => TRUE, // This is NEEDED to be able to use substitution strings in your pane.
);

/**
 * An edit form for the pane's settings.
 */
function korpus_pane_custom_pane_edit_form($form, &$form_state) {
  $conf = $form_state['conf'];

//  $form['text'] = array(
//    '#type' => 'textfield',
//    '#title' => t('Panel Text'),
//    '#description' => t('Text to display, it may use substitution strings'),
//    '#default_value' => $conf['text'],
//  );

  return $form;
}

/**
 * Submit function, note anything in the formstate[conf] automatically gets saved
 * Notice, the magic that automatically does that for you.
 */
function korpus_pane_custom_pane_edit_form_submit(&$form, &$form_state) {
  foreach (array_keys($form_state['plugin']['defaults']) as $key) {
    if (isset($form_state['values'][$key])) {
      $form_state['conf'][$key] = $form_state['values'][$key];
    }
  }
}


/**
 * 'admin info' callback for panel pane.
 */
function korpus_pane_custom_pane_admin_info($subtype, $conf, $contexts) {
//  if (!empty($conf)) {
//    $block = new stdClass;
//    $block->title = $conf['override_title'] ? $conf['override_title_text'] : '';
//    $block->content = $conf['text'];
//    return $block;
//  }
}


/**
 * Run-time rendering of the body of the block (content type)
 * See ctools_plugin_examples for more advanced info
 */
function korpus_pane_custom_pane_render($subtype, $conf, $args, $contexts) {
  // Update the strings to allow contexts.
  if (!empty($contexts) && !empty($args[0])) {
//    $content = ctools_context_keyword_substitute($conf['text'], array(), $contexts);
    $content = '';
    if($nid = node_load($args[0])) {
      $content = _korpus_pane_content_generate($nid);
    }
  }

  $block = new stdClass();

  // This will be overridden by the user within the panel options.
  $block->title = t('Схема этажей');
  $block->content = $content;

  return $block;
}

function _korpus_pane_content_generate($nid) {
  $content = '';
  $content = node_view($nid);
  return $content;
}