
<?php 
include_once '../Models/reservaModel.php';

if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}



if(isset($_POST["btnGuardarRes"])){

$fehcaIng = $_POST["fehcaIng"];
$fehcaSa = $_POST["fehcaSa"];
$numPer = $_POST["numPer"];
$numHabitacion = $_POST["numHabitacion"];
$tipoRes = $_POST["tipoRes"];
$cliente = $_SESSION["id"];


addReserva($fehcaIng , $fehcaSa , $numPer , $numHabitacion , $tipoRes , $cliente);
};

function addReserva($fehcaIng , $fehcaSa , $numPer , $numHabitacion , $tipoRes , $cliente){

    $resultado = addReservaModel($fehcaIng, date("Y/m/d")  , $fehcaSa ,$cliente , 1 , $numHabitacion, $numPer ,$tipoRes );

    if($resultado == true)
    {
        header("location: ../Views/main.php");
    }
    else
    {
        echo "No se pudo guardar la habitacion";
    }

}

function MostrarReservas(){

    $result = MostrarReservasModel();

if($result -> num_rows > 0){

    //We put the data from the DB request into an variable in form of an array
    //$resultData = mysqli_fetch_array($result);

    While($resultData = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>" . $resultData["nombreHabitacion"] . "</td>";
        echo "<td>" . $resultData["NombreCliente"] . "</td>";
        echo "<td>" .  $resultData["NombreEmpleado"]. "</td>";
        echo "<td>" .  $resultData["descripcion"]. "</td>";
        echo "<td>" .  $resultData["fecha_reserva"]. "</td>";
        echo "<td>" .  $resultData["fecha_ingreso"]. "</td>";
        echo "<td>" .  $resultData["fecha_salida"]. "</td>";
        echo "<td>" .  $resultData["numeroPersonas"]. "</td>";
        echo "<td>" .  $resultData["nombreEstado"]. "</td>";
        
        echo "<td>" . ' <form method="post">  <input  id="idReserva" name="idReserva" type="hidden" 
        value="'.$resultData["idReserva"] .'" /> <input  class="btn btn-danger" id ="delReserva" 
        name="delReserva" type ="submit" value="Eliminar" 
        href="#confirmEliminar" data-backdrop="static" data-keyboard="false" data-toggle="modal"
                data-target="#confirmEliminar"  
                
                onClick=EliminarHab('. $resultData["idReserva"]  .') /> </form> 
                '. "</td>";
        echo "<td>"  . '
        <a href="actualizarReserva.php?q='.$resultData["idReserva"] . '" class="btn btn-primary">Actualizar</a>' . "</td>";
        echo "</tr>";
       

    }
}else{
    echo "no se encontro informacion";
}
}


function tiposReservas(){

    $result = tiposReservaModel();

    if($result -> num_rows > 0){

        
        While($resultData = mysqli_fetch_array($result))
        {

            echo "<option value=" . $resultData["idTipoReserva"] . " selected>" . $resultData["descripcion"] . "</option>";
        }
    }

}


function listaHabitaciones(){

    $result = verHabitaciones();

    if($result -> num_rows > 0){

        
        While($resultData = mysqli_fetch_array($result))
        {

            echo "<option value=" . $resultData["idHabitacion"] . " selected>" . $resultData["numeroHabitacion"] . "</option>";
        }
    }

}

function mostrarEmpleados(){

  $result = showEmpleados();

  if($result -> num_rows > 0){

      
      While($resultData = mysqli_fetch_array($result))
      {

          echo "<option value=" . $resultData["idEmpleado"] . " selected>" . $resultData["puesto"] . "</option>";
      }
  }

}

