<?php 

	include("../../conexion.php");
	
	session_start();
	$user = $_SESSION['sis_id'];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Usuarios</title>
	<LINK href="../../CSS/modal_userpic.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/contenido.css" rel="stylesheet" type="text/css">
	<style>
		table{
			width: 100%;
		}
		.td{
			width: 33%;
			width: 90vh;
			width: 90mh;
		}
		.button{
			width: 100%;
			height: auto;
			font-size: 100%;
		}
		tbody tr:hover{
			background: darkgray;
			color: white;
		}
		tbody a:hover{
			color: red;
		}
	</style>
</head>

<body>
	
	<caption id="botones" style="text-align: right">
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
		<a href="#" onClick="descargarExcel()">Descargar</a>
		<a href="Agregar.php">Agregar</a>
		
		<div style="float: right">
			
		</div>
	</caption>
	
	<div id="informacion">
		<table class="elemento">
			<caption class="elemento"><font size="+3">Usuarios del sistema</font></caption>
			<thead>
				<tr>
					<th class="td">Nombre</th>
					<th class="td">Usuario</th>
					<th class="td">Comentarios</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql = "SELECT * FROM _usuarios WHERE usuarios_usuario NOT LIKE '%root%' AND usuarios_id != $user";
					$res = mysql_query($sql,$conex) or die (mysql_error());
					while($row = mysql_fetch_array($res)){				
				?>
				<tr onClick="modal('Editar.php?id=<?php echo $row["usuarios_id"];?>')" title="Click para editar">
					<td><?php echo $row["usuarios_nombre"]." ".$row["usuarios_apellido"];?></td>
					<td><?php echo $row["usuarios_usuario"];?></td>
					<td><?php echo $row["usuarios_comentarios"];?></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
	
	<div id="openModal" class="modalDialog">
		<div class="elemento">
			<a href="#close" title="Close" class="close">X</a>
			<center></cen><label id="name"></label></center>
			<iframe id="ventana" width="100%" height="100%" src="" class="ventana"></iframe>
		</div>
	</div>
		
</body>
	<script>
		function modal(pagina){
			location.href = pagina;
		}
		
		function descargarExcel(){
			var table= document.getElementById("informacion");
			var html = table.outerHTML;
			window.open('data:application/vnd.ms-excel,' + escape(html));
    	}
	</script>
</html>