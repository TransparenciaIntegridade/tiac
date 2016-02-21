<?php

require_once 'swiftmailer/lib/swift_required.php';
global $wpdb;
//$Ext_id_tabela_membership = $wpdb->get_var("SELECT external_identifier  FROM civicrm_membership WHERE contact_id = '2' AND status_id='4' ");
 


//----------------------------------------------------CHECK DIGITS---------------------------------------------------------------------

//INICIO TRATAMENTO DEFINIÇÕES REGIONAIS
  function format_number($number) 
  { 
   

//$Ext_id_tabela_membership = $wpdb->get_var("SELECT external_identifier  FROM civicrm_membership WHERE contact_id = '2' AND status_id='4' ");



    $verifySepDecimal = number_format(99,2);
  
    $valorTmp = $number;
  
    $sepDecimal = substr($verifySepDecimal, 2, 1);
  
    $hasSepDecimal = True;
  
    $i=(strlen($valorTmp)-1);
  
    for($i;$i!=0;$i-=1)
    {
      if(substr($valorTmp,$i,1)=="." || substr($valorTmp,$i,1)==","){
        $hasSepDecimal = True;
        $valorTmp = trim(substr($valorTmp,0,$i))."@".trim(substr($valorTmp,1+$i));
        break;
      }
    }
  
    if($hasSepDecimal!=True){
      $valorTmp=number_format($valorTmp,2);
    
      $i=(strlen($valorTmp)-1);
    
      for($i;$i!=1;$i--)
      {
        if(substr($valorTmp,$i,1)=="." || substr($valorTmp,$i,1)==","){
          $hasSepDecimal = True;
          $valorTmp = trim(substr($valorTmp,0,$i))."@".trim(substr($valorTmp,1+$i));
          break;
        }
      }
    }
  
    for($i=1;$i!=(strlen($valorTmp)-1);$i++)
    {
      if(substr($valorTmp,$i,1)=="." || substr($valorTmp,$i,1)=="," || substr($valorTmp,$i,1)==" "){
        $valorTmp = trim(substr($valorTmp,0,$i)).trim(substr($valorTmp,1+$i));
        break;
      }
    }
  
    if (strlen(strstr($valorTmp,'@'))>0){
      $valorTmp = trim(substr($valorTmp,0,strpos($valorTmp,'@'))).trim($sepDecimal).trim(substr($valorTmp,strpos($valorTmp,'@')+1));
    }
    
    return $valorTmp; 
  } 
//FIM TRATAMENTO DEFINIÇÕES REGIONAIS


