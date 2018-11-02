<?php 

	$id =$_GET["id"];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		textarea{
			width: 100%;
			min-height: 80vh;
			resize: none;
			pointer-events:none;
		}	
	</style>
</head>

<body>
	<caption id="botones" style="text-align: right" class="elemento">
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	<br>
	<textarea disabled>a</textarea>
</body>
</html>