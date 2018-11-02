<?php 

	include("../../conexion.php");

	$dia = $_GET["dia"];
	$month = $_GET["mes"];
	$ano = $_GET["ano"];
	
	session_start();

	$sisid 			= $_SESSION['sis_id'];

	$mes = "";
	switch($month){
		case "01":$mes = "Enero";break;
		case "02":$mes = "Febrero";break;
		case "03":$mes = "Marzo";break;
		case "04":$mes = "Abril";break;
		case "05":$mes = "Mayo";break;
		case "06":$mes = "Junio";break;
		case "07":$mes = "Julio";break;
		case "08":$mes = "Agosto";break;
		case "09":$mes = "Septiembre";break;
		case "10":$mes = "Octubre";break;
		case "11":$mes = "Noviembre";break;
		case "12":$mes = "Diciembre";break;
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/contenido.css" rel="stylesheet" type="text/css">
	<style>
		body{
			background-color: white;
		}
		.td0{
			min-width: 5vw;
			max-width: 5vw;
			word-break: break-all;
			word-wrap: break-word;
			border: 1px solid red;
		}
		.td{
			min-width: 20vw;
			max-width: 20vw;
			word-break: break-all;
			word-wrap: break-word;
			border: 1px solid red;
		}
		#btnver{
			width: 50%;
			height: 3%;
		}
	</style>
</head>

<body class="elemento">
	
	<caption id="botones" style="text-align: right" class="elemento">
		<a href="calendario.php?mes=<?php echo $month;?>&ano=<?php echo $ano;?>">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
		
		Eventos del dia <?php echo $dia." de ".$mes." del ".$ano;?>
		
		<div style="float: right">
			<a href="NuevoEvento.php?mes=<?php echo $month;?>&ano=<?php echo $ano;?>&dia=<?php echo $dia;?>">
				Evento nuevo
			</a>
		</div>
	</caption>
	
	<center>
		
		<table width="100%">
			<thead>
				<th class="td0">ver</th>
				<th class="td">Hora</th>
				<th class="td">Evento</th>
				<th class="td">Comentarios</th>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT * FROM eventoscalendario WHERE usuario = $sisid AND finicio = '$ano-$month-$dia'";
				$resUsuario = mysql_query($sql,$conex) or die (mysql_error());
				while($row = mysql_fetch_array($resUsuario)){
			?>
				<tr>
					<td class="td0" align="center"><a href="Ver.php?id=<?php echo $row["idevento"];?>">
						<img id="btnver" src="../../Iconos/compartir.png"</a>
					</td>
					<td class="td">
						<a href="Ver.php?id=<?php echo $row["idevento"];?>">
							<?php echo $row["inicio"];?>
						</a>
					</td>
					<td class="td"><?php echo $row["titulo"];?></td>
					<td class="td"><?php echo $row["comentarios"];?></td>
				</tr>	
			<?php }?>
			</tbody>
		</table>
	
	</center>
</body>
</html>
	
	<!--

<?php
				$sql = "SELECT * FROM eventoscalendario WHERE usuario = $sisid AND finicio = '$ano-$month-$dia'";
				$resUsuario = mysql_query($sql,$conex) or die (mysql_error());
				while($row = mysql_fetch_array($resUsuario)){
			?>
				<tr>
					<td class="td">
						<a href="Ver.php?id=<?php echo $row["idevento"];?>">
							<?php //echo $row["inicio"];?>
						</a>
					</td>
					<td class="td"><?php //echo $row["titulo"];?></td>
				</tr>	
			<?php }?>