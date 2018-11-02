<?php 
	
	include("../../../conexion.php");

	$id = $_GET["id"];
	$con = "SELECT * FROM reportes_impresoras WHERE id = $id";
	$res = mysql_query($con,$conex) or die (mysql_error());
	$row = mysql_fetch_array($res);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	<style>
		textarea{
			width: 100%;
			resize: none;
		}
	</style>
</head>

<body>
	<?php
		echo "<center>Reporte<br>".$row["idreporte"]."<br>Impresora:<br>".$row['nombre']."[".$row['serie']."/".$row['area']."/".$row['agencia']."]</center>";
		echo "Falla reportada:<br><textarea rows='10' readonly>".$row['fallareportada']."</textarea><br><br>";
	
		echo "Trabajo efectuado:<br><textarea rows='10' readonly>".$row['trabajoefectuado']."</textarea>";
	?>
</body>
</html>