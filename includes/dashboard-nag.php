<?php
/**
* Remove WP Dashboard Widget
*/

function remove_dashboard_widgets() {
    global $wp_meta_boxes;
    
    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links'] );
    //unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts'] );
    //unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments'] );
    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );
    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'] );

    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
}
add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );

// Remove Welcome
remove_action('welcome_panel', 'wp_welcome_panel');

function disable_owp_dashboard_news_widget() {
    remove_meta_box( 'owp_dashboard_news', 'dashboard', 'normal');
    remove_meta_box( 'e-dashboard-overview', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'disable_owp_dashboard_news_widget', 40);