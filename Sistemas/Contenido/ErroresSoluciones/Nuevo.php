<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
	
	<script src="../../JS/1.8.3/jquery-1.8.3.min.js"></script>
	<script src="../../JS/1.12.4/jquery-1.12.4.js"></script>
	<script src="../../JS/1.12.1/jquery-ui.js"></script>

	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		.table{
			width: 80%;
			position: absolute;
			top: 15%;
			right: 10%
		}
		input[type="search"]{
			width: 100%;
		}
		select{
			width: 80%;
		}
		textarea{
			width: 99.5%;
			height: 80%;
			resize: none;
		}
		#mensaje{
			border: none;
		}
	</style>
<body>
	<caption id="botones" style="text-align: right">
		<a href="Panel.php">Regresar</a>
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
	</caption>
	
	<center>
		<table width="100%" class="elemento">
			<tr><th width="10%">Nombre</th><td colspan="2"><input type="search" id="nombre" name="nombre" required></td></tr>
			<tr><th colspan="3">Contenido</th></tr>
			<tr><td colspan="3"><textarea id="contenido" name="contenido" rows="15" required></textarea></td></tr>
			<tr><td colspan="3"><input type="search" id="mensaje" disabled class="elemento"></td></tr>
			<tr>
				<td align="right" colspan="3">
					<select>
						<option value="w" title="Apertura para sólo escritura; coloca el puntero al fichero al principio del fichero y trunca el fichero a longitud cero. Si el fichero no existe se intenta crear.">Sobre escribir contenido</option>
						<option value="a" title="Apertura para sólo escritura; coloca el puntero del fichero al final del mismo. Si el fichero no existe, se intenta crear.">Agregar contenido al final</option>
					</select>
				
				<input type="submit" value="Guardar" onClick="guardar()"></td>
			</tr>			
		</table>
	</center>
</body>
	<script>
		function guardar(){
			var nombre = document.getElementById("nombre").value;
			var contenido = document.getElementById("contenido").value;
			
			if(nombre == ""){
				document.getElementById("mensaje").value = "Nombre no puede ir vacio";
			}else{
				$.ajax({ 
					type: 	"GET", 
					url: 	"save_Nuevo.php",
					data:	"nombre="+nombre+"&contenido="+contenido, 
					success: function(msg){
						document.getElementById("mensaje").value = msg;
						switch(msg){
							case "Se ha guardado correctamente":
								location.href = "Panel.php";
								break;
						}
					} 
				});
			}

		}	
	</script>
</html>