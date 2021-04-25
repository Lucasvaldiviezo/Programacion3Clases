<?php
include "producto.php";
include "usuario.php";
include "ventas.php";


if(isset($_POST["codigo"]) && isset($_POST["nombre"]) && isset($_POST["tipo"]) && isset($_POST["stock"]) && isset($_POST["precio"]))
{
    $resultado = 'Se modifico el producto';
    $nombre = $_POST["nombre"];
    $codigo = $_POST["codigo"];
    $tipo = $_POST["tipo"];
    $stock = $_POST["stock"];
    $precio = $_POST["precio"];
    $producto = Producto::TraerProducto($codigo);
    if($producto != false)
    {
        $resultado = $producto->ModificarProducto($nombre,$tipo,$stock,$precio);
    }
    echo $resultado;
}else
{
    echo 'Complete todos los datos';
}
?>