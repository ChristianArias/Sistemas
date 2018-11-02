<?php 
	
	include("../../conexion.php");

	if(isset($_POST['buscar'])){
		$buscar = $_POST['buscar'];
	}else{
		$buscar = "";
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Panel de contraseñas</title>
</head>
	
	<LINK href="../../CSS/contenido.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/modal_userpic.css" rel="stylesheet" type="text/css">
	<LINK href="../../CSS/General.css" rel="stylesheet" type="text/css">
		
	<style>
		/*table{
			table-layout: fixed;
		}
		tbody td{
			min-width: 13.2vw;
			max-width: 13.2vw;
			word-break: break-all;
			word-wrap: break-word;
			border: 1px solid black;
		}
		tbody th,thead th{
			min-width: 13.2vw;
			max-width: 13.2vw;
			border: 1px solid red;
		}
		tbody tr:hover{
			background: darkgray;
			color: white;
		}
		tbody a:hover{
			color: red;
		}
		textarea{
			border: none;
			width: 99%;
			resize: none;
		}
		.elemento{
			-webkit-user-select: none;
			-khtml-user-select: none;
			-moz-user-select: none;
			-o-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}
		@media screen and (max-width:700px){
			body{
				font-size: 10px;
			}
			tbody td{
				width: 14%;
				width: 33vh;
				width: 33mh;
			}
			tbody th{
				width: 14%;
			}
		}*/
		#datos{
			height: 50%;
			font-size: 10px;
		}
		td,th{
			min-width: 13.6vw;
			max-width: 13.6vw;
			word-break: break-all;
			word-wrap: break-word;
		}
		.button{
			width: 100%;
			height: auto;
			font-size: 90%;
		}
		tbody tr:hover{
			background: darkgray;
			color: white;
		}
		tbody a:hover{
			color: red;
		}
		textarea{
			border: none;
			resize: none;
			/*overflow:hidden;*/
			white-space: nowrap;
			text-overflow: ellipsis;
		}
	</style>
<body>
	
	<caption id="botones" style="text-align: right">
		<a href="#" onClick="javascript:window.location.reload();">Actualizar</a>
		<a href="#" onClick="descargarExcel()">Descargar</a>
		<a href="#openModal" onClick="mostrar('Nuevo.php')">Agregar</a>
	</caption>
	
	<center>
		
		<div id="busqueda">
			<form action="Panel.php" method="POST">
				<input type="search" placeholder="Buscar contraseña" width="30%" name="buscar" value="<?php echo $buscar;?>">
				<button name="" type="submit">Buscar</button>
			</form>
		</div>
		
		<br>
		
		<div id="informacion">
			<table border="1px" id="datos" width="100%">
				<thead>
					<tr>
						<th onclick="sortTable(0)">Servicio</th>
						<th onclick="sortTable(1)">Usuario</th>
						<th onclick="sortTable(2)">Contraseña</th>
						<th onclick="sortTable(3)">Actualizado</th>
						<th onclick="sortTable(4)">Link</th>
						<th onclick="sortTable(5)">Dominio</th>
						<th onclick="sortTable(6)">Observaciones</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$con = "SELECT * FROM _contrasenas WHERE (servicio LIKE '%$buscar%' OR usuario LIKE '%$buscar%' OR 
						contrasena LIKE '%".base64_encode($buscar)."%' OR link LIKE '%$buscar%' )";
						$resultadoRep = mysql_query($con,$conex) or die (mysql_error());
						while($row = mysql_fetch_array($resultadoRep)){
					?>
					<tr>
						<td>							
							<a href="#openModal" onClick="alerta('<?php echo $row["id"];?>','<?php echo $row["servicio"];?>')">
								<?php echo $row['servicio'];?>
							</a>
						</td>
						<td><?php echo $row['usuario'];?></td>
						<td><?php echo base64_decode($row['contrasena']);?></td>
						<td align="center">
							<?php 
								$row['actualizado'] != "0001-01-01" ? $r = $row['actualizado'] : $r = "";
								echo $r;
							?>
						</td>
						<td>
							<?php 
								$data = $row['link'];
								echo "<a href='$data' target='_blank' title='$data'>".$data."</a>";
							?>
						</td>
						<td><?php echo $row['dominio'];?></td>
						<td>
							<?php
								$tx = explode(";",$row["observaciones"]);
								foreach($tx as $key) {
									echo $key."<br>";
								}
							?>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>		
		</div>
		
	</center>
	
	<div id="openModal" class="modalDialog">
		<div class="elemento">
			<a href="#close" title="Close" class="close">X</a>
			<iframe id="ventana" width="100%" height="100%" src="" class="ventana"></iframe>
		</div>
	</div>
	
	
	
</body>
	<script>
		function mostrar(pagina){
			document.getElementById("ventana").src = pagina;
		}
		function alerta(id,name){
			document.getElementById("ventana").src = "Modificar.php?id="+id;
		}
		function descargarExcel(){
       		var table= document.getElementById("datos");
 			var html = table.outerHTML;
 			window.open('data:application/vnd.ms-excel,' + escape(html));
    	}
		
		function sortTable(n) {
			var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
			table = document.getElementById("datos");
			switching = true;
			//Set the sorting direction to ascending:
			dir = "asc"; 
			/*Make a loop that will continue until
			no switching has been done:*/
			while (switching) {
				//start by saying: no switching is done:
				switching = false;
				rows = table.getElementsByTagName("TR");
				/*Loop through all table rows (except the
				first, which contains table headers):*/
				for (i = 1; i < (rows.length - 1); i++) {
					//start by saying there should be no switching:
					shouldSwitch = false;
					/*Get the two elements you want to compare,
					one from current row and one from the next:*/
					x = rows[i].getElementsByTagName("TD")[n];
					y = rows[i + 1].getElementsByTagName("TD")[n];
					/*check if the two rows should switch place,
					based on the direction, asc or desc:*/
						if(dir == "asc") {
							if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
							//if so, mark as a switch and break the loop:
								shouldSwitch= true;
								break;
							}
						} else if (dir == "desc") {
							if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
							//if so, mark as a switch and break the loop:
							shouldSwitch= true;
							break;
						}
					}//fin del for
				}//fin del while
				if (shouldSwitch) {
					/*If a switch has been marked, make the switch
					and mark that a switch has been done:*/
					rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
					switching = true;
					//Each time a switch is done, increase this count by 1:
					switchcount ++; 
				}else {
					/*If no switching has been done AND the direction is "asc",
					set the direction to "desc" and run the while loop again.*/
					if (switchcount == 0 && dir == "asc") {
						dir = "desc";
						switching = true;
					}
				}
			}
		}
	</script>
</html>