<?php
		//require('main.php');
?>



<?php

	class Sesiones extends Main{

		function login($usuario){
			//$this->logout();

			if (!isset($_SESSION['user'])) {
				session_start();
				$main = new main;
			  	$_SESSION['user'] = $usuario;
			  	if ($this->compruebaSuperAdmin($usuario) == 1) {
			  		unset($_SESSION['admin']);
			  		$_SESSION['admin'] = true;
			  	}else{
			  		unset($_SESSION['admin']);
			  		$_SESSION['admin'] = false;
			  		
			  	}
			}
		}

		function logout(){
			if (isset($_SESSION['user'])) {	
				unset($_SESSION['user']);
				session_destroy();
			}
		}

		function getUsuario(){
			if (isset($_SESSION['user'])) {
				return $_SESSION['user'];
			}else{
				//echo $_SESSION['user'];
				return "NO HAY UNA SESION getUsuario()";
			}
		}

		/* 	DEVUELVE SI EL USUARIO ES SUPERADMIN O NO */
		function compruebaSuperAdmin($usuario){
			$main = new main;
			$main->conectar();
			$sqlSuperAdmin = "SELECT COUNT(ID) FROM users WHERE Usuario = '$usuario' AND superadmin = '1';";
			if (!$resultadoSuperAdmin = $main->conexion->query($sqlSuperAdmin)) {
    			//ERROR EN LA CONSULTA
				echo "<script type='text/javascript'>
    					alert('Se ha producido un error en la BBDD (COMPROBANDO superAdmin)';
    				</script>
    			";
			}else{
				$datoSuperAdmin = $resultadoSuperAdmin->fetch_row();
    			if ($datoSuperAdmin[0] == 1) {
    				return true;
    			}else{
					return false;   				
				}
			}
		}
	}
?>