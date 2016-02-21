<?php 
function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	function _remove_script_version( $src ){
	$parts = explode( '?', $src );
	return $parts[0];
}

function enqueue_my_scripts() {
wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', array('jquery'), '1.9.1', false); // adding in header
wp_enqueue_script( 'bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), true); // addition of 'get_template_directory_uri()'
}




add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

function login_with_email_address($username) {
    $user = get_user_by_email($username);
    if(!empty($user->user_login))
        $username = $user->user_login;
    return $username;
}
add_action('wp_authenticate','login_with_email_address');

function change_username_wps_text($text){
       if(in_array($GLOBALS['pagenow'], array('wp-login.php'))){
         if ($text == 'Username'){$text = 'Username / Email';}
            }
                return $text;
         }
add_filter( 'gettext', 'change_username_wps_text' );
add_filter( 'wp_nav_menu_items', 'your_custom_menu_item', 10, 2 );
function your_custom_menu_item ( $items, $args ) {

if ( is_user_logged_in() ) {
    $items .= '<a href="user profile link">Show whatever</a>';
} else {
     $items .= '<a href="login link">Show whatever</a>';
}

    return $items; /* This will have the menu items */
}


/*function pjw_login_adminbar( $wp_admin_bar) {
 if ( !is_user_logged_in() )
 $wp_admin_bar->add_menu( array( 'title' => __( 'Log In' ), 'href' => wp_login_url() ) );
}
add_action( 'admin_bar_menu', 'pjw_login_adminbar' );
add_filter( 'show_admin_bar', '__return_true' , 1000 );*/

// always show admin bar
/*function pjw_login_adminbar( $wp_admin_bar) {
    if ( !is_user_logged_in() )
    $wp_admin_bar->add_menu( array( 'title' => __( 'Log In' ), 'href' => wp_login_url() ) );
}
add_action( 'admin_bar_menu', 'pjw_login_adminbar' );
add_filter( 'show_admin_bar', '__return_true' , 1000 );
*/
function annointed_admin_bar_remove() {
        global $wp_admin_bar;

        /* Remove their stuff */
        $wp_admin_bar->remove_menu('wp-logo');
}

add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);





?>
<?php
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );
 
function my_show_extra_profile_fields( $user ) { ?>
 
<h3>Extra profile information</h3>
 
<table class="form-table">
    <tr>
        <th><label for="twitter">Twitter</label></th>
        <td>
            <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
            <span class="description">Please enter your Twitter username.</span>
        </td>
    </tr>
</table>





<?php }
