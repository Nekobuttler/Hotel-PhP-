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
   
    <div class="container-fluid d-flex justify-content-center mt-5 pt-5">
    <div>
<a href="addHabitacion.php" class="getstarted">Agregar Habitacion</a>

</div>
        <section class="col-lg-10 pt-4 pt-lg-0 ">
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">

                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <?php
                        //MostrarNombreUsuario();
                    ?>
                    </nav>

                    <div class="container-fluid">
                        <div class="row">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>id Habitacion</th>
                                        <th>Numero Habitacion</th>
                                        <th>ocupada</th>
                                        <th>piso</th>
                                        <th>tipo de Habitacion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                   MostrarHabitaciones();
                                ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
        </section>

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
    <script src="JavaScript/funcionesEliminarHab.js"></script>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>