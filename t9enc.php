<?php
/**
* T9 Encryption
*
* This is a T9 Encryption class to assist in Encryption
* using T9 method or custom algorithms and Salt Key.
*
* @author 4 Ace Technologies
* @link http://www.4acetech.com
* @email info@4acetech.com
*/
class Encryption {
	
	/* Characters to be replaced with custom values */
	private $char = array(
		'a'=>20, 'b'=>40, 'c'=>80,
		'd'=>91, 'e'=>11, 'f'=>33,
		'g'=>51, 'h'=>64, 'i'=>12,
		'j'=>32, 'k'=>43, 'l'=>23,
		'm'=>54, 'n'=>65, 'o'=>67,
		'p'=>77, 'q'=>73, 'r'=>37, 's'=>30,
		't'=>13, 'u'=>15, 'v'=>17,
		'w'=>92, 'x'=>99, 'y'=>98, 'z'=>87,
		'*'=>76, '#'=>86, ' '=>72, '?'=>75, '.'=>74,
		'0'=>95, '1'=>96, '2'=>97, '3'=>89,
		'5'=>10, '6'=>90, '7'=>81, '8'=>82,
		'9'=>83, '.'=>34, '('=>21, ')'=>36,
		'$'=>44
		);
		
	
	/**
	* Encrypt
	*
	* Encrypts the message according to the Algorithm defined:
	* Algorithm Logic
	* message length concatenates with salt length,
	* concatenates with
	* (message length * salt_length)
	* concatenate with characternumber*(messagelength*saltlength)
	*
	* @string salt
	* @string message
	* @return string output
	*/
	function encrypt($salt, $message) {
		$salt_length = strlen($salt);
		$message_length = strlen($message);
		$characters = str_split($message);
		$limit = trim($message);
		$multiplier = $message_length*$salt_length;
		$output = NULL;
		foreach($characters as $character) {
			$output .= $this->get_number($character) * $multiplier .'.';
		}
		return $output;
	}
	
	/**
	* Get Number
	*
	* Gets the number that replaces the Character
	* for Encryption.
	*
	* @string character
	* @return string number
	*/
	private function get_number($character) {
		return $this->char[strtolower($character)];
	}
	
}
?>