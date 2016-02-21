<?php
require_once("PHPMailer-master/class.phpmailer.php");
include("PHPMailer-master/class.gpg.php");
require_once("recaptchalib.php");
$string = 'Muito obrigado por ter contactado a Provedoria TIAC – Alerta Anticorrupção. Dependemos da voz e da coragem dos cidadãos para reportar situações de corrupção, má gestão e abuso de poder. \n \n A equipa da Provedoria vai analisar a sua mensagem e procurará dar-lhe uma resposta o mais brevemente possível, se necessário pedindo elementos adicionais que possam ajudar a enquadrar a questão e fazer um melhor acompanhamento. \n Obrigado, mais uma vez, pelo seu contacto e até breve. \n A Provedoria TIAC – Alerta Anticorrupção ';
$nome = utf8_decode(strip_tags($_POST['nome']));
$email = strip_tags($_POST['email']);
$telefone = $_POST['telefone'];
$profissao = utf8_decode(strip_tags($_POST['profissao']));
$habilitacoes = utf8_decode(strip_tags($_POST['habilitacoes']));
$etaria = utf8_decode(strip_tags($_POST['etaria']));
$genero =utf8_decode(strip_tags($_POST['genero']));
$geografica =utf8_decode(strip_tags($_POST['geografica']));
$assunto = utf8_decode(strip_tags($_POST['assunto']));
$aceitar= $_POST['aceitar'];
$denuncia= utf8_decode($_POST['denuncia']);
//$problema= utf8_decode($_POST['problema']);
$queixa= utf8_decode($_POST['queixa']);
$suspeita= utf8_decode($_POST['suspeita']);
/*$corpoMensagem = utf8_decode("Formulário Provedoria:"). "\n\n\n" .utf8_decode("Nome:"). "\n".$nome. "\n\n" .utf8_decode("Email:"). "\n".$email."\n\n" .utf8_decode("Telefone:"). "\n".$telefone."\n\n" .utf8_decode("Profissão:"). "\n".$profissao."\n\n"  .utf8_decode("Habilitações literárias:"). "\n".$habilitacoes. "\n\n" .utf8_decode("Faixa etária:"). "\n".$etaria."\n\n" .utf8_decode("Género:"). "\n".$genero."\n\n" .utf8_decode("Área geográfica:"). "\n".$geografica."\n\n" .utf8_decode("a)- Existem circunstâncias especiais de urgência ou vulnerabilidade? – Se sim, qual/quais?. (opcional)"). "\n".$queixa.  "\n\n" .utf8_decode("b)- Descreva a situação na qual considera ter existido prática ou suspeita de corrupção. Explique-nos, especificamente: 
Qual a instituição, setor ou área de atividade em causa;Intervenientes envolvidos; Quais as irregularidades em causa (incluindo local e data em que os factos foram praticados e elementos que possam comprovar as suspeitas). ")."\n".$assunto. "\n\n" .utf8_decode("c) Porque decidiu contactar a Provedoria TIAC e que tipo de apoio procura da nossa parte?")."\n".$denuncia;*/
$corpoMensagem = utf8_decode("<div ><div style=' float:left;'><b>Formulário Provedoria:</b></div><div style='float:right;'><img src='https://transparencia.pt/wp-content/themes/wpbootstrap/assets/img/logoRodape.png' width='200' height='60'></div>"). "<br>" 
    .utf8_decode("<div style='margin-top:50px;border-style: solid;border-top-color: transparent;border-right-color: transparent;border-width:thin;border-bottom-style: dotted;border-left-color: transparent;'><b style='color:#2F709E;'>Nome:</b>"). "<p>".$nome. "</p></div>" 
    .utf8_decode("<div style='margin-top:30px;border-style: solid;border-top-color: transparent;border-right-color: transparent;border-width:thin;border-bottom-style: dotted;border-left-color: transparent;'><b style='color:#2F709E;'>Contacto eletrónico:</b>"). "<p>".$email."</p></div>" 
