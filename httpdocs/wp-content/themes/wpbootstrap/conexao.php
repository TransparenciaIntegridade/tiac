<?php
$erro_conexao = "Erro ao ligar a base de dados. Por favor contacte o administrador do site";
mysql_connect("localhost","dmanlanc_admin","Tiac2013") or die($erro_conexao);
mysql_select_db("tiac_civicrm_fin") or die($erro_conexao);
?>