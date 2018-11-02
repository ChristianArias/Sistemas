<?php
	
	$user = $_POST["usr"];
	$pass = base64_encode($_POST["pwd"]);

	include("conexion.php");

	session_start();

	$bool = false;
		
	$consulta = "select * from usuariosSistema WHERE 
			usuario = '$user' and contrasena like '$pass'
		AND bloqueado != 0";
		
	$resultado = mysql_query($consulta,$conex) or die (mysql_error());
		
	while($fila = mysql_fetch_array($resultado)){
		$bool = true;
		
		$_SESSION["sis_cont"] = 0;
		$_SESSION['sis_id'] = $fila['id'];
		$_SESSION['sis_nombre'] = $fila['usuario'];
		$_SESSION['sis_nombreCompleto'] = $fila['nombre']." ".$fila['apellido'];
		
		$imagen = $fila['fondo'];
		if($imagen == null){
			$_SESSION['sis_foto'] = $_FILES["Iconos/fondo.png"]["tmp_name"];
		}else{
			$_SESSION['sis_foto'] = $fila['fondo'];
			//echo "<script type='text/javascript'>alert('mysql');</script>";
		}
		
		header("location:principal.php");
		
	}if(!$bool){
		echo "<script type=\"text/javascript\">
				alert('Verifica los datos');
				window.history.back();
			</script>";
	}
?>