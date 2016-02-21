<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Ancorage-net</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Ancorage-net">
		<meta name="author" content="Dmanlancers">
		<link href="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/assets/css/bootstrap-responsive.min.css" rel="stylesheet">
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    	<![endif]-->
		<link href="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/assets/css/" rel="stylesheet">
		<link href="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/assets/css/bootstrap-lightbox.min.css" rel="stylesheet">
		<link href="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/assets/css/m-styles.min.css" rel="stylesheet">
		<link href="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/assets/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
		<link rel="image_src" href="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/thumbnail.png">
		<link rel="icon" type="image/ico" href="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/favicon.ico">
		<link rel="stylesheet" id="ssfa-chosen-style-css" href="http://ancorage-net.transparencia.pt/wp-content/plugins/file-away/js/chosen/chosen.css?ver=3.9.1" type="text/css" media="all">
		<link rel="stylesheet" id="ssfa-styles-css" href="http://ancorage-net.transparencia.pt/wp-content/plugins/file-away/css/ssfa-styles.css?ver=3.9.1" type="text/css" media="all">
		<link rel="stylesheet" id="ssfa-icons-style-css" href="http://ancorage-net.transparencia.pt/wp-content/plugins/file-away/css/ssfa-icons-style.css?ver=3.9.1" type="text/css" media="all">
		<link rel="stylesheet" type="text/css" media="all" href="http://ancorage-net.transparencia.pt/wp-content/themes/twentyfourteen/assets/css/responsive-tables.css"> 
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript" src="http://ancorage-net.transparencia.pt/wp-content/plugins/file-away/js/footable.js?ver=1.0"></script>
		<script type="text/javascript" src="http://ancorage-net.transparencia.pt/wp-content/plugins/file-away/js/chosen/chosen.jquery.js?ver=1.0"></script>
		<script type="text/javascript" src="http://ancorage-net.transparencia.pt/wp-content/plugins/file-away/js/alertify.js?ver=1.0"></script>
		<script type="text/javascript" src="http://ancorage-net.transparencia.pt/wp-content/plugins/file-away/js/jquery.alphanum.js?ver=1.0"></script>
		<script type="text/javascript" src="http://ancorage-net.transparencia.pt/wp-content/plugins/file-away/js/ssfa-file-management.js?ver=1.0"></script>
		<script type="text/javascript" src="http://ancorage-net.transparencia.pt/wp-content/plugins/file-away/js/soundmanager2-nodebug-jsmin.js?ver=2.9"></script>
		<script type="text/javascript" src="http://ancorage-net.transparencia.pt/wp-content/themes/twentyfourteen/assets/js/responsive-tables.js"></script>

	<!--main bootstrap js-->
		<script src="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/assets/js/bootstrap.min.js" type="text/javascript"></script>
	<!--custom js-->
		<script src="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/assets/js/custom.js" type="text/javascript"></script>
	<!--preloader-->
		<script type="text/javascript">
			$(window).load(function() {
				$("#status").fadeOut();
				$("#preloader").delay(350).fadeOut("slow");
			})
		</script>
	<!--retina support-->
		<script src="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/assets/js/retina.js" type="text/javascript"></script>
	<!--smooth scroll on page-->
		<script src="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/assets/js/jquery.easing-1.3.pack.js" type="text/javascript"></script>
	<!--custom scrollbar-->
		<script src="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/assets/js/jquery.nicescroll.min.js" type="text/javascript"></script>
	<!--parallax-->
		<script src="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/assets/js/jquery.stellar.js" type="text/javascript"></script>
	<!--contact-->
		<script src="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/assets/js/jquery.form.js"></script>		
	<!--gallery twentyfourteenbox-->
		<script src="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/assets/js/bootstrap-lightbox.min.js"></script>
	<!--google analytics-->
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'YOUR GOOGLE ANALYTICS CODE']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
	</head>
	<body data-spy="scroll" data-target=".navbar" data-offset='64' onLoad="$.stellar();">
		<div id="preloader">
			<div id="status">&nbsp;</div>
		</div>
	<!--start navigation-->
		<div class="navbar navbar-fixed-top" id="navigation">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
					</a>
					<a href="#intro" class="brand">ANCORAGE-NET</a>
					<div class="nav-collapse collapse">
						<ul class="nav pull-right">
							<li><a href="#home">Home</a></li>
							<li class="dropdown">
								<a id="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown">About The Project <b class="caret"></b></a>
								<ul class="dropdown-menu" aria-labelledby="drop1">
			                        <li><a href="#mission">Mission Statement</a></li>
			                        <li><a href="#project">The Project</a></li>
			                        <li><a href="#projectbackground">Project Background</a></li>
			                        <li><a href="#nextsteps">Next Steps</a></li>
                      			</ul>
							</li>
							<li><a href="#news">News</a></li>
							<li class="dropdown">
								<a id="drop2" href="#" class="dropdown-toggle" data-toggle="dropdown">National Assessment Survey on ACAs <b class="caret"></b></a>
								<ul class="dropdown-menu" aria-labelledby="drop2">
			                        <li><a href="#methodology">Methodology</a></li>
			                        <li><a href="#data">Data</a></li>
			                        <li><a href="#comparativedata">Comparative Data</a></li>
                      			</ul>
							</li>
							<li><a href="#documents">Documents</a></li>
							<li><a href="#events">Events</a></li>
							<li class="dropdown">
								<a id="drop3" href="#" class="dropdown-toggle" data-toggle="dropdown" href="#">Who's Who <b class="caret"></b></a>
								<ul class="dropdown-menu" aria-labelledby="drop3">
			                        <li><a href="#researchteam">Research Team</a></li>
			                        <li><a href="#partner">Partner Institutions</a></li>
                      			</ul>
							</li>
							<li><a href="#links">Links</a></li>
							<li><a href="#contacts">Contacts</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>