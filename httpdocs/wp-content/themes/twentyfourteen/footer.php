<?php 
global $wpdb;

//$user_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->civicrm_contact" );


if( isset($_POST['submit']) ) {
  
$email = $_POST['email'];


//print_r($email);


$email_existente= $wpdb->get_var("SELECT COUNT(contact_id) FROM  civicrm_email  WHERE email='$email'");
$x =$wpdb->get_var("SELECT COUNT(contact_id)  FROM civicrm_group_contact WHERE contact_id = '$email_existente' AND group_id='113'");



print_r($email_existente);
print_r($x);



  
 

if(empty($email)){
        
            echo "<script>alert('Preencha o campo email!'); window.location = './';</script>";

      }


      if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
     
         echo "<script>alert('O formato incorreto de email!'); window.location = './';</script>";


      }

      
if( $x + $email_existente != 0){
        
            echo "<script>alert('O email já se encontra registado!'); window.location = './';</script>";

      }else{

    $max_contact_id= $wpdb->get_var("SELECT MAX(id) FROM civicrm_contact");
    $contact_id=$max_contact_id + 1;

  

  $wpdb->query("INSERT INTO civicrm_contact (id) VALUES ('$contact_id}')");
  $wpdb->query("INSERT INTO civicrm_email (contact_id,email,is_primary,is_billing) VALUES ('{$contact_id}','{$email}','1','1')");
  $wpdb->query("INSERT INTO civicrm_group_contact (group_id,contact_id,status) VALUES ('14','$contact_id','Added')");
  echo "<script>alert('Newsletter subscrita com sucesso!'); window.location = './';</script>";
}

}

?>



<?php
//$email_existente= $wpdb->get_var("SELECT MIN(contact_id) FROM  civicrm_email  WHERE email='$email'");



?>


<style type="text/css">
	
@media (max-width: 844px){
	 
	.col-sm-6{

text-align: center;


	}
}
@media (max-width: 844px){
	 
	.subscribeMe{

margin-left: 13%;


	}
}
@media (max-width: 1090px){
	 
	footer {

/*text-align: center;*/


	}
}

</style>

<section id="connect">
    <div class="container">
    <div class="row">
      <div class="col-sm-6">
      <div align="center">
        <h3>SEGUE-NOS NAS REDES SOCIAIS</h3>
        
        <?php if (function_exists('synved_social_follow_markup')) echo synved_social_follow_markup(); ?>
        </div>
      </div>
     <div class="col-sm-6">
        <h3>SUBSCREVE A NOSSA NEWSLETTER</h3>
        <div align="center">
        <form id="NewsletterForm" method="post">
          <input width="30" type="text" class="subscribeMe" id="email" name="email" placeholder="Introduz o teu e-mail">
          <button role="submit" name="submit" id="submit">SUBSCREVER </button>
          <ul style="list-style-type: none;">
          <!--<li class="col-sm-12 col-md-6">
          <input type="checkbox" name="dcn" value="true" checked="checked"  width="20%"><label>Newsletter Semanal</label></li>
          <li class="col-sm-12 col-md-6"><input type="checkbox" name="tipr" value="true" width="20%"><label>Newsletter Mensal</label></li>
       -->
          </ul>
        </form>
        </div>
      </div>
      </div>
    </div>
  </section>



 


<footer style="background-color:#e0e0e0">
    <div class="container site-map" style="text-align:center">
    <div class="row">
      <div class="col-md-3">
        <h4>FAQ</h4>
        <ul>
       
	    <li style="list-style: none;"><a href="https://transparencia.pt/faq/#corrupcao" class="fancybox">O que é a corrupção?</a></li>
						<li style="list-style: none;"><a href="https://transparencia.pt/faq/#transparencia" class="fancybox">O que é a transparência?</a></li>
						<li style="list-style: none;"><a href="https://transparencia.pt/faq/#custos" class="fancybox">Quais são os custos da corrupção?</a></li>
						<li style="list-style: none;"><a href="https://transparencia.pt/faq/#quantificar" class="fancybox">É possível quantificar os custos da corrupção?</a></li>
                        <li style="list-style: none;"><a href="https://transparencia.pt/faq/#niveis" class="fancybox">Em que contextos existem maiores níveis de corrupção?</a></li>
                        <li style="list-style: none;"><a href="https://transparencia.pt/faq/#sociedades" class="fancybox">A corrupção não é uma prática normal ou tradicional em<br /> determinadas sociedades?</a></li>
                        <li style="list-style: none;"><a href="https://transparencia.pt/faq/#democracia" class="fancybox">Democracia e corrupção: realidades (irre)conciliáveis?</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h4>FERRAMENTAS</h4>
        <ul>
	    <li style="list-style: none;"><a href="https://transparencia.pt/faq/#toolkit" class="fancybox">Toolkit de Combate à Corrupção</a></li>
						<li style="list-style: none;"><a href="http://www.trust.org/?show=trustlawcorruption" target="_blank">Anti-Corruption Views</a></li>
						<li style="list-style: none;"><a href="http://blog.transparency.org/" target="_blank">Space for Transparency</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h4>CONTACTOS</h4>
        <ul>
	    <li style="list-style: none;"><b>Endereço:</b><br><b style="color: #428bca;">Rua Leopoldo de Almeida,9B 
