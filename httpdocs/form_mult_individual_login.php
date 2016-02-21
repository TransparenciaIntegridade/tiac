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





 
       
$nome_servidor = $_SERVER['SERVER_NAME'];
   if(isset($_POST['_qf_Main_upload'])){
      $donativo = $_POST['price_9'];
      //$first_name = $_POST['first_name'];
     // $middle_name = $_POST['middle_name'];
    //  $last_name = $_POST['last_name'];
      //$birth_date = $_POST['birth_date'];
     // $data = date("Y-m-d", strtotime($birth_date));
     // $email = $_POST['email'];
     // $morada = $_POST['street_address'];
    //  $sufixo = $_POST['postal_code_suffix'];
      //$cod_postal = $_POST['postal_code'];
    //  $telefone = $_POST['phone'];
     // $nif = $_POST['nif_3'];
     // $observacoes = $_POST['colabora_o_volunt_rio_13'];
     // $data_recebimento = date("Y-m-d H:i:s");


       function mostrar_erros($erros){
        $output = array();
        foreach ($erros as $erro) {
        $output[] = "<li class='icon-remove'> " . $erro . "</li><br/>";
        }
        return "<div class='alert alert-error'>  <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <ul>" . implode("",$output) . "</ul></div>";
      }

   if(empty($donativo) {
        $erros[] = "Os campos assinalados com * são de preenchimento obrigatório";

      }

   if(empty($donativo) {
        $erros[] = "Os campos assinalados com * são de preenchimento obrigatório";

      }
     
global $wpdb;
$contacto_existente= $wpdb->get_row("SELECT entity_id FROM  civicrm_value_nif_3  WHERE nif_3='$nif'");

//em Caso de Erros:
if(empty($erros) == false){
        echo mostrar_erros($erros);
     }

else{

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
    header("Location:https://".$nome_servidor."/?page_id=3261&valor=".$donativo."&id=".$contacto_existente->entity_id);

}
 
  

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
            
                
                <div class="label"><label for="price_9">  Donativo
     <span class="crm-marker" title="Este campo é obrigatório.">*</span>

</label></div>
                <div class="content other_amount-content">
                  <input type="radio" name="price_9" value="10" class="don">10€<br>
                  <input type="radio" name="price_9" value="20" class="don">20€<br>                 
                   <input type="radio" name="price_9" value="50" class="don">50€<br>
                  <input price="[11,&quot;1||&quot;]" size="4" name="price_9" type="text" id="price" class="form-text four required">
                                                        </div>
                <div class="clear"></div>

                        </div>
            
    

</div>
  </div>
  
  
        

  
  
      

  
  

  
  
  
  <div id="billing-payment-block">
          </div>

  </div>

  
    <div id="crm-submit-buttons" class="crm-submit-buttons">
  
                                                                                  <span class="crm-button crm-button-type-upload crm-button_qf_Main_upload"><input class="validate form-submit default" name="_qf_Main_upload" value="Confirmar a Contribuição" type="submit" id="_qf_Main_upload-bottom"></span>
      </div>
  </div>

</form>



</div>

