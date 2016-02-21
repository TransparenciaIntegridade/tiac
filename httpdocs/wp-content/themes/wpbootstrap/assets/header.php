<!DOCTYPE html>
<html>
  <head>
  <style type="text/css">
  /*  SECTIONS  */
.section {
	clear: both;
	padding: 0px;
	margin: 0px;
}

/*  COLUMN SETUP  */
.col {
	display: block;
	float:left;
	margin: 1% 0 1% 1.6%;
}
.col:first-child { margin-left: 0; }


/*  GROUPING  */
.group:before,
.group:after {
	content:"";
	display:table;
}
.group:after {
	clear:both;
}
                                               
					
/*  GRID OF FOUR  */
.span_4_of_4 {
	width: 100%;
}
.span_3_of_4 {
	width: 74.6%;
}
.span_2_of_4 {
	width: 49.2%;
}
.span_1_of_4 {
	width: 23.8%;
}

.input[type=checkbox] {
 width: 44px; height: 44px;
 -webkit-border-radius: 22px; -moz-border-radius: 22px; border-radius: 22px;
 border: 1px solid #bbb;
}
  
    background: rgb(186,177,152);
    display: inline-block;
    min-height: 250px;
    margin: 0 30px;
    width: 1px;
}

    background: rgb(186,177,152);
    display: inline-block;
    min-height: 250px;
    margin: 0 30px;
    width: 1px;
}



/*  GO FULL WIDTH AT LESS THAN 480 PIXELS */

@media only screen and (max-width: 480px) {
	.col { 
		margin: 1% 0 1% 0%;
	}
	}

@media screen and (max-width:1920px) {
	.span8 .multibanco { 
	width: 100%; 
		margin-left:15%;
		margin-right:auto;
	}
}

@media only screen and (max-width: 480px) {
	.span_4_of_4 {
		width: 100%; 
	}
	.span_3_of_4 {
		width: 100%; 
	}
	.span_2_of_4 {
		width: 100%; 
	}
	.span_1_of_4 {
		width: 100%;
	}
}
  
  
  
  .navbar-collapse.in {
    overflow-y: visible;
}
  .containerright {
    margin: 5px 5px 5px 10px; position:relative;
}
  #container2 {
width: 960px; 
position: relative;
margin:0 auto;
line-height: 1.4em;
}

@media only screen and (max-width: 479px){
    #container2 { width: 90%; }
}

  
  
  
  /*#bigcal { width: auto !important; }
  .fc-event-inner.fc-event-skin {
min-width: 80px;
padding: 0 10px;
margin: 0 auto;
top: 0;
left: 0;
min-height: 20px;
font-size: 10px !important;
border: none;
position: relative;
}*/
  /*
Make the Facebook Like box responsive (fluid width)
https://developers.facebook.com/docs/reference/plugins/like-box/
*/
 
/* This element holds injected scripts inside iframes that in some cases may stretch layouts. So, we're just hiding it. */
#fb-root {
display: none;
}
 
/* To fill the container and nothing else */
.fb_iframe_widget, .fb_iframe_widget span, .fb_iframe_widget span iframe[style] {
width: 100% !important;
}
  
  .wrapper { 
 
  overflow:hidden;
}

.wrapper div {
   min-height: 200px;
   /*padding: 20px;*/
}
#one {
 margin-top:100px;
margin-left:70px; 
  width:470px;
 float:left;
}
#two { 
 width:100%;
  overflow:hidden;
  /*margin:10px;*/
 
  /*min-height:170px;*/
}
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
      @media screen and (min-width:980px ) and (max-width:1199px) {
    /* 
     * Made all the items display horizontally as the screen is wide 
     * enough to accommodate it
     */
	 #header .logo_container .logo {
		 
		 margin-top: 0px;
		 
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
@media screen and (max-width: 767px) {
    /*
     * Made small adjustments to the margin and padding around 
     * the menu items
     */
	 #title{
	margin-left:15px;
	
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
/*#banner-wrapper {
   
margin-top:42px; 
height: 145px;   

}*/
#logo{
margin-top: 20px;


}
#title{
	/*margin-top:-15px;*/
	
	}
}
@media screen and (min-width: 1024px) {
    /*
     * At this width, everything appears little cramped so I made the 
     * padding around the whole thing larger to give the illusion of space. 
     * I also used larger and cooler icons.
     */
	 #title{
	margin-top:15px;
	
	}
}
@media screen and (min-width: 800px) {
    /*
     * At this width, everything appears little cramped so I made the 
     * padding around the whole thing larger to give the illusion of space. 
     * I also used larger and cooler icons.
     */
   .multibanco{
  padding:1%;
  
  }
  .paypal{
  padding:1%;
  
  }
  .wallet{
  padding:1%;
  
  }
}

@media screen and (min-width: 900px) {
    /*
     * At this width, everything appears little cramped so I made the 
     * padding around the whole thing larger to give the illusion of space. 
     * I also used larger and cooler icons.
     */
   #multibanco{
  padding:10%;
  
  }
  #paypal{
  padding:10%;
  
  }
  #wallet{
  padding:10%;
  
  }
}
@media screen and (max-width: 400px) {
   #one { 
    float: none;
    margin-right:0;
    width:auto;
    border:0;
   
  }
}
  
  #twitter-widget-0{width:100%;}
  .video-container { 
   position: relative; /* keeps the aspect ratio */ 
   padding-bottom: 56.25%; /* fine tunes the video positioning */ 
   padding-top: 60px; overflow: hidden;
}

