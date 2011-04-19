<?php
/**
 * @package WordPress
 * @subpackage Basic
 */
?>
<?php

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'front_func.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');

function new_excerpt_more($excerpt) {
	return str_replace('[...]', '...', $excerpt);
}

function remove_more_jump_link($link) {

	$offset = strpos($link, '#more-');

	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}

return $link;

}


?>