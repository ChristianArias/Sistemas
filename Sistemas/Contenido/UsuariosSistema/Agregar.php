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
			width: 100%;
			resize: none;
		}
		.th{
			text-align: left;
		}
		.capitalize{			
			text-transform:capitalize;
		}
	</style>
</head>

<body class="elemento">
	<caption id="botones" style="text-align: right">
		<a href="Panel.php">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	
	<center>
			
	<table class="width">		
		<caption class="width" id="title">Agregar usuario <label id="e_equipo"></label></caption>
		<tr>
			<th class="th">Nombre</th>
			<td>
				<input type="search" id="nombre" onkeyup="ingreso()" placeholder="Nombre(s)" required class="capitalize">
			</td>
			<th class="th">Apellido</th>
			<td>
				<input type="search" id="apellido" onkeyup="ingreso()" placeholder="Apellido(s)" required class="capitalize">
			</td>
		</tr>
		<tr>
			<th class="th">Usuario</th>
			<td><input type="search" id="usuario" placeholder="Usuario de sistema" required></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th class="th">Contraseña</th>
			<td><input type="password" id="pwd" placeholder="Contraseña" required></td>
			<th class="th">Repetir contraseña</th>
			<td><input type="password" id="pwd1" placeholder="confirmar contraseña" required></td>
		</tr>
		<tr>
			<th class="th">Correo electronico</th>
			<td><input type="search" id="correo" placeholder="Correo electronico"></td>
			<th class="th">Telefono</th>
			<td><input type="search" id="telefono" placeholder="Telefono de contacto"></td>
		</tr>
		<tr><th colspan="4">Comentarios</th></tr>
		<tr>
			<td colspan="4"><textarea id="comentarios" cols="5" rows="5" placeholder="Comentarios"></textarea></td>
		</tr>
		<tr>
			<td colspan="4" align="right">
				<button onClick="guardar()">Guardar</button>
			</td>
		</tr>
	</table>
		
	</center>
</body>
	<script>
		function ingreso(){			
			document.getElementById("e_equipo").innerHTML = 
				document.getElementById('nombre').value+" "+document.getElementById('apellido').value;
		}
		
		function guardar(){
			
			var pwd = document.getElementById("pwd").value;
			var pwd1 = document.getElementById("pwd1").value;
			var nombre = document.getElementById("nombre").value;
			var apellido = document.getElementById("apellido").value;
			var usuario = document.getElementById("usuario").value;
			var correo = document.getElementById("correo").value;
			var telefono = document.getElementById("telefono").value;
			var comentarios = document.getElementById("comentarios").value;
			
			if(!nombre==""){
				if(!apellido==""){
					if(!usuario==""){
						if(!pwd==""||!pwd1==""){
							if(pwd==pwd1){
								
								var save = "nombre="+nombre+"&apellido="+apellido+"&usuario="+usuario+"&contrasena="+pwd+"&correo="+correo+"&telefono="+telefono+"&comentarios="+comentarios;
								
								$.ajax({ 
									type: "GET", 
									url: "con_agregar.php", 
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
	</script>
</html>