<?php

require_once 'swiftmailer/lib/swift_required.php';
global $wpdb;

//INICIO TRATAMENTO DEFINIÇÕES REGIONAIS
function format_number($number)
{
    $verifySepDecimal = number_format(99, 2);

    $valorTmp = $number;

    $sepDecimal = substr($verifySepDecimal, 2, 1);

    $hasSepDecimal = true;

    $i = (strlen($valorTmp) - 1);

    for ($i; $i != 0; $i -= 1) {
        if (substr($valorTmp, $i, 1) == "." || substr($valorTmp, $i, 1) == ",") {
            $hasSepDecimal = true;
            $valorTmp      = trim(substr($valorTmp, 0, $i)) . "@" . trim(substr($valorTmp, 1 + $i));
            break;
        }
    }

    if ($hasSepDecimal != true) {
        $valorTmp = number_format($valorTmp, 2);

        $i = (strlen($valorTmp) - 1);

        for ($i; $i != 1; $i--) {
            if (substr($valorTmp, $i, 1) == "." || substr($valorTmp, $i, 1) == ",") {
                $hasSepDecimal = true;
                $valorTmp      = trim(substr($valorTmp, 0, $i)) . "@" . trim(substr($valorTmp, 1 + $i));
                break;
            }
        }
    }

    for ($i = 1; $i != (strlen($valorTmp) - 1); $i++) {
        if (substr($valorTmp, $i, 1) == "." || substr($valorTmp, $i, 1) == "," || substr($valorTmp, $i, 1) == " ") {
            $valorTmp = trim(substr($valorTmp, 0, $i)) . trim(substr($valorTmp, 1 + $i));
            break;
        }
    }

    if (strlen(strstr($valorTmp, '@')) > 0) {
        $valorTmp = trim(substr($valorTmp, 0, strpos($valorTmp, '@'))) . trim($sepDecimal) . trim(substr($valorTmp, strpos($valorTmp, '@') + 1));
    }

    return $valorTmp;

}
//FIM TRATAMENTO DEFINIÇÕES REGIONAIS

