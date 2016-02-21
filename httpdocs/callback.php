<?php
require_once('../../../wp-blog-header.php');

/* 
 * Deve fornecer à ifthen o url que permite a invocação deste ficheiro bem como os parâmetros que são para ser invocados
 * Exemplo: https://www.exemplo.com/callback.php?chave=[CHAVE_ANTI_PHISHING]&entidade=[ENTIDADE]&referencia=[REFERENCIA]&valor=[VALOR] 
 */

//devem definir uma chave a vosso gosto e que devem comunicar à Ifthen bem como o url de invocação.
$chave_anti_phishing = "s465ads4d6asd5sa4d96asfd6sa5f46d54f6ds54sa6546dsa5";
	
/*
 * verifica se os parametros necessários vêm incluidos no url de callback
 * no exemplo só assumimos os obrigatórios, isto é, chave, entidade, referencia e valor. Podem também solicitar a data/hora de pagamento e o terminal bastando para isso acrescentar os campos.
 */
if(isset($_REQUEST['chave']) && isset($_REQUEST['entidade']) && isset($_REQUEST['referencia']) && isset($_REQUEST['valor']) && isset($_REQUEST['datahorapag'])){
	 
	$chave = $_REQUEST['chave'];
	$entidade = $_REQUEST['entidade'];
	$referencia = $_REQUEST['referencia']; 
	$valor = $_REQUEST['valor'];
	$data = $_REQUEST['datahorapag'];
	//print_r($entidade);






	if($chave==$chave_anti_phishing){
		//echo "teste";
		$id_maior_1000 = substr($referencia, -6, 4); 
		$id_menor_1000 = substr($referencia, 4, 3); 
		$ano_callback = substr($data, -13, 4);
		$SubRef = substr($referencia, -10, 3);
	//echo ($SubRef);

		global $wpdb;

		if ($entidade == 11802){

	
if($id_maior_1000 >= 1000){
			//echo "id_maior_1000";
			//print_r($entidade);
	echo ("User autenticado");
			$id = $wpdb->get_row("SELECT id FROM civicrm_contact WHERE external_identifier = '$id_maior_1000'");
			$total_quotas =  $wpdb->query("SELECT contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND total_amount = '10.00'");
			$quotas_pagas = $wpdb->query("SELECT contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND total_amount = '10.00' AND contribution_status_id = '1'");
			$data_inicio_fim_membership = $wpdb->get_row("SELECT start_date,end_date FROM civicrm_membership WHERE contact_id = '$id->id'");
			$ano_mais_antigo =  $wpdb->get_row("SELECT MIN(receive_date),contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_status_id = '2'",ARRAY_A);

			$data_mais_antiga = $ano_mais_antigo['MIN(receive_date)']; 
			$ano_mais_antigo = explode("-",$ano_mais_antigo['MIN(receive_date)']);
			$ano_mais_antigo = $ano_mais_antigo[0];

			$contribution_status_id = $ano_mais_antigo['contribution_status_id'];

			if( $SubRef == 302){
				$wpdb->query("UPDATE civicrm_contribution SET  contribution_status_id = '1' WHERE contact_id = '$id->id'");
				header('HTTP/1.0 404 Not Found');
				die();
				  
			}

			
			 if($ano_mais_antigo == $ano_callback && $contribution_status_id == "2" && $SubRef == 397){
				$wpdb->query("UPDATE civicrm_contribution SET  contribution_status_id = '1' WHERE contact_id = '$id->id' AND receive_date = '$data_mais_antiga'");
				header('HTTP/1.0 404 Not Found');
				die();
				  
			}

			if($ano_mais_antigo != $ano_callback && $contribution_status_id == "2" && $SubRef == 397){
			    $wpdb->query("UPDATE civicrm_contribution SET contribution_status_id = '1' WHERE contact_id = '$id->id' AND receive_date = '$data_mais_antiga'");
			    header('HTTP/1.0 404 Not Found');
				die();
			 }

		}else {
			print_r($ano_mais_recente) ;

			//echo "id_menor_1000 e referencia 11802";
			//print_r($entidade);
			$id = $wpdb->get_row("SELECT id FROM civicrm_contact WHERE external_identifier = '$id_menor_1000'");
			$total_quotas =  $wpdb->query("SELECT contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND total_amount = '10.00'");
			$quotas_pagas = $wpdb->query("SELECT contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND total_amount = '10.00' AND contribution_status_id = '1'");
			$data_inicio_fim_membership = $wpdb->get_row("SELECT start_date,end_date FROM civicrm_membership WHERE contact_id = '$id->id'");
			$ano_mais_antigo =  $wpdb->get_row("SELECT MIN(receive_date),contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_status_id = '2'",ARRAY_A);
			$ano_mais_recente = $wpdb->get_row("SELECT MAX(receive_date),contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_status_id = '2' AND contribution_page_id ='4'");
			$data_mais_antiga = $ano_mais_antigo['MIN(receive_date)']; 
			$ano_mais_antigo = explode("-",$ano_mais_antigo['MIN(receive_date)']);
			$ano_mais_antigo = $ano_mais_antigo[0];
print_r($ano_mais_recente) ;
			$contribution_status_id = $ano_mais_antigo['contribution_status_id'];

			if( $SubRef == 302){
				$wpdb->query("UPDATE civicrm_contribution SET  contribution_status_id = '1' WHERE contact_id = '$id->id' AND contribution_page_id ='4' AND receive_date ='$data_mais_recente'");
				header('HTTP/1.0 404 Not Found');
				die();
				  
			}

			
			 if($ano_mais_antigo == $ano_callback && $contribution_status_id == "2" && $SubRef == 397){
				$wpdb->query("UPDATE civicrm_contribution SET  contribution_status_id = '1' WHERE contact_id = '$id->id' AND receive_date = '$data_mais_antiga'");
				header('HTTP/1.0 404 Not Found');
				die();
				  
			}

			if($ano_mais_antigo != $ano_callback && $contribution_status_id == "2" && $SubRef == 397){
			    $wpdb->query("UPDATE civicrm_contribution SET contribution_status_id = '1' WHERE contact_id = '$id->id' AND receive_date = '$data_mais_antiga'");
			    header('HTTP/1.0 404 Not Found');
				die();
			 }

			if($quotas_pagas == $total_quotas){
				$data_inicio_futura = date('Y-m-d',strtotime("+1 year",strtotime($data_inicio_fim_membership->start_date)));
				$data_fim_futura = date('Y-m-d',strtotime("+1 year",strtotime($data_inicio_fim_membership->end_date)));
				$wpdb->query("UPDATE civicrm_membership SET status_id = '2', start_date = '$data_inicio_futura', end_date = '$data_fim_futura' WHERE contact_id = '$id->id'");
			}
		}



//////////////////////////////////////////////////////////////////Entidade 11803////////////////////////////////////////////


	
}
else {
	echo ("User nao autenticado");
if($id_maior_1000 >= 1000){
			//echo "id_maior_1000";
			//print_r($entidade);
			$id = $wpdb->get_row("SELECT id FROM civicrm_contact WHERE id = '$id_maior_1000'");
			$total_quotas =  $wpdb->query("SELECT contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND total_amount = '10.00'");
			$quotas_pagas = $wpdb->query("SELECT contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND total_amount = '10.00' AND contribution_status_id = '1'");
			$data_inicio_fim_membership = $wpdb->get_row("SELECT start_date,end_date FROM civicrm_membership WHERE contact_id = '$id->id'");
			$ano_mais_antigo =  $wpdb->get_row("SELECT MIN(receive_date),contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_status_id = '2'",ARRAY_A);

			$data_mais_antiga = $ano_mais_antigo['MIN(receive_date)']; 
			$ano_mais_antigo = explode("-",$ano_mais_antigo['MIN(receive_date)']);
			$ano_mais_antigo = $ano_mais_antigo[0];

			$contribution_status_id = $ano_mais_antigo['contribution_status_id'];

			if($ano_mais_antigo == $ano_callback && $contribution_status_id == "2"){
				$wpdb->query("UPDATE civicrm_contribution SET  contribution_status_id = '1' WHERE contact_id = '$id->id' AND receive_date = '$data_mais_antiga'");
				  header('HTTP/1.0 404 Not Found');
				  die();
			}

			if($ano_mais_antigo != $ano_callback && $contribution_status_id == "2"){
			    $wpdb->query("UPDATE civicrm_contribution SET contribution_status_id = '1' WHERE contact_id = '$id->id' AND receive_date = '$data_mais_antiga'");
			 	die();
			 }

			if($quotas_pagas == $total_quotas){
				$data_inicio_futura = date('Y-m-d',strtotime("+1 year",strtotime($data_inicio_fim_membership->start_date)));
				$data_fim_futura = date('Y-m-d',strtotime("+1 year",strtotime($data_inicio_fim_membership->end_date)));
				$wpdb->query("UPDATE civicrm_membership SET status_id = '2', start_date = '$data_inicio_futura', end_date = '$data_fim_futura' WHERE contact_id = '$id->id'");
			}

		}else {

			echo "id_menor_1000 e referencia 11803";
			//print_r($entidade);
			$id = $wpdb->get_row("SELECT id FROM civicrm_contact WHERE id = '$id_menor_1000'");
			$total_quotas =  $wpdb->query("SELECT contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND total_amount = '10.00'");
			$quotas_pagas = $wpdb->query("SELECT contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND total_amount = '10.00' AND contribution_status_id = '1'");
			$data_inicio_fim_membership = $wpdb->get_row("SELECT start_date,end_date FROM civicrm_membership WHERE contact_id = '$id->id'");
			$ano_mais_antigo =  $wpdb->get_row("SELECT MIN(receive_date),contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_status_id = '2'",ARRAY_A);
			$data_mais_antiga = $ano_mais_antigo['MIN(receive_date)']; 
			$ano_mais_antigo = explode("-",$ano_mais_antigo['MIN(receive_date)']);
			$ano_mais_antigo = $ano_mais_antigo[0];

			$contribution_status_id = $ano_mais_antigo['contribution_status_id'];

			if( $SubRef == 302){
				$wpdb->query("UPDATE civicrm_contribution SET  contribution_status_id = '1' WHERE contact_id = '$id->id'");
				header('HTTP/1.0 404 Not Found');
				die();
				  
			}

			
			 if($ano_mais_antigo == $ano_callback && $contribution_status_id == "2" && $SubRef == 397){
				$wpdb->query("UPDATE civicrm_contribution SET  contribution_status_id = '1' WHERE contact_id = '$id->id' AND receive_date = '$data_mais_antiga'");
				header('HTTP/1.0 404 Not Found');
				die();
				  
			}

			if($ano_mais_antigo != $ano_callback && $contribution_status_id == "2" && $SubRef == 397){
			    $wpdb->query("UPDATE civicrm_contribution SET contribution_status_id = '1' WHERE contact_id = '$id->id' AND receive_date = '$data_mais_antiga'");
			    header('HTTP/1.0 404 Not Found');
				die();
			 }
		}

 	}

}
}