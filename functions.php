<?php
/**
 * @package WordPress
 * @subpackage Greyomatic
 */
?>
<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'functions.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');

require_once(TEMPLATEPATH. '/basic_framework.php');

/**
 * count for trackback, pingback, comment, pings
 *
 * embed like this:
 * fb_comment_type_count('pings');
 * fb_comment_type_count('comment');
 * http://code.google.com/p/wp-basis-theme/
 */

 function fb_get_comment_type_count( $type='all', $zero = false, $one = false, $more = false, $post_id = 0) {
                global $cjd_comment_count_cache, $id, $post;

                if ( !$post_id )
                        $post_id = $post->ID;
                if ( !$post_id )
                        return;

                if ( !isset($cjd_comment_count_cache[$post_id]) ) {
                        $p = get_post($post_id);
                        $p = array($p);
                        fb_update_comment_type_cache($p);
                }
                ;
                if ( $type == 'pingback' || $type == 'trackback' || $type == 'comment' )
                        $count = $cjd_comment_count_cache[$post_id][$type];
                elseif ( $type == 'pings' )
                        $count = $cjd_comment_count_cache[$post_id]['pingback'] + $cjd_comment_count_cache[$post_id]['trackback'];
                else
                        $count = array_sum((array) $cjd_comment_count_cache[$post_id]);

                return apply_filters('fb_get_comment_type_count', $count);
        }

if ( !function_exists('fb_update_comment_type_cache') ) {
        function fb_update_comment_type_cache($queried_posts) {
                global $cjd_comment_count_cache, $wpdb;

                if ( !$queried_posts )
                        return $queried_posts;

                foreach ( (array) $queried_posts as $post )
                        if ( !isset($cjd_comment_count_cache[$post->ID]) )
                                $post_id_list[] = $post->ID;

                if ( $post_id_list ) {
                        $post_id_list = implode(',', $post_id_list);

                        foreach ( array('', 'pingback', 'trackback') as $type ) {
                                $counts = $wpdb->get_results("SELECT ID, COUNT( comment_ID ) AS ccount
                                                        FROM $wpdb->posts
                                                        LEFT JOIN $wpdb->comments ON ( comment_post_ID = ID AND comment_approved = '1' AND comment_type='$type' )
                            WHERE (post_status = 'publish' OR (post_status = 'inherit' AND post_type = 'attachment')) AND ID IN ($post_id_list)
                                                        GROUP BY ID");

                                if ( $counts ) {
                                        if ( '' == $type )
                                                $type = 'comment';
                                        foreach ( $counts as $count )
                                                $cjd_comment_count_cache[$count->ID][$type] = $count->ccount;
                                }
                        }
                }

                return $queried_posts;
        }

        add_filter('the_posts', 'fb_update_comment_type_cache');
}


// COMMENTS PINGBACKS / TABS JQUERY

function comment_tabs(){
if(is_single()||is_page()){
?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/tabs.js"></script>
<script type="text/javascript">jQuery(document).ready(function(){jQuery('tabs').tabs({linkClass : 'tabs',containerClass : 'tab-content',linkSelectedClass : 'selected',containerSelectedClass : 'selected',onComplete : function(){}});});</script>
<?php
}
}

// CANONICAL COMMENTS

function canonical_for_comments() {
global $cpage, $post;
if ( $cpage > 1 ) :
echo "\n";
echo "<link rel='canonical' href='";
echo get_permalink( $post->ID );
echo "' />\n";
endif;
}

// COMMENT OPTIONS

function options_comment_link($id) {
if (current_user_can('edit_post')) {
echo '( <a class="comment-edit-link" href="'.admin_url("comment.php?action=cdc&c=$id").'">'.__('trash it','lightword').'</a>  / ';
echo '<a class="comment-edit-link" href="'.admin_url("comment.php?action=cdc&dt=spam&c=$id").'">'.__('mark as spam','lightword').'</a> / ';
edit_comment_link(__('edit','lightword'),'&nbsp;','');
echo ' )';
}
}

// SPAM PROTECT

function check_referrer() {
if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == "") {
wp_die( __('Please enable referrers in your browser, or, if you\'re a spammer, bugger off!','lightword') );
}
}

// THREADED COMMENTS

function nested_comments($comment, $args, $depth) { $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>"><div id="comment-<?php comment_ID(); ?>">
<div class="comment_content"><div class="comment-meta commentmetadata"><div class="alignleft"><?php echo get_avatar($comment,$size='36'); ?></div>
<div class="alignleft" style="padding-top:5px;"><strong class="comment_author"><?php comment_author_link() ?></strong><br/><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date(__('F jS, Y - H:i','lightword')) ?></a> <?php options_comment_link(get_comment_ID()); ?></div><div class="clear"></div></div>
<?php comment_text() ?>
<div class="reply"><?php comment_reply_link(array_merge( $args, array('reply_text' => __('( REPLY )','lightword'), 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
<?php if ($comment->comment_approved == '0') : ?><span class="moderation"><?php _e('Your comment is awaiting moderation.','lightword'); ?></span><br /><?php endif; ?></div><div class="clear"></div></div>
<?php
}

add_theme_support( 'automatic-feed-links' );

// LOCALIZATION

load_theme_textdomain('greyomatic', get_template_directory() . '/lang');

// ENABLE FUNCTIONS

add_action('wp_footer',  'comment_tabs');
add_action( 'wp_head', 'canonical_for_comments' );

remove_action('wp_head', 'wp_generator');
remove_filter('the_content', 'wptexturize');
?>