<?php
global $wpdb;

$external_id = $wpdb->get_row("SELECT external_identifier FROM wp_users WHERE id = '{$user_id}'");

$id_contatos = $wpdb->get_row("SELECT COUNT(id) FROM civicrm_contact WHERE external_identifier IS NOT NULL ");
echo "string";
var_dump($id_contatos);

$total_associados = ;

$quotas_atuais = $wpdb->get_row("SELECT receive_date,contribution_status_id FROM civicrm_contribution WHERE contact_id = {$id_contatos->id} AND total_amount = '10.00' AND receive_date LIKE '%{$ano_atual}%' ORDER BY receive_date DESC",ARRAY_A);
	
$contribution_status_id_quotas_atuais = $quotas_atuais['contribution_status_id'];





?>