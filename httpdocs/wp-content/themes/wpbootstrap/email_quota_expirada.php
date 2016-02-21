<?php 
require_once 'swiftmailer/lib/swift_required.php';
global $wpdb;

$total_associados = $wpdb->get_var("SELECT MAX(contact_id) FROM civicrm_membership");


// Create the Transport EMAIL
$transport = Swift_SmtpTransport::newInstance('smtp.transparencia.pt', 25)
  ->setUsername('celso.rodrigues@transparencia.pt')
  ->setPassword('Tiac2013');
$mailer = Swift_Mailer::newInstance($transport);
//$mailer->registerPlugin(new Swift_Plugins_AntiFloodPlugin(10, 10));

$mailer->registerPlugin(new Swift_Plugins_ThrottlerPlugin(15, Swift_Plugins_ThrottlerPlugin::MESSAGES_PER_SECOND));


for ($i=0;$i<=$total_associados;$i++){
$Ext_id_tabela_membership = $wpdb->get_var("SELECT external_identifier  FROM civicrm_membership WHERE contact_id = '{$i}' AND status_id='4' ");
//$fim_membership = $wpdb->get_var("SELECT end_date  FROM civicrm_membership WHERE contact_id = '{$i}' AND status_id='4' ");
$email = $wpdb->get_var("SELECT email  FROM civicrm_email WHERE contact_id = '{$i}' AND external_identifier ='{$Ext_id_tabela_membership}' ");
$nome = $wpdb->get_var("SELECT first_name  FROM civicrm_contact WHERE id = '{$i}'AND external_identifier ='{$Ext_id_tabela_membership}' ");
$apelido = $wpdb->get_var("SELECT last_name  FROM civicrm_contact WHERE id = '{$i}' AND external_identifier ='{$Ext_id_tabela_membership}' ");
//$id = $wpdb->get_var("SELECT contact_id  FROM civicrm_membership WHERE id = '{$i}' AND external_identifier ='{$Ext_id_tabela_membership}' ");
//$Ex_id = $wpdb->get_var("SELECT external_identifier  FROM civicrm_membership WHERE contact_id = '{$i}' AND external_identifier ='{$Ext_id_tabela_membership}' ");
//$futureDate = $fim_membership;
//$d = new DateTime($futureDate);
//$dias_restantes = $d->diff(new DateTime())->format('%a');  

echo $Ext_id_tabela_membership;


   

//A faltar 30 dias/////////////////////////////////////////////////////////////////////////////////////////////////

if ($Ext_id_tabela_membership  != 0)


{

echo "<p>" .$nome . " " .$apelido . " " .$email . "</p>";
echo "string";







// Create a message


// Send the message
//$result = $mailer->send($message);

$recipients = [$email];
foreach ($recipients as $recipient) {
  try{
    $message = Swift_Message::newInstance('Quota TIAC por regularizar')
  ->setFrom(array('secretariado@transparencia.pt' => 'TIAC'))
  //->setTo(array( $email    => 'Lembrete Quotas'))
  ->setBody( '<p><img alt="" src="https://transparencia.pt/wp-content/themes/wpbootstrap/assets/img/logoc.png" style="width: 200px; height: 62px;" /></p>

<p>&nbsp;</p>

<p><span style="line-height: 1.6em;">Caro/a </span><b style="font-size:1.2em;"> '.$nome. " " .$apelido. '</b></p>

<div>
<p>Os registos da Transparência e Integridade, Associação Cívica indicam que está ainda por saldar o pagamento de montantes relativos à sua <b>quota anual como membro da TIAC, já expirada</b> e cujos detalhes poderá encontrar no seu perfil reservado, acessível no nosso site.</p>

<p>&nbsp;</p>

<p>O pagamento da quota anual é um dever previsto nos estatutos e está associado a regalias fundamentais, como a participação nas assembleias gerais da associação e o direito a eleger e ser eleito para os corpos sociais da TIAC.</p>

<p>&nbsp;</p>

<p>O valor simbólico que pedimos anualmente aos nossos associados é a única garantia da nossa independência e solidez e um contributo vital para podermos continuar o nosso trabalho comum. Por favor regularize a sua quota e ajude-nos a construir uma sociedade mais justa, livre de corrupção. </p>

<p><span style="line-height: 1.6em;">Fa&ccedil;a hoje o seu pagamento:</span></p>

<p>&nbsp;</p>

<p><strong>Atrav&eacute;s do site da TIAC</strong></p>

<p>1- Fa&ccedil;a o login no canto superior esquerdo do nosso site: <a href="http://www.transparencia.pt/">www.transparencia.pt</a></p>

<ul>
  <li>Utilize o&nbsp;seu nome de utilizador: &nbsp;<b>'.$email.'</b></li>
  <li>E a palavra-passe que defeniu na altura do seu&nbsp;&nbsp;registo.</li>
</ul>

<p><img alt="Tutorial Parte 1 photo tutorial1_zpsnzczd9jw.png" src="http://i1083.photobucket.com/albums/j391/firestruck73/tutorial1_zpsnzczd9jw.png" style="border-width: 0px; border-style: solid; height: 116px; width: 200px;" /></p>

<p>&nbsp;</p>

<ul>
  <li>Caso n&atilde;o se recorde da sua password, clique em <a href="https://transparencia.pt/wp-login.php?action=lostpassword">recuperar senha</a>. Ser&aacute; aberta uma p&aacute;gina onde deve inserir o seu endere&ccedil;o de correio eletr&oacute;nico ({contact.email}) para poder defenir a sua nova palavra-passe.</li>
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

<p>Se j&aacute; tiver saldado a sua quota, mas o pagamento n&atilde;o aparecer registado no seu perfil de associado, por favor escreva-nos para o email <a href="mailto:secretariado@transparencia.pt">secretariado@transparencia.pt</a> ou ligue-nos para o telefone 21 752 20 75. Se poss&iacute;vel, envie-nos uma c&oacute;pia do comprovativo de pagamento para podermos atualizar os nossos registos.</p>

<p>&nbsp;</p>

<p>Pagar a sua quota &eacute; simples e f&aacute;cil! Fa&ccedil;a-o hoje e d&ecirc; o seu contributo.</p>

<p>&nbsp;</p>

<p>Obrigado pelo apoio!</p>

<p>&nbsp;</p>
</div>

<div>
<div>&nbsp;</div>
</div>

<p><img alt="" src="https://transparencia.pt/wp-content/themes/wpbootstrap/assets/img/logoc.png" style="width: 200px; height: 62px;" /></p>

<p><font color="#2e74b5" face="Calibri, sans-serif" size="3" style="line-height: 20.7999992370605px;"><span style="line-height: 22.7199993133545px;"><b>SECRETARIADO - TIAC</b></span></font><br style="color: rgb(0, 0, 0); font-family: Calibri, sans-serif; font-size: 15px; line-height: 21.2999992370605px;" />
<font face="Calibri, sans-serif" style="color: rgb(0, 0, 0); line-height: normal; font-family: Calibri, sans-serif; font-size: 15px;"><span lang="pt-PT" style="line-height: 21.2999992370605px;">E-Mail:&nbsp;<a href="mailto:celso.rodrigues@transparencia.pt" style="color: rgb(0, 104, 207); line-height: 21.2999992370605px; font-weight: inherit; cursor: default;" target="_blank">secretariado@transparencia.pt</a></span></font><br style="color: rgb(0, 0, 0); font-family: Calibri, sans-serif; font-size: 15px; line-height: 21.2999992370605px;" />
<font face="Calibri, sans-serif" style="color: rgb(0, 0, 0); line-height: normal; font-family: Calibri, sans-serif; font-size: 15px;">Phone: (+351) 21 752 20 75</font></p>

<p><span style="font-family: Calibri, sans-serif; line-height: 1.6em;">{domain.address}</span></p>

<p><font face="Calibri, sans-serif"><a href="http://www.transparencia.pt/" target="_blank">http://www.transparencia.pt</a></font></p>

<p>{action.optOutUrl}</p>

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


  }catch(Swift_TransportException $e){
        $mailer->getTransport()->stop();
        sleep(10); // Just in case ;-)
    }
}

}



}

?>