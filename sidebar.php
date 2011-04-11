<div id="sidebar" class="column">
<div class="sidebar"><h2>My personal Sidebar</h2></div>

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

<h3><?php _e('Pages'); ?></h3>
<ul>
<?php wp_list_pages('title_li='); ?>
</ul>

<h3><?php _e('Categories'); ?></h3>
<ul>
<?php wp_list_categories('title_li='); ?>
</ul>

<h3><?php _e('Blogroll'); ?></h3>
<ul>
<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
</ul>

<h3><?php _e('Archive'); ?></h3>
<ul>
<?php wp_get_archives('type=monthly'); ?>
</ul>

<h3><?php _e('Meta'); ?></h3>
<ul>
<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS','lightword'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>','lightword'); ?></a></li>
<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS','lightword'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>','lightword'); ?></a></li>
<?php wp_meta(); ?>
</ul>

<?php endif; ?>
<div class="sidebar"><h2>Twitter</h2></div>


<!--<div class="ads">
<img src="http://envato.s3.amazonaws.com/referrer_adverts/tf_260x120_v1.gif" alt="" />
</div>-->

</div><!-- /#sidebar -->