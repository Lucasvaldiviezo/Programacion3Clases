<?php
include "usuario.php";

if(isset($_POST["nombre"]) && isset($_POST["clave"]) && $_POST["mail"])
{
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];
    $mail = $_POST["mail"];
    $usuario = new Usuario($nombre,$clave,$mail);

    $bool = $usuario->Guardar();

    if($bool != false)
    {
        echo 'Se guardaron los datos';
    }else
    {
        echo 'No se guardaron los datos';
    }

}else
{
    echo 'Complete todos los datos';
}


?>