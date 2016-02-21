<html><body>
<form action="<?php echo($_SERVER[REQUEST_URI]);?>" method="post" enctype="multipart/form-data">
<textarea name="message" cols="30" rows="6"><?php echo($_POST[message]);?></textarea>
<br />
<label for='email_file'>Select A File To Email:</label>
<input type="file" name="email_file">
<br />
<input type="submit" value="Encrypt and send your message">
<hr>
<?php
if(!empty($_POST[message])) {
  $message = $_POST[message];
 
  //Settings
  $mailto = "celso.rodrigues@transparencia.pt";
  $max_allowed_file_size = 5120; // size in KB default 5meg 5120
  $allowed_extensions = array("zip", "doc", "pdf", "png", "jpg", "jpeg", "gif", "bmp");
  $gpglocation = '/usr/bin/gpg';
  $gnupgp = '/home/tiac/.gnupg';
  //$keyid = '0x0998856C26882C3E'; // see: http://business-php.com/opensource/gpg_encrypt/
 
 
  /** ----------- End of config --------------- **/
 
  // pgp_encrypt.php see: http://business-php.com/opensource/gpg_encrypt/
  require_once('gpg_encrypt.php');
 
  //Get the email file information
  $name_of_email_file = basename($_FILES['email_file']['name']);
  //get the file extension of the file
  $type_of_email_file = substr($name_of_email_file, strrpos($name_of_email_file, '.') + 1);
  $size_of_email_file = $_FILES["email_file"]["size"]/1024;//size in KBs
  //Validations
  if($size_of_email_file > $max_allowed_file_size )
  {
    $errors .= "\n Size of file should be less than $max_allowed_file_size";
  }
  //------ Validate the file extension -----
  $allowed_ext = false;
  for($i=0; $i<sizeof($allowed_extensions); $i++)
  {
    if(strcasecmp($allowed_extensions[$i],$type_of_email_file) == 0)
    {
      $allowed_ext = true;
    }
  }
  if(!$allowed_ext)
  {
    $errors .= "\n The email file is not supported file type. ".
    " Only the following file types are supported: ".implode(',',$allowed_extensions);
  }
 
  // Obtain file upload vars
  $tmp_name = $_FILES['email_file']['tmp_name'];
  if (is_uploaded_file($tmp_name)) {
     $file = fopen($tmp_name,'rb');
     $data = fread($file,filesize($tmp_name));
     fclose($file);
 
     // Generate a boundary string
     $semi_rand = md5(time());
     $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
     // Add the headers for a file attachment
     $headers .= "MIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
     // Add a multipart boundary above the plain message
     $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";
     // Base64 encode the file data
     $data = chunk_split(base64_encode($data));
 
     // Add file attachment to the message
     $message .= "--{$mime_boundary}\n" . "Content-Type: {$type_of_email_file};\n" . " name=\"{$name_of_email_file}\"\n" . "Content-Disposition: attachment;\n" . " filename=\"{$name_of_email_file}\"\n" . "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n" . "--{$mime_boundary}--\n";
  }
 
  $gpg = gpg_encrypt("${message}", $gpglocation , $gnupgp);
 
  if("$gpg[2]" == '0') {
     mail($mailto, 'encrypted message of type '.$type_of_email_file, "$gpg[0]", $headers);
     echo('Your message was encrypted and sent');
  } else {
     echo("<pre>\n$gpg[1]</pre><br /><div>$errors</div>");
  }
}
?>
</body>
</html>