<?php
/**
 * @package amigo-performance
 */
if (!defined('WP_UNINSTALL_PLUGIN')) {
  die;
}

// if (!get_option('plugin_do_uninstall', false)) exit;

delete_option( 'amigoPerf_rqs' );
delete_option( 'amigoPerf_remoji' );
delete_option( 'amigoPerf_defer' );
delete_option( 'amigoPerf_iframelazy' );
delete_option( 'amigoPerf_lazyload' );