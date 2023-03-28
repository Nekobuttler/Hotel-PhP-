
<?php
include_once 'conexion.php';




function MostrarDocumentosModel(){

    $instancia = Open();

    $sentencia = "CALL mostrarTipoDocumentos()";
    
    $result = $instancia -> query($sentencia);

    Close($instancia);

    return $result;

}

function crearUsuarioModel($apellidos , $contrasenna, $email , $nombre , $numDocumento , $telefono  , $tipoDocumento , $fecha_nac){

    $instancia = Open();

    $sentencia = "CALL crearCliente('$apellidos', '$contrasenna' ,
    '$email', '$nombre' , '$numDocumento' , $telefono,'$tipoDocumento','$fecha_nac');";
    $resultado = $instancia -> query($sentencia);

    Close($instancia);
    return $resultado;    
}



function VerDatosUsuariosModel($correoElectronico, $tipoUsuario)
{
    $instancia = Open();

    $sentencia = "CALL VerDatosUsuarios('$correoElectronico', $tipoUsuario);";
    $resultado = $instancia -> query($sentencia);

    Close($instancia);
    return $resultado;    
}

function mostrarClientesModel($tipoUsuario){
    $instancia = Open();

    $sentencia = "CALL verClientes( $tipoUsuario);";
    $resultado = $instancia -> query($sentencia);

    Close($instancia);
    return $resultado;    
}

function VerificarExisteCorreoModel($correoElectronico)
{
    $instancia = Open();

    $sentencia = "CALL VerificarExisteCorreo('$correoElectronico');";
    $resultado = $instancia -> query($sentencia);

    Close($instancia);
    return $resultado;        
}


function RegistrarCuentaModel($correoElectronico, $contrasenna)
{
    $instancia = Open();

    $tipoUsuarioCliente = 2;

    $sentencia = "CALL RegistrarCuenta('$correoElectronico','$contrasenna',$tipoUsuarioCliente);";
    $resultado = $instancia -> query($sentencia);

    Close($instancia);
    return $resultado;    
}



function actualizarPerfilModel($idCliente,$apellidos , $contrasenna, $email , $nombre , $numDocumento 
                            , $telefono  , $tipoDocumento , $fecha_nac)
{
    $instancia = Open();

    $sentencia = "CALL actualizarCliente('$idCliente','$apellidos' , '$contrasenna', '$email' , '$nombre' , '$numDocumento '
    , '$telefono'  , '$tipoDocumento', '$fecha_nac')";
    
    $result = $instancia -> query($sentencia);

    Close($instancia);

    return $result;
    
}


function eliminarPerfilModel($idCliente){
    
    $instancia = Open();

    $sentencia = "CALL deleteCliente('$idCliente')";
    
    $result = $instancia -> query($sentencia);

    Close($instancia);

    return $result;
}


function MostrarDatosClienteModel($id){

    $instancia = Open();

    $sentencia = "CALL mostrarDatosCliente($id)";
    
    $result = $instancia -> query($sentencia);

    Close($instancia);

    return $result;

}


?>