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
      $donativo = $_POST['price_9'];
      $first_name = $_POST['first_name'];
      $middle_name = $_POST['middle_name'];
      $last_name = $_POST['last_name'];
      $birth_date = $_POST['birth_date'];
      $data = date("Y-m-d", strtotime($birth_date));
      $email = $_POST['email'];
      $morada = $_POST['street_address'];
      $sufixo = $_POST['postal_code_suffix'];
      $cod_postal = $_POST['postal_code'];
      $telefone = $_POST['phone'];
      $nif = $_POST['nif_3'];
      $observacoes = $_POST['colabora_o_volunt_rio_13'];
      $data_recebimento = date("Y-m-d H:i:s");

 $contacto_existente= $wpdb->get_row("SELECT entity_id FROM  civicrm_value_nif_3  WHERE nif_3='$nif'");
 $external_id = $wpdb->get_row("SELECT external_identifier FROM wp_users WHERE id='$user_id'");
 $contact_id = $wpdb->get_row("SELECT id FROM civicrm_contact WHERE external_identifier='$external_id->external_identifier'");
 $donativos = $wpdb->get_row("SELECT SUM(total_amount) FROM civicrm_contribution WHERE contact_id = '{$contacto_existente->entity_id}' AND contribution_page_id ='4' AND  contribution_status_id = '1'",ARRAY_A);
 $googleWallet = $wpdb->get_row("SELECT SUM(total_amount) FROM civicrm_contribution WHERE contact_id = '{$contacto_existente->entity_id}' AND contribution_page_id ='8'AND  contribution_status_id = '1'",ARRAY_A);
 $total_donativos=($donativos['SUM(total_amount)'] + $googleWallet['SUM(total_amount)']);
//print_r($donativos);
 $limite_donativos= (5000 - $total_donativos);
 $total_final = $total_donativos + $donativo;





       function mostrar_erros($erros){
        $output = array();
        foreach ($erros as $erro) {
        $output[] = "<li class='icon-remove'> " . $erro . "</li><br/>";
        }
        return "<div class='alert alert-error'>  <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <ul>" . implode("",$output) . "</ul></div>";
      }

   

   if(empty($donativo) || empty($email) || empty($first_name) || empty($last_name) ||  empty($nif)){
        $erros[] = "Os campos assinalados com * são de preenchimento obrigatório";

      }if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $erros[] = "O email escolhido não é válido.";

      }

     
       if($donativo > 5000 ){
        $erros[] = "Excedeste o valor máximo para um donativo.";

       }if($total_final > 5000 ){
        $erros[] = "Excedeste o limite de donativo para o ano corrente (5000€/Ano).";
        $erros[] = "Apenas podes fazer um donativo no total de:" .$limite_donativos ."€";
       
       }if(!is_numeric($nif)){
        $erros[] = "O número de contribuinte só pode conter números.";
        
       }if(strlen($nif) != 9){
        $erros[] = "O número de contribuinte deve conter nove dígitos.";
      
       }if(!binif_isvalid($_POST['nif_3'])){
        $erros[] = "O número de contribuinte é inválido.";
      
      }if ( $nif == '123456789' ){
        $erros[] = "O número de contribuinte é inválido."; 
      }


       if(empty($erros) == false){
        echo mostrar_erros($erros);
      
      }else if($contacto_existente != 0){
      //print_r($contacto_existente);
        $wpdb->insert("civicrm_contribution", array(
     "contact_id" => $contacto_existente->entity_id,
     "financial_type_id" => "2",
     "contribution_page_id" => "4",
      "receive_date" => $data_recebimento,
     "total_amount" => $donativo,
     "currency" => "EUR",
     "source" => "Contribuição Online: Doações Indivíduo",
     "contribution_status_id" => "2"

  ));

    //header("Location:https://".$nome_servidor."/?page_id=3261&valor=".$donativo."&id=".$contacto_existente->entity_id);
echo "<script>";
    $url ="https://transparencia.pt/?page_id=3261&valor=$donativo&id=$contacto_existente->entity_id";
    echo "location.href='$url'";
echo "</script>";
}else{

      $max_contact_id= $wpdb->get_var("SELECT MAX(id) FROM civicrm_contact");
  
        $contact_id=$max_contact_id+1;

       $wpdb->query("INSERT INTO civicrm_contact (contact_type,sort_name,display_name,first_name,middle_name,last_name,email_greeting_id,email_greeting_display,birth_date)
       VALUES ('Individual',CONCAT('$first_name','$middle_name','$last_name'),CONCAT('$first_name','$last_name'),'$first_name','$middle_name','$last_name','1',CONCAT('Dear','$first_name'),'$data')");
        //$id = mysql_insert_id();
        $wpdb->query("INSERT INTO civicrm_email (contact_id,email,is_primary,is_billing) VALUES ('$contact_id','$email','1','1')");
        $wpdb->query("INSERT INTO civicrm_address (contact_id,is_primary,is_billing,postal_code,name) VALUES ('$contact_id','1','1','$cod_postal','$morada')");
        $wpdb->query("INSERT INTO civicrm_phone (contact_id,location_type_id,is_primary,is_billing,phone) VALUES ('$contact_id','1','1','0','$telefone')");
        $wpdb->query("INSERT INTO civicrm_value_nif_3 (entity_id,nif_3) VALUES ('$contact_id','$nif')");
        $wpdb->query("INSERT INTO civicrm_value_colabora_o_volunt_rio_13 (entity_id,colabora_o_volunt_rio_13) VALUES ('$contact_id','$observacoes')");
        $wpdb->query("INSERT INTO civicrm_contribution (contact_id,financial_type_id,contribution_page_id,receive_date,total_amount,currency,source,contribution_status_id) VALUES ('$contact_id','1','4','$data_recebimento','$donativo','EUR','Contribuição Online: Doações Indivíduo','2')");
        $wpdb->query("INSERT INTO civicrm_group_contact (group_id,contact_id,status) VALUES ('18','$contact_id','Added')");
        //header("Location:https://".$nome_servidor."/?page_id=3261&valor=".$donativo."&id=".$contact_id);
       //var_dump ($teste);
       // print_r($max_contact_id);

  echo "<script>";
    $url ="https://transparencia.pt/?page_id=3261&valor=$donativo&id=$contact_id";
    echo "location.href='$url'";
    echo "</script>";
     }

    }

     

  
  
