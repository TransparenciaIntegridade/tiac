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
	
	if($chave==$chave_anti_phishing){
		$id = substr($referencia, -6, 4); 
		$ano_callback = substr($data, -13, 4);
		
		global $wpdb;
// AND total_amount = '10.00' AND contribution_status_id = '2'
		$quotas_nao_pagas =  $wpdb->query("SELECT contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id'",ARRAY_A);
		echo $quotas_nao_pagas;
		$ano_mais_antigo =  $wpdb->get_row("SELECT MIN(receive_date),contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id' AND contribution_status_id = '2'",ARRAY_A);

		$data_mais_antiga = $ano_mais_antigo['MIN(receive_date)']; 
		$ano_mais_antigo = explode("-",$ano_mais_antigo['MIN(receive_date)']);
		$ano_mais_antigo = $ano_mais_antigo[0];
		$contribution_status_id = $ano_mais_antigo['contribution_status_id'];


		if($ano_mais_antigo == $ano_callback && $contribution_status_id == "2"){
			echo "paga";
			//$wpdb->query("UPDATE civicrm_contribution SET  contribution_status_id = '1' WHERE contact_id = '$id' AND receive_date = '$data_mais_antiga'");
		}


		if($ano_mais_antigo != $ano_callback && $contribution_status_id == "2"){
		   	echo "Nao Paga";
		    //$wpdb->query("UPDATE civicrm_contribution SET contribution_status_id = '1' WHERE contact_id = '$id' AND receive_date = '$data_mais_antiga'");
		 }

		/* foreach ($data_utilizador_pagamento as $data) {
		 	$pagamento_status = array();
		 	$pagamento_status[] = $data['contribution_status_id'];
		 	echo $pagamento_status[0];
		 	/*if($pagamento_status[0] == 1){
		 		echo "todas as quotas foram pagas";
		 	}
		 }*/

 	}

}
