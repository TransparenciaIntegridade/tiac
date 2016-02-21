<?php
require_once("wp-content/themes/wpbootstrap/PHPMailer-master/class.phpmailer.php");
require_once("wp-content/themes/wpbootstrap/PHPMailer-master/class.smtp.php");
require_once("wp-content/themes/wpbootstrap/recaptchalib.php");

  $nome = "=?utf-8?B?" .  base64_encode(strip_tags($_POST['nome'])) . "?=";
  $email1 = strip_tags($_POST['email1']);
  $mensagem= $_POST['mensagem'];
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

  if($email1 == true){

     if(empty($erros)){
       $mail = new PHPMailer;
// Select if you want to check form for standard spam text
  $SpamCheck = "Y"; // Y or N
  $SpamReplaceText = "*content removed*";
// Error message prited if spam form attack found
$SpamErrorMessage = "<p align=\"center\"><font color=\"red\">Malicious code content detected.
</font><br><b>Your IP Number of <b>".getenv("REMOTE_ADDR")."</b> has been logged.</b></p>";
/******** END OF CONFIG SECTION *******/

if ($SpamCheck == "Y") {       
// Check for Website URL's in the form input boxes as if we block website URLs from the form,
// then this will stop the spammers wastignt ime sending emails
if (preg_match("/http/i", "$nome")) {echo "$SpamErrorMessage"; exit();} 
if (preg_match("/http/i", "$email")) {echo "$SpamErrorMessage"; exit();} 
if (preg_match("/http/i", "$mensagem")) {echo "$SpamErrorMessage"; exit();} 


// Patterm match search to strip out the invalid charcaters, this prevents the mail injection spammer 
  $pattern = '/(;|\||`|>|<|&|^|"|'."\n|\r|'".'|{|}|[|]|\)|\()/i'; // build the pattern match string 
                            
  $nome = preg_replace($pattern, "", $nome); 
  $email = preg_replace($pattern, "", $email); 
  $mensagem = preg_replace($pattern, "", $mensagem); 
  

// Check for the injected headers from the spammer attempt 
// This will replace the injection attempt text with the string you have set in the above config section
  $find = array("/bcc\:/i","/Content\-Type\:/i","/cc\:/i","/to\:/i"); 
  $email = preg_replace($find, "$SpamReplaceText", $email); 
  $nome = preg_replace($find, "$SpamReplaceText", $nome); 
  $mensagem = preg_replace($find, "$SpamReplaceText", $mensagem); 
  
  
// Check to see if the fields contain any content we want to ban
 if(stristr($nome, $SpamReplaceText) !== FALSE) {echo "$SpamErrorMessage"; exit();} 
 if(stristr($mensagem, $SpamReplaceText) !== FALSE) {echo "$SpamErrorMessage"; exit();} 
 
 // Do a check on the send email and subject text
 if(stristr($mail->addAddress("secretariado@transparencia.pt","Secretariado TIAC"), $SpamReplaceText) !== FALSE) {echo "$SpamErrorMessage"; exit();} 
 if(stristr($mensagem, $SpamReplaceText) !== FALSE) {echo "$SpamErrorMessage"; exit();} 
}


       $mail->From = $email1; 
       $mail->FromName = $nome;
       $mail->addReplyTo($email1);
       $mail->addAddress("secretariado@transparencia.pt","Secretariado TIAC");
       $mail->Subject = "Contacto via transparencia.pt";
       $mail->Body = $mensagem; 
      
       $mail->send();

//var_dump($mail->send());

       }
      } 
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
//-->

// Set up
addEvent(window, "load", setUpHumanTest, false);
function setUpHumanTest() {
var myforms = document.getElementsByTagName("form") ;
for (var i=0; i.myforms.length; i++) {
addEvent(myforms[i], "focus", markAsHuman, false);
addEvent(myforms[i], "click", markAsHuman, false);
}
}

// Identify a human
function markAsHuman() {
document.getElementById("imahuman").value = "1";
}

