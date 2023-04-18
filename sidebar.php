<?php
/**
 * @package WordPress
 * @subpackage Greyomatic
 */
?>
<div id="sidebar" class="column">
<div class="sidebar"><h2><?php _e('My personal Sidebar', 'greyomatic'); ?></h2></div>

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(AL_THEMENAME . ' Sidebar') ) : ?>

<h3 class="widget"><?php _e('Pages', 'greyomatic'); ?></h3>
<ul>
<?php wp_list_pages('title_li='); ?>
</ul>

<h3 class="widget"><?php _e('Search', 'greyomatic'); ?></h3>
<ul>
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
	<div><input type="text" value="<?php _e('Search', 'greyomatic'); ?>" onblur="this.value=(this.value=='') ? '<?php _e('Search', 'greyomatic'); ?>' : this.value;" onfocus="this.value=(this.value=='<?php _e('Search', 'greyomatic'); ?>') ? '' : this.value;" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="<?php _e('Search', 'greyomatic'); ?>" />
	</div>
</form>
</ul>


<h3 class="widget"><?php _e('Categories', 'greyomatic'); ?></h3>
<ul>
<?php wp_list_categories('title_li='); ?>
</ul>

<h3 class="widget"><?php _e('Blogroll', 'greyomatic'); ?></h3>
<ul>
<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
</ul>

<h3 class="widget"><?php _e('Archive', 'greyomatic'); ?></h3>
<ul>
<?php wp_get_archives('type=monthly'); ?>
</ul>

<h3 class="widget"><?php _e('Meta', 'greyomatic'); ?></h3>
<ul>
<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS','greyomatic'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>','greyomatic'); ?></a></li>
<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS','greyomatic'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>','greyomatic'); ?></a></li>
<?php wp_meta(); ?>
</ul>

<?php endif; ?>
<?php if(get_option('twitter_username')) include(TEMPLATEPATH."/widgets/twitter.php"); ?>
</div><!-- /#sidebar -->