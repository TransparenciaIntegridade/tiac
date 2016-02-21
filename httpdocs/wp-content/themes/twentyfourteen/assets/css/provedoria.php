<?php
require_once("wp-content/themes/wpbootstrap/PHPMailer-master/class.phpmailer.php");
require_once("wp-content/themes/wpbootstrap/PHPMailer-master/class.smtp.php");
require_once("wp-content/themes/wpbootstrap/recaptchalib.php");

 $nome = "=?utf-8?B?" .  base64_encode(strip_tags($_POST['nome'])) . "?=";
 $email = strip_tags($_POST['email']);
 $assunto = strip_tags($_POST['assunto']);
 $aceitar= $_POST['aceitar'];
 $denuncia= $_POST['denuncia'];
 $subject = "=?utf-8?B?" . base64_encode("Denúncia") . "?=";
  $erros = array();



function mostrar_erros($erros){
  $output = array();
  foreach ($erros as $erro) {
  $output[] = "<li class='icon-exclamation-sign'> " . $erro . "</li><br/>";
  }
  return "<div class='alert alert-error'>  <button type='button' class='close' data-dismiss='alert'>&times;</button>
  <ul>" . implode("",$output) . "</ul></div>";
}


if(isset($_POST['submit_denuncia'])){ 

 $privatekey = "6LdYq-MSAAAAAOsb9YqS4MHk9UyK6A8VY0ETpmJI";
 $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
if (!$resp->is_valid) {
      $erros[] = "As palavras não coincidem! Tente de novo!";
  } else {
    echo "Sucesso";
  }

   
  if(empty($nome)){
     $erros[] = "Por favor preencha o seu nome";
    $email = false;
  }
 if(empty($email)){ 
     $erros[] =  "Por favor preencha o seu email";
    $email = false;

  }
 if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $erros[] = "O seu email não é válido";
    $email = false;

  }
  if(empty($assunto)){
    $erros[] = "Por favor preencha o assunto da sua mensagem";
    $email = false;

  }
 if(empty($denuncia)){
    $erros[] = "Por favor preencha o campo com a sua denúncia";
    $email = false;

  }
 if(!isset($aceitar) && $aceitar == ""){
      $erros[] = "Deve aceitar a cláusula";
     $email = false;
  }

  if($email == true){

   if(isset($_FILES['anexos'])){
      $tamanho = $_FILES['anexos']['size'];
      if($tamanho > 2097152){
        $erros[] = "O tamanho do ficheiro deve ser inferior a 2MB";
      }else{
        $extensoes = array('jpg','jpeg','doc','docx','pdf','png','gif','xls','xlsx','zip','rar');
        $nome_ficheiro = $_FILES['anexos']['name'];
        $ficheiro_temp = $_FILES['anexos']['tmp_name'];
        $extensao_ficheiro = strtolower(end(explode(".", $nome_ficheiro)));

        if(in_array($extensao_ficheiro, $extensoes) || empty($nome_ficheiro)){
          move_uploaded_file($ficheiro_temp, "wp-content/themes/wpbootstrap/assets/anexos/".$nome_ficheiro);
        }else{
          $erros[] = "Tipo de ficheiro não permitido. Os tipos permitidos são: zip,rar,jpg, jpeg, doc, docx, pdf, png, gif, xls, xlsx";
        }

      } 
    }

 if(empty($erros)){
   $mail = new PHPMailer;
   $mail->isSMTP();   
   $mail->SMTPAuth = true;   
   $mail->SMTPDebug = 1; 

   $mail->Host = "smtp.webfaction.com";
   $mail->Username = "celsorodrigues"; //
   $mail->Password = "Tiac2013"; //
   $mail->SMTPSecure = "ssl";
   $mail->Port = 465;
 
   $mail->From = $email; //$email; //celso.rodrigues@transparencia.pt
   $mail->FromName = $nome;
   $mail->addReplyTo($email);
   $mail->addAddress("provedoria@transparencia.pt","Provedoria TIAC");
   $mail->addAttachment("wp-content/themes/wpbootstrap/assets/anexos/".$nome_ficheiro,$nome_ficheiro);
   $mail->Subject = $assunto;
   $mail->Body = $denuncia; 
  
   var_dump($mail->send());

    
   }
  } 

 }
?>


<script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'custom'
     custom_theme_widget: 'responsive_recaptcha'
 };
 </script>
 <link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/responsive_recaptcha.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/assets/css/responsive_recaptcha.less" type="text/css" media="all" >




 

<div  id="provedoria">
<div class="container">

<div class="hero" style="margin-top: 300px;">
<h1 style="color: #5959d3;">PROVEDORIA</h1>

<h3>Conhece algum caso de corrupção?<p>Não fique em silêncio!</p></h3>


