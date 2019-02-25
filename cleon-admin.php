<?php
/**
 * @package cleon_admin
 * @version 1.0.0 beta
 */
/*
Plugin Name: Cleon Admin
Plugin URI: http://cleon.vn
Description: Chỉ chừng đó thôi
Author: Lê Duy Quang
Version: 1.0.1
Author URI: http://leduyquang.com
*/

/** enqueue */
require_once( 'includes/enqueue.php' );

/** login */
require_once( 'includes/login-page.php' );

/** Strings Replace */
require_once( 'includes/strings.php' );

/** dashboard */
require_once( 'includes/dashboard-nag.php' );

/** remove */
//require_once( 'includes/remove-options.php' );

/** optimize */
require_once( 'includes/wp-optimize.php' );