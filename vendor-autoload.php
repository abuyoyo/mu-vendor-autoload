<?php
/**
 * Plugin Name: Vendor Autoload
 * Description: Include Composer autoload.php (Wordpress mu-plugin)
 * Version: 0.4
 * Author: abuyoyo
 * Author URI: https://github.com/abuyoyo/
 * Last Update: 2019_09_07
 */

/**
 * @todo this can be achieved with a post-install composer script
 * 		No need to access database
 * 		No need to run exec('composer')
 */

if ( isset( $_REQUEST['reset_vendor_dir'] ) ){
	delete_option( 'vendor_dir' );
}

if ( ! $vendor_dir = get_option( 'vendor_dir' ) ){
	$vendor_dir = exec('composer config vendor-dir --absolute');
	if ($vendor_dir)
		add_option( 'vendor_dir', $vendor_dir, '', true );
	else
		return;
}

include_once $vendor_dir . '/autoload.php';

// other mu-plugins that rely on $vendor_dir can hook here
do_action('vendor_autoload');
// redundancy
do_action('vendor_dir');