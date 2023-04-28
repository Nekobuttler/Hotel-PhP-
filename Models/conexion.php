<?php

function Open()
{
    $servidor = "127.0.0.1:3308";
    $usuario = "root";
    $contrasenna = "";
    $baseDatos = "hoteldb";

    return mysqli_connect($servidor, $usuario, $contrasenna, $baseDatos);
}

function Close($instancia)
{
    mysqli_close($instancia);
}

?>