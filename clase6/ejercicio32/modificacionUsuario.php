<?php
include "producto.php";
include "usuario.php";
include "ventas.php";


if(isset($_POST["nombre"]) && isset($_POST["clavenueva"]) && isset($_POST["clavevieja"]) && isset($_POST["mail"]))
{
    $nombre = $_POST["nombre"];
    $claveNueva = $_POST["clavenueva"];
    $claveVieja = $_POST["clavevieja"];
    $mail = $_POST["mail"];
    $resultado = 'El usuario no existe';
    $usuario = Usuario::TraerUsuarioConMailNombre($mail,$nombre);
    if($usuario != false)
    {
        $resultado = $usuario->CambiarClave($claveVieja,$claveNueva);
    }
    echo $resultado;
}else
{
    echo 'Complete todos los datos';
}
?>