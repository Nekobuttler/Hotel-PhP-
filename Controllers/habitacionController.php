
<?php 
include_once '../Models/habitacionModel.php';

if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}


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
        echo "<td>" . $resultData["numeroHabitacion"] . "</td>";
        echo "<td>" .  $resultData["nombreEstado"]. "</td>";
        echo "<td>" .  $resultData["piso"]. "</td>";
        echo "<td>" .  $resultData["nombreHabitacion"]. "</td>";
        
        /*echo "<td>" . ' <form method="post">  <input  id="idhabitacion" name="idhabitacion" type="hidden" 
        value="'.$resultData["idHabitacion"] .'" /> <input  class="btn btn-danger" id ="delHabitacion" 
        name="delHabitacion" type ="submit" value="Delete" 
        href="#confirmEliminar" data-backdrop="static" data-keyboard="false" data-toggle="modal"
                data-target="#confirmEliminar" /> </form> 
                '. "</td>";*/

        echo "<td>"  . '
        <a href="actualizarHabitacion.php?q='. $resultData["idHabitacion"] .'" class="btn btn-primary">Actualizar</a>' . "</td>";
        echo "</tr>";

    }
}else{
    echo "no se encontro informacion";
}
}


function estadoHabitacion($idEstado){

    $result = estadoHabitacionModel();

    if($result -> num_rows > 0){

        
        
        While($resultData = mysqli_fetch_array($result))
        {
            if($resultData["idEstado"] == $idEstado){
                echo "<option value=" . $resultData["idEstado"] . " selected>" . $resultData["nombreEstado"] . "</option>";
            }else{
                echo "<option value=" . $resultData["idEstado"] . " >" . $resultData["nombreEstado"] . "</option>";    
            }
            
        }
    }

}


function tiposHabitacion($idTipo){

    $result = tiposHabitacionModel();

    if($result -> num_rows > 0){

        
        While($resultData = mysqli_fetch_array($result))
        {
            if($resultData["idTipoHabitacion"] == $idTipo){
            echo "<option value=" . $resultData["idTipoHabitacion"] . " selected>" . $resultData["nombreHabitacion"] . "</option>";
        }else{
            echo "<option value=" . $resultData["idTipoHabitacion"] . " >" . $resultData["nombreHabitacion"] . "</option>";
        }
    }

}
}





if(isset($_POST["btnActualizarHab"])){
    $idHabitacion = $_POST["idHabitacion"];
    $nHabitacion = $_POST["nHabitacion"];
    $pisoHab = $_POST["pisoHab"];
    $tipoHab = $_POST["tipoHab"];
    $estadoHab = $_POST["estadoHab"];
    actualizarHabitacion($idHabitacion,$nHabitacion,$pisoHab,$estadoHab,$tipoHab);
    };

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


function detalleHabitacion($idHabitacion){

    $result = detalleHabitacionModel($idHabitacion);

    if($result -> num_rows > 0){

        
        $resultData = mysqli_fetch_array($result);
        
            return $resultData;
            
    }



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