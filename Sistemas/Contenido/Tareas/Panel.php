<?php 

	include("../../conexion.php");
		
	session_start();

	$id = $_SESSION['sis_id'];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
	<style>
		div.tab {
			overflow: hidden;
			border: 1px solid #ccc;
			background-color: #f1f1f1;
		}

		div.tab button {
			background-color: inherit;
			float: left;
			border: none;
			outline: none;
			cursor: pointer;
			padding: 14px 16px;
			transition: 0.3s;
			font-size: 10px;
		}

		div.tab button:hover {
			background-color: #ddd;
		}

		div.tab button.active {
			background-color: #ccc;
		}

		.tabcontent {
			display: none;
			padding: 6px 12px;
			/*border: 1px solid #ccc;*/
			border-top: none;
		}
		
		.info{
			width: 100%;
			height: 50%;
			height: 50pv;
			height: 50hv;
		}
		body{
			font-size: 10px;
		}
		.td{
			text-align: center;
		}
		tbody td{
			border-bottom: 1px solid black;
		}
		tbody button{
			height: 20px;
		}
		
		#Pendientes{
			height: 80%;
			height: 80hv;
			height: 80mv;
		}
		
		#pendientes_personal{
			overflow:auto;
			width: 99%;
			height: 40%;
			position: absolute;
			top:15%;
			left: 0%;
			border: 1px solid black;
		}
		
		#pendientes_global{
			overflow:auto;
			width: 99%;
			height: 40%;
			position: absolute;
			top:57.5%;
			left: 0%;
			border: 1px solid black;
		}
		
		#realizadas_personal{
			overflow:auto;
			width: 99%;
			height: 40%;
			position: absolute;
			top:15%;
			left: 0%;
			border: 1px solid black;
		}
		
		#realizadas_global{
			overflow:auto;
			width: 99%;
			height: 40%;
			position: absolute;
			top:57.5%;
			left: 0%;
			border: 1px solid black;
		}
		.icon{
			width: 	10px;
			height: 10px;
		}
		.icon:hover{
			width: 	15px;
			height: 15px;
		}
		tbody tr:hover{
			background: #CFCFCF;
		}
	</style>
</head>

<body>
	<div class="tab">
  		<button class="tablinks" onclick="openCity(event, 'Pendientes')" id="defaultOpen">Pendientes</button>
  		<button class="tablinks" onclick="openCity(event, 'Realizadas')">Realizadas</button>
		
		
		<div style="float:right">
			<form action="Nuevo.php" method="POST" title="Agregar tarea">
				<button>
					<img src="../../Iconos/nuevo.png" width="12" height="12"/>
				</button>
			</form>
		</div>
		<div style="float:right">
			<button onClick="javascript:window.location.reload();" title="Actualizar">
				<img src="../../Iconos/actualizar.png" width="12" height="12"/>
			</button>
		</div>
	</div>
	
	<div id="Pendientes" class="tabcontent">
		
		<div id="pendientes_personal">
			<table class="info">
				<thead class="elemento">
					<tr><th colspan="4"><?php echo $_SESSION['sis_nombreCompleto'];?></th></tr>
					<tr>
						<th width="85%">Evento</th>
						<td width="5%"></td>
						<td width="5%"></td>
						<td width="5%"></td>
					</tr>
				</thead>
				<tbody>
					<?php 
						$conGlobPen = "SELECT * FROM tareas WHERE esGlobal = 0 AND idUsuarioCreo = $id AND realizada = 0";
						$resGlobPen = mysql_query($conGlobPen,$conex) or die (mysql_error());
						while($row = mysql_fetch_array($resGlobPen)){
					?>
					<tr>
                		<td align="left"><?php echo $row["nombre"]; ?></td>
                    	
                        <td align="center">
							<a class="btnicon"><img src="../../Iconos/cerrar.png" class="icon" title="Desmarcar como realizada"></a>
                        </td>
                        <td align="center">
							<a class="btnicon"><img src="../../Iconos/editar.png" class="icon" title="Editar tarea"></a>
                        </td>
                        <td align="center">
							<a class="btnicon"><img src="../../Iconos/ver.png" class="icon" title="Detalles"></a>
                        </td>                   	
            		</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
		
		<br>
		
		<div id="pendientes_global">
			<table class="info">
				<thead class="elemento">
					<tr><th colspan="4">Global</th></tr>
					<tr>
						<th width="85%">Evento</th>
						<td width="5%"></td>
						<td width="5%"></td>
						<td width="5%"></td>
					</tr>
				</thead>
				<tbody>
					<?php 
						$conGlobPen = "SELECT * FROM tareas WHERE esGlobal = 1 AND realizada = 0";
						$resGlobPen = mysql_query($conGlobPen,$conex) or die (mysql_error());
						while($row = mysql_fetch_array($resGlobPen)){
					?>
					<tr>
                		<td align="left"><?php echo $row["nombre"]; ?></td>
                    	
                        <td align="center">
							<a class="btnicon"><img src="../../Iconos/cerrar.png" class="icon" title="Desmarcar como realizada"></a>
                        </td>
                        <td align="center">
							<a class="btnicon"><img src="../../Iconos/editar.png" class="icon" title="Editar tarea"></a>
                        </td>
                        <td align="center">
							<a class="btnicon"><img src="../../Iconos/ver.png" class="icon" title="Detalles"></a>
                        </td>                   	
            		</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>
	<!---------------------------------------------------------------->
	<div id="Realizadas" class="tabcontent">
		<div id="realizadas_personal">
			<table class="info">
				<thead class="elemento">
					<tr><th colspan="4"><?php echo $_SESSION['sis_nombreCompleto'];?></th></tr>
					<tr>
						<th width="85%">Evento</th>
						<td width="5%"></td>
						<td width="5%"></td>
						<td width="5%"></td>
					</tr>
				</thead>
				<tbody>
					<?php 
						for($i = 0;$i<50;$i++){
					?>
					<tr>
                		<td align="left"><?php echo $i; ?></td>
                    	
                        <td align="center">
							<a class="btnicon"><img src="../../Iconos/cerrar.png" class="icon" title="Desmarcar como realizada"></a>
                        </td>
                        <td align="center">
							<a class="btnicon"><img src="../../Iconos/editar.png" class="icon" title="Editar tarea"></a>
                        </td>
                        <td align="center">
							<a class="btnicon"><img src="../../Iconos/ver.png" class="icon" title="Detalles"></a>
                        </td>                    	
            		</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
		
		<br>
		
		<div id="realizadas_global">
			<table class="info">
				<thead class="elemento">
					<tr><th colspan="4">Global</th></tr>
					<tr>
						<th width="85%">Evento</th>
						<td width="5%"></td>
						<td width="5%"></td>
						<td width="5%"></td>
					</tr>
				</thead>
				<tbody>
					<?php 
						for($i = 0;$i<1;$i++){
					?>
					<tr>
                		<td align="left"><?php echo $i; ?></td>
                    	
                        <td align="center">
							<a class="btnicon"><img src="../../Iconos/cerrar.png" class="icon" title="Desmarcar como realizada"></a>
                        </td>
                        <td align="center">
							<a class="btnicon"><img src="../../Iconos/editar.png" class="icon" title="Editar tarea"></a>
                        </td>
                        <td align="center">
							<a class="btnicon"><img src="../../Iconos/ver.png" class="icon" title="Detalles"></a>
                        </td>
            		</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>
	
</body>
	<script>
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