.utf8_decode("<div style='margin-top:50px;border-style: solid;border-top-color: transparent;border-right-color: transparent;border-width:thin;border-bottom-style: dotted;border-left-color: transparent;'><b style='color:#2F709E;'>Telefone:</b>"). "<p>".$telefone. "</p></div>"     .utf8_decode("<div style='margin-top:30px;border-style: solid;border-top-color: transparent;border-right-color: transparent;border-width:thin;border-bottom-style: dotted;border-left-color: transparent;'><b style='color:#2F709E;'>Profissão:</b>"). "<p>".$profissao."</p></div>"  
    .utf8_decode("<div style='margin-top:30px;border-style: solid;border-top-color: transparent;border-right-color: transparent;border-width:thin;border-bottom-style: dotted;border-left-color: transparent;'><b style='color:#2F709E;'>Habilitações literárias:</b>"). "<p>".$habilitacoes. "</p></div>" 
    .utf8_decode("<div style='margin-top:30px;border-style: solid;border-top-color: transparent;border-right-color: transparent;border-width:thin;border-bottom-style: dotted;border-left-color: transparent;'><b style='color:#2F709E;'>Faixa etária:"). "<p>".$etaria."</p></div>" 
    .utf8_decode("<div style='margin-top:30px;border-style: solid;border-top-color: transparent;border-right-color: transparent;border-width:thin;border-bottom-style: dotted;border-left-color: transparent;'><b style='color:#2F709E;'>Género:"). "<p>".$genero."</p></div>" 
   // .utf8_decode("<div style='margin-top:30px;border-style: solid;border-top-color: transparent;border-right-color: transparent;border-width:thin;border-bottom-style: dotted;border-left-color: transparent;'><b style='color:#2F709E;'>Área geográfica:(opcional)</b>"). "<p>".$geografica."</p></div>" 
    .utf8_decode("<div style='margin-top:30px;border-style: solid;border-top-color: transparent;border-right-color: transparent;border-width:thin;border-bottom-style: dotted;border-left-color: transparent;'><b style='color:#2F709E;'>a)- Existem circunstâncias especiais de urgência ou vulnerabilidade – Se sim, qual/quais?</b>"). "<p style='color:#000000'>".$queixa.  "</p></div>" 
    .utf8_decode("<div style='margin-top:30px;border-style: solid;border-top-color: transparent;border-right-color: transparent;border-width:thin;border-bottom-style: dotted;border-left-color: transparent;'><b style='color:#2F709E;'>b)- Descreva a situação na qual considera ter existido prática ou suspeita de corrupção. Explique-nos, especificamente: 
<br/>Qual a instituição, setor ou área de atividade em causa;<br/>Intervenientes envolvidos; <br/>Quais as irregularidades em causa (incluindo local e data em que os factos foram praticados e elementos que possam comprovar as suspeitas).</b>")."<p style='color:#000000'>".$assunto. "</p></div>" 
    .utf8_decode("<div style='margin-top:30px;border-style: solid;border-top-color: transparent;border-right-color: transparent;border-width:thin;border-bottom-style: dotted;border-left-color: transparent;'><b style='color:#2F709E;'>c) Porque decidiu contactar a Provedoria TIAC e que tipo de apoio procura da nossa parte?</b>")."<p style='color:#000000'>".$denuncia ."</p></div></div>"; 


$subject = utf8_decode("Denúncia via transparencia.pt");
  $erros = array();
?>

<script src='https://www.google.com/recaptcha/api.js?hl=pt'></script>

<script type="text/javascript">

function check_checkboxes()
{
  var c = document.getElementsByTagName('input');
  for (var i = 0; i < c.length; i++)
  {
    if (c[i].type == 'checkbox')
    {
       if (c[i].checked) {return true}
    }
  }
  return false;
}




<!--
// Form validation code will come here.
function validate(oForm)
{
 
   if( document.comment_form.nome.value == "" )
   {
     alert( "Por favor preencha o campo nome!" );
     document.comment_form.nome.focus() ;
     return false;
   }
   if( document.comment_form.email.value == "" )
   {
     alert( "Por favor preencha o campo email!" );
     document.comment_form.email.focus() ;
     return false;
   }
   if( document.comment_form.assunto.value == "" )
   {
     alert( "Por favor preencha o campo assunto!" );
     document.comment_form.assunto.focus() ;
     return false;
   }
  if( document.comment_form.denuncia.value == "" )
   {
     alert( "Por favor preencha o campo 'Quando teve início a situação?'" );
     document.comment_form.denuncia.focus() ;
     return false;
   }
    /*if( document.comment_form.problema.value == "" )
   {
     alert( "Por favor preencha o campo 'Em que consiste o problema?'" );
     document.comment_form.denuncia.focus() ;
     return false;
   }*/
   if(!check_checkboxes())
    {
        alert("Deve aceitar os termos");  
        return false;
    }
    var _validFileExtensions = ['.jpg','.jpeg','.doc','.docx','.pdf','.png','.gif','.txt','.xls','.xlsx','.zip','.rar'];
     var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }

                if (!blnValid) {
                    alert("Lamentamos mas a extensão do ficheiro é inválida. Os tipos de ficheiro permitidos são: " + _validFileExtensions.join(", "));
                    return false;
                }
            }
        }
    }

    return true;

}
//-->



</script>




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




<style type="text/css">
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

.section .hero p {
  font-size: 100%;
}


