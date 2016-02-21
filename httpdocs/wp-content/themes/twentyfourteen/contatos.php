<?php
require_once("wp-content/themes/twentyfourteen/PHPMailer-master/class.phpmailer.php");
require_once("wp-content/themes/twentyfourteen/PHPMailer-master/class.smtp.php");
require_once("wp-content/themes/twentyfourteen/recaptchalib.php");

  $nome = "=?utf-8?B?" .  base64_encode(strip_tags($_POST['nome'])) . "?=";
  $email1 = strip_tags($_POST['email1']);
  $mensagem= utf8_decode($_POST['mensagem']);
  $erros = array();



function mostrar_erro($erros){
  $output = array();
  foreach ($erros as $erro) {
  $output[] = "<li class='icon-exclamation-sign'> " . $erro . "</li><br/>";
  }
  return "<div class='alert alert-error'>  <button type='button' class='close' data-dismiss='alert'>&times;</button>
  <ul>" . implode("",$output) . "</ul></div>";
}


if(isset($_POST['comment_form1'])){ 

  if(empty($nome)){
     $erros[] = "Por favor preencha o campo nome";
    $email1 = false;
  }
 if(empty($email1)){ 
     $erros[] =  "Por favor preencha o campo email";
    $email1 = false;

  }
 if(!filter_var($email1,FILTER_VALIDATE_EMAIL)){
      $erros[] = "O  email não é válido";
    $email1 = false;

  }
  
 if(empty($mensagem)){
    $erros[] = "Por favor preencha o campo mensagem";
    $email1 = false;

  }

if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
         $erros[] = "Desafio Capcha inválido.";
        
        }
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcKdwUTAAAAAD_asf2Z1UtkHYa2Jh-7MFAZjGy4&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        if($response.success==false)
        {
        echo '<h2>You are spammer ! Get the @$%K out</h2>';
        }else
        {
         // echo '<h2>Thanks for posting comment.</h2>';
        }










  if($email1 == true){

     if(empty($erros)){
       $mail = new PHPMailer;

       $mail->From = $email1; 
       $mail->FromName = $nome;
       $mail->addReplyTo($email1);
       $mail->addAddress("secretariado@transparencia.pt","Secretariado TIAC");
       $mail->Subject = "Contacto via transparencia.pt";
       $mail->Body = $mensagem; 
      
       $enviado = $mail->send();

       }else {
     echo mostrar_erros($erros); 
   }

      } 
 }
?>
 

 <?php
          if(empty($erros) === false){
           echo mostrar_erro($erros);
          }else  if($email1 == true){
            echo "<noscript>
          <div class='alert alert-success'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
          <span class='icon-ok'> Obrigado pelo seu contato!Responderemos em breve!</span>
          </div>
          </noscript>";
            echo "<script>alert('Obrigado pelo seu contato!Responderemos em breve!'); window.location = './#contact';</script>";
            
          }
        ?>






<script type="text/javascript">






<!--
// Form validation code will come here.
function Validate(oForm)
{
 
   if( document.comment_form1.nome.value == "" )
   {
     alert( "Por favor preencha o campo nome!" );
     document.comment_form1.nome.focus() ;
     return false;
   }
   if( document.comment_form1.email1.value == "" )
   {
     alert( "Por favor preencha o campo email!" );
     document.comment_form1.email1.focus() ;
     return false;
   }
   if( document.comment_form1.mensagem.value == "" )
   {
     alert( "Por favor preencha o campo mensagem!" );
     document.comment_form1.mensagem.focus() ;
     return false;

       }

    return true;

}


</script>

<style type="text/css"> #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
</style>



<section  style="margin-top:50px;">
<div class="container" style="margin-top:50px;" >







<div class="col-md-4">


<h3>Envia-nos uma mensagem**</h3>

<!--<form class="comment_form" id="comment_form1" action="<?php echo get_site_url();?>/#contact" method="POST"  enctype="multipart/form-data" onsubmit="return Validate(this)" name="comment_form1">
<div class="row-fluid">
<div class="span6"><input id="nome" type="text" name="nome" placeholder="Nome*"  value="<?php echo !empty($erros) ? $_POST['nome'] : "";?>" /></div>
<div class="span6"><input id="email1" type="text" name="email1" placeholder="Email*" value="<?php echo !empty($erros) ? $_POST['email1'] : "";?>" /></div>
</div>
<div class="row-fluid">

