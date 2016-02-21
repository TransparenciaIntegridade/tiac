<?php
ob_start();

/**
 * Edit user administration panel.
 *
 * @package WordPress
 * @subpackage Administration
 */

/** WordPress Administration Bootstrap */
require_once( dirname( __FILE__ ) . '/admin.php' );
 
wp_reset_vars( array( 'action', 'user_id', 'wp_http_referer' ) );

$user_id = (int) $user_id;
$current_user = wp_get_current_user();
if ( ! defined( 'IS_PROFILE_PAGE' ) )
	define( 'IS_PROFILE_PAGE', ( $user_id == $current_user->ID ) );

if ( ! $user_id && IS_PROFILE_PAGE )
	$user_id = $current_user->ID;
elseif ( ! $user_id && ! IS_PROFILE_PAGE )
	wp_die(__( 'Invalid user ID.' ) );
elseif ( ! get_userdata( $user_id ) )
	wp_die( __('Invalid user ID.') );

wp_enqueue_script('user-profile');

$title = IS_PROFILE_PAGE ? __('Profile') : __('Edit User');
if ( current_user_can('edit_users') && !IS_PROFILE_PAGE )
	$submenu_file = 'users.php';
else
	$submenu_file = 'profile.php';

if ( current_user_can('edit_users') && !is_user_admin() )
	$parent_file = 'users.php';
else
	$parent_file = 'profile.php';

$profile_help = '<p>' . __('Your profile contains information about you (your &#8220;account&#8221;) as well as some personal options related to using WordPress.') . '</p>' .
	'<p>' . __('You can change your password, turn on keyboard shortcuts, change the color scheme of your WordPress administration screens, and turn off the WYSIWYG (Visual) editor, among other things. You can hide the Toolbar (formerly called the Admin Bar) from the front end of your site, however it cannot be disabled on the admin screens.') . '</p>' .
	'<p>' . __('Your username cannot be changed, but you can use other fields to enter your real name or a nickname, and change which name to display on your posts.') . '</p>' .
	'<p>' . __('Required fields are indicated; the rest are optional. Profile information will only be displayed if your theme is set up to do so.') . '</p>' .
	'<p>' . __('Remember to click the Update Profile button when you are finished.') . '</p>';
//echo("teste");
get_current_screen()->add_help_tab( array(
	'id'      => 'overview',
	'title'   => __('Overview'),
	'content' => $profile_help,
) );

get_current_screen()->set_help_sidebar(
    '<p><strong>' . __('For more information:') . '</strong></p>' .
    '<p>' . __('<a href="http://codex.wordpress.org/Users_Your_Profile_Screen" target="_blank">Documentation on User Profiles</a>') . '</p>' .
    '<p>' . __('<a href="https://wordpress.org/support/" target="_blank">Support Forums</a>') . '</p>'
);
$numero_associado = $_POST["associado"];
		
$id_associado = $wpdb->get_row("SELECT external_identifier FROM civicrm_contact WHERE external_identifier = '{$numero_associado}'");
//var_dump($id_associado);
$wp_http_referer = remove_query_arg(array('update', 'delete_count'), $wp_http_referer );

$user_can_edit = current_user_can( 'edit_posts' ) || current_user_can( 'edit_pages' );

/**
 * Optional SSL preference that can be turned on by hooking to the 'personal_options' action.
 *
 * @since 2.7.0
 *
 * @param object $user User data object
 */




function use_ssl_preference($user) {
?>
	<tr>
		<th scope="row"><?php _e('Use https')?></th>
		<td><label for="use_ssl"><input name="use_ssl" type="checkbox" id="use_ssl" value="1" <?php checked('1', $user->use_ssl); ?> /> <?php _e('Always use https when visiting the admin'); ?></label></td>
	</tr>
<?php
}

/**
 * Filter whether to allow administrators on Multisite to edit every user.
 *
 * Enabling the user editing form via this filter also hinges on the user holding
 * the 'manage_network_users' cap, and the logged-in user not matching the user
 * profile open for editing.
 *
 * The filter was introduced to replace the EDIT_ANY_USER constant.
 *
 * @since 3.0.0
 *
 * @param bool $allow Whether to allow editing of any user. Default true.
 */
if ( is_multisite()
	&& ! current_user_can( 'manage_network_users' )
	&& $user_id != $current_user->ID
	&& ! apply_filters( 'enable_edit_any_user_configuration', true )
) {
	wp_die( __( 'You do not have permission to edit this user.' ) );
}

// Execute confirmed email change. See send_confirmation_on_profile_email().
if ( is_multisite() && IS_PROFILE_PAGE && isset( $_GET[ 'newuseremail' ] ) && $current_user->ID ) {
	$new_email = get_option( $current_user->ID . '_new_email' );
	if ( $new_email[ 'hash' ] == $_GET[ 'newuseremail' ] ) {
		$user = new stdClass;
		$user->ID = $current_user->ID;
		$user->user_email = esc_html( trim( $new_email[ 'newemail' ] ) );
		if ( $wpdb->get_var( $wpdb->prepare( "SELECT user_login FROM {$wpdb->signups} WHERE user_login = %s", $current_user->user_login ) ) )
			$wpdb->query( $wpdb->prepare( "UPDATE {$wpdb->signups} SET user_email = %s WHERE user_login = %s", $user->user_email, $current_user->user_login ) );
		wp_update_user( $user );
		delete_option( $current_user->ID . '_new_email' );
		wp_redirect( add_query_arg( array('updated' => 'true'), self_admin_url( 'profile.php' ) ) );
		die();
	}
} elseif ( is_multisite() && IS_PROFILE_PAGE && !empty( $_GET['dismiss'] ) && $current_user->ID . '_new_email' == $_GET['dismiss'] ) {
	delete_option( $current_user->ID . '_new_email' );
	wp_redirect( add_query_arg( array('updated' => 'true'), self_admin_url( 'profile.php' ) ) );
	die();
}

