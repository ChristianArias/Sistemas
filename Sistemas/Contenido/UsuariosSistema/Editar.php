<?php 
	
	include("../../conexion.php");
	
	$id = $_GET["id"];
	$sql = "SELECT * FROM _usuarios WHERE usuarios_id = $id";
	$res = mysql_query($sql,$conex) or die (mysql_error());
	$row = mysql_fetch_array($res);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<script src="../../JS/1.8.3/jquery-1.8.3.min.js"></script>
	<script src="../../JS/1.12.4/jquery-1.12.4.js"></script>
	<script src="../../JS/1.12.1/jquery-ui.js"></script>
		
	<style>
		.width{
			width: 80%;
		}
		input{
			width: 100%;
		}
		input[type="password"]{
			width: 98%;
		}
		table{
			position: absolute;
			top: 20%;
			left: 10%;
		}
		textarea{
			width: 99.5%;
			resize: none;
		}
		.th{
			text-align: left;
		}
	</style>
</head>

<body class="elemento">
	
	<caption id="botones" style="text-align: right">
		<a href="Panel.php">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
		<a href="Permisos/Panel.php?id=<?php echo $id;?>">Permisos</a>
	</caption>
	
	<br>
	
	<center>Editar usuario</center>
	
	<table class="width">
		<tr>
			<th class="th">Nombre</th>
			<td><input type="search" id="nombre" onkeyup="ingreso()" placeholder="Nombre(s)" value="<?php echo $row["usuarios_nombre"];?>"></td>
			<th class="th">Apellido</th>
			<td><input type="search" id="apellido" onkeyup="ingreso()" placeholder="Apellido(s)" value="<?php echo $row["usuarios_apellido"];?>"></td>
		</tr>
		<tr>
			<th class="th">Usuario</th>
			<td><input type="search" id="usuario" placeholder="Usuario de sistema" value="<?php echo $row["usuarios_usuario"];?>" class="elemento" disabled></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th class="th">Contraseña</th>
			<td>
				<input type="password" id="pwd" placeholder="Contraseña" value="<?php echo base64_decode($row["usuarios_contrasena"]);?>">
			</td>
			<th class="th">Repetir contraseña</th>
			<td>
				<input type="password" id="pwd1" placeholder="confirmar contraseña" value="<?php echo base64_decode($row["usuarios_contrasena"]);?>">
			</td>
		</tr>
		<tr>
			<th class="th">Correo electronico</th>
			<td><input type="search" id="correo" placeholder="Correo electronico" value="<?php echo $row["usuarios_correo"];?>"></td>
			<th class="th">Telefono</th>
			<td><input type="search" id="telefono" placeholder="Telefono de contacto" value="<?php echo $row["usuarios_telefono"];?>"></td>
		</tr>
		<tr>
			<th class="th">Activo</th>
			<th>
				<input type="checkbox" id="activo" <?php echo $i = $row["usuarios_bloqueado"]==1?$i = "checked":$i = "";?>>
			</th>
			<td></td>
			<td></td>
		</tr>
		<tr><th colspan="4">Comentarios</th></tr>
		<tr>
			<td colspan="4"><textarea id="comentarios" cols="5" rows="5" placeholder="Comentarios"><?php echo $row["usuarios_comentarios"];?></textarea></td>
		</tr>
		<tr>
			<td colspan="2">
				<button>Eliminar</button>
			</td>
			<td colspan="2" align="right">
				<button onClick="guardar(<?php echo $id;?>)">Guardar</button>
			</td>
		</tr>
	</table>
	
</body>
	<script>
		
		function ingreso(){			
			document.getElementById("e_equipo").innerHTML = 
				document.getElementById('nombre').value+" "+document.getElementById('apellido').value;
		}
		
		function guardar(id){
			
			var pwd = document.getElementById("pwd").value;
			var pwd1 = document.getElementById("pwd1").value;
			var nombre = document.getElementById("nombre").value;
			var apellido = document.getElementById("apellido").value;
			var usuario = document.getElementById("usuario").value;
			var correo = document.getElementById("correo").value;
			var telefono = document.getElementById("telefono").value;
			var comentarios = document.getElementById("comentarios").value;
			var activo = document.getElementById("activo").checked;
			
			if(!nombre==""){
				if(!apellido==""){
					if(!usuario==""){
						if(!pwd==""||!pwd1==""){
							if(pwd==pwd1){
								
								var save = "id="+id+"&nombre="+nombre+"&apellido="+apellido+"&usuario="+usuario+"&contrasena="+pwd+"&correo="+correo+"&telefono="+telefono+"&comentarios="+comentarios+"&activo="+activo;
								
								$.ajax({ 
									type: "GET", 
									url: "con_editar.php", 
									data: save,
									success: function(msg){ 
										switch(msg){
											case "OK":
												location.href = "Panel.php";
												break;
											default:
												alert(msg);
												break;
										}
									} 
								});
								
							}else{alert("Verifica las contraseñas");}
						}else{alert("Contraseñas son requerias");}
					}else{alert("Usuario es requerido")}
				}else{alert("Apellido es requerido")}
			}else{alert("Nombre es requerido")}
			
		}
		
		function click() {
			if (event.button==2) {
				alert ('Este boton esta desabilitado.')
			}
		}
		document.onmousedown=click
	</script>
</html>