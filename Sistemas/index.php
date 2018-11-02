<?php

	$user_agent = $_SERVER['HTTP_USER_AGENT'];

	function getBrowser($user_agent){
		if(strpos($user_agent, 'MSIE') !== FALSE)
			return 'Internet explorer';
	 	elseif(strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge
	   		return 'Microsoft Edge';
	 	elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
			return 'Internet explorer';
	 	elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
	   		return "Opera Mini";
	 	elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
	   		return "Opera";
	 	elseif(strpos($user_agent, 'Firefox') !== FALSE)
	   		return 'Mozilla Firefox';
	 	elseif(strpos($user_agent, 'Chrome') !== FALSE)
	   		return 'Google Chrome';
	 	elseif(strpos($user_agent, 'Safari') !== FALSE)
	   		return "Safari";
	 	else
	   		return 'No hemos podido detectar su navegador';
	}

	$navegador = getBrowser($user_agent);

	// "El navegador con el que estás visitando esta web es: ".$navegador;
	$men = "";
	switch($navegador){
		case "Internet explorer": $men = "Para un mejor funcionamiento se recomienda usar Google Chrome o Firefox";break;
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<LINK href="CSS/index.css" rel="stylesheet" type="text/css">
	<LINK href="CSS/General.css" rel="stylesheet" type="text/css">
	<link rel="icon" href="Iconos/sistema.ico">
<title>Sistemas</title>
</head>
	
<body class="elemento">
	<center><?php echo $men; ?></center>
	<a href="index.php"><img src="Iconos/Logo.png" id="logo"></a>
	<div>
	<form action="loggin.php" method="post">
		<table class="elemento">
			<tr>
				<td class="center">Usuario</td>
			</tr>
			<tr>
				<td><input type="search" class="size center" id="usr" name="usr"></td>
			</tr>
			<tr>				
				<td class="center">Contraseña</td>
			</tr>
			<tr>
				<td><input type="password" class="size center" id="pwd" name="pwd"></td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					<button>Ingresar</button>
				</td>
			</tr>
		</table>
	</form>

	</div>
</body>
</html>