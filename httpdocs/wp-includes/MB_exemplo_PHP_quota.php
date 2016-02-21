<?php

require_once('../wp-includes/pluggable.php');
//require_once(ABSPATH.'/wp-includes/pluggable.php');
//INICIO TRATAMENTO DEFINI��ES REGIONAIS
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
//FIM TRATAMENTO DEFINI��ES REGIONAIS


//INICIO REF MULTIBANCO
	function GenerateMbRef($ent_id, $subent_id, $order_id, $order_value)
	{
		$chk_val = 0;
		
		$order_id ="0000".$order_id;
		
		if(strlen($ent_id)<5)
		{
			echo "Lamentamos mas tem de indicar uma entidade v�lida";
			return;
		}else if(strlen($ent_id)>5){
			echo "Lamentamos mas tem de indicar uma entidade v�lida";
			return;
		}if(strlen($subent_id)==0){
			echo "Lamentamos mas tem de indicar uma subentidade v�lida";
			return;
		}
		
		$order_value= sprintf("%01.2f", $order_value);
		
		$order_value =  format_number($order_value);

		if ($order_value < 1){
			echo "Lamentamos mas � imposs�vel gerar uma refer�ncia MB para valores inferiores a 1 Euro";
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
			
		//c�lculo dos check digits

		$chk_array = array(3, 30, 9, 90, 27, 76, 81, 34, 49, 5, 50, 15, 53, 45, 62, 38, 89, 17, 73, 51);
		
		for ($i = 0; $i < 20; $i++)
		{
			$chk_int = substr($chk_str, 19-$i, 1);
			$chk_val += ($chk_int%10)*$chk_array[$i];
		}
		
		$chk_val %= 97;
		
		$chk_digits = sprintf('%02u', 98-$chk_val);

		echo"<body style='font-family: Verdana; font-size: 11pt; vertical-align: none;'>";
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
$order_value = $_GET["valor"];
$user_id = get_current_user_id();
$user_id_logout = $_GET['id'];
if(is_user_logged_in()){
	GenerateMbRef("11802","397",$user_id,10);
}else{
	GenerateMbRef("11802","397",$user_id_logout,$order_value);
}
?>

