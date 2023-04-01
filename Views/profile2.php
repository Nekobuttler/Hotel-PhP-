<?php
    include_once 'utilities.php';
    include_once '../Controllers/ClienteController.php'; 
    include_once '../Controllers/ReservasController.php';

   $result = MostrarDatosClienteProfile($_GET["q"]);
   //$_SESSION["id"]
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

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
    <div>
        <?php 
    display_header();
    ?>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 profile mb-4">
                <div class="card">
                    <h1 class="card-header">User Profile</h1>
                    <div class="card-body">
                        <form method="POST" action="">

                            <div class="">

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="<?php echo $result["email"]?> " readonly="true">


                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control"
                                        value="<?php echo $result["Nombre"]?> " readonly="true">
                                </div>

                                <div class="form-group">
                                    <label for="apellidos">Apellidos:</label>
                                    <input type="text" id="apellidos" name="apellidos" class="form-control"
                                        placeholder="" value="<?php echo $result["Apellidos"]?> " >
                                </div>
                            </div>

                            <div class="form-group mb-3 pb-3">
                                <select id="tipo_doc" name="tipo_doc" required>
                                    <?php
                                            tipoDocumentos();
                                            ?>
                            </div>

                            <div class="form-group">
                                <label for="identity">Identidad:</label>
                                <input type="text" id="identity" name="identity" class="form-control" placeholder=""
                                    value="<?php echo $result["num_documento"]?> " readonly="true">
                            </div>

                            <div class="form-group">
                                <label for="telefono">Telefono:</label>
                                <input type="tel" id="telefono" name="telefono" class="form-control" placeholder=""
                                    value="<?php echo $result["telefono"]?> ">
                            </div>

                            <div class="form-group">
                                <label for="direccion">Direccion:</label>
                                <input type="text" id="direccion" name="direccion" class="form-control"
                                    placeholder="Enter your address" value="<?php echo $result["direcccion"]?>">
                            </div>

                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <select class="form-control form-control-user" id="rol" name="rol">
                                    <?php
                                                    //VerPerfiles($resultado["TipoUsuario"]);
                                                ?>
                                </select>
                            </div>



                            <div class="form-group">
                                <label for="fehca_nac">Fecha Nacimiento:</label>
                                <input type="date" id="fehca_nac" name="fehca_nac" class="form-control" value="">


                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder=""> <?php // Aca lo que puede hacerse es que solo se muestren puntitos y que 
                                                            //cuando lo presione le pida si esta seguro y de una le pida 
                                                            // la contrasena ?>
                            </div>


                            <!--
                    <div class="form-group">
                        <label for="photo">Photo:</label>
                        <input type="file" id="photo" name="photo" class="form-control-file"> 
                    </div>-->
                            <input id="actCliente" name="actCliente" class="btn btn-primary" type="submit"
                                value="Save Changes" />
                        </form>
                        <div class="delete mt-3">
                            <input class="btn btn-danger" id="delCliente" type="submit" value="Delete"
                                href='#confirmEliminar' data-backdrop='static' data-keyboard='false' data-toggle='modal'
                                data-target='#confirmEliminar' />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 bookings">
                <?php 
                //reservasUsuario($id); muestra todas la reservas del usuario y su estado
                ?>
                <div class="card">
                    <h1 class="card-header">Bookings</h1>
                    <div class="card-body">
                        <div class="card-deck">
                            <div class="row">
                                <div class="col-md-5">
                                    <?php reservasClientes($_SESSION["id"]); //$_GET["q"] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="confirmEliminar" name="confirmEliminar" aria-hidden="true" data-backdrop="static"
        data-keyboard="false" aria-labelledby="Confirmacion" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ToggleLabel">Confirmacion de desactivacion</h5>
                    <button type="button" class="X lg" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p> Quiere desactivar el siguiente usuario? </p>

                    <input type="hidden" id="consecutivo" name="consecutivo">

                    <p id="nombreUser" name="nombreUser"></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" name="desacConfirm" id="desacConfirm" data-bs-target=""
                        data-bs-toggle="modal" data-dismiss="modal" onclick="desacConfirm">Confirmar
                        Desactivacion</button>

                    <button class="btn btn-primary" data-bs-target="" data-bs-toggle="modal"
                        data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>

</html>