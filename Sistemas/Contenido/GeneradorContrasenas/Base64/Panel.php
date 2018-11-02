<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	<script src="../../../JS/1.8.3/jquery-1.8.3.min.js"></script>
	<script src="../../../JS/1.12.4/jquery-1.12.4.js"></script>
	<script src="../../../JS/1.12.1/jquery-ui.js"></script>
	<style>
		div.tab {
			overflow: hidden;
			background-color: #f1f1f1;
		}

		div.tab button {
			background-color: inherit;
			float: left;
			border: none;
			outline: none;
			cursor: pointer;
			padding: 8px 10px;
			transition: 0.3s;
			font-size: 10px;
		}

		div.tab button:hover {
			background-color: #ddd;
		}

		div.tab button.active {
			background-color: #ccc;
		}

		a {
			text-decoration: none;
			color: black;
		}

		.tabcontent {
			display: none;
			padding: 3px 6px;
			border-top: none;
		}

		.main {
			font-family: 	Arial, Verdana, sans-serif;
			color:		black;
			font-size:	8px;
		}
		
		textarea{
			width: 100%;
			min-height: 38vh;
			resize: none;
		}
	</style>
</head>

<body>
	<div class="tab">
		<button class="tablinks" onclick="openCity(event, 'encriptar')" id="defaultOpen">Encriptar</button>
  		<button class="tablinks" onclick="openCity(event, 'desencriptar')">Desencriptar</button>
    </div>
	
	<div id="encriptar" class="tabcontent body">
		<table width="100%">
			<tr><th>Ingresa la clave</th></tr>
			<tr><td><textarea id="clavesn" onKeyUp="encriptar()"></textarea></td></tr>
			<tr><td><textarea id="txencriptar" disabled></textarea></td></tr>			
		</table>
	</div>
	
	<div id="desencriptar" class="tabcontent body">
		<table width="100%">
			<tr><th>Ingresa la clave</th></tr>
			<tr><td><textarea id="claveen" onKeyUp="desencriptar()"></textarea></td></tr>
			<tr><td><textarea id="txdesencriptar" disabled></textarea></td></tr>			
		</table>
	</div>
	
</body>
	<script>
		
		function encriptar(){
			var clave = document.getElementById("clavesn").value;
			$.ajax({ 
				type: 	"GET", 
				url: 	"crypt64.php", 
				data: 	"i=0&tx="+clave, 
				success: function(msg){
					document.getElementById("txencriptar").innerHTML = msg;
				}
			});
		}
		
		function desencriptar(){
			var clave = document.getElementById("claveen").value;
			$.ajax({ 
				type: 	"GET", 
				url: 	"crypt64.php", 
				data: 	"i=1&tx="+clave, 
				success: function(msg){
					document.getElementById("txdesencriptar").innerHTML = msg;
				}
			});
		}
		
		function openCity(evt, cityName) {
    		var i, tabcontent, tablinks;
    		tabcontent = document.getElementsByClassName("tabcontent");
    		for (i = 0; i < tabcontent.length; i++) {
        		tabcontent[i].style.display = "none";
    		}
    		tablinks = document.getElementsByClassName("tablinks");
    		for (i = 0; i < tablinks.length; i++) {
        		tablinks[i].className = tablinks[i].className.replace(" active", "");
    		}
    		document.getElementById(cityName).style.display = "block";
    		evt.currentTarget.className += " active";
		}
		// Get the element with id="defaultOpen" and click on it
		document.getElementById("defaultOpen").click();
	</script>
</html>

<!--<table border="1px" width="100%">
		<tr><th>Ingresa la clave</th></tr>
		<tr><td><textarea></textarea></td></tr>
	</table>