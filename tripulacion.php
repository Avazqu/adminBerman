<?php
	class Tripulacion extends Main{
		/* OBTIENE LOS NOMBRES DE LA TRIUPLACION */
		function getEmpleados() {
			$this-> conectar(); 
			$sqlEmpleados = "SELECT * FROM users"; 
			if ( ! $resultadoEmpleados = $this->conexion-> query($sqlEmpleados)) {
				//ERROR EN LA CONSULTA
				echo "<script type='text/javascript'>
    					alert('Se ha producido un error en la BBDD (CONSULTA clientes)';
    				</script>
    			"; 
			}else {
				if ($resultadoEmpleados->num_rows != 0) {
					echo "<div class='row'>"; 
					while ($empleado = $resultadoEmpleados-> fetch_assoc()) {
						for ($i = 0; $i < 1; $i++) {
							echo "
								<div class='col-sm-3 mb-3'>
				                	<center>
				                   		<div class='card' style='width: 18rem;'>
				                        	<img class='card-img-top' src='img/tripulacion/" . utf8_encode($empleado['nombre']) . ".svg' alt='Card image cap'>
				                        	<div class='card-body'>
				                            	<h5 class='card-title text-white'>" . utf8_encode($empleado['nombre']) . "</h5>
				                            	<p class='card-text text-white'>" . utf8_encode($empleado['cargo']) . "</p>
				                        	</div>
				                    	</div>
					                </center>
				            	</div>
							"; 
						}
					}
					echo "</div>"; 
				}else {
					echo "<script type='text/javascript'>
							alert('NO HAY RESULTADOS');
						</script>
					"; 
				}	
			}
		}

		/* DEVUELVE LOS NOMBRE DE LOS EMPLEADOS */
		function getNombreEmpleados($id) {
			$sqlGetNombreEmpleado = "SELECT nombre FROM users WHERE id = $id;"; 
			if ( ! $nombreEmpleados = $this->conexion->query($sqlGetNombreEmpleado)) {
				//ERROR EN LA CONSULTA
				echo "<script type='text/javascript'>
    					alert('Se ha producido un error en la BBDD (CONSULTA clientes)';
    				</script>
    			"; 
			}else {
				$nombre = $nombreEmpleados-> fetch_row(); 
				return $nombre[0]; 
			}
		}
	}
?>