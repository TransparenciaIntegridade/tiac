<?php

function smart_resize_image($file,
                              $width              = 0, 
                              $height             = 0, 
                              $proportional       = false, 
                              $output             = 'file', 
                              $delete_original    = true, 
                              $use_linux_commands = false,
  							  $quality = 100
  		 ) {
      
    if ( $height <= 0 && $width <= 0 ) return false;

    # Setting defaults and meta
    $info                         = getimagesize($file);
    $image                        = '';
    $final_width                  = 0;
    $final_height                 = 0;
    list($width_old, $height_old) = $info;
	$cropHeight = $cropWidth = 0;

    # Calculating proportionality
    if ($proportional) {
      if      ($width  == 0)  $factor = $height/$height_old;
      elseif  ($height == 0)  $factor = $width/$width_old;
      else                    $factor = min( $width / $width_old, $height / $height_old );

      $final_width  = round( $width_old * $factor );
      $final_height = round( $height_old * $factor );
    }
    else {
      $final_width = ( $width <= 0 ) ? $width_old : $width;
      $final_height = ( $height <= 0 ) ? $height_old : $height;
	  $widthX = $width_old / $width;
	  $heightX = $height_old / $height;

	  $x = min($widthX, $heightX);
	  $cropWidth = ($width_old - $width * $x) / 2;
	  $cropHeight = ($height_old - $height * $x) / 2;
    }

    # Loading image to memory according to type
    switch ( $info[2] ) {
      case IMAGETYPE_JPEG:  $image = imagecreatefromjpeg($file);  break;
      case IMAGETYPE_GIF:   $image = imagecreatefromgif($file);   break;
      case IMAGETYPE_PNG:   $image = imagecreatefrompng($file);   break;
      default: return false;
    }
    
    
    # This is the resizing/resampling/transparency-preserving magic
    $image_resized = imagecreatetruecolor( $final_width, $final_height );
    if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
      $transparency = imagecolortransparent($image);
      $palletsize = imagecolorstotal($image);

      if ($transparency >= 0 && $transparency < $palletsize) {
        $transparent_color  = imagecolorsforindex($image, $transparency);
        $transparency       = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
        imagefill($image_resized, 0, 0, $transparency);
        imagecolortransparent($image_resized, $transparency);
      }
      elseif ($info[2] == IMAGETYPE_PNG) {
        imagealphablending($image_resized, false);
        $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
        imagefill($image_resized, 0, 0, $color);
        imagesavealpha($image_resized, true);
      }
    }
    imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);


    # Taking care of original, if needed
    if ( $delete_original ) {
      if ( $use_linux_commands ) exec('rm '.$file);
      else @unlink($file);
    }

    # Preparing a method of providing result
    switch ( strtolower($output) ) {
      case 'browser':
        $mime = image_type_to_mime_type($info[2]);
        header("Content-type: $mime");
        $output = NULL;
      break;
      case 'file':
        $output = $file;
      break;
      case 'return':
        return $image_resized;
      break;
      default:
      break;
    }
    
    # Writing image according to type to the output destination and image quality
    switch ( $info[2] ) {
      case IMAGETYPE_GIF:   imagegif($image_resized, $output);    break;
      case IMAGETYPE_JPEG:  imagejpeg($image_resized, $output, $quality);   break;
      case IMAGETYPE_PNG:
        $quality = 9 - (int)((0.9*$quality)/10.0);
        imagepng($image_resized, $output, $quality);
        break;
      default: return false;
    }

    return true;
  }