//header("Location:https://".$nome_servidor."/?page_id=3261&valor=".$donativo."&id=".$contacto_existente);


       
         
 //print_r($max_contact_id);
   //if($nif_existe == true) {

      //echo "Já existe";
   //$wpdb->query("UPDATE civicrm_value_nif_3 SET nif_3 = '$nif' WHERE entity_id = '$id_atualizar->contact_id'");
   

 //print_r($contacto_existente );
   //$wpdb->query("INSERT INTO civicrm_contribution (contact_id,financial_type_id,contribution_page_id,receive_date,total_amount,currency,source,contribution_status_id) VALUES ('$contacto_existente,'1','4','$data_recebimento','$donativo','EUR','Contribuição Online: Doações Indivíduo','2')");
     
     //}

     /*else{
       $wpdb->query("INSERT INTO civicrm_contact (contact_type,sort_name,display_name,first_name,middle_name,last_name,email_greeting_id,email_greeting_display,birth_date)
       VALUES ('Individual',CONCAT('$first_name','$middle_name','$last_name'),CONCAT('$first_name','$last_name'),'$first_name','$middle_name','$last_name','1',CONCAT('Dear','$first_name'),'$data')");
        $id = mysql_insert_id();
        $wpdb->query("INSERT INTO civicrm_email (contact_id,email,is_primary,is_billing) VALUES ('$id','$email','1','1')");
        $wpdb->query("INSERT INTO civicrm_address (contact_id,is_primary,is_billing,postal_code_suffix,postal_code,name) VALUES ('$id','1','1','$sufixo','$cod_postal','$morada')");
        $wpdb->query("INSERT INTO civicrm_phone (contact_id,location_type_id,is_primary,is_billing,phone) VALUES ('$id','1','1','0','$telefone')");
        $wpdb->query("INSERT INTO civicrm_value_nif_3 (entity_id,nif_3) VALUES ('$id','$nif')");
        $wpdb->query("INSERT INTO civicrm_value_colabora_o_volunt_rio_13 (entity_id,colabora_o_volunt_rio_13) VALUES ('$id','$observacoes')");
        $wpdb->query("INSERT INTO civicrm_contribution (contact_id,financial_type_id,contribution_page_id,receive_date,total_amount,currency,source,contribution_status_id) VALUES ('$id','2','4','$data_recebimento','$donativo','EUR','Contribuição Online: Doações Indivíduo','2')");
        $wpdb->query("INSERT INTO civicrm_group_contact (group_id,contact_id,status) VALUES ('18','$id','Added')");
        header("Location:http://".$nome_servidor."/?page_id=3261&valor=".$donativo."&id=".$id);
     }*/
   