//INICIO REF MULTIBANCO
  function GenerateMbRef($ent_id, $subent_id, $order_id, $order_value)
  {
    $chk_val = 0;
    
    $order_id ="0000".$order_id;
    
    if(strlen($ent_id)<5)
    {
      echo "Lamentamos mas tem de indicar uma entidade válida";
      return;
    }else if(strlen($ent_id)>5){
      echo "Lamentamos mas tem de indicar uma entidade válida";
      return;
    }if(strlen($subent_id)==0){
      echo "Lamentamos mas tem de indicar uma subentidade válida";
      return;
    }
    
    $order_value= sprintf("%01.2f", $order_value);
    
    $order_value =  format_number($order_value);

    if ($order_value < 1){
      echo "Lamentamos mas é impossível gerar uma referência MB para valores inferiores a 1 Euro";
       header("Location:https://transparencia.pt");
      return;
    }
    if ($order_value >= 1000000){
      echo "<b>AVISO:</b> Pagamento fraccionado por exceder o valor limite para pagamentos no sistema Multibanco<br>";
    }
    
    if(strlen($subent_id)==1){
      //Apenas sao considerados os 6 caracteres mais a direita do order_id
      $order_id = substr($order_id, (strlen($order_id) - 6), strlen($order_id));
      $chk_str = sprintf('%05u%01u%06u%08u', $ent_id, $subent_id, $order_id, round($order_value*100));
    }else if(strlen($subent_id)==2){
      //Apenas sao considerados os 5 caracteres mais a direita do order_id
      $order_id = substr($order_id, (strlen($order_id) - 5), strlen($order_id));
      $chk_str = sprintf('%05u%02u%05u%08u', $ent_id, $subent_id, $order_id, round($order_value*100));
    }else {
      //Apenas sao considerados os 4 caracteres mais a direita do order_id
      $order_id = substr($order_id, (strlen($order_id) - 4), strlen($order_id));
      $chk_str = sprintf('%05u%03u%04u%08u', $ent_id, $subent_id, $order_id, round($order_value*100));
    }
      
    //cálculo dos check digits

    $chk_array = array(3, 30, 9, 90, 27, 76, 81, 34, 49, 5, 50, 15, 53, 45, 62, 38, 89, 17, 73, 51);
    
    for ($i = 0; $i < 20; $i++)
    {
      $chk_int = substr($chk_str, 19-$i, 1);
      $chk_val += ($chk_int%10)*$chk_array[$i];
    }
    
    $chk_val %= 97;
    
    $chk_digits = sprintf('%02u', 98-$chk_val);
    
    echo"<body style='font-size: 11pt; margin-top:300px;'>";
    echo "<div class='container' align='center'>";
    echo"<table cellpadding='3' width='400px' cellspacing='0' style='margin-top: 10px;border: 1px solid #45829F; background-color: #fff;'>";
    echo"<tr>";
    echo"<td style='font-size: x-small; border-bottom: 1px solid #45829F; background-color: #45829F; color: White; padding: 5px;'  colspan='3'>Pagamento por Multibanco ou Homebanking</td>";
    echo" </tr>";
    echo"<tr>";
    echo"<td rowspan='3'><img src='/wp-content/themes/wpbootstrap/assets/img/logoMB.jpg' alt='' /></td>";
    echo"<td style='font-size: x-small; font-weight:bold; text-align:left'>Entidade: ".$ent_id;"</td>";
    echo"<td style='font-size: x-small; text-align:left'><span id='Entidade'/></td>";
    echo"</tr>";
    echo" <tr>";
    echo"<td style='font-size: x-small; font-weight:bold; text-align:left'>Refer&ecirc;ncia: ".substr($chk_str, 5, 3)." ".substr($chk_str, 8, 3)." ".substr($chk_str, 11, 1).$chk_digits;"</td>";
    echo"<td style='font-size: x-small; text-align:left'><span id='Ref' /></td>";
    echo"</tr>";
    echo "<tr>";
    echo "<td style='font-size: x-small; font-weight:bold; text-align:left'>Valor: &euro;&nbsp;".number_format($order_value, 2,',', ' ');"</td>";
    echo "<td style='font-size: x-small; text-align:left'><span id='Valor' /></td>";
    echo "</tr>";
    echo"<tr>";
    echo"<td style='font-size: xx-small;border-top: 1px solid #45829F; background-color: #45829F; color: White; padding: 5px;' colspan='3'>O tal&atilde;o emitido pela caixa autom&aacute;tica faz prova de pagamento. Conserve-o.</td>";
    echo"</tr>";
    echo"</table>";
    echo"</div>";
    echo"</body>";

   // echo "11802" . "397" .$Ext_id_tabela_membership .$chk_digits . "</p>";
  }




