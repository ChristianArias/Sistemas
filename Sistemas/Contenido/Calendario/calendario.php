<?php
# definimos los valores iniciales para nuestro calendario
//$month=date("n");
//$year=date("Y");

	date_default_timezone_set('America/Mexico_City');

$diaActual=date("j");
$mesActual=date("m");

$month = $_GET["mes"];
$year = $_GET["ano"];
$numMes = date("n");

	$month = $_GET["mes"] != "undefined" ? $_GET["mes"] : date("n") ;
	$year = $_GET["ano"] != "" ? $_GET["ano"] : date("Y") ;

	//secho $month." ".$year;
# Obtenemos el dia de la semana del primer dia
# Devuelve 0 para domingo, 6 para sabado
$diaSemana=date("w",mktime(0,0,0,$month,1,$year))+7;
# Obtenemos el ultimo dia del mes
$ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));
 
$meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
"Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

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
 
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		body{
			background-color:white;			
		}
		#calendar {
			font-family:Arial;
			font-size:20px;
			width: 100%;
			position: absolute;
			bottom: 10%;
			left: 0%;
			min-height: 20vh;
			text-align: center;
			align-content: center;
			background-color: white;
		}
		#calendar caption {
			text-align:center;
			padding:5px 10px;
			background-color:#003366;
			color:#fff;
			font-weight:bold;
		}
		#calendar th {
			background-color:#006699;
			color:#fff;
			width:40px;
		}
		#calendar td {
			text-align:center;
			background-color: white;
			border: 2px solid silver;
			padding:2px 5px;
		}
		#calendar .hoy {
			border: 2px solid black;
			font-weight: bold;
		}
		#calendar .vacia{
			border: none;
		}
		a{
			text-decoration: none;
			color: black;
		}
		a:hover{
			color: darkgray;
		}
	</style>
</head>
 
<body class="elemento">
<table id="calendar" width="100%">
	<caption><?php echo $mes." de ".$year?></caption>
	<tr>
		<th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th>
		<th>Vie</th><th>Sab</th><th>Dom</th>
	</tr>
	<tr bgcolor="silver">
		<?php
		$last_cell=$diaSemana+$ultimoDiaMes;
		// hacemos un bucle hasta 42, que es el máximo de valores que puede
		// haber... 6 columnas de 7 dias
		for($i=1;$i<=49;$i++)
		{
			if($i==$diaSemana)
			{
				// determinamos en que dia empieza
				$day=1;
			}
			if($i<$diaSemana || $i>=$last_cell)
			{
				// celca vacia
				echo "<td class='vacia'>&nbsp;</td>";
			}else{
				// mostramos el dia
				if($day==$diaActual && $month == $mesActual)
					echo "<td class='hoy'><a href='#' onClick='ir($day)'>$day</a></td>";
				else
					echo "<td><a href='#' onClick='ir($day)'>$day</a></td>";
				$day++;
			}
			// cuando llega al final de la semana, iniciamos una columna nueva
			if($i%7==0)
			{
				echo "</tr><tr>\n";
			}
		}
	?>
	</tr>
</table>
</body>
	<script>
		function ir(dia){
			var mes = <?php echo $month; ?>;
			var ano = <?php echo $year; ?>;
			location.href = "dia.php?dia="+dia+"&mes="+mes+"&ano="+ano;
		}
	</script>
</html>