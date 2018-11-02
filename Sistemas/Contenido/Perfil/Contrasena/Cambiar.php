<?php

	session_start();

	$cont = $_SESSION["sis_cont"];

	$id = $_SESSION['sis_id'];
	$usuario = $_SESSION['sis_nombre'];
	$nombre = $_SESSION['sis_nombreCompleto'];
	
	$mnsj = "La contraseña debe contener al menos 6 caracteres y no debe ser igual a la contraseña anterior.";

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	
	<script src="../../../JS/1.12.1/jquery-ui.js"></script>
	<script src="../../../JS/1.12.4/jquery-1.12.4.js"></script>
	<script src="../../../JS/1.8.3/jquery-1.8.3.min.js"></script>
	
	<LINK href="../../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		table{
			width: 50%;
			position: relative;
			margin: 13% auto;
		}
		#titulo{
			font-size: 50px;
			width: 30%;
			position: absolute;
			top: 10%;
			left: 35%;
		}
		table input{
			width: 100%;
		}
		table label{
			font-size: 10px;
		}
	</style>
</head>

<body class="elemento">
	
	<center><label id="titulo">Cambiar contraseña</label></center>
	
		
	<table>
		<tr><th><?php echo $nombre;?></th></tr>
		<tr><th>Contraseña actual</th></tr>
		<tr><td><input type="password" id="actual"></td></tr>
		<tr><th>Nueva contraseña</th></tr>
		<tr><td><input type="password" id="pwd1"></td></tr>
		<tr><th>Confirmar Contraseña</th></tr>
		<tr><td><input type="password" id="pwd2"></td></tr>
		<tr>
			<td align="center">
				<label id="mensaje">
					La contraseña debe contener al menos 6 caracteres y no debe ser igual a la contraseña anterior.
				</label>
			</td>
		</tr>
		<tr><td align="right"><button onClick="actualizar()">Actualizar</button></td></tr>
	</table>
		
	
</body>
	<script>
		function actualizar(){
			var id = <?php echo $id;?>;
			var actual = document.getElementById("actual");
			var pwd1 = document.getElementById("pwd1");
			var pwd2 = document.getElementById("pwd2");
			var mensaje = document.getElementById("mensaje");
			var msg = "La contraseña debe contener al menos 6 caracteres y no debe ser igual a la contraseña anterior.";
			
			//if(Boolean(actual.value)){
			//	actual.style.border = '1px solid black';
				if(Boolean(pwd1.value) && pwd1.value.length >= 6){
					pwd1.style.border = '1px solid black';
					if(Boolean(pwd2.value) && pwd1.value.length >= 6){
						pwd2.style.border = '1px solid black';
						if(pwd1.value == pwd2.value){
							mensaje.innerHTML = "Verificando contraseña actual";
							$.ajax({
								type: 	"GET", 
								url: 	"Verificar.php", 
								data: 	"id="+id+"&actual="+actual.value+"&nueva="+pwd1.value,
								success: function(msg){ 
									var mnsg = msg.split(',');
									switch(mnsg[0]){
										case "OK":
											mensaje.innerHTML = "Contraseña actualizada "+mnsg[1];
											//location.href = "../../Principal/Principal.php";
											break;
										case "FALSE":
											actual.style.border = '1px solid red';
											mensaje.innerHTML = mnsg[1];											
											break;
										default:
											mensaje.innerHTML = msg;
											break;
									}
								}
							});
						}else{
							pwd1.style.border = '1px solid red';
							pwd2.style.border = '1px solid red';
							mensaje.innerHTML = "Las contraseñas no son identicas.";
						}
					}else{
						pwd2.style.border = '1px solid red';
						mensaje.innerHTML = msg;
					}
				}else{
					pwd1.style.border = '1px solid red';
					mensaje.innerHTML = msg;
				}
			/*}else{
				mensaje.innerHTML = "Verifica tu contraseña actual.";
				actual.style.border = '1px solid red';
			}*/
		}		
	</script>
</html>