function enviarFactura($destinatario, $file)
{
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

    $correoSalida = "@hotmail.com";
    $contrasennaSalida = "......";

    $mail = new PHPMailer();
    $mail -> CharSet = 'UTF-8';

    $mail -> IsSMTP();
    $mail -> Host = 'smtp.office365.com'; // smtp.gmail.com     
    $mail -> SMTPSecure = 'tls';
    $mail -> Port = 587; // 465 // 25                               
    $mail -> SMTPAuth = true;
    $mail -> Username = $correoSalida;               
    $mail -> Password = $contrasennaSalida;                                
    
    $mail -> SetFrom($correoSalida, "Sistema Profesores");
    $mail -> Subject = $asunto;
    $mail -> MsgHTML($cuerpo);   
    $mail -> AddAddress($destinatario, 'Usuario Sistema');

    $mail -> send();
}



function reservasClientes($idCliente){

    

    $result = mostrarReservaPorCliente($idCliente);   

    if($result -> num_rows > 0){
    //$resultData = mysqli_fetch_array($result);

    While($resultData = mysqli_fetch_array($result)){

        echo'
        <div class="card" style="width: 18rem;">
        
        <a href="DetallesReserva.php?q='.$resultData["idReserva"].'"> <img  class="img-fluid"
          src="assets/img/hotelRoom.jpg" class="card-img-top" alt="600"  width="400" height="600"></a>
          <div class="card-body" > 
         
          <h5 class="card-title" > ' .$resultData["descripcion"] .  '</h5>
          
            <p class="card-text"></p>
            <p> Fecha realizada: ' . $resultData["fecha_reserva"] . ' </p>
            <p> Fecha de llegada: ' . $resultData["fecha_ingreso"] . ' </p>
            <p> Fecha de salida: ' . $resultData["fecha_salida"] . ' </p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            
            <div> 
            <a href="#" class="btn btn-primary"> Actualizar </a>

            <a href="#confirmEliminar"  data-backdrop="static" 
            data-keyboard="false" data-toggle="modal" data-target="#confirmEliminar" 
            data-id="' . $resultData["idReserva"] . '" 
        class="btn btn-danger"> Eliminar </a>

        
        </div>
     </div>

                </div>
       ';
    }
/*<a href="#confirmEliminar" data-backdrop="static" data-keyboard="false" data-toggle="modal"
data-target="#confirmEliminar"  class="btn btn-danger"
data-id="' . $resultData["idReserva"] . '> Eliminar </a>*/

    }else{
            echo '<p>You don' ."'". 't have any bookings yet.</p> ';
    }

    $result = MostrarReservasModel();

    

}

function reservasClientesClient($idCliente){

    

    $result = mostrarReservaPorClienteClient($idCliente);   

    if($result -> num_rows > 0){
    //$resultData = mysqli_fetch_array($result);

    While($resultData = mysqli_fetch_array($result)){

        echo"
        <div class='card' style='width: 18rem;' id='cardView-" . $resultData["idReserva"] . "'>
        
        <a href='DetallesReserva.php?q=".$resultData["idReserva"]."'> <img  class='img-fluid'
          src='assets/img/hotelRoom.jpg' class='card-img-top' alt='600'  width='400' height='600'></a>
          <div class='card-body' > 
         
          <h5 class='card-title' > " .$resultData["descripcion"] .  "</h5>
          
            <p class='card-text'></p>
            <p> Fecha realizada: " . $resultData["fecha_reserva"] . " </p>
            <p> Fecha de llegada: " . $resultData["fecha_ingreso"] . " </p>
            <p> Fecha de salida: " . $resultData["fecha_salida"] . " </p>
            <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>
            
            <div> 
            <a href='#' class='btn btn-primary'> Actualizar </a>

            <a  href='#' data-id='" . $resultData["idReserva"] . "' class='btn btn-danger' onclick='eliminarReserva(" . $resultData["idReserva"] . ");'> Eliminar </a>

        
        </div>
     </div>

                </div>
       ";
    }
/*<a href="#confirmEliminar" data-backdrop="static" data-keyboard="false" data-toggle="modal"
data-target="#confirmEliminar"  class="btn btn-danger"
data-id="' . $resultData["idReserva"] . '> Eliminar </a>*/

    }else{
            echo '<p>You don' ."'". 't have any bookings yet.</p> ';
    }

    $result = MostrarReservasModel();

    

}



