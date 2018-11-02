<?php 
	
	$password = '';
	$lim = $_GET["lim"];
	$i = $_GET["i"];

	$numeros  = '0123456789';
	$compleja = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#%^&*()_,./<>?;:[]{}\|=+';
	$sencilla = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$array = array(
		"tar-GizmoZ","tar-GizmoZ","estinyqEx3","ensudiaLag","Clarin.cSu","autaabandB","77'fuetdKC","quepreseDv",
		"ronautZ8C5","izmodoA4xW","77'fuetaAQ","cialesdGFn","dia-Me48Ax","SfeedUbQAq","arlaherreO","yde'CyPfuB"
	);
	
	switch($i){
		case 0:
			//echo substr( md5(microtime()), 1, $lim);
			echo substr(MD5(rand(5, 100)), 0, $lim);
			break;
		case 1:
			$password = '';
  			$limite = strlen($sencilla) - 1;
			for ($i=0; $i < $lim; $i++) $password .= $sencilla[rand(0, $limite)];
			echo $password;
			break;
		case 2:
			$password = '';
  			$limite = strlen($compleja) - 1;
			for ($i=0; $i < $lim; $i++) $password .= $compleja[rand(0, $limite)];
			echo $password;
			break;
		case 3:
			echo  $array[array_rand($array, 1)];
			break;
		case 4:
			$limite = strlen($numeros) - 1;
			for ($i=0; $i < $lim; $i++) $password .= $numeros[rand(0, $limite)];
			echo $password;
			break;
		default:
			echo "Error";
			break;
	}

?>