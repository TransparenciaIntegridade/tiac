<!--start footer-->
		<section id="footer" style="background-color:#fff">
			<div class="container">
				<div class="row divide">
	<!--logo and copyright-->
					<div class="span3">
						<a href="#intro" class="brand"><img src="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/assets/img/logo.png" alt=""></a>
						<p>2014 © Ancorage-net.</p><br>
						<p>Mastered by Dm@nl@ncers <br> of <a href="http://dmanlancers.tiac.webfactional.com" target="_blank">Dm@nl@ncers</a></p><br>
					</div>
	<!--footer menu-->
					<div class="span2 offset4">
						<ul>
							<li><h5>Menu</h5></li>
							<li><a href="#">INÍCIO</a></li>
							<li><a href="#quemsomos">QUEM SOMOS</a></li>
							<li><a href="#oprojeto">O PROJETO</a></li>
							<li><a href="noticias">NOTÍCIAS</a></li>
							<li><a href="#documentos">DOCUMENTOS</a></li>
                            <li><a href="#publicacoes">PUBLICAÇÕES</a></li>
						</ul>
					</div>
	<!--link to social networks-->
					<div class="span2 offset1">
						<ul>
							<li><h5>Social</h5></li>
							<li><a class="facebook" href="http://www.facebook.com/awerest" target="_blank">Facebook</a></li>
							<li><a class="twitter" href="http://www.twitter.com/awerest" target="_blank">Twitter</a></li>
							<li><a class="google" href="https://plus.google.com/u/0/104533843132286032110/posts" target="_blank">Google+</a></li>
							<li><a class="instagram" href="http://www.instagram.com/awerest" target="_blank">Instagram</a></li>
							<li><a class="pinterest" href="http://www.pinterest.com/awerest" target="_blank">Pinterest</a></li>
						</ul>
					</div>	
				</div>	
			</div>
		</section>
	<!--latest jQuery-->
		<script src="http://code.jquery.com/jquery-latest.js"></script>
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
	</body>
</html>