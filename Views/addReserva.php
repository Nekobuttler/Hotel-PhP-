<?php
        include_once 'utilities.php';
        include_once '../Controllers/ReservasController.php';
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
                                <?php
                                if($_SESSION["privilegios"] == '1'){
                                    echo '<h1 class="h4 text-gray-900 mb-4">Actualizar Datos</h1>';
                                }else{
                                    echo '<h1 class="h4 text-gray-900 mb-4">Agregar Reserva</h1>';
                                }
                                ?>
                                
                            </div>
                            <form action="" method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="fehcaIng">Fecha de ingreso </label>
                                        <input type="date" class="form-control" name="fehcaIng" id="fehcaIng" placeholder="Seleccione la fecha de 
                                                                                                                cuando desea ingresar al hotel">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="fehcaSa">Fecha de salida </label>
                                        <input type="date" class="form-control" name="fehcaSa" id="fehcaSa" placeholder="Seleccione la fecha de 
                                                                                                                cuando desea su salida del hotel">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="numPer">Seleccione el número de personas que habran</label>
                                        <input type="number" class="form-control" name="numPer" id="numPer"
                                            placeholder="Digite el numero de personas">
                                    </div>
                               
                                
                                    <div class="form-group col-md-4">
                                        <label for="numHabitacion">Número de habitación</label>
                                        <select id="numHabitacion" name ="numHabitacion"class="form-control">
                                        <?php
                                           	listaHabitaciones();
                                           ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="tipoRes">Tipo de reserva</label>
                                        <select id="tipoRes" name ="tipoRes" class="form-control">
                                           <?php
                                           	tiposReservas();
                                           ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="empleados">Tipo de reserva</label>
                                        <select id="empleados" name ="empleados" class="form-control">
                                           <?php
                                           	mostrarEmpleados();
                                           ?>
                                        </select>
                                    </div>

                                </div>
                               
                            
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Guardar Reserva" 
                                        id="btnGuardarRes" name="btnGuardarRes">
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