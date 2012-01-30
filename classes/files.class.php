<?php

class File {

	private $uploaded;
	private $name;
	private $type;
	private $location;
	private $size;

	function __construct($form_name) {
		if(!is_uploaded_file($_FILES[$form_name]['name']))
			return false;

		if(!$this->check_upload())
			return false;

		$this->name = $_FILES[$form_name]['name'];
		$this->type = $_FILES[$form_name]['type'];
		$this->location = $_FILES[$form_name]['tmp_name'];
		$this->size = $_FILES[$form_name]['size'];
		$this->store_file($this->location, FILE_STORE);
	}

	protected function symmetric_encrypt() {
		$enc = new Encryption(CRYPTO_CIPHER, CRYPTO_MODE, CRYPTO_SITE_KEY);
		return null;
	}

	protected function store_file($file, $location) {
		// TODO: Make this throw up or something
		if(move_uploaded_file($file, $location)) {
			$this->location = $location;
			return true;
		} else {
			return false;
		}
	}

	protected function check_upload() {
		if($_FILES[$form_name]['error'] == UPLOAD_ERR_OK)
			return true;
		else
			return false;
	}

}

?>
