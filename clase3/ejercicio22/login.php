<?php
include "usuario.php";

if(isset($_POST["clave"]) && $_POST["mail"] && $_POST["nombre"])
{
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];
    $mail = $_POST["mail"];
    $usuario = new Usuario($nombre,$clave,$mail);

    $validacion = Usuario::Login($usuario);
    echo $validacion;

}else
{
    echo 'Complete todos los datos';
}


?>