?>


<div id="crm-container" class="crm-container crm-public" lang="pt" xml:lang="pt">













<div class="clear"></div>




<!-- .tpl file invoked: CRM/Contribute/Form/Contribution/Main.tpl. Call via form.tpl if we have a form in the page. -->
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
    <p style="padding: 0px; border: 0px; font-family: Roboto, Verdana, Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; vertical-align: baseline; color: rgb(30, 30, 30); margin: 0px !important;"><img alt="" src="https://transparencia.pt/wp-content/plugins/files/civicrm/persist/contribute/images/logoc.png" style="width: 200px; height: 62px;"></p>

<p style="padding: 0px; border: 0px; font-family: Roboto, Verdana, Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; vertical-align: baseline; color: rgb(30, 30, 30); margin: 0px !important;">&nbsp;</p>

<p style="padding: 0px; border: 0px; font-family: Roboto, Verdana, Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; vertical-align: baseline; color: rgb(30, 30, 30); margin: 0px !important;"><span style="line-height: 1.2em; background-color: transparent; color: rgb(21, 87, 134); font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 25px; text-align: right; text-transform: uppercase;">FAZ UM DONATIVO</span></p>

<p style="padding: 0px; border: 0px; font-family: Roboto, Verdana, Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; vertical-align: baseline; color: rgb(30, 30, 30); margin: 0px !important;"><span style="line-height: 1.2em; color: black; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 23px; text-align: right;">O combate contra a corrupção é uma luta desigual.</span></p>

<p style="padding: 0px; border: 0px; font-family: Roboto, Verdana, Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; vertical-align: baseline; color: rgb(30, 30, 30); margin: 0px !important;"><span style="line-height: 1.2em; color: black; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 23px; text-align: right;">Todos os contributos são preciosos&nbsp;</span><span style="line-height: 1.2em; color: black; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 23px; text-align: right;">para financiar o nosso trabalho de&nbsp;</span><span style="line-height: 1.2em; color: black; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 23px; text-align: right;">estudo, sensibilização e pressão&nbsp;</span><span style="line-height: 1.2em; color: black; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 23px; text-align: right;">pública.</span></p>

<p style="padding: 0px; border: 0px; font-family: Roboto, Verdana, Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; vertical-align: baseline; color: rgb(30, 30, 30); margin: 0px !important;">&nbsp;</p>
  </div>
    
    <div id="priceset-div">
  <div id="priceset" class="crm-section price_set-section">
    
                                <div class="crm-section other_amount-section">
            
                
                <div class="label" style="margin-top:10px;"><label for="price_9" style="margin-top:50px;">  Donativo
     <span class="crm-marker" title="Este campo é obrigatório.">*</span>

</label></div>
                <div class="content other_amount-content" >
                  <input type="radio" name="price_9" value="10" class="don">10€<br>
                  <input type="radio" name="price_9" value="20" class="don">20€<br>                 
                   <input type="radio" name="price_9" value="50" class="don">50€<br>
                  <input price="[11,&quot;1||&quot;]" size="4" name="price_9" type="text" id="price" class="form-text four required">
                                                        </div>
                <div class="clear"></div>

                        </div>
            
    

</div>
  </div>
  
  
        <div class="crm-section email-5-section">
    <div class="label" style="margin-top:10px;"><label for="email-5">  Endereço de Email
     <span class="crm-marker" title="Este campo é obrigatório.">*</span>

