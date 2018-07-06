<?php
	require('sessions.php'); 
	$sesion = new Sesiones; 

	require('files.php'); 
	$files = new Files; 

	require('clientes.php');

	require('tripulacion.php');

	require('webs.php');
	class Main {

		/* 	REALIZA LA CONEXION CON LA BBDD */
		function conectar() {
			$host = "localhost"; 
			$user = "root"; 
			$pass = ""; 
			$db = "bcomunicacion"; 
			$this -> conexion = mysqli_connect($host, $user, $pass, $db); 
			if ( ! $this-> conexion) {
			    echo "Error: No se pudo conectar a MySQL." . PHP_EOL . "<br>"; 
			    echo "error numero: " . mysqli_connect_errno() . PHP_EOL . "<br>"; 
			    echo "error descripcion: " . mysqli_connect_error() . PHP_EOL; 
			    exit; 
			}
			//echo "Éxito: Se realizó una conexión apropiada a MySQL!" . PHP_EOL;
			//echo "Información del host: " . mysqli_get_host_info($conexion) . PHP_EOL;
			 
			//mysqli_close($conexion);
		}

		/* 	CIERRA LA SESION DEL USUARIO */
		function desconectar() {
			$this->conexion-> close(); 
		}

		/* 	COMPRUEBA EL LOGIN DEL USUARIO E INICIA LA SESION */
		function comprobrarUsuario($usuario, $pass) {
			$sql = "SELECT COUNT(ID) FROM users WHERE Usuario = '$usuario' AND Password = '$pass';"; 
			$sesion = new Sesiones; 
			if ( ! $resultado = $this->conexion-> query($sql)) {
    			//ERROR EN LA CONSULTA
				echo "<script type='text/javascript'>
    					alert('Se ha producido un error en la BBDD');
    				</script>
    			"; 
			}else {
				$dato = $resultado-> fetch_row(); 
    			if ($dato[0] != 1) {
    				echo "<script type='text/javascript'>
    						alert('Usuario/Contraseña Incorrectos');
    					</script>
    				"; 
    			}else {
   					$sesion->login($usuario); 
   					$this->redireccionar('panel'); 
    			}				
			}
			$this->desconectar(); 
		}

		/* 	REDIRIGE AL USUARIO A OTRA PAGINA */
		function redireccionar($pagina) {
			header('Location: ' . $pagina . '.php'); 
		}

		/* 	CONVIERTE LA URL DEVUELTA DE LA BBDD EN UN LINK */
		function añadirUrl($url) {
			return "<a href='http://$url' target='_blank'>$url</a>";
		}

		
		/*  GENERA EL PANEL DE ADMINISTRACION */
		function generarPanel() {
			echo "
			<div class='row'>
				<div class='col-md-4'>
					<center>
						<div class='card m-4' style='width: 18rem;'>
							<img class='card-img-top' src='img/card-clientes.jpg'>
							<div class='card-body text-white'>
								<h5 class='card-title'>Clientes</h5>
								<p class='card-text'>Consulta o gestiona todos los clientes de la agencia.</p>
								<a href='panel-clientes.php'><button class='btn-primary'>Clientes <i class='fas fa-users ml-2'></i></button></a>
							</div>
						</div>
					</center>
				</div>
				<div class='col-md-4'>
					<center>
						<div class='card m-4' style='width: 18rem;'>
							<img class='card-img-top' src='img/card-accesos.jpg'>
							<div class='card-body text-white'>
								<h5 class='card-title'>Accesos</h5>
								<p class='card-text'>Consulta o gestiona todos los accesos a cuentas de la agencia.</p>
								<a href='panel-accesos.php'><button class='btn-primary'>Accesos <i class='fas fa-align-right ml-2'></i></button></a> 
							</div>
						</div>
					<center>
				</div>
				<div class='col-md-4'>
					<center>
						<div class='card m-4' style='width: 18rem;'>
							<img class='card-img-top' src='img/card-tripulacion.jpg'>
							<div class='card-body text-white'>
								<h5 class='card-title'>Tripulación</h5>
								<p class='card-text'>Consulta o gestiona todos los empleados de la agencia.</p>
								<a href='panel-tripulacion.php'><button class='btn-primary'>Triulación <i class='fas fa-user-astronaut ml-2'></i></button></a>
							</div>
						</div>
					</center>
				</div>
				<div class='col-md-4'>
					<center>
						<div class='card m-4' style='width: 18rem;'>
							<img class='card-img-top' src='img/card-informes.jpg'>
							<div class='card-body text-white'>
								<h5 class='card-title'>Informes</h5>
								<p class='card-text'>Consulta o gestiona todos los informes de la agencia.</p>
								<a href='panel-informes.php'><button class='btn-primary'>Informes <i class='fas fa-file-invoice ml-2'></i></button></a> 
							</div>
						</div>
					</center>
				</div>
				<div class='col-md-4'>
					<center>
						<div class='card m-4' style='width: 18rem;'>
							<img class='card-img-top' src='img/card-webs.jpg'>
							<div class='card-body text-white'>
								<h5 class='card-title'>Webs</h5>
								<p class='card-text'>Consulta o gestiona todos los proyectos web de la agencia.</p>
								<a href='panel-webs.php'><button class='btn-primary'>Webs <i class='fas fa-code ml-2'></i></button></a> 
							</div>
						</div>
					</center>
				</div>
				<div class='col-md-4'>
					<center>
						<div class='card m-4' style='width: 18rem;'>
							<img class='card-img-top' src='img/card-paquetes.jpg'>
							<div class='card-body text-white'>
								<h5 class='card-title'>Paquetes</h5>
								<p class='card-text'>Consulta o gestiona todos los paquetes de la agencia.</p>
								<a href='panel-paquetes.php'><button class='btn-primary'>Paquetes <i class='fas fa-boxes ml-2'></i></button></a> 
							</div>
						</div>
					</center>
				</div>
				<div class='col-md-4'>
					<center>
						<div class='card m-4' style='width: 18rem;'>
							<img class='card-img-top' src='img/card-contratos.jpg'>
							<div class='card-body text-white'>
								<h5 class='card-title'>Contratos</h5>
								<p class='card-text'>Consulta todos los contratos de la agencia.</p>
								<a href='panel-contratos.php'><button class='btn-primary'>Contratos <i class='fas fa-boxes ml-2'></i></button></a> 
							</div>
						</div>
					</center>
				</div>
			"; 
		}
	}?>