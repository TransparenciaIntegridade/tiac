<?php
/*
Template Name: VoluntarioMB
*/
?> 
<!doctype html>
<!--[if lte IE 7 ]><html lang="en" class="ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="ie8"><![endif]-->
<!--[if (gt IE 8)|!(IE)]><!-->
<html>
    <!--<![endif]-->
    <head>
        <title> <?php echo get_the_title();?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

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
                        $("#logo").attr('src', templateDirectory + '/assets/img/logoRodape.png');

                    }
                    else if ($(this).width() >= 768) {
                        if (!open) {
                            $("#menu-drink").show();
                        }
                        $("#menu-button").hide();
                         $("#menu-drink").wrap("<a href='/'></a>'");
                        $("#logo").attr('src', templateDirectory + '/assets/img/logoRodape.png');


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
      
   @media screen and (min-width: 783px) {
  #banner-wrapper {
   
margin-top:-85px; 
/*height: 145px; */  

}
    /*
     * Made the items display next to the logo. At this width the screen is 
     * large enough so that there is no need to hide the menu
     */
 #banner-inner{

margin-top:70px;

}
}
@media screen and (min-width: 1024px) {
  #banner-wrapper {
   
margin-top:-65px; 
/*height: 145px; */  

}   
  }    
      
      </style>
    </head>
    <body>
        <div id="banner-wrapper">
           
        </div>
       <div class="row" style="margin-left:120px;margin-bottom:250px;">
  <div class="span8" style="width:100%;padding-top:85px;">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<!--<h1><?php the_title(); ?></h1>!-->
	  	<?php the_content(); ?>
      <form style="margin-top:-300px;float:left;margin-left:30%;" action="https://transparencia.pt">
    <input type="image" src="https://transparencia.pt/wp-content/themes/wpbootstrap/assets/img/logoRodape.png"
        "> 
</form>
<form style="margin-top:-300px;float:right;margin-right:30%;">
    <input type="image" src="https://transparencia.pt/wp-content/themes/wpbootstrap/assets/img/print.gif"
        onclick="window.print()"> 
</form>
	<?php endwhile; else: ?>
		<p><?php _e('Sorry, this page does not exist.'); ?></p>
	<?php endif; ?>

  </div>
  <div class="span4">
  </div>
</div>

</body>
</html>