$ano_mais_antigo =  $wpdb->get_row("SELECT MIN(receive_date),contribution_status_id FROM civicrm_contribution WHERE contact_id = '2' AND contribution_page_id ='9' AND contribution_status_id = '2'",ARRAY_A);
$id_contatos = $wpdb->get_row("SELECT id FROM civicrm_contact WHERE external_identifier = '{$external_id->external_identifier}'");
$ano_atual= date("Y");
$quotas_2013 = $wpdb->get_row("SELECT receive_date,contribution_status_id FROM civicrm_contribution WHERE contact_id = '2' AND contribution_page_id='9' AND receive_date LIKE '%2013%' ORDER BY receive_date DESC",ARRAY_A);
$quotas_2014 = $wpdb->get_row("SELECT receive_date,contribution_status_id FROM civicrm_contribution WHERE contact_id = '2' AND contribution_page_id='9' AND receive_date LIKE '%2014%' ORDER BY receive_date DESC",ARRAY_A);
$quotas_2015 = $wpdb->get_row("SELECT receive_date,contribution_status_id FROM civicrm_contribution WHERE contact_id = '2' AND contribution_page_id='9' AND receive_date LIKE '%2015%' ORDER BY receive_date DESC",ARRAY_A);
$quotas_atuais = $wpdb->get_row("SELECT receive_date,contribution_status_id FROM civicrm_contribution WHERE contact_id = '2' AND contribution_page_id='9' AND receive_date LIKE '%{$ano_atual}%' ORDER BY receive_date DESC",ARRAY_A);

$contribution_status_id_2013 = $quotas_2013['contribution_status_id'];
$datas_pagamento_2013 = explode("-",$quotas_2013['receive_date']);
$datas_pagamento_2013 = $datas_pagamento_2013[0];

$contribution_status_id_2014 = $quotas_2014['contribution_status_id'];
$datas_pagamento_2014 = explode("-",$quotas_2014['receive_date']);
$datas_pagamento_2014 = $datas_pagamento_2014[0];

$contribution_status_id_2015 = $quotas_2015['contribution_status_id'];
$datas_pagamento_2015 = explode("-",$quotas_2015['receive_date']);
$datas_pagamento_2015 = $datas_pagamento_2015[0];

$contribution_status_id_quotas_atuais = $quotas_atuais['contribution_status_id'];
$datas_pagamento_quotas_atuais = explode("-",$quotas_atuais['receive_date']);
$datas_pagamento_quotas_atuais = $datas_pagamento_quotas_atuais[0]; 

echo "<div style='color:black;text-align:center'><h1>HISTÓRICO DE QUOTAS<sup>*</sup></h1></div>"; 
   
if($contribution_status_id_2013 != 1 && $datas_pagamento_2013 == "2013"){
      echo "<div style='color:red;text-align:center'>Quota não regularizada de " . $datas_pagamento_2013 . "</div>";
      }

if($contribution_status_id_2014 != 1 && $datas_pagamento_2014 == "2014"){
      echo "<div style='color:red;text-align:center'>Quota não regularizada de " . $datas_pagamento_2014 . "</div>";
      }

if($contribution_status_id_2015 != 1 && $datas_pagamento_2015 == "2015"){
      echo "<div style='color:red;text-align:center'>Quota não regularizada de " . $datas_pagamento_2015 . "</div>";
      }
 echo "<br>";

echo "<div style='color:green;text-align:center'>Pode regularizar a(s) quota(s) acima indicada(s) com os seguintes dados:</div>"; 


