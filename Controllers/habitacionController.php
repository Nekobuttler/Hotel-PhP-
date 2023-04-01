
<?php 
include_once '../Models/habitacionModel.php';



if(isset($_POST["btnGuardarHab"])){

$nHabitacion = $_POST["nHabitacion"];
$pisoHab = $_POST["pisoHab"];
$tipoHab = $_POST["tipoHab"];

addHabitacion($nHabitacion,$pisoHab,$tipoHab);
};

function addHabitacion($numeroHab , $pisoHab , $tipoHab){

    $resultado = addHabitacionModel($numeroHab, $pisoHab , $tipoHab);

    if($resultado == true)
    {
        header("location: ../Views/main.php");
    }
    else
    {
        echo "No se pudo guardar la habitacion";
    }

}

function MostrarHabitaciones(){

    $result = MostrarHabitacionesModel();

if($result -> num_rows > 0){

    //We put the data from the DB request into an variable in form of an array
    //$resultData = mysqli_fetch_array($result);

    While($resultData = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td id='idHab' name='idHab' 
        value='". $resultData["idHabitacion"] . "'
         >" . $resultData["idHabitacion"] . "</td>";
        echo "<td>" . $resultData["numeroHabitacion"] . "</td>";
        echo "<td>" .  $resultData["estadoHabitacion"]. "</td>";
        echo "<td>" .  $resultData["piso"]. "</td>";
        echo "<td>" .  $resultData["tipoHabitacion"]. "</td>";
        echo "<td>" . ' <form method="post">  <input  id="idhabitacion" name="idhabitacion" type="hidden" 
        value="'.$resultData["idHabitacion"] .'" /> <input  class="btn btn-danger" id ="delHabitacion" 
        name="delHabitacion" type ="submit" value="Delete" 
        href="#confirmEliminar" data-backdrop="static" data-keyboard="false" data-toggle="modal"
                data-target="#confirmEliminar"  
                
                onClick=EliminarHab('. $resultData["idHabitacion"]  .') /> </form> 
                '. "</td>";
        echo "<td>"  . '
        <a href="actualizarHabitacion.php" class="btn btn-primary">Actualizar</a>' . "</td>";
        echo "</tr>";

    }
}else{
    echo "no se encontro informacion";
}
}


function estadoHabitacion(){

    $result = estadoHabitacionModel();

    if($result -> num_rows > 0){

        
        While($resultData = mysqli_fetch_array($result))
        {

            echo "<option value=" . $resultData["idEstado"] . " selected>" . $resultData["nombreEstado"] . "</option>";
        }
    }

}


function tiposHabitacion(){

    $result = tiposHabitacionModel();

    if($result -> num_rows > 0){

        
        While($resultData = mysqli_fetch_array($result))
        {

            echo "<option value=" . $resultData["idTipoHabitacion"] . " selected>" . $resultData["nombreHabitacion"] . "</option>";
        }
    }

}

function actualizarHabitacion($idHabitacion, $numeroHabitacion, $piso, $estadoHabitacion, $tipoHabitacion) {
    $resultado = actualizarHabitacionModel($idHabitacion, $numeroHabitacion, $piso, $estadoHabitacion, $tipoHabitacion);

    if ($resultado == true) {
        header("location: ../Views/main.php");
    } else {
        header("location:../Views/addHabitacion.php");
    }
}



if(isset($_POST["delHabitacion"])){

    $nHabitacion = $_POST["idhabitacion"];
    DeleteHabitacion($nHabitacion);

}


function DeleteHabitacion($idHabitacion) {
    $resultado = DeleteHabitacionModel($idHabitacion);

    if ($resultado == true) {
        header("location: ../Views/main.php");
    } else {
        header("location:../Views/addHabitacion.php");
    }
}

// ...
?>