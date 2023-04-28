<?php 
include_once 'conexion.php';


//create
function crearTipoReservaModel($descripcion , $caracteristicas , $precioNoche){

    $instancia = Open();

    $sentencia = "CALL crearTipoReserva('$descripcion' , '$caracteristicas' , '$precioNoche')";

    $result  = $instancia -> query($sentencia); 

    Close($instancia);

    return $result;
}


//Select all 

//Temporal request that shows all data and rooms 
function mostrarTipoReservaModel()
{
    $instancia = Open();

    $sentencia = "CALL mostrarTipoReserva();";
    $resultado = $instancia -> query($sentencia);

    Close($instancia);
    return $resultado;    
}

//Delete
function deleteTipoReservaModel($idTipoReserva){

    $instancia = Open();

    $sentencia = "CALL deleteTipoReserva($idTipoReserva);";
    $resultado = $instancia -> query($sentencia);

    Close($instancia);
    return $resultado;    
}

//Details

function detalleTipoReserva($idTipoReserva){

    $instancia = Open();

    $sentencia = "CALL detalleTipoReserva($idTipoReserva);";
    $resultado = $instancia -> query($sentencia);

    Close($instancia);
    return $resultado;    

}
//Update


function actualizarTipoReservaModel($idTipoReserva,
 $descripcion , $caracteristicas , $precioNoche) {

    $instancia = Open();
    $sentencia = "CALL actualizarTipoReserva($idTipoReserva, '$descripcion', '$caracteristicas', $precioNoche);";
    $resultado = $instancia->query($sentencia);
    Close($instancia);
    return $resultado;
}







// ...
?>