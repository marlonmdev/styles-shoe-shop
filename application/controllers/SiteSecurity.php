<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SiteSecurity extends CI_Controller {

	public function _hash_string(){
		$hashed_string = password_hash($str, PASSWORD_BCRYPT, array('cost' => 11));
		return $hashed_string();
	}

	public function _verify_hash($plain_text_str, $hashed_string){
		$result = password_verify($plain_text_str, $hashed_string);
		return result();
	}
}