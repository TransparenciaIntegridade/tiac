<?php
/*
 +--------------------------------------------------------------------+
 | CiviCRM version 4.6                                                |
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC (c) 2004-2015                                |
 +--------------------------------------------------------------------+
 | This file is a part of CiviCRM.                                    |
 |                                                                    |
 | CiviCRM is free software; you can copy, modify, and distribute it  |
 | under the terms of the GNU Affero General Public License           |
 | Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
 |                                                                    |
 | CiviCRM is distributed in the hope that it will be useful, but     |
 | WITHOUT ANY WARRANTY; without even the implied warranty of         |
 | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
 | See the GNU Affero General Public License for more details.        |
 |                                                                    |
 | You should have received a copy of the GNU Affero General Public   |
 | License and the CiviCRM Licensing Exception along                  |
 | with this program; if not, contact CiviCRM LLC                     |
 | at info[AT]civicrm[DOT]org. If you have questions about the        |
 | GNU Affero General Public License or the licensing of CiviCRM,     |
 | see the CiviCRM license FAQ at http://civicrm.org/licensing        |
 +--------------------------------------------------------------------+
 */


require_once '../civicrm.config.php';
require_once 'CRM/Core/Config.php';
require_once 'CRM/Utils/Request.php';
$config = CRM_Core_Config::singleton();

CRM_Utils_System::authenticateScript(TRUE);

$job = CRM_Utils_Request::retrieve('job', 'String', CRM_Core_DAO::$_nullArray, FALSE, NULL, 'REQUEST');

require_once 'CRM/Core/JobManager.php';
$facility = new CRM_Core_JobManager();

if ($job === NULL) {
  $facility->execute();
}
else {
  $ignored = array("name", "pass", "key", "job");
  $params = array();
  foreach ($_REQUEST as $name => $value) {
    if (!in_array($name, $ignored)) {
      $params[$name] = CRM_Utils_Request::retrieve($name, 'String', CRM_Core_DAO::$_nullArray, FALSE, NULL, 'REQUEST');
    }
  }
  $facility->setSingleRunParams('job', $job, $params, 'From cron.php');
  $facility->executeJobByAction('job', $job);
}








$data = date('Y-m-d H:i:s');
$ano_atual= date("Y");
global $wpdb;



$total_ids = $wpdb->get_results("SELECT id FROM civicrm_contact WHERE external_identifier !=' ' ", OBJECT);
$total_associados = $wpdb->get_var("SELECT MAX(id) FROM civicrm_contact ");
//$estado_contribuição = $wpdb->get_results("SELECT COUNT(contact_id)  FROM civicrm_contribution WHERE contact_id = '2'  ORDER BY contact_id ASC",ARRAY_A);
//$Ano_bd= $wpdb->get_var("SELECT YEAR(receive_date) FROM civicrm_contribution WHERE contact_id ='2 ' ", OBJECT);


 //$wpdb->get_row("DELETE from wp_users where user_registered = '0000-00-00 00:00:00'";


for ($i=0;$i<=$total_associados;$i++)
{
  $wpdb->query("DELETE from wp_users where user_registered = '0000-00-00 00:00:00'");

$estado_contribuição = $wpdb->get_row("SELECT COUNT(contact_id)  FROM civicrm_contribution WHERE contact_id = '{$i}' AND contribution_page_id ='9'  AND YEAR(receive_date) LIKE '%{$ano_atual}%' ",ARRAY_A);
foreach ($estado_contribuição as $ctb ) {
   

//print_r ($ctb);

if ($ctb == 0  )


{
  
  
 $wpdb->insert("civicrm_contribution", array(
     "contact_id" => $i,
     "financial_type_id" => "2",
     "contribution_page_id" => "9",
      "receive_date" => $data,
     "total_amount" => "12.00",
     "currency" => "EUR",
     "source" => "Contribuição Online: ANO QUOTA",
     "contribution_status_id" => "2"));
//$wpdb->query("INSERT INTO civicrm_contribution (contact_id, financial_type_id, contribution_page_id, receive_date, total_amount, currency, source, contribution_status_id ) VALUES('2', '2', '9', 'NULL', '10.00', 'EUR', 'NULL', '2') ");



}


}


}

