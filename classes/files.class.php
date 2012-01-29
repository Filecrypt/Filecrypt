<?php

class File {

	private $uploaded;
	private $name;
	private $type;
	private $location;
	private $size;

	function __construct() {
		$this->name = $_FILES['uploadedfile']['name'];
		$this->type = $_FILES['uploadedfile']['type'];
		$this->location = $_FILES['uploadedfile']['tmp_name'];
		$this->size = $_FILES['uploadedfile']['size'];
		$this->symmetric_encrypt();
	}

	protected function symmetric_encrypt() {
		require_once 'crypto.class.php';
		$enc = new Encryption(CRYPTO_CIPHER, CRYPTO_MODE);
		$data = $enc->encrypt('test','key');
		echo $enc->armor($data);
		die();
	}

	protected function store_file() {
		
	}

}

?>