//INICIO REF MULTIBANCO
function GenerateMbRef($ent_id, $subent_id, $order_id, $order_value, $nome, $apelido, $email, $futureDate, $d, $dias_restantes)
{
    global $wpdb;

    echo $dias_restantes;

    $chk_val = 0;

    $order_id = "0000" . $order_id;

    if (strlen($ent_id) < 5) {
        echo "Lamentamos mas tem de indicar uma entidade válida";
        return;
    } else if (strlen($ent_id) > 5) {
        echo "Lamentamos mas tem de indicar uma entidade válida";
        return;
    }if (strlen($subent_id) == 0) {
        echo "Lamentamos mas tem de indicar uma subentidade válida";
        return;
    }

    $order_value = sprintf("%01.2f", $order_value);

    $order_value = format_number($order_value);

    if ($order_value < 1) {
        echo "Lamentamos mas é impossível gerar uma referência MB para valores inferiores a 1 Euro";
        header("Location:https://transparencia.pt");
        return;
    }
    if ($order_value >= 1000000) {
        echo "<b>AVISO:</b> Pagamento fraccionado por exceder o valor limite para pagamentos no sistema Multibanco<br>";
    }

    if (strlen($subent_id) == 1) {
        //Apenas sao considerados os 6 caracteres mais a direita do order_id
        $order_id = substr($order_id, (strlen($order_id) - 6), strlen($order_id));
        $chk_str  = sprintf('%05u%01u%06u%08u', $ent_id, $subent_id, $order_id, round($order_value * 100));
    } else if (strlen($subent_id) == 2) {
        //Apenas sao considerados os 5 caracteres mais a direita do order_id
        $order_id = substr($order_id, (strlen($order_id) - 5), strlen($order_id));
        $chk_str  = sprintf('%05u%02u%05u%08u', $ent_id, $subent_id, $order_id, round($order_value * 100));
    } else {
        //Apenas sao considerados os 4 caracteres mais a direita do order_id
        $order_id = substr($order_id, (strlen($order_id) - 4), strlen($order_id));
        $chk_str  = sprintf('%05u%03u%04u%08u', $ent_id, $subent_id, $order_id, round($order_value * 100));
    }

    //cálculo dos check digits

    $chk_array = array(3, 30, 9, 90, 27, 76, 81, 34, 49, 5, 50, 15, 53, 45, 62, 38, 89, 17, 73, 51);

    for ($i = 0; $i < 20; $i++) {
        $chk_int = substr($chk_str, 19 - $i, 1);
        $chk_val += ($chk_int % 10) * $chk_array[$i];
    }

    $chk_val %= 97;

    $chk_digits = sprintf('%02u', 98 - $chk_val);

    echo "<body style='font-size: 11pt; margin-top:300px;'>";
    echo "<div class='container' align='center'>";
    echo "<table cellpadding='3' width='400px' cellspacing='0' style='margin-top: 10px;border: 1px solid #45829F; background-color: #fff;'>";
    echo "<tr>";
    echo "<td style='font-size: x-small; border-bottom: 1px solid #45829F; background-color: #45829F; color: White; padding: 5px;'  colspan='3'>Pagamento por Multibanco ou Homebanking</td>";
    echo " </tr>";
    echo "<tr>";
    echo "<td rowspan='3'><img src='/wp-content/themes/twentyfourteen/assets/img/logoMB.jpg' alt='' /></td>";
    echo "<td style='font-size: x-small; font-weight:bold; text-align:left'>Entidade: " . $ent_id;"</td>";
    echo "<td style='font-size: x-small; text-align:left'><span id='Entidade'/></td>";
    echo "</tr>";
    echo " <tr>";
    echo "<td style='font-size: x-small; font-weight:bold; text-align:left'>Refer&ecirc;ncia: " . substr($chk_str, 5, 3) . " " . substr($chk_str, 8, 3) . " " . substr($chk_str, 11, 1) . $chk_digits;"</td>";
    echo "<td style='font-size: x-small; text-align:left'><span id='Ref' /></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td style='font-size: x-small; font-weight:bold; text-align:left'>Valor: &euro;&nbsp;" . number_format($order_value, 2, ',', ' ');"</td>";
    echo "<td style='font-size: x-small; text-align:left'><span id='Valor' /></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td style='font-size: xx-small;border-top: 1px solid #45829F; background-color: #45829F; color: White; padding: 5px;' colspan='3'>O tal&atilde;o emitido pela caixa autom&aacute;tica faz prova de pagamento. Conserve-o.</td>";
    echo "</tr>";
    echo "</table>";
    echo "</div>";
    echo "</body>";

    // Create the Transport EMAIL
    $transport = Swift_SmtpTransport::newInstance('smtp.transparencia.pt', 25)
        ->setUsername('secretariado@transparencia.pt')
        ->setPassword('Tiac2015');
    $mailer = Swift_Mailer::newInstance($transport);
    $mailer->registerPlugin(new Swift_Plugins_ThrottlerPlugin(15, Swift_Plugins_ThrottlerPlugin::MESSAGES_PER_SECOND));
    //$email1="celso.r.n.rodrigues@gmail.com";

    // Send the message
    $recipients = [$email];
    foreach ($recipients as $recipient) {
        try {
            if ($dias_restantes == 30) {

                $TrintaDias = "Dentro de 30 dias";

            }

            if ($dias_restantes == 15) {

                $QuinzeDias = "Dentro de 15 dias";

            }

            if ($dias_restantes == 2) {

                $DoisDias = "Depois de amanhã";

            }
            $ano_atual= date("Y");
            $MsgAtraso = '<p><img alt="" src="https://transparencia.pt/wp-content/themes/twentyfourteen/assets/img/logoc.png" style="width: 200px; height: 62px;" /></p>
                     <p>&nbsp;</p>
                     <div>

                       <p><span style="line-height: 1.6em;">Caro/a</span> ' . $nome . " " . $apelido . ',</p>
                       <div class="container">
                       <p>Como o tempo voa! ' . $TrintaDias . $QuinzeDias . $DoisDias . ' celebramos juntos mais um anivers&aacute;rio da sua ades&atilde;o &agrave; Transpar&ecirc;ncia e Integridade, Associa&ccedil;&atilde;o C&iacute;vica. Espero que o trabalho conjunto que fazemos na associa&ccedil;&atilde;o esteja &agrave; altura das suas expetativas e que a TIAC possa continuar a contar consigo para os desafios que a&iacute; v&ecirc;m.</p>
                       <p>Esta &eacute; a altura de renovar a sua <strong>quota anual como membro da TIAC</strong>, cujos detalhes de pagamento poder&aacute; encontrar no seu perfil reservado, acess&iacute;vel no nosso site.</p>
                       <p>O valor simbólico que pedimos anualmente aos nossos associados é a única garantia da nossa independência e um contributo vital para podermos continuar a lutar por uma sociedade democrática mais justa e livre de corrupção. </p>
                       <p>Fa&ccedil;a hoje o seu pagamento:</p>
                           <p>A TIAC depara-se actualmente com um grave problema de sustentabilidade financeira que poderá comprometer a continuidade do seu trabalho. A sua colaboração e solidariedade é fundamental.</p>
                           <p>Por conseguinte, solicitamos a todos os associados que procedam ao pagamento da quota anual de '.$ano_atual.'.</p>
                           <p>A TIAC criou novas condições para facilitar a consulta e pagamento das suas quotas, conforme se indica abaixo:</p>
                           <p><strong>Atrav&eacute;s do site da TIAC</strong></p>
                           <p>1- Fa&ccedil;a a autenticação no site:<a href="https://transparencia.pt/wp-login.php?">https://transparencia.pt</a></p>
                           <p>Utilize o&nbsp;seu nome de utilizador: &nbsp;<b>' . $email . '</b></p>
                           <p>E a palavra-passe que defeniu na altura do seu&nbsp;&nbsp;registo.</p>
                           
                           <p>Caso n&atilde;o se recorde da sua password, clique em <a href="//transparencia.pt/wp-login.php?action=lostpassword">recuperar senha</a>. Ser&aacute; aberta uma p&aacute;gina onde deve inserir o seu endere&ccedil;o de correio eletr&oacute;nico <b>' . $email . '</b> para poder defenir a sua nova palavra-passe.</p>
                          <p>2- Uma fez feito a autenticação, clique em Pagar Quota e escolha o seu meio de pagamento (Multibanco, Paypal, Google Wallet ou Transferência Bancária) e siga as instru&ccedil;&otilde;es de pagamento.</p>
                           <p style="color:green"><i>Em caso de dúvida siga este tutorial no youtube: <a href="https://www.youtube.com/watch?v=jCocM83Mq64">Tutorial </a></i></p>
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
                               <p style="color:green">Utilize os seguintes dados para efectuar o pagamento:</p>
                               <table cellpadding="3 width="400px" cellspacing="0" style="margin-top: 10px;border: 1px solid #45829F; background-color: #fff;">
                                   <tr>
                                       <td style="font-size: x-small; border-bottom: 1px solid #45829F; background-color: #45829F; color: White; padding: 5px;"  colspan="3">Pagamento por Multibanco ou Homebanking</td>
                                   </tr>
                                   <tr>
                                       <td rowspan="3"><img src="https://transparencia.pt/wp-content/themes/twentyfourteen/assets/img/logoMB.jpg"  /></td>
                                       <td style="font-size: x-small; font-weight:bold; text-align:left">Entidade: ' . $ent_id . '</td>
                                       <td style="font-size: x-small; text-align:left"><span id="Entidade"/></td>
                                   </tr>
                                   <tr>
                                       <td style="font-size: x-small; font-weight:bold; text-align:left">Refer&ecirc;ncia: ' . substr($chk_str, 5, 3) . " " . substr($chk_str, 8, 3) . " " . substr($chk_str, 11, 1) . $chk_digits . '</td>
                                       <td style="font-size: x-small; text-align:left"><span id="Ref" /></td>
                                   </tr>
                                   <tr>
                                       <td style="font-size: x-small; font-weight:bold; text-align:left">Valor: &euro;&nbsp;' . number_format($order_value, 2, ',', ' ') . '</td>
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
                                   <font face="Calibri, sans-serif" style="color: rgb(0, 0, 0); line-height: normal; font-family: Calibri, sans-serif; font-size: 15px;"><span lang="pt-PT" style="line-height: 21.2999992370605px;">E-Mail:&nbsp;<a href="mailto:secretariado@transparencia.pt" style="color: rgb(0, 104, 207); line-height: 21.2999992370605px; font-weight: inherit; cursor: default;" target="_blank">secretariado@transparencia.pt</a></span></font><br style="color: rgb(0, 0, 0); font-family: Calibri, sans-serif; font-size: 15px; line-height: 21.2999992370605px;" />
                                   <font face="Calibri, sans-serif" style="color: rgb(0, 0, 0); line-height: normal; font-family: Calibri, sans-serif; font-size: 15px;">Phone: (+351) 21 752 20 75</font></p>
                                   <p><font face="Calibri, sans-serif"><a href="https://transparencia.pt/" target="_blank">www.transparencia.pt</a></font></p>';

            if ($dias_restantes == 30) {

                $message = Swift_Message::newInstance('Apelo à regularização da quota anual')
                    ->setFrom(array('secretariado@transparencia.pt' => 'TIAC'))
                    ->setBody($MsgAtraso, 'text/html');

                $message->setTo($recipient);
                $result = $mailer->send($message);

            }
            if ($dias_restantes == 15) {

                $message = Swift_Message::newInstance('Apelo à regularização da quota anual')
                    ->setFrom(array('secretariado@transparencia.pt' => 'TIAC'))
                    ->setBody($MsgAtraso, 'text/html');

                $message->setTo($recipient);
                $result = $mailer->send($message);

            }
            if ($dias_restantes == 2) {

                $message = Swift_Message::newInstance('Apelo à regularização da quota anual')
                    ->setFrom(array('secretariado@transparencia.pt' => 'TIAC'))
                    ->setBody($MsgAtraso, 'text/html');

                $message->setTo($recipient);
                $result = $mailer->send($message);

            }

    

        } catch (Swift_TransportException $e) {
            $mailer->getTransport()->stop();
            sleep(10); // Just in case ;-)
        }
    }
}

