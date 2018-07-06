<?php
	require('main.php');
    //require ('sessions.php');
	
    $main1 = new Main;
    $sesion = new Sesiones;

	//CONECTAR BBDD
	$main1->conectar();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Berman Comunicación</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <meta charset="utf-8">
</head>

<body>
    <div class="d-flex justify-content-center mt-5 pt-5">
        <img src="http://bermancomunicacion.com/test/assets/images/logo.png" class="img-fluid" style="max-height: 200px">
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="flex-row">
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="user">Usuario</label>
                    <input type="text" class="form-control" id="user" name="user" aria-describedby="userHelp" placeholder="Usuario" required="">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" required="">
                </div>
                <button type="submit" id="btnForm" name="btnForm" class="btn">Comprobar</button>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <?php
        if (isset($_POST['btnForm'])) {
            $user = $_POST["user"];
            $pass = $_POST["pass"];
            $main1->comprobrarUsuario($user,$pass);
        }
    ?>
</body>

</html>