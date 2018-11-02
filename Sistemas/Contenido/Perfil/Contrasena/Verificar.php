<?php 

	include("../../../conexion.php");

	$id = $_GET["id"];
	$actual = base64_encode($_GET["actual"]);
	$nueva = base64_encode($_GET["nueva"]);

	$bool = false;
	$consulta = "select * from usuariosSistema WHERE id = $id AND contrasena = '$actual'";
	$resultado = mysql_query($consulta,$conex) or die (mysql_error());
		
	while($fila = mysql_fetch_array($resultado)){
		$bool = true;
		$con = "UPDATE _usuarios SET usuarios_contrasena = '$nueva' WHERE usuarios_id = $id";
		$res = mysql_query($con,$conex) or die (mysql_error());
		if($res>0){
			echo "OK,OK";			
		}
	}if(!$bool){
		echo "FALSE,Verifica la contraseña.";
	}
?>