$total_associados = $wpdb->get_var("SELECT COUNT(contact_id) FROM civicrm_membership WHERE external_identifier IS NOT NULL");
for ($i = 0; $i <= $total_associados; $i++) {
    $Ext_id_tabela_membership = $wpdb->get_var("SELECT external_identifier  FROM civicrm_membership WHERE contact_id = '{$i}' AND status_id='2' ");
    $nome                     = $wpdb->get_var("SELECT first_name  FROM civicrm_contact WHERE id = '{$i}'AND external_identifier ='{$Ext_id_tabela_membership}' ");
    $apelido                  = $wpdb->get_var("SELECT last_name  FROM civicrm_contact WHERE id = '{$i}' AND external_identifier ='{$Ext_id_tabela_membership}' ");
    $email                    = $wpdb->get_var("SELECT email  FROM civicrm_email WHERE contact_id = '{$i}' AND external_identifier ='{$Ext_id_tabela_membership}' ");
    $fim_membership           = $wpdb->get_var("SELECT end_date  FROM civicrm_membership WHERE contact_id = '{$i}' AND external_identifier ='{$Ext_id_tabela_membership}'AND status_id='2' ");
    $futureDate               = $fim_membership;
    $d                        = new DateTime($futureDate);
    $dias_restantes           = $d->diff(new DateTime())->format('%a');
    print_r($Ext_id_tabela_membership);
    //print_r($fim_membership);
    //print_r($dias_restantes);

    if ($Ext_id_tabela_membership != '') {

        GenerateMbRef("11802", "397", $Ext_id_tabela_membership, 12, $nome, $apelido, $email, $futureDate, $d, $dias_restantes);

    }
}