.video-container iframe,
.video-container object,
.video-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
  
  
  /* This element holds injected scripts inside iframes that in some cases may stretch layouts. So, we're just hiding it. */
#fb-root {
  display: none;
}
 
/* To fill the container and nothing else */
.fb_iframe_widget, .fb_iframe_widget span, .fb_iframe_widget span iframe[style] {
  width: 100% !important;
}
  
  
  
  div.one{
    width:100%;
    min-width:100px;
   
	
}
#twitter-widget-1{
   width: 100% !important;  
}
#twitter-widget-0{
   width: 100% !important;  
}
@media screen and (max-width: 767px){
    div.one{ width:100%}
}
  
  
  
  .document-icon-wrapper.descriptions .document-icon{
   border-right: 1px solid #37824A;
   border-bottom: 1px solid #37824A;
}
  
  
  
  
  .iframe-rwd  {
position: relative;
padding-bottom: 65.25%;
padding-top: 30px;
height: 0;
overflow: hidden;
}
.iframe-rwd iframe {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
}
  

  
  
  .box h3{
	text-align:center;
	position:relative;
	top:80px;
}
.box {
	width:70%;
	height:250px;
	background:#FFF;
	margin:40px auto;
}

/*==================================================
 * Effect 7
 * ===============================================*/
.effect7
{
  	position:relative;       
    -webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
       -moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
}
.effect7:before, .effect7:after
{
	content:"";
    position:absolute; 
    z-index:-1;
    -webkit-box-shadow:0 0 20px rgba(0,0,0,0.8);
    -moz-box-shadow:0 0 20px rgba(0,0,0,0.8);
    box-shadow:0 0 20px rgba(0,0,0,0.8);
    top:0;
    bottom:0;
    left:10px;
    right:10px;
    -moz-border-radius:100px / 10px;
    border-radius:100px / 10px;
} 
.effect7:after
{
	right:10px; 
    left:auto;
    -webkit-transform:skew(8deg) rotate(3deg); 
       -moz-transform:skew(8deg) rotate(3deg);     
        -ms-transform:skew(8deg) rotate(3deg);     
         -o-transform:skew(8deg) rotate(3deg); 
            transform:skew(8deg) rotate(3deg);
}
  
  
  .scoopit-embed-post {
    width: auto !important;
	 

}
  
  
.iframe-responsive-wrapper        {
    position: relative;
}

.iframe-responsive-wrapper .iframe-ratio {
    display: block;
    width: 100%;
    height: auto;
}

.iframe-responsive-wrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
  
  
  .embed-container {
    position: relative;
    padding-bottom: 56.25%; /* 16/9 ratio */
    padding-top: 30px; /* IE6 workaround*/
    height: 0;
    overflow: hidden;
	
}
.embed-container iframe,
.embed-container object,
.embed-container embed {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
	
}
  
  
  
  
  
  
.btn_participe {
	-moz-box-shadow:inset 0px 1px 0px 0px #fed897;
	-webkit-box-shadow:inset 0px 1px 0px 0px #fed897;
	box-shadow:inset 0px 1px 0px 0px #fed897;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #f6b33d), color-stop(1, #d29105) );
	background:-moz-linear-gradient( center top, #f6b33d 5%, #d29105 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f6b33d', endColorstr='#d29105');
	background-color:#f6b33d;
	-webkit-border-top-left-radius:0px;
	-moz-border-radius-topleft:0px;
	border-top-left-radius:0px;
	-webkit-border-top-right-radius:0px;
	-moz-border-radius-topright:0px;
	border-top-right-radius:0px;
	-webkit-border-bottom-right-radius:0px;
	-moz-border-radius-bottomright:0px;
	border-bottom-right-radius:0px;
	-webkit-border-bottom-left-radius:0px;
	-moz-border-radius-bottomleft:0px;
	border-bottom-left-radius:0px;
	text-indent:0;
	border:1px solid #eda933;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold; 
	font-style:normal;
	height:40px;
	line-height:40px;
	width:100px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #cd8a15;
	margin-top:20px;
}
.btn_participe:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #d29105), color-stop(1, #f6b33d) );
	background:-moz-linear-gradient( center top, #d29105 5%, #f6b33d 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#d29105', endColorstr='#f6b33d');
	background-color:#d29105;
}.btn_participe:active {
	position:relative;
	top:1px;
}

 #button3 {  /* Box in the button */
      -moz-box-shadow:inset 0px 1px 0px 0px #2F709E;
	-webkit-box-shadow:inset 0px 1px 0px 0px #2F709E;
	box-shadow:inset 0px 1px 0px 0px #2F709E;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #fff), color-stop(1, #2F709E) );
	background:-moz-linear-gradient( center top, #ffffff 5%, #2F709E 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#2F709E');
	background-color:#2F709E;
	-webkit-border-top-left-radius:0px;
	-moz-border-radius-topleft:0px;
	border-top-left-radius:0px;
	-webkit-border-top-right-radius:0px;
	-moz-border-radius-topright:0px;
	border-top-right-radius:0px;
	-webkit-border-bottom-right-radius:0px;
	-moz-border-radius-bottomright:0px;
	border-bottom-right-radius:0px;
	-webkit-border-bottom-left-radius:0px;
	-moz-border-radius-bottomleft:0px;
	border-bottom-left-radius:0px;
	text-indent:0;
	border:1px solid #CCC;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold; 
	font-style:normal;
	height:40px;
	line-height:40px;
	width:100px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #CCC;
	margin-top:20px;
  background-color: #2F709E;
      }

      #button3 a {
        text-decoration: none;  /* Remove the underline from the links. */
		color:#000;
      }

      #button3 ul {
        list-style-type: none;  /* Remove the bullets from the list */
		margin-left:-10px;
		margin-top:10px;
      }

      #button3 .top {
        /*background-color: #DDD; */ /* The button background */
      }

      #button3 ul li.item {
        display: none;  /* By default, do not display the items (which contains the links) */
		margin-left:10px;
      }  

      #button3 ul:hover .item {  /* When the user hovers over the button (or any of the links) */
        display: block;
        border: 1px solid black;
        background-color: #CCC;
		
		
      }
