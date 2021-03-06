    							<?php 
    							require_once 'swiftmailer/lib/swift_required.php';
    							global $wpdb;

    							//INICIO TRATAMENTO DEFINIÇÕES REGIONAIS
                             function format_number($number) 
                             { 
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
             function GenerateMbRef($ent_id, $subent_id, $order_id, $order_value,$nome,$apelido,$email,$quotas_2013,$quotas_2014,$quotas_2015,$quotas_atuais)
             {
                 global $wpdb;
                 


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
                 echo"<td rowspan='3'><img src='/wp-content/themes/twentyfourteen/assets/img/logoMB.jpg' alt='' /></td>";
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

    							    // Create the Transport EMAIL
                 $transport = Swift_SmtpTransport::newInstance('smtp.transparencia.pt', 25)
                 ->setUsername('celso.rodrigues@transparencia.pt')
                 ->setPassword('Tiac_2013**');
                 $mailer = Swift_Mailer::newInstance($transport);
                 $mailer->registerPlugin(new Swift_Plugins_ThrottlerPlugin(15, Swift_Plugins_ThrottlerPlugin::MESSAGES_PER_SECOND));
                 $email1="celso.rodrigues@transparencia.pt";

    							// Send the message
                 $recipients = [$email1];
                 foreach ($recipients as $recipient) {
                     try{
                       $ano_atual= date("Y");
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

                     if($contribution_status_id_quotas_atuais != 1 && $datas_pagamento_quotas_atuais == $datas_pagamento_quotas_atuais && $contribution_status_id_2015 == 1){
                         $wpdb->query("INSERT INTO wp_users (external_identifier) VALUES('$numero_associado') ");
                         $cota2016_falta= "Quota não regularizada de ".$ano_atual;
                     }else{

                         $cota2016_paga= "<div>Quota regularizada</div>";
                     }


                     $MsgAtraso = '<p><img alt="" src="https://transparencia.pt/wp-content/themes/twentyfourteen/assets/img/logoc.png" style="width: 200px; height: 62px;" /></p>
                     <p>&nbsp;</p>
                     <div>
                       <p style="text-align:center;"><b>HISTÓRICO DE QUOTAS</b></p>
                       <div style="border-radius: 5px;background: #CCC;height:auto; " align="center">
                           <div style="color:red;text-align:center"> '.$cota2013_falta.' </div>
                           <div style="color:red;text-align:center"> '.$cota2014_falta.' </div>
                           <div style="color:red;text-align:center"> '.$cota2015_falta.' </div>
                           <div style="color:red;text-align:center"> '.$cota2016_falta.' </div>
                       </div>
                       <p><span style="line-height: 1.6em;">Caro/a</span> '.$nome. " " .$apelido. ',</p>
                       <div class="container">
                           <p>Os registos da Transparência e Integridade, Associação Cívica indicam que está ainda por saldar o pagamento de montantes relativos à sua <b>quota anual como membro da TIAC, já expirada</b> e cujos detalhes poderá encontrar no seu perfil reservado, acessível no nosso site.</p>
                           <p>&nbsp;</p>
                           <p>O pagamento da quota anual é um dever previsto nos estatutos e está associado a regalias fundamentais, como a participação nas assembleias gerais da associação e o direito a eleger e ser eleito para os corpos sociais da TIAC.</p>
                           <p>&nbsp;</p>
                           <p>O valor simbólico que pedimos anualmente aos nossos associados é a única garantia da nossa independência e solidez e um contributo vital para podermos continuar o nosso trabalho comum. Por favor regularize a sua quota e ajude-nos a construir uma sociedade mais justa, livre de corrupção. </p>
                           <p><span style="line-height: 1.6em;">Fa&ccedil;a hoje o seu pagamento:</span></p>
                           <p>&nbsp;</p>
                           <p><strong>Atrav&eacute;s do site da TIAC</strong></p>
                           <p>1- Fa&ccedil;a a autenticação no site:<a href="https://transparencia.pt/wp-login.php?">https://transparencia.pt</a></p>
                           <p>Utilize o&nbsp;seu nome de utilizador: &nbsp;<b>'.$email.'</b></p>
                           <p>E a palavra-passe que defeniu na altura do seu&nbsp;&nbsp;registo.</p>
                           <p>&nbsp;</p>
                           <p>Caso n&atilde;o se recorde da sua password, clique em <a href="//transparencia.pt/wp-login.php?action=lostpassword">recuperar senha</a>. Ser&aacute; aberta uma p&aacute;gina onde deve inserir o seu endere&ccedil;o de correio eletr&oacute;nico <b>'.$email.'</b> para poder defenir a sua nova palavra-passe.</p>
                           <p>&nbsp;</p>
                           <p>2- Uma fez feito a autenticação, clique em Pagar Quota e escolha o seu meio de pagamento (Multibanco, Paypal, Google Wallet ou Transferência Bancária) e siga as instru&ccedil;&otilde;es de pagamento.</p>
                           <p style="color:green"><i>Em caso de dúvida siga este tutorial no youtube: <a> link a editar</a></i></p>
                           <p>Caso queira proceder de imediato ao pagamento sem necessidade de autenticação no nosso site, efectue o pagamento por:</p>
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
                           <p><b>Pagamento por Multibanco:<sup>*</sup></b></p>
                           <p>&nbsp;</p>
                           <p>&nbsp;</p>
                           <div align="left">
                               <p style="color:green">Utilize os seguintes dados para efectuar o pagamento, tendo em conta que pode repetir a operação mediante o número de quotas em dívida: </p>
                               <table cellpadding="3 width="400px" cellspacing="0" style="margin-top: 10px;border: 1px solid #45829F; background-color: #fff;">
                                   <tr>
                                       <td style="font-size: x-small; border-bottom: 1px solid #45829F; background-color: #45829F; color: White; padding: 5px;"  colspan="3">Pagamento por Multibanco ou Homebanking</td>
                                   </tr>
                                   <tr>
                                       <td rowspan="3"><img src="https://transparencia.pt/wp-content/themes/twentyfourteen/assets/img/logoMB.jpg"  /></td>
                                       <td style="font-size: x-small; font-weight:bold; text-align:left">Entidade: '.$ent_id.'</td>
                                       <td style="font-size: x-small; text-align:left"><span id="Entidade"/></td>
                                   </tr>
                                   <tr>
                                       <td style="font-size: x-small; font-weight:bold; text-align:left">Refer&ecirc;ncia: '.substr($chk_str, 5, 3)." ".substr($chk_str, 8, 3)." ".substr($chk_str, 11, 1).$chk_digits.'</td>
                                       <td style="font-size: x-small; text-align:left"><span id="Ref" /></td>
                                   </tr>
                                   <tr>
                                       <td style="font-size: x-small; font-weight:bold; text-align:left">Valor: &euro;&nbsp;'.number_format($order_value, 2,',', ' ').'</td>
                                       <td style="font-size: x-small; text-align:left"><span id="Valor" /></td>
                                   </tr>
                                   <tr>
                                       <td style="font-size: xx-small;border-top: 1px solid #45829F; background-color: #45829F; color: White; padding: 5px;" colspan="3">O tal&atilde;o emitido pela caixa autom&aacute;tica faz prova de pagamento. Conserve-o.</td>
                                   </tr>
                               </table>
                               <div align="left">
                                   <p style="font-size:0.8em"><sup>*</sup><i>Não necessita de envio de comprovativo, estes dados de pagamento não tem validade pelo que podem utilizar sempre os mesmos, porém deve consultar o perfil no nosso site transparencia.pt, após efectuar a autenticação (iniciar sessão) e confirmar os pagamentos efectuados.</i></p>
                                   <p>Se j&aacute; tiver saldado a sua quota, mas o pagamento n&atilde;o aparecer registado no seu perfil de associado, por favor escreva-nos para o email <a href="mailto:secretariado@transparencia.pt">secretariado@transparencia.pt</a> ou ligue-nos para o telefone 21 752 20 75. Se poss&iacute;vel, envie-nos uma c&oacute;pia do comprovativo de pagamento para podermos atualizar os nossos registos.</p>
                                   <p>&nbsp;</p>
                                   <p>Pagar a sua quota &eacute; simples e f&aacute;cil! Fa&ccedil;a-o hoje e d&ecirc; o seu contributo.</p>
                                   <p>&nbsp;</p>
                                   <p>Obrigado pelo apoio!</p>
                                   <p>&nbsp;</p>
                               </div>
                               <p><img alt="" src="https://transparencia.pt/wp-content/themes/twentyfourteen/assets/img/logoc.png" style="width: 200px; height: 62px;" /></p>
                               <p><font color="#2e74b5" face="Calibri, sans-serif" size="3" style="line-height: 20.7999992370605px;"><span style="line-height: 22.7199993133545px;"><b>SECRETARIADO - TIAC</b></span></font><br style="color: rgb(0, 0, 0); font-family: Calibri, sans-serif; font-size: 15px; line-height: 21.2999992370605px;" />
                                   <font face="Calibri, sans-serif" style="color: rgb(0, 0, 0); line-height: normal; font-family: Calibri, sans-serif; font-size: 15px;"><span lang="pt-PT" style="line-height: 21.2999992370605px;">E-Mail:&nbsp;<a href="mailto:secreatriado@transparencia.pt" style="color: rgb(0, 104, 207); line-height: 21.2999992370605px; font-weight: inherit; cursor: default;" target="_blank">secretariado@transparencia.pt</a></span></font><br style="color: rgb(0, 0, 0); font-family: Calibri, sans-serif; font-size: 15px; line-height: 21.2999992370605px;" />
                                   <font face="Calibri, sans-serif" style="color: rgb(0, 0, 0); line-height: normal; font-family: Calibri, sans-serif; font-size: 15px;">Phone: (+351) 21 752 20 75</font></p>
                                   <p><font face="Calibri, sans-serif"><a href="https://transparencia.pt/" target="_blank">www.transparencia.pt</a></font></p>';

                                   
                                   if ($ano_atual= date("Y")=="2016"){
                                    $message = Swift_Message::newInstance('Quota(s) TIAC por regularizar')
                                    ->setFrom(array('secretariado@transparencia.pt' => 'TIAC'))
                                    ->setBody($MsgAtraso, 'text/html');
                                    
                                    $message->setTo($recipient);
                                    $result = $mailer->send($message);

                                }else{
                                 $message = Swift_Message::newInstance('Quota(s) TIAC por regularizar')
                                 ->setFrom(array('secretariado@transparencia.pt' => 'TIAC'))
                                 ->setBody($MsgAtual, 'text/html');
                                 $message->setTo($recipient);
                                 $result = $mailer->send($message);
                             }

                         }catch(Swift_TransportException $e){
                           $mailer->getTransport()->stop();
    							        sleep(10); // Just in case ;-)
                           }
                       }
                   }
                   
                   $total_associados = $wpdb->get_var("SELECT COUNT(contact_id) FROM civicrm_membership WHERE external_identifier IS NOT NULL" );
                   for ($i=0;$i<=20;$i++){
                       $Ext_id_tabela_membership = $wpdb->get_var("SELECT external_identifier  FROM civicrm_membership WHERE contact_id = '{$i}' AND status_id='4' ");
                       $nome = $wpdb->get_var("SELECT first_name  FROM civicrm_contact WHERE id = '{$i}'AND external_identifier ='{$Ext_id_tabela_membership}' ");
                       $apelido = $wpdb->get_var("SELECT last_name  FROM civicrm_contact WHERE id = '{$i}' AND external_identifier ='{$Ext_id_tabela_membership}' ");
                       $email = $wpdb->get_var("SELECT email  FROM civicrm_email WHERE contact_id = '{$i}' AND external_identifier ='{$Ext_id_tabela_membership}' ");
                       $quotas_2013 = $wpdb->get_row("SELECT receive_date,contribution_status_id FROM civicrm_contribution WHERE contact_id = {$i} AND contribution_page_id='9' AND receive_date LIKE '%2013%' ORDER BY receive_date DESC",ARRAY_A);
                       $quotas_2014 = $wpdb->get_row("SELECT receive_date,contribution_status_id FROM civicrm_contribution WHERE contact_id = {$i} AND contribution_page_id='9' AND receive_date LIKE '%2014%' ORDER BY receive_date DESC",ARRAY_A);
                       $quotas_2015 = $wpdb->get_row("SELECT receive_date,contribution_status_id FROM civicrm_contribution WHERE contact_id = {$i} AND contribution_page_id='9' AND receive_date LIKE '%2015%' ORDER BY receive_date DESC",ARRAY_A);
                       $quotas_atuais = $wpdb->get_row("SELECT receive_date,contribution_status_id FROM civicrm_contribution WHERE contact_id = {$i} AND contribution_page_id='9' AND receive_date LIKE '%{$ano_atual}%' ORDER BY receive_date DESC",ARRAY_A);
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
                       $cotasEmAtraso2013 = $contribution_status_id_2013 != 1 && $datas_pagamento_2013 == "2013";
                       $cotasEmAtraso2014 = $contribution_status_id_2014 != 1 && $datas_pagamento_2014 == "2014";
                       $cotasEmAtraso2015 = $contribution_status_id_2015 != 1 && $datas_pagamento_2015 == "2015";
                       $cotasEmAtrasoAnoAtual = $contribution_status_id_quotas_atuais != 1 && $datas_pagamento_quotas_atuais == $datas_pagamento_quotas_atuais;

                       if ($Ext_id_tabela_membership != ''){

                           if($cotasEmAtraso2013 ||  $cotasEmAtraso2014 || $cotasEmAtraso2015){

                               GenerateMbRef("11802","397",$Ext_id_tabela_membership,10,$nome,$apelido,$email,$quotas_2013,$quotas_2014,$quotas_2015,$quotas_atuais);
    							 //GenerateMbRef("11802","397",$Ext_id_tabela_membership,12,$nome,$apelido,$email,$quotas_2013,$quotas_2014,$quotas_2015,$quotas_atuais);
                           }else{

                            GenerateMbRef("11802","397",$Ext_id_tabela_membership,12,$nome,$apelido,$email,$quotas_2013,$quotas_2014,$quotas_2015,$quotas_atuais);

                        }
                    }
                }

                ?>