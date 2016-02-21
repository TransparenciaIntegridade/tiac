<?php
$nome_servidor = $_SERVER['SERVER_NAME'];

if ( is_user_logged_in() ){
echo "<script>";
    echo "window.location = 'https://transparencia.pt/metodo-de-pagamento-2'";
echo "</script>";



 //header("Location:https://".$nome_servidor."/metodo-de-pagamento-2");
//echo "string";

}else{
//echo "string1";
//header("Location:https://".$nome_servidor."/metodo-de-pagamento-multibanco");
echo "<script>";
    echo "window.location = 'https://transparencia.pt/metodo-de-pagamento-multibanco'";
echo "</script>";

}






?>