<?php
/**
 * @package WordPress
 * @subpackage Basic
 */
?>
<?php

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'basic_framework.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');

$theme_data = get_theme_data(TEMPLATEPATH . '/style.css');
$theme_version = trim($theme_data['Version']);
if(!$theme_version) $theme_version = "1.0";

if ( ! isset( $content_width ) ) $content_width = 640;

// Predefined Constants
define('AL_THEMENAME', $theme_data['Title']);
define('AL_THEMEVERSION', $theme_version);
define('AL_THEMESLUG', $theme_data['Template']);
define('AL_ADMINPATH', 	TEMPLATEPATH . '/admin/');
define('AL_HOOKSPATH', 	AL_ADMINPATH . 'hooks/');
define('AL_OPTPATH', 	AL_ADMINPATH . 'theme-options/');
define('AL_ASSETSPATH', get_bloginfo('template_url') . '/admin/assets/');

// Register Sidebar
function al_widgets_init() {

	register_sidebar( array(
		'name' => __(AL_THEMENAME . ' Sidebar', AL_THEMESLUG),
		'id' => 'sidebar',
		'description' => __('Right Sidebar area', AL_THEMESLUG),
		//'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		//'after_widget' => '</li>',
        'before_widget' => '',
        'after_widget' => '',
		'before_title' => '<h3 class="widget">',
		'after_title' => '</h3>',
	) );

}

// Load current style

if ( !is_admin() ) {
    wp_register_style( 'basic_stylesheet', get_bloginfo( 'stylesheet_url' ), false, AL_THEMEVERSION );
    wp_enqueue_style( 'basic_stylesheet' );
}

// Custom Hooks
if(is_admin()){
    require_once(AL_HOOKSPATH. 'back_func.php');

    // Back-end Filters
    add_filter('favorite_actions', 'custom_favorite_menu');

}else{
    require_once(AL_HOOKSPATH. 'front_func.php');

    // Front-end Filters
    // add_filter('wp_trim_excerpt', 'new_excerpt_more');
    // add_filter('the_content_more_link', 'remove_more_jump_link');

}

// Load Theme Options
if ( is_admin() ) {
require_once(AL_ADMINPATH. 'base.php');
}

/*if ( ! function_exists( 'al_setup' ) ) {
    function al_setup() {

        // Wordpress Theme Hooks
        if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'post-thumbnails' );
        if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'menus' );
        if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'automatic-feed-links' );
        if ( function_exists( 'add_custom_background' ) ) add_custom_background();

        // Localization
        load_theme_textdomain( 'greyomatic', TEMPLATEPATH . '/lang' );
        $locale = get_locale();
    	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
    	if ( is_readable( $locale_file ) )
    	require_once( $locale_file );

        // Custom Header Image
        require_once(AL_HOOKSPATH . "custom_header.php");
    }
}

add_action( 'after_setup_theme', 'al_setup' );

*/


// DASHBOARD

function basic_custom_dashboard_widgets() {
   global $wp_meta_boxes;

   wp_add_dashboard_widget('custom_help_widget', AL_THEMENAME. ' WordPress Theme', 'basic_custom_dashboard_help');
}

function basic_custom_dashboard_help() {
global $current_user;
      get_currentuserinfo();

echo "<p>Hi ".$current_user->display_name.", <br/><br/>Thank you for using ".AL_THEMENAME." theme.<br/><br/>Hope you like it!</p>";
}

add_action('wp_dashboard_setup', 'basic_custom_dashboard_widgets');

/* ACTIVATION / UPDATE */
/***************************************************/
/* Code written by voyagerfan5761 [technobabbl.es] */
/* for LightWord Theme on GitHub repository        */
/***************************************************/

function basic_has_been_activated() {
	# Add current version to options database, for update handler
	add_option( 'GM_theme_version', AL_THEMEVERSION );
}
register_activation_hook( __FILE__, 'basic_has_been_activated' );

function basic_has_been_updated() {
	# Update database option so we don't keep running this code
	update_option( 'GM_theme_version', AL_THEMEVERSION );
}
if( version_compare( get_option( 'GM_theme_version' ), AL_THEMEVERSION, '<' ) ) {
	basic_has_been_updated();
}

add_action( 'widgets_init', 'al_widgets_init' );
?>