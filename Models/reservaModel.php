
<?php 
include_once 'conexion.php';


//Llama y muestra todas las habitaciones dependiendo del usuario 
//si se es admin o employee se mostrara el id y todas las habitaciones y los demas datos 
//Por otra parte si se tiene un cliente esta mostrara solo las habitaciones reservadas o a su nombre



function addReservaModel($fechIng , $fechaSal , $fechaReser , $idCliente , $idEmpleado , $idHabitacion , $numeroPersonas , $tipoReserva){

    $instancia = Open();

    $sentencia = "CALL crearReserva('$fechIng' , '$fechaReser' , '$fechaReser' , '$idCliente' , '$idEmpleado' , '$idHabitacion' , '$numeroPersonas'  , '$tipoReserva')";

    $result  = $instancia -> query($sentencia); 

    Close($instancia);

    return $result;
}




//Temporal request that shows all data and rooms 
function MostrarReservasModel()
{
    $instancia = Open();

    $sentencia = "CALL verReservas();";
    $resultado = $instancia -> query($sentencia);

    Close($instancia);
    return $resultado;    
}


function tiposReservaModel(){

    $instancia = Open();

    $sentencia = "CALL verTipoReservas();";
    $resultado = $instancia -> query($sentencia);

    Close($instancia);
    return $resultado;    
}

function verHabitaciones(){

    $instancia = Open();

    $sentencia = "CALL verHabitacionesDesocupadas()";

  $resultado = $instancia -> query($sentencia);

    Close($instancia);
    return $resultado; 

}

function showEmpleados(){

    $instancia = Open();

    $sentencia = "CALL showEmpleados()";

  $resultado = $instancia -> query($sentencia);

    Close($instancia);
    return $resultado; 

}


//Para empleados 
function mostrarReservaPorCliente($idCliente){
    $instancia = Open();

   $sentencia = "CALL reservasCliente('$idCliente')";

   $resultado = $instancia -> query($sentencia);

   Close($instancia);
   return $resultado; 
}


//Para clientes 
function mostrarReservaPorClienteClient($idCliente){
    $instancia = Open();

   $sentencia = "CALL mostrarReservasCliente('$idCliente')";

   $resultado = $instancia -> query($sentencia);

   Close($instancia);
   return $resultado; 
}



function ActualizarReservaModel($idReserva ,$idHab, $pidCliente,$idEmpleado,$tipoReserva,$fechaIngreso ,$fechaSal,
                                $numeroPersonas, $estadoReserva)
{ 
    $enlace = Open();

    $procedimiento = "call actualizarReserva($idReserva,'$idHab', 
                        '$pidCliente', '$idEmpleado', $tipoReserva, $fechaIngreso, $fechaSal, 
                        '$numeroPersonas', $estadoReserva);";
    $enlace -> query($procedimiento);

    Close($enlace);
}

function cancelarReservaModel($idReserva) {
    $instancia = Open();
    $sentencia = "CALL cancelarReserva($idReserva);";
    $instancia->query($sentencia);
    Close($instancia);
    
}

function reservaDetalleModel($idReserva){

    $instancia = Open();
    $sentencia = "CALL reservaDetalle($idReserva);";
    $resultado = $instancia->query($sentencia);
    Close($instancia);
    return $resultado;
}


?>