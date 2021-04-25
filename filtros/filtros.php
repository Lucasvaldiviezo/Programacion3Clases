<?php
include "producto.php";
include "usuario.php";
include "ventas.php";
if(isset($_GET["orden"]))
{
    $orden = $_GET["orden"];
    /*Ordenar Usuarios------------------------------------
    $usuarios = Usuario::TraerUsuariosOrdenados($orden);
    $dibujo = Usuario::DibujarListado($usuarios);
    echo $dibujo2;*/

    /*Ordenar Productos-----------------------------------
    $productos = Producto::TraerProductosOrdenados($orden);
    $dibujo2 = Producto::DibujarListado($productos);
    echo $dibujo2;*/

    /*Ventas entre cantidad-------------------------------
    //$ventas = Ventas::TraerTodoLasVentasEntre(4,5);
    $dibujo3 = Ventas::DibujarListado($ventas);
    echo $dibujo3;*/

    /*Cantidad entre fechas-------------------------------
    $cantidad = Ventas::CantidadVendidaEntreFechas("2020-01-01","2021-12-12");
    echo $cantidad;*/

    /*Primeros productos enviados-------------------------
    $ventas = Ventas::TraerPrimerosProductosEnviados(4);
    $dibujo4 = Ventas::DibujarListado($ventas);
    echo $dibujo4;*/

    /* Nombres de Productos y Usuarios por cada venta*/
    $nombres = Ventas::NombresDeCadaVenta();
    foreach($nombres as $nom)
    {
        echo "ID: " . $nom['id'] . " - Usuario: " . $nom['unombre'] . " - Producto: " . $nom['pnombre'] . "\n";
    }
}else
{
    echo 'Complete todos los datos';
}
?>