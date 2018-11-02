<?php

	include("../../conexion.php");

	$id = $_GET["id"];
	$consulta = "SELECT * FROM _equipos WHERE id = $id";
	$resultado = mysql_query($consulta,$conex) or die (mysql_error());
	$row = mysql_fetch_array($resultado);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar equipos</title>
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/estyle.css" rel="stylesheet" type="text/css">
	<link href="../../CSS/modal_userpic.css" rel="stylesheet" type="text/css">
	<script src="../../JS/1.8.3/jquery-1.8.3.min.js"></script>
	<script src="../../JS/1.12.4/jquery-1.12.4.js"></script>
	<script src="../../JS/1.12.1/jquery-ui.js"></script>
	<style>
		iframe{
			border: none;
			height: 73vh;
			width: 99.5%;
		}
	</style>
</head>

<body>
	
	<caption id="botones" style="text-align: right">
		<a href="Panel.php">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	
	<br><center><label id="titulo" class="elemento">Actualizar equipo <?php echo $row["nombreRed"];?></label></center><br>
	
	<div class="tab">
		<button class="tablinks" onclick="mostrar('Editar/Descripcion.php?id=<?php echo $id;?>')" id="defaultOpen">Descripción</button>
  		<button class="tablinks" onclick="mostrar('Editar/Arquitectura.php?id=<?php echo $id;?>')">Arquitectura</button>
        <button class="tablinks" onclick="mostrar('Editar/SistemaOperativo.php?id=<?php echo $id;?>')">Sistema operativo</button>
		<button class="tablinks" onclick="mostrar('Editar/Componentes.php?id=<?php echo $id;?>')">Componentes</button>
		<button class="tablinks" onclick="mostrar('Editar/Red.php?id=<?php echo $id;?>')">Red</button>
		<button class="tablinks" onclick="mostrar('Editar/Paqueterias.php?id=<?php echo $id;?>')">Paqueterias / Antivirus</button>
		<button class="tablinks" onclick="mostrar('Editar/Documentacion.php?id=<?php echo $id;?>')">Documentacion</button>
    </div>
	
	<br>
	
	<iframe src="" id="pagina" class="elemento"></iframe>
	
	<?php
		$inactivo = $row["activo"];
		if($inactivo==0){
			echo '<button title="Borrar por completo del sistema" onclick="borrar()">Eliminar</button>';
			echo " ";
			echo '<button title="Reactivar equipo" onClick="papelera(1)">Activar</button>';
		}else{
			echo '<button title="Mandar a papelera" onClick="papelera(0)" class="elemento">Eliminar</button>';
		}
	?>
	<button><a href="#openModal" onClick="pagina('Bitacora/Panel.php?id=<?php echo $id; ?>')">Bitacora</a></button>
	
	<div id="openModal" class="modalDialog">
		<div class="elemento">
			<a href="#close" title="Close" class="close">X</a>
			<iframe id="ventana" width="100%" height="100%" src="" class="ventana"></iframe>
		</div>
	</div>
	
</body>
	<script>
		function pagina(portal){
			document.getElementById("ventana").src = portal;
		}
		
		function borrar(){
			var id = <?php echo $id;?>;	
			resp = confirm("¿Eliminar este equipo?");
			if (resp){
				resp = confirm("¿Deseas continuar?");
				if (resp){
					$.ajax({ 
						type: 	"GET", 
						url: 	"sav_Borrar.php", 
						data: 	"id="+id, 
						success: function(msg){	
							switch(msg){
								case "TRUE":
									location.href = "Panel.php";
									break;
								default:
									alert(msg);
									break;
							}
						}	
					});
				}
			}
		}
		
		function papelera(activo){
			var id = <?php echo $id;?>;
			var mens = activo == 0 ? "¿Mandar a la papelera este equipo?" : "¿Restaurar este equipo?";
			resp = confirm(mens);
			if (resp){
				resp = confirm("¿Deseas continuar?");
				if (resp){
					$.ajax({ 
						type: 	"GET", 
						url: 	"sav_Eliminar.php", 
						data: 	"id="+id+"&activo="+activo, 
						success: function(msg){	
							switch(msg){
								case "TRUE":
									location.href = "Panel.php";
									break;
								default:
									alert(msg);
									break;
							}
						}	
					});
				}
			}else{}
		}
		function mostrar(pagina){
			document.getElementById("pagina").src = pagina;
		}		
		// Get the element with id="defaultOpen" and click on it
		document.getElementById("defaultOpen").click();
	</script>
</html>