</label></div>
    <div class="content" style="margin-top:-10px;">
      <input size="30" maxlength="60" class="email required" name="email" type="text" value="" id="email-5">
    </div>
    <div class="clear"></div>
  </div>

  
  
      

  
  <div class="crm-group custom_pre_profile-group">
    <fieldset class="crm-profile crm-profile-id-13 crm-profile-name-Contribui_es_13"><legend>Donativo </legend><div class="crm-section editrow_first_name-section form-item" id="editrow-first_name"><div class="label"><label for="first_name">  Nome
     <span class="crm-marker" title="Este campo é obrigatório.">*</span>

</label></div><div style="margin-top:-10px;" class="content"><input maxlength="64" size="30" name="first_name" type="text" value="" id="first_name" class="form-text big required"></div><div class="clear"></div></div><div class="crm-section editrow_middle_name-section form-item" id="editrow-middle_name"><div class="label"><label for="middle_name">Nome(s) do Meio</label></div><div class="content" style="margin-top:-10px;"><input maxlength="64" size="20" name="middle_name" type="text" value="" id="middle_name" class="form-text medium"></div><div class="clear"></div></div><div class="crm-section editrow_last_name-section form-item" id="editrow-last_name"><div class="label"><label for="last_name">  Apelido
     <span class="crm-marker" title="Este campo é obrigatório.">*</span>

</label></div><div class="content" style="margin-top:-10px;"><input maxlength="64" size="30" name="last_name" type="text" value="" id="last_name" class="form-text big required"></div><div class="clear"></div></div> <div class="crm-section editrow_birth_date-section form-item" id="editrow-birth_date"><div class="label"><label for="birth_date">  Data de Nascimento
       <span class="crm-marker" title="Este campo é obrigatório.">*</span>

  </label></div>

  <div style="margin-top:10px;" class="content"><input style="width:295px;" type="text" name="birth_date" id="birth_date" class="" autocomplete="off" placeholder="Formato Ano-Mês-Dia : (ex:2014-07-23)">
  </div><div class="clear"></div></div><div class="crm-section editrow_address_name-1-section form-item" id="editrow-address_name-1"><div class="label"><label for="address_name-1">  Morada
     

</label></div><div style="margin-top:-10px;" class="content"><input maxlength="255" size="45" name="street_address" type="text" id="address_name-1" class="form-text huge required"></div><div class="clear"></div></div><div id="editrow-postal_code-Primary" class="crm-section editrow_postal_code-Primary-section form-item"><div class="label"><label for="postal_code-Primary"> Código Postal
    

</label></div><div style="margin-top:-10px;" class="edit-value content"><input maxlength="12" size="12" name="postal_code" type="text" id="postal_code-Primary" class="form-text twelve required"></div><div class="clear"></div></div> 

<!--<div id="editrow-postal_code_suffix-Primary" class="crm-section editrow_postal_code_suffix-Primary-section form-item"><div class="label"><label for="postal_code_suffix-Primary"> Sufixo do Código Postal
     <span class="crm-marker" title="This field is required.">*</span>

</label></div><div class="edit-value content"><input maxlength="12" size="12" name="postal_code_suffix" type="text" id="postal_code_suffix-Primary" class="form-text twelve required"></div><div class="clear"></div></div>--><div class="crm-section editrow_phone-Primary-1-section form-item" id="editrow-phone-Primary-1"><div class="label"><label for="phone-Primary-1">Telefone</label></div><div class="content" style="margin-top:-10px;"><input maxlength="32" size="20" name="phone" type="text" value="" id="phone-Primary-1" class="form-text medium"></div><div class="clear"></div></div><div class="crm-section editrow_custom_3-section form-item" id="editrow-custom_3"><div class="label"><label for="custom_3">  NIF
     <span class="crm-marker" title="Este campo é obrigatório.">*</span>

