<?php
	$main = new Main;
?>


<?php
	/**
	 * FILES
	 */
	class Files extends Main
	{
		/*  MUESTRA TODOS LOS INFORMES  */
		function getInformes(){
			$this->conectar();
			$sqlMuestraInformes = "SELECT * FROM informes;";
			if (!$informes = $this->conexion->query($sqlMuestraInformes)){
				//ERROR EN LA CONSULTA
				echo "<script type='text/javascript'>
    					alert('Se ha producido un error en la BBDD (CONSULTA informes)';
    				</script>
    			";
			}else{
				if ($informes->num_rows != 0) {
					while ($informe = $informes->fetch_assoc()) {
						echo $informe['empresa'];
						echo "<br>";
						echo $informe['fecha'];
						echo "<br>";
						echo $informe['nombre'];
					}
				}
			}
		}

		/* CREA UN INFORME  */
		function setInforme($empresa, $fecha, $nombre){
			$main->conectar();
				$sqlCrearInforme = "INSERT INTO informes VALUES('', '$empresa', '$fecha', '$nombre');";
				if (!$this->conexion->query($sqlCrearInforme)){
						echo "<script type='text/javascript'>
							alert('EL INFORME SE HA CREADO CORRECTAMENTE');
						</script>
					";
				}else{
					echo "<script type='text/javascript'>
							alert('ERROR AL CREAR EL INFORME');
						</script>
					";
				}
			$main->desconectar();
		}

		/*  INYECTA LOS NOMBRES DE LAS EMPRESA EN EL FORMULARIO DE CREAR INFORME  */
		function getNombresEmpresa(){
			$this->conectar();
			$sqlClientes = "SELECT nombre FROM clientes";
			if (!$nombresClientes = $this->conexion->query($sqlClientes)){
				//ERROR EN LA CONSULTA
				echo "<script type='text/javascript'>
    					alert('Se ha producido un error en la BBDD (CONSULTA NOMBRE clientes)';
    				</script>
    			";
			}else{
				if ($nombresClientes->num_rows != 0) {
					echo "<div class='container my-4'>
			            <section class='mt-5 border p-5 form-registro'>
			                <h3 class='text-uppercase text-center mb-5'>Crear Informe</h3>
			                <!--form action='#' method='POST'>
			                    <div class='form-row'>
			                        <div class='col-4'>
			                            <div class='form-group'>
										    <label for='nomEmpresa'>Seleccionar Empresa <i class='fas fa-angle-down ml-2'></i></label>
										    <select class='form-control' id='nomEmpresa' name='nomEmpresa'>";
												while ($cliente = $nombresClientes->fetch_assoc()){
														echo "<option>".utf8_encode($cliente['nombre'])."</option>";
													}
												echo "
											</select>
										</div>
			                    	</div>
			                    	<div class='col-4'>
			            	        	<label for='fechaInforme'>Fecha del informe <i class='fas fa-calendar-alt ml-2'></i></label>
				                        <input type='date' class='form-control' id='fechaInforme' name='fechaInforme' placeholder='Fecha del informe' required=''>
			                        </div>
			                    	<div class='col-4'>
    									<label for='nomInforme'>Nombre Informe <i class='fas fa-file-signature ml-2'></i></label>
    									<input type='text' class='form-control' id='nomInforme' name='nomInforme' required=''>
			                    	</div>
			                    	<div class='col-4'>
    									<label for='archivoInforme'>Seleccionar Informe <i class='fas fa-file-upload ml-2'></i></label>
										<!--input type='file' class='form-control-file' id='archivoInforme' name='archivoInforme' required=''>
										<input type='text' name='cadenatexto' size='20' maxlength='100'>
										<input type='hidden' name='MAX_FILE_SIZE' value='100000'> 
			                    	</div>
			                    </div>
			                    <div class='form-row mt-4'>
			                      	<div class='col-12'>
			                           	<center>
			                              	<button class='btn' name='btnCrearInforme'>Crear Informe</button>
			                           	</center>
			                       	</div>
			                    </div>
							</form-->
							<form action='subearchivo.php' method='post' enctype='multipart/form-data'>
								<b>Campo de tipo texto:</b>
								<br>
								<input type='text' name='cadenatexto' size='20' maxlength='100'>
								<input type='hidden' name='MAX_FILE_SIZE' value='100000'>
								<br>
								<br>
								<b>Enviar un nuevo archivo: </b>
								<br>
								<input name='userfile' type='file'>
								<br>
								<input type='submit' value='Enviar'>
							</form> 
			            </section>
		        	</div>"
			        ;
				}else{
					echo "<script type='text/javascript'>
							alert('NO HAY RESULTADOS');
						</script>
					";
				}
			}
			$this->desconectar();
		}
		
		function moverFile($file){
			
		}
	}
?>