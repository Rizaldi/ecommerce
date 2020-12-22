<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Mycrypt
{	
	function encryptIt( $q ) {
	    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
	    $qEncoded      = str_replace(array('+', '/'), array('-', '_'), base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) ) );
	    return( $qEncoded );
	}

	function decryptIt( $q ) {
	    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
	    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( str_replace(array('-', '_'), array('+', '/'), $q) ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
	    return( $qDecoded );
	}
}

/* End of file Mycrypt.php */
/* Location: ./application/libraries/Mycrypt.php */