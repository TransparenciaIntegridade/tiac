<?php
/*
Template Name: Biografia
*/
?> 
<!doctype html>
<!--[if lte IE 7 ]><html lang="en" class="ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="ie8"><![endif]-->
<!--[if (gt IE 8)|!(IE)]><!-->
<html>
    <!--<![endif]-->
    <head>
        <title>Biografia de <?php echo get_the_title();?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" id="fancybox-css" href="http://civicrm.tiac.webfactional.com/wp-content/plugins/easy-fancybox/fancybox/jquery.fancybox-1.3.6.pack.css" type="text/css" media="screen">
        <link href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/style.css" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/responsive.css" type="text/css" media="all">
        <link href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/style/reset.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/style/example.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/style/script/respond.js"></script>
        <!--[if lte IE 8]>
        <script src="style/script/html5.js"></script>
        <![endif]-->
        <script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/script/jquery.js"></script>
        <script>
   var templateDirectory = '<?php bloginfo('template_directory'); ?>';
   var logo_url ='<a href="/">';
    var logo_close ='</a>'
</script>
        <script>
            jQuery(function($) {
                var open = false;

                function resizeMenu() {
                    if ($(this).width() < 768) {
                        if (!open) {
                            $("#menu-drink").hide();
                        }
                        $("#menu-button").show();
                        $("#logo").attr('src', templateDirectory + '/assets/img/logoc.png');

                    }
                    else if ($(this).width() >= 768) {
                        if (!open) {
                            $("#menu-drink").show();
                        }
                        $("#menu-button").hide();
                         $("#menu-drink").wrap("<a href='/'></a>'");
                        $("#logo").attr('src', templateDirectory + '/assets/img/logo2.png');


                    }
                }

                function setupMenuButton() {
                    $("#menu-button").click(function(e) {
                        e.preventDefault();

                        if (open) {
                            $("#menu-drink").fadeOut();
                            $("#menu-button").toggleClass("selected");
                        }
                        else {
                            $("#menu-drink").fadeIn();
                            $("#menu-button").toggleClass("selected");
                        }
                        open = !open;
                    });
                }


                $(window).resize(resizeMenu);

                resizeMenu();
                setupMenuButton();
            });
        </script>
      <style type="text/css">
	  
	  @media screen and (max-width: 350px) {
	li [class^="icon-"], .nav li {
		text-align:left;
		margin-left:-22px;
		
		visibility:hidden;
	}
	#menu-drink{
text-align:left;

	}
}
      @media screen and (min-width: 480px) {
    /* 
     * Made all the items display horizontally as the screen is wide 
     * enough to accommodate it
     */
	  li.menu-item {
 margin:0 0 10px 0;   
}
}
@media screen and (min-width: 560px) {
    /*
     * Made small adjustments to the margin and padding around 
     * the menu items
     */
}
@media screen and (min-width: 783px) {
    /*
     * Made the items display next to the logo. At this width the screen is 
     * large enough so that there is no need to hide the menu
     */
	 margin-top:-32px;
}
@media screen and (min-width: 1024px) {
    /*
     * At this width, everything appears little cramped so I made the 
     * padding around the whole thing larger to give the illusion of space. 
     * I also used larger and cooler icons.
     */
}
      
      
      
      
      </style>
    </head>
    <body>
        <div id="banner-wrapper">
            <header id="banner" role="banner">
               <div id="banner-inner-wrapper">
                    <div id="banner-inner">
                        <hgroup id="title" >
                           <img id="logo" src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/img/logoc.png" />
                        </hgroup>
                        <nav id="menu-nav">
                            <div id="menu-button">
                                <div id="menu-button-inner"></div>
                            </div>
                        </nav>
                    </div></a>
                </div>
                <nav id="menu-drink">
                    <ul>
                        <li class="menu-item">
                            <a href="/#about-us"><i class="icon-group"></i>Sobre</a>
                        </li>
                        <li class="menu-item">
                            <a href="/#services"><i class="icon-flag"></i>Objetivos</a>
                        </li>
                        <li class="menu-item">
                        <a href="/#portfolio"><i class="icon-cog"></i>Projetos</a>

                      </li>
                        <li class="menu-item">
                            <a href="/#blog"><i class="icon-comments-alt"></i>Noticias</a>
                        </li>
                         <li class="menu-item">
                           <a href="/#eventos"><i class="icon-bullhorn"></i>Eventos</a>
                        </li>
                        <li class="menu-item">
                          <a href="/#donate"><i class="icon-folder-open"></i>Publicações</a>
                        </li>
                        <li class="menu-item">
                          <a href="/#provedoria"><i class="icon-envelope"></i>Provedoria</a>
                        </li>
                        <li class="menu-item">
                          <a href="/#contact"><i class="icon-envelope"></i>Contatos</a>
                        </li>
                    </ul>
                </nav>
            </header>
        </div>
       <div class="row">
  <div class="span8" style="width:100%;padding-top:85px;">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<!--<h1><?php the_title(); ?></h1>!-->
	  	<?php the_content(); ?>

	<?php endwhile; else: ?>
		<p><?php _e('Sorry, this page does not exist.'); ?></p>
	<?php endif; ?>

  </div>
  <div class="span4">
  </div>
</div>
<footer id="footer" style="height:35px;padding-top:10px;position:fixed;bottom:0;width:100%;padding-bottom:10px;text-align:center;">
	<div class="container">
		<b>&copy; 2013</b> <a style="color:#0397d6;" href="http://transparencia.pt" target="_blank"><b>TIAC</b></a><b>. Todos os direitos reservados. - Mastered by </b><a style="color:#0397d6;" href="http://dmanlancers.tiac.webfactional.com" target="_blank"><b>Dm@nl@ncers</b></a>
	</div>
</footer>
</body>
</html>
