<?php 
/**
 * Plugin Name: Anchors Away
 * Plugin URI: https://github.com/tleen/anchors-away
 * Description: Disable links on your (non-administrative) pages with optional popup message.
 * Version: 0.0.0
 * Author: tleen
 * Author URI: http://www.thomasleen.com
 * License: MIT
 */
defined('ABSPATH') or die;


// If url indicates admin page, skip this entirely
if(!preg_match("/(.*)\/wp-admin\/(.*)/", add_query_arg(array()))){
  wp_enqueue_script('jquery');
  wp_enqueue_script('anchors-away', plugins_url( 'anchors-away.js', __FILE__ ), array('jquery'));

  // xx - setup admin screen to get custom message
  function aa_instantiate(){
?>
<script type="text/javascript" language="javascript">
  this.anchorsAway('');
</script>
<?php
  }
  
  add_action('wp_footer', 'aa_instantiate'); 
}
