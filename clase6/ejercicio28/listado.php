<?php
include "usuario.php";

if(isset($_GET["listado"]))
{
    $listado = $_GET["listado"];
    switch($listado)
    {
        case "usuarios" :
            $arrayUsuarios = Usuario::TraerTodoLosUsuarios();
            $dibujo = Usuario::DibujarListado($arrayUsuarios);
            echo $dibujo;
        break;
        
        case "productos":
            echo 'No tenemos esa lista aun';
        break;

        default:
            echo 'Ese tipo de lista no existe';
    }

}

?>