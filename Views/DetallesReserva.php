<?php
    include_once 'utilities.php';
    include_once '../Controllers/ClienteController.php'; 
    include_once '../Controllers/ReservasController.php';

   $result = mostrarDatosReserva($_GET["q"]);
   //$_SESSION["id"]
?>

<?php
        include_once 'utilities.php';
        include_once '../Controllers/habitacionController.php';
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Portfolio Details - Sailor Bootstrap Template</title>
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

    <main id="main">

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">

                                <div class="swiper-slide">
                                    <img src="assets/img/hotelRoom.jpg" alt="">
                                </div>

                                <div class="swiper-slide">
                                    <img src="assets/img/RoomImg3.jpg" alt="">
                                </div>

                                <div class="swiper-slide">
                                    <img src="assets/img/RoomImg1.jpg" alt="">
                                </div>

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3> <?php echo $result["descripcion"] ?> </h3>
                            <ul>
                                <li><strong>Fecha Ingreso</strong> <?php echo $result["fecha_ingreso"] ?> </li>
                                <li><strong>Fecha Salida</strong><?php echo $result["fecha_salida"] ?></li>
                                <li><strong>Estado</strong>: <?php echo $result["nombreEstado"] ?> </li>
                                <li><strong>Personas</strong>: <?php echo $result["numeroPersonas"]?> </li>
                                <li> <strong>Falta</strong>:<p id="counter"> </p> <strong>para entrar al hotel</strong>
                                </li>
                                <li> <strong>Esta reserva esta a nombre de:</strong>
                                    <?php echo $result["NombreCliente"]?></li>
                            </ul>
                        </div>
                        <div class="portfolio-description">

                            <div>
                                <a href="#modalRegisterForm" class="btn btn-primary" data-backdrop="static"
                                    data-keyboard="false" data-toggle="modal" data-target="#modalRegisterForm">
                                    Actualizar </a>

									<a href="#modalRegisterForm"  data-backdrop="static" 
            					data-keyboard="false" data-toggle="modal" data-target="#modalRegisterForm" 
            					data-id=<?php  $_GET["q"] ?> 
        						class="btn btn-danger"> Eliminar </a>
                                <p>
                                </p>
                            </div>
                        </div>

                    </div>

                </div>


        </section><!-- End Portfolio Details Section -->


        </div>

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- Script -->
    <script>
    <?php 
           $dateTime = strtotime($result["fecha_ingreso"]);
           $getDateTime = date("F d, Y H:i:s", $dateTime); 
        ?>
    var countDownDate = new Date("<?php echo "$getDateTime"; ?>").getTime();
    // Update the count down every 1 second
    var x = setInterval(function() {
        var now = new Date().getTime();
        // Find the distance between now an the count down date
        var distance = countDownDate - now;
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        // Output the result in an element with id="counter"11
        document.getElementById("counter").innerHTML = days + "Day : " + hours + "h " +
            minutes + "m " + seconds + "s ";
        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("counter").innerHTML = "EXPIRED";
        }
    }, 1000);
    </script>

</body>

</html>