#button3:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #2F709E), color-stop(1, #fff) );
	background:-moz-linear-gradient( center top, #2F709E 5%, #fff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#2F709E', endColorstr='#fff');
	background-color:#fff;
}
#button3:active {
	position:relative;
	top:1px;
	
}




#button1 {  /* Box in the button */
      -moz-box-shadow:inset 0px 1px 0px 0px #fff;
  -webkit-box-shadow:inset 0px 1px 0px 0px #fff;
  box-shadow:inset 0px 1px 0px 0px #fff;
  background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #f6b33d), color-stop(1, #d29105) );
  background:-moz-linear-gradient( center top, #f6b33d 5%, #d29105 100% );
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff', endColorstr='#CCC');
  background-color:#ffffff;
  -webkit-border-top-left-radius:0px;
  -moz-border-radius-topleft:0px;
  border-top-left-radius:0px;
  -webkit-border-top-right-radius:0px;
  -moz-border-radius-topright:0px;
  border-top-right-radius:0px;
  -webkit-border-bottom-right-radius:0px;
  -moz-border-radius-bottomright:0px;
  border-bottom-right-radius:0px;
  -webkit-border-bottom-left-radius:0px;
  -moz-border-radius-bottomleft:0px;
  border-bottom-left-radius:0px;
  text-indent:0;
  border:1px solid #fff;
  display:inline-block;
  color:#ffffff;
  font-family:Arial;
  font-size:15px;
  font-weight:bold; 
  font-style:normal;
  height:40px;
  line-height:40px;
  width:100px;
  text-decoration:none;
  text-align:center;
  text-shadow:1px 1px 0px #ffffff;
  margin-top:20px;
      }

      #button1 a {
        text-decoration: none;  /* Remove the underline from the links. */
    color:#000;
      }

      #button1 ul {
        list-style-type: none;  /* Remove the bullets from the list */
    margin-left:-10px;
    margin-top:10px;
      }

      #button1 .top {
        /*background-color: #DDD; */ /* The button background */
      }

      #button1 ul li.item {
        display: none;  /* By default, do not display the items (which contains the links) */
    margin-left:10px;
      }  

      #button1 ul:hover .item {  /* When the user hovers over the button (or any of the links) */
        display: block;
        border: 1px solid black;
        background-color: #CCC;
    
    
      }
#button1:hover {
  background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #d29105), color-stop(1, #f6b33d) );
  background:-moz-linear-gradient( center top, #d29105 5%, #f6b33d 100% );
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#d29105', endColorstr='#f6b33d');
  background-color:#d29105;
}
#button1:active {
  position:relative;
  top:1px;
  
}


#button2 {  /* Box in the button */
      -moz-box-shadow:inset 0px 1px 0px 0px #fed897;
  -webkit-box-shadow:inset 0px 1px 0px 0px #fed897;
  box-shadow:inset 0px 1px 0px 0px #fed897;
  background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #f6b33d), color-stop(1, #d29105) );
  background:-moz-linear-gradient( center top, #f6b33d 5%, #d29105 100% );
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f6b33d', endColorstr='#d29105');
  background-color:#f6b33d;
  -webkit-border-top-left-radius:0px;
  -moz-border-radius-topleft:0px;
  border-top-left-radius:0px;
  -webkit-border-top-right-radius:0px;
  -moz-border-radius-topright:0px;
  border-top-right-radius:0px;
  -webkit-border-bottom-right-radius:0px;
  -moz-border-radius-bottomright:0px;
  border-bottom-right-radius:0px;
  -webkit-border-bottom-left-radius:0px;
  -moz-border-radius-bottomleft:0px;
  border-bottom-left-radius:0px;
  text-indent:0;
  border:1px solid #eda933;
  display:inline-block;
  color:#ffffff;
  font-family:Arial;
  font-size:15px;
  font-weight:bold; 
  font-style:normal;
  height:40px;
  line-height:40px;
  width:100px;
  text-decoration:none;
  text-align:center;
  text-shadow:1px 1px 0px #cd8a15;
  margin-top:20px;
      }

      #button2 a {
        text-decoration: none;  /* Remove the underline from the links. */
    color:#000;
      }

      #button2 ul {
        list-style-type: none;  /* Remove the bullets from the list */
    margin-left:-10px;
    margin-top:10px;
      }

      #button2 .top {
        /*background-color: #DDD; */ /* The button background */
      }

      #button2 ul li.item {
        display: none;  /* By default, do not display the items (which contains the links) */
    margin-left:10px;
      }  

      #button2 ul:hover .item {  /* When the user hovers over the button (or any of the links) */
        display: block;
        border: 1px solid black;
        background-color: #CCC;
    
    
      }
