
<?php 
include_once 'conexion.php';


//Llama y muestra todas las habitaciones dependiendo del usuario 
//si se es admin o employee se mostrara el id y todas las habitaciones y los demas datos 
//Por otra parte si se tiene un cliente esta mostrara solo las habitaciones reservadas o a su nombre
function VerDatosHabitacion($correoElectronico, $tipoUsuario)
{
    $instancia = Open();

    $sentencia = "CALL VerHabitaciones('$correoElectronico', $tipoUsuario);";
    $resultado = $instancia -> query($sentencia);

    Close($instancia);
    return $resultado;    
}



function addHabitacionModel($numeroHab , $pisoHab , $tipoHab){

    $instancia = Open();

    $sentencia = "CALL crearHabitacion('$numeroHab' , '$pisoHab' , '$tipoHab')";

    $result  = $instancia -> query($sentencia); 

    Close($instancia);

    return $result;
}




//Temporal request that shows all data and rooms 
function MostrarHabitacionesModel()
{
    $instancia = Open();

    $sentencia = "CALL MostrarHabitaciones();";
    $resultado = $instancia -> query($sentencia);

    Close($instancia);
    return $resultado;    
}


function tiposHabitacionModel(){

    $instancia = Open();

    $sentencia = "CALL tiposHabitacion();";
    $resultado = $instancia -> query($sentencia);

    Close($instancia);
    return $resultado;    
}

function estadoHabitacionModel(){

    $instancia = Open();

    $sentencia = "CALL estadosHabitacion();";
    $resultado = $instancia -> query($sentencia);

    Close($instancia);
    return $resultado;    
}


function detalleHabitacionModel($idHabitacion){

    $instancia = Open();

    $sentencia = "CALL detalleHabitacion($idHabitacion);";
    $resultado = $instancia -> query($sentencia);

    Close($instancia);
    return $resultado;    

}



function actualizarHabitacionModel($idHabitacion, $numeroHabitacion, $piso, $estadoHabitacion, $tipoHabitacion) {
    $instancia = Open();
    $sentencia = "CALL actualizarHabitacion($idHabitacion, '$numeroHabitacion', '$piso', $estadoHabitacion, $tipoHabitacion);";
    $resultado = $instancia->query($sentencia);
    Close($instancia);
    return $resultado;
}

function deleteHabitacionModel($idHabitacion) {
    $instancia = Open();
    $sentencia = "CALL deleteHabitacion($idHabitacion);";
    $resultado = $instancia->query($sentencia);
    Close($instancia);
    return $resultado;
}


function infohotel(){

    $instancia = Open();
    $sentencia = "SELECT * FROM tipohabitacion;";
     $resultado = $instancia -> query($sentencia);
     Close($instancia);
    
    return $resultado; 
    
    }

// ...
?>