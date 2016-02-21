<?php 
global $wpdb;

//$user_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->civicrm_contact" );


if( isset($_POST['submit']) ) {
  
$email = $_POST['email'];


//print_r($email);


$email_existente= $wpdb->get_var("SELECT contact_id FROM  civicrm_email  WHERE email='$email'");
$x =$wpdb->get_var("SELECT contact_id  FROM civicrm_group_contact WHERE contact_id = '$email_existente' AND group_id='113'");



//print_r($email_existente);
//print_r($x);



  
 

if(empty($email)){
        
            echo "<script>alert('Preencha o campo email!'); window.location = './';</script>";

      }


      if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
     
         echo "<script>alert('O formato incorreto de email!'); window.location = './';</script>";


      }

      
if( $x + $email_existente == 0){
        
            echo "<script>alert('O email não se encontra registado!'); window.location = './';</script>";

      }else{

    //$max_contact_id= $wpdb->get_var("SELECT MAX(id) FROM civicrm_contact");
    //$contact_id=$max_contact_id + 1;

  

  //$wpdb->query("INSERT INTO civicrm_contact (id) VALUES ('$contact_id}')");
  //$wpdb->query("INSERT INTO civicrm_email (contact_id,email,is_primary,is_billing) VALUES ('{$contact_id}','{$email}','1','1')");
  //$wpdb->query("INSERT INTO civicrm_group_contact (group_id,contact_id,status) VALUES ('14','$contact_id','Added')");
  $wpdb->query("UPDATE civicrm_group_contact SET  status = 'Removed' WHERE contact_id = '$id->id' AND receive_date = '$data_mais_recente'");


  echo "<script>alert('Subscrição removida com sucesso!'); window.location = './';</script>";
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
     
     <div class="col-md-6" >
        <h3 style="margin-left:14%">REMOVER SUBSCRIÇÃO</h3>
        <div >
        <form id="NewsletterForm" method="post">
          <input width="30" type="text" class="subscribeMe" id="email" name="email" placeholder="Introduz o teu e-mail">
          <button role="submit" name="submit" id="submit">REMOVER</button>
          <ul style="list-style-type: none;">
           <div class="col-md-6">
      
      </div>
          </ul>
        </form>
        </div>
      </div>
      </div>
    </div>
  </section>



 




<div class="container" align="center" style="margin-top:20px">
    <b>&copy; 2010-<?php echo date("Y"); ?></b> <a style="color:#0397d6;" href="https://transparencia.pt" target="_blank"><b>TIAC</b></a><b>. Todos os direitos reservados.
  </div>

</div>



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
<script src="//transparencia.pt/wp-content/themes/twentyfourteen/js/bootstrap.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js?hl=pt'></script>
<script src="//transparencia.pt/wp-content/themes/twentyfourteen/css/js/toucheffects.js"></script>
<script src="//transparencia.pt/wp-content/themes/twentyfourteen/css/js/modernizr.custom.js"></script>

<script>

$(document).ready(function() {
        $('.carousel').carousel({
            interval: 5000,
            cycle: true
        });
    });
</script>

<script>
function projeto_desenvolvimento() {
    alert("Projeto em desenvolvimento!");
}

</script>
<script type="text/javascript">
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





</script>

<!--<script type="text/javascript">
  WebFontConfig = { google: { families: [ 'Droid+Serif::latin' ] } };
  (function() {
  var wf = document.createElement('script');
  wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
    '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
  wf.type = 'text/javascript';
  wf.async = 'true';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(wf, s);
})();

 </script>-->


<script language="javascript">


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
</script>
  <!--  <script type="text/javascript">
    $(function() {
  $('a[href*=#]:not([href=#]):not(.carousel-control)').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

</script>-->
<script language="javascript"> 
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
</script>
<script type="text/javascript">
  
$(window).scroll(function(){
  if($(document).scrollTop() > 380){//Here 200 may be not be exactly 200px
    $('.a').hide();
  }
  
   if($(document).scrollTop() < 380){//Here 200 may be not be exactly 200px
    $('.a').show();
  }
  
});


</script>

<script type="text/javascript">
  
 $(document).ready(function () {
  $(".navbar-nav li ul li a").click(function(event) {
    $(".navbar-collapse").collapse('hide');
  });
});



</script>

 


</body>


</html>
