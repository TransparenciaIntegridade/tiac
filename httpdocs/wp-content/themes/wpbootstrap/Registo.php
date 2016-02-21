<?php 

$data = date('Y-m-d H:i:s');
$ano_atual= date("Y");
global $wpdb;



$total_ids = $wpdb->get_var("SELECT id FROM civicrm_contact WHERE external_identifier !=' ' ");
$total_associados = $wpdb->get_var("SELECT MAX(id) FROM civicrm_contact ");
//$estado_contribuição = $wpdb->get_results("SELECT COUNT(contact_id)  FROM civicrm_contribution WHERE contact_id = '2'  ORDER BY contact_id ASC",ARRAY_A);
//$Ano_bd= $wpdb->get_var("SELECT YEAR(receive_date) FROM civicrm_contribution WHERE contact_id ='2 ' ", OBJECT);
//$atualizaTudo =$wpdb->get_var("SELECT COUNT(contribution_status_id)  FROM civicrm_contribution WHERE contact_id = '$id->id' AND contribution_status_id = '2'AND receive_date LIKE '%$ano_callback%' ORDER BY receive_date DESC");


print_r ($total_associados);

for ($i=0;$i<=$total_associados;$i++)
{    //script para limpar 2015
	//$wpdb ->query("DELETE FROM civicrm_contribution WHERE contribution_status_id = '2' AND YEAR(receive_date) LIKE '%2015%'");
echo "<p>" .$i ."</p>";
$estado_contribuição = $wpdb->get_row("SELECT COUNT(contact_id)  FROM civicrm_contribution WHERE contact_id = '{$i}' AND contribution_page_id ='9' AND YEAR(receive_date) LIKE '%{$ano_atual}%' ",ARRAY_A);
foreach ($estado_contribuição as $ctb ) {
   



if ($ctb  == 0)

//print_r ($total_associados);
{
	
	
 /*$wpdb->insert("civicrm_contribution", array(
     "contact_id" => $i,
     "financial_type_id" => "2",
     "contribution_page_id" => "9",
      "receive_date" => $data,
     "total_amount" => "10.00",
     "currency" => "EUR",
     "source" => "Contribuição Online: ANO QUOTA",
     "contribution_status_id" => "2"));*/
//$wpdb->query("INSERT INTO civicrm_contribution (contact_id, financial_type_id, contribution_page_id, receive_date, total_amount, currency, source, contribution_status_id ) VALUES('2', '2', '9', 'NULL', '10.00', 'EUR', 'NULL', '2') ");



}


}


}
?>