<div class="span12"><textarea id="mensagem" cols="30" name="mensagem" placeholder="Mensagem*"  rows="10"><?php echo !empty($erros) ? $mensagem : "";?></textarea>
</div>
</div>
 
 
   
       
         
         

        
      
       
       <div align="center" ><button style="width:300px; max-width: 100%;"class="btn " name="comment_form1" type="submit"><i class="li_paperplane"></i>Enviar</button></div>
       
 
        
 
 


     
</form>-->
<form class="myfirstform" id="comment_form1" action="<?php echo get_site_url();?>/#contact" method="POST"  enctype="multipart/form-data" onsubmit="return Validate(this)" name="comment_form1">
  <!--  
    <legend>Contact Form</legend>   -->
    <div class="form-group">
        
      <div class="controls">
          <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input id="nome" type="text" class="form-control" name="nome" placeholder="Nome*" value="<?php echo !empty($erros) ? $_POST['nome'] : "";?>">
        </div>
      </div>
    </div>
    
    
    <div class="form-group">
         
      <div class="controls">
          <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
          <input id="email1" type="text" class="form-control"  name="email1" placeholder="Email*" value="<?php echo !empty($erros) ? $_POST['email1'] : "";?>">
        </div>
      </div>  
    </div>
    
    
    
   
    
    <div class="form-group ">
         
      <div class="controls">
          <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
          <textarea id="mensagem" name="mensagem" class="form-control " rows="4" cols="78" placeholder="Mensagem*"><?php echo !empty($erros) ? $mensagem : "";?></textarea>

        </div>
        
      </div>
     
    </div>
     <div align="center" class="g-recaptcha" data-theme="light" data-sitekey="6LcKdwUTAAAAALbhMtNKePbMnaRFNXDtxVMy4lRz"></div>
      <i>* Campos de preenchimento obrigatório</i><br>
<i>** Este espaço não deve ser usado para comunicar suspeitas de corrupção ou abuso.
Usa o canal seguro da <a href="#">Provedoria TIAC- Alerta Anticorrupção </a></i>.
    
     
       <div>
<input type="hidden" name="imahuman" id="imahuman" value="0" />
 </div>
    
        <div class="controls" style="margin-left: 40%;">
      
         <button style="margin-top:20px;" type="submit"  class="btn btn-primary" name="comment_form1">Enviar</button>
          
        </div>
    </form>

</div>
<div class="col-md-4">

<div style="margin-top:30px;" align="center"><img alt="" src="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/assets/img/logoc.png" width="200" height="62" /></div>
<ul style="list-style-type: none;">
  <li style="margin-top:20px;"><strong>Endereço:</strong> Rua Leopoldo de Almeida,9B <br>1750-137 Lumiar,Lisboa</li>

  <li style="margin-top:20px;"><strong>Telefone:</strong>217522075</li>



  <li style="margin-top:20px;margin-bottom:20px;"><strong>Email:</strong> <a style="color: #1A497F;" href="mailto:secretariado&#64;transparencia&#46;pt?Subject=Comentário%20no%20site" target="_top"><b>secretariado&#64;transparencia&#46;pt</b></a></li>
<a href="https://www.facebook.com/transparenciapt?fref=ts" target="_blank"><i class="fa fa-facebook-square  fa-3x" ></i></a>
<a href="https://twitter.com/transparenciapt" target="_blank"><i class="fa fa-twitter-square  fa-3x" ></i></a>
<a href="https://plus.google.com/+TransparenciaPtONG/posts" target="_blank"><i class="fa fa-google-plus-square  fa-3x" ></i></a>
<a href="https://www.linkedin.com/company/transparencia-e-integridade-associacao-civica" target="_blank"><i class="fa fa-linkedin-square  fa-3x" ></i></a>
<a href="https://youtube.com/user/transparenciapt" target="_blank"><i class="fa fa-youtube-square  fa-3x" ></i></a>
<a href="https://www.flickr.com/photos/transparenciaportugal" target="_blank"><i class="fa fa-flickr  fa-3x" ></i></a>
</ul>
  

</div>

<div class="col-md-4" style="margin-top:30px">
  
<div class="mapa">
<img width="350" height="350"src="https://maps.googleapis.com/maps/api/staticmap?center=rua+leopoldo+de+almeida+9,+lisbon,portugal&zoom=16&scale=false&size=350x350&maptype=roadmap&sensor=false&format=png&visual_refresh=true&markers=size:mid%7Ccolor:blue%7Crua+leopoldo+de+almeida+9,+lisbon,portugal,+PT" alt="Transparência e Integridade, Associação Cívica">
</div>

</div>



</div>



</section>


