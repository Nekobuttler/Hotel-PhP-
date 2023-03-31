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
                                <h1 class="h4 text-gray-900 mb-4">Actualizar Datos</h1>
                            </div>
                            <form action="" method="post">
                                <input type="hidden" name="idHabitacion" value="<?php echo $idHabitacion ?>">
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nHabitacion">Numero Habitacion</label>
                                        <input type="number" class="form-control" name="nHabitacion" id="nHabitacion" placeholder="Digite el numero de la habitacion" value="<?php echo $numeroHab ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pisoHab">Piso de la habitacion</label>
                                        <input type="number" class="form-control" name="pisoHab" id="pisoHab" placeholder="Digite el piso donde se encuentra la habitacion" value="<?php echo $pisoHab ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="estadoHab">Estado de la habitacion</label>
                                        <select id="estadoHab" name ="estadoHab" class="form-control">
                                            <?php
                                            estadoHabitacion($estadoHabitacion);
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="tipoHab">Tipo de habitacion</label>
                                        <select id="tipoHab" name ="tipoHab" class="form-control">
                                            <?php
                                            tiposHabitacion($tipoHab);
                                            ?>
                                        </select>
                                     </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Actualizar Habitacion" name="btnActualizarHab">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="submit" class="btn btn-danger btn-user btn-block" value="Eliminar Habitacion" name="btnEliminarHab">
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