#button2:hover {
  background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #d29105), color-stop(1, #f6b33d) );
  background:-moz-linear-gradient( center top, #d29105 5%, #f6b33d 100% );
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#d29105', endColorstr='#f6b33d');
  background-color:#d29105;
}
#button2:active {
  position:relative;
  top:1px;
  
}






label {
    display: block;
    padding-left: 15px;
    text-indent: -15px;
}
input {
    width: 13px;
    height: 13px;
    padding: 0;
    margin:0;
    vertical-align: bottom;
    position: relative;
    top: -1px;
    *overflow: hidden;
}
@media screen and (max-width: 620px) {
    
.tubepress_normal_embedded_wrapper, .tubepress_thumbnail_area {width:auto!important;}
.tubepress_container {
    width: 100%    !important;
      height: 75%   !important;}
.youtube-player {
    width: 100%    !important;
    height: 75%   !important;
}

}

@media screen and (max-width:767px) {
    #wpadminbar {
        display:none;
    }
    html {
        position:absolute;
        top:-28px;
        
    }
}

</style>  
    
   <style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
</style>
    
    <meta charset="utf-8">
	<title>TIAC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=no">
    <link href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
 <link href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/style/reset.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/font-awesome/css/font-awesome.min.css">

<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

        <link href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/style/example.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/style.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/responsive.css" type="text/css" media="all" >
    <link href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/lightbox.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/lightwindow.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/social-buttons.css" type="text/css" media="all" >
   <link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/cssmenu/styles.css" type="text/css" media="all" >
    <!--[if lt IE 9]>
      <script src="<?php echo get_site_url();?>/wp-content/themes/argo/assets/js/html5shiv.js"></script>
       <link href="<?php echo get_site_url();?>/wp-content/themes/argo/assets/css/ie.css" rel='stylesheet' type='text/css'>
    <![endif]-->
    
    <!--[if IE 7]>
		<link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/argo/assets/css/font-awesome-ie7.min.css">
	<![endif]-->
    
  <script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/jquery.js"></script>
