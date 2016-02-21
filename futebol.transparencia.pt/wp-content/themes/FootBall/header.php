<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Apostas combinadas </title>
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo blogdir;?>style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo blogdir;?>blog.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php echo blogname; ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php echo blogname; ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<body>
<div class="mainWrap">
	<div class="wrapper">
    	<div class="lcontent">
            <div class="header">
            	<div class="logo">
                	<div class="blogname"><a href="<?php echo home; ?>" title="<?php echo blogname; ?>"><?php echo blogname; ?></a></div>
                    <div class="blogdesc"><?php bloginfo('description'); ?></div>
                </div>
                <div class="navigation">
                	<ul>
                    	<li<?php echo is_home()?" class='current_page_item'":"";?>><a href="<?php echo home;?>" title="Início"><span class="r"><span class="b">Início</span></span></a></li>
                        <li<?php echo is_home()?" class='current_page_item'":"";?>><a href="<?php echo home;?>" title="Sobre"><span class="r"><span class="b">Sobre</span></span></a></li>
                        <li<?php echo is_home()?" class='current_page_item'":"";?>><a href="<?php echo home;?>" title="Projeto"><span class="r"><span class="b">Projeto</span></span></a></li>
                        <li<?php echo is_home()?" class='current_page_item'":"";?>><a href="<?php echo home;?>" title="Notícias"><span class="r"><span class="b">Notícias</span></span></a></li>
                        <li<?php echo is_home()?" class='current_page_item'":"";?>><a href="<?php echo home;?>" title="Documentos"><span class="r"><span class="b">Documentos</span></span></a></li>
                        <li<?php echo is_home()?" class='current_page_item'":"";?>><a href="<?php echo home;?>" title="Publicações"><span class="r"><span class="b">Publicações</span></span></a></li>
                    </ul>
                </div>
                
                <div class="lcWrap"></div>
                <div class="top-image"></div>
                <div class="top-b-10"></div>
                <div class="topBlock">
                	<h3><?php echo DEF_TEXT?></h3>
                    <?php echo wpautop(DEF_DESC);?>
                </div>
                <div class="top-image-2"></div>
                <div class="lcRight"></div>
                
                
            </div>
            <div class="content">
                <div class="content-i">
                	<div class="content-h" id="content">
                        <!--form method="get" action="<?php echo home;?>">
                            <input type="text" class="t" value="Enter your search term..." onclick="if (this.value=='Enter your search term...'){ this.value=''; }" onblur="if (this.value==''){ this.value='Enter your search term...'; }" name="s" />
                            <input type="image" class="s" src="<?php echo blogimages; ?>search-btn.gif" />
                            <div class="clear"></div>
                        </form-->
                        
     