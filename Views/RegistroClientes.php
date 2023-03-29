<?php
    include_once '../Controllers/loginController.php';
    include_once '../Controllers/ClienteController.php'
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
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">

        <br /><br />

        <div class="col-lg-12">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Sistema Web</h1>
                </div>

                <form action="" method="post" class="user">
                    <div class="form-group mb-3">
                        <input type="email" class="form-control form-control-user m-6" id="correoElectronico"
                            name="correoElectronico" required placeholder="Correo Electrónico"
                            onblur="HabilitarBoton();">
                        <h3 name="error_corr" id="error_corr" class="validation_error" hidden> Este correo no esta
                            permitido</h3>
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" class="form-control" id="nombre" name="nombre" required
                            placeholder="Ingrese su nombre">
                    </div>
                    <div class="form-group mb-3">
                        Tipo:
                        <select id="tipo_doc" name="tipo_doc" required class="form-control" style="margin-bottom:40px;">
                            <?php
                                            tipoDocumentos();
                                            ?>
                    </div>
                    <div class="form-group mb-3 mt-3">
                        <input type="text" class="form-control " id="identificacion" name="identificacion" required
                            placeholder="Ingrese su numero de identificacion">
                    </div>

                    <div class="form-group mb-3">
                        <input type="password" class="form-control form-control-user" id="contrasenna"
                            name="contrasenna" required placeholder="Contraseña" onblur="HabilitarBoton();">
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" class="form-control form-control-user" id="contrasenna_confirm"
                            name="contrasenna_confirm" required placeholder="Confirmar Contraseña"
                            onblur="HabilitarBoton();">
                        <h3 name="error_contra" id="error_contra" class="validation_error" hidden> Las contraseñas no
                            coinciden</h3>
                    </div>

                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Registrar Usuario" disabled
                        id="btnRegistrarCuenta" name="btnRegistrarCuenta">
                </form>

                <hr>
                <div class="text-center">
                    <a class="small" href="login.php">¿Ya tiene un usuario? Inicie Sesión</a>
                </div>


            </div>
        </div>


        <script src="JavaScript/SignInFunctions.js"></script>

        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
</body>

</html>