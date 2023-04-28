<?php
include_once '../Models/loginModel.php';

if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if(isset($_POST["btnIniciarSesion"]))
{
    $correoElectronico = $_POST["correoElectronico"];
    $contrasenna = $_POST["contrasenna"];

    $resultado = ValidarInicioSesionModelClient($correoElectronico, $contrasenna);
    
    if($resultado -> num_rows > 0)
    {
        $datosResultado = mysqli_fetch_array($resultado);
        $_SESSION["email"] = $datosResultado["email"];
        $_SESSION["Nombre"] = $datosResultado["Nombre"];
        $_SESSION["Apellidos"] = $datosResultado["Apellidos"];
        $_SESSION["id"] = $datosResultado["id_cliente"];
        $_SESSION["privilegios"] = $datosResultado["tipoUsuario"];

        header("location: ../Views/main.php");
    }
    else
    {
        echo "<h1>error de datos</h1>";
        header("location: ../Views/main.php");
    }
}

?>