1750-137 Lumiar,Lisboa</b></li>
						<li style="list-style: none;"><b>Telefone:</b><br><b style="color: #428bca;">217522075</b></li>
						<li style="list-style: none;"><b>Email:</b><br><a style="color: #1A497F;" href="mailto:secretariado&#64;transparencia&#46;pt?Subject=Comentário%20no%20site" target="_top"><b <b style="color: #428bca;">Contactar</b></a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h4 >LINKS</h4>
        <ul>
	    <li style="list-style: none;"><a href="http://ancorage-net.transparencia.pt" target="_blank">Ancorage-Net</a></li>
						<li style="list-style: none;"><a href="http://corruptionresearchnetwork.org/" target="_blank">Anti-Corruption Research Network</a></li>
						<li style="list-style: none;"><a href="http://www.business-anti-corruption.com/" target="_blank">Business Anti-Corruption Portal</a></li>
						<li style="list-style: none;"><a href="http://www.oecd.org/corruption/oecdantibriberyconvention.htm" target="_blank">OECD Convention on Combating Bribery of Foreign Public Officials<br /> in International Business Transactions</a></li>
                          <li style="list-style: none;"><a href="http://integridade.transparencia.pt/" target="_blank">Sistema Nacional de Integridade</a></li>
                        <li style="list-style: none;"><a href="http://www.transparency.org/" target="_blank">Transparency International</a></li>
                        <li style="list-style: none;"><a href="http://www.unodc.org/unodc/en/treaties/CAC/" target="_blank">United Nations Convention Against Corruption</a></li>
                        <li style="list-style: none;"><a href="http://www.u4.no/helpdesk/" target="_blank">U4 Anti-Corruption Resource Centre</a></li>
                       
        </ul>
      </div>
     
    </div>
    </div>

  </footer>

<div class="container" align="center" style="margin-top:20px">
		<b>&copy; 2010-<?php echo date("Y"); ?></b> <a style="color:#0397d6;" href="https://transparencia.pt" target="_blank"><b>TIAC</b></a><b>. Todos os direitos reservados.
	</div>

</div>



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"><\/script>')</script>
<script src="//transparencia.pt/wp-content/themes/twentyfourteen/js/bootstrap.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js?hl=pt'></script>
<script src="//transparencia.pt/wp-content/themes/twentyfourteen/css/js/toucheffects.js"></script>
<script src="//transparencia.pt/wp-content/themes/twentyfourteen/css/js/modernizr-1.7.min.js"></script>

<script>

$(document).ready(function() {
        $('.carousel').carousel({
            interval: 5000,
            cycle: true
        });
    });



function projeto_desenvolvimento() {
    alert("Projeto em desenvolvimento!");
}


var removeClass = true;
$(".dropdown-toggle").click(function () {
    $(".teste").toggleClass('opacidade');
    removeClass = false;
});



$('.container,#semFade').click(function () {
    if (removeClass) {
        $(".teste").removeClass('opacidade');
    }
    removeClass = true;
});










    function showOrHide() 
    {
        var div = document.getElementById("showOrHideDiv");
        if (div.style.display == "block") 
        {
            div.style.display = "none";
        }
        else 
        {
            div.style.display = "block";
        }
    } 
     function showOrHide1() 
    {
        var div = document.getElementById("showOrHideDiv1");
        if (div.style.display == "block") 
        {
            div.style.display = "none";
        }
        else 
        {
            div.style.display = "block";
        }
    } 
     function showOrHide2() 
    {
        var div = document.getElementById("showOrHideDiv2");
        if (div.style.display == "block") 
        {
            div.style.display = "none";
        }
        else 
        {
            div.style.display = "block";
        }
    } 
     function showOrHide3() 
    {
        var div = document.getElementById("showOrHideDiv3");
        if (div.style.display == "block") 
        {
            div.style.display = "none";
        }
        else 
        {
            div.style.display = "block";
        }
    } 
     function showOrHide4() 
    {
        var div = document.getElementById("showOrHideDiv4");
        if (div.style.display == "block") 
        {
            div.style.display = "none";
        }
        else 
        {
            div.style.display = "block";
        }
    } 
     function showOrHide5() 
    {
        var div = document.getElementById("showOrHideDiv5");
        if (div.style.display == "block") 
        {
            div.style.display = "none";
        }
        else 
        {
            div.style.display = "block";
        }
    } 

 

function toggle() {
  var ele = document.getElementById("toggleText");
  var text = document.getElementById("displayText");
  if(ele.style.display == "block") {
        ele.style.display = "none";
    text.innerHTML = "Mostrar";
    }
  else {
    ele.style.display = "block";
    text.innerHTML = "Esconder";
  }
} 

  
$(window).scroll(function(){
  if($(document).scrollTop() > 380){//Here 200 may be not be exactly 200px
    $('.a').hide();
  }
  
   if($(document).scrollTop() < 380){//Here 200 may be not be exactly 200px
    $('.a').show();
  }
  
});





  
 $(document).ready(function () {
  $(".navbar-nav li ul li a").click(function(event) {
    $(".navbar-collapse").collapse('hide');
  });
});

$(function() {
  $('a[href*=#]:not([href=#myCarousel])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 900);
        return false;
      }
    }
  });
});

</script>


<?php 




wp_footer(); ?> 


</body>


</html>
