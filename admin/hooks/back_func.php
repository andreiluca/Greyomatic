<?php
/**
 * @package WordPress
 * @subpackage Basic
 */
?>
<?php

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'back_func.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');

function custom_favorite_menu($actions) {

# Removing #
//unset($actions['edit-comments.php']);

# Adding #
$actions['admin.php?page=base.php'] = array(__('Theme Settings', 'basic'), 'manage_options');

return $actions;
}


function getDirectoryList ($directory, $clean=false)
  {

    // create an array to hold directory list
    $results = array();
    // create a handler for the directory
    $handler = opendir($directory);
    // open directory and walk through the filenames
    while ($file = readdir($handler)) {
      // if file isn't this directory or its parent, add it to the results
      if ($file != "." && $file != "..") {
        $results[] = $file;
      }
    }

    // tidy up: close the handler
    closedir($handler);
    // done!
    if($clean == true){ $results = str_replace(".php", "", $results); }
    return $results;
  }


function get_page_options(){

foreach(getDirectoryList(AL_OPTPATH, true) as $menu_item):
$html = file_get_contents(AL_OPTPATH . $menu_item . '.php');

$dom = new DOMDocument();
$dom->loadHTML($html);

$xpath = new DOMXPath($dom);

$inputs = $xpath->query('//input');
foreach ($inputs as $input) {
    $fields[] = $input->getAttribute('name');
}
$textareas = $xpath->query('//textarea');
foreach ($textareas as $textarea) {
    $fields[] = $textarea->getAttribute('name');
}

endforeach;
$get_page_options = substr(implode(",", array_unique($fields)).",", 0 ,-1);
return $get_page_options;

}

?>