<?php
session_start();
?>



<?php

//require_once('../wp-includes/pluggable.php');
//require_once(ABSPATH.'/wp-includes/pluggable.php');
//INICIO TRATAMENTO DEFINIÇÕES REGIONAIS
if ( !defined('__DIR__') ) define('__DIR__', dirname(__FILE__)); //getting current directory using magic constants __DIR__ is deprecated in php 5.3.+
$path = explode('wp-content',__DIR__); //getting main web root path for including further files.
include_once($path[0].'wp-load.php'); //for getting global variables like wpdb 
    global $current_user;


    //echo $current_user->user_login;


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

		echo"<body style='font-family: Verdana; font-size: 11pt; margin-top:300px;'>";
		echo "<div align='center'style='font-family: Verdana; font-size: 11pt; vertical-align: none;'>";
		echo"<table cellpadding='3' width='400px' height='200px' cellspacing='0' style='margin-top: 10px;border: 1px solid #45829F; background-color: #fff;'>";
		echo"<tr>";
		echo"<td style='font-size: x-small; border-bottom: 1px solid #45829F; background-color: #45829F; color: White; padding: 5px;'  colspan='3'>Pagamento por Multibanco ou Homebanking</td>";
		echo" </tr>";
		echo"<tr>";
		echo"<td rowspan='3'><img src='/wp-content/themes/wpbootstrap/assets/img/logoMB.jpg' alt=''  /></td>";
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
	}
//FIM REF MULTIBANCO
	global $wpdb;
$ano_atual=date("Y");
$order_value = $_GET["valor"];
$user_id = get_current_user_id();
$user_id_logout = $_GET['id'];
$external_id = $wpdb->get_row("SELECT external_identifier FROM wp_users WHERE id = '{$user_id}'");
//print_r ($user_id);
$id = $wpdb->get_row("SELECT id FROM civicrm_contact WHERE external_identifier='$external_id->external_identifier'");
//print_r ($id);
$quotas_valor_antigo = $wpdb->get_row("SELECT contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_page_id = '9' AND contribution_status_id = '2' AND total_amount = '10.00' AND  YEAR(receive_date) != '$ano_atual'");
//print_r ($quotas_valor_antigo);

//print_r($ano_atual);




//$ano_atual = substr($data, -13, 4);

if($quotas_valor_antigo > 0 ){
    GenerateMbRef("11802","397",$external_id->external_identifier,10);
}
else
{
GenerateMbRef("11802","397",$external_id->external_identifier,12);

}






?>


