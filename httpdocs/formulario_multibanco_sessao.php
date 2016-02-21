<?php
$nome_servidor = $_SERVER['SERVER_NAME'];

if ( is_user_logged_in() ){




 //header("Location:https://".$nome_servidor."/metodo-de-pagamento-2");
echo "string";

}else{
echo "string1";
//header("Location:https://".$nome_servidor."/metodo-de-pagamento-multibanco");


}






?>