<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Generador de contraseñas</title>
	<style>
		a{
			text-decoration: none;
			color: black;
		}
		#iframe{
			border: none;
			max-height: 85vh;
			min-height: 85vh;
		}
		#ventana{
			border: none;
			min-height: 85vh;
			max-height: 85vh;
		}
	</style>
</head>

<body>
	<caption id="botones" style="text-align: right">
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
		<div style="float:center">
			<a href="#" onClick="pagina('Base64/Panel.php')">Base64</label></a>
			<a href="#" onClick="pagina('Aleatoria/Panel.php')">Aleatoria</label></a>
		</div>
	</caption>
	
	<div id="iframe">
		<iframe id="ventana" width="100%" height="100%" src="Aleatoria/Panel.php" class="ventana"></iframe>
	</div>
	
</body>
	<script>
		function pagina(direccion){
			document.getElementById("ventana").src = direccion;
		}
	</script>
</html>