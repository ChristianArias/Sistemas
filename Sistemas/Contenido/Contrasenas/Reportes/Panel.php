<?php 

	include("../../../conexion.php");

	if(isset($_POST['buscar'])){
		$buscar = $_POST['buscar'];
	}else{
		$buscar = "";
	}

	$id = $_GET["id"];
	$sql = "SELECT * FROM _contrasenas WHERE id = $id";
	$res = mysql_query($sql,$conex) or die (mysql_error());
	$row = mysql_fetch_array($res);


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Reportes contraseñas</title>
	<LINK href="../../../CSS/contenido.css" rel="stylesheet" type="text/css">
	<LINK href="../../../CSS/modal_userpic.css" rel="stylesheet" type="text/css">
	<LINK href="../../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		#datos{
			height: 50%;
			font-size: 10px;
		}
		td,th{
			min-width: 24vw;
			max-width: 24vw;
			word-break: break-all;
			word-wrap: break-word;
		}
		.button{
			width: 100%;
			height: auto;
			font-size: 90%;
		}
		tbody tr:hover{
			background: darkgray;
			color: white;
		}
		tbody a:hover{
			color: red;
		}
		textarea{
			border: none;
			resize: none;
			/*overflow:hidden;*/
			white-space: nowrap;
			text-overflow: ellipsis;
		}	
	</style>
</head>

<body>
	
	<caption id="botones" style="text-align: right">
		<a href="../modificar.php?id=<?php echo $id;?>">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
		<a href="#" onClick="descargarExcel()">Descargar</a>
		<a href="Nuevo.php?id=<?php echo $id; ?>">Agregar</a>
	</caption>
	
	<center>
		
		<div id="busqueda">
			<form action="Panel.php?id=<?php echo $id;?>" method="POST">
				<input type="search" placeholder="Buscar reporte" width="30%" name="buscar" value="<?php echo $buscar;?>">
				<button name="" type="submit">Buscar</button>
			</form>
		</div>
		
		<?php echo $row["servicio"];?>
		
		<div id="informacion">
			<table border="1px" id="datos" width="100%">
				<thead>
					<tr>
						<th onclick="sortTable(0)">Fecha</th>
						<th onclick="sortTable(1)">No. Reporte</th>
						<th onclick="sortTable(2)">Motivo</th>
						<th onClick="sortTable(3)">Observaciones</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>		
		</div>
		
	</center>
</body>
</html>