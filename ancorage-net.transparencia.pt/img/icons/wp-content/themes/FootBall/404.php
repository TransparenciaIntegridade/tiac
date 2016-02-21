<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo blogdir;?>style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo blogdir;?>blog.css" type="text/css" media="all" />
<link rel="alternate" type="application/rss+xml" title="<?php echo blogname; ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php echo blogname; ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
</head>
<body class="page404">
<div class="wrap404">
	<div class="image404">404</div>
    <div class="desc404">
    	<p>Sorry but the page you are looking for cannot be found.</p>
		<p>If you're in denial and think this is a conspiracy that cannot possibly be true, please try using my search box below.</p>
    </div>
    <div class="search404">
    	<form method="get" action="<?php echo home;?>">
        <div class="sb"><input type="text" value="Enter your serach term" onclick="if (this.value=='Enter your serach term'){this.value=''};" onblur="if (this.value==''){this.value='Enter your serach term'};" name="s" /></div>
        <div class="sr"><input type="image" src="<?php echo blogimages;?>submit.gif" /></div>
        <div class="clear"></div>
        </form>
    </div>
</div>
</body>
</html>