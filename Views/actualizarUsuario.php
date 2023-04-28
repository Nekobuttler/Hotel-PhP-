<?php
        include_once 'utilities.php';
        include_once '../Controllers/clienteController.php';
        include_once '../Controllers/ReservasController.php';
        $result = MostrarDatosClienteProfile($_GET["q"]);
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sailor Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

<body>


    <?php 
    display_header();
    ?>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <?php
                    //    MostrarNombreUsuario();
                    ?>
            </nav>

            <div class="container-fluid justify-content-center mt-8 pt-5">
                <div class="row">

                    <div class="col-lg-2"></div>

                    <div class="col-lg-8">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Actualizar Reserva</h1>
                            </div>
                            <form action="" method="post">

                                <input type="hidden" name="idReserva" value="<?php echo $result["id_cliente"] ?>">

                                <div class="form-row">
                                    <div class="form-group col-md-6">

                                        <label for="email">Email:</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            value="<?php echo $result["email"]?> ">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" id="nombre" name="nombre" class="form-control"
                                            value="<?php echo $result["Nombre"]?> " readonly="true">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <select id="tipo_doc" name="tipo_doc" disabled>
                                            <?php
                                            tipoDocumentos();
                                            ?>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="identity">Documento de identidad:</label>
                                        <input type="text" id="identity" name="identity" class="form-control"
                                            placeholder="" value="<?php echo $result["num_documento"]?> "
                                            readonly="true">

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="telefono">Telefono:</label>
                                        <input type="tel" id="telefono" name="telefono" class="form-control"
                                            placeholder="" value="<?php echo $result["telefono"]?> ">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="fehca_nac">Fecha Nacimiento:</label>
                                        <input type="date" id="fehca_nac" name="fehca_nac"
                                            max=<?php echo date("Y-m-d H:i:s"); ?> class="form-control"
                                            value=<?php echo $result["fecha_nac"]?>>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password">Password:</label>
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="************"> <?php // Aca lo que puede hacerse es que solo se muestren puntitos y que 
                                                            //cuando lo presione le pida si esta seguro y de una le pida 
                                                            // la contrasena ?>
                                    </div>
                                </div>

                                <?php 
                                if($_SESSION["privilegios"] ==1){

                                    echo '
                                    <label for="rolCambio">Elija el nuevo rol para el usuario:</label>

                                    <select name="rolCambio" id="rolCambio">
                                        <option value="volvo">Empleado</option>
                                        <option value="saab">Administrador</option>
                                                </select>
                                    '
                                    
                                    ;

                                }
                                ?>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="submit" class="btn btn-primary btn-user btn-block"
                                            value="Actualizar" name="btnActualizarReserva">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="submit" class="btn btn-danger btn-user btn-block" value="Eliminar"
                                            name="btnEliminarReserva">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                </div>
            </div>
        </div>

    </div>
    <!-- ======= Footer ======= -->

    <?php 
    display_footer();
    ?>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>