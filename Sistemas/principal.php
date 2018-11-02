<?php 
	include("conexion.php");
		
	session_start();
	if(!$_SESSION){
		
		header("location:desconectar_usuario.php");
		
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	
	<LINK href="CSS/menubar.css" rel="stylesheet" type="text/css">
	<LINK href="CSS/principal.css" rel="stylesheet" type="text/css">
	<LINK href="CSS/modal_userpic.css" rel="stylesheet" type="text/css">
	<link rel="icon" href="Iconos/sistema.ico">
		
<title><?php echo $_SESSION['sis_nombreCompleto'];?></title>
	
</head>
<!-- background="data:image/jpeg;base64,<?php //echo base64_encode($_SESSION['sis_foto']); ?>" -->
<body>
	
	<ul class="topnav">
		<li class="dropdown">
    		<a href="javascript:void(0)" class="dropbtn" title="Inicio"
			   onClick="insertar('Contenido/Principal/Principal.php')">
				<img src="https://seeklogo.com/images/A/ARIA-logo-6B35535A02-seeklogo.com.gif" width="20px" height="20px">
			</a>
  		</li>
  		<li class="dropdown">
    		<a href="javascript:void(0)" class="dropbtn">Herramientas</a>
    		<div class="dropdown-content">
				<a><label onClick="insertar('Contenido/Reportes/Panel.php')">Reportes</label></a>
      			<a><label onClick="insertar('Contenido/UsuarioRemoto/Panel.php')">Usuarios Remoto</label></a>
				<a href="#openModal" onClick="alerta('Contenido/Dispositivos/Panel.php')">Dispositivos</a>
				<a><label onClick="insertar('Contenido/Perifericos/Panel.php')">Perifericos</label></a>
				<a href="#openModal" onClick="alerta('Contenido/Antivirus/Panel.php')">Antivirus</a>
				<a>Paqueterias</a>
				<a>Areas</a>
				<a href="#openModal" onClick="alerta('Contenido/Usuarios/Panel.php')">Usuarios</a>
				<a href="#openModal" onClick="alerta('Contenido/Agencia/Panel.php')">Agencias</a>
				<a><label onClick="insertar('Contenido/Contrasenas/Panel.php')">Contraseñas</label></a>
				<a href="#openModal" onClick="alerta('Contenido/Contactos/Panel.php')">Contactos</a>
				<a href="#openModal" onClick="alerta('Contenido/ErroresSoluciones/Panel.php')">Errores y/o soluciones</a>
				<a href="#openModal" onClick="alerta('Contenido/Tareas/Panel.php')">Tareas</a>
				<a href="#openModal" onClick="alerta('Contenido/GeneradorContrasenas/Panel.php')">Generar contraseñas</a>
    		</div>
  		</li>		
  		<li class="dropdown">
    		<a href="javascript:void(0)" class="dropbtn">Ticket's</a>
    		<div class="dropdown-content">
      			<a><label onClick="insertar('Contenido/Tickets/index.php')">Panel de ticket's</label></a>
				<a>Nuevo</a>
    		</div>
  		</li>
  		<li><a><label onClick="insertar('Contenido/RelacionIp/Panel.php')">Relacion de Ip's</label></a></li>
		<li class="dropdown">
    		<a href="javascript:void(0)" class="dropbtn">Equipos</a>
    		<div class="dropdown-content">
      			<a><label onClick="insertar('Contenido/Equipos/Panel.php')">Panel de equipos</label></a>
				<!--<a><label onClick="insertar('Contenido/Equipos/Nuevo.php')">Nuevo</label></a>-->
				<a><label onClick="insertar('Contenido/Perifericos/Panel.php')">Panel de Perifericos</label></a>
				<a><label onClick="insertar('Contenido/Componentes/Panel.php')" title="Monitores,NoBreak entre otros">Panel de Componentes</label></a>
    		</div>
  		</li>
		<li class="dropdown">
    		<a href="javascript:void(0)" class="dropbtn">Impresoras</a>
    		<div class="dropdown-content">
      			<a><label onClick="insertar('Contenido/Impresoras/Panel.php')">Panel de impresoras</label></a>
				<a><label onClick="insertar('Contenido/Impresoras/Nuevo.php')">Nuevo</label></a>
				<a><label onClick="insertar('Contenido/Impresoras/Reportes Gral/Reportes.php')">Reportes</label></a>
    		</div>
  		</li>
		<li class="dropdown">
    		<a href="javascript:void(0)" class="dropbtn">Telefonia</a>
    		<div class="dropdown-content">
      			<a><label onClick="insertar('Contenido/Atas/Panel.php')">Ata's</label></a>
				<a>
					<label onClick="insertar('Contenido/TelefonosIp/Panel.php')">Telefonos IP</label>
				</a>
				<a>Extenciones</a>
    		</div>
  		</li>
		<li class="dropdown">
    		<a href="javascript:void(0)" class="dropbtn">Enlaces</a>
    		<div class="dropdown-content">
      			<a>Panel de Enlaces</a>
				<a>Nuevo</a>
    		</div>
  		</li>
		<li class="dropdown">
    		<a href="javascript:void(0)" class="dropbtn">Switch's</a>
    		<div class="dropdown-content">
      			<a><label onClick="insertar('Contenido/Switchs/Panel.php')">Panel de Switch's</label></a>
				<a>Nuevo</a>
    		</div>
  		</li>
		<li class="dropdown">
    		<a href="javascript:void(0)" class="dropbtn">Paneles</a>
    		<div class="dropdown-content">
      			<a><label onClick="insertar('Contenido/Paneles/Panel.php')">Panel de Paneles</label></a>
				<a>Resumen</a>
    		</div>
  		</li>
		<li></li>
		<li class="dropdown">
    		<a href="javascript:void(0)" class="dropbtn"><?php echo $_SESSION['sis_nombreCompleto'];?></a>
    		<div class="dropdown-content">
				<a>
					<label onClick="insertar('Contenido/UsuariosSistema/Panel.php')">Usuarios</label>
				</a>
      			<a><label onClick="insertar('Contenido/Perfil/Panel.php')">Mi perfil</label></a>
				<!--<a href="#openModal" onClick="alerta('Contenido/Perfil/Contrasena/Cambiar.php')">Contraseña</a>-->
				<a><label onClick="insertar('Contenido/Perfil/Contrasena/Cambiar.php')">Contraseña</label></a>
				<a href="desconectar_usuario.php">Cerrar sesion</a>
    		</div>
  		</li>
  		<li style="float:right">
			<a class="active">
				<form name="form1" onsubmit="return imprimir(this.palabra.value);" >
            		<input id="palabra" name="palabra" type="search" placeholder="Buscar">
                </form>
			</a>
		</li>
	</ul>
	
	<div id="div_paginas">
		<iframe id="paginas" src="Contenido/Principal/Principal.php" width="100%" height="100%"></iframe>
	</div>
	
	<div id="openModal" class="modalDialog">
		<div class="elemento">
			<a href="#close" title="Close" class="close">X</a>
			<iframe id="ventana" width="100%" height="100%" src="" class="ventana"></iframe>
		</div>
	</div>
	
</body>
	<script>
		function alerta(pagina){
			document.getElementById("ventana").src = pagina;
		}
				
		function insertar(pagina){
			document.getElementById("paginas").src = pagina;
		}
		
		function contactos(){
			location.href = "#openModal";
			document.getElementById("ventana").src = "Contenido/Contactos/Panel.php";
		}
		
		var buscador = new Array();
			buscador['agencia'] 		= "Contenido/Agencia/Panel.php";
			buscador['equipos'] 		= "Contenido/Equipos/Panel.php";
			buscador['impresoras'] 		= "Contenido/Impresoras/Panel.php";
			buscador['pwd'] 			= "Contenido/Contrasenas/Panel.php";
			buscador['contactos']		= "Contenido/Contactos/Panel.php";
			buscador['atas']			= "Contenido/Atas/Panel.php";
			buscador['query']			= "Contenido/Query/Panel.php";
		function imprimir(find){
			
			var f = find.toLowerCase();
			
			if(buscador[find]){
				document.getElementById("paginas").src = buscador[find];
				return false;
			}else{
				
			}
			document.getElementById("palabra").value = "";
		}
		window.addEventListener("keyup",function(event){
			var code = event.keyCode || event.which;
			/*if(code == 27){
				location.href = "#close";
			}if(code == 37){
				alert("aas");
			}*/
			switch(code){
				case 27:
					location.href = "#close";
					break;
				case 36:
					insertar('Contenido/Principal/Principal.php');
					break;
			}
		},false);
	</script>
</html>