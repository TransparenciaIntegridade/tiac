<?php
/*
Template Name: Associados
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
        <script type="text/javascript">
var CRM = {"config":{"userFramework":"WordPress","resourceBase":"\/wp-content\/plugins\/civicrm\/civicrm\/","lcMessages":"en_US"}};
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/packages/jquery/jquery-1.8.3.min.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/packages/jquery/jquery-ui-1.9.0/js/jquery-ui-1.9.0.custom.min.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.autocomplete.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.menu.pack.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.chainedSelects.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.tableHeader.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.textarearesizer.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.form.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.tokeninput.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.timeentry.pack.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.mousewheel.pack.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/DataTables/media/js/jquery.dataTables.min.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.FormNavigate.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.validate.min.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.ui.datepicker.validation.pack.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.jeditable.mini.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.blockUI.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.notify.min.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/jquery.redirect.min.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/js/rest.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/js/Common.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/js/jquery/jquery.crmeditable.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/js/jquery/jquery.crmasmselect.js?r=3hl2U">
</script>
<script type="text/javascript" src="/wp-content/plugins/civicrm/civicrm/js/noconflict.js?r=3hl2U">
</script>
<script type="text/javascript">
CRM.url('init', '/wp-admin/admin.php?page=CiviCRM&q=civicrm/example&placeholder');
CRM.formatMoney('init', "\u20ac 1,234.56");
</script>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<link href="/wp-content/plugins/civicrm/civicrm/packages/jquery/css/jquery.autocomplete.css?r=3hl2U" rel="stylesheet" type="text/css"/>
<link href="/wp-content/plugins/civicrm/civicrm/packages/jquery/css/menu.css?r=3hl2U" rel="stylesheet" type="text/css"/>
<link href="/wp-content/plugins/civicrm/civicrm/packages/jquery/css/token-input-facebook.css?r=3hl2U" rel="stylesheet" type="text/css"/>
<link href="/wp-content/plugins/civicrm/civicrm/packages/jquery/jquery-ui-1.9.0/css/smoothness/jquery-ui-1.9.0.custom.min.css?r=3hl2U" rel="stylesheet" type="text/css"/>
<link href="/wp-content/plugins/civicrm/civicrm/packages/jquery/plugins/DataTables/media/css/demo_table_jui.css?r=3hl2U" rel="stylesheet" type="text/css"/>
<link href="/wp-content/plugins/civicrm/civicrm/css/civicrm.css?r=3hl2U" rel="stylesheet" type="text/css"/>
<link href="/wp-content/plugins/civicrm/civicrm/css/extras.css?r=3hl2U" rel="stylesheet" type="text/css"/>

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
      
      
      </style>
    </head>
    <body>
        <div id="banner-wrapper" style="background-color:#fff;">
            <header id="banner" role="banner">
               <div id="banner-inner-wrapper">
                    <div id="banner-inner">
                        <hgroup id="title" >
                          <a href="//transparencia.pt"> <img id="logo" src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/img/logoc.png" style="margin-top:-30px" width="200" height="60" /></a>
                        </hgroup>
                        <nav id="menu-nav">
                            <div id="menu-button">
                                <div id="menu-button-inner"></div>
                            </div>
                        </nav>
                    </div></a>
                </div>
                
            </header>
        </div>
       <div class="row" style="margin-left:120px;margin-bottom:250px;">
  <div class="span8" style="width:100%;padding-top:85px;">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<!--<h1><?php the_title(); ?></h1>!-->
	  	<?php the_content(); ?>

	<?php endwhile; else: ?>
		<p><?php _e('Sorry, this page does not exist.'); ?></p>
	<?php endif; ?>

  </div>
  <div class="span8">
  </div>
</div>
<footer id="footer" style="height:35px;padding-top:10px;position:fixed;bottom:0;width:100%;padding-bottom:10px;text-align:center;">
	<div class="container">
		<b>&copy; 2016</b> <a style="color:#0397d6;" href="http://transparencia.pt" target="_blank"><b>TIAC</b></a><b>. Todos os direitos reservados.</div>
</footer>
</body>
</html>
