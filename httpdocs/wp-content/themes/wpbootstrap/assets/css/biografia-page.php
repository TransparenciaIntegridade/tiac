<?php
/*
Template Name: Biografia
*/
?>
<!doctype html>
<head>
	<title>Biografia de <?php echo get_the_title();?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/style.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/responsive.css" type="text/css" media="all" >
    <link href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/lightbox.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/lightwindow.css" type="text/css" media="screen" /><link id="fsmlStyleSheet-1-5-1" media="all" type="text/css" href="http://civicrm.tiac.webfactional.com/wp-content/plugins/floating-social-media-links/fsml-base.css?ver=1.5.1" rel="stylesheet">
 <style type="text/css">
 .</style> 
<script src="http://civicrm.tiac.webfactional.com/?page_id=673/wp-content/themes/wpbootstrap/assets/js/bootstrap.js"></script>

<script src="http://civicrm.tiac.webfactional.com/?page_id=673/wp-content/themes/wpbootstrap/assets/js/bootstrap-collapse.js"></script>
<style type="text/css">
  /* Clearfix */
.clearfix:before,
.clearfix:after {
    content: " ";
    display:block;
}
.clearfix:after {
    clear: both;
}
.clearfix {
    *zoom: 3;
}

/* Basic Styles */
body {
	background-color: #ece8e5;
}
nav {
	height: 100%;
	width: 100%;
	background: #455868;
	font-size: 30pt;
	font-family: 'PT Sans', Arial, sans-serif;
	font-weight: bold;
	position: relative;
	border-bottom: 2px solid #283744;
}
nav ul {
	padding: 0;
	margin: 0 auto;
	/*width: 600px;
	height: 40px;*/
}
nav li {
	display: inline;
	float: right;
}
nav a {
	color: #fff;
	display: inline-block;
	width: 100px;
	text-align: center;
	text-decoration: none;
	line-height: 40px;
	text-shadow: 1px 1px 0px #283744;
}
nav li a {
	border-right: 1px solid #576979;
	box-sizing:border-box;
	-moz-box-sizing:border-box;
	-webkit-box-sizing:border-box;
}
nav li:last-child a {
	border-right: 0;
}
nav a:hover, nav a:active {
	background-color: #8c99a4;
}
nav a#pull {
	display: none;
}

/*Styles for screen 600px and lower*/
@media screen and (max-width: 600px) {
	li [class^="icon-"], .nav li {
		float:left;
	}
	nav { 
  		height: auto;
  	}
  	nav ul {
  		width: 100%;
  		display: block;
  		height: auto;
  	}
  	nav li {
  		width: 50%;
  		float: left;
  		position: relative;
  	}
  	nav li a {
		border-bottom: 1px solid #576979;
		border-right: 1px solid #576979;
	}
  	nav a {
	  	text-align: left;
	  	width: 100%;
	  	text-indent: 25px;
  	}
}

/*Styles for screen 515px and lower*/
@media only screen and (max-width : 480px) {
	li [class^="icon-"], .nav li {
		float:left;
	}
	nav {
		border-bottom: 0;
	}
	nav ul {
		display: none;
		height: auto;
	}
	nav a#pull {
		display: block;
		background-color: #283744;
		width: 100%;
		position: relative;
	}
	nav a#pull:after {
		content:"";
		background: url('nav-icon.png') no-repeat;
		width: 30px;
		height: 30px;
		display: inline-block;
		position: absolute;
		right: 15px;
		top: 10px;
	}
}

/*Smartphone*/
@media only screen and (max-width : 320px) {
	nav li {
		display: block;
		float: none;
		width: 100%;
	}
	nav li a {
		border-bottom: 1px solid #576979;
	}
}
 
  </style>
<?php wp_head(); ?> 


</head>
<body>
<nav class="clearfix">

	<ul class="clearfix">
    <a href="#" class="brand"><img src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/img/logoc.png" height="60" width="200" alt=""></a>
    <li></li>
		 <li><a href="#about-us"><i class="icon-group"></i>A TIAC</a></li>
		<li><a href="#services"><i class="icon-flag"></i>Objetivos</a></li>
		<li> <a href="#portfolio"><i class="icon-cog"></i>Projetos</a></li>
		<li><a href="#blog"><i class="icon-comments-alt"></i>Noticias</a></li>
		<li><a href="#eventos"><i class="icon-bullhorn"></i>Eventos</a></li>
		<li><a href="#donate"><i class="icon-folder-open"></i>Publicações</a></li>	
        <li><a href="#contact"><i class="icon-envelope"></i>Contatos</a></li>
		<li><a href="#donate"><i class="icon-folder-open"></i>Subscrição</a></li>
        
	</ul>
	<a href="#" id="pull">Menu</a>
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