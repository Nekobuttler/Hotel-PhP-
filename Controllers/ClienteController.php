<?php 
include_once "../Models/clienteModel.php";


function tipoDocumentos(){

    $result = MostrarDocumentosModel();

    if($result -> num_rows > 0){

        
        While($resultData = mysqli_fetch_array($result))
        {

            echo "<option value=" . $resultData["idTipoDocumento"] . " selected>" . $resultData["NombreTipo"] . "</option>";
        }
    }

}


if(isset($_GET["VerificarExisteCorreo"]))
{   
    $resultado = VerificarExisteCorreoModel($_GET["correoElectronico"]);

    if($resultado -> num_rows > 0)
    {
        echo "Ya hay un usuario registrado con este correo";
    }
    else
    {
        echo "OK";
    }
}

if(isset($_POST["btnRegistrarCuenta"])){

    $correoElectronico = $_POST["correoElectronico"];
    $contrasenna = $_POST["contrasenna_confirm"];
    $nombre = $_POST["nombre"];
    $tipo_doc = $_POST["tipo_doc"];
    $identificacion = $_POST["identificacion"];

    crearCliente($correoElectronico , $nombre , $tipo_doc, $identificacion , $contrasenna);

}

function crearCliente($correoElectronico , $nombre , $tipo_doc, $identificacion , $contrasenna){

    $result  = crearUsuarioModel($correoElectronico , $nombre , $tipo_doc, $identificacion , $contrasenna);

    if($result == true){ 
        header("location:../Views/main.php");
    }else{
        header("location:../Views/RegistroClientes.php");
    }
}



///Update //////////
if(isset($_POST["actCliente"])){

    $correoElectronico = $_POST["email"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $tipoDoc =  1;                               //$_POST["tipo_doc"];
    $identificacion = $_POST["identity"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $fecha_nac = $_POST["fehca_nac"]; 
    $password = $_POST["password"];

    actualizarPerfil($_SESSION["id"],$apellidos , $password , 
    $correoElectronico, $nombre , $identificacion , $telefono , $tipoDoc , $fecha_nac);

}

function actualizarPerfil($idCliente,$apellidos , $contrasenna , $email, $nombre , 
$numDocumento , $telefono , $tipo_doc , $fecha_nac){

    $result  = actualizarPerfilModel($idCliente,$apellidos , $contrasenna , $email,
     $nombre , $numDocumento , $telefono , $tipo_doc , $fecha_nac);

    if($result == true){ 
        header("location:../Views/profile2.php?q=' ". $_SESSION["id"] ."'");  
    }else{
        // Mostrar modal de error o un popUp4
        echo 'Error' ;
        header("location:../Views/profile2.php?q=' ". $_SESSION["id"] ."'" );
    }
}



function eliminarPerfil(){


}

function mostrarClientes($tipoUsuario){

    $result = mostrarClientesModel($tipoUsuario);

    if($result -> num_rows > 0){

        //We put the data from the DB request into an variable in form of an array
        //$resultData = mysqli_fetch_array($result);
    
        While($resultData = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $resultData["Nombre"] . "</td>";
            echo "<td>" . $resultData["Apellidos"] . "</td>";
            echo "<td>" .  $resultData["email"]. "</td>";
            echo "<td>" .  $resultData["NombreTipo"]. "</td>";
            echo "<td>" .  $resultData["num_documento"]. "</td>";
            echo "<td>" .  $resultData["telefono"]. "</td>";
            echo "<td>" .  $resultData["direccion"]. "</td>";
            echo "<td>" .  $resultData["nombreTipoUsuario"]. "</td>";
            echo "<td>" .  $resultData["fecha_nac"]. "</td>";
            echo "<td>" . ' <form method="post">  <input  id="idhabitacion" name="idhabitacion" type="hidden" 
            value="'.$resultData["id_cliente"] .'" /> <input  class="btn btn-danger" id ="delHabitacion" 
            name="delHabitacion" type ="submit" value="Eliminar" 
            href="#confirmEliminar" data-backdrop="static" data-keyboard="false" data-toggle="modal"
                    data-target="#confirmEliminar"  
                    
                    onClick=EliminarHab('. $resultData["id_cliente"]  .') /> </form> 
                    '. "</td>";
            echo "<td>"  . '
            <a href="actualizarUsuario.php?q='.$resultData["id_cliente"].'" class="btn btn-primary">Actualizar</a>' . "</td>";
            echo "</tr>";
           
        }
        
}else{
    echo 'No hay info';
}
}


if(isset($_POST["btnRecuperarUsuario"]))
{
    $correoElectronico = $_POST["correoElectronico"];
    $contrasenna = ConsultarContrasennaUsuario($correoElectronico);

    EnviarCorreo($correoElectronico, 'Recuperar contraseña', 'Estimado: '.$correoElectronico.', 
    su contraseña es la siguiente: '.$contrasenna);
}


function ConsultarContrasennaUsuario($correoElectronico){

    $result = ConsultarContrasenna($correoElectronico);
    $contrasenna = '';
    
    if($result -> num_rows > 0){
        While($resultData = mysqli_fetch_array($result)){
            $contrasenna = $resultData["contrasenna"]; 
        }
    }

    return $contrasenna;
}

function EnviarCorreo($destinatario, $asunto, $cuerpo)
{
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

    $correoSalida = "hotelbuenavista23@outlook.es";
    $contrasennaSalida = "941M1edt#FJB";

    $mail = new PHPMailer();
    $mail -> CharSet = 'UTF-8';

    $mail -> IsSMTP();
    $mail -> Host = 'smtp.office365.com'; // smtp.gmail.com     
    $mail -> SMTPSecure = 'tls';
    $mail -> Port = 587; // 465 // 25                               
    $mail -> SMTPAuth = true;
    $mail -> Username = $correoSalida;               
    $mail -> Password = $contrasennaSalida;                                
    
    $mail -> SetFrom($correoSalida, "Reservas Hotel");
    $mail -> Subject = $asunto;
    $mail -> MsgHTML($cuerpo);   
    $mail -> AddAddress($destinatario, 'Usuario');

    $mail -> send();
}


function BorrarCliente($consecutivo){
    
    $resultado = eliminarPerfilModel($consecutivo);

    if($resultado -> num_rows > 0)
    {
        echo ' Los datos fueron eliminados ';
    }
}


function MostrarDatosClienteProfile($id){
    
    $resultado = MostrarDatosClienteModel($id);

    if($resultado -> num_rows > 0)
    {
        return mysqli_fetch_array($resultado);
    }else{
        
    }

    
}





function cambioRol($idCliente){


      
}

?>