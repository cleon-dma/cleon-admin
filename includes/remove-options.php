<?php
/** Remove Screen Options */
function remove_screen_options(){
    return current_user_can( 'manage_network' );
 }
 add_filter('screen_options_show_screen', 'remove_screen_options');

/** Remove Help tab */
function oz_remove_help_tabs( $old_help, $screen_id, $screen ){
    $screen->remove_help_tabs();
    return $old_help;
}
add_filter( 'contextual_help', 'oz_remove_help_tabs', 999, 3 );

/** Remove comment metabox */
function my_remove_meta_boxes() {
	if ( ! current_user_can( 'manage_network' ) ) {
		//remove_meta_box( 'linktargetdiv', 'link', 'normal' );
		//remove_meta_box( 'linkxfndiv', 'link', 'normal' );
		//remove_meta_box( 'linkadvanceddiv', 'link', 'normal' );
		//remove_meta_box( 'postexcerpt', 'post', 'normal' );
		remove_meta_box( 'trackbacksdiv', 'post', 'normal' );
		remove_meta_box( 'formatdiv', 'post', 'normal' );
		remove_meta_box( 'commentstatusdiv', 'post', 'normal' );
		remove_meta_box( 'commentsdiv', 'post', 'normal' );
		//remove_meta_box( 'revisionsdiv', 'post', 'normal' );
		//remove_meta_box( 'authordiv', 'post', 'normal' );
		//remove_meta_box( 'sqpt-meta-tags', 'post', 'normal' );
	}
}
add_action( 'admin_menu', 'my_remove_meta_boxes' );

/**
* Remove Columns
*/

function coweb_manage_columns( $columns ) {
	unset($columns['comments']);
	unset($columns['tags']);
	return $columns;
  }
  
function coweb_column_init() {
	if ( ! current_user_can( 'manage_network' ) ) {
		add_filter( 'manage_posts_columns' , 'coweb_manage_columns' );
		add_filter( 'manage_pages_columns' , 'coweb_manage_columns' );
	}
}
add_action( 'admin_init' , 'coweb_column_init' );

/**
* Add Except box
*/
add_filter('default_hidden_meta_boxes', 'show_hidden_meta_boxes', 10, 2);
 
function show_hidden_meta_boxes($hidden, $screen) {
    if ( 'post' == $screen->base ) {
        foreach($hidden as $key=>$value) {
            if ('postexcerpt' == $value) {
                unset($hidden[$key]);
                break;
            }
        }
    }
 
    return $hidden;
}

/**
* Set 10 Post/page
*/
add_action('init', 'reset_screen_options');
function reset_screen_options() {
	update_user_meta( get_current_user_id(), 'edit_product_per_page', 10 );
	update_user_meta( get_current_user_id(), 'edit_post_per_page', 10 );
}