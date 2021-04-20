<?php
include_once "AccesoDatos.php";
include_once "usuario.php";

if(isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["clave"]) && isset($_POST["mail"]) && isset($_POST["localidad"]))
{
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $clave = $_POST["clave"];
    $mail = $_POST["mail"];
    $localidad = $_POST["localidad"];

    $usuario = new Usuario($nombre,$apellido,$clave,$mail,$localidad);

    $UltimoId = $usuario->InsertarUsuarioParametros();

    echo 'El ultimo ID Insertado es: ' . $UltimoId;
}else
{
    echo 'Complete todos los datos';
}

?>