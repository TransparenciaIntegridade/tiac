  <script type="text/javascript">
    $( document ).ready(function() {
      $(".don").on("click",function(){
        $("input[id='price']").attr("disabled", "disabled");
      });

       $("input[id='price']").on("focus",function(){
        $(".don").attr("disabled", "disabled");
      });
  });
  </script>
  <script src='https://www.google.com/recaptcha/api.js?hl=pt'></script>
  <?php
    require_once 'swiftmailer/lib/swift_required.php';
   function binif_isvalid($nif){
     while (strlen($nif) < 9) {
        $nif = "0" . $nif;
     }
   
     $calc = 9 * $nif[0] + 8 * $nif[1] + 7 * $nif[2] + 6 * $nif[3] + 5 * $nif[4] + 4 * $nif[5] + 3 * $nif[6] + 2 * $nif[7] + $nif[8];
   
      if ( $calc % 11 === 0) {
        return true;
     }
     else if($nif[8] === 0 || ($calc + 10) % 11 === 0) {
        return true;
     }
     else {
        return false;
     }
  }

        global $wpdb;
        $nome_servidor = $_SERVER['SERVER_NAME'];
     if(isset($_POST['_qf_Main_upload'])){
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $birth_date = $_POST['birth_date'];
        $data = date("Y-m-d", strtotime($birth_date));
        $data_registo = date("Y-m-d H:i:s");  
        $email = $_POST['email'];
        $morada = $_POST['street_address'];
        $sufixo = $_POST['postal_code_suffix'];
        $cod_postal = $_POST['postal_code'];
        $telefone = $_POST['telefone'];
        $proponentes = $_POST['Sexo'];
        $nif = $_POST['nif_3'];
        $cidade = $_POST['cidade'];
        $colaboracao = $_POST['colabora_o_volunt_rio_13'];
        $data_recebimento = date("Y-m-d H:i:s");
        $formacao = $_POST['formacao'];
        $bi = $_POST['bi'];
        $motivo = $_POST['motivo'];
        $sexo=$_POST['genero'];
        $str = "Tiac2015";
        $pass=md5($str);
        $subscriber='a:1:{s:10:"subscriber";b:1;}';
        $today = $date = date('Y/m/d H:i:s');
     



   $contacto_existente= $wpdb->get_row("SELECT entity_id FROM  civicrm_value_nif_3  WHERE nif_3='$nif'");
   $external_id = $wpdb->get_row("SELECT external_identifier FROM wp_users WHERE id='$user_id'");
   $contact_id = $wpdb->get_row("SELECT id FROM civicrm_contact WHERE external_identifier='$external_id->external_identifier'");
   $email_existente= $wpdb->get_row("SELECT contact_id FROM  civicrm_email  WHERE email='$email'");

   
         function mostrar_erros($erros){
          $output = array();
          foreach ($erros as $erro) {
          $output[] = "<li class='icon-remove'> " . $erro . "</li><br/>";
          }
          return "<div class='alert alert-error'>  <button type='button' class='close' data-dismiss='alert'>&times;</button>
          <ul>" . implode("",$output) . "</ul></div>";
        }

if(empty($bi) || empty($motivo) || empty($formacao) || empty($email) || empty($first_name) || empty($last_name) ||  empty($nif) ||  empty($birth_date) || empty($cidade) || empty($telefone)){
        $erros[] = "Os campos assinalados com * são de preenchimento obrigatório";

      }if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $erros[] = "O email escolhido não é válido.";

      }

      if(!is_numeric($nif)){
        $erros[] = "O número de contribuinte só pode conter números.";
        
        }if(strlen($nif) != 9){
        $erros[] = "O número de contribuinte deve conter nove dígitos.";
      
        }if(!binif_isvalid($_POST['nif_3'])){
        $erros[] = "O número de contribuinte é inválido.";
      
        }if ( $nif == '123456789' ){
        $erros[] = "O número de contribuinte é inválido."; 
        }

      if($email_existente != 0){
        $erros[] = "O email já foi registado, por favor inicie sessão.";

      }
 if($contacto_existente != 0){
        $erros[] = "O utilizador já foi registado, por favor inicie sessão.";

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
       
        

          if(empty($erros) == false){
          echo mostrar_erros($erros);
        
    
  }else{
    

        $max_contact_id= $wpdb->get_var("SELECT MAX(id) FROM civicrm_contact");
        $max_contact_id_wp= $wpdb->get_var("SELECT MAX(ID) FROM wp_users");
        $contact_id=$max_contact_id + 1;
        $contact_id_wp=$max_contact_id_wp + 1;


         $wpdb->query("INSERT INTO civicrm_contact (gender_id,job_title,contact_type,sort_name,display_name,first_name,middle_name,last_name,email_greeting_id,email_greeting_display,birth_date)
         VALUES ('$genero','$formacao','Individual',CONCAT('$first_name','$middle_name','$last_name'),CONCAT('$first_name','$last_name'),'$first_name','$middle_name','$last_name','1',CONCAT('Dear','$first_name'),'$data')");
         $wpdb->query("INSERT INTO civicrm_email (contact_id,email,is_primary,is_billing) VALUES ('{$contact_id}','{$email}','1','1')");
         $wpdb->query("INSERT INTO civicrm_address (contact_id,is_primary,is_billing,postal_code,city,street_address) VALUES ('{$contact_id}','1','1','{$cod_postal}','$cidade','{$morada}')");
         $wpdb->query("INSERT INTO civicrm_phone (contact_id,location_type_id,is_primary,is_billing,phone) VALUES ('$contact_id','1','1','0','$telefone')");
         $wpdb->query("INSERT INTO civicrm_value_bi_cc_2 (entity_id,bi_cc_2) VALUES ('$contact_id}','$bi')");
         $wpdb->query("INSERT INTO civicrm_value_nif_3 (entity_id,nif_3) VALUES ('$contact_id','$nif')");
         $wpdb->query("INSERT INTO civicrm_value_teste_12 (entity_id,proponentes_12) VALUES ('$contact_id','$proponentes')");
         $wpdb->query("INSERT INTO civicrm_value_outro_15 (entity_id,outro_18) VALUES ('$contact_id','$motivo')");
         $wpdb->query("INSERT INTO civicrm_value_colabora_o_volunt_rio_13 (entity_id,colabora_o_volunt_rio_13) VALUES ('$contact_id','$colaboracao')");
         $wpdb->query("INSERT INTO civicrm_group_contact (group_id,contact_id,status) VALUES ('13','$contact_id','Added')");
          //--------------------------------WORDPRESS--------------------------------------//
         $wpdb->query("INSERT INTO wp_users (ID,user_login,user_pass,user_nicename,user_email,user_registered,user_status,display_name,external_identifier) 
          VALUES ('$contact_id_wp','$email','$pass',CONCAT('$first_name','$last_name'),'$email', '$data_registo', '0', CONCAT('$first_name','$last_name'),'NULL')");
        $wpdb->query("INSERT INTO wp_usermeta (user_id,meta_key,meta_value) VALUES ('$contact_id_wp','wp_capabilities',' $subscriber')");
          //$wpdb->query("INSERT INTO wp_usermeta (user_id,meta_key,meta_value) VALUES ('$contact_id_wp','wp_capabilities','a:1:{s:10:'subscriber';b:1;}')");

          //----------------------------------EMAIL DE CONFIRMAÇÂO---------------------------------//


          // Create the Transport EMAIL
          $transport = Swift_SmtpTransport::newInstance('smtp.transparencia.pt', 25)
          ->setUsername('celso.rodrigues@transparencia.pt')
          ->setPassword('Tiac_2013**');
          $mailer = Swift_Mailer::newInstance($transport);
          //$mailer->registerPlugin(new Swift_Plugins_AntiFloodPlugin(10, 10));
          $message = Swift_Message::newInstance('Transparência e Integridade, Associação Cívica. Obrigado pela sua inscrição!')
          ->setFrom(array('secretario@transparencia.pt' => 'TIAC'))
          ->setTo(array($email , 'secretariado@transparencia.pt', 'celso.rodrigues@transparencia.pt' => 'Registo TIAC'))
          ->setBody( '<p><img alt="" src="https://transparencia.pt/wp-content/themes/wpbootstrap/assets/img/logoc.png" style="width: 200px; height: 62px;" /></p>

<p>&nbsp;</p>

<p><span style="line-height: 1.6em;">Caro/a </span><b style="font-size:1.2em;"> '.$first_name. " " .$last_name. ' </b></p>

<div>
<p>Obrigado por ter submetido o seu pedido de inscri&ccedil;&atilde;o na Transpar&ecirc;ncia e Integridade, Associa&ccedil;&atilde;o C&iacute;vica (TIAC).</p>

<p>&nbsp;</p>

<p>A sua inscri&ccedil;&atilde;o foi recebida com sucesso e ser&aacute; avaliada na pr&oacute;xima reuni&atilde;o da Dire&ccedil;&atilde;o da TIAC, tal como estabelecido nos nossos estatutos. Nessa altura, voltaremos ao contacto para lhe dar informa&ccedil;&atilde;o sobre os pr&oacute;ximos passos.</p>

<p>&nbsp;</p>

<p>Entretanto, pode seguir o nosso trabalho atrav&eacute;s do nosso site e redes sociais:</p>

<p>&nbsp;</p>

<p><a href="https://transparencia.pt/">www.transparencia.pt</a></p>

<p><a href="http://www.facebook.com/transparenciapt">www.facebook.com/transparenciapt</a></p>

<p><a href="https://twitter.com/transparenciapt">twitter.com/transparenciapt</a></p>

<p><a href="https://www.youtube.com/user/transparenciapt">www.youtube.com/user/transparenciapt</a></p>

<p>&nbsp;</p>

<p>Obrigado pelo seu interesse e empenho em associar-se &agrave; TIAC! Valorizamos o contributo de todos para, juntos, defendermos a transpar&ecirc;ncia e a integridade da vida p&uacute;blica.</p>

<p>&nbsp;</p>

<p>At&eacute; breve!</p>
</div>

<div>
<div>&nbsp;</div>
</div>

<p><img alt="" src="https://transparencia.pt/wp-content/themes/wpbootstrap/assets/img/logoc.png" style="width: 200px; height: 62px;" /></p>

<p><font color="#2e74b5" face="Calibri, sans-serif" size="3" style="line-height: 20.7999992370605px;"><span style="line-height: 22.7199993133545px;"><b>SECRETARIADO - TIAC</b></span></font><br style="color: rgb(0, 0, 0); font-family: Calibri, sans-serif; font-size: 15px; line-height: 21.2999992370605px;" />
<font face="Calibri, sans-serif" style="color: rgb(0, 0, 0); line-height: normal; font-family: Calibri, sans-serif; font-size: 15px;"><span lang="pt-PT" style="line-height: 21.2999992370605px;">E-Mail:&nbsp;<a href="mailto:celso.rodrigues@transparencia.pt" style="color: rgb(0, 104, 207); line-height: 21.2999992370605px; font-weight: inherit; cursor: default;" target="_blank">secretariado@transparencia.pt</a></span></font><br style="color: rgb(0, 0, 0); font-family: Calibri, sans-serif; font-size: 15px; line-height: 21.2999992370605px;" />
<font face="Calibri, sans-serif" style="color: rgb(0, 0, 0); line-height: normal; font-family: Calibri, sans-serif; font-size: 15px;">Phone: (+351) 21 752 20 75</font></p>



<p><font face="Calibri, sans-serif"><a href="https://transparencia.pt/" target="_blank">www.transparencia.pt</a></font></p>

<p>&nbsp;</p>

<div>
<div>
<div id="_com_1" uage="JavaScript">

</div>
</div>
</div>
<style type="text/css">P { margin-bottom: 0.21cm; direction: ltr; color: rgb(0, 0, 0); text-align: left; }P.western { font-family: "Times New Roman",serif; font-size: 12pt; }P.cjk { font-family: "Arial Unicode MS",sans-serif; font-size: 12pt; }P.ctl { font-family: "Arial Unicode MS",sans-serif; font-size: 12pt; }A:link {  }
</style>
<style type="text/css">P { margin-bottom: 0.21cm; direction: ltr; color: rgb(0, 0, 0); text-align: left; }P.western { font-family: "Times New Roman",serif; font-size: 12pt; }P.cjk { font-family: "Arial Unicode MS",sans-serif; font-size: 12pt; }P.ctl { font-family: "Arial Unicode MS",sans-serif; font-size: 12pt; }A:link {  }
</style>
', 'text/html');
          $result = $mailer->send($message);


//----------------------------------------------------------------------------------------------------------SEGUNDO EMAIL------------------------------------------------------

 // Create the Transport EMAIL
          $transport = Swift_SmtpTransport::newInstance('smtp.transparencia.pt', 25)
          ->setUsername('celso.rodrigues@transparencia.pt')
          ->setPassword('Tiac_2013**');
          $mailer = Swift_Mailer::newInstance($transport);
          //$mailer->registerPlugin(new Swift_Plugins_AntiFloodPlugin(10, 10));
          $message = Swift_Message::newInstance('Associado para aprovação.')
          ->setFrom(array('secretario@transparencia.pt' => 'TIAC'))
          ->setTo(array('secretariado@transparencia.pt','celso.rodrigues@transparencia.pt' => 'Registo TIAC'))
          ->setBody( '<p><img alt="" src="https://transparencia.pt/wp-content/themes/wpbootstrap/assets/img/logoc.png" style="width: 200px; height: 62px;" /></p>
          	<h4>Nova proposta de associação.</h4>

<p>&nbsp;</p>

<p><span style="line-height: 1.6em;"><b style="font-size:1.2em;">Nome completo: </b></span></p><p> '.$first_name. " " .$middle_name. " " .$last_name. ' </p>

<p><span style="line-height: 1.6em;"><b style="font-size:1.2em;">Endereço de Email: </b></span></p><p> '.$email. ' </p>

<p><span style="line-height: 1.6em;"><b style="font-size:1.2em;">Data de nascimento: </b></span></p><p> '.$birth_date. ' </p>

<p><span style="line-height: 1.6em;"><b style="font-size:1.2em;">Morada: </b></span></p><p> '.$morada. ' </p>

<p><span style="line-height: 1.6em;"><b style="font-size:1.2em;">Código Postal: </b></span></p><p> '.$cod_postal. ' </p>

<p><span style="line-height: 1.6em;"><b style="font-size:1.2em;">Cidade: </b></span></p><p>'.$cidade. ' </p>

<p><span style="line-height: 1.6em;"><b style="font-size:1.2em;">Telefone: </b></span></p><p> '.$telefone. ' </p>

<p><span style="line-height: 1.6em;"><b style="font-size:1.2em;">NIF:</b> </span></p><p> '.$nif. ' </p>

<p><span style="line-height: 1.6em;"><b style="font-size:1.2em;">BI: </b></span></p><p> '.$bi. ' </p>

<p><span style="line-height: 1.6em;"><b style="font-size:1.2em;">Ocupação/Formação:</b> </span></p><p>'.$formacao. ' </p>

<p><span style="line-height: 1.6em;"><b style="font-size:1.2em;">Associados proponentes/Motivo. </b></span></p><p> '.$motivo. ' </p>

<p><span style="line-height: 1.6em;"><b style="font-size:1.2em;">Deseja colaborar com a TIAC? </b></span></p><p> '.$colaboracao. ' </p>


<p style="text-align:left;"><span style="line-height: 1.6em;"><i>TIAC </span> '.$today. ' </i></p>'




, 'text/html');


          $result = $mailer->send($message);




   echo "<script>";
      $url ="https://transparencia.pt/agradecimento-registo/";
      echo "location.href='$url'";
      echo "</script>";
       }

      }
  ?>


  <div id="crm-container" class="crm-container crm-public" lang="pt" xml:lang="pt">
  <div class="clear"></div>
  <form action="" method="post" name="Main" id="Main" enctype="multipart/form-data">
  <div><input name="qfKey" type="hidden" value="e9496933bffc58be11dab7c77e3cf599_9087">
  <input name="entryURL" type="hidden" value="https://transparencia.pt/?page=CiviCRM&amp;amp;q=civicrm/contribute/transact&amp;amp;page_id=1864&amp;amp;page_id=1864">
  <input name="priceSetId" type="hidden" value="8">
  <input id="selectProduct" name="selectProduct" type="hidden" value="">
  <input name="_qf_default" type="hidden" value="Main:upload">
  <input name="MAX_FILE_SIZE" type="hidden" value="20971520">
  </div>



    

    
    
      <div class="crm-contribution-page-id-4 crm-block crm-contribution-main-form-block">
    <div id="intro_text" class="crm-section intro_text-section">
      <p style="padding: 0px; border: 0px; font-family: Roboto, Verdana, Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; vertical-align: baseline; color: rgb(30, 30, 30); margin: 0px !important;"><img alt="" src="https://transparencia.pt/wp-content/themes/wpbootstrap/assets/img/logoc.png" style="width: 200px; height: 62px;margin-bottom:50px;"></p>



  <p style="padding: 0px; border: 0px; font-family: Roboto, Verdana, Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; vertical-align: baseline; color: rgb(30, 30, 30); margin: 0px !important;"><span style="line-height: 1.2em; background-color: transparent; color: rgb(21, 87, 134); font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 25px; text-align: right; text-transform: uppercase;">Torna-te Membro da TIAC</span></p>

  <p style="font-family: Roboto, Verdana, Arial, Helvetica, sans-serif;margin-top:30px;"><span style="line-height: 1.2em; color: black; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;  text-align: right;">Estatutos da TIAC</span></p>

  <p style="font-family: Roboto, Verdana, Arial, Helvetica, sans-serif;"><span style="line-height: 2.2em; color: black; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;  text-align: right;">Capítulo II - Artigo 4º * Admissão</span></p>

  <p style="font-family: Roboto, Verdana, Arial, Helvetica, sans-serif;margin-top:30px;"><span style="line-height: 1.2em; color: black; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;  text-align: right;">1. Podem ser associados as pessoas e entidades que se interessem pela realização do fim social, cumpram os presentes estatutos e as deliberações dos órgãos sociais.</span></p>
  <p style="font-family: Roboto, Verdana, Arial, Helvetica, sans-serif;"><span style="line-height: 2.2em; color: black; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;  text-align: right;">2. As candidaturas de admissão são apresentadas por dois ou mais associados à direção, em modelo próprio, aprovado pela direção, incumbindo a esta a sua aprovação e a consequente atribuição da qualidade de associado.</span></p>
  <p style="font-family: Roboto, Verdana, Arial, Helvetica, sans-serif;"><span style="line-height: 2.2em; color: black; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;  text-align: right;">3. A recusa de admissão só pode ser declarada por manifesta desconformidade com os interesses da associação devendo ser fundamenta e comunicada por escrito ao interessado até noventa dias após a receção da candidatura. </span></p>
  <p style="font-family: Roboto, Verdana, Arial, Helvetica, sans-serif;"><span style="line-height: 2.2em; color: black; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;  text-align: right;">4. O candidato a associado rejeitado pode apelar para o presidente da mesa da assembleia geral no prazo de vinte dias após a receção da comunicação, cabendo a este decidir quanto à oportunidade da sua apreciação em assembleia geral.</span></p>





    </div>
      
      <div id="priceset-div">
    <div id="priceset" class="crm-section price_set-section">
      
                                
              
      

  </div>
    </div>
    
    
         

    
    
        

    
    <div class="crm-group custom_pre_profile-group">
      <fieldset class="crm-profile crm-profile-id-13 crm-profile-name-Contribui_es_13"><div class="crm-section editrow_first_name-section form-item" id="editrow-first_name"><div class="label"><label for="first_name">  Nome
       <span class="crm-marker" title="Este campo é obrigatório.">*</span>

  </label></div><div style="margin-top:10px;" class="content"><input style="width:295px;"maxlength="64" size="30" name="first_name" type="text" value="" id="first_name" class="form-text big required"></div><div class="clear"></div></div><div class="crm-section editrow_middle_name-section form-item" id="editrow-middle_name"><div class="label"><label for="middle_name">Nome(s) do Meio</label></div><div class="content" style="margin-top:10px;"><input style="width:295px; maxlength="64" size="20" name="middle_name" type="text" value="" id="middle_name" class="form-text medium"></div><div class="clear"></div></div><div class="crm-section editrow_last_name-section form-item" id="editrow-last_name"><div class="label"><label for="last_name">  Apelido
       <span class="crm-marker" title="Este campo é obrigatório.">*</span>

  </label></div><div class="content" style="margin-top:10px;"><input style="width:295px; maxlength="64" size="30" name="last_name" type="text" value="" id="last_name" class="form-text big required"></div><div class="clear"></div></div>

   <div class="crm-section email-5-section">
      <div class="label" style="margin-top:10px;"><label for="email-5">  Endereço de Email
       <span class="crm-marker" title="Este campo é obrigatório.">*</span>

  </label></div>
      <div class="content" style="margin-top:10px;">
        <input style="width:295px;" size="30" maxlength="60" class="email required" name="email" type="text" value="" id="email-5">
      </div>
      <div class="clear"></div>
    </div>




  <div class="crm-section editrow_birth_date-section form-item" id="editrow-birth_date"><div class="label"><label for="birth_date">  Data de Nascimento
       <span class="crm-marker" title="Este campo é obrigatório.">*</span>

  </label></div>

  <div style="margin-top:10px;" class="content"><input style="width:295px;" type="text" name="birth_date" id="birth_date" class="" autocomplete="off" placeholder="Formato Ano-Mês-Dia : (ex:2014-07-23)">
  </div><div class="clear"></div></div>

  <div class="crm-section editrow_birth_date-section form-item" id="editrow-birth_date"><div class="label"><label for="birth_date">  Sexo
       

  </label></div>

  <table><tr><td><form name=myform>
  <div style="width:230px;">
  <input style="margin-top:10px;" type="radio" name="genero" value="1" checked>Masculino
  </div></td>
  <td>
  <div>
  <input style="margin-top:10px;" type="radio" name="genero" value="2">Feminino
  </form></td></tr></table><div class="clear"></div></div>




  <div class="crm-section editrow_address_name-1-section form-item" id="editrow-address_name-1"style="margin-top:10px;"><div class="label"><label for="address_name-1">  Morada
       

  </label></div><div style="margin-top:10px;" class="content"><input style="width:295px;"maxlength="255" size="45" name="street_address" type="text" id="address_name-1" class="form-text huge required"></div><div class="clear"></div></div><div id="editrow-postal_code-Primary" class="crm-section editrow_postal_code-Primary-section form-item"><div class="label"><label for="postal_code-Primary"> Código Postal
      

  </label></div><div style="margin-top:10px;" class="edit-value content"><input style="width:295px;" maxlength="12" size="12" name="postal_code" type="text" id="postal_code-Primary" class="form-text twelve required" placeholder="ex:5370-521"></div>
  <div class="clear"></div></div> 



  <div id="cidade" class="crm-section editrow_postal_code_suffix-Primary-section form-item"><div class="label"><label for="cidade"> Cidade
       <span class="crm-marker" title="This field is required.">*</span>

  </label></div><div class="edit-value content" style="margin-top:10px;"><input style="width:295px;" maxlength="12" size="12" name="cidade" type="text" id="cidade" class="form-text twelve required"></div><div class="clear"></div></div>


  <div class="crm-section editrow_phone-Primary-1-section form-item" id="telefone"><div class="label"><label for="telefone">Telefone
  <span class="crm-marker" title="Este campo é obrigatório.">*</span>


  </label></div><div class="content" style="margin-top:10px;"><input style="width:295px;" maxlength="32" size="20" name="telefone" type="text" value="" id="telefone" class="form-text medium"></div><div class="clear"></div></div>


  <div class="crm-section editrow_custom_3-section form-item" id="editrow-custom_3"><div class="label"><label for="custom_3">  NIF
       <span class="crm-marker" title="Este campo é obrigatório.">*</span>

  </label></div><div class="content" style="margin-top:10px;"><input style="width:295px;" data-crm-custom="NIF:NIF" name="nif_3" type="text" value="" id="custom_3" class="form-text required"></div><div class="clear"></div></div>

  <div class="crm-section editrow_custom_3-section form-item" id="editrow-custom_3"><div class="label"><label for="bi">  BI/CC
       <span class="crm-marker" title="Este campo é obrigatório.">*</span>

  </label></div><div class="content" style="margin-top:10px;"><input style="width:295px;" data-crm-custom="BI/CC" name="bi" type="text" value="" id="bi" class="form-text required"></div><div class="clear"></div></div>


  <div class="crm-section editrow_custom_3-section form-item" id="formacao"><div class="label"><label for="custom_3">  Ocupação/Formação
       <span class="crm-marker" title="Este campo é obrigatório.">*</span>

  </label></div><div class="content" style="margin-top:10px;"><input style="width:295px;"data-crm-custom="formacao" name="formacao" type="text" value="" id="formacao" class="form-text required"></div><div class="clear"></div></div>



  <div class="crm-section editrow_birth_date-section form-item" id="editrow-birth_date"><div class="label"><label for="proponentes">  Tem dois Associados Proponentes?
  <span class="crm-marker" title="Este campo é obrigatório.">*</span>

  </label></div>
  <table><tr><td><form name=myform>
  <div style="width:230px;">
  <input style="margin-top:10px;" type="radio" name="Sexo" value="1" checked>Sim
  </div></td>
  <td>
  <div>
  <input style="margin-top:10px;" type="radio" name="Sexo" value="0">Não
  </form></td></tr></table><div class="clear"></div></div>






  <div style="margin-top:10px;" class="crm-section editrow_custom_13-section form-item" id="editrow-custom_13"><div class="label"><label for="custom_13">Associados proponentes/Motivo

  <span class="crm-marker" title="Este campo é obrigatório.">*</span>

  </label></div><div class="content" style="margin-top:10px;"><div class="resizable-textarea"><span><textarea placeholder="Identifique os dois associados que propõem a sua inscrição, ou explique-nos brevemente porque razão se quer associar à TIAC" style="width:295px;" data-crm-custom="Colabora_o_volunt_rio:Colabora_o_Volunt_rio" rows="4" cols="60" name="motivo" id="civicrm_value_outro_15" class="form-textarea textarea-processed"></textarea><div class="grippie" style="margin-right: 34px;"></div></span></div></div><div class="clear"></div></div>


  <div class="crm-section editrow_custom_13-section form-item" id="editrow-custom_13"><div class="label"><label for="custom_13">Deseja colaborar com a TIAC?</label></div><div class="content" style="margin-top:10px;"><div class="resizable-textarea"><span><textarea placeholder="Diga-nos como."style="width:295px;"data-crm-custom="Colabora_o_volunt_rio:Colabora_o_Volunt_rio" rows="4" cols="60" name="colabora_o_volunt_rio_13" id="custom_13" class="form-textarea textarea-processed"></textarea><div class="grippie" style="margin-right: 34px;"></div></span></div></div><div class="clear"></div></div></fieldset>

   


    </div>

    
    
    
    <div id="billing-payment-block">
            </div>

    </div>

    
      <div id="crm-submit-buttons" class="crm-submit-buttons">
      <div class="g-recaptcha" data-theme="dark" data-sitekey="6LcKdwUTAAAAALbhMtNKePbMnaRFNXDtxVMy4lRz"></div>
    
                                                                                    <span class="crm-button crm-button-type-upload crm-button_qf_Main_upload"><input  style="margin-top:40px;"class="validate form-submit default" name="_qf_Main_upload" value="Torna-te associado TIAC" type="submit" id="_qf_Main_upload-bottom"></span>
        </div>
    </div>

  </form>



  </div>






  
