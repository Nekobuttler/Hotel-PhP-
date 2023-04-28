<?php
        include_once 'utilities.php';
        include_once '../Controllers/ReservasController.php';
        include_once '../Controllers/habitacionController.php';
        $result = mostrarDatosReserva($_GET["q"]);
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
                                <input type="hidden" name="idReserva" value="<?php echo $result["idReserva"] ?>">
                                    <div class="form-row">
                                    <input type="hidden" id="idReserva" name="idReserva" value="<?php echo $result["idReserva"] ?>">
                                    <div class="form-group col-md-6">
                                        <label for="fechaIng">Fecha de ingreso</label>
                                        <input type="date" class="form-control"
                                        value=<?php echo $result["fecha_ingreso"]?>
                                         name="fechaIng" id="fechaIng" 
                                         placeholder="Digite la fecha de ingreso" 
                                         min=<?php echo date("Y-m-d H:i:s"); ?>
                                         >
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="fechaReser">Fecha de reserva</label>
                                        <input type="date" class="form-control" 
                                        name="fechaReser" id="fechaReser" disabled
                                        placeholder="Digite la fecha de reservación"
                                        value=<?php echo $result["fecha_reserva"]?>>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="fechaSal">Fecha de salida</label>
                                        <input type="date" class="form-control" 
                                        name="fechaSal" id="fechaSal"
                                         placeholder="Digite la fecha de salida"
                                         value=<?php echo $result["fecha_salida"]?> 
                                         >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="idCliente">Cliente</label>
                                        <input type="text" class="form-control"
                                         name="idCliente" id="idCliente" 
                                         placeholder=<?php echo $result["NombreCliente"]?>
                                         value= <?php echo $result["idCliente"]?>
                                         readonly>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="idEmpleado">Empleado</label>
                                        <input type="number" class="form-control" 
                                        name="idEmpleado" id="idEmpleado" 
                                        placeholder=<?php echo $result["NombreEmpleado"]?>
                                        value=<?php echo $result["idEmpleado"]?>
                                        readonly
                                    
                                        >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="idHabitacion">Habitacion</label>
                                        <select id="idHabitacion" name ="idHabitacion" class="form-control">
                                            <?php
                                            listaHabitaciones();
                                            ?>
                                        </select>
                                         
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="numeroPersonas">Número de Personas</label>
                                        <input type="number" 
                                        class="form-control" name="numeroPersonas"
                                         id="numeroPersonas" placeholder="Digite el número de personas" 
                                         value=<?php echo $result["numeroPersonas"]?> min=1
                                         >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="tipoReserva">Tipo de reserva</label>
                                        <select id="tipoReserva" name ="tipoReserva" class="form-control">
                                            <?php
                                            tiposReservas();
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