<div class="sidebar"><h2><?php _e('Twitter', 'greyomatic'); ?></h2></div>
<script src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 4,
  interval: 6000,
  width: 284,
  height: 300,
  theme: {
    shell: {
      background: '#efefef',
      color: '#666666'
    },
    tweets: {
      background: '#efefef',
      color: '#666666',
      links: '#333333'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: false,
    hashtags: false,
    timestamp: true,
    avatars: false,
    behavior: 'all'
  }
}).render().setUser('<?php echo get_option('twitter_username'); ?>').start();
</script>