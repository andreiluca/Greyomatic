<?php
/**
 * @package WordPress
 * @subpackage Basic
 */
?>
<?php

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'base.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');

function al_admin() {
	if (  isset($_GET['settings-updated']) && $_GET['settings-updated'] === 'true') {echo '<div id="message" class="updated fade"><p>'; _e("Theme options saved.",AL_THEMESLUG); echo '</p></div>';}
    require_once(AL_ADMINPATH . 'settings_template.php');
}

function al_admin_init() {
    add_theme_page(AL_THEMENAME . " " . __("Options","basic"), AL_THEMENAME . " " . __("Options",AL_THEMESLUG), 'edit_themes', basename(__FILE__), 'al_admin', AL_ASSETSPATH . "images/framework_icon.png", 62);
}

function al_admin_assets() {
    echo '<link rel="stylesheet" type="text/css" href="' . AL_ASSETSPATH . 'css/style.css" />' . "\n";
    echo '<script type="text/javascript" src="' . AL_ASSETSPATH . 'js/jquery.tools.min.js"></script>' . "\n";
    echo '<script type="text/javascript" src="' . AL_ASSETSPATH . 'js/scripts.js"></script>' . "\n";
}

add_action('admin_menu', "al_admin_init");
add_action('admin_head', 'al_admin_assets');




?>