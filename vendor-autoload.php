<?php
/**
 * Plugin Name: Vendor Autoload
 * Description: Include Composer autoload.php (Wordpress mu-plugin)
 * Version: 0.2
 * Author: abuyoyo
 * Author URI: https://github.com/abuyoyo/
 * Last Update: 2019_08_25
 */

if ( ! $vendor_dir = get_option( 'vendor_dir' ) ){
	$vendor_dir = exec('composer config vendor-dir --absolute');
	if ($vendor_dir)
		add_option( 'vendor_dir', $vendor_dir, '', true );
	else
		return;
}

include_once $vendor_dir . '/autoload.php';