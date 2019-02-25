<?php
/** Strings Replace */
function coweb_text_string($coweb_text){
    $coweb_text= str_ireplace('WooCommerce', 'Shop', $coweb_text);
    $coweb_text= str_ireplace('elementor', 'CoBuilder', $coweb_text);
    $coweb_text= str_ireplace('WordPress', 'CoWP', $coweb_text);
    return $coweb_text;
}
add_filter('gettext', 'coweb_text_string');
add_filter('ngettext', 'coweb_text_string');