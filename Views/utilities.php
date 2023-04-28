<?php 

if(session_status() == PHP_SESSION_NONE){
  {
    session_start(); //Start the session 
  }
}

  function display_profile(){

    if($_SESSION["email"] != null){

      $name =  $_SESSION["Nombre"] . " " . $_SESSION["Apellidos"] ;
    
      return $name;
      
    }else{
      header("location: login.php");
    }
  }


function display_header(){
    echo '
    

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center ">
      <div class="container d-flex align-items-center">
  
        <h1 class="logo me-auto"><a href="main.php">Hotel Buena Vista</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="main.php" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
  
      
        <nav id="navbar" class="navbar">
          <ul>
            <li><a href="main.php" class="active">Home</a></li>
            ';
            if($_SESSION["privilegios"] == '1'){
              echo '<li><a href="mostrarUsuarios.php">Usuarios</a></li>
                    <li><a href="habitaciones.php">Tipos habitaciones</a></li>
                    <li><a href="ReservasList.php">Reservas</a></li>
                    <li><a href="habitacionesList.php">Habitaciones</a></li>';   
            }else{
              
              echo '<li><a href="habitaciones.php">Tipos habitaciones</a></li>
                    <li><a href="addReserva.php">Reservas</a></li>';
          }
            
            echo'
            <li><a href="profile2.php?q='.$_SESSION["id"] . '">' . display_profile() .' </a></li>
            <li><a href="../Controllers/cerrarSesionController.php" class="getstarted">Cerrar Sesion </a></li>
            
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
  
      </div>
    </header><!-- End Header -->';
  
           
            
}



function display_footer(){
    echo'<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3>Hotel Buena Vista</h3>
                        <p>
                            Guanacaste Costa Rica <br>
                            <strong>Teléfono:</strong> +506 8123-2131<br>
                            <strong>Correo: </strong>hotelbuenavista23@gmail.com<br>
                        </p>
                    </div>
                </div>


                

                

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; <strong><span>Hotel Buena Vista</span></strong>. Todos los Derechos Reservados
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
            
        </div>
    </div>
</footer><!-- End Footer -->
';
}

?>