// Generic cross-browser code for attaching events to elements
// You should really have this in a separate common JS file
var addEvent;
if (document.addEventListener) {
addEvent = function(element, type, handler) {
element.addEventListener(type, handler, null);
if (element.href) element.href="javascript:void('');" ;
}
}
else if (document.attachEvent) {
addEvent = function(element, type, handler) {
element.attachEvent("on" + type, handler);
if (element.href) element.href="javascript:void('');" ;
}
}
else {
addEvent = new Function; // not supported
}


</script>



<div class="section" id="contatos">
<div class="container">
<div class="hero" style="margin-top: 240px;">
<h1 style="color: #5959d3;">CONTATOS</h1>
Por favor não hesite em nos contatar

</div>
<div class="row" >
<div class="span6">
<h3 align="left" style="margin-top:15px;">Informação de Contato</h3>
<div style="margin-bottom:30px;" align="left"><img alt="" src="http://civicrm.tiac.webfactional.com/wp-content/themes/wpbootstrap/assets/img/logoc.png" width="200" height="62" /></div>
<ul>
	<li style="margin-top:20px;"><strong>Endereço:</strong> Rua Leopoldo de Almeida,9B <br>1750-137 Lumiar,Lisboa</li>

	<li style="margin-top:20px;"><strong>Telefone:</strong>217522075</li>



	<li style="margin-top:20px;"><strong>Email:</strong> <a style="color: #1A497F;" href="mailto:secretariado@transparencia.pt?Subject=Comentário%20no%20site" target="_top"><b>secretariado@transparencia.pt</b></a></li>
</ul>


</div>
<div class="span6" style="float:right;">


<h3>Envie a sua mensagem!</h3>

<form class="comment_form" id="comment_form1" action="<?php echo get_site_url();?>/#contact" method="POST"  enctype="multipart/form-data" onsubmit="return Validate(this)" name="comment_form1">
<div class="row-fluid">
<div class="span6"><input id="nome" type="text" name="nome" placeholder="Nome*"  value="<?php echo !empty($erros) ? $_POST['nome'] : "";?>" /></div>
<div class="span6"><input id="email1" type="text" name="email1" placeholder="Email*" value="<?php echo !empty($erros) ? $_POST['email1'] : "";?>" /></div>
</div>
<div class="row-fluid">

<div class="span12"><textarea id="mensagem" cols="30" name="mensagem" placeholder="Mensagem*"  rows="10"><?php echo !empty($erros) ? $mensagem : "";?></textarea>
</div>
</div>
 
 
   
       
         
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

        
       
       <div>
<input type="hidden" name="imahuman" id="imahuman" value="0" />
 </div>
       
       <div align="center" ><button style="width:300px; max-width: 100%;"class="btn " name="comment_form1" type="submit"><i class="li_paperplane"></i>Enviar</button></div>
       
 
        
 
 


     
</form>

</div>
</div>
</div>
</div>
&nbsp;





<div class="container hidden-phone">
<div class="map"><iframe src="http://www.bing.com/maps/embed/viewer.aspx?v=3&amp;cp=38.747898~-9.158497&amp;lvl=12&amp;w=100%&amp;h=350&amp;sty=r&amp;typ=d&amp;pp=Rua%20Leopoldo%20de %20Almeida%20%20,%209B%201750-137%20Lisbon%2C%20Portugal~~38.7718672~-9.1597331&amp;ps=&amp;dir=0&amp;mkt=en-us&amp;src=SHELL&amp;form=BMEMJS" height="350" width="100%" frameborder="0"></iframe></div>
</div>
<div class="container visible-phone"> 
<div class="map" ><img src="http://maps.googleapis.com/maps/api/staticmap?center=rua+leopoldo+de+almeida+9,+lisbon,portugal,+NY&zoom=16&scale=false&size=300x300&maptype=roadmap&sensor=false&format=png&visual_refresh=true&markers=size:mid%7Ccolor:blue%7Crua+leopoldo+de+almeida+9,+lisbon,portugal,+PT" alt="Transparência e Integridade, Associação Cívica"></div>
</div>
</div>

<br/>
<br/>
<br/>

