<?

/**
* Encrypts a string with GPG
* Based on code by ajv-php at erkle dot org
*/
class gpg {

	/**
	* Encrypts data with GPG
	* @param string keyring location
	* @param string receiving user
	* @param string data to be encrypted
	* example: gpg_encrypt("/home/username/.gnupg", "to@domain.com", "dummy text to be encrypted");
	*/
	function gpg_encrypt($keyring_location, $public_key_id, $plain_text) {
		$key_id = EscapeShellArg($public_key_id);
		$keyring_location = EscapeShellArg($keyring_location);
		
		// encrypt the message
		$cmd = '/usr/bin/gpg --encrypt --homedir '.$keyring_location.'  --armor --batch --recipient  "'.$public_key_id.'"';
		
		$prefix = 'php-gpg';
		
		$tmpfile = tempnam('/tmp', $prefix);
		$cmd = $cmd." 2>&1 > ".$tmpfile;
		
		$pipe = popen($cmd, 'w');
		if (!$pipe) {
			unlink($tmpfile);
		} 
		else {
			fwrite($pipe, $plain_text, strlen($plain_text));
			pclose($pipe);
			$fd = fopen($tmpfile, "rb");
			$output = fread($fd, filesize($tmpfile));
			fclose($fd);
			unlink($tmpfile);
		}
		return $output;
	}

}

?>