<script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/jquery-migrate-1.2.1.js"></script>
<script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/jquery.mousewheel.min.js"></script>
<script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/jquery.mousewheel-3.0.6.pack.js"></script>
<script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/jquery.hoverdir.js"></script>
<script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/jquery.isotope.min.js"></script>
<script  src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/jquery.fancybox.js"></script>
<script  src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/jquery.fancybox.pack.js"></script>
<script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/lightbox-2.6.min.js"></script>
<script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/prototype.js"></script>
<script  src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/scriptaculous.js?load=effects"></script>
<script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/effects.js"></script>
<script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/lightwindow.js"></script>
<script  src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/main.js"></script>
<script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/style/script/respond.js"></script>
        <!--[if lte IE 8]>
        <script src="style/script/html5.js"></script>
        <![endif]-->
        
        <script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/script/jquery.js"></script>
        <script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/cssmenu/script.js"></script>
        <script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/jquery.smooth-scroll.js"></script>
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <script type="text/javascript">function s4(){"use strict";return Math.floor(65536*(1+Math.random())).toString(16).substring(1)}function guid(){"use strict";return s4()+s4()+"-"+s4()+"-"+s4()+"-"+s4()+"-"+s4()+s4()+s4()}function setupKoBootstrap(t){"use strict";t.bindingHandlers.typeahead={init:function(e,o,i){var a=$(e),n=i(),r={source:t.utils.unwrapObservable(o())};n.typeaheadOptions&&$.each(n.typeaheadOptions,function(e,o){r[e]=t.utils.unwrapObservable(o)}),a.attr("autocomplete","off").typeahead(r)}},t.bindingHandlers.progress={init:function(e,o,i,a){var n=$(e),r=$("<div/>",{"class":"bar","data-bind":"style: { width:"+o()+" }"});n.attr("id",guid()).addClass("progress progress-info").append(r),t.applyBindingsToDescendants(a,n[0])}},t.bindingHandlers.alert={init:function(e,o){var i=$(e),a=t.utils.unwrapObservable(o()),n=$("<button/>",{type:"button","class":"close","data-dismiss":"alert"}).html("&times;"),r=$("<p/>").html(a.message);i.addClass("alert alert-"+a.priority).append(n).append(r)}},t.bindingHandlers.tooltip={update:function(e,o){var i,a,n;if(a=t.utils.unwrapObservable(o()),i=$(e),t.isObservable(a.title)){var r=!1;i.on("show.bs.tooltip",function(){r=!0}),i.on("hide.bs.tooltip",function(){r=!1});var s=a.animation||!0;a.title.subscribe(function(){r&&(i.data("bs.tooltip").options.animation=!1,i.tooltip("fixTitle").tooltip("show"),i.data("bs.tooltip").options.animation=s)})}n=i.data("bs.tooltip"),n?$.extend(n.options,a):i.tooltip(a)}},t.bindingHandlers.popover={init:function(e,o,i,a,n){var r=$(e),s=t.utils.unwrapObservable(o()),p={};s.title?p.title=s.title:p.template='<div class="popover" role="tooltip"><div class="arrow"></div><div class="popover-content"></div></div>',s.placement&&(p.placement=s.placement),s.container&&(p.container=s.container),s.delay&&(p.delay=s.delay);var l,d=guid(),u="ko-bs-popover-"+d,c="";if(s.template){var v=s.template,f=s.data;c=f?function(){var e=$('<div data-bind="template: { name: template, if: data, data: data }"></div>');return t.applyBindings({template:v,data:f},e[0]),e}:$("#"+v).html(),l=$("<div/>",{"class":"ko-popover",id:u}).html(c)}else s.dataContent&&(c=s.dataContent),l=$("<div/>",{"class":"ko-popover",id:u}).html(c);var b=n.createChildContext(a);p.content=$(l[0]).outerHtml();var m=$.extend({},t.bindingHandlers.popover.options,p);if(m.addCloseButtonToTitle){var g=m.closeButtonHtml;void 0===g&&(g=" &times "),void 0===m.title&&(m.title=" ");var h=m.title,y='  <button type="button" class="close" data-dismiss="popover">'+g+"</button>";m.title=h+y}var k="";if(s.trigger)for(var H=s.trigger.split(" "),w=0;w<H.length;w++){var T=H[w];"manual"!==T&&(w>0&&(k+=" "),"click"===T?k+="click":"hover"===T?k+="mouseenter mouseleave":"focus"===T&&(k+="focus blur"))}else k="click";var B="";r.on(k,function(o){o.stopPropagation();var i="toggle",a=$(this),n=$("#"+u).is(":visible");if("focus"===B&&"click"===o.type&&n)return void(B=o.type);B=o.type,a.popover(m).popover(i);var r=$("#"+u),s=$(".ko-popover").not(r).parents(".popover");if(s.each(function(){var t=$(this),e=!1,o=t.parent(),i=o.data("bs.popover");if(i&&(e=!0,o.popover("destroy")),!e){var a=$(this).prev(),n=a.data("bs.popover");n&&(e=!0,a.popover("destroy"))}}),!n){t.applyBindingsToDescendants(b,r[0]);var p=$(e).offset().top,l=$(e).offset().left,d=$(e).outerHeight(),c=$(e).outerWidth(),v=$(r).parents(".popover"),f=v.outerHeight(),g=v.outerWidth(),h=10;switch(m.offset&&m.placement){case"left":v.offset({top:p-f/2+d/2,left:l-h-g});break;case"right":v.offset({top:p-f/2+d/2});break;case"top":v.offset({top:p-f-h,left:l-g/2+c/2});break;case"bottom":v.offset({top:p+d+h,left:l-g/2+c/2})}var y;y=m.container?$(m.container):a.parent(),y.on("click",'button[data-dismiss="popover"]',function(){a.popover("hide")})}return{controlsDescendantBindings:!0}})},options:{placement:"right",offset:!1,html:!0,addCloseButtonToTitle:!1,trigger:"manual"}}}!function(t){"use strict";t.fn.outerHtml=function(){if(0===this.length)return!1;var e=this[0],o=e.tagName.toLowerCase();if(e.outerHTML)return e.outerHTML;var i=t.map(e.attributes,function(t){return t.name+'="'+t.value+'"'});return"<"+o+(i.length>0?" "+i.join(" "):"")+">"+e.innerHTML+"</"+o+">"}}(jQuery),function(t){"use strict";"function"==typeof define&&define.amd?define(["require","exports","knockout"],function(e,o,i){t(i)}):t(window.ko)}(setupKoBootstrap);</script>


        <script type="text/html" id="popoverTemplate">
    <button class="close pull-right" type="button" data-dismiss="popover">×</button>
    Hey I am some content in A popover
    </script>

<script charset="UTF-8" type="text/javascript" src="https://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0&s=1&mkt=pt-pt">
</script>
<script charset="UTF-8" type="text/javascript" src="https://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0&s=1&mkt=pt-pt">
</script>

      <script type="text/javascript">
    var map = null;
         function GetMap()
         {
              // Initialize the map
            map = new Microsoft.Maps.Map(document.getElementById("mapDiv"),
                         {credentials:"AtP1DybWI9E9vYFWbQGztvGR9d445oux5SwVgz9n2Fwvn_3wdjCzm9tGl24CcBS2"}); 

            // Define the pushpin location
            var loc = new Microsoft.Maps.Location(38.772049, -9.159595);
            
            // Add a pin to the map
            var pin = new Microsoft.Maps.Pushpin(loc); 
            map.entities.push(pin);

            // Center the map on the location
            map.setView({center: loc, zoom: 15});

            map.AttachEvent("onmousewheel", function(e) {
        var mouseWheel = -e.mouseWheelChange / 2;
        window.scrollBy(0,mouseWheel);
        return true;
    });

           /* var map = new Microsoft.Maps.Map(document.getElementById("mapDiv"), 
                           {credentials: "AtP1DybWI9E9vYFWbQGztvGR9d445oux5SwVgz9n2Fwvn_3wdjCzm9tGl24CcBS2",
                            center: new Microsoft.Maps.Location(38.747898, -9.158497),
                            mapTypeId: Microsoft.Maps.MapTypeId.road,
                            zoom: 16});*/

         }


      </script>
