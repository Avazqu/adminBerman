<?php
	require('main.php');
	$main1 = new main;

	$sesion1 = new Sesiones;
	if (!isset($_SESSION['user'])) {
		session_start();
		$usuario = $sesion1->getUsuario();
    }
    
    $web = new Webs;
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Panel | Berman Comunicación</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
            <a class="navbar-brand" href="#"><img src="img/logo-leyenda.png" class="img-fluid" style="max-height: 70px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="/administracion/panel.php">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/administracion/clientes.php">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/administracion/paquetes.php">Paquetes</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Webs
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/administracion/completadas.php">Completadas</a>
                            <a class="dropdown-item" href="/administracion/desarrollo.php">En Proceso</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Listado Completo</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 pr-3 my-lg-0" action="index.php" method="POST">
                    <span class="mr-3">Hola <?php echo"<b> $usuario </b>";?></span>
                    <button id="logout" name="logout" class="btn">Salir</button>
                </form>
            </div>
        </nav>
        <div class="container mt-5">
            <?php
            if ($_SESSION['admin'] == true) {
                echo "
                    <section class='mt-5 border p-5 form-registro'>
                        <h3 class='text-uppercase text-center mb-5'>Crear Proyecto</h3>
                        <form action='#' method='POST'>
                            <div class='form-row'>
                                <div class='col-4'>
                                    <label for='nomEmpresa'>Nombre de Empresa <i class='fas fa-file-signature ml-2'></i></label>
                                    <input type='text' class='form-control' id='nomEmpresaRegistro' name='nomEmpresaRegistro' placeholder='Nombre de la Empresa' required=''>
                                </div>
                                <div class='col-4'>
                                    <label for='urlEmpresa'>Dirección Web <i class='fas fa-link ml-2'></i></label>
                                    <input type='text' class='form-control' id='urlEmpresa' name='urlEmpresa' placeholder='Url' required=''>
                                </div>
                                <div class='col-4'>
                                    <label for='estadoEmpresa'>Estado de la Web <i class='far fa-question-circle ml-2'></i></label>
                                    <select class='form-control' id='estadoEmpresa' name='estadoEmpresa' required=''>
                                        <option>Elegir Estado</option>
                                        <option>Solicitud</option>
                                        <option>Wireframe</option>
                                        <option>Desarrollo</option>
                                        <option>Feedback</option>
                                        <option>Entregada</option>
                                    </select>
                                </div>
                            </div>
                            <div class='form-row mt-4'>
                                <div class='col-4'>
                                    <label for='fechaEmpresa'>Fecha de Registro <i class='far fa-calendar-plus ml-2'></i></label>
                                    <input type='date' class='form-control' id='fechaEmpresa' name='fechaEmpresa'>
                                </div>
                                <div class='col-4'>
                                    <label for='fechaEmpresa'>Fecha de Entrega <i class='far fa-calendar-check ml-2'></i></label>
                                    <input type='date' class='form-control' id='fechaEmpresa' name='fechaEmpresa'>
                                </div>
                            </div>
                            <div class='form-row mt-4'>
                                <div class='col-12'>
                                    <center>
                                        <button class='btn' name='btnRegistro'>Crear Registro</button>
                                    </center>
                                </div>
                            </div>
                        </form>
                    </section>
                    <hr class='mt-5'>
                ";
            }
            ?>
            <section class="form-consulta mt-5 mb-5 p-5">
                <h3 class="text-uppercase text-center mb-5">Buscar Proyecto</h3>
                <form action="#" method="POST">
                    <div class="form-row">
                        <div class="col-4">
                            <label for="nomEmpresa">Nombre de Empresa <i class="fas fa-file-signature ml-2"></i></label>
                            <input type="text" class="form-control" id="nomEmpresaConsulta" name="nomEmpresaConsulta" placeholder="Nombre de la Empresa">
                        </div>
                        <div class="col-4">
                            <label for="estadoEmpresa">Estado de la Web <i class="far fa-question-circle ml-2"></i></label>
                            <select class="form-control" id="estadoEmpresaConsulta" name="estadoEmpresaConsulta" required="">
                                <option value="default">Elegir Estado</option>
                                <option>Solicitud</option>
                                <option>Wireframe</option>
                                <option>Desarrollo</option>
                                <option>Feedback</option>
                                <option>Entregada</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="fechaEmpresa">Fecha de Registro <i class="far fa-calendar-plus ml-2"></i></label>
                            <input type="date" class="form-control" id="fechaEmpresaConsulta" name="fechaEmpresaConsulta">
                        </div>
                    </div>
                    <div class="form-row mt-5">
                        <div class="col-12">
                            <center>
                                <button class="btn" name="btnConsulta">Buscar Registro</button>
                            </center>
                        </div>
                    </div>
                </form>
            </section>
        </div>
        <?php
    	//CREAR REGISTRO
    	if (isset($_POST['btnRegistro'])) {
    		$nombreRegistro = $_POST['nomEmpresaRegistro'];
    		$direccionRegistro = $_POST['urlEmpresa'];
    		$estadoRegistro = $_POST['estadoEmpresa'];
    		$fechaRegistro = $_POST['fechaEmpresa'];
			//CONECTAR BBDD
			$main1->conectar();
			//Funcion registro
			if (!$main1->crearRegistroWeb($nombreRegistro, $direccionRegistro, $estadoRegistro, $fechaRegistro)) {
				echo "<script type='text/javascript'>
                        alert('ERROR AL INTRODUCIR UN PROYECTO WEB')
                    </script>";
			}else{
				echo "<script type='text/javascript'>
						alert('EXITO')
					</script>";
			}
    	}


    	//CONSULTAR REGISTRO
    	if (isset($_POST['btnConsulta'])) {
    			$nombreEmpresaConsulta = $_POST['nomEmpresaConsulta'];
    			$estadoEmpresaConsulta = $_POST['estadoEmpresaConsulta'];
    		if ($_POST['fechaEmpresaConsulta'] != "dd/mm/aaaa") {
    			$fechaEmpresaConsulta = $_POST['fechaEmpresaConsulta'];
    		}

    		//CONECTAR BBDD
			$main1->conectar();
			//REALIZAR CONSULTA BBDD
			$web->consultarWeb($nombreEmpresaConsulta, $estadoEmpresaConsulta, $fechaEmpresaConsulta);

    	}

    	//CERRAR SESION
    	if (isset($_POST["logout"])) {
    		$sesion1->logout();
    		$main1->redireccionar('index');
    	}
    ?>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    </body>

    </html>