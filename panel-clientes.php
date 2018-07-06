<?php header('Content-Type:text/html;charset=utf-8');
	require('main.php');
	$main1 = new main;
    $sesion1 = new Sesiones;
    $cliente = new Clientes;
    
    if (!isset($_SESSION['user'])) {
        session_start();
        $usuario = $sesion1->getUsuario();
    }
?>
   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html  lang="es-Es" xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>Listado de Clientes | Berman Comunicación</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
                    <span class="mr-3">Hola <?php echo"<b> $usuario</b>!";?></span>
                    <button id="logout" name="logout" class="btn">Salir</button>
                </form>
            </div>
        </nav>
        <div class="container mt-5">
        	<h1 class="display-4 text-center mb-5">Listado Clientes | Berman Comunicación</h1>
                <?php
  					$cliente->getClientes();
  				?>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    </body>

    </html>