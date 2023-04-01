<?php
        include_once 'utilities.php';
        include_once '../Controllers/habitacionController.php';
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
                                <input type="hidden" name="idReserva" value="<?php echo $idReserva ?>">
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nReserva">ID Reserva</label>
                                        <input type="number" class="form-control" name="nReserva" id="nReserva" placeholder="Digite el numero de reserva" value="<?php echo $idReserva ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="fechaIng">Fecha de ingreso</label>
                                        <input type="number" class="form-control" name="fechaIng" id="fechaIng" placeholder="Digite la fecha de ingreso" value="<?php echo $fechaIng ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="fechaReser">Fecha de reserva</label>
                                        <input type="number" class="form-control" name="fechaReser" id="fechaReser" placeholder="Digite la fecha de reservación" value="<?php echo $fechaReser ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="fechaSal">Fecha de salida</label>
                                        <input type="number" class="form-control" name="fechaSal" id="fechaSal" placeholder="Digite la fecha de salida" value="<?php echo $fechaSal ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="idCliente">ID Cliente</label>
                                        <input type="number" class="form-control" name="idCliente" id="idCliente" placeholder="Digite el id del cliente" value="<?php echo $idCliente ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="idEmpleado">ID Empleado</label>
                                        <input type="number" class="form-control" name="idEmpleado" id="idEmpleado" placeholder="Digite el id del empleado" value="<?php echo $idEmpleado ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="idHabitacion">ID Habitacion</label>
                                        <input type="number" class="form-control" name="idHabitacion" id="idHabitacion" placeholder="Digite el id de habitación" value="<?php echo $idHabitacion ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="numeroPersonas">Número de Personas</label>
                                        <input type="number" class="form-control" name="numeroPersonas" id="numeroPersonas" placeholder="Digite el número de personas" value="<?php echo $numeroPersonas ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="tipoReserva">Tipo de reserva</label>
                                        <select id="tipoReserva" name ="tipoReserva" class="form-control">
                                            <?php
                                            tiposReservas($tipoReserva);
                                            ?>
                                        </select>
                                     </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Actualizar Reserva" name="btnActualizarReserva">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="submit" class="btn btn-danger btn-user btn-block" value="Eliminar Reserva" name="btnEliminarReserva">
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