switch ($action) {
case 'update':

check_admin_referer('update-user_' . $user_id);

if ( !current_user_can('edit_user', $user_id) )
	wp_die(__('You do not have permission to edit this user.'));

if ( IS_PROFILE_PAGE ) {
	/**
	 * Fires before the page loads on the 'Your Profile' editing screen.
	 *
	 * The action only fires if the current user is editing their own profile.
	 *
	 * @since 2.0.0
	 *
	 * @param int $user_id The user ID.
	 */
	do_action( 'personal_options_update', $user_id );
} else {
	/**
	 * Fires before the page loads on the 'Edit User' screen.
	 *
	 * @since 2.7.0
	 *
	 * @param int $user_id The user ID.
	 */
	do_action( 'edit_user_profile_update', $user_id );
}

if ( !is_multisite() ) {
	$errors = edit_user($user_id);
} else {
	$user = get_userdata( $user_id );

	// Update the email address in signups, if present.
	if ( $user->user_login && isset( $_POST[ 'email' ] ) && is_email( $_POST[ 'email' ] ) && $wpdb->get_var( $wpdb->prepare( "SELECT user_login FROM {$wpdb->signups} WHERE user_login = %s", $user->user_login ) ) )
		$wpdb->query( $wpdb->prepare( "UPDATE {$wpdb->signups} SET user_email = %s WHERE user_login = %s", $_POST[ 'email' ], $user_login ) );

	// We must delete the user from the current blog if WP added them after editing.
	$delete_role = false;
	$blog_prefix = $wpdb->get_blog_prefix();
	if ( $user_id != $current_user->ID ) {
		$cap = $wpdb->get_var( "SELECT meta_value FROM {$wpdb->usermeta} WHERE user_id = '{$user_id}' AND meta_key = '{$blog_prefix}capabilities' AND meta_value = 'a:0:{}'" );
		if ( !is_network_admin() && null == $cap && $_POST[ 'role' ] == '' ) {
			$_POST[ 'role' ] = 'contributor';
			$delete_role = true;
		}
	}
	if ( !isset( $errors ) || ( isset( $errors ) && is_object( $errors ) && false == $errors->get_error_codes() ) )
		$errors = edit_user($user_id);
	if ( $delete_role ) // stops users being added to current blog when they are edited
		delete_user_meta( $user_id, $blog_prefix . 'capabilities' );

	if ( is_multisite() && is_network_admin() && !IS_PROFILE_PAGE && current_user_can( 'manage_network_options' ) && !isset($super_admins) && empty( $_POST['super_admin'] ) == is_super_admin( $user_id ) )
		empty( $_POST['super_admin'] ) ? revoke_super_admin( $user_id ) : grant_super_admin( $user_id );
}

if ( !is_wp_error( $errors ) ) {
	$redirect = add_query_arg( 'updated', true, get_edit_user_link( $user_id ) );
	if ( $wp_http_referer )
		$redirect = add_query_arg('wp_http_referer', urlencode($wp_http_referer), $redirect);
	wp_redirect($redirect);
	exit;
}

default:
$profileuser = get_user_to_edit($user_id);

if ( !current_user_can('edit_user', $user_id) )
	wp_die(__('You do not have permission to edit this user.'));

include (ABSPATH . 'wp-admin/admin-header.php');
?>

<?php if ( !IS_PROFILE_PAGE && is_super_admin( $profileuser->ID ) && current_user_can( 'manage_network_options' ) ) { ?>
	<div class="updated"><p><strong><?php _e('Important:'); ?></strong> <?php _e('This user has super admin privileges.'); ?></p></div>
<?php } ?>
<?php if ( isset($_GET['updated']) ) : ?>		   
<div id="message" class="updated">
	<?php if ( IS_PROFILE_PAGE ) : ?>
	<p><strong><?php _e('Profile updated.')?></strong></p>
	<?php else: ?>
	<p><strong><?php _e('User updated.') ?></strong></p>
	<?php endif; ?>
	<?php if ( $wp_http_referer && !IS_PROFILE_PAGE ) : ?>
	<p><a href="<?php echo esc_url( $wp_http_referer ); ?>"><?php _e('&larr; Back to Users'); ?></a></p>
	<?php endif; ?>
</div>
<?php endif; ?>
<?php if ( isset( $errors ) && is_wp_error( $errors ) ) : ?>
<div class="error"><p><?php echo implode( "</p>\n<p>", $errors->get_error_messages() ); ?></p></div>
<?php endif; ?>

<div class="wrap" id="profile-page">
<h2>
<?php
echo esc_html( $title );
if ( ! IS_PROFILE_PAGE ) {
	if ( current_user_can( 'create_users' ) ) { ?>
		<a href="user-new.php" class="add-new-h2"><?php echo esc_html_x( 'Add New', 'user' ); ?></a>
	<?php } elseif ( is_multisite() && current_user_can( 'promote_users' ) ) { ?>
		<a href="user-new.php" class="add-new-h2"><?php echo esc_html_x( 'Add Existing', 'user' ); ?></a>
	<?php }
} ?>
</h2>

<?php
$entity_id = $wpdb->get_row("SELECT outro_18 FROM civicrm_value_outro_15 WHERE id = '{$user_id}'");
$external_id = $wpdb->get_row("SELECT external_identifier FROM wp_users WHERE id = '{$user_id}'");
$id_email = $wpdb->get_row("SELECT email FROM civicrm_email WHERE external_identifier = '{$numero_associado}'");





////////////////////////////////////////////////////////////////////////////////////////////



//print_r($id_email) ;
$id_contatos = $wpdb->get_row("SELECT id FROM civicrm_contact WHERE external_identifier = '{$external_id->external_identifier}'");
$ano_atual= date("Y");
$quotas_2013 = $wpdb->get_row("SELECT receive_date,contribution_status_id FROM civicrm_contribution WHERE contact_id = {$id_contatos->id} AND total_amount = '10.00' AND receive_date LIKE '%2013%' ORDER BY receive_date DESC",ARRAY_A);
$quotas_2014 = $wpdb->get_row("SELECT receive_date,contribution_status_id FROM civicrm_contribution WHERE contact_id = {$id_contatos->id} AND total_amount = '10.00' AND receive_date LIKE '%2014%' ORDER BY receive_date DESC",ARRAY_A);
$quotas_2015 = $wpdb->get_row("SELECT receive_date,contribution_status_id FROM civicrm_contribution WHERE contact_id = {$id_contatos->id} AND total_amount = '10.00' AND receive_date LIKE '%2015%' ORDER BY receive_date DESC",ARRAY_A);
print_r($quotas_2015) ;

$quotas_atuais = $wpdb->get_row("SELECT receive_date,contribution_status_id FROM civicrm_contribution WHERE contact_id = {$id_contatos->id} AND total_amount = '12.00' AND receive_date LIKE '%{$ano_atual}%' ORDER BY receive_date DESC",ARRAY_A);
 
$donativos = $wpdb->get_row("SELECT SUM(total_amount) FROM civicrm_contribution WHERE contact_id = '{$id_contatos->id}' AND contribution_page_id ='4' AND  contribution_status_id = '1'",ARRAY_A);
$googleWallet = $wpdb->get_row("SELECT SUM(total_amount) FROM civicrm_contribution WHERE contact_id = '{$id_contatos->id}' AND contribution_page_id ='8'AND  contribution_status_id = '1'",ARRAY_A);





//echo $ano_atual;
/*	 
	echo "<script>alert('Ainda não pode pagar quotas pelo facto da sua inscrição ainda se encontrar sob aprovação pela Direção.Seremos breves.Obrigado.')</script>";
	 //header('Location: '.$newURL);
	 //die();
	wp_die(__('You do not have permission to edit this user.'));
	 }*/



?>
<div class="row">
<table>
	<tr>
		<td>
			<div>
<form action="#" method="post">
	<button class='btn btn-default col-xs-6' style='cursor:pointer;width:300px;height:100px;background: #1e5799; 
	background: -moz-linear-gradient(top, #1e5799 0%, #2989d8 50%, #207cca 51%, #7db9e8 100%); 
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#1e5799), color-stop(50%,#2989d8), color-stop(51%,#207cca), color-stop(100%,#7db9e8)); 
	background: -webkit-linear-gradient(top, #1e5799 0%,#2989d8 50%,#207cca 51%,#7db9e8 100%); 
	background: -o-linear-gradient(top, #1e5799 0%,#2989d8 50%,#207cca 51%,#7db9e8 100%);
	background: -ms-linear-gradient(top, #1e5799 0%,#2989d8 50%,#207cca 51%,#7db9e8 100%); 
	background: linear-gradient(to bottom, #1e5799 0%,#2989d8 50%,#207cca 51%,#7db9e8 100%); 
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e5799', endColorstr='#7db9e8',GradientType=0 ); /* IE6-9 */border:2px solid;
	border-radius:25px;' type="submit" name="quotas">
	<h2 style='color:#fff'>Pagar Quota</h2>
	</button>
</form>

</div>

 <h2>Histórico de pagamento de quota</h2>
<?php
    	echo "<div style='color: #3a87ad; width: 70%; background-color: #d9edf7; border-color: #bce8f1; border-radius: 10px; padding: 8px 35px 8px 14px;'>";

			$contribution_status_id_2013 = $quotas_2013['contribution_status_id'];
			$datas_pagamento_2013 = explode("-",$quotas_2013['receive_date']);
			$datas_pagamento_2013 = $datas_pagamento_2013[0];

			$contribution_status_id_2014 = $quotas_2014['contribution_status_id'];
			$datas_pagamento_2014 = explode("-",$quotas_2014['receive_date']);
			$datas_pagamento_2014 = $datas_pagamento_2014[0];

			$contribution_status_id_2015 = $quotas_2015['contribution_status_id'];
			$datas_pagamento_2015 = explode("-",$quotas_2015['receive_date']);
			$datas_pagamento_2015 = $datas_pagamento_2015[0];

			$contribution_status_id_quotas_atuais = $quotas_atuais['contribution_status_id'];
			$datas_pagamento_quotas_atuais = explode("-",$quotas_atuais['receive_date']);
			$datas_pagamento_quotas_atuais = $datas_pagamento_quotas_atuais[0]; 
			echo $quotas_atuais;

			if($contribution_status_id_2013 == 1 && $datas_pagamento_2013 == "2013"){
				echo "<div style='color:green;'>Quotas regularizadas de: " . $quotas_2015 . "</div>";
				
			}

			if($contribution_status_id_2014 == 1 && $datas_pagamento_2014 == "2014"){
				echo "<div style='color:green;'>Quotas regularizadas de: " . $datas_pagamento_2014 . "</div>";
			}

			if($contribution_status_id_2015 == 1 && $datas_pagamento_2015 == "2015"){
				echo "<div style='color:green;'>Quotas regularizadas de: " . $datas_pagamento_2015 . "</div>";
			}

			if($contribution_status_id_quotas_atuais == 1 && $datas_pagamento_quotas_atuais == $datas_pagamento_quotas_atuais){
				echo "<div style='color:green;'>Quotas regularizadas de: " . $datas_pagamento_quotas_atuais . "</div>";
			}
  
			if($contribution_status_id_2013 == 2 && $datas_pagamento_2013 == "2013"){
				echo "<div style='color:red;'>Quotas não regularizadas de: " . $datas_pagamento_2013 . "</div>";
			}

			if($contribution_status_id_2014 != 1 && $datas_pagamento_2014 == "2014"){
			echo "<div style='color:red;'>Quotas não regularizadas de: " . $datas_pagamento_2014 . "</div>";
			}

			if($contribution_status_id_2015 != 1 && $datas_pagamento_2015 == "2015"){
			echo "<div style='color:red;'>Quotas não regularizadas de: " . $datas_pagamento_2015 . "</div>";
			}


			if($contribution_status_id_quotas_atuais != 1 && $datas_pagamento_quotas_atuais == $datas_pagamento_quotas_atuais){
			$wpdb->query("INSERT INTO wp_users (external_identifier) VALUES('$numero_associado') ");
			 echo "<div style='color:red;'>Quotas não regularizadas de: " .$ano_atual . "</div>";
			}
    		echo "</div>";
    


  global $wpdb;
  $ano_atual= date("Y"); 
  $url = get_site_url();

 
  $quota_paga_mais_recente =  $wpdb->get_row("SELECT MAX(receive_date) FROM civicrm_contribution WHERE contact_id = {$id_contatos->id} AND total_amount='10.00' AND contribution_status_id = '1'",ARRAY_A);
  $quota_paga = $quota_paga_mais_recente['MAX(receive_date)'];
  $ano_mais_recente = explode("-",$quota_paga);
  $ano_mais_recente = $ano_mais_recente[0];
  $socios_pendentes = $wpdb->get_row("SELECT group_id FROM civicrm_group_contact WHERE contact_id = {$id_contatos->id}");

  if(isset($_POST['quotas'])){
  	if($ano_mais_recente == $ano_atual){
  		echo "<script>alert('As quotas relativas ao ano de {$ano_mais_recente} já foram pagas')</script>";
  	}else if($socios_pendentes->group_id == "13" || $id_contatos == NULL){
  		 echo "<script>alert('Ainda não pode pagar quotas pelo facto da sua inscrição ainda se encontrar sob aprovação')</script>";
  		 wp_die(__('A sua proposta de Associação está sob aprovação da Direção.Será notificado logo que possível.Obrigado.'));
  	}else{
  		wp_redirect($url."/metodo-de-pagamento-quota");
  	 }
   }
  
  
?> 

  </td>
  <td>
  	<div style="margin-top:-110px;margin-left:-50px;">
<a href="http://transparencia.pt"><img src="/wp-content/themes/wpbootstrap/assets/img/logo2.png"></a></div>
  </td>
  <td>
<div class ="hero">
   

<form action="#" method="post">
	<button class='btn btn-default col-xs-6' style='cursor:pointer;width:300px;height:100px;background: #f1da36;
background: -moz-linear-gradient(top,  #f1da36 21%, #fcf7cc 69%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(21%,#f1da36), color-stop(69%,#fcf7cc));
background: -webkit-linear-gradient(top,  #f1da36 21%,#fcf7cc 69%);
background: -o-linear-gradient(top,  #f1da36 21%,#fcf7cc 69%);
background: -ms-linear-gradient(top,  #f1da36 21%,#fcf7cc 69%);
background: linear-gradient(to bottom,  #f1da36 21%,#fcf7cc 69%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f1da36', endColorstr='#fcf7cc',GradientType=0 );
' type="submit" name="donativos">
	<h2 style='color:#1e5799;'>Fazer um Donativo</h2>
	</button>
</form>
</div>
 <h2>Histórico de donativos</h2><br>
<?php
$total=($donativos['SUM(total_amount)']+ $googleWallet['SUM(total_amount)']);
//echo $total;
	 	echo "<div  class='row'style='color: #3a87ad; width: 80%; background-color: #d9edf7; border-color: #bce8f1; border-radius: 10px; padding: 8px 35px 8px 14px;'>";
	    	 if(empty($donativos['SUM(total_amount)'])){
	    	 	echo "Total de donativos efetuados até a data: 0.00€";
	    	 }else{
	    	 	echo "Total de donativos efetuados até a data: ".$total."€";
	    	}
    	
    echo "</div>";

   

   if(isset($_POST['donativos'])){
  	 wp_redirect($url."/metodo-de-pagamento-2");
   }
  
?>

</td>
</tr>
</table>
</div>
<form id="your-profile" action="<?php echo esc_url( self_admin_url( IS_PROFILE_PAGE ? 'profile.php' : 'user-edit.php' ) ); ?>" method="post"<?php do_action( 'user_edit_form_tag' ); ?>>
<?php wp_nonce_field('update-user_' . $user_id) ?>
<?php if ( $wp_http_referer ) : ?>
	<input type="hidden" name="wp_http_referer" value="<?php echo esc_url($wp_http_referer); ?>" />
<?php endif; ?>
<p>
<input type="hidden" name="from" value="profile" />
<input type="hidden" name="checkuser_id" value="<?php echo get_current_user_id(); ?>" />
</p>

<h3 style='display:none;'><?php _e('Personal Options'); ?></h3>

<table class="form-table">
<?php if ( ! ( IS_PROFILE_PAGE && ! $user_can_edit ) ) : ?>
	<tr>
		<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"  /></p>
		<form>
    <input TYPE="button" VALUE="Home Page"
        onclick="window.print()"> 
</form>
		<th scope="row" style='display:none;'><?php _e('Visual Editor')?></th>
		<td style='display:none;'><label for="rich_editing"><input name="rich_editing" type="checkbox" id="rich_editing" value="false" <?php if ( ! empty( $profileuser->rich_editing ) ) checked( 'false', $profileuser->rich_editing ); ?> /> <?php _e( 'Disable the visual editor when writing' ); ?></label></td>
	</tr>
<?php endif; ?>
<?php if ( count($_wp_admin_css_colors) > 1 && has_action('admin_color_scheme_picker') ) : ?>
<tr>
<th scope="row" style='display:none;'><?php _e('Admin Color Scheme')?></th>
<?php
/**
 * Fires in the 'Admin Color Scheme' section of the user editing screen.
 *
 * The section is only enabled if a callback is hooked to the action,
 * and if there is more than one defined color scheme for the admin.
 *
 * @since 3.0.0
 */
?>
<td style='display:none;'><?php do_action( 'admin_color_scheme_picker', $user_id ); ?></td>
</tr>
<?php
endif; // $_wp_admin_css_colors
if ( !( IS_PROFILE_PAGE && !$user_can_edit ) ) : ?>
<tr>
<th style='display:none;' scope="row"><?php _e( 'Keyboard Shortcuts' ); ?></th>
<td style='display:none;'><label for="comment_shortcuts"><input type="checkbox" name="comment_shortcuts" id="comment_shortcuts" value="true" <?php if ( ! empty( $profileuser->comment_shortcuts ) ) checked( 'true', $profileuser->comment_shortcuts ); ?> /> <?php _e('Enable keyboard shortcuts for comment moderation.'); ?></label> <?php _e('<a href="http://codex.wordpress.org/Keyboard_Shortcuts" target="_blank">More information</a>'); ?></td>
</tr>
<?php endif; ?>
<tr style='display:none;' class="show-admin-bar">
<th style='display:none;' scope="row"><?php _e('Toolbar')?></th>
<td><fieldset><legend class="screen-reader-text"><span><?php _e('Toolbar') ?></span></legend>
<label for="admin_bar_front">
<input name="admin_bar_front" type="checkbox" id="admin_bar_front" value="1"<?php checked( _get_admin_bar_pref( 'front', $profileuser->ID ) ); ?> />
<?php _e( 'Show Toolbar when viewing site' ); ?></label><br />
</fieldset>
</td>
</tr>
<?php
/**
 * Fires at the end of the 'Personal Options' settings table on the user editing screen.
 *
 * @since 2.7.0
 *
 * @param WP_User $profileuser The current WP_User object.
 */
do_action( 'personal_options', $profileuser );
?>
</table>
<?php
	if ( IS_PROFILE_PAGE ) {
		/**
		 * Fires after the 'Personal Options' settings table on the 'Your Profile' editing screen.
		 *
		 * The action only fires if the current user is editing their own profile.
		 *
		 * @since 2.0.0
		 *
		 * @param WP_User $profileuser The current WP_User object.
		 */
		do_action( 'profile_personal_options', $profileuser );
	}
?>

<h3><?php _e('Name') ?></h3>

<table class="form-table">
	<tr>
		<th><label for="user_login"><?php _e('Username'); ?></label></th>
		<td><input type="text" name="user_login" id="user_login" value="<?php echo esc_attr($profileuser->user_login); ?>" disabled="disabled" class="regular-text" /> <span class="description"><?php _e('Usernames cannot be changed.'); ?></span></td>
	</tr>

<?php if ( !IS_PROFILE_PAGE && !is_network_admin() ) : ?>
<tr><th><label for="role"><?php _e('Role') ?></label></th>
<td><select name="role" id="role">
<?php
// Compare user role against currently editable roles
$user_roles = array_intersect( array_values( $profileuser->roles ), array_keys( get_editable_roles() ) );
$user_role  = array_shift( $user_roles );

// print the full list of roles with the primary one selected.
wp_dropdown_roles($user_role);

// print the 'no role' option. Make it selected if the user has no role yet.
if ( $user_role )
	echo '<option value="">' . __('&mdash; No role for this site &mdash;') . '</option>';
else
	echo '<option value="" selected="selected">' . __('&mdash; No role for this site &mdash;') . '</option>';
?>
</select></td></tr>
<?php endif; //!IS_PROFILE_PAGE

if ( is_multisite() && is_network_admin() && ! IS_PROFILE_PAGE && current_user_can( 'manage_network_options' ) && !isset($super_admins) ) { ?>
<tr><th><?php _e('Super Admin'); ?></th>
<td>
<?php if ( $profileuser->user_email != get_site_option( 'admin_email' ) || ! is_super_admin( $profileuser->ID ) ) : ?>
<p><label><input type="checkbox" id="super_admin" name="super_admin"<?php checked( is_super_admin( $profileuser->ID ) ); ?> /> <?php _e( 'Grant this user super admin privileges for the Network.' ); ?></label></p>
<?php else : ?>
<p><?php _e( 'Super admin privileges cannot be removed because this user has the network admin email.' ); ?></p>
<?php endif; ?>
</td></tr>
<?php } ?>

<?php      $nif = $wpdb->get_row("SELECT nif_3 FROM civicrm_value_nif_3 WHERE external_identifier = {$external_id->external_identifier}");
		   $bi_cc = $wpdb->get_row("SELECT bi_cc_2 FROM civicrm_value_bi_cc_2 WHERE external_identifier = {$external_id->external_identifier}");
		   $ocupacao = $wpdb->get_row("SELECT job_title,first_name,middle_name,last_name,birth_date,gender_id,external_identifier FROM civicrm_contact WHERE external_identifier = {$external_id->external_identifier}");
		   $telefone = $wpdb->get_row("SELECT phone FROM civicrm_phone WHERE external_identifier = {$external_id->external_identifier}");
		   $endereco = $wpdb->get_row("SELECT street_address,city,postal_code,postal_code_suffix FROM civicrm_address WHERE external_identifier = {$external_id->external_identifier}");
		   $socios_proponentes = $wpdb->get_row("SELECT outro_18 FROM civicrm_value_outro_15 WHERE entity_id = {$entity_id->entity_id}");
		   $email_socio = $wpdb->get_row("SELECT email FROM civicrm_email WHERE external_identifier = {$external_id->external_identifier}");
		   //$email_alternativo = $wpdb->get_row("SELECT email_alternativo_1 FROM civicrm_value_email_alternativo_1 WHERE external_identifier = {$external_id->external_identifier}"); 
	
	?>

<tr>
	<th><label for="first_name"><?php _e('Primeiro Nome') ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
	<td><input type="text" name="first_name" id="first_name" value="<?php echo $ocupacao->first_name; ?>" class="regular-text" /></td>
</tr>

<tr>
	<th><label for="middle_name"><?php _e('Nome do Meio') ?></label></th>
	<td><input type="text" name="middle_name" id="middle_name" value="<?php echo $ocupacao->middle_name; ?>" class="regular-text" /></td>
</tr>

<tr>
	<th><label for="last_name"><?php _e('Apelido') ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
	<td><input type="text" name="last_name" id="last_name" value="<?php echo $ocupacao->last_name; ?>" class="regular-text" /></td>
</tr>

<!--<tr>
	<th><label for="nickname"><?php _e('Nickname'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
	<td><input type="text" name="nickname" id="nickname" value="<?php echo esc_attr($profileuser->nickname) ?>" class="regular-text" /></td>
</tr>-->

<tr>
	<th><label for="display_name"><?php _e('Display name publicly as') ?></label></th>
	<td>
		<select name="display_name" id="display_name">
		<?php
			$public_display = array();
			$public_display['display_nickname']  = $profileuser->nickname;
			$public_display['display_username']  = $profileuser->user_login;

			if ( !empty($profileuser->first_name) )
				$public_display['display_firstname'] = $profileuser->first_name;

			if ( !empty($profileuser->last_name) )
				$public_display['display_lastname'] = $profileuser->last_name;

			if ( !empty($profileuser->first_name) && !empty($profileuser->last_name) ) {
				$public_display['display_firstlast'] = $profileuser->first_name . ' ' . $profileuser->last_name;
				$public_display['display_lastfirst'] = $profileuser->last_name . ' ' . $profileuser->first_name;
			}

			if ( !in_array( $profileuser->display_name, $public_display ) ) // Only add this if it isn't duplicated elsewhere
				$public_display = array( 'display_displayname' => $profileuser->display_name ) + $public_display;

			$public_display = array_map( 'trim', $public_display );
			$public_display = array_unique( $public_display );

			foreach ( $public_display as $id => $item ) {
		?>
			<option <?php selected( $profileuser->display_name, $item ); ?>><?php echo $item; ?></option>
		<?php
			}
		?>
		</select>
	</td>
</tr>
</table>

<h3><?php _e('Contact Info') ?></h3>

<table class="form-table">
<tr>
	<th><label for="associado"><?php _e('Associado Nº'); ?></label></th>
	<?php if(get_current_user_id() == 1){ ?>
		<td><input type="text" name="associado" id="associado" style="color:#1e5799;font-size:2em;"value="<?php echo esc_attr($ocupacao->external_identifier) ?>" class="regular-text ltr" />
	<?php } else {?>
		<td><input type="text" name="associado" id="associado" disabled="disabled" style="color:#1e5799;font-size:2em;"value="<?php echo esc_attr($ocupacao->external_identifier) ?>" class="regular-text ltr" />
	<?php } ?>
</tr>
<tr>
	<th><label for="email"><?php _e('E-mail Utilizador'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
	<td><input type="text" name="email" id="email" value="<?php echo esc_attr($profileuser->user_email) ?>" class="regular-text ltr" />
	<?php
	$new_email = get_option( $current_user->ID . '_new_email' );
	if ( $new_email && $new_email['newemail'] != $current_user->user_email && $profileuser->ID == $current_user->ID ) : ?>
	<div class="updated inline">
	<p><?php printf( __('There is a pending change of your e-mail to <code>%1$s</code>. <a href="%2$s">Cancel</a>'), $new_email['newemail'], esc_url( self_admin_url( 'profile.php?dismiss=' . $current_user->ID . '_new_email' ) ) ); ?></p>
	</div>
	<?php endif; ?>
	</td>
</tr>
	<tr>
		<th><label for=""><?php _e('E-Mail Associado'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
		<td><input type="text" name="email" id="email"  disabled="disabled" value="<?php echo $email_socio->email;?>" class="regular-text"/></td>
	</tr>
	
	<tr>
		<th><label for="birth_date"><?php _e('Data de Nascimento'); ?> <span class="description"></span></label></th>
		<td><input type="text" name="birth_date" id="birth_date" value="<?php echo $ocupacao->birth_date;?>" class="regular-text"/> Coloque a data de nascimento no seguinte formato ano-mês-dia</td>
	</tr>
	<tr>
		<th><label for="gender_id"><?php _e('Sexo'); ?> <span class="description"></span></label></th>
		<td>
			<?php if($ocupacao->gender_id == 1){
				echo '<input type="checkbox" name="gender_id" checked = "checked" value="1">Masculino';
				echo "&nbsp";
				echo '<input type="checkbox" name="gender_id"  value="2">Feminino';
			}else {
				echo '<input type="checkbox" name="gender_id"  value="1">Masculino';
				echo "&nbsp";
				echo '<input type="checkbox" name="gender_id" checked = "checked" value="2">Feminino';

			}

			?>
		</td>
	</tr>
	<tr>
		<th><label for="street_address"><?php _e('Morada'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
		<td><input type="text" name="street_address" id="street_address" value="<?php echo $endereco->street_address;?>" class="regular-text"/></td>
	</tr>
	<tr>
		<th><label for="city"><?php _e('Cidade'); ?></label></th>
		<td><input type="text" name="city" id="city" value="<?php echo $endereco->city;?>" class="regular-text"/></td>
	</tr>
	<tr>
		<th><label for="postal_code"><?php _e('Código Postal'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
		<td><input type="text" name="postal_code" id="postal_code" value="<?php echo $endereco->postal_code;?>" maxlength="4" size="4" /> - 
			<input type="text" name="postal_code_suffix" id="postal_code_suffix" value="<?php echo $endereco->postal_code_suffix;?>" maxlength="3" size="3" />
		</td>
	</tr>
	<tr>
		<th><label for="phone"><?php _e('Telefone / Telemóvel'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
		<td><input type="text" name="phone" id="phone" value="<?php echo $telefone->phone;?>" class="regular-text"/></td>
	</tr>
	<tr>
		<th><label for="job_title"><?php _e('Ocupação / Formação'); ?></label></th>
		<td><input type="text" name="job_title" id="job_title" value="<?php echo $ocupacao->job_title;?>" class="regular-text"/></td>
	</tr>
	<tr>
		<th><label for="bi_cc_2"><?php _e('Nº Bilhete de Identidade / Cartão de Cidadão'); ?> <span class="description"><?php _e('(required)'); ?></span></label></th>
		<td><input type="text" name="bi_cc_2" id="bi_cc_2" value="<?php echo $bi_cc->bi_cc_2;?>" maxlength="8" size="8"/> <span class="description"><?php _e('Número do bilhete de identidade / cartão de cidadão deve conter no máximo 8 caracteres.'); ?></span></td>
	</tr>
	<tr>
		<th><label for="nif_3"><?php _e('NIF'); ?><span class="description"> <?php _e('(required)'); ?></span></label></th>
		<td><input type="text" name="nif_3" id="nif_3" value="<?php echo $nif->nif_3;?>" maxlength="9" size="9"/> <span class="description"><?php _e('Número de contribuinte deve conter no máximo 9 caracteres.'); ?></span></td>
	</tr>

	<tr style="display:none;">
		<th><label for="s_cios_preponentes_4"><?php _e('Associados Proponentes / Motivo'); ?></label></th>
		<td><input type="text" name="s_cios_preponentes_4" id="s_cios_preponentes_4" value="<?php echo $socios_proponentes->s_cios_preponentes_4; ?>" class="regular-text"/></td>
	</tr>
<tr>
	<th style='display:none;'><label for="url"><?php _e('Website') ?></label></th>
	<td style='display:none;'><input type="text" name="url" id="url" value="<?php echo esc_attr($profileuser->user_url) ?>" class="regular-text code" /></td>
</tr>


</table>

<h3 style='display:none;'><?php IS_PROFILE_PAGE ? _e('About Yourself') : _e('About the user'); ?></h3>

<table class="form-table">
<tr>
	<th style='display:none;'><label for="description"><?php _e('Biographical Info'); ?></label></th>
	<td style='display:none;'><textarea name="description" id="description" rows="5" cols="30"><?php echo $profileuser->description; // textarea_escaped ?></textarea><br />
	<span class="description" style='display:none;'><?php _e('Share a little biographical information to fill out your profile. This may be shown publicly.'); ?></span></td>
</tr>

<?php

/** This filter is documented in wp-admin/user-new.php */
$show_password_fields = apply_filters( 'show_password_fields', true, $profileuser );
if ( $show_password_fields ) :
?>
<script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/jquery.js"></script>
<tr id="password">
	<th><label for="pass1"><?php _e( 'New Password' ); ?></label></th>
	<td>
		<input class="hidden" value=" " /><!-- #24364 workaround -->
		<input type="password" name="pass1" id="pass1" class="regular-text" size="16" value="" autocomplete="off" /><br />
		<span class="description"><?php _e( 'If you would like to change the password type a new one. Otherwise leave this blank.' ); ?></span>
	</td>
</tr>
<tr>
	<th scope="row"><label for="pass2"><?php _e( 'Repeat New Password' ); ?></label></th>
	<td>
	<input name="pass2" type="password" id="pass2" class="regular-text" size="16" value="" autocomplete="off" /><br />
	<span class="description" for="pass2"><?php _e( 'Type your new password again.' ); ?></span>
	<br />
	<div id="pass-strength-result"><?php _e( 'Strength indicator' ); ?></div>
	<p class="description indicator-hint"><?php _e( 'Hint: The password should be at least seven characters long. To make it stronger, use upper and lower case letters, numbers, and symbols like ! " ? $ % ^ &amp; ).' ); ?></p>
	</td>
</tr>
<?php endif; ?>
</table>


















<?php

	//if ( IS_PROFILE_PAGE ) {
		/**
		 * Fires after the 'About Yourself' settings table on the 'Your Profile' editing screen.
		 *
		 * The action only fires if the current user is editing their own profile.
		 *
		 * @since 2.0.0
		 *
		 * @param WP_User $profileuser The current WP_User object.
		 */
		//do_action( 'show_user_profile', $profileuser );
	//} else {
		/**
		 * Fires after the 'About the User' settings table on the 'Edit User' screen.
		 *
		 * @since 2.0.0
		 *
		 * @param WP_User $profileuser The current WP_User object.
		 */
		//do_action( 'edit_user_profile', $profileuser );
	//}
?>

<?php
//print_r ($id_associado);
/**
 * Filter whether to display additional capabilities for the user.
 *
 * The 'Additional Capabilities' section will only be enabled if
 * the number of the user's capabilities exceeds their number of
 * of roles.
 *
 * @since 2.8.0
 *
 * @param bool    $enable      Whether to display the capabilities. Default true.
 * @param WP_User $profileuser The current WP_User object.
 */
if ( count( $profileuser->caps ) > count( $profileuser->roles )
	&& apply_filters( 'additional_capabilities_display', true, $profileuser )
) : ?>
<h3 ><?php _e( 'Additional Capabilities' ); ?></h3>
<table class="form-table">
<tr>
	<th scope="row"><?php _e( 'Capabilities' ); ?></th>
	<td>
<?php
	$output = '';
	foreach ( $profileuser->caps as $cap => $value ) {
		if ( ! $wp_roles->is_role( $cap ) ) {
			if ( '' != $output )
				$output .= ', ';
			$output .= $value ? $cap : sprintf( __( 'Denied: %s' ), $cap );
		}
	}
	echo $output;
?>
	</td>
</tr>
</table>
<?php endif; ?>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="user_id" id="user_id" value="<?php echo esc_attr($user_id); ?>" />

<?php submit_button( IS_PROFILE_PAGE ? __('Update Profile') : __('Update User') ); ?>

</form>
</div>
<?php
break;
}
?>
<script type="text/javascript">
	if (window.location.hash == '#password') {
		document.getElementById('pass1').focus();
	}
</script>
<?php
include( ABSPATH . 'wp-admin/admin-footer.php');
?>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/packages/jquery/jquery-ui-1.9.0/js/jquery-ui-1.9.0.custom.min.js?r=3hl2U"></script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.ui.datepicker.validation.pack.js?r=3hl2U"></script>

<script type="text/javascript">
    cj( function() {
      var element_date   = "#birth_date_display";var element_time  = "#birth_date_time";var time_format   = cj( element_time ).attr('timeFormat');
              cj(element_time).timeEntry({ show24Hours : time_format, spinnerImage: '' });
          var currentYear = new Date().getFullYear();var alt_field   = '#birth_date';cj( alt_field ).hide();var date_format = cj( alt_field ).attr('format');var altDateFormat = 'mm/dd/yy';
      switch ( date_format ) {
        case 'dd-mm':
        case 'mm/dd':
            altDateFormat = 'mm/dd';
            break;
      }

      if ( !( ( date_format == 'M yy' ) || ( date_format == 'yy' ) || ( date_format == 'yy-mm' ) ) ) {
          cj( element_date ).addClass( 'dpDate' );
      }

      var yearRange   = currentYear - parseInt( cj( alt_field ).attr('startOffset') );yearRange  += ':';yearRange  += currentYear + parseInt( cj( alt_field ).attr('endOffset'  ) );

      var startRangeYr = currentYear - parseInt( cj( alt_field ).attr('startOffset') );
      var endRangeYr = currentYear + parseInt( cj( alt_field ).attr('endOffset'  ) );

      var lcMessage = "en_US";
      var localisation = lcMessage.split('_');
      var dateValue = cj(alt_field).val( );
      cj(element_date).datepicker({
                                    closeAtTop        : true,
                                    dateFormat        : date_format,
                                    changeMonth       : true,
                                    changeYear        : true,
                                    altField          : alt_field,
                                    altFormat         : altDateFormat,
                                    yearRange         : yearRange,
                                    regional          : localisation[0],
                                    minDate           : new Date(startRangeYr, 1 - 1, 1),
                                    maxDate           : new Date(endRangeYr, 12 - 1, 31)
                                });

      // set default value to display field, setDefault param for datepicker
      // is not working hence using below logic
      // parse the date
      var displayDateValue = cj.datepicker.parseDate( altDateFormat, dateValue );

      // format date according to display field
      displayDateValue = cj.datepicker.formatDate( date_format, displayDateValue );
      cj( element_date).val( displayDateValue );

      cj(element_date).click( function( ) {
          hideYear( this );
      });
      cj('.ui-datepicker-trigger').click( function( ) {
          hideYear( cj(this).prev() );
      });
    });

    function hideYear( element ) {
        var format = cj( element ).attr('format');
        if ( format == 'dd-mm' || format == 'mm/dd' ) {
            cj(".ui-datepicker-year").css( 'display', 'none' );
        }
    }

    function clearDateTime( element ) {
        cj('input#' + element + ',input#' + element + '_time' + ',input#' + element + '_display').val('');
    }
    </script>

  <?php   global $wpdb;



////////////////////////////////////////////////////////////////////////
//$external_id = $wpdb->get_row("SELECT external_identifier FROM wp_users WHERE id = '{$user_id}'");

//$id_contatos1 = $wpdb->get_row("SELECT COUNT(id) FROM civicrm_contact WHERE external_identifier IS NOT NULL ");

//print_r($id_contatos1);


//$total_ids = $wpdb->get_results("SELECT id FROM civicrm_contact WHERE external_identifier !=' ' ", OBJECT);
//$estado_contribuição1 = $wpdb->get_results("SELECT contact_id  FROM civicrm_contribution WHERE contact_id = '{$i->id}' AND contribution_page_id ='9' ",ARRAY_A);

//print_r($estado_contribuição1->id);


/*foreach ( $total_ids  as $ids) 
{

	//print_r ($ids);
}*/



$total_ids = $wpdb->get_results("SELECT id FROM civicrm_contact WHERE external_identifier !=' ' ", OBJECT);
$total_associados = $wpdb->get_var("SELECT COUNT(id) FROM civicrm_contact WHERE external_identifier !=' ' ");
for ($i=0;$i<=$total_associados;$i++)
{
$id_external = $wpdb->get_row("SELECT id FROM civicrm_contact WHERE external_identifier = '{$id_external->external_identifier}'");
//$total_ids = $wpdb->get_results("SELECT id FROM civicrm_contact WHERE external_identifier !=' ' ", OBJECT);
//$total_associados = $wpdb->get_var("SELECT COUNT(id) FROM civicrm_contact WHERE external_identifier !=' ' ");
$estado_contribuição = $wpdb->get_var("SELECT COUNT(contact_id)  FROM civicrm_contribution WHERE contact_id = '{$i}' AND contribution_page_id ='9' AND receive_date LIKE '%{$ano_atual}%'",ARRAY_A);
//$estado_contribuição1 = $wpdb->get_results("SELECT contact_id  FROM civicrm_contribution WHERE contact_id = '{$i->id}' AND contribution_page_id ='9' ",ARRAY_A);

//print_r ($estado_contribuição);

if ($estado_contribuição  == 0)


{

	$data = date('Y-m-d H:i:s');
	//echo "sucesso";
 /*$wpdb->insert("civicrm_contribution", array(
     "contact_id" => $i->id,
     "financial_type_id" => "2",
     "contribution_page_id" => "9",
      "receive_date" => $data,
     "total_amount" => "10.00",
     "currency" => "EUR",
     "source" => "Contribuição Online: ANO QUOTA",
     "contribution_status_id" => "2"));*/
$wpdb->query("INSERT INTO civicrm_contribution (contact_id, financial_type_id, contribution_page_id, receive_date, total_amount, currency, source, contribution_status_id ) VALUES('{$i->id}', '2', '9', '$data', '10.00', 'EUR', 'Contribuição Online: ANO QUOTA', '2') ");
echo "string";


}

//print_r ($estado_contribuição->id);





}
?>
