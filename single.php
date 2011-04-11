<?php
get_header();
$comments_nr = fb_get_comment_type_count('comment');
$trackbacks_nr = fb_get_comment_type_count('pings');
$post_tags = get_the_tags($post->ID);
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class('article single'); ?> id="post-<?php the_ID(); ?>">
<div class="date"><div class="postdate"><span class="day"><?php the_time('d'); ?></span><span class="month"><?php the_time('M'); ?></span></div></div>
<div class="comments-box"><?php echo $comments_nr; ?></div>
<h2 class="permalink"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
<?php the_content('Continue reading &raquo;'); ?>
<div class="post-info">Posted on <u><?php the_time('d/m/Y'); ?></u> by <u><?php the_author(); ?></u> in <?php the_category(', '); ?></div>
<?php if($post_tags): ?><div class="post-info"><?php the_tags(); ?></div><?php endif; ?>
</div>


<?php endwhile; else: ?>
<div class="article">
<h2>Not found</h2>
<p>Sorry, but you are looking for something that isn't here.</p>
</div>
<?php endif; ?>


<?php comments_template(); ?>

</div>
<?php get_sidebar(); ?>

<div class="clear"></div>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

</div><!-- /.round -->

<?php get_footer(); ?>