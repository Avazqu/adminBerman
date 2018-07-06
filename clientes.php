<?php
	/**
	 * CLIENTES
	 */
	class Clientes extends Main
	{
		
		/* 	DEVUELVE LA LISTA DE CLIENTES */
		function getClientes(){
			$this->conectar();
			$sqlClientes = "SELECT * FROM clientes";
			if (!$resultadoClientes = $this->conexion->query($sqlClientes)){
				//ERROR EN LA CONSULTA
				echo "<script type='text/javascript'>
    					alert('Se ha producido un error en la BBDD (CONSULTA clientes)';
    				</script>
    			";
			}else{
				if ($resultadoClientes->num_rows != 0) {
						echo "
							<div class='container pb-5'>
									<div class='row'>
										<div class='col-sm-12'>
											<table class='table table-bordered text-center' align='center' width='100%'>
										  		<thead class='thead-dark'>
										    		<tr>
										      			<th>Nombre</th>
										      			<th>Paquete</th>
										      			<th>Convenio</th>
									      				<th>Fecha Inicio Contrato</th>
									      				<th>Fecha Fin Contrato</th>
								   					</tr>
							   					</thead>
											<tbody>
						";
						while ($cliente = $resultadoClientes->fetch_assoc()) {
							echo "
					    		<tr>
					    			<td>".utf8_encode($cliente['nombre'])."</td>
					    			<td>".$cliente['paquetes']."</td>
					    			<td>".$cliente['convenio']."</td>
					    			<td>".$cliente['fechaInicioContrato']."</td>
					    			<td>".$cliente['fechaFinContrato']."</td>
					    		</tr>
							";
						}
						echo "
							</tbody>
							    </table>
									</div>
								</div>
							</div>
						";
				}else{
					echo "<script type='text/javascript'>
							alert('NO HAY RESULTADOS');
						</script>
					";
				}
			}
			$this->desconectar();
		}

		




	}
?>