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

    /* Nombres de Productos y Usuarios por cada venta------------
    $nombres = Ventas::NombresDeCadaVenta();
    foreach($nombres as $nom)
    {
        echo "ID: " . $nom['id'] . " - Usuario: " . $nom['unombre'] . " - Producto: " . $nom['pnombre'] . "\n";
    }*/

    /* Nombres de Productos y Usuarios por cada venta------------
    $ventas = Ventas::TotalDeCadaVenta();
    foreach($ventas as $ven)
    {
        echo "ID: " . $ven['id'] . " - Total: " . $ven["total"] . "\n";
    }*/

    /* Cantidad vendida de un producto por un usuario------------
    $ventas = Ventas::CantidadProductoVendidoUsuario(1006,103);
    foreach($ventas as $ven)
    {
        echo "ID: " . $ven['id'] . " - Total: " . $ven["cantidad"] . "\n";
    }*/

    /* Codigo de Producto por localidad de Usuario------------
    $ventas = Producto::ProductoVendidoLocalidad("Avellaneda");
    foreach($ventas as $ven)
    {
        echo "Codigo: " . $ven['codigo'] . "\n";
    }*/

    /* Filtrar Usuario por letra(nombre o apellido)------------
    $usuarios = Usuario::TraerUsuariosPorLetras("a","apellido");
    $dibujo5 = Usuario::DibujarListado($usuarios);
    echo $dibujo5;*/

     /*Ventas entre fechas-------------------------------
    $ventas = Ventas::VentaEntreFechas("2020-06-01","2021-02-01");
    $dibujo6 = Ventas::DibujarListado($ventas);
    echo $dibujo6;*/

}else
{
    echo 'Complete todos los datos';
}
?>