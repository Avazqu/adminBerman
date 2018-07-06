<?php
    require('main.php');
    $main1 = new main;

    $sesion1 = new Sesiones;
    if (!isset($_SESSION['user'])) {
        session_start();
        $usuario = $sesion1->getUsuario();
    }  
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
                    <li class="nav-item">
                        <a class="nav-link" href="/administracion/tripulacion.php">Tripulación</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="webs.php" id="navbarDropdown">
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
                    <span class="mr-3">Hola <?php echo"<b> $usuario </b>!";?></span>
                    <button id="logout" name="logout" class="btn">Salir</button>
                </form>
            </div>
        </nav>

        <div class="container mt-5 px-5">
            <?php
                $main1->generarPanel($_SESSION['user']);
            ?>
        </div>
        <?php
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