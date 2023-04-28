
<?php 
include_once '../Models/tiposModel.php';

if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}


if(isset($_POST["btnGuardarTipoReserva"])){

$descripcion = $_POST["descripcion"];
$caracterisitcas = $_POST["caracterisitcas"];
$costosNoche = $_POST["costosNoche"];

addHabitacion($nHabitacion,$pisoHab,$tipoHab);
};

function crearTipoReserva($descripcion , $caracterisitcas , $costosNoche){

    $resultado = crearTipoReservaModel($descripcion, $caracterisitcas , $costosNoche);

    if($resultado == true)
    {
        header("location: ../Views/main.php");
    }
    else
    {
        echo "No se pudo guardar la reserva";
    }

}

function mostrarTipoReserva(){

    $result = mostrarTipoReservaModel();

if($result -> num_rows > 0){

    //We put the data from the DB request into an variable in form of an array
    //$resultData = mysqli_fetch_array($result);

    While($resultData = mysqli_fetch_array($result)){
        

        echo '<article class="postcard dark blue">
        <a class="postcard__img_link" href="#">
            <img class="postcard__img" src="assets/img/RoomImg2.jpg" alt="Image Title" />
        </a>
        <div class="postcard__text">
            <h1 class="postcard__title blue"><a href="#">'. $resultData["descripcion"]  .'</a></h1>
            <div class="postcard__subtitle small">
                <time datetime="2020-05-25 12:00:00">
                    <i class="fas fa-calendar-alt mr-2"></i>$ '. $resultData["costoPorNoche"]  .'
                </time>
            </div>
            <div class="postcard__bar"></div>
            <div class="postcard__preview-txt">'. $resultData["caracteristicas"]  .'</div>
            ';
            if($_SESSION["privilegios"] == 2 ){
                echo'
            <a href="addReserva.php"><button class="btn btn-primary"value="Reservar Ahora" >Reservar Ahora </button>';
            }else{
                /*echo'
                <a href="#"><button class="btn btn-primary"value="Actualizar" >Reservar Ahora </button>
                <a href="#"><button class="btn btn-primary"value="Borrar" >Reservar Ahora </button>';*/
            }
               
                    
       ;
        

    }
}else{
    echo "no se encontro informacion";
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

function actualizarTipoReserva($idHabitacion, $numeroHabitacion, $piso, $estadoHabitacion, $tipoHabitacion) {
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


function detalleReserva($idHabitacion){

    $result = detalleHabitacionModel($idHabitacion);

    if($result -> num_rows > 0){

        
        $resultData = mysqli_fetch_array($result);
        
            return $resultData;
            
    }



}


function deleteTipoReserva($idHabitacion) {
    $resultado = DeleteHabitacionModel($idHabitacion);

    if ($resultado == true) {
        header("location: ../Views/main.php");
    } else {
        header("location:../Views/addHabitacion.php");
    }
}

// ...
?> 