<script type="text/javascript">
  $( document ).ready(function() {
    $(".don").on("click",function(){
      $("input[id='price']").attr("disabled", "disabled");
    });

     $("input[id='price']").on("focus",function(){
      $(".don").attr("disabled", "disabled");
    });
});
</script>

        <script>



   var templateDirectory = '<?php bloginfo('template_directory'); ?>';

            jQuery(function($) {
                var open = false;

               function resizeMenu() {
                    if ($(this).width() < 790) {
                        if (!open) {
                            $("#menu-drink").hide();
                        }
                        $("#menu-button").show();
                        $("#logo").attr('src', templateDirectory + '/assets/img/logoc.png');

                    }
                    else if ($(this).width() >= 760) {
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
$(document).ready(function () {
              $(".menu-item").click(function(e) {
                var largura = $( window ).width();
                if(largura < 770){
             $("#menu-drink").hide();
           }
             });
            });
	


function loadTwitter(d,s,id){
  var js,fjs=d.getElementsByTagName(s)[0];
  if(!d.getElementById(id)){
    js=d.createElement(s);
    js.id=id;
    js.src="//platform.twitter.com/widgets.js";
    fjs.parentNode.insertBefore(js,fjs);
  }
}


function removeTwitter(id){
  jQuery('script[id='+id+']').remove(); // Remove the included js file
  jQuery('iframe.twitter-timeline').remove(); // Remove the timeline iframe
}

function addTwitter(options){
  var linkStr = '<a class="twitter-timeline"';
  linkStr += (options.width)?' width="'+options.width+'"':'';
  linkStr += (options.height)?' height="'+options.height+'"':'';
  linkStr += (options.color)?' data-link-color="'+options.color+'"':'';
  linkStr += (options.theme)?' data-theme="'+options.theme+'"':'';
  linkStr += ' https://twitter.com/transparenciapt" data-widget-id="363686419455160322">Tweets TIAC</a>';
  jQuery(linkStr).appendTo(options.element);
}
  
function showTwitter(id,options) {
  removeTwitter(id);
  addTwitter(options);
  loadTwitter(document,'script',id);
}



  $(document).ready(function(){
	$('a[href^="#"]').on('click',function (e) {
	    e.preventDefault();

	    var target = this.hash,
	    $target = $(target);

	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    }, 900, 'swing', function () {
	        window.location.hash = target;
	    });
	});
});

    $(document).ready(function() {
      /*
       *  Simple image gallery. Uses default settings
       */

      $('.fancybox').fancybox();


function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'pt', includedLanguages: 'en,pt', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
}
</script>




<!--<script src='<?php echo get_site_url();?>/wp-content/plugins/wordpress-bootstrap-css/resources/bootstrap-2.3.2/js/bootstrap.js?ver=2.3.2-2'></script>-->
<!--<script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/bootstrap-transition.js"></script>
<script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/bootstrap-modal.js"></script>
<script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/bootstrap-dropdown.js"></script>
<script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/bootstrap-carousel.js"></script>
<script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/bootstrap-collapse.js"></script>
<script src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/js/bootstrap-scrollspy.js"></script>-->
    <?php wp_head(); ?> 
  </head>
<?php 
	$arr=array();
	for($i=0;$i<5;$i++){
		$arr[$i]="https://$_SERVER[HTTP_HOST]/wp-content/themes/wpbootstrap/assets/img/Imagens1/".$i.".png"; //assigning the image location to the array $arr.
	}
	$random=rand(1,4); //generating a random number
?>
<?php
$arr2=array();
	for($b=0;$b<5;$b++){
		$arr2[$b]="https://$_SERVER[HTTP_HOST]/wp-content/themes/wpbootstrap/assets/img/Imagens2/".$b.".png"; //assigning the image location to the array $arr.
	}
	$random2=rand(1,4); 

?>
<?php
$arr3=array();
	for($c=0;$c<5;$c++){
		$arr3[$c]="https://$_SERVER[HTTP_HOST]/wp-content/themes/wpbootstrap/assets/img/Imagens3/".$c.".png"; //assigning the image location to the array $arr.
	}
	$random3=rand(1,4); 

?>
<?php
$arr4=array();
	for($d=0;$d<5;$d++){
		$arr4[$d]="https://$_SERVER[HTTP_HOST]/wp-content/themes/wpbootstrap/assets/img/Imagens4/".$d.".png"; //assigning the image location to the array $arr.
	}
	$random4=rand(1,4); 

?>


 <body data-spy="scroll" data-target=".navbar" onload="showTwitter('twitter-wjs',{width:100,height:530,color:'#ff0000',theme:'dark',element:'div.feed'});GetMap(); alert('O novo website da TIAC, lançado há poucos dias, está ainda na fase final de desenvolvimento. Algumas funcionalidades, como o login e o registo de membros da associação, estão temporariamente indisponíveis enquanto completamos acertos no sistema de gestão da TIAC. Brevemente, todas as funcionalidades do website estarão online. Entretanto, se quiser deixar-nos comentários e sugestões acerca do nosso novo portal escreva-nos para secretariado@transparencia.pt. Obrigado!');">  
<header id="header">
  
 <?php floating_social_media_links() ?>
	<div class="header-holder">
     
<!--<div  id="google_translate_element" style="float:right;"></div>-->

		<div class="container hidden-phone">
			<div class="brow">
        <div style="float:right;">
        <script type="text/javascript" src="https://seal.thawte.com/getthawteseal?host_name=transparencia.pt&amp;size=M&amp;lang=pt"></script></div>
				<div class="brick1 logo_container">
					<a href="#" class="nav-item clearfix" style="margin-top:-1px;">
						<div class="nav-hover"></div>
						<h1 class="logo"><img src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/img/logo2.png" height="195" width="195" alt=""></h1>
					</a>
				</div>
				<div class="brick1 transparent"></div>
			</div>
			<div class="brow">
				<div class="slogan brick3 boffset1 transparent text-right">
					<div class="inner" style="margin-top:-18px;">
						<h1 >A TIAC – TRANSPARÊNCIA E INTEGRIDADE, ASSOCIAÇÃO CÍVICA</h1>
					<p > é uma organização não governamental que tem como missão combater a corrupção. A TIAC é a representante em Portugal da rede global anti-corrupção Transparency International.</p>	
					</div>
					
				</div>
				<div class="brick1 odd">
					<a href="#sobre" class="nav-item" style="margin-top:-1px;">
						<div class="nav-hover"></div>
						<i class="fa fa-users  fa-lg"></i>
						<span><b>Sobre</b></span>
					</a>
				</div>
				<div class="brick1 thumb">
					<div class="nav-item flipY">
						<img class="img1" src="<?php echo $arr[$random]; ?>" height="195" width="195" alt="">
					    <img class="img2" src="<?php echo $arr2[$random2]; ?>" height="195" width="195" alt="">

					</div>
				</div>
			</div>
			<div class="brow">
				<div class="brick1 ">
<a href="#participa" class="nav-item" style="margin-top:-1px;">
            <div class="nav-hover"></div>
            <i class="fa fa-wrench  fa-2x"></i>
            <span><b>Participa</b></span>
          </a>


					
				</div>
				<div class="brick1 odd">
          <a href="#topicos" class="nav-item" style="margin-top:-1px;">
            <div class="nav-hover"></div>
            <i class="fa fa-exclamation-triangle fa-lg"></i>
            <span><b>Corrupção</b></span>
          </a>
          
            

        
      </div>
				<div class="brick1">

          <a href="#noticias" class="nav-item" style="margin-top:-2px;">
            <div class="nav-hover"></div>
            <i class="fa fa-rss fa-lg"></i>
            <span><b>Notícias</b></span>
          </a>

  
        </div>
				<div class="brick1 odd">
					<a href="#agenda" class="nav-item" style="margin-top:-1px;">
            <div class="nav-hover"></div>
            <i class="fa fa-calendar  fa-lg"></i>
            <span><b>Agenda</b></span>
          </a>
				</div>
				<div class="brick1">
          <a href="#publicacoes" class="nav-item" style="margin-top:-1px;">
            <div class="nav-hover"></div>
            <i class="fa fa-file-o fa-lg"></i>
             <span><b>Publicações</b></span>
          </a>
					
				</div>
			</div>
			<div class="brow">
				<div class="brick1 boffset2">
				  <div class="brick1 odd">
            <a href="#provedoria" class="nav-item" style="margin-top:-1px;">
            <div class="nav-hover"></div>
            <i class="fa fa-gavel fa-lg"></i>
            <span><b>Provedoria</b></span>
          </a>
      
					
				</div>
					<!--<div class="nav-item flipY">
						<img class="img1" src="http://civicrm.tiac.webfactional.com/wp-content/themes/argo/assets/img/img-slide5.png" alt="">
						<img class="img2" src="http://civicrm.tiac.webfactional.com/wp-content/themes/argo/assets/img/pf7.png" alt="">
					</div>-->
				</div>
				<div class="brick1">
				  <div class="brick1">
            <a href="#contatos" class="nav-item" style="margin-top:-1px;">
            <div class="nav-hover"></div>
            <i class="fa fa-envelope fa-lg"></i>
            <span><b>Contactos</b></span>
          </a>
					
				</div>
					<!--<div class="nav-item flipY">
						<img class="img1" src="http://civicrm.tiac.webfactional.com/wp-content/themes/argo/assets/img/img-slide6.png" alt="">
						<img class="img2" src="http://civicrm.tiac.webfactional.com/wp-content/themes/argo/assets/img/pf6.png" alt="">
					</div>-->
				</div>
			</div>

		</div>

		<div class="container visible-phone">
<!--<div  id="google_translate_element" style="float:right;"></div>-->
			<div class="brick1 logo_container">
					<a href="#" class="nav-item clearfix" style="margin-top:-1px;">
						<div class="nav-hover"></div>
						<h1 class="logotlm"><img src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/img/logo2.png" height="195" width="195" alt=""></h1>
					</a>
				</div>
              <div class="brick1 odd">
          <a href="#" class="nav-item" style="margin-top:-1px;">
            <div class="nav-hover"></div>
            <i class="icon-home fa-lg"></i>
            <span>Home</span>
          </a>
        </div>
				<div class="brick1 odd">
					<a href="#sobre" class="nav-item" style="margin-top:-1px;" >
						<div class="nav-hover"></div>
						<i class="fa fa-users  fa-lg"></i>
						<span>Sobre</span>
					</a>
				</div>
				
				<div class="brick1">
					<a href="#topicos" class="nav-item" style="margin-top:-1px;">
						<div class="nav-hover"></div>
						<i class="fa fa-exclamation-triangle fa-lg"></i>
						<span>Corrupção</span>
					</a>
				</div>
				<div class="brick1">
					<a href="#noticias" class="nav-item" style="margin-top:-1px;">
						<div class="nav-hover"></div>
						<i class="fa fa-rss fa-lg"></i>
						<span>Notícias</span>
					</a>
				</div>
                <div class="brick1 odd">
					<a href="#agenda" class="nav-item" style="margin-top:-1px;">
						<div class="nav-hover"></div>
						<i class="fa fa-calendar fa-lg"></i>
						<span>Agenda</span>
					</a>
				</div>
				<div class="brick1 odd">
					<a href="#publicacoes" class="nav-item" style="margin-top:-1px;">
						<div class="nav-hover"></div>
						<i class="fa fa-file-o fa-lg"></i>
						<span>Publicações</span>
					</a>
				</div>
                <div class="brick1">
					<a href="#provedoria" class="nav-item" style="margin-top:-1px;">
						<div class="nav-hover"></div>
						<i class="fa fa-gavel fa-lg"></i>
						<span>Provedoria</span>
					</a>
				</div>
               
               <div class="brick1">
					<a href="#contatos" class="nav-item" style="margin-top:-1px;">
						<div class="nav-hover"></div>
						<i class="fa fa-envelope fa-lg"></i>
						<span>Contactos</span>
					</a>
				</div>
         <div class="brick1 odd">
          <a href="#" class="nav-item" style="margin-top:-1px;" onClick="alert(' © 2014 TIAC. Todos os direitos reservados. ')">
            <div class="nav-hover"></div>
            <i class="fa-edit fa-lg"></i>
            <span>Créditos</span>
          </a>
        </div>
                
               
	
       </div>

</header> <!-- End header -->




<div id="navbar" class="navbar">
  
    <div id="banner-wrapper">
            <div id="banner" role="banner">
                <div id="banner-inner-wrapper">
                    <div id="banner-inner">
                        <hgroup id="title">
                            <img id="logo" src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/img/logoRodape.png" width="200" height="60"/>
                        </hgroup>
                        <nav id="menu-nav">
                            <div id="menu-button">
                                <div id="menu-button-inner"></div>
                            </div>
                        </nav>
                    </div>
                </div>
                <nav id="menu-drink">
                   <ul>

                          <li class="menu-item">
                         
                            
                            <div class="visible-phone">
                            <a href="/"><i class="fa fa-home fa-lg"></i><b style="margin-left:5px">Home</b></a>
                            </div>
                            <div class="hidden-phone">
                            <a href="#sobre"><i class="fa fa-users  fa-lg" ></i><b style="margin-left:5px">Sobre</b></a>
                            </div>
                        </li>

                        <li class="menu-item">
                         <div class="visible-phone">
                            <a href="#sobre"><i class="fa fa-users  fa-lg" ></i><b style="margin-left:5px">Sobre</b></a>
                            </div>
                             <div class="hidden-phone">
                             <a href="#participa"><i class="fa fa-wrench  fa-2x" style="margin-left:-5px"></i><b style="margin-left:5px">Participa</b></a>
                            </div>
                            
                        </li>
                        

                        <li class="menu-item">
                        <a href="#topicos"><i class="fa fa-exclamation-triangle fa-lg" ></i><b style="margin-left:5px">Corrupção</b></a>

                      </li>
                        <li class="menu-item">
                            <a href="#noticias"><i class="fa fa-rss fa-lg" ></i><b style="margin-left:5px">Notícias</b></a>
                        </li>
                         
                        <li class="menu-item">
                          <a href="#agenda"><i class="fa fa-calendar fa-lg" ></i><b style="margin-left:5px">Agenda</b></a>
                        </li>
                        <li class="menu-item">
                          <a href="#publicacoes"><i class="fa fa-file-o fa-lg" ></i><b style="margin-left:5px">Publicações</b></a>
                        </li>
                        

                        <li class="menu-item" style="font-family: FontAwesome;">
                          <a href="#provedoria"><i class="fa fa-gavel fa-lg" ></i><b style="margin-left:5px">Provedoria</b></a>
                        </li>
                        <li class="menu-item" >
                           <a href="#contatos" ><i class="fa fa-envelope fa-lg" ></i><b style="margin-left:5px">Contatos</b></a>
                        </li>
                        <div class="visible-phone">
                        <li class="menu-item">
                          <a href="#" onClick="alert(' © 2014 TIAC. Todos os direitos reservados. )"><i class=" fa fa-edit fa-lg"></i><b style="margin-left:5px">Créditos</b></a>
                        </li>
                      </div>
                    </ul>
                </nav>
            </div>
        </div>
</div>


<div id="testimonial" class="divider section">
 

   
  
