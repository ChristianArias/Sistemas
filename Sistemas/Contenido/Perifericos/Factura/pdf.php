<?php

	$fichero = base64_decode($_GET["archivo"]);

	header('Content-Type: application/pdf');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	ob_clean();
	flush();
	readfile($fichero);

?>