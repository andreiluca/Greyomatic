<?php
/**
 * @package WordPress
 * @subpackage Greyomatic
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title><?php wp_title('&laquo;', true, 'right'); ?><?php bloginfo('name'); ?></title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="shortcut icon" href="<?php echo home_url(); ?>/favicon.ico" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_enqueue_script('jquery'); ?>
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/corners.css" type="text/css" media="screen" />

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.basic.js" type="text/javascript"></script>
<?php echo get_option('analytics_code'); ?>
</head>

<body>
<div id="wrapper">

<h1 id="logo"><a class="extend" title="<?php bloginfo("title"); ?>" href="<?php bloginfo('url'); ?>" name="top"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="<?php bloginfo("title"); ?>" /></a></h1>
<img src="<?php bloginfo('template_directory'); ?>/images/light.png" class="light" />

<div class="round">
<div id="body<?php echo $body_type; ?>">

<div class="menu">

<ul>
<li><a class="home" href="<?php bloginfo('url'); ?>"><?php _e('Home','greyomatic'); ?></a></li>
<?php wp_list_pages('title_li=&depth=1'); ?>
</ul>

</div>