<?php

// Crypto Config Options
define('CRYPTO_CIPHER', MCRYPT_RIJNDAEL_256);
define('CRYPTO_MODE', MCRYPT_MODE_CBC);
define('CRYPTO_SITE_KEY', 'This is an application-specific key!');

// File-specific Config Options
define('FILE_STORE', '/var/file-storage/');

?>
