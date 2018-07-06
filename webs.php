<?php
	/**
	 * CLASE DEL PANEL DE LAS WEBS
	 */
	class Webs extends Main
	{
		

		function getNombreEmpresas(){

		}



		/* 	COMPRUEBA EL REGISTRO DE UN PROYECTO WEB */
		function comprobarRegistroWeb($nombreEmpresa, $urlEmpresa){
			
			$sqlCheckNombre = "SELECT COUNT(ID) FROM webs WHERE nombre = '$nombreEmpresa';";
			if (!$resultadoCheckNombre = $this->conexion->query($sqlCheckNombre)) {
    			//ERROR EN LA CONSULTA
				echo "<script type='text/javascript'>
    					alert('Se ha producido un error en la BBDD (REGISTRO check NOMBRE)';
    				</script>
    			";
			}else{
				$datoCheckNombre = $resultadoCheckNombre->fetch_row();
    			if ($datoCheckNombre[0] > 0) {
    				return false;
    			}else{
					return true;   				
				}
			}
		
			$sqlCheckUrl = "SELECT COUNT(ID) FROM webs WHERE url = '$url';";
			if (!$resultadoCheckUrl = $this->conexion->query($sqlCheckUrl)) {
    			//ERROR EN LA CONSULTA
				echo "<script type='text/javascript'>
    					alert('Se ha producido un error en la BBDD (REGISTRO check URL)';
    				</script>
    			";
			}else{
				$datoCheckUrl = $resultadoCheckUrl->fetch_row();
    			if ($datoCheckUrl[0] > 0) {
    				return false;
    			}else{
					return true;   				
				}
			}
		}

		/* 	COMPRUEBA EL ESTADO DEL PROYECTO WEB PARA ASIGNAR UN ICONO */
		function comprobarEstadoWeb($estado){
			switch ($estado) {
				case 'Solicitud':
					return "<i class='far fa-edit ml-3'></i>";
					break;

				case 'Wireframe':
					return "  <i class='fas fa-pencil-alt ml-3'></i>";
					break;

				case 'Desarrollo':
					return "<i class='fas fa-code ml-3'></i>";
					break;

				case 'Feedback':
					return "  <i class='far fa-comments ml-3'></i>";
					break;

				case 'Entregada':
					return "  <i class='fas fa-check-double ml-3'></i>";
					break;
			}
		}

		/* HACE UNA BUSQUEDA DE UN PROYECTO WEB	 */
		function consultarWeb($nombreConsulta, $estadoConsulta, $fechaConsulta){
			$this->conectar();
			if ($nombreConsulta != "" && ($estadoConsulta == "default")) {
				$sqlNombre = "SELECT * FROM webs WHERE nombre LIKE '%$nombreConsulta%';";
				if (!$resultadoNombre = $this->conexion->query($sqlNombre)){
					echo "<script type='text/javascript'>
    						alert('ERROR AL OBTENER WEBS DE LA BBDD');
    					</script>
    				";
				}else{
					while ($web = $resultadoNombre->fetch_assoc()) {
						echo "
							<div class='container pb-5'>
								<div class='row'>
									<div class='col-sm-12'>
										<table class='table table-bordered text-center' align='center' width='100%'>
									  		<thead class='thead-dark'>
									    		<tr>
									      			<th>Nombre</th>
									      			<th>Url</th>
									      			<th>Estado</th>
									      			<th>Fecha Solicitud</th>
									    			<th>Fecha Entrega</th>
									    		</tr>
									    	</thead>
									    	<tbody>
									    		<tr>
									    			<td>".utf8_encode($web['nombre'])."</td>
									    			<td>".$this->añadirUrl($web['url'])."</td>
									    			<td>".$web['estado'].$this->comprobarEstadoWeb($web['estado'])."</td>
									    			<td>".$web['fecha']."</td>
									    			<td>".$web['fechaEntrega']."</td>
									    		</tr>
									    	</tbody>
									    </table>
									</div>
								</div>
							</div>
						";
					}
				}
			}elseif ($nombreConsulta == "" && ($estadoConsulta != "default")) {
				$sqlEstado = "SELECT * FROM webs WHERE estado = '$estadoConsulta';";
				
				if (!$resultadoEstado = $this->conexion->query($sqlEstado)){
					echo "<script type='text/javascript'>
    						alert('ERROR AL OBTENER ESTADOS DE LA BBDD');
    					</script>
    				";
				}else{
					if ($resultadoEstado->num_rows != 0) {
						echo "
							<div class='container pb-5'>
									<div class='row'>
										<div class='col-sm-12'>
											<table class='table table-bordered text-center' align='center' width='100%'>
										  		<thead class='thead-dark'>
										    		<tr>
										      			<th>Nombre</th>
										      			<th>Url</th>
										      			<th>Estado</th>
									      			<th>Fecha Solicitud</th>
								   			<th>Fecha Entrega</th>
								   		</tr>
							   	</thead>
							<tbody>
						";
						while ($webEstado = $resultadoEstado->fetch_assoc()) {
							echo "
					    		<tr>
					    			<td>".utf8_encode($webEstado['nombre'])."</td>
					    			<td>".$this->añadirUrl($webEstado['url'])."</td>
					    			<td>".$webEstado['estado'].$this->comprobarEstadoWeb($webEstado['estado'])."</td>
					    			<td>".$webEstado['fecha']."</td>
					    			<td>".$webEstado['fechaEntrega']."</td>
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
			}
			$this->desconectar();
		}

		/* CREA UN REGISTRO DE UN PROYECTO WEB */
		function setWeb($nombreRegistro, $direccionRegistro, $estadoRegistro, $fechaRegistro){
			$this->conectar();
			
			if($this->comprobarRegistro($nombreRegistro, $direccionRegistro)){
				$sqlRegistro = "INSERT INTO webs VALUES ('','$direccionRegistro','$nombreRegistro','$estadoRegistro','$fechaRegistro')";
				if (!$this->conexion->query($sqlRegistro)){
					return false;
				}else{
					return true;
				}
			}else{
				echo "<script type='text/javascript'>
    						alert('La empresa ya existe');
    					</script>
    			";
			}
			$this->desconectar();
		}

	}
?>