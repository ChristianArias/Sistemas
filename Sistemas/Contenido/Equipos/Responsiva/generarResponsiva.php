<?php

	include("../../../conexion.php");

	$id = $_GET["id"];

	$consulta = "SELECT * FROM equipos WHERE id = $id";
	$resultado = mysql_query($consulta,$conex) or die (mysql_error());
	$row = mysql_fetch_array($resultado);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<script src="../script/1.8.3/jquery-1.8.3.min.js"></script>
<script src="../script/1.12.4/jquery-1.12.4.js"></script>
<script src="../script/1.12.1/jquery-ui.js"></script>

<title>Generar responsiva</title>
</head>

<body onLoad="descargarExcel(responsiva)">

	
	<div id=responsiva>
	
		<center>
			<div style="border:hidden; width:80%; height:80px; text-align: justify;">
				<img src="\\192.168.1.226\Programas\Datos\mileniomotors.png" height="80" width="200">
				<br>
				www.chevroletmilenio.com.mx
			</div><br>
			<div style="border:solid black 2px; width:60%; height:90px; font-size:13px;">
				<br>
				CARTA DE RESPONSIVA DE RESGUARDO<br>
				EQUIPO DE CÓMPUTO
			</div>
		<div style="width:80%; height:40px; text-align: right;">
			<font style="text-align: right; font-size:13px;">
			Zapopan, Jalisco a 
			<?php
				
				date_default_timezone_set('America/Los_Angeles');
				
				$dia = date("d");
				$mes = date("m");
				$año = date("Y");
				
				$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			
				echo $dia." de ".$meses[$mes-1]." del ".$año;
				
			?>
			</font>
		</div>
		</center>
		<center>
			<div style="border:hidden; width:80%; height:30px;">			
				<p style="text-align: left; font-size:13px;">				
					Yo <?php echo $row['_usuario']?>, por medio de la presente hago constar que se me ha entregado un equipo de cómputo con las siguientes características:				
				</p>
			</div>			
			<table border="1" width="80%" style="font-size:13px">
				<tr>
					<td width="50%">Tipo de equipo</td>
					<td width="50%"><?php echo $row["_tipo"]?></td>
				</tr>
			</table>
			<br>
			<table border="1" width="80%" style="font-size:13px">
				<tr>
					<td width="50%">NUMERO DE SERIE</td>
					<td width="50%"><?php echo $row["serie"]?></td>
				</tr>
				<tr>
					<td>MARCA</td>
					<td><?php echo $row["marca"]?></td>
				</tr>
				<tr>
					<td>MODELO</td>
					<td><?php echo $row["modelo"]?></td>
				</tr>
				<tr>
					<td>PROCESADOR / RAM / DD</td>
					<td><?php echo $row["procesador"]." / ".$row["ram"]." / ".$row["discoduro"];?></td>
				</tr>
				<tr>
					<td>SISTEMA OPERATIVO</td>
					<td><?php echo $row["so"]." ".$row["arquitectura"]?></td>
				</tr>
				<tr>
					<td>OBSERVACIONES</td>
					<td><?php echo $row["comentarios"]?></td>
				</tr>
			</table>
			<div style="border:hidden 2px; width:80%; height:50px;">
			
				<p style="text-align: left; font-size:13px;">				
					La utilización del mismo es para uso exclusivo de mis funciones, dentro de la empresa, mismo que podrá ser solicitado y deberá ser devuelto en cualquier momento por Gerencia de Adquisiciones o Recursos Humanos en cualquiera de estos casos:<br><br>
					
					&emsp;&emsp;&emsp;•	En caso de hacer mal uso del equipo.<br>
					&emsp;&emsp;&emsp;•	En caso de que la empresa lo considere necesario.<br>
					&emsp;&emsp;&emsp;•	Rescisión de Contrato<br><br>
					
					De igual manera Yo <?php echo $row['_usuario']?>, seré el (la) responsable del adecuado mantenimiento general, así como del buen uso.<br><br>

					Así mismo, en caso de robo o extravió se tendrá que avisar inmediatamente a Gerencia Administrativa o Recursos Humanos para tomar las medidas necesarias, en este supuesto la persona que extravié o maltrate el equipo y que por negligencia ocasionara la perdida o descompostura del mismo, tendrá que pagar el costo de la compostura o reposición. <br><br>

					Por lo tanto es mi responsabilidad el buen uso y cuidado que se le da al equipo mencionado.				
				</p>
				<center>
					<font style="font-size:13px;">
					<?php 
	
						$asig = split("/",$row["_usuario"]);
						$str = sizeof($asig);
						
						for($i = 0;$i < $str ;$i++){
	
							echo "NOMBRE Y FIRMA _____________________________________________<br>";
			        		echo $asig[$i];
							echo "<br><br>";
							
						}
			        ?>
					</font>
				</center>				
			</div>
		</center>
		<font style="font-size:13px;">
			c.c.p. Expediente.
		</font>
	</div>
	
</body>

	<?php
		
		$nombre = "Responsiva-".$row["serie"].".doc";
		
		header("Content-type: application/vnd.ms-word");
		header("Content-Disposition: attachment;filename=".$nombre);
		header("Pragma: no-cache");
		header("Expires: 0");
		
	?>

<script>
	function parseFecha(fecha){
		var f = fecha.split("-");
		
		var dia = f[2];
		var mes = f[1];
		var ano = f[0];
		
		var meses=new Array;
 				meses['01']= "Enero";
 				meses['02']= "Febrero";
 				meses['03']= "Marzo";
 				meses['04']= "Abril";
 				meses['05']= "Mayo";
 				meses['06']= "Junio";
 				meses['07']= "Julio";
 				meses['08']= "Agosto";
 				meses['09']= "Septiembre";
 				meses['10']= "Octubre";
 				meses['11']="Noviembre";
 				meses['12']="Diciembre";
				
 		var dias= new Array;
 				dias[0]="Domingo";
 				dias[1]="Lunes";
 				dias[2]="Martes";
 				dias[3]="Miercoles";
 				dias[4]="Jueves";
 				dias[5]="Viernes";
 				dias[6]="Sabado";
				
		var dt = new Date(mes+' '+dia+', '+ano);		
		return fecha = dias[dt.getUTCDay()]+","+dia+" de "+meses[mes]+" del "+ano;
	}
</script>

</html>