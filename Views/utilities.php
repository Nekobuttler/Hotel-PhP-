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
  
        <h1 class="logo me-auto"><a href="main.php">Sailor</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="main.php" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
  
      
        <nav id="navbar" class="navbar">
          <ul>
            <li><a href="main.php" class="active">Home</a></li>
  
            <!-- 
            <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
              
                <li><a href="about.php">About</a></li>
                <li><a href="team.php">Team</a></li>
                <li><a href="testimonials.php">Testimonials</a></li>
  
                <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                    
                  </ul>
                </li>
                
              </ul>
            </li>-->
           
            <!-- <li><a href="testimonials.php">Testimonials </a></li> -->
            <!--   <li><a href="services.php">Services</a></li> -->
            <li><a href="mostrarUsuarios.php">Usuarios</a></li>
            <li><a href="habitaciones.php">Tipos habitaciones</a></li>
           <!-- <li><a href="pricing.php">Pricing</a></li> -->
            <li><a href="ReservasList.php">Reservas</a></li>
            <li><a href="main.php">Habitaciones</a></li>
            
            
            <!-- <li><a href="contact.php">Contact</a></li> -->
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
                           
                            <strong>Phone:</strong> +506 8123-2131<br>
                            <strong>Email:</strong> Mae pongalo porque no me acuerdo cual es hotel@proyecto.com<br>
                        </p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="main.php">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Tipos Habitaciones</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="profile2.php">Profile</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="about.php">Acerca de nosotros</a></li>
                    </ul>
                </div>

                

                

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>Sailor</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->
';
}

?>