</label></div><div class="content" style="margin-top:-10px;"><input data-crm-custom="NIF:NIF" name="nif_3" type="text" value="" id="custom_3" class="form-text required"></div><div class="clear"></div></div><div class="crm-section editrow_custom_13-section form-item" id="editrow-custom_13"><div class="label"><label for="custom_13">Observações</label></div><div class="content" style="margin-top:-10px;"><div class="resizable-textarea"><span><textarea data-crm-custom="Colabora_o_volunt_rio:Colabora_o_Volunt_rio" rows="4" cols="60" name="colabora_o_volunt_rio_13" id="custom_13" class="form-textarea textarea-processed"></textarea><div class="grippie" style="margin-right: 34px;"></div></span></div></div><div class="clear"></div></div></fieldset>

 


  </div>

  
  
  
  <div id="billing-payment-block">
          </div>

  </div>

  
    <div id="crm-submit-buttons" class="crm-submit-buttons">
    <div class="g-recaptcha" data-theme="dark" data-sitekey="6LcKdwUTAAAAALbhMtNKePbMnaRFNXDtxVMy4lRz"></div>
  
                                                                                  <span class="crm-button crm-button-type-upload crm-button_qf_Main_upload"><input class="validate form-submit default" name="_qf_Main_upload" value="Confirmar a Contribuição" type="submit" id="_qf_Main_upload-bottom"></span>
      </div>
  </div>

</form>



</div>

<!--<div class="span8">
 <div style="margin-left:100px; margin-bottom:300px;">
	  	<div><br><p></p>






<div class="crm-container crm-public" id="crm-container" lang="en" lang="en" xml:lang="en">







<div id="printer-friendly">
<a title="Print this page." onclick="window.print(); return false;" href="#">
  <div class="ui-icon ui-icon-print"></div>
</a>
</div>



<div class="clear"></div>




    <form name="Main" id="Main" action="#" encType="multipart/form-data" method="post">
 
    <div class="crm-contribution-page-id-4 crm-block crm-contribution-main-form-block">
  <div class="crm-section intro_text-section" id="intro_text">
    <p><img width="200" height="60"alt="" src="http://civicrm.tiac.webfactional.com/wp-content/plugins/files/civicrm/persist/contribute/images/logoc.png"></p>

<p>&nbsp;</p>

<p><span right; color: rgb(21, 87, 134); text-transform: uppercase; line-height: 1.2em; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; font-size: 25px; background-color: transparent;'>FAZ UM DONATIVO</span></p>

<p><span right; color: black; line-height: 1.2em; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; font-size: 23px;'>O combate contra a corrupção é uma luta desigual.</span></p>

<p><span right; color: black; line-height: 1.2em; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; font-size: 23px;'>Todos os contributos são preciosos&nbsp;</span><span right; color: black; line-height: 1.2em; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; font-size: 23px;'>para financiar o nosso trabalho de&nbsp;</span><span right; color: black; line-height: 1.2em; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; font-size: 23px;'>estudo, sensibilização e pressão&nbsp;</span><span right; color: black; line-height: 1.2em; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; font-size: 23px;'>pública.</span></p>

<p>&nbsp;</p>
  </div>
    
    <div id="priceset-div">
  <div class="crm-section price_set-section" id="priceset">
    
                                <div class="crm-section other_amount-section">
            
                
                <div class="label"><label for="price_9">  Donativo(€) <span style="color:#990000"title="This field is required." class="crm-marker">*</span>
    

</label></div>
                <div class="content other_amount-content"><input name="price_9" class="form-text four required" id="price_9" type="text" size="4" price='[11,"1||"]'>
                                                        </div>
                <div class="clear"></div>

                        </div>
            
    

</div>
  </div>
  
  
        <div class="crm-section email-5-section">
    <div class="label"><label for="email-5">  Email Address<span style="color:#990000" title="This field is required." class="crm-marker">*</span>
     

</label></div>
    <div class="content">
      <input name="email-5" class="email required" id="email-5" type="text" size="30" maxLength="60">
    </div>
    <div class="clear"></div>
  </div>

  
  
      

  
  <div class="crm-group custom_pre_profile-group">
    <fieldset class="crm-profile crm-profile-id-13 crm-profile-name-Contribui_es_13"><legend>Doação Individual</legend><div class="crm-section editrow_first_name-section form-item" id="editrow-first_name" style="width:200px;"><div class="label"><label for="first_name">  Nome<span style="color:#990000" title="This field is required." class="crm-marker">*</span>
     

