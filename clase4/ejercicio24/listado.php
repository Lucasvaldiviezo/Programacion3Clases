<?php
include "usuario.php";

if(isset($_GET["listado"]))
{
    $listado = $_GET["listado"];
    switch($listado)
    {
        case "usuarios" :
            $arrayUsuarios = Usuario::LeerJSON("usuarios.json");
            $cadena = Usuario::DibujarListado($arrayUsuarios);

            echo $cadena;
        break;
        
        case "productos":
            echo 'No tenemos esa lista aun';
        break;

        default:
            echo 'Ese tipo de lista no existe';
    }

}

?>