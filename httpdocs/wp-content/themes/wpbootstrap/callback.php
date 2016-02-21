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
				
				$id_maior_1000 = substr($referencia, -6, 4); 
				$id_menor_1000 = substr($referencia, 4, 3); 
				$id_menor_1000 =ltrim($id_menor_1000, '0');
				$ano_callback = substr($data, -13, 4);
				$SubRef = substr($referencia, -10, 3);
			
echo $id_menor_1000;
				global $wpdb;

				if ($entidade == 11802){

			
		if($id_maior_1000 >= 1000){
					
					$id = $wpdb->get_row("SELECT id FROM civicrm_contact WHERE external_identifier = '$id_maior_1000'");
					$total_quotas =  $wpdb->query("SELECT contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_page_id = '9'");

					$quotas_pagas = $wpdb->query("SELECT contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_page_id = '9' AND contribution_status_id = '1'");

					$ano_membership_expired = $wpdb->get_var("SELECT YEAR(end_date) FROM civicrm_membership WHERE contact_id = '$id->id' AND status_id ='4'");

					$caso_especial_membership = $wpdb->get_var("SELECT end_date FROM civicrm_membership WHERE contact_id = '$id->id' AND status_id ='2' AND YEAR(end_date)= '$ano_callback'");

					$data_inicio_fim_membership = $wpdb->get_row("SELECT start_date,end_date FROM civicrm_membership WHERE contact_id = '$id->id'");

					$ano_mais_antigo =  $wpdb->get_row("SELECT MIN(receive_date),contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_page_id ='9' AND contribution_status_id = '2'",ARRAY_A);

					$data_mais_antiga = $ano_mais_antigo['MIN(receive_date)']; 

					$ano_mais_antigo = explode("-",$ano_mais_antigo['MIN(receive_date)']);

					$ano_mais_antigo = $ano_mais_antigo[0];

					$data_mais_recente = $wpdb->get_row("SELECT MAX(receive_date)FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_status_id = '2' AND contribution_page_id ='4'",ARRAY_A);

					$data_mais_recente = $data_mais_recente['MAX(receive_date)']; 

					$contribution_status_id = $ano_mais_antigo['contribution_status_id'];

					$SubRef = substr($referencia, -10, 3);

					$difer_anos_membership = ($ano_callback - $ano_membership_expired);
		

					if($SubRef == 302){
		          
					$wpdb->query("UPDATE civicrm_contribution SET  contribution_status_id = '1' WHERE contact_id = '$id->id' AND receive_date = '$data_mais_recente'");
						
						}

					elseif($SubRef == 397){

					$atualizaTudo =$wpdb->get_var("SELECT COUNT(contribution_status_id)  FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_status_id = '2'AND receive_date LIKE '%$ano_callback%' ORDER BY receive_date DESC");
		$data_mais_recente = $wpdb->get_row("SELECT MAX(receive_date)FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_status_id = '2' AND contribution_page_id ='9'",ARRAY_A);
					$data_mais_recente = $data_mais_recente['MAX(receive_date)']; 

					if($ano_mais_antigo == $ano_callback && $contribution_status_id == "2" && $SubRef == 397)
					{

						$wpdb->query("UPDATE civicrm_contribution SET  contribution_status_id = '1' WHERE contribution_status_id = '2' AND contact_id = '$id->id' AND receive_date = '$data_mais_recente'");
						for($i = 0 ; $i <=$atualizaTudo ; $i++){
		
		
						
		$wpdb ->query("DELETE FROM civicrm_contribution WHERE contribution_status_id = '2' AND contact_id = '$id->id'AND YEAR(receive_date) = '$ano_callback'");
		
		}
			
						
						header('HTTP/1.0 404 Not Found');
						die();
						  
					
		}

					if($ano_mais_antigo != $ano_callback && $contribution_status_id == "2" && $SubRef == 397){
						$data = $_REQUEST['datahorapag'];
						$ano_callback = substr($data, -13, 4);
						$atualizaTudo =$wpdb->get_var("SELECT COUNT(contribution_status_id)  FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_status_id = '2'AND receive_date LIKE '%$ano_callback%' ORDER BY receive_date DESC");

		
		$wpdb->query("UPDATE civicrm_contribution SET contribution_status_id = '1' WHERE contact_id = '$id->id' AND receive_date = '$data_mais_antiga'");
		for($i = 0 ; $i <=$atualizaTudo ; $i++){
			
			$wpdb ->query("DELETE FROM civicrm_contribution WHERE contribution_status_id = '2' AND contact_id = '$id->id'AND receive_date = '$data_mais_antiga'");
					    
					      header('HTTP/1.0 404 Not Found');
							die();
					 }
					 }

					if($quotas_pagas == $total_quotas && $difer_anos_membership == 0 ||$caso_especial_membership){
		
						

						$data_fim_futura = date('Y-m-d',strtotime("+1 year",strtotime($data_inicio_fim_membership->end_date)));

						$wpdb->query("UPDATE civicrm_membership SET status_id = '2',  end_date = '$data_fim_futura' WHERE contact_id = '$id->id'");

						

		}

		if($quotas_pagas == $total_quotas && $difer_anos_membership == 1){

					

					$data_fim_futura = date('Y-m-d',strtotime("+2 year",strtotime($data_inicio_fim_membership->end_date)));

					$wpdb->query("UPDATE civicrm_membership SET status_id = '2',  end_date = '$data_fim_futura' WHERE contact_id = '$id->id'");

					


		}


		if($quotas_pagas == $total_quotas && $difer_anos_membership == 2){

					

					$data_fim_futura = date('Y-m-d',strtotime("+3 year",strtotime($data_inicio_fim_membership->end_date)));

					$wpdb->query("UPDATE civicrm_membership SET status_id = '2',  end_date = '$data_fim_futura' WHERE contact_id = '$id->id'");

					


				

			}





				if($quotas_pagas == $total_quotas && $difer_anos_membership == 3){

					

					$data_fim_futura = date('Y-m-d',strtotime("+4 year",strtotime($data_inicio_fim_membership->end_date)));

					$wpdb->query("UPDATE civicrm_membership SET status_id = '2',  end_date = '$data_fim_futura' WHERE contact_id = '$id->id'");

					



				

			}



				if($quotas_pagas == $total_quotas && $difer_anos_membership == 4){

					

					$data_fim_futura = date('Y-m-d',strtotime("+5 year",strtotime($data_inicio_fim_membership->end_date)));

					$wpdb->query("UPDATE civicrm_membership SET status_id = '2',  end_date = '$data_fim_futura' WHERE contact_id = '$id->id'");

					



			}



				if($quotas_pagas == $total_quotas && $difer_anos_membership == 5){



					$data_fim_futura = date('Y-m-d',strtotime("+6 year",strtotime($data_inicio_fim_membership->end_date)));

					$wpdb->query("UPDATE civicrm_membership SET status_id = '2',  end_date = '$data_fim_futura' WHERE contact_id = '$id->id'");

					



			}




				

	}

	}else {

					
					$id = $wpdb->get_row("SELECT id FROM civicrm_contact WHERE external_identifier = '$id_menor_1000'");

					$total_quotas =  $wpdb->query("SELECT contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_page_id = '9'");

					$quotas_pagas = $wpdb->query("SELECT contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_page_id = '9' AND contribution_status_id = '1'");

					$ano_membership_expired = $wpdb->get_var("SELECT YEAR(end_date) FROM civicrm_membership WHERE contact_id = '$id->id' AND status_id ='4'");

					$caso_especial_membership = $wpdb->get_var("SELECT end_date FROM civicrm_membership WHERE contact_id = '$id->id' AND status_id ='2' AND YEAR(end_date)= '$ano_callback'");

					$data_inicio_fim_membership = $wpdb->get_row("SELECT start_date,end_date FROM civicrm_membership WHERE contact_id = '$id->id'");

					$ano_mais_antigo =  $wpdb->get_row("SELECT MIN(receive_date),contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_page_id ='9' AND contribution_status_id = '2'",ARRAY_A);

					$data_mais_antiga = $ano_mais_antigo['MIN(receive_date)']; 

					$ano_mais_antigo = explode("-",$ano_mais_antigo['MIN(receive_date)']);

					$ano_mais_antigo = $ano_mais_antigo[0];

					$data_mais_recente = $wpdb->get_row("SELECT MAX(receive_date)FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_status_id = '2' AND contribution_page_id ='4'",ARRAY_A);

					$data_mais_recente = $data_mais_recente['MAX(receive_date)']; 

					$contribution_status_id = $ano_mais_antigo['contribution_status_id'];

					$SubRef = substr($referencia, -10, 3);

					$difer_anos_membership = ($ano_callback - $ano_membership_expired);
					
					
					if($SubRef == 302){
		           
					$wpdb->query("UPDATE civicrm_contribution SET  contribution_status_id = '1' WHERE contact_id = '$id->id' AND receive_date = '$data_mais_recente'");
						
						


					}

		elseif($SubRef == 397){
			$atualizaTudo =$wpdb->get_var("SELECT COUNT(contribution_status_id)  FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_status_id = '2'AND receive_date LIKE '%$ano_callback%' ORDER BY receive_date DESC");
		$data_mais_recente = $wpdb->get_row("SELECT MAX(receive_date)FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_status_id = '2' AND contribution_page_id ='9'",ARRAY_A);
					$data_mais_recente = $data_mais_recente['MAX(receive_date)']; 

					if($ano_mais_antigo == $ano_callback && $contribution_status_id == "2" && $SubRef == 397)
					{

						$wpdb->query("UPDATE civicrm_contribution SET  contribution_status_id = '1' WHERE contribution_status_id = '2' AND contact_id = '$id->id' AND receive_date = '$data_mais_recente'");
						for($i = 0 ; $i <=$atualizaTudo ; $i++){

						
		$wpdb ->query("DELETE FROM civicrm_contribution WHERE contribution_status_id = '2' AND contact_id = '$id->id'AND YEAR(receive_date) = '$ano_callback'");
		
		}
			
						
						header('HTTP/1.0 404 Not Found');
						die();
						  
					
		}
					if($ano_mais_antigo != $ano_callback && $contribution_status_id == "2" && $SubRef == 397){
		
						$data = $_REQUEST['datahorapag'];
						$ano_callback = substr($data, -13, 4);
						
						$atualizaTudo =$wpdb->get_var("SELECT COUNT(contribution_status_id)  FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_status_id = '2'AND receive_date LIKE '%$ano_callback%' ORDER BY receive_date DESC");

		
		$wpdb->query("UPDATE civicrm_contribution SET contribution_status_id = '1' WHERE contact_id = '$id->id' AND receive_date = '$data_mais_antiga'");
		for($i = 0 ; $i <=$atualizaTudo ; $i++){
			
			$wpdb ->query("DELETE FROM civicrm_contribution WHERE contribution_status_id = '2' AND contact_id = '$id->id'AND receive_date = '$data_mais_antiga'");
					    
					   
					    header('HTTP/1.0 404 Not Found');
						die();
					 }
					 }

					
		if($quotas_pagas == $total_quotas && $difer_anos_membership == 0 ||$caso_especial_membership){
		
						

						$data_fim_futura = date('Y-m-d',strtotime("+1 year",strtotime($data_inicio_fim_membership->end_date)));

						$wpdb->query("UPDATE civicrm_membership SET status_id = '2',  end_date = '$data_fim_futura' WHERE contact_id = '$id->id'");

						

		}
	if($quotas_pagas == $total_quotas && $difer_anos_membership == 1){

				

					$data_fim_futura = date('Y-m-d',strtotime("+2 year",strtotime($data_inicio_fim_membership->end_date)));

					$wpdb->query("UPDATE civicrm_membership SET status_id = '2',  end_date = '$data_fim_futura' WHERE contact_id = '$id->id'");

					



				

					  

				

				}

				if($quotas_pagas == $total_quotas && $difer_anos_membership == 2){

					

					$data_fim_futura = date('Y-m-d',strtotime("+3 year",strtotime($data_inicio_fim_membership->end_date)));

					$wpdb->query("UPDATE civicrm_membership SET status_id = '2',  end_date = '$data_fim_futura' WHERE contact_id = '$id->id'");

					



				

					  

				

				}





				if($quotas_pagas == $total_quotas && $difer_anos_membership == 3){

					

					$data_fim_futura = date('Y-m-d',strtotime("+4 year",strtotime($data_inicio_fim_membership->end_date)));

					$wpdb->query("UPDATE civicrm_membership SET status_id = '2',  end_date = '$data_fim_futura' WHERE contact_id = '$id->id'");

					



				

					  

				

				}



				if($quotas_pagas == $total_quotas && $difer_anos_membership == 4){

					

					$data_fim_futura = date('Y-m-d',strtotime("+5 year",strtotime($data_inicio_fim_membership->end_date)));

					$wpdb->query("UPDATE civicrm_membership SET status_id = '2',  end_date = '$data_fim_futura' WHERE contact_id = '$id->id'");

					



				

					  

				

				}



				if($quotas_pagas == $total_quotas && $difer_anos_membership == 5){



					$data_fim_futura = date('Y-m-d',strtotime("+6 year",strtotime($data_inicio_fim_membership->end_date)));

					$wpdb->query("UPDATE civicrm_membership SET status_id = '2',  end_date = '$data_fim_futura' WHERE contact_id = '$id->id'");

					



				

					  

				

				}





				}

		}

		//////////////////////////////////////////////////////////////////Entidade 11803////////////////////////////////////////////


			
		}
		else {
			
		if($id_maior_1000 >= 1000){
					
					$id = $wpdb->get_row("SELECT id FROM civicrm_contact WHERE id = '$id_maior_1000'");
					$total_quotas =  $wpdb->query("SELECT contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND total_amount = '10.00'");
					$quotas_pagas = $wpdb->query("SELECT contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND total_amount = '10.00' AND contribution_status_id = '1'");
					$data_inicio_fim_membership = $wpdb->get_row("SELECT start_date,end_date FROM civicrm_membership WHERE contact_id = '$id->id'");
					$ano_mais_antigo =  $wpdb->get_row("SELECT MIN(receive_date),contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_status_id = '2'",ARRAY_A);
					$data_mais_recente = $wpdb->get_row("SELECT MAX(receive_date)FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_status_id = '2' AND contribution_page_id ='4'",ARRAY_A);
					$data_mais_recente = $data_mais_recente['MAX(receive_date)']; 			
					$data_mais_antiga = $ano_mais_antigo['MIN(receive_date)']; 
					$ano_mais_antigo = explode("-",$ano_mais_antigo['MIN(receive_date)']);
					$ano_mais_antigo = $ano_mais_antigo[0];

					$contribution_status_id = $ano_mais_antigo['contribution_status_id'];



					if($SubRef == 325){
		            
					$wpdb->query("UPDATE civicrm_contribution SET  contribution_status_id = '1' WHERE contact_id = '$id->id' AND receive_date = '$data_mais_recente'");
						
						}
					

				}
				else {

					
					$id = $wpdb->get_row("SELECT id FROM civicrm_contact WHERE id = '$id_menor_1000'");
					$total_quotas =  $wpdb->query("SELECT contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND total_amount = '10.00'");
					$quotas_pagas = $wpdb->query("SELECT contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND total_amount = '10.00' AND contribution_status_id = '1'");
					$data_inicio_fim_membership = $wpdb->get_row("SELECT start_date,end_date FROM civicrm_membership WHERE contact_id = '$id->id'");
					$ano_mais_antigo =  $wpdb->get_row("SELECT MIN(receive_date),contribution_status_id FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_status_id = '2'",ARRAY_A);
					$data_mais_antiga = $ano_mais_antigo['MIN(receive_date)']; 
					$data_mais_recente = $wpdb->get_row("SELECT MAX(receive_date)FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_status_id = '2' AND contribution_page_id ='4'",ARRAY_A);
					$data_mais_recente = $data_mais_recente['MAX(receive_date)']; 
					

					
					if($SubRef == 325){
				

		         
					$wpdb->query("UPDATE civicrm_contribution SET  contribution_status_id = '1' WHERE contact_id = '$id->id' AND receive_date = '$data_mais_recente'");
						
						


					}



					
				}

		 	}

		}
		}