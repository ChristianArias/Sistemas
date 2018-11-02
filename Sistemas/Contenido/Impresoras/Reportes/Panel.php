<?php 

	include("../../../conexion.php");

	$id = $_GET["id"];

	$sql = "SELECT * FROM impresoras WHERE id = $id";					
	$resUsuario = mysql_query($sql,$conex) or die (mysql_error());
	$row = mysql_fetch_array($resUsuario);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
	<LINK href="../../../CSS/modal_userpic.css" rel="stylesheet" type="text/css">
	<LINK href="../../../CSS/contenido.css" rel="stylesheet" type="text/css">
	<LINK href="../../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		
		table{
			table-layout: fixed;
		}
		tbody td{
			width: 25%;
			width: 100vh;
			width: 100mh;
			table-layout: fixed;
		}
		tbody th{
			width: 14%;
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
			width: 99%;
			resize: none;
		}	
		.size{
			font-size: 150%;
		}
	</style>
<body>
	
	<div id="informacion" class="fixedHeaderTable">
		<caption id="botones" style="text-align: right">
			<a href="../Panel.php">Regresar</a>
			<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
			<a href="#" onClick="descargarExcel()">Descargar</a>
			<a href="Nuevo.php?id=<?php echo $id;?>" onClick="alerta('Nuevo.php',<?php echo $id;?>)" class="ri">
				Agregar reporte
			</a>
		</caption>
			<table id="datos" width="100%">				
				<caption>
					<p align="center" class="size">Reportes
						<?php
							$i = strlen($row["serie"])-6;
							echo $row["nombre"]." ( ".substr($row["serie"],0,$i).'<font style="text-decoration:underline;">'.substr($row["serie"],-6).'</font>'." )";
						?>		
					</p>
				</caption>
				
				<thead>
				<tr>
					<th>Fecha</th>
					<th>Reporte</th>
					<th>Falla reportada</th>
					<th>Trabajo efectuado</th>
				</tr>
				</thead>
				<tbody>
					<?php
						$sql = "SELECT * FROM _impresoras_reportes WHERE idImpresora = $id";					
						$resUsuario = mysql_query($sql,$conex) or die (mysql_error());
						while($row = mysql_fetch_array($resUsuario)){
					?>
					<tr onClick="editar(<?php echo $row["id"];?>)">
						<td title="<?php echo $row["fecha"];?>" align="center">
							<?php 
								$fecha = $row["fecha"];
								$strFecha = split("-",$fecha);
								$fechats = strtotime($fecha);
							
								switch (date('w', $fechats)){ 
									case 0: $dia = "Domingo"; break; 
									case 1: $dia = "Lunes"; break; 
									case 2: $dia = "Martes"; break; 
									case 3: $dia = "Miercoles"; break; 
									case 4: $dia = "Jueves"; break; 
									case 5: $dia = "Viernes"; break; 
									case 6: $dia = "Sabado"; break; 
								}
							
								switch($strFecha[1]){
									case 1: $mes 	= "Enero";break;
									case 2: $mes 	= "Febrero";break;
									case 3: $mes 	= "Marzo";break;
									case 4: $mes 	= "Abril";break;
									case 5: $mes 	= "Mayo";break;
									case 6: $mes 	= "Junio";break;
									case 7: $mes 	= "Julio";break;
									case 8: $mes 	= "Agosto";break;
									case 9: $mes 	= "Septiembre";break;
									case 10: $mes 	= "Octubre";break;
									case 11: $mes 	= "Noviembre";break;
									case 12: $mes 	= "Diciembre";break;
								}
							
								echo $dia.",".$strFecha[2]." de ".$mes." del ".$strFecha[0];
							?>
						</td>
						<td align="center"><?php echo $row["idReporte"];?></td>
						<td><?php echo $row["fallaReportada"];?></td>
						<td><?php echo $row["trabajoEfectuado"];?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	
	<div id="openModal" class="modalDialog">
		<div class="elemento">
			<a href="#close" title="Close" class="close">X</a>
			<iframe id="ventana" width="100%" height="100%" src="" class="ventana">
			
			</iframe>
		</div>
	</div>
		
</body>
	<script>
		function alerta(pagina,id){
			document.getElementById("ventana").src = pagina+"?id="+id;
		}
		function editar(reporte){
			location.href = "Editar.php?id="+reporte;
		}
		function descargarExcel(){
       		var table= document.getElementById("datos");
 			var html = table.outerHTML;
 			window.open('data:application/vnd.ms-excel,' + escape(html));
    	}
	</script>
</html>