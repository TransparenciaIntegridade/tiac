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
<?php
$nome_servidor = $_SERVER['SERVER_NAME'];
   if(isset($_POST['_qf_Main_upload'])){
      $donativo = $_POST['price_9'];
      $first_name = $_POST['first_name'];
      $email = $_POST['email'];
      $morada = $_POST['street_address'];
      $telefone = $_POST['phone'];
      $nif = $_POST['nif_3'];
      $observacoes = $_POST['colabora_o_volunt_rio_13'];
      $data_recebimento = date("Y-m-d H:i:s");

      global $wpdb;

      function mostrar_erros($erros){
        $output = array();
        foreach ($erros as $erro) {
        $output[] = "<li class='icon-remove'> " . $erro . "</li><br/>";
        }
        return "<div class='alert alert-error'>  <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <ul>" . implode("",$output) . "</ul></div>";
      }

      if(empty($donativo) || empty($email) || empty($first_name) || empty($morada) || empty($nif)){
        $erros[] = "Os campos assinalados com * são de preenchimento obrigatório";

      }if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $erros[] = "O email escolhido não é válido";

      }if(strlen($nif) != 9){
        $erros[] = "O número de contribuinte deve conter nove dígitos";
      }

      $wpdb->get_row("SELECT email FROM civicrm_email WHERE email ='$email'");
      $email_existe = $wpdb->num_rows;
      $id_atualizar = $wpdb->get_row("SELECT contact_id FROM civicrm_email WHERE email = '$email'");
      
      if(empty($erros) === false){
        echo mostrar_erros($erros);
     }else if($email_existe == 1) {
      echo "erro";
       $wpdb->query("UPDATE civicrm_contact  SET contact_type = 'Individual',sort_name = '$first_name',display_name
       = '$first_name',first_name = '$first_name', email_greeting_id = '1',
       email_greeting_display = CONCAT('Dear','$first_name') WHERE id = '$id_atualizar->contact_id'"); 
       $wpdb->query("UPDATE civicrm_email SET email = '$email', is_primary = '1', is_billing = '1' WHERE contact_id = '$id_atualizar->contact_id'");
       $wpdb->query("UPDATE civicrm_address SET is_primary = '1', is_billing = '1', name = '$morada' WHERE contact_id = '$id_atualizar->contact_id'");
       $wpdb->query("UPDATE civicrm_phone SET location_type_id = '1', is_primary = '1', is_billing = '1', phone = '$telefone' WHERE contact_id = '$id_atualizar->contact_id'");
       $wpdb->query("UPDATE civicrm_value_nif_3 SET nif_3 = '$nif' WHERE entity_id = '$id_atualizar->contact_id'");
       $wpdb->query("UPDATE civicrm_value_colabora_o_volunt_rio_13 SET colabora_o_volunt_rio_13 = '$observacoes' WHERE entity_id = '$id_atualizar->contact_id'");
       $wpdb->query("UPDATE civicrm_contribution  SET financial_type_id = '2', contribution_page_id = '6', receive_date = '$data_recebimento', total_amount = '$donativo', currency = 'EUR', source = 'Contribuição Online: Doações Empresa', contribution_status_id = '2' WHERE contact_id = '$id_atualizar->contact_id'");
       $wpdb->query("UPDATE civicrm_group_contact SET group_id = '45', status = 'Added' WHERE contact_id = '$id_atualizar->contact_id'");
       header("Location:http://".$nome_servidor."/?page_id=3261&valor=".$donativo."&id=".$id_atualizar->contact_id);
     }else{
       $wpdb->query("INSERT INTO civicrm_contact (contact_type,sort_name,display_name,first_name,email_greeting_id,email_greeting_display)
       VALUES ('Individual','$first_name','$first_name','$first_name','1',CONCAT('Dear','$first_name'))");
        $id = mysql_insert_id();
        $wpdb->query("INSERT INTO civicrm_email (contact_id,email,is_primary,is_billing) VALUES ('$id','$email','1','1')");
        $wpdb->query("INSERT INTO civicrm_address (contact_id,is_primary,is_billing,postal_code_suffix,postal_code,name) VALUES ('$id','1','1','$sufixo','$cod_postal','$morada')");
        $wpdb->query("INSERT INTO civicrm_phone (contact_id,location_type_id,is_primary,is_billing,phone) VALUES ('$id','1','1','0','$telefone')");
        $wpdb->query("INSERT INTO civicrm_value_nif_3 (entity_id,nif_3) VALUES ('$id','$nif')");
        $wpdb->query("INSERT INTO civicrm_value_colabora_o_volunt_rio_13 (entity_id,colabora_o_volunt_rio_13) VALUES ('$id','$observacoes')");
        $wpdb->query("INSERT INTO civicrm_contribution (contact_id,financial_type_id,contribution_page_id,receive_date,total_amount,currency,source,contribution_status_id) VALUES ('$id','2','4','$data_recebimento','$donativo','EUR','Contribuição Online: Doações Indivíduo','2')");
        $wpdb->query("INSERT INTO civicrm_group_contact (group_id,contact_id,status) VALUES ('18','$id','Added')");
        header("Location:http://".$nome_servidor."/?page_id=3261&valor=".$donativo."&id=".$id);
     }
   
    /* echo $id;*/
  }
?>


<div id="crm-container" class="crm-container crm-public" lang="pt" xml:lang="pt">













<div class="clear"></div>




<!-- .tpl file invoked: CRM/Contribute/Form/Contribution/Main.tpl. Call via form.tpl if we have a form in the page. -->
    <form action="" method="post" name="Main" id="Main" enctype="multipart/form-data">

  <div><input name="qfKey" type="hidden" value="e9496933bffc58be11dab7c77e3cf599_9087">
<input name="entryURL" type="hidden" value="http://civicrm.tiac.webfactional.com/?page=CiviCRM&amp;amp;q=civicrm/contribute/transact&amp;amp;page_id=1864&amp;amp;page_id=1864">
<input name="priceSetId" type="hidden" value="8">
<input id="selectProduct" name="selectProduct" type="hidden" value="">
<input name="_qf_default" type="hidden" value="Main:upload">
<input name="MAX_FILE_SIZE" type="hidden" value="20971520">
</div>



  

  
  
    <div class="crm-contribution-page-id-4 crm-block crm-contribution-main-form-block">
  <div id="intro_text" class="crm-section intro_text-section">
    <p style="padding: 0px; border: 0px; font-family: Roboto, Verdana, Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; vertical-align: baseline; color: rgb(30, 30, 30); margin: 0px !important;"><img alt="" src="http://civicrm.tiac.webfactional.com/wp-content/plugins/files/civicrm/persist/contribute/images/logoc.png" style="width: 200px; height: 62px;"></p>

<p style="padding: 0px; border: 0px; font-family: Roboto, Verdana, Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; vertical-align: baseline; color: rgb(30, 30, 30); margin: 0px !important;">&nbsp;</p>

<p style="padding: 0px; border: 0px; font-family: Roboto, Verdana, Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; vertical-align: baseline; color: rgb(30, 30, 30); margin: 0px !important;"><span style="line-height: 1.2em; background-color: transparent; color: rgb(21, 87, 134); font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 25px; text-align: right; text-transform: uppercase;">FAZ UM DONATIVO</span></p>

<p style="padding: 0px; border: 0px; font-family: Roboto, Verdana, Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; vertical-align: baseline; color: rgb(30, 30, 30); margin: 0px !important;"><span style="line-height: 1.2em; color: black; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 23px; text-align: right;">O combate contra a corrupção é uma luta desigual.</span></p>

<p style="padding: 0px; border: 0px; font-family: Roboto, Verdana, Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; vertical-align: baseline; color: rgb(30, 30, 30); margin: 0px !important;"><span style="line-height: 1.2em; color: black; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 23px; text-align: right;">Todos os contributos são preciosos&nbsp;</span><span style="line-height: 1.2em; color: black; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 23px; text-align: right;">para financiar o nosso trabalho de&nbsp;</span><span style="line-height: 1.2em; color: black; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 23px; text-align: right;">estudo, sensibilização e pressão&nbsp;</span><span style="line-height: 1.2em; color: black; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 23px; text-align: right;">pública.</span></p>

<p style="padding: 0px; border: 0px; font-family: Roboto, Verdana, Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; vertical-align: baseline; color: rgb(30, 30, 30); margin: 0px !important;">&nbsp;</p>
  </div>
    
    <div id="priceset-div">
  <div id="priceset" class="crm-section price_set-section">
    
                                <div class="crm-section other_amount-section">
            
                
                <div class="label"><label for="price_9">  Donativo
     <span class="crm-marker" title="Este campo é obrigatório.">*</span>

</label></div>
                <div class="content other_amount-content">
                   <input type="radio" name="price_9" class="don" value="10">10€<br>
                  <input type="radio" name="price_9" value="20" class="don">20€<br>                 
                   <input type="radio" name="price_9" value="50" class="don">50€<br>
                <input price="[11,&quot;1||&quot;]" size="4" name="price_9" type="text" id="price" class="form-text four required">
                
                </div>
                <div class="clear"></div>

                        </div>
            
    

</div>
  </div>
  
  
        <div class="crm-section email-5-section">
    <div class="label"><label for="email-5">  Endereço de Email
     <span class="crm-marker" title="Este campo é obrigatório.">*</span>

</label></div>
    <div class="content">
      <input size="30" maxlength="60" class="email required" name="email" type="text" value="" id="email-5">
    </div>
    <div class="clear"></div>
  </div>

  
  
      

  
  <div class="crm-group custom_pre_profile-group">
    <fieldset class="crm-profile crm-profile-id-13 crm-profile-name-Contribui_es_13"><legend>Doação Empresa</legend><div class="crm-section editrow_first_name-section form-item" id="editrow-first_name"><div class="label"><label for="first_name">  Nome da Empresa
     <span class="crm-marker" title="Este campo é obrigatório.">*</span>

</label></div><div class="content"><input maxlength="64" size="30" name="first_name" type="text" value="" id="first_name" class="form-text big required"></div><div class="clear"></div></div>
</label></div>
</div><div class="clear"></div></div><div class="crm-section editrow_address_name-1-section form-item" id="editrow-address_name-1"><div class="label"><label for="address_name">  Morada
</label></div><div class="content"><input maxlength="32" size="20" name="street_address" type="text" value="" id="street_address" class="form-text medium"></div>

</label></div></div><div class="crm-section editrow_phone-Primary-1-section form-item" id="editrow-phone-Primary-1"><div class="label"><label for="phone-Primary-1">Telefone</label></div><div class="content"><input maxlength="32" size="20" name="phone" type="text" value="" id="phone-Primary-1" class="form-text medium"></div><div class="clear"></div></div><div class="crm-section editrow_custom_3-section form-item" id="editrow-custom_3"><div class="label"><label for="custom_3">  NIF
     <span class="crm-marker" title="Este campo é obrigatório.">*</span>

</label></div><div class="content"><input data-crm-custom="NIF:NIF" name="nif_3" type="text" value="" id="custom_3" class="form-text required"></div><div class="clear"></div></div><div class="crm-section editrow_custom_13-section form-item" id="editrow-custom_13"><div class="label"><label for="custom_13">Observações</label></div><div class="content"><div class="resizable-textarea"><span><textarea data-crm-custom="Colabora_o_volunt_rio:Colabora_o_Volunt_rio" rows="4" cols="60" name="colabora_o_volunt_rio_13" id="custom_13" class="form-textarea textarea-processed"></textarea><div class="grippie" style="margin-right: 34px;"></div></span></div></div><div class="clear"></div></div></fieldset>
 <div id="crm-submit-buttons" class="crm-submit-buttons">
  
  <span class="crm-button crm-button-type-upload crm-button_qf_Main_upload"><input class="validate form-submit default" name="_qf_Main_upload" value="Confirmar a Contribuição" type="submit" id="_qf_Main_upload-bottom"></span>
      </div>
 


  </div>

  
  
  
  <div id="billing-payment-block">
          </div>

  </div>

  
   
  </div>

</form>



</div>

