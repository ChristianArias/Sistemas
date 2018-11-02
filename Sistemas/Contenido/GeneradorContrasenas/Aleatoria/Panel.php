<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Contraseña aleatoria</title>
	<script src="../../../JS/1.8.3/jquery-1.8.3.min.js"></script>
	<script src="../../../JS/1.12.4/jquery-1.12.4.js"></script>
	<script src="../../../JS/1.12.1/jquery-ui.js"></script>
	<style>
		#pwd{
			width: 100%;
			min-height: 80vh;
			
		}
		#lim,#opcion{
			width: 100%;
		}
	</style>
</head>

<body>
	<table width="100%">
		<tr>
			<td>Generar contraseña aleatoria</td>
			<td>
				<select id="opcion" onChange="des()">
					<option value="0">MD5</option>
					<option value="1">Sencilla</option>
					<option value="2">Complejo</option>
					<option value="3">Palabras</option>
					<option value="4">Digitos</option>
				</select>
			</td>
			<td><input type="number" id="lim" min="1" max="50" value="8"></td>
			<td align="right"><button onClick="generar()">Generar</button></td>
		</tr>
		<tr><td colspan="4"><textarea id="pwd" disabled></textarea></td></tr>
	</table>
</body>
	<script>
		function des(){
			if(document.getElementById('opcion').value=='3')	document.getElementById("lim").disabled = true;
			else	document.getElementById("lim").disabled = false;		
		}
		function generar(){
			var lim = document.getElementById("lim").value;			
			var ar = document.getElementById('opcion');
			var opcion = ar.options[ar.selectedIndex].value;
			$.ajax({ 
				type: 	"GET", 
				url: 	"Generar.php",
				data: 	"i="+opcion+"&lim="+lim,
				success: function(msg){
					document.getElementById("pwd").innerHTML = msg;
				}
			});
		}
	</script>
</html>