for ($i=0;$i<=4;$i++){
$Ext_id_tabela_membership = $wpdb->get_var("SELECT external_identifier  FROM civicrm_membership WHERE contact_id = '{$i}' AND status_id='4' ");


if($Ext_id_tabela_membership != ''){

GenerateMbRef("11802","397",$Ext_id_tabela_membership,10);
GenerateMbRef("11802","397",$Ext_id_tabela_membership,12);

if ($Ext_id_tabela_membership  !='')


{

echo "<p>" .$nome . " " .$apelido . " " .$email . "</p>";
echo "string";







// Create a message


// Send the message
$recipients = [$email1];
foreach ($recipients as $recipient) {
  try{
$ano_mais_antigo =  $wpdb->get_row("SELECT MIN(receive_date),contribution_status_id FROM civicrm_contribution WHERE contact_id = '2' AND contribution_page_id ='9' AND contribution_status_id = '2'",ARRAY_A);
$id_contatos = $wpdb->get_row("SELECT id FROM civicrm_contact WHERE external_identifier = '{$external_id->external_identifier}'");
$ano_atual= date("Y");
$quotas_2013 = $wpdb->get_row("SELECT receive_date,contribution_status_id FROM civicrm_contribution WHERE contact_id = '2' AND contribution_page_id='9' AND receive_date LIKE '%2013%' ORDER BY receive_date DESC",ARRAY_A);
$quotas_2014 = $wpdb->get_row("SELECT receive_date,contribution_status_id FROM civicrm_contribution WHERE contact_id = '2' AND contribution_page_id='9' AND receive_date LIKE '%2014%' ORDER BY receive_date DESC",ARRAY_A);
$quotas_2015 = $wpdb->get_row("SELECT receive_date,contribution_status_id FROM civicrm_contribution WHERE contact_id = '2' AND contribution_page_id='9' AND receive_date LIKE '%2015%' ORDER BY receive_date DESC",ARRAY_A);
$quotas_atuais = $wpdb->get_row("SELECT receive_date,contribution_status_id FROM civicrm_contribution WHERE contact_id = '2' AND contribution_page_id='9' AND receive_date LIKE '%{$ano_atual}%' ORDER BY receive_date DESC",ARRAY_A);

$contribution_status_id_2013 = $quotas_2013['contribution_status_id'];
$datas_pagamento_2013 = explode("-",$quotas_2013['receive_date']);
$datas_pagamento_2013 = $datas_pagamento_2013[0];

$contribution_status_id_2014 = $quotas_2014['contribution_status_id'];
$datas_pagamento_2014 = explode("-",$quotas_2014['receive_date']);
$datas_pagamento_2014 = $datas_pagamento_2014[0];

$contribution_status_id_2015 = $quotas_2015['contribution_status_id'];
$datas_pagamento_2015 = explode("-",$quotas_2015['receive_date']);
$datas_pagamento_2015 = $datas_pagamento_2015[0];

$contribution_status_id_quotas_atuais = $quotas_atuais['contribution_status_id'];
$datas_pagamento_quotas_atuais = explode("-",$quotas_atuais['receive_date']);
$datas_pagamento_quotas_atuais = $datas_pagamento_quotas_atuais[0]; 



if($contribution_status_id_2013 != 1 && $datas_pagamento_2013 == "2013"){
      
      $cota2013_falta= "Quota não regularizada de ".$datas_pagamento_2013;
      }else{

      $cota2013_paga= "<div>Quota não regularizada de</div>";

      }


      if($contribution_status_id_2014 != 1 && $datas_pagamento_2014 == "2014"){
      
      $cota2014_falta= "Quota não regularizada de ".$datas_pagamento_2014;
      }else{

      $cota2014_paga= "<div>Quota não regularizada de</div>";

      }


if($contribution_status_id_2015 != 1 && $datas_pagamento_2015 == "2015"){
      
      $cota2015_falta= "Quota não regularizada de ".$datas_pagamento_2015;
      }else{

      $cota2015_paga= "<div>Quota não regularizada de</div>";

      }

      if($contribution_status_id_quotas_atuais != 1 && $datas_pagamento_quotas_atuais == $datas_pagamento_quotas_atuais){
      $wpdb->query("INSERT INTO wp_users (external_identifier) VALUES('$numero_associado') ");
        $cota2016_falta= "Quota não regularizada de ".$ano_atual;
      }else{

      $cota2016_paga= "<div>Quota não regularizada de</div>";
}


    $message = Swift_Message::newInstance('Quota(s) TIAC por regularizar')
  ->setFrom(array('secretariado@transparencia.pt' => 'TIAC'))
  ->setBody( '<p><img alt="" src="https://transparencia.pt/wp-content/themes/twentyfourteen/assets/img/logoc.png" style="width: 200px; height: 62px;" /></p>

<p>&nbsp;</p>

<p><span style="line-height: 1.6em;">Caro/a </span><b style="font-size:1.2em;"> '.$nome. " " .$apelido. '</b></p>

<div>

<p style="text-align:center;" onclick="showHide();>HISTÓRICO DE QUOTAS</p>

<div style="color:red;text-align:center"> '.$cota2013_falta.' </div>

<div style="color:red;text-align:center"> '.$cota2015_falta.' </div>
<div style="color:red;text-align:center"> '.$cota2016_falta.' </div>

<div class="container" align="center">


<p>Os registos da Transparência e Integridade, Associação Cívica indicam que está ainda por saldar o pagamento de montantes relativos à sua <b>quota anual como membro da TIAC, já expirada</b> e cujos detalhes poderá encontrar no seu perfil reservado, acessível no nosso site.</p>

<p>&nbsp;</p>

<p>O pagamento da quota anual é um dever previsto nos estatutos e está associado a regalias fundamentais, como a participação nas assembleias gerais da associação e o direito a eleger e ser eleito para os corpos sociais da TIAC.</p>

<p>&nbsp;</p>



<p>O valor simbólico que pedimos anualmente aos nossos associados é a única garantia da nossa independência e solidez e um contributo vital para podermos continuar o nosso trabalho comum. Por favor regularize a sua quota e ajude-nos a construir uma sociedade mais justa, livre de corrupção. </p>

<p><span style="line-height: 1.6em;">Fa&ccedil;a hoje o seu pagamento:</span></p>

<p>&nbsp;</p>


<p><strong>Atrav&eacute;s do site da TIAC</strong></p>

<p>1- Fa&ccedil;a a autenticação no canto superior esquerdo do nosso site(iniciar sessão): <a href="//transparencia.pt/">www.transparencia.pt</a></p>

<ul>
  <li>Utilize o&nbsp;seu nome de utilizador: &nbsp;<b>'.$email.'</b></li>
  <li>E a palavra-passe que defeniu na altura do seu&nbsp;&nbsp;registo.</li>
</ul>

<p><img alt="Tutorial Parte 1 photo tutorial1_zpsnzczd9jw.png" src="http://i1083.photobucket.com/albums/j391/firestruck73/tutorial1_zpsnzczd9jw.png" style="border-width: 0px; border-style: solid; height: 116px; width: 200px;" /></p>

<p>&nbsp;</p>

<ul>
  <li>Caso n&atilde;o se recorde da sua password, clique em <a href="//transparencia.pt/wp-login.php?action=lostpassword">recuperar senha</a>. Ser&aacute; aberta uma p&aacute;gina onde deve inserir o seu endere&ccedil;o de correio eletr&oacute;nico ({contact.email}) para poder defenir a sua nova palavra-passe.</li>
</ul>

<p>​<img alt="Tutorial Parte 2 photo tutorial6_zpssrls05yq.png" src="http://i1083.photobucket.com/albums/j391/firestruck73/tutorial6_zpssrls05yq.png" style="border-width: 0px; border-style: solid; height: 141px; width: 200px;" /></p>

<p><img alt="Tutorial Parte 3 photo tutorial7_zpsalryvdfb.png" src="http://i1083.photobucket.com/albums/j391/firestruck73/tutorial7_zpsalryvdfb.png" style="color: rgb(51, 51, 51); line-height: 1.6em; opacity: 0.9; border-width: 0px; border-style: solid; height: 135px; width: 200px;" /></p>

<p>&nbsp;</p>

<p>2- Uma fez feito o login, clique em Pagar Quota e escolha o seu meio de pagamento (Multibanco, Paypal ou Google Wallet) e siga as instru&ccedil;&otilde;es de pagamento.</p>

<p><img alt="Tutorial Parte 4 photo tutorial2_zpstxp7smvc.png" src="http://i1083.photobucket.com/albums/j391/firestruck73/tutorial2_zpstxp7smvc.png" style="border-width: 0px; border-style: solid; height: 166px; width: 200px;" /></p>

<p><img alt="Tutorial Parte 6 photo Tutorial3_1_zpsir1mrcut.png" src="http://i1083.photobucket.com/albums/j391/firestruck73/Tutorial3_1_zpsir1mrcut.png" style="border-width: 0px; border-style: solid; height: 96px; width: 200px;" /></p>

<p><strong>Por transfer&ecirc;ncia banc&aacute;ria</strong></p>

<p>1- Fa&ccedil;a a sua transfer&ecirc;ncia para a conta banc&aacute;ria da TIAC</p>

<p>NIB&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 001800032413021302044</p>

<p>&nbsp;</p>

<p>Para pagamentos do estrangeiro:</p>

<p>IBAN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PT50 0018 000324130213020 44</p>

<p>BIC / SWIFT&nbsp; &nbsp;&nbsp; TOTAPTPL</p>

<p>&nbsp;</p>

<p>No descritivo da opera&ccedil;&atilde;o, escreva &ldquo;quota&rdquo; seguido do ano a que se refere o pagamento e do seu nome ou n&uacute;mero de associado</p>

<p>&nbsp;</p>

<p>2- Envie-nos o comprovativo por email para <a href="mailto:secretariado@transparencia.pt">secretariado@transparencia.pt</a>. Note que s&oacute; podemos dar o pagamento por efetuado depois de recebido o comprovativo correspondente.</p>

<p>&nbsp;</p>
<p>Pagamento por Multibanco:</p>
<div class="col-md-6">
<table cellpadding="3 width="400px" cellspacing="0" style="margin-top: 10px;border: 1px solid #45829F; background-color: #fff;">
<tr>
<td style="font-size: x-small; border-bottom: 1px solid #45829F; background-color: #45829F; color: White; padding: 5px;"  colspan="3">Pagamento por Multibanco ou Homebanking</td>
</tr>
<tr>


<td rowspan="3"><img src="/wp-content/themes/twentyfourteen/assets/img/logoMB.jpg"  /></td>
<td style="font-size: x-small; font-weight:bold; text-align:left">Entidade: '.$ent_id.'</td>
<td style="font-size: x-small; text-align:left"><span id="Entidade"/></td>
</tr>
<tr>
<td style="font-size: x-small; font-weight:bold; text-align:left">Refer&ecirc;ncia: '.substr($chk_str, 5, 3)." ".substr($chk_str, 8, 3)." ".substr($chk_str, 11, 1).$chk_digits.'</td>
<td style="font-size: x-small; text-align:left"><span id="Ref" /></td>
</tr>
<tr>
<td style="font-size: x-small; font-weight:bold; text-align:left">Valor: &euro;&nbsp;10</td>
<td style="font-size: x-small; text-align:left"><span id="Valor" /></td>
</tr>
<tr>

<td style="font-size: xx-small;border-top: 1px solid #45829F; background-color: #45829F; color: White; padding: 5px;" colspan="3">O tal&atilde;o emitido pela caixa autom&aacute;tica faz prova de pagamento. Conserve-o.</td>

</tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table cellpadding="3 width="400px" cellspacing="0" style="margin-top: 10px;border: 1px solid #45829F; background-color: #fff;">
<tr>
<td style="font-size: x-small; border-bottom: 1px solid #45829F; background-color: #45829F; color: White; padding: 5px;"  colspan="3">Pagamento por Multibanco ou Homebanking</td>
</tr>
<tr>


<td rowspan="3"><img src="/wp-content/themes/twentyfourteen/assets/img/logoMB.jpg"  /></td>
<td style="font-size: x-small; font-weight:bold; text-align:left">Entidade: '.$ent_id.'</td>
<td style="font-size: x-small; text-align:left"><span id="Entidade"/></td>
</tr>
<tr>
<td style="font-size: x-small; font-weight:bold; text-align:left">Refer&ecirc;ncia: '.substr($chk_str, 5, 3)." ".substr($chk_str, 8, 3)." ".substr($chk_str, 11, 1).$chk_digits.'</td>
<td style="font-size: x-small; text-align:left"><span id="Ref" /></td>
</tr>
<tr>
<td style="font-size: x-small; font-weight:bold; text-align:left">Valor: &euro;&nbsp;12</td>
<td style="font-size: x-small; text-align:left"><span id="Valor" /></td>
</tr>
<tr>

<td style="font-size: xx-small;border-top: 1px solid #45829F; background-color: #45829F; color: White; padding: 5px;" colspan="3">O tal&atilde;o emitido pela caixa autom&aacute;tica faz prova de pagamento. Conserve-o.</td>

</tr>
</table>


<p>Se j&aacute; tiver saldado a sua quota, mas o pagamento n&atilde;o aparecer registado no seu perfil de associado, por favor escreva-nos para o email <a href="mailto:secretariado@transparencia.pt">secretariado@transparencia.pt</a> ou ligue-nos para o telefone 21 752 20 75. Se poss&iacute;vel, envie-nos uma c&oacute;pia do comprovativo de pagamento para podermos atualizar os nossos registos.</p>

<p>&nbsp;</p>

<p>Pagar a sua quota &eacute; simples e f&aacute;cil! Fa&ccedil;a-o hoje e d&ecirc; o seu contributo.</p>

<p>&nbsp;</p>

<p>Obrigado pelo apoio!</p>

<p>&nbsp;</p>
</div>

<div>


</div>

<p><img alt="" src="https://transparencia.pt/wp-content/themes/twentyfourteen/assets/img/logoc.png" style="width: 200px; height: 62px;" /></p>

<p><font color="#2e74b5" face="Calibri, sans-serif" size="3" style="line-height: 20.7999992370605px;"><span style="line-height: 22.7199993133545px;"><b>SECRETARIADO - TIAC</b></span></font><br style="color: rgb(0, 0, 0); font-family: Calibri, sans-serif; font-size: 15px; line-height: 21.2999992370605px;" />
<font face="Calibri, sans-serif" style="color: rgb(0, 0, 0); line-height: normal; font-family: Calibri, sans-serif; font-size: 15px;"><span lang="pt-PT" style="line-height: 21.2999992370605px;">E-Mail:&nbsp;<a href="mailto:secreatriado@transparencia.pt" style="color: rgb(0, 104, 207); line-height: 21.2999992370605px; font-weight: inherit; cursor: default;" target="_blank">secretariado@transparencia.pt</a></span></font><br style="color: rgb(0, 0, 0); font-family: Calibri, sans-serif; font-size: 15px; line-height: 21.2999992370605px;" />
<font face="Calibri, sans-serif" style="color: rgb(0, 0, 0); line-height: normal; font-family: Calibri, sans-serif; font-size: 15px;">Phone: (+351) 21 752 20 75</font></p>

<p><font face="Calibri, sans-serif"><a href="//transparencia.pt/" target="_blank">www.transparencia.pt</a></font></p>



<div>
<hr align="left" size="1" width="33%" />
<div>
<div id="_com_1" uage="JavaScript">
<p>&nbsp;</p>
</div>
</div>
</div>
<style type="text/css">P { margin-bottom: 0.21cm; direction: ltr; color: rgb(0, 0, 0); text-align: left; }P.western { font-family: "Times New Roman",serif; font-size: 12pt; }P.cjk { font-family: "Arial Unicode MS",sans-serif; font-size: 12pt; }P.ctl { font-family: "Arial Unicode MS",sans-serif; font-size: 12pt; }A:link {  }
</style>
<style type="text/css">P { margin-bottom: 0.21cm; direction: ltr; color: rgb(0, 0, 0); text-align: left; }P.western { font-family: "Times New Roman",serif; font-size: 12pt; }P.cjk { font-family: "Arial Unicode MS",sans-serif; font-size: 12pt; }P.ctl { font-family: "Arial Unicode MS",sans-serif; font-size: 12pt; }A:link {  }
</style>
', 'text/html')
  ;
 


    $message->setTo($recipient);
    
    $result = $mailer->send($message);

}


}

}


}
?>