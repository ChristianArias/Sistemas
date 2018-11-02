<?php 
	
	include("../../conexion.php");

	if(isset($_POST['buscar'])){
		$buscar = $_POST['buscar'];
	}else{
		$buscar = "";
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
	<LINK href="../../CSS/contenido.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/modal_userpic.css" rel="stylesheet" type="text/css">
	<style>
		table{
			height: 90%;
		}
		.td{
			width: 9%;
			width: 50vh;
			width: 50mh;
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
		.elemento{
			-webkit-user-select: none;
			-khtml-user-select: none;
			-moz-user-select: none;
			-o-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}
	</style>
<body>
	
	<caption id="botones" style="text-align: right" class="elemento">
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
		<a href="#openModal" onClick="cargar('Nuevo.php')">Agregar</a>
		
		<div id="busqueda">
			<center>
				<form action="Panel.php" method="POST">
					<input type="search" placeholder="Buscar contacto" width="30%" name="buscar" value="<?php echo $buscar;?>">
					<button name="" type="submit">Buscar</button>
				</form>
			</center>
		</div>
	</caption>
		
	<br>
	
	<table class="elemento">
		<thead>
			<tr>
				<th>Nombre</th>
				<th></th>
				<th>Telefono</th>
				<th></th>
				<th>Telefono 2</th>
				<th>Correo electronico</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$con = "SELECT * FROM _telefonos WHERE nombreCompleto LIKE '%$buscar%'";
				$res = mysql_query($con,$conex) or die (mysql_error());
				while($row = mysql_fetch_array($res)){
			?>
			<tr>
				<td>
					<a href="#openModal" onClick="alerta('<?php echo $row["id"];?>','<?php echo $row["nombreCompleto"];?>')">
						<?php echo $row['nombreCompleto']; ?></a>
				</td>
                <td><?php echo $row['tipo1']; ?></td>
                <td><?php echo $row['numero1']; ?></td>
                <td><?php echo $row['tipo2']; ?></td>
                <td><?php echo $row['numero2']; ?></td>
                <td><?php echo $row['correoElectronico']; ?></td>
			</tr>
			<?php }?>
		</tbody>
	</table>
	
	<div id="openModal" class="modalDialog">
		<div class="elemento">
			<a href="#close" title="Close" class="close">X</a>
			<center></cen><label id="name"></label></center>
			<iframe id="ventana" width="100%" height="100%" src="" class="ventana"></iframe>
		</div>
	</div>
		
</body>
	<script>
		function cargar(pagina){
			document.getElementById("ventana").src = pagina;
		}
		function alerta(id,name){
			document.getElementById("name").innerHTML = name;
			document.getElementById("ventana").src = "Modificar.php?id="+id;
		}	
	</script>
</html>