<?php

require_once './config.php';
require_once './classes/crypto.class.php';
require_once './classes/files.class.php';

$uploaded_file = new File('file');



?>
<form enctype="multipart/form-data" action="index.php" method="post">
	<input name="file" type="file" /><br />
	<input type="submit" value="Upload File" />
</form>
