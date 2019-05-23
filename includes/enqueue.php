<?php
/**
 * Admin css
 */

function load_custom_wp_admin_style() {
    wp_register_style( 'custom_wp_admin_css',  plugin_dir_url( __DIR__ ) . 'assets/css/admin-style.css' );
    wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style', 99 );

/**
* Login css
*/
function load_custom_wp_login_style() {
    wp_register_style( 'custom-login',  plugin_dir_url( __DIR__ ) . 'assets/css/login-style.css' );
    wp_enqueue_style( 'custom-login' );
}
add_action( 'login_enqueue_scripts', 'load_custom_wp_login_style', 99 );

/**Hook front-end css admibar */
function override_admin_bar_css() { 

	if ( is_admin_bar_showing() ) { ?>
 
 
	   <style type="text/css">
		  #wpadminbar {
			  background: #2f3f46;
		  }
		  #wpadminbar .ab-top-menu>li.hover>.ab-item, #wpadminbar.nojq .quicklinks .ab-top-menu>li>.ab-item:focus, #wpadminbar:not(.mobile) .ab-top-menu>li:hover>.ab-item, #wpadminbar:not(.mobile) .ab-top-menu>li>.ab-item:focus,#wpadminbar .quicklinks .ab-sub-wrapper .menupop.hover>a, #wpadminbar .quicklinks .menupop ul li a:focus, #wpadminbar .quicklinks .menupop ul li a:focus strong, #wpadminbar .quicklinks .menupop ul li a:hover, #wpadminbar .quicklinks .menupop ul li a:hover strong, #wpadminbar .quicklinks .menupop.hover ul li a:focus, #wpadminbar .quicklinks .menupop.hover ul li a:hover, #wpadminbar .quicklinks .menupop.hover ul li div[tabindex]:focus, #wpadminbar .quicklinks .menupop.hover ul li div[tabindex]:hover, #wpadminbar li #adminbarsearch.adminbar-focused:before, #wpadminbar li .ab-item:focus .ab-icon:before, #wpadminbar li .ab-item:focus:before, #wpadminbar li a:focus .ab-icon:before, #wpadminbar li.hover .ab-icon:before, #wpadminbar li.hover .ab-item:before, #wpadminbar li:hover #adminbarsearch:before, #wpadminbar li:hover .ab-icon:before, #wpadminbar li:hover .ab-item:before, #wpadminbar.nojs .quicklinks .menupop:hover ul li a:focus, #wpadminbar.nojs .quicklinks .menupop:hover ul li a:hover,#wpadminbar:not(.mobile)>#wp-toolbar a:focus span.ab-label, #wpadminbar:not(.mobile)>#wp-toolbar li:hover span.ab-label, #wpadminbar>#wp-toolbar li.hover span.ab-label {
			color: #008749;
		  }
	   </style>
 
	<?php }
 
 }

add_action( 'wp_head', 'override_admin_bar_css' );


/**CDN Jquery */
add_action( 'init', function(){
	if (  ! is_admin()) {
		if( is_ssl() ){
			$protocol = 'https';
		}else {
			$protocol = 'http';
		}

		/** @var WP_Scripts $wp_scripts */
		global  $wp_scripts;
		/** @var _WP_Dependency $core */
		$core = $wp_scripts->registered[ 'jquery-core' ];
		//$core_version = $core->ver;
		$core->src = "$protocol://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js";

		if ( WP_DEBUG ) {
			/** @var _WP_Dependency $migrate */
			$migrate         = $wp_scripts->registered[ 'jquery-migrate' ];
			//$migrate_version = 1.2.1;
			$migrate->src    = "$protocol://cdn.jsdelivr.net/jquery.migrate/1.2.1/jquery-migrate.min.js";
		}else{
			/** @var _WP_Dependency $jquery */
			$jquery = $wp_scripts->registered[ 'jquery' ];
			$jquery->deps = [ 'jquery-core' ];
		}

    }


},11 );