</label></div><div class="content"><input name="first_name" class="form-text big required" id="first_name" type="text" size="30" maxLength="64"></div><div class="clear"></div></div><div class="crm-section editrow_middle_name-section form-item" id="editrow-middle_name"><div class="label"><label for="middle_name">Nome(s) do Meio</label></div><div class="content"><input name="middle_name" class="form-text medium" id="middle_name" type="text" size="20" maxLength="64"></div><div class="clear"></div></div><div class="crm-section editrow_last_name-section form-item" id="editrow-last_name"><div class="label"><label for="last_name">  Apelido<span style="color:#990000" title="This field is required." class="crm-marker">*</span>
     

</label></div><div class="content"><input name="last_name" class="form-text big required" id="last_name" type="text" size="30" maxLength="64"></div><div class="clear"></div></div><div class="crm-section editrow_birth_date-section form-item" id="editrow-birth_date"><div class="label"><label for="birth_date">  Data de Nascimento<span style="color:#990000" title="This field is required." class="crm-marker">*</span>
     

</label></div><div class="content"><input name="birth_date" class="form-text required" id="birth_date" type="text" format="dd/mm/yy" endoffset="0" startoffset="100" formattype="birth"><input name="birth_date_display" class="dateplugin" id="birth_date_display" type="text" autocomplete="off"><span class="crm-clear-link">(<a onclick="clearDateTime( 'birth_date' ); return false;" href="#">clear</a>)</span>
</div><div class="clear"></div></div><div class="crm-section editrow_address_name-1-section form-item" id="editrow-address_name-1"><div class="label"><label for="address_name-1">  Morada<span style="color:#990000" title="This field is required." class="crm-marker">*</span>
     

</label></div><div class="content"><input name="address_name-1" class="form-text huge required" id="address_name-1" type="text" size="45" maxLength="255"></div><div class="clear"></div></div><div class="crm-section editrow_postal_code-Primary-section form-item" id="editrow-postal_code-Primary"><div class="label"><label for="postal_code-Primary"> Código Postal<span style="color:#990000" title="This field is required." class="crm-marker">*</span>
     

</label></div><div class="edit-value content"><input name="postal_code-Primary" class="form-text twelve required" id="postal_code-Primary" type="text" size="12" maxLength="12"></div><div class="clear"></div></div> 

<div class="crm-section editrow_postal_code_suffix-Primary-section form-item" id="editrow-postal_code_suffix-Primary"><div class="label"><label for="postal_code_suffix-Primary"> Sufixo do Código Postal<span style="color:#990000" title="This field is required." class="crm-marker">*</span>
     

</label></div><div class="edit-value content"><input name="postal_code_suffix-Primary" class="form-text twelve required" id="postal_code_suffix-Primary" type="text" size="12" maxLength="12"></div><div class="clear"></div></div><div class="crm-section editrow_phone-Primary-1-section form-item" id="editrow-phone-Primary-1"><div class="label"><label for="phone-Primary-1">Telefone</label></div><div class="content"><input name="phone-Primary-1" class="form-text medium" id="phone-Primary-1" type="text" size="20" maxLength="32"></div><div class="clear"></div></div><div class="crm-section editrow_custom_3-section form-item" id="editrow-custom_3"><div class="label"><label for="custom_3">  NIF<span style="color:#990000" title="This field is required." class="crm-marker">*</span>
     

</label></div><div class="content"><input name="custom_3" class="form-text required" id="custom_3" type="text" data-crm-custom="NIF:NIF"></div><div class="clear"></div></div><div class="crm-section editrow_custom_13-section form-item" id="editrow-custom_13"><div class="label"><label for="custom_13">Observações</label></div><div class="content"><textarea name="custom_13" class="form-textarea" id="custom_13" rows="4" cols="60" data-crm-custom="Colabora_o_volunt_rio:Colabora_o_Volunt_rio"></textarea></div><div class="clear"></div></div></fieldset>

 


  </div>

  
  
  
  <div id="billing-payment-block">
          </div>
  


  <div class="crm-group custom_post_profile-group">
   


  </div>

    <div class="crm-submit-buttons" id="crm-submit-buttons">
  
        <span class="crm-button crm-button-type-upload crm-button_qf_Main_upload"><input name="_qf_Main_upload" class="validate form-submit default" id="_qf_Main_upload-bottom" type="submit" value="Confirm Contribution"></span>
      </div>
  </div>
</form>
</div> 
</div>
</div>
 </div>-->
