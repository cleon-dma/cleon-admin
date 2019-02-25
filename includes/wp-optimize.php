<?php
/**
 * Modify admin footer text
 */
 
 function modify_footer() {
    echo 'Created by <a href="mailto:hotro@cleon.vn">Cleon.vn</a>.';
}
add_filter( 'admin_footer_text', 'modify_footer' );

/**
 * Disable Emoji mess
 */
 
function disable_wp_emojicons() {
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
    add_filter( 'emoji_svg_url', '__return_false' );
}
add_action( 'init', 'disable_wp_emojicons' );

function disable_emojicons_tinymce( $plugins ) {
    return is_array( $plugins ) ? array_diff( $plugins, array( 'wpemoji' ) ) : array();
}

/**
 * Disable xmlrpc.php
 */
 
add_filter( 'xmlrpc_enabled', '__return_false' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );

// Remve bar logo
add_action( 'wp_before_admin_bar_render', function() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
}, 7 );

/**
 * Remove query string from static resources 
 */
 
 function remove_cssjs_ver( $src ) {
    if ( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );

/** Remove version from head */
remove_action('wp_head', 'wp_generator');

/** Rremove version from rss */
add_filter('the_generator', '__return_empty_string');

/** Change Version */
function change_footer_version() {
    return 'Coweb v1.1.0';
  }
  add_filter( 'update_footer', 'change_footer_version', 9999 );