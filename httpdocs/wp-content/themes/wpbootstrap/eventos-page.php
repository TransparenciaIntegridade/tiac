<?php
/*
Template Name: Eventos TIAC
*/
?>
<!doctype html>
<head>
	<title>Eventos TIAC </title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/style.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/responsive.css" type="text/css" media="all" >
    <link href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/lightbox.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/lightwindow.css" type="text/css" media="screen" /><link id="fsmlStyleSheet-1-5-1" media="all" type="text/css" href="http://civicrm.tiac.webfactional.com/wp-content/plugins/floating-social-media-links/fsml-base.css?ver=1.5.1" rel="stylesheet">
  <style type="text/css">
  
  /*RESET*/
html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td {margin:0; padding:0; border:0; outline:0; font-size:100%; vertical-align:baseline; background:transparent;} body {line-height: 1;}ol, ul{list-style:none;} blockquote, q{quotes:none;} blockquote:before, blockquote:after, q:before, q:after{content:'';content:none;} :focus{outline:0;} ins{text-decoration:none;} del{text-decoration:line-through;} table{border-collapse:collapse; border-spacing:0;}
  
/*MAIN*/
body { 
	font-size: 1.05em;
	line-height: 1.25em;
	font-family: Helvetica Neue, Helvetica, Arial;
	background: #f9f9f9;
	color: #555;
}

a {

	color: #4C9CF1;
	text-decoration: none;
	font-weight: bold;

}

a:hover {

	color: #444;

}

img {

	width: 100%;

}

header {

	background: #fff;
	width: 100%;
	height: 76px;
	position: fixed;
	top: 0;
	left: 0;
	border-bottom: 4px solid #4C9CF1;
	z-index: 100;

}

#logo{

	margin: 20px;
	float: left;
	width: 200px;
	height: 40px;
	background: url(<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/images/logo.png) no-repeat center;
	display: block;

}

nav {

	float: right;
	padding: 20px;	

}

#menu-icon {

	display: hidden;
	width: 40px;
	height: 40px;
	background: #4C8FEC url(<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/images/menu-icon.png) center;

}

a:hover#menu-icon {

	background-color: #444;
	border-radius: 4px 4px 0 0;

}

ul {

	list-style: none;

}

li {

	display: inline-block;
	float: left;
	padding: 10px

}

.current {

	color: #2262AD;

}

section {

	margin: 80px auto 40px;
	max-width: 980px;
	position: relative;
	padding: 20px

}

h1 {

	font-size: 2em;
	color: #2262AD;
	line-height: 1.15em;
	margin: 20px 0 ;

}

p {

	line-height: 1.45em;
	margin-bottom: 20px;

}
/*MEDIA QUERY*/
@media only screen and (max-width : 640px) {

	header {

		position: absolute;

	}

	#menu-icon {

		display:inline-block;

	}

	nav ul, nav:active ul { 

		display: none;
		position: absolute;
		padding: 20px;
		background: #fff;
		border: 5px solid #444;
		right: 20px;
		top: 60px;
		width: 50%;
		border-radius: 4px 0 4px 4px;

	}

	nav li {

		text-align: center;
		width: 100%;
		padding: 10px 0;
		margin: 0;

	}

	nav:hover ul {

		display: block;

	}
  
  </style>
 
 
 
 
<?php wp_head(); ?> 
</head>
<body>
<nav>

<a href="#" id="menu-icon"></a>

<ul>

<li><a href="#" class="current">Home</a></li>
<li><a href="#">About</a></li>
<li><a href="#">Work</a></li>
<li><a href="#">Blog</a></li>
<li><a href="#">Contact</a></li>

</ul>

</nav>
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
		<b>&copy; 2013</b> <a style="color:#0397d6;" href="http://transparencia.pt" target="_blank"><b>TIAC</b></a><b>. Todos os direitos reservados. - Mastered by </b><a style="color:#0397d6;" href="http://dmanlancers.byethost16.com" target="_blank"><b>Dm@nl@ncers</b></a>
	</div>
</footer>
<?php wp_footer(); ?> 
</body>
</html>