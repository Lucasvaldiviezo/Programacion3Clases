<?php
include_once "AccesoDatos.php";
include_once "usuario.php";

if(isset($_POST["clave"]) && isset($_POST["mail"]))
{
    $clave = $_POST["clave"];
    $mail = $_POST["mail"];
    $usuario = new Usuario("No","No",$clave,$mail,"No");
    
    $resultado = Usuario::Login($usuario);
    echo $resultado;
}else
{
    echo 'Complete todos los datos';
}

?>