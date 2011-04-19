<?php
/**
 * @package WordPress
 * @subpackage Basic
 */
?>
<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'general.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
?>

<table class="widefat">
<tr>
<th class="valign"><?php _e('Twitter username', AL_THEMESLUG); ?></th>
<td>
<p><?php _e('Type your twitter username here, eg.  ', AL_THEMESLUG); ?></p>
<input name="twitter_username" type="text" id="twitter_username" value="<?php echo get_option('twitter_username'); ?>" size="30" />
</td>
</tr>

<tr>
<th class="valign"><?php _e('Google Analytics Code', AL_THEMESLUG); ?></th>
<td>
<p><?php _e('Paste your analytics code here, it will get applied to each page', AL_THEMESLUG); ?></p><br>
<textarea name="analytics_code" class="code" style="width: 80%; font-size: 12px;" id="analytics_code" rows="7" cols="60"><?php echo get_option('analytics_code'); ?></textarea><br><br>
</td>
</tr>

</table>