function existe_utilizador($username){

	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`n_de_s_cio_1`) FROM `civicrm_value_numero_de_s_cio_1` WHERE `username` = '$username'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function existe_email($email_alternativo__8){

	$email_alternativo__8 = sanitize($email_alternativo__8);
	$query = mysql_query("SELECT COUNT(`n_de_s_cio_1`) FROM `civicrm_value_numero_de_s_cio_1` WHERE `email_alternativo__8` = '$email_alternativo__8'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function sanitize($data){

	return mysql_real_escape_string($data);
}

function array_sanitize(&$item){

	$item = mysql_real_escape_string($item);
}

function id_utilizador($username){

	$username = sanitize($username);
	$query = mysql_query("SELECT (`n_de_s_cio_1`) FROM `civicrm_value_numero_de_s_cio_1` WHERE `username` = '$username'");
    return mysql_result($query, 0,'n_de_s_cio_1');
}

function login($username,$password){

	$id_utilizador = id_utilizador($username);
	$username = sanitize($username);
	$password = md5($password);

	$query = mysql_query("SELECT COUNT(`n_de_s_cio_1`) FROM `civicrm_value_numero_de_s_cio_1` WHERE `username` = '$username' AND `password` = '$password'");
	return (mysql_result($query, 0) == 1) ? $id_utilizador : false;

}

function mostrar_erros($erros){

	$output = array();
	foreach ($erros as $erro) {
		$output[] = "<li>" . $erro . "</li>";
	}
	return "<ul>" . implode("",$output) . "</ul>";
}

function registar_utilizador($dados_utilizador){

	array_walk($dados_utilizador, "array_sanitize");
	$dados_utilizador['password'] = md5($dados_utilizador['password']);
	$campos = "`" . implode("`, `", array_keys($dados_utilizador)) . "`";
	$data = '\'' .implode('\', \'',$dados_utilizador) . '\'';

	mysql_query("INSERT INTO `civicrm_value_numero_de_s_cio_1` ($campos) VALUES ($data)");
}

function esta_logado(){

	return (isset($_SESSION['n_de_s_cio_1'])) ? true : false;
}

function data_utilizador($n_de_s_cio_1){

	$data = array();
	$n_de_s_cio_1 = (int) $n_de_s_cio_1;

	$func_num_args = func_num_args();
	$func_get_args = func_get_args();

	if($func_num_args > 1){
		unset($func_get_args[0]);
	}

	$campos = "`" . implode("`, `", $func_get_args) . "`";
	$data = mysql_fetch_assoc(mysql_query("SELECT $campos FROM `civicrm_value_numero_de_s_cio_1` WHERE `n_de_s_cio_1` = $n_de_s_cio_1"));
	return $data;

}

function alterar_password($n_de_s_cio_1,$password){

	$n_de_s_cio_1 = (int) $n_de_s_cio_1;
	$password = md5($password);

	mysql_query("UPDATE `civicrm_value_numero_de_s_cio_1` SET `password` = '$password' WHERE `n_de_s_cio_1` = $n_de_s_cio_1");
}

function id_utilizador_email($email_alternativo__8){

	$email_alternativo__8 = sanitize($email_alternativo__8);
	$query = mysql_query("SELECT (`n_de_s_cio_1`) FROM `civicrm_value_numero_de_s_cio_1` WHERE `email_alternativo__8` = '$email_alternativo__8'");
    return mysql_result($query, 0,'n_de_s_cio_1');
}

function recuperar_password($email_alternativo__8){

	$email_alternativo__8 = sanitize($email_alternativo__8);
	$data_utilizador = data_utilizador(id_utilizador_email($email_alternativo__8), 'nome_completo_2','password');

	$gera_password = substr(md5(rand(999,999999)),0,14);
	alterar_password($data_utilizador['n_de_s_cio_1'],$gera_password);
	mail($email_alternativo__8, utf8_decode("Recuperação de Password"), utf8_decode("Olá " . $data_utilizador['nome_completo_2'] . "\n\nSua nova password é: " . $gera_password));

}

function atualizar_perfil($dados_perfil){
	
	$atualizar = array();
	array_walk($dados_perfil, "array_sanitize");

	foreach ($dados_perfil as $campos => $data) {
		$atualizar[] = '`' . $campos . '` = \'' . $data . '\'';
	}

	mysql_query("UPDATE `civicrm_value_numero_de_s_cio_1` SET" . implode(", ", $atualizar) . "WHERE `n_de_s_cio_1` = ".$_SESSION['n_de_s_cio_1'])or die(mysql_error());
}

function upload_foto_perfil($n_de_s_cio_1,$ficheiro_temp,$extensao_ficheiro){
    
    $n_de_s_cio_1 = (int) $n_de_s_cio_1;
	$caminho_ficheiro = "wp-content/themes/wpbootstrap/assets/profile/" . substr(md5(time()),0, 10) . "." . $extensao_ficheiro;
	$ficheiro = $ficheiro_temp;
	$ficheiro_redimensionado = $caminho_ficheiro;
	smart_resize_image($ficheiro , 100 , 100 , false , $ficheiro_redimensionado , false , false ,100 );
	move_uploaded_file($ficheiro_redimensionado, $caminho_ficheiro);
	mysql_query("UPDATE `civicrm_value_numero_de_s_cio_1` SET `perfil` = '$caminho_ficheiro' WHERE `n_de_s_cio_1` = $n_de_s_cio_1") or die(mysql_error());
}
 
/* Depois para tirar quando for para dividir pelas páginas. Aqui só ficam código das funções*/
if(esta_logado() === true){
   $sessao_numero_socio = $_SESSION['n_de_s_cio_1'];
   $data_utilizador = data_utilizador($sessao_numero_socio,'n_de_s_cio_1','username','password','morada__6','ocupa_o__9','email_alternativo__8','nome_completo_2','perfil');
 }

?> 
<div class="profile">
	 <?php

	 	if(isset($_FILES['perfil'])){
	 		if(empty($_FILES['perfil']['name'])){
	 			echo "Por favor selecione um ficheiro";
	 		}else{
	 			$extensoes = array('jpg','jpeg');
	 			$nome_ficheiro = $_FILES['perfil']['name'];
	 			$ficheiro_temp = $_FILES['perfil']['tmp_name'];
	 			$extensao_ficheiro = strtolower(end(explode(".", $nome_ficheiro)));

	 			if(in_array($extensao_ficheiro, $extensoes)){
	 				upload_foto_perfil($sessao_numero_socio,$ficheiro_temp,$extensao_ficheiro);
	 			}else{
	 				echo "Tipo de ficheiro não permitido. Os tipos permitidos são:";
	 				echo implode(", ", $extensoes);
	 			}
	 		}
	 	}


	 	if(!empty($data_utilizador['perfil'])){
	 		echo '<img src="'. $data_utilizador['perfil'].'" alt="'. $data_utilizador['nome_completo_2'].'">';
	 	}
	  ?>
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="file" name="perfil">
		<input type="submit">
	</form>	  
</div>



