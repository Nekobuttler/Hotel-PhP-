<?php
    include_once '../Controllers/loginController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistema Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="bg-gradient-primary">
    <div class="container">

        <br /><br />

        <div class="col-lg-12">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Hotel Buena Vista</h1>
                </div>

                <form action="" method="post" class="user">
                    <div class="form-group" style="margin-left:50px; margin-right:50px; margin-bottom:15px;">
                        <input type="email" class="form-control form-control-user" id="correoElectronico"
                            name="correoElectronico" required placeholder="Correo Electrónico"
                            onkeyup="HabilitarBoton();">
                    </div>
                    <div class="form-group" style="margin-left:50px; margin-right:50px; margin-bottom:15px;">
                        <input type="password" class="form-control form-control-user" id="contrasenna"
                            name="contrasenna" required placeholder="Contraseña" onkeyup="HabilitarBoton();">
                    </div>
                    <div style="text-align:center">
                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Iniciar Sesión" disabled
                            id="btnIniciarSesion" name="btnIniciarSesion">
                    </div>

                </form>

                <hr>
                <div class="text-center">
                    <a class="small" href="recuperarUsuario.php">¿Olvidó su contraseña?</a>
                </div>
                <div class="text-center">
                    <a class="small" href="registroClientes.php">¡Crear una cuenta!</a>
                </div>

            </div>
        </div>


        <script src="JavaScript/loginFunctions.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>