<form class="form-horizontal" id="comment_form" action="<?php echo get_site_url();?>/#provedoria" method="POST"  enctype="multipart/form-data">
<div class="row-fluid">
<div>  <input id="nome" type="text" name="nome" placeholder="Nome*" value="<?php echo !empty($erros) ? $_POST['nome'] : "";?>" /></div>
</div>
<div class="row-fluid">
<div class="span4" style="float: none;margin: 0 auto;"><input id="email" type="email" name="email" placeholder="Email*" value="<?php echo !empty($erros) ? $_POST['email'] : "";?>"  /></div>
</div>
<div class="row-fluid">
<div class="span4" style="float: none;margin: 0 auto;"><input id="assunto" type="text" name="assunto" placeholder="Assunto*" value="<?php echo !empty($erros) ? $assunto : "";?>" /></div>
</div>
<div class="row-fluid">
<div class="span4" style="float:none; margin: 0 auto;"><textarea id="denuncia" cols="30" name="denuncia" placeholder="Mensagem*" rows="10"><?php echo !empty($erros) ? $denuncia : "";?></textarea></div>
<div class="row-fluid">
<input type="file" name="anexos">
</div>
<div class="hero">
<p style="font-size:0.9em;text-align:center;"><i>* Na informação recebida a TIAC- Provedoria compromete-se a assegurar a confidencialidade da identidade dos utilizadores.</i></p>

<p style="font-size:0.9em;text-align:center;"><i>A informação disponibilizada tem carácter meramente geral e abstrato e não pretende ser exaustiva.</i></p>

<p style="font-size:0.9em;"><i>A informação é fornecida no pressuposto de que os conteúdos deste serviço não constituem um parecer ou consulta jurídica profissional de aconselhamento.</i></p>

<p style="font-size:0.9em;"><i>Por conseguinte, não dispensa, como é evidente, a consulta ou recurso a assistência qualificada para a concreta defesa dos seus legítimos e particulares interesses.</i></p>

<p style="font-size:0.9em;"><i>De igual forma, a informação apresentada não estabelece qualquer relação contratual de responsabilização nem pode ser explorada ou alterada de qualquer forma.</i></p></div>
<div>
<label style="font-size:1em">
<input type="checkbox" name="aceitar" id="aceitar" <?php echo isset($aceitar) ? checked : ""; ?> ><i>Aceito os termos da Provedoria </i></label><br/>
 


</div>
<form action="">
     <div id="responsive_recaptcha" style="display:none">

       <div id="recaptcha_image"></div>
       <div class="recaptcha_only_if_incorrect_sol" style="color:red">Incorrect please try again</div>

      <label class="solution">
        <span class="recaptcha_only_if_image">Type the two words:</span>
        <span class="recaptcha_only_if_audio">Enter the numbers you hear:</span>

        <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
      </label>
      <div class="options">
        <a href="javascript:Recaptcha.reload()" id="icon-reload">Get another CAPTCHA</a>
        <a class="recaptcha_only_if_image" href="javascript:Recaptcha.switch_type('audio')" id="icon-audio">Get an audio CAPTCHA</a>
        <a class="recaptcha_only_if_audio" href="javascript:Recaptcha.switch_type('image')" id="icon-image">Get an image CAPTCHA</a>
        <a href="javascript:Recaptcha.showhelp()" id="icon-help">Help</a>
      </div>
    </div>

 <script type="text/javascript"
    src="http://www.google.com/recaptcha/api/challenge?k=YOUR_PUBLIC_KEY">
 </script>
 
 <noscript>
   <iframe src="http://www.google.com/recaptcha/api/noscript?k=YOUR_PUBLIC_KEY"
        height="300" width="500" frameborder="0"></iframe><br>
   <textarea name="recaptcha_challenge_field" rows="3" cols="40">
   </textarea>
   <input type="hidden" name="recaptcha_response_field"
        value="manual_challenge">
 </noscript>
  </form>


<div id="responsive_recaptcha" >

<?php 

$publickey = "6LdYq-MSAAAAAMcvtumQbJ2RtAUlUQ6iLIWrMumU";
echo recaptcha_get_html($publickey);

if(empty($erros) === false){
  echo mostrar_erros($erros);
  

 }else  if($email == true){
    echo"<div class='alert alert-success'>";
    echo"<button type='button' class='close' data-dismiss='alert'>&times;</button>";
    echo "<span class='icon-ok'> A denúncia foi enviada com sucesso</span>";
    echo"</div>";
 }
?>





</div>

<div class="hero" style="margin-top:50px;"><button class="btn " name="submit_denuncia" type="submit"><i class="li_paperplane" style="width:80px;"></i><br/>Enviar</button></div>





</form>

</div>
</div>

</div>
