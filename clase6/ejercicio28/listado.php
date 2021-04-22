<?php
include "usuario.php";
include "producto.php";
include "ventas.php";

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
            $arrayProductos = Producto::TraerTodoLosProductos();
            $dibujo = Producto::DibujarListado($arrayProductos);
            echo $dibujo;
        break;
        
        case "ventas":
            $arrayVentas = Ventas::TraerTodoLasVentas();
            $dibujo = Ventas::DibujarListado($arrayVentas);
            echo $dibujo;
        break;

        default:
            echo 'Ese tipo de lista no existe';
    }

}

?>