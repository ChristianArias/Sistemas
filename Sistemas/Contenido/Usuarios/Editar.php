<?php

	include("../../conexion.php");

	$id = $_GET["id"];
	$con = "SELECT * FROM _usuario WHERE id = $id";
	$res = mysql_query($con,$conex) or die (mysql_error());
	$row = mysql_fetch_array($res);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
		
	<script src="../../JS/1.8.3/jquery-1.8.3.min.js"></script>
	<script src="../../JS/1.12.4/jquery-1.12.4.js"></script>
	<script src="../../JS/1.12.1/jquery-ui.js"></script>
		
	<style>
		.font{
			font-size: 10px;
		}
		input{
			width: 100%;
		}
		.tabla{
			width: 100%;
			position: absolute;
			bottom: 20%;
			left: 0%;
		}
		textarea{
			resize: none;
			width: 99.4%;
		}
		#mensaje{
			color: red;
		}
	</style>
<body>
	
	<caption id="botones" style="text-align: right">
		<a href="Panel.php">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	
	<br>
	
	<table width="100%" class="elemento font tabla">
		<tr><th colspan="6">Actualizar Usuario</th></tr>
		<tr>
			<th width="5%">No. Vendedor</th>
			<td width="8%"><input type="search" id="no" value="<?php echo $row["novendedor"]; ?>"></td>
			<th width="8%">Nombre</th>
			<td width="35%"><input type="search" id="nombre" value="<?php echo $row["_usuario_nombre"]; ?>"></td>
			<th width="8%">Puesto</th>
			<td width="35%"><input type="search" id="puesto" value="<?php echo $row["puesto"]; ?>"></td>
		</tr>
		<tr>
			<th width="10%" colspan="1">Correo</th>
			<td colspan="3"><input type="email" id="correo" value="<?php echo $row["correo"]; ?>"></td>
			<th width="10%" colspan="1">F&amp;I</th>
			<td colspan="3">
				<select id="fi" title="En caso de no tener dejar vacio" style="width:310px">
					<option value="0"></option>
				  	<?php
						$conUsuario = "SELECT * FROM _usuario ORDER BY _usuario_nombre";
						$resUsuario = mysql_query($conUsuario,$conex) or die (mysql_error());
						while($res = mysql_fetch_array($resUsuario)){
							$res["id"] == $row["usuario"] ? $selected = 'selected="selected"' : $selected = "";
							echo '<option value="'.$res['id'].'" '.$selected.' >'.$res['_usuario_nombre'].'</option>';
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<th width="10%" colspan="1">Area</th>
			<td width="40%" colspan="3">
				<select id="area" style="width:310px">
					<?php
						$conArea = "SELECT * FROM _areas ORDER BY _areas_nombre";
						$resArea = mysql_query($conArea,$conex) or die (mysql_error());
						while($res = mysql_fetch_array($resArea)){
							$res["id"] == $row["area"] ? $selected = 'selected="selected"' : $selected = "";
							echo '<option value="'.$res['id'].'" '.$selected.' >'.$res['_areas_nombre'].'</option>';
						}
					?>
				</select>
			</td>
			<th width="10%" colspan="1">Agencia</th>
			<td width="40%" colspan="3">
				<select id="agencia" style="width:310px">
					<?php
						$conAgencia = "SELECT * FROM _agencia ORDER BY _agencia_nombre";
						$resAgencia = mysql_query($conAgencia,$conex) or die (mysql_error());
						while($res = mysql_fetch_array($resAgencia)){
							$res["id"] == $row["agencia"] ? $selected = 'selected="selected"' : $selected = "";
							echo '<option value="'.$res['id'].'" '.$selected.' >'.$res['_agencia_nombre'].'</option>';
						}
					?>
				</select>
			</td>
		</tr>
		<tr><th colspan="6">Comentarios</th></tr>
		<tr><td colspan="6"><textarea rows="5" id="comentario"><?php echo $row["comentario"]; ?></textarea></td></tr>
		<tr><td colspan="6" align="right"><button onClick="guardar()">Actualizar</button></td></tr>
		<tr><td colspan="6" align="center"><label id="mensaje"></label></td></tr>
	</table>
</body>
	<script>
		function guardar(){			
			
			var id = <?php echo $id;?>;
			var no = document.getElementById('no').value;
			var nombre = document.getElementById('nombre').value;
			var puesto = document.getElementById('puesto').value;
			var correo = document.getElementById('correo').value;
			var fi = document.getElementById('fi').value;
			var area = document.getElementById('area').value;
			var comentario = document.getElementById('comentario').value;
			var agencia = document.getElementById('agencia').value;
			
			if(nombre == ""){
				alert("Nombre no puede ir vacio");
			}else{
				$.ajax({ 
					type: 	"POST", 
					url: 	"save_Editar.php",
					data:	"id="+id+"&nombre="+nombre+"&puesto="+puesto+"&correo="+correo+"&no="+no+"&fi="+fi+"&area="+area+"&comentario="+comentario+"&agencia="+agencia, 
					success: function(msg){
						switch(msg){
							case "OK":
								document.getElementById("mensaje").innerHTML = "Se actualizo, cierra la ventana para continuar";
								break;
						}
					} 
				});
			}
		}
	</script>
</html>