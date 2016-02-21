﻿<?php
/*
Template Name: Multibanco_Individual
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

        <link rel="stylesheet" id="fancybox-css" href="<?php echo get_site_url();?>/wp-content/plugins/easy-fancybox/fancybox/jquery.fancybox-1.3.6.pack.css" type="text/css" media="screen">
        <link href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/style.css" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/responsive.css" type="text/css" media="all">
        <link href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/style/reset.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/style/example.css" rel="stylesheet" type="text/css" />
        <link href="/wp-content/plugins/civicrm/civicrm/css/civicrm.css?r=3hl2U" rel="stylesheet" type="text/css"/>
        <link href="/wp-content/plugins/civicrm/civicrm/css/extras.css?r=3hl2U" rel="stylesheet" type="text/css"/>
        <!--<link href="/wp-content/plugins/civicrm/civicrm/packages/jquery/jquery-ui-1.9.0/css/smoothness/jquery-ui-1.9.0.custom.min.css?r=3hl2U" rel="stylesheet" type="text/css"/>-->
        <script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/style/script/respond.js"></script>

        <!--[if lte IE 8]>
        <script src="style/script/html5.js"></script>
        <![endif]-->
        <script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/script/jquery.js"></script>


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
                        $("#logo").attr('src', templateDirectory + '/assets/img/logo2.png');

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
   margin-top:-32px;
}
@media screen and (min-width: 1024px) {
  #banner-wrapper {
   
margin-top:-65px; 
/*height: 145px; */  

}   
      
      
      </style>
    </head>
    <body>
        <div id="banner-wrapper">
            <header id="banner" role="banner">
               <div id="banner-inner-wrapper">
                    <div id="banner-inner">
                        <hgroup id="title" >
                           <img id="logo" src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/img/logoRodape.png" width="200" height="60" style="margin-top:20px;"/>
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
                         
                            
                            <div class="visible-phone">
                            <a href="/"><i class="fa fa-home fa-lg"></i><b style="margin-left:5px">Home</b></a>
                            </div>
                            <div class="hidden-phone">
                            <a href="/#sobre"><i class="fa fa-users  fa-lg" ></i><b style="margin-left:5px">Sobre</b></a>
                            </div>
                        </li>

                        <li class="menu-item">
                         <div class="visible-phone">
                            <a href="/#sobre"><i class="fa fa-users  fa-lg" ></i><b style="margin-left:5px">Sobre</b></a>
                            </div>
                             <div class="hidden-phone">
                             <a href="/#participa"><i class="fa fa-wrench  fa-2x" style="margin-left:-5px"></i><b style="margin-left:5px">Participa</b></a>
                            </div>
                            
                        </li>
                        

                        <li class="menu-item">
                        <a href="/#topicos"><i class="fa fa-exclamation-triangle fa-lg" ></i><b style="margin-left:5px">Corrupção</b></a>

                      </li>
                        <li class="menu-item">
                            <a href="/#noticias"><i class="fa fa-rss fa-lg" ></i><b style="margin-left:5px">Notícias</b></a>
                        </li>
                         
                        <li class="menu-item">
                          <a href="/#agenda"><i class="fa fa-calendar fa-lg" ></i><b style="margin-left:5px">Agenda</b></a>
                        </li>
                        <li class="menu-item">
                          <a href="/#publicacoes"><i class="fa fa-file-o fa-lg" ></i><b style="margin-left:5px">Publicações</b></a>
                        </li>
                        

                        <li class="menu-item" style="font-family: FontAwesome;">
                          <a href="/#provedoria"><i class="fa fa-gavel fa-lg" ></i><b style="margin-left:5px">Provedoria</b></a>
                        </li>
                        <li class="menu-item" >
                           <a href="/#contatos" ><i class="fa fa-envelope fa-lg" ></i><b style="margin-left:5px">Contatos</b></a>
                        </li>
                        <div class="visible-phone">
                        <li class="menu-item">
                          <a href="#" onClick="alert(' © 2014 TIAC. Todos os direitos reservados. ')"><i class=" fa fa-edit fa-lg"></i><b style="margin-left:5px">Créditos</b></a>
                        </li>
                      </div>
                    </ul>
                </nav>
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
  <div class="span4">
  </div>
</div>
<footer id="footer" style="height:35px;padding-top:10px;position:fixed;bottom:0;width:100%;padding-bottom:10px;text-align:center;">
	<div class="container">
		<b>&copy; 2014</b> <a style="color:#0397d6;" href="https://transparencia.pt" target="_blank"><b>TIAC</b></a><b>. Todos os direitos reservados.</div>
</footer>
</body>
</html>