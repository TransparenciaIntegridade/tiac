<?php
$nome_servidor = $_SERVER['SERVER_NAME'];
   if(isset($_POST['_qf_Main_upload'])){
      
     $data_recebimento = date("Y-m-d H:i:s");

      global $wpdb;
       
      $user_id = get_current_user_id();
      $external_id = $wpdb->get_row("SELECT external_identifier FROM wp_users WHERE id='$user_id'");

      $contact_id = $wpdb->get_row("SELECT id FROM civicrm_contact WHERE external_identifier='$external_id->external_identifier'");
      $wpdb->query("INSERT INTO civicrm_contribution (contact_id,financial_type_id,contribution_page_id,receive_date,total_amount,currency,source,contribution_status_id) VALUES ('$contact_id->id','2','9','$data_recebimento','10.00','EUR','Pagamento de Quotas','2')");
     
echo "<script>";
    $url ="https://transparencia.pt/pagamentos-multibanco-quota";
    echo "location.href='$url'";
echo "</script>";

     // header("Location:https://".$nome_servidor."/pagamentos-multibanco-quota");
    }
?>
<script src='https://www.google.com/recaptcha/api.js?hl=pt'></script>

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



  

  
  
    <div class="crm-contribution-page-id-9 crm-block crm-contribution-main-form-block">
  <div id="intro_text" class="crm-section intro_text-section">
    <p style="padding: 0px; border: 0px; font-family: Roboto, Verdana, Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; vertical-align: baseline; color: rgb(30, 30, 30); margin: 0px !important;"><img alt="" src="https://transparencia.pt/wp-content/themes/wpbootstrap/assets/img/logoc.png" style="width: 200px; height: 62px;"></p>

<p style="padding: 0px; border: 0px; font-family: Roboto, Verdana, Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; vertical-align: baseline; color: rgb(30, 30, 30); margin: 0px !important;">&nbsp;</p>

<p style="padding: 0px; border: 0px; font-family: Roboto, Verdana, Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; vertical-align: baseline; color: rgb(30, 30, 30); margin: 0px !important;"><span style="line-height: 1.2em; background-color: transparent; color: rgb(21, 87, 134); font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 25px; text-align: right; text-transform: uppercase;">PAGUE A SUA QUOTA</span></p>

<p style="padding: 0px; border: 0px; font-family: Roboto, Verdana, Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; vertical-align: baseline; color: rgb(30, 30, 30); margin: 0px !important;"><span style="line-height: 1.2em; color: black; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 23px; text-align: right;">O combate contra a corrupção é uma luta desigual.</span></p>

<p style="padding: 0px; border: 0px; font-family: Roboto, Verdana, Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; vertical-align: baseline; color: rgb(30, 30, 30); margin: 0px !important;"><span style="line-height: 1.2em; color: black; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 23px; text-align: right;">Todos os contributos são preciosos&nbsp;</span><span style="line-height: 1.2em; color: black; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 23px; text-align: right;">para financiar o nosso trabalho de&nbsp;</span><span style="line-height: 1.2em; color: black; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 23px; text-align: right;">estudo, sensibilização e pressão&nbsp;</span><span style="line-height: 1.2em; color: black; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 23px; text-align: right;">pública.</span></p>

<p style="padding: 0px; border: 0px; font-family: Roboto, Verdana, Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; vertical-align: baseline; color: rgb(30, 30, 30); margin: 0px !important;">&nbsp;</p>
  </div>
    
    
  
  
      

</div>
    

  
  
      

  
  <div class="crm-group custom_pre_profile-group">
   <div class="g-recaptcha" data-theme="dark" data-sitekey="6LcKdwUTAAAAALbhMtNKePbMnaRFNXDtxVMy4lRz"></div>
    


  
  <span class="crm-button crm-button-type-upload crm-button_qf_Main_upload"><input class="validate form-submit default" name="_qf_Main_upload" value="Confirmar a Contribuição" type="submit" id="_qf_Main_upload-bottom"></span>
      </div>
 


  </div>

  
  
  
  <div id="billing-payment-block">
          </div>

  </div>

  
   
  </div>

</form>



</div>