function  ActualizarReserva($idReserva,$idHab, $pidCliente,$idEmpleado,
                                $tipoReserva,$fechaIngreso ,$fechaSal, 
                                $numeroPersonas, $estadoReserva) 
{

     ActualizarReservaModel($idReserva,$idHab, $pidCliente, 
    $idEmpleado, $tipoReserva, $fechaIngreso, $fechaSal, $numeroPersonas, $estadoReserva);

    
    
    
}


function reservasDetalle($idReserva){

    $result = reservaDetalleModel($idReserva);   

    if($result -> num_rows > 0){
    //$resultData = mysqli_fetch_array($result);

    While($resultData = mysqli_fetch_array($result)){

        echo'
        <div class="card" style="width: 18rem;">
        
        <a href="DetallesReserva.php?q='.$resultData["idReserva"].'"> <img  class="img-fluid"
          src="assets/img/hotelRoom.jpg" class="card-img-top" alt="600"  width="400" height="600"></a>
          <div class="card-body" > 
         
          <h5 class="card-title" > ' .$resultData["descripcion"] .  '</h5>
          
            <p class="card-text"></p>
            <p> Fecha realizada: ' . $resultData["fecha_reserva"] . ' </p>
            <p> Fecha de llegada: ' . $resultData["fecha_ingreso"] . ' </p>
            <p> Fecha de salida: ' . $resultData["fecha_salida"] . ' </p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            
            <div> 
            <a href="#modalForm" class="btn btn-primary"  
            data-backdrop="static" 
            data-keyboard="false" data-toggle="modal" data-target="#modalForm" 
            data-id="' . $resultData["idReserva"] . '" 
            > Actualizar </a>

            <a href="#confirmEliminar"  data-backdrop="static" 
            data-keyboard="false" data-toggle="modal" data-target="#confirmEliminar" 
            data-id="' . $resultData["idReserva"] . '" 
        class="btn btn-danger"> Eliminar </a>

        
        </div>
     </div>

                </div>
       ';
    }
/*<a href="#confirmEliminar" data-backdrop="static" data-keyboard="false" data-toggle="modal"
data-target="#confirmEliminar"  class="btn btn-danger"
data-id="' . $resultData["idReserva"] . '> Eliminar </a>*/

    }else{
            echo '<p>You don' ."'". 't have any bookings yet.</p> ';
    }

    $result = MostrarReservasModel();

    

}


if(isset($_POST["btnActualizarReserva"])){
    
    if( $_SESSION["privilegios"] == 2 ){
    $idReserva =  $_POST["idReserva"];
    $idHab = $_POST["idHabitacion"]; 
    $idCliente = $_SESSION["id"];
    $idEmpleado = $_POST["idEmpleado"]; 
    $tipoReserva = $_POST["tipoReserva"]; 
    $fechaIngreso = $_POST["fechaIng"];
    $fechaSal = $_POST["fechaSal"];
    $numeroPersonas = $_POST["numeroPersonas"];
    $estadoReserva = 2;

    ActualizarReserva($idReserva,$idHab, $idCliente,$idEmpleado,
    $tipoReserva,$fechaIngreso ,$fechaSal, 
    $numeroPersonas, $estadoReserva);

        
    }else{

    }
}



if(isset($_POST["desacConfirm"])){

    $idReserva =  $_POST["idReserva"];
    cancelarReservaModel($idReserva);
}


function cancelarReserva($idReserva) {
    
    cancelarReservaModel($idReserva);


}
function mostrarDatosReserva($idReserva){

    $result = reservaDetalleModel($idReserva);

    if($result -> num_rows > 0){
         $result = mysqli_fetch_array($result);

        return $result;
    
}else{
    echo'No se encontraron datos';
}
}








?>