.btn {
  -moz-box-shadow: 0px 1px 0px 0px #fff6af;
  -webkit-box-shadow: 0px 1px 0px 0px #fff6af;
  box-shadow: 0px 1px 0px 0px #fff6af;
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffec64), color-stop(1, #ffab23));
  background:-moz-linear-gradient(top, #ffec64 5%, #ffab23 100%);
  background:-webkit-linear-gradient(top, #ffec64 5%, #ffab23 100%);
  background:-o-linear-gradient(top, #ffec64 5%, #ffab23 100%);
  background:-ms-linear-gradient(top, #ffec64 5%, #ffab23 100%);
  background:linear-gradient(to bottom, #ffec64 5%, #ffab23 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffec64', endColorstr='#ffab23',GradientType=0);
  background-color:#ffec64;
  -moz-border-radius:6px;
  -webkit-border-radius:6px;
  border-radius:6px;
  border:1px solid #ffaa22;
  display:inline-block;
  cursor:pointer;
  color:#333333;
  font-family:Arial;
  font-size:15px;
  font-weight:bold;
  padding:6px 24px;
  text-decoration:none;
  text-shadow:0px 1px 0px #ffee66;
}
.btn:hover {
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffab23), color-stop(1, #ffec64));
  background:-moz-linear-gradient(top, #ffab23 5%, #ffec64 100%);
  background:-webkit-linear-gradient(top, #ffab23 5%, #ffec64 100%);
  background:-o-linear-gradient(top, #ffab23 5%, #ffec64 100%);
  background:-ms-linear-gradient(top, #ffab23 5%, #ffec64 100%);
  background:linear-gradient(to bottom, #ffab23 5%, #ffec64 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffab23', endColorstr='#ffec64',GradientType=0);
  background-color:#ffab23;
}
.btn:active {
  position:relative;
  top:1px;
}




.fade {
   opacity: 1;
   transition: opacity .25s ease-in-out;
   -moz-transition: opacity .25s ease-in-out;
   -webkit-transition: opacity .25s ease-in-out;
   }

   .fade:hover {
      opacity: 0.5;
      color: #c00;
      }
#movetxt {
    position: relative;
    -webkit-animation: moving 5s infinite;
    animation: moving 5s infinite;
}
    
@-webkit-keyframes moving {
    from {top: 0px;}
    to {top: 90px;}
}

@keyframes moving {
    from {top: 0px;}
    to {top: 90px;}
}

.button{
 text-decoration:none; 
 text-align:center; 
 padding:7px 32px; 
 border:solid 1px #004F72; 
 -webkit-border-radius:4px;
 -moz-border-radius:4px; 
 border-radius: 4px; 
 font:18px Arial, Helvetica, sans-serif; 
 font-weight:bold; 
 color:#E5FFFF; 
 background-color:#3BA4C7; 
 background-image: -moz-linear-gradient(top, #3BA4C7 0%, #1982A5 100%); 
 background-image: -webkit-linear-gradient(top, #3BA4C7 0%, #1982A5 100%); 
 background-image: -o-linear-gradient(top, #3BA4C7 0%, #1982A5 100%); 
 background-image: -ms-linear-gradient(top, #3BA4C7 0% ,#1982A5 100%); 
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1982A5', endColorstr='#1982A5',GradientType=0 ); 
 background-image: linear-gradient(top, #3BA4C7 0% ,#1982A5 100%);   
 -webkit-box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff; 
 -moz-box-shadow: 0px 0px 2px #bababa,  inset 0px 0px 1px #ffffff;  
 box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff;  
  
  }
</style>








<?php

function mostrar_erros($erros){
  $output = array();
  foreach ($erros as $erro) {
  $output[] = "<li class='icon-exclamation-sign'> " . $erro . "</li><br/>";
  }
  return "<div class='alert alert-error'>  <button type='button' class='close' data-dismiss='alert'>&times;</button>
  <ul>" . implode("",$output) . "</ul></div>";
}


if(isset($_POST['submit_denuncia'])){ 

 /*$privatekey = "6LdYq-MSAAAAAOsb9YqS4MHk9UyK6A8VY0ETpmJI";
 $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
if (!$resp->is_valid) {
      $erros[] = "As palavras não coincidem! Tente de novo!";
  } else {
    //echo "Sucesso";
  }
*/
   
  if(empty($nome)){
     $erros[] = "Por favor preencha o campo nome";
    $email = false;
  }
 if(empty($email)){ 
     $erros[] =  "Por favor preencha o campo Contacto eletrónico";
    $email = false;

  }
 if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $erros[] = "O seu email não é válido";
    $email = false;

  }
  if(empty($assunto)){
    $erros[] = "Por favor preencha a alínea b) do campo II- Identificação do assunto ";
    $email = false;

  }
 if(empty($denuncia)){
    $erros[] = "Por favor preencha a alínea c) do campo II- Identificação do assunto";
    $email = false;

  }
  /*if(empty($problema)){
    $erros[] = "Por favor preencha o campo 'Em que consiste o problema?'";
    $email = false;

  }*/
 if(!isset($aceitar) && $aceitar == ""){
      $erros[] = "Deve concordar com os termos";
     $email = false;
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



  if($email == true){
    

echo "<div id='loading' style='display:none;'>"; 
echo "<img src=' https://transparencia.pt/wp-content/themes/wpbootstrap/assets/img/loading.gif'  />";
echo "A enviar...";
echo "</div>";

//$dest_email = "celso.rodrigues@transparencia.pt,";



$mail = new PHPMailer;
//$mail->CharSet = "UTF-8";
$mail->From = $email;
$mail->AddCC($email);
//$mail->SMTPAuth = true;
$mail->SMTPDebug = 1;
$mail->Port = 587;
$mail->FromName = $nome;
$mail->addAddress("provedoria@transparencia.pt","Provedoria TIAC");
$mail->Subject = $subject;
$mail->IsHTML(true);



//$data = $corpoMensagem;
//$subject = $subject;

//$sender = "celso.rodrigues@transparencia.pt";
//$dest_email = "celso.rodrigues@transparencia.pt";
 
//Encryption bit - create a temp file - encrypt it - read it then delete it
/*$prefix = "/home/tiac/temp";
// path to a dir writeable by the webserver. omit the trailing slash.
 
$temp_name = md5(microtime());    // this should give us a nice randomness..
$fn = "$prefix/$temp_name";     // temporary filename. gpg will -o here
 
$user = "tiac";             // your username on the system
$recipient = "provedoria@transparencia.pt";         // pgp recipient
$gpg_path = "/usr/bin/gpg";     // path to the gpg binary
     $secret_file = 'Pictures.rar'; 
     $secret_file1= shell_exec("$gpg -e -r $recipient $secret_file");
 
$gpg_opts = "-a --homedir /home/$user/.gnupg --always-trust --batch --no-secmem-warning ";
$gpg_opts .= "-e -u $user -r $recipient -o $fn  ";
 
$cmd = "$gpg_path $gpg_opts";     // this is the final command to fork
if($corpoMensagem == "") {
die("Var data is empty. What am I supposed to encrypt? I'll just die.");
}
 
$fp = popen("$cmd", 'w');         // we open the pipe..
if(!$fp) {                        // if fopen() fails we die
die("I couldn't open the pipe, so I'll just die now.");
}
fwrite($fp, $corpoMensagem);             // write our string to the pipe
pclose($fp);                     // done with pipe, we can now close it
 
$encrypted = file_get_contents($fn); // get the contents of $fn
unlink($fn);                         // and delete it
 
if(!$encrypted) {                     // check if $encrypted contains 
                                // something
die("The variabile that is supposed to contain the encrypted
data is empty. It looks like something went 
wrong with gpg. Check permissions in ~/.gnupg/ 
and $prefix.");
}
 */
/* uncomment the following line if something's not working */
//echo nl2br($encrypted);             // echoes the encryted message
 
/* finally, we can send the pgp message to the dest email address */
 
//mail encrypted 
if(isset($_FILES['anexos'])){      

    foreach($_FILES['anexos']['tmp_name'] as $key => $tmp_name ){
      $tamanho = $_FILES['anexos[]']['size'];
      if($tamanho > 12097152){
        $erros[] = "O tamanho do ficheiro deve ser inferior a 12MB";
      }else{
        $extensoes = array('jpg','jpeg','doc','docx','pdf','png','gif','xls','xlsx','zip','rar','txt');
        $nome_ficheiro = $_FILES['anexos']['name'][$key];
        //echo $nome_ficheiro;
        $ficheiro_temp = $_FILES['anexos']['tmp_name'][$key];
        $extensao_ficheiro = strtolower(end(explode(".", $nome_ficheiro)));
       // $nome_ficheiro = chunk_split(base64_encode($nome_ficheiro));

        if(in_array($extensao_ficheiro, $extensoes) || empty($nome_ficheiro)){
          move_uploaded_file($ficheiro_temp, "wp-content/themes/wpbootstrap/assets/anexos/".$nome_ficheiro);

             $mail->addAttachment("wp-content/themes/wpbootstrap/assets/anexos/".$nome_ficheiro,$nome_ficheiro);

        }  else{
          $erros[] = "Tipo de ficheiro não permitido. Os tipos permitidos são: zip,rar,jpg, jpeg, doc, docx, pdf, png, gif, xls, xlsx";
        }

         }

    }
    }
    $mail->Body = $corpoMensagem; 
    $enviado=$mail->Send();
//mail("$dest_email", "$subject", "$encrypted", "From: $sender\r\nReply-To: $sender\r\n");  
/*$mail = new PHPMailer;
  
   $mail->From = $email;  //celso.rodrigues@transparencia.pt
   $mail->FromName = $nome;
   $mail->addReplyTo($email);
   $mail->addAddress("celso.rodrigues@transparencia.pt","Provedoria TIAC");
   $mail->AddCC($email);
   $mail->Subject = $subject;
   $mail->Body = $corpoMensagem; 
   if(isset($_FILES['anexos'])){      

    foreach($_FILES['anexos']['tmp_name'] as $key => $tmp_name ){
      $tamanho = $_FILES['anexos[]']['size'];
      if($tamanho > 12097152){
        $erros[] = "O tamanho do ficheiro deve ser inferior a 12MB";
      }else{
        $extensoes = array('jpg','jpeg','doc','docx','pdf','png','gif','xls','xlsx','zip','rar');
        $nome_ficheiro = $_FILES['anexos']['name'][$key];
        //echo $nome_ficheiro;
        $ficheiro_temp = $_FILES['anexos']['tmp_name'][$key];
        $extensao_ficheiro = strtolower(end(explode(".", $nome_ficheiro)));

        if(in_array($extensao_ficheiro, $extensoes) || empty($nome_ficheiro)){
          move_uploaded_file($ficheiro_temp, "wp-content/themes/wpbootstrap/assets/anexos/".$nome_ficheiro);
             $mail->addAttachment("wp-content/themes/wpbootstrap/assets/anexos/".$nome_ficheiro,$nome_ficheiro);

        }  else{
          $erros[] = "Tipo de ficheiro não permitido. Os tipos permitidos são: zip,rar,jpg, jpeg, doc, docx, pdf, png, gif, xls, xlsx";
        }

         }

    }
  }*/
  //$body = $mail->Send();
 // $gpg = &new gpg();
// encrypt the mail
//$encrypted = $gpg->gpg_encrypt("/home/tiac/.gnupg", "celso.rodrigues@transparencia.pt", $body);

// create a new PHPMailer
/*$realmail = new PHPMailer();
$realmail->IsEncrypted = true;
$realmail->AddAddress("celso.rodrigues@transparencia.pt", "Nicola Fankhauser");
$realmail->Subject = "Here is the subject";

// add encrypted mail as attachment
$realmail->ContentType = "application/pgp-encrypted";
$realmail->AddStringAttachment(
  $encrypted,
  "encrypted.asc", 
  "7bit", 
  "application/octet-stream",
  ''); // last parameter prevents content-disposition header

//$realmail->Send();*/











    //if(!$mail->Send()) {

//echo "Mailer Error: " . $mail->ErrorInfo;

//} else {

//echo $body;

//}



 if(empty($erros)){
   //$mail = new PHPMailer;
  
   /*$mail->From = $email;  //celso.rodrigues@transparencia.pt
   $mail->FromName = $nome;
   $mail->addReplyTo($email);
   $mail->addAddress("celso.rodrigues@transparencia.pt","Provedoria TIAC");
   $mail->AddCC($email);
   $mail->addAttachment("wp-content/themes/wpbootstrap/assets/anexos/".$nome_ficheiro,$nome_ficheiro);
   $mail->Subject = $subject;
   $mail->Body = $corpoMensagem; */
  
  
  // $enviado = $mail->send();
   // create actual mail
/*$mail = new PHPMailer();
//$mail->IsMIME();
$mail->IsHTML(true);
$mail->Body = "This is the HTML message body!";
$mail->AltBody = "Body for non-HTML mail clients";

// get the body of the actual mail
$body = $mail->Send();

$gpg = &new gpg();

// encrypt the mail
$encrypted = $gpg->gpg_encrypt("/home/tiac/.gnupg", "celso.rodrigues@transparencia.pt", $body);

// create a new PHPMailer
$realmail = new PHPMailer();
$realmail->IsMail();
$realmail->IsEncrypted = true;
$realmail->AddAddress("celso.rodrigues@transparencia.pt", "Nicola Fankhauser");
$realmail->Subject = "Here is the subject";

// add encrypted mail as attachment
$realmail->ContentType = "application/pgp-encrypted";
$realmail->AddStringAttachment(
  $encrypted,
  "encrypted.asc", 
  "7bit", 
  "application/octet-stream",
  ''); // last parameter prevents content-disposition header

$realmail->Send();*/
   } else {
     echo mostrar_erros($erros); 
   }
  } 

 }
?>

<div class="section" id="provedoria"  >
<div class="container">
<div class="visible-phone" style="margin-top: -15px;"></div>
<div class="hidden-phone" style="margin-top: 240px;"></div>

 <div class="hero">
<div class="form-group" >
<?php if($enviado){echo "<script>alert(\"$string\")</script>";}?>
  <!--<?php if($enviado){echo "<script>alert(\"$string\")</script>";}?>-->
  
<h1 style="color: #5959d3;margin-bottom:50px;margin-top:-290px">Provedoria TIAC – Alerta Anticorrupção</h1>

<!--<a href="javascript:showOrHide();">hide/show text</a>
<div id="showOrHideDiv" style="display: none">hidden text</div>-->



<p style="text-align:justify;"> A Provedoria TIAC - Alerta Anti-Corrupção existe para apoiar os cidadãos decididos a soar o alarme sobre casos concretos de corrupção de que tenham conhecimento.</p>
      <p style="text-align:justify;"> Queremos dar aos cidadãos o poder e o protagonismo na luta contra os abusos. Acreditamos numa cidadania ativa, que use todos os mecanismos legais disponíveis para desmontar a corrupção nas suas múltiplas formas.</p>  
      <a href="javascript:showOrHide();" style="text-decoration: none;"><h3 class="fade" style="margin-top:50px;color:#5959d3;font-size:1.8em;text-align:left;"><img alt="" src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/img/plus.png" width="20" height="20" />&nbsp;Para que serve?</h3></a>
      <div id="showOrHideDiv" style="display: none">
      <ul style="text-align:justify;margin-top:35px;margin-left:5%;">
      <li style="margin-top:20px;text-align:justify;"> Para dar voz aos cidadãos; </li>
        <li style="margin-top:20px;text-align:justify;">Para ajudá-los a utilizar os mecanismos oficiais de acesso à informação pública e denúncia de suspeitas;</li>
        <li style="margin-top:20px;text-align:justify;"> Para promover um melhor desempenho do sistema, usando os casos reportados pelos cidadãos para tirar lições e propor políticas públicas mais eficientes contra a corrupção.  </li>
       </ul>
       </div>
       

      <a href="javascript:showOrHide1();" style="text-decoration: none;"   ><h3 class="fade" style="margin-top:50px;color:#5959d3;font-size:1.8em;text-align:left;"><img alt="" src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/img/plus.png" width="20" height="20" />&nbsp;Em que áreas atuamos?</h3></a>
 <div id="showOrHideDiv1" style="display: none">
<p style="text-align:justify;margin-top:35px;"> Queremos conhecer situações de violação do direito de acesso à informação pública e casos de corrupção nas suas diferentes formas, sobretudo quando envolvem quantidades consideráveis de recursos, nomeadamente:</p>
<ol style="text-align:justify;margin-left:5%;">
      <li style="margin-top:20px;text-align:justify;">Na atividade política;</li>
        <li style="margin-top:20px;text-align:justify;">Na adjudicação e realização de obras públicas;</li>
        <li style="margin-top:20px;text-align:justify;">Na aquisição e fornecimentos de bens ou serviços;</li>
        <li style="margin-top:20px;text-align:justify;">Nos licenciamentos urbanísticos;</li>
        <li style="margin-top:20px;text-align:justify;">Nas PPP;</li>
        <li style="margin-top:20px;text-align:justify;">Em conflitos interesses, nepotismo ou favorecimento indevido;</li>
        <li style="margin-top:20px;text-align:justify;"> Nos negócios privados;</li>
       </ol>
       
</div>
     <a href="javascript:showOrHide2();" style="text-decoration: none;"   ><h3 class="fade" style="margin-top:50px;color:#5959d3;font-size:1.8em;text-align:left;"><img alt="" src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/img/plus.png" width="20" height="20" />&nbsp;Quando procurar a Provedoria TIAC?</h3></a>
     <div id="showOrHideDiv2" style="display: none">
      <p style="text-align:justify;margin-top:35px;">Quando, face a uma situação concreta de corrupção ou abuso,</p>
      <ol style="text-align:justify;margin-left:5%;">
      <li style="margin-top:20px;text-align:justify;"> Quer soar o alarme, mas não sabe onde  se dirigir e em que termos; </li>
        <li style="margin-top:20px;text-align:justify;"> Precisa de ajuda para explicitar os factos de forma a que sejam adequadamente compreendidos pelas autoridades competentes e suportados por informação credível;</li>
        <li style="margin-top:20px;text-align:justify;"> Sente que a sua voz é silenciada ou abafada, e receia sofrer represálias de qualquer espécie.</li>
        <li style="margin-top:20px;text-align:justify;">Tiver já usado outros canais de reporte de irregularidades, que não tenham funcionado devidamente. </li>
        <li style="margin-top:20px;text-align:justify;">   A TIAC não presta apoio a pessoas envolvidas em atividades ilegais ou contra a ética;</li>
      </ol>
</div>
<a href="javascript:showOrHide3();" style="text-decoration: none;"   ><h3 class="fade" style="margin-top:50px;color:#5959d3;font-size:1.8em;text-align:left;"><img alt="" src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/img/plus.png" width="20" height="20" />&nbsp;O que fazemos?</h3></a>
<div id="showOrHideDiv3" style="display: none">
<p style="text-align:justify;margin-top:35px;">Prestamos informação gratuita sobre as ferramentas oficiais existentes para reportar situações concretas que envolvam suspeitas credíveis de corrupção, má gestão ou abuso;</p>
<p style="text-align:justify;margin-top:15px;">Damos apoio ao cidadão na formulação e encaminhamento de queixas, para que cheguem às autoridades competentes de forma eficiente e segura;</p>
<p style="text-align:justify;margin-top:15px;">Em situações em que o caso apresentado seja relevante, esteja suportado por documentação consistente e haja a concordância do cidadão, a Provedoria TIAC poderá encaminhá-lo às autoridades competentes, por forma a preservar o anonimato de quem deu o alerta e protegê-lo de intimidações ou retaliações de qualquer natureza;</p> 
<p style="text-align:justify;margin-top:15px;">Encaminhamos o cidadão para apoio jurídico especializado, em casos em que seja necessário acautelar representação jurídica<sup>*</sup> para a defesa e realização dos seus interesses e direitos;</p>


<p style="text-align:justify;margin-top:15px;">Analisamos os alertas recebidos e rastreamos casos noticiados na comunicação social, de forma a identificar setores mais expostos à corrupção e (possíveis) áreas de incidência institucional;</p>
<p style="text-align:justify;margin-top:15px;">Aferimos as condições existentes e procedimentos institucionais adotados na receção, tratamento das denúncias e proteção de denunciantes;</p>
<p style="text-align:justify;margin-top:15px;">Apresentamos relatórios e informação estatística sobre as comunicações recebidas, as iniciativas tomadas e os resultados concretos que tiveram, de modo geral;</p>
<p style="text-align:justify;margin-top:15px;">Propiciamos o diálogo e cooperação com as entidades competentes para melhorar o seu desempenho e aumentar a eficácia da justiça no combate à corrupção</p>
<p style="text-align:justify;margin-top:35px;"> <sup>*</sup>&nbsp;<i style="font-size:0.8em;">Quando possível. A TIAC não presta serviços de representação jurídica nem tem condições de garantir que todos os casos consigam ser encaminhados para apoio jurídico.</i></p>
</div>


     <a href="javascript:showOrHide4();" style="text-decoration: none;"   ><h3 class="fade" style="margin-top:50px;color:#5959d3;font-size:1.8em;text-align:left;"><img alt="" src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/img/plus.png" width="20" height="20" />&nbsp; O que não podemos fazer?</h3></a>
     <div id="showOrHideDiv4" style="display: none">
      
<p style="text-align:justify;margin-top:35px;"> Todas as mensagens são importantes para nós e receberão uma resposta. Mas, como organização da sociedade civil sem quaisquer poderes especiais, a nossa capacidade de atuação é limitada:</p>  

  <ul style="text-align:justify;margin-left:5%;">
    <li style="margin-top:20px;text-align:justify;"> <b>Não</b> podemos ajudar em todas as situações.</li>
        <li style="margin-top:20px;text-align:justify;"> <b>Não</b> prestamos serviços de interpretação, aconselhamento, e representação jurídica. A intervenção, nesse âmbito, cabe, em exclusivo, às autoridades competentes ou profissionais habilitados para esse efeito;</li>
        <li style="margin-top:20px;text-align:justify;"> <b>Não</b> interferimos em qualquer processo pendente perante autoridades administrativas ou judiciais;</li>
        <li style="margin-top:20px;text-align:justify;"><b>Não</b> investigamos casos. Não somos um órgão de polícia criminal nem temos recursos ou autoridade legal para investigar denúncias. O nosso trabalho é ajudar os cidadãos a alertar as autoridades competentes e, dentro das possibilidades legais, acompanhar a atuação das instâncias envolvidas;</li>
        <li style="margin-top:20px;text-align:justify;"><b>Não</b> realizamos denúncias públicas dos casos que forem trazidos à Provedoria. Em situações bem fundamentadas, poderemos trabalhar com jornalistas de investigação ou com as autoridades judiciais, mas não desenvolvemos campanhas públicas em torno de casos concretos;</li>
        <li style="margin-top:20px;text-align:justify;"><b>Não</b> prestamos apoio a pessoas envolvidas em atividades ilegais ou contra a ética;</li>
        <li style="margin-top:20px;text-align:justify;"><b>Não</b> prestamos assistência quando as queixas reportadas sejam claramente infundadas, falsas ou de má-fé. Nos termos da lei, a pessoa que reportar com má-fé comprovada sujeita-se a correspondente sanção ou consequência criminal ou cível. </li>

      
</ul>
</div>

<a href="javascript:showOrHide5();" style="text-decoration: none;"   ><h3 class="fade" style="margin-top:50px;color:#5959d3;font-size:1.8em;text-align:left;"><img alt="" src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/img/plus.png" width="20" height="20" />&nbsp; Como dar o alerta?</h3></a>
<div id="showOrHideDiv5" style="display: none">
<p style="text-align:justify;margin-top:35px;">A melhor forma de contactar a Provedoria TIAC é por via eletrónica, preenchendo este formulário.</p> 
<p style="text-align:justify;margin-top:20px;">É importante que haja um registo escrito com a informação relevante de cada caso, que nos permita fazer o seguimento de cada situação de forma estruturada e organizada, prestando contas ao cidadão que nos contacta.</p> 
<p style="text-align:justify;margin-top:20px;">A informação inscrita no formulário será encriptada e enviada de forma segura à equipa da Provedoria TIAC.</p> 
<p style="text-align:justify;margin-top:20px;">Os campos marcados com (*) são de preenchimento obrigatório</p> 
</div>
<!--<div id="movetxt"><h3 style="margin-top:50px;color:#ff0000;font-size:2.8em;">Se sabes, não cales!</h3> </div>
<div style="margin-top:85px">
<img alt="" src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/img/megafone.png" width="300" height="300" />
</div>
-->
<br/>
<h3 style="margin-top:50px;color:#5959d3;font-size:1.8em;margin-bottom:50px;text-align:center;">I- Dados de contacto</h3>

<form class="comment_form" id="comment_form" action="<?php echo get_site_url();?>/#provedoria" method="POST"  enctype="multipart/form-data" onsubmit="return validate(this)" name="comment_form">
<div class="row-fluid">

<div class="span4" style="float: none;margin: 0 auto;text-align:center;"><input required id="nome" type="text" name="nome" placeholder="Nome (*)" value="<?php echo !empty($erros) ? $_POST['nome'] : "";?>" /></div>

<div class="row-fluid">
<div class="span4" style="float: none;margin: 0 auto;text-align:center;"><input  requiredid="email" type="email" name="email" placeholder="Contacto eletrónico (*)" value="<?php echo !empty($erros) ? $_POST['email'] : "";?>"  /></div>
</div>
<div class="row-fluid">
<div class="span4" style="float: none;margin: 0 auto;text-align:center;"><input  requiredid="telefone" type="text" name="telefone" placeholder="Telefone (opcional)" value="" /></div>
</div>


<div class="row-fluid" style="margin-top:30px;">
<div class="span4" style="float: none;margin: 0 auto;text-align:center;">
<h4 style="text-align:center;" >Profissão (opcional)</h4>

 <select id="profissao" name="profissao" onchange="run()">  <!--Call run() function-->
   
    <option value="">Selecione:</option>
            <option value="Sector Público">Sector público</option>
            <option value="Sector Empresarial">Sector empresarial</option>
            <option value="Profissional Liberal">Profissional liberal</option>
            <option value="Reformado">Reformado</option>  
            <option value="Estudante">Estudante</option>
            <option value="Desempregado">Desempregado</option>   
        </select>


 
</div>
</div>


<div class="row-fluid" style="margin-top:30px;">
<div class="span4" style="float: none;margin: 0 auto;">
<h4  style="text-align:center;">Habilitações Literárias (opcional)</h4>

 <select id="habilitacoes" name="habilitacoes" onchange="run()">  <!--Call run() function-->
   
    <option value="">Selecione:</option>
            <option value="Ensino básico">Ensino básico</option>
            <option value="Secundário">Secundário</option>
            <option value="Superior">Superior</option>
            <option value="Pós-graduação">Pós-graduação</option>  
            <option value="Outros">Outros</option>
           
        </select>
</div>
</div>

<div class="row-fluid" style="margin-top:30px;">
<div class="span4" style="float: none;margin: 0 auto;">
<h4  style="text-align:center;" >Faixa etária (opcional)</h4>

 <select id="etaria" name="etaria" onchange="run()">  <!--Call run() function-->
   
    <option value="">Selecione:</option>
            <option value="Até 24">Até 24</option>
            <option value="25-39">25-39</option>
            <option value="40-54">40-54</option>
            <option value="+ 55">+ 55</option>  
          
           
        </select>
</div>
</div>

<div class="row-fluid" style="margin-top:30px;">
<div class="span4" style="float: none;margin: 0 auto;">
<h4  style="text-align:center;">Género (opcional)</h4>

 <select id="genero" name="genero" onchange="run()">  <!--Call run() function-->
   
    <option value="">Selecione:</option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            
          
           
        </select>
</div>
</div>

<div class="row-fluid" style="margin-top:30px;display:none;">
<div class="span4" style="float: none;margin: 0 auto;">
<h4  style="text-align:center;">Área Geográfica (opcional)</h4>

 <select id="geografica" name="geografica" onchange="run()">  <!--Call run() function-->
   
    <option value="">Distritos:</option>
            <option value="Açores">Açores</option>
            <option value="Madeira">Madeira</option>
            <option value="Aveiro">Aveiro</option>
            <option value="Beja">Beja</option>
            <option value=" Braga"> Braga</option>
            <option value="Bragança">Bragança</option>  
            <option value="Castelo Branco">Castelo Branco</option>
            <option value="Coimbra">Coimbra</option>
            <option value="Évora">Évora</option>
            <option value="Faro">Faro</option>
            <option value="Guarda">Guarda</option>
            <option value=" Leiria"> Leiria</option>
            <option value="Lisboa">Lisboa</option>  
            <option value="Portalegre">Portalegre</option>
            <option value="Porto">Porto</option>  
             <option value="Santarém">Santarém</option>
            <option value=" Setúbal"> Setúbal</option>
            <option value="Viana do Castelo">Viana do Castelo</option>  
            <option value="Vila Real">Vila Real</option>
            <option value="Viseu">Viseu</option>          
        </select>


 
</div>
</div>



<h3 style="margin-top:50px;color:#5959d3;font-size:1.8em;text-align:center;">II- IDENTIFICAÇÃO DO ASSUNTO</h3>
 <div class="row-fluid" style="margin-top:30px;"><p style=" margin-top:50px;text-align:center;">a)- Existem circunstâncias especiais de urgência ou vulnerabilidade? - Se sim, qual/quais? (opcional) </p>
<div class="span4" style="float: none;margin: 0 auto;margin-top:20px;width:100%"><textarea id="queixa" cols="60" name="queixa" placeholder="" rows="60" style="width:100%"></textarea></div>
</div>
 <div class="row-fluid" style="margin-top:30px;">
<p style=" margin-top:50px;text-align:center;">b)- Descreva a situação na qual considera ter existido prática ou suspeita de corrupção.</p> <p style="text-align:center;">Explique-nos, especificamente:
Qual  a instituição, setor ou área de atividade em causa;Intervenientes envolvidos; Quais as irregularidades em causa  (incluindo local e data em que os factos foram praticados e elementos que possam comprovar as suspeitas. (*)</p>
<div class="span4" style="float: none;margin: 0 auto;width:100%;margin-top:20px;"><textarea  required id="assunto" cols="40" type="text" name="assunto" placeholder="" rows="40" value="<?php echo !empty($erros) ? $assunto : "";?>" /></textarea></div>
</div>






<div class="row-fluid" style="margin-top:30px;"><h4 style="text-align:center;">c) Porque decidiu contactar a TIAC e que tipo de apoioprocura da nossa parte? (*)</h4>
<div class="span4" style="float:none; margin: 0 auto;width:100%;margin-top:20px;"><textarea required  id="denuncia" cols="40" name="denuncia" placeholder="" rows="20"><?php echo !empty($erros) ? $denuncia : "";?></textarea></div>
 <!--<div class="span4" style="float:none; margin: 0 auto;"><textarea id="problema" cols="40" name="problema" placeholder="Em que consiste o problema? Quais os factos que ocorreram e as pessoas envolvidas? *" rows="20"><?php echo !empty($erros) ? $problema : "";?></textarea></div>-->
 <!--<div class="span4" style="float:none; margin: 0 auto;"><textarea id="queixa" cols="40" name="queixa" placeholder="Já foi encaminhada alguma queixa às autoridades? Se sim, a quem e em que moldes? (anexar, se possível, cópia dessa documentação)" rows="20"></textarea></div>
 <div class="span4" style="float:none; margin: 0 auto;"><textarea id="suspeita" cols="40" name="suspeita" placeholder="No interesse de fortalecer o caso junto das autoridades, existem documentos ou testemunhas que possam confirmar as suspeitas?" rows="20"></textarea></div>
-->
 <div>
<input type="hidden" name="imahuman" id="imahuman" value="0" />
 </div>
<div class="row-fluid" style="margin-top:30px;">
  <h4 style="color:#5959d3;font-size:1.8em;text-align:center;">Anexar Ficheiros</h4><br>
<div class="span4" style="float: none;margin: 0 auto;"><input type="file" name="anexos[]" multiple></div>
<div class="span4" style="float: none;margin: 0 auto;"><i style="text-align:justify;">* O tamanho máximo permitido do total de anexos é de 12Mb.</i></div>
<div class="span4" style="float: none;margin: 0 auto;"><i style="text-align:justify;">* Considere colocar todos os ficheiros desejados dentro de uma pasta comprimida.</i></div>

<div class="span4" style="float: none;margin: 0 auto;"><i style="text-align:justify;">*Os extenções permitidas são: zip,rar,jpg, jpeg,txt, doc, docx, pdf, png, gif, xls, xlsx.</i></div>
</div>

<div class="hero" style="margin-top:30px;">
  <h3 style="margin-top:50px;color:#5959d3;font-size:1.8em;text-align:justify;">Informações sobre políticas de segurança, confidencialidade e condições do serviço</h3>
  <p style="text-align:justify;margin-top:30px;">Os dados recolhidos serão tratados pela Provedoria da TIAC, sob confidencialidade e em estrito cumprimento da legislação aplicável de proteção de dados, destinando-se os mesmos a identificação e implementação de medidas e procedimentos de prevenção e combate contra a corrupção.</p>
<p style="text-align:justify;margin-top:20px;"> Assim, os membros da Provedoria TIAC, os seus colaboradores e terceiros (parceiros) envolvidos estão submetidos a um compromisso de confidencialidade relativo à informação a que tenham tido acesso em quaisquer das fases do procedimento (receção, análise e apreciação da comunicação/caso).</p>

<p style="text-align:justify;margin-top:20px;">A informação prestada tem carácter meramente geral e abstrato e não pretende ser exaustiva. É fornecida no pressuposto de que os conteúdos deste serviço não constituem um parecer ou consulta jurídica profissional de aconselhamento. </p>

<p style="text-align:justify;margin-top:20px;">Por conseguinte, não dispensa, como é evidente, a consulta ou recurso a assistência qualificada para a concreta defesa dos seus legítimos e particulares interesses.</p>

<p style="text-align:justify;margin-top:20px;">De igual forma, a informação apresentada não estabelece qualquer relação contratual de responsabilização nem pode ser explorada ou alterada de qualquer forma.O utente da Provedoria TIAC – Alerta Anticorrupção compromete-se, sob a sua exclusiva responsabilidade, a aportar informação verdadeira e de boa fé.</p>

</div>
 <div style="text-align:center;">
<label>
<input required type="checkbox" style="width:20px;height:20px;" name="aceitar" id="aceitar" <?php echo isset($aceitar) ? checked : ""; ?> ><i>Li e aceito os termos. </i></label><br/>
</div>
<div style="text-align:center">

<div class="g-recaptcha" align="center" data-theme="dark" data-sitekey="6LcKdwUTAAAAALbhMtNKePbMnaRFNXDtxVMy4lRz"></div>

<!--<div id="loading" style="display:none;"><img src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/img/loading.gif" alt="" />A enviar...</div>
-->

<div class="hero" style="margin-top:50px;"><button style="width:270px; max-width: 100%;" class="button " name="submit_denuncia" type="submit" ><i class="icon-play" style="float:left; margin-left:18%;"></i><br/>Enviar</button></div>




  </div>


</div>

<table style="width:100%;border-top: 1px solid #B4B5B0;">  
  <tr>
    <td><img src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/img/logo2.png" height="130" width="130" alt=""></td>
       <td><img src="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/img/Logo_UE.png" height="130" width="130" alt=""></td>
</tr>

</table>
<p style="text-align:center;margin-top:20px">With the financial support of the Prevention of and Fight against Crime Programme European Commission - Directorate-General Home Affairs</p>
<p style="text-align:center;">A Provedoria TIAC – Alerta Anticorrupção é financiada pelo programa CIPS/ISEC da Comissão Europeia. A TIAC é inteiramente responsável pelo conteúdo deste website; a Comissão Europeia não pode ser responsabilizada pelo uso feito da informação aqui contida.
</p>
</div>

<div align="center" style=" width:100%;max-width: 100%;margin-bottom:-200px;">







</div>



</form>
<table style="width:100%;border-top: 1px solid #fff;margin-top:250px">
<tr>
<td>
<p style="color:#5959d3;font-size:1.8em;margin-top:30px;">FAÇA UM DONATIVO</p>
<p style="margin-top:20px;">O combate contra a corrupção é uma luta desigual.</p>
<p>Todos os contributos são preciosos para financiar o nosso trabalho de estudo, sensibilização e pressão pública.</p>
<div class="hero" style="margin-top:20px;"><a href="https://transparencia.pt/seletor-pagamento/"><button style="width:300px; max-width: 100%;" class="btn "  ><br/><p style="margin-top:-20px">FAZER</p><p>DONATIVO</p></button></a></div>
</td>
</tr>
</table>
</div>
</div>

</div>

</div>

</div>
