<?php
include "usuario.php";

if(isset($_POST["nombre"]) && isset($_POST["clave"]) && $_POST["mail"])
{
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];
    $mail = $_POST["mail"];
    $usuario = new Usuario($nombre,$clave,$mail);

    $archivo = fopen("usuarios.csv","a");
    fwrite($archivo, $usuario->Mostrar());
    $bool = fclose($archivo);

    echo $usuario->Mostrar();
    if($bool == true)
    {
        echo 'Se Cerro ;)';
    }else
    {
        echo 'No se cerro u.u';
    }
}else
{
    echo 'Complete todos los datos en el POST';
}


?>