<?php
/** Reset URL & Make Alt */

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Tao không nói câu đó, và cả câu này nữa!';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/** Add Cleon Logo */
function my_login_logo() { ?>
    <script type='text/javascript' src='//cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js'></script>
    <script>
        jQuery(document).ready(function($){
            $('#login').children('h1,p,form').wrapAll('<div class="wrapall" />');
            $('.wrapall').children('h1,p.hello').wrapAll('<div class="wrap-login-logo" />');
            $('.wrapall').children('form,p').not('h1,p.hello').wrapAll('<div class="wrap-login-form" />');
        });
    </script>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

//* Add custom message to WordPress login page

function cleon_login_message( $message ) {
    if ( empty($message) ){
        return '<p class="hello"><i>Thiết kế web chuyên nghiệp<br>Hỗ trợ: 084 262 5858</i></p>';
    } else {
        return $message;
    }
}
add_filter( 'login_message', 'cleon_login_message' );

function login_error_override()
{
    return '<p><i>Bạn nhập sai thông tin!<br>Nếu quên tài khoản hoặc mật khẩu vui lòng <a href="?action=lostpassword" title="Lost Password">Click vào đây</a></i></p>☉_☉';
}
add_filter('login_errors', 'login_error_override');