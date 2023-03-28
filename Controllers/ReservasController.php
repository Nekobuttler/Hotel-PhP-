
<?php 
include_once '../Models/reservaModel.php';



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
        echo "<td>" .  $resultData["idReserva"]. "</td>";
        echo "<td>" . $resultData["fecha_ingreso"] . "</td>";
        echo "<td>" . $resultData["fecha_reserva"] . "</td>";
        echo "<td>" .  $resultData["fecha_salida"]. "</td>";
        echo "<td>" .  $resultData["idCliente"]. "</td>";
        echo "<td>" .  $resultData["idEmpleado"]. "</td>";
        echo "<td>" .  $resultData["idHabitacion"]. "</td>";
        echo "<td>" .  $resultData["numeroPersonas"]. "</td>";
        echo "<td>" .  $resultData["tipoReserva"]. "</td>";
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
        <div class="card">
          <img  class="img-fluid"
          src="assets/img/hotelRoom.jpg" class="card-img-top" alt="600"  width="400" height="600">
          <div class="card-body">
            <h5 class="card-title"> ' .$resultData["descripcion"] .  '</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p> Fecha realizada: ' . $resultData["fecha_reserva"] . ' </p>
            <p> Fecha de llegada: ' . $resultData["fecha_ingreso"] . ' </p>
            <p> Fecha de salida: ' . $resultData["fecha_salida"] . ' </p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            <a href="#" class="btn btn-primary"> Actualzar </a>
            <a href="#" class="btn btn-danger"> Eliminar </a>
                </div>
       ';
    }
    }else{
            echo '<p>You don' ."'". 't have any bookings yet.</p> ';
    }

    $result